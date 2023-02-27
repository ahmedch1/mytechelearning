
<?php 

    $defaults = edubin_generate_defaults();
    $ld_price_show = get_theme_mod( 'ld_price_show', $defaults['ld_price_show']);
   
    $free_custom_text = get_theme_mod( 'free_custom_text', $defaults['free_custom_text'] ); 
    $enrolled_custom_text = get_theme_mod( 'enrolled_custom_text', $defaults['enrolled_custom_text'] ); 
    $completed_custom_text = get_theme_mod( 'completed_custom_text', $defaults['completed_custom_text'] ); 
    $custom_closed_btn_url = get_theme_mod( 'custom_closed_btn_url', $defaults['custom_closed_btn_url'] ); 

    global $post; $post_id = $post->ID;

    $course_id = $post_id;
    $user_id   = get_current_user_id();


    $options = get_option( 'sfwd_cpt_options' );
    $currency_setting = class_exists( 'LearnDash_Settings_Section' ) ? LearnDash_Settings_Section::get_section_setting( 'LearnDash_Settings_Section_PayPal', 'paypal_currency' ) : null;
    $currency = '';

    if ( isset( $currency_setting ) || ! empty( $currency_setting ) ) {
        $currency = $currency_setting;
    } elseif ( isset( $options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) ) {
        $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];
    }

    if ( class_exists( 'NumberFormatter' ) ) {
        
        $locale = get_locale();
        $number_format = new NumberFormatter( $locale . '@currency=' . $currency, NumberFormatter::CURRENCY );
        $currency = $number_format->getSymbol( NumberFormatter::CURRENCY_SYMBOL );
    }

    /**
     * Currency symbol filter hook
     * 
     * @param string $currency Currency symbol
     * @param int    $course_id
     */
    $currency = apply_filters( 'learndash_course_grid_currency', $currency, $course_id );

    $course_options = get_post_meta($post_id, "_sfwd-courses", true);
    $legacy_short_description = isset( $course_options['sfwd-courses_course_short_description'] ) ? $course_options['sfwd-courses_course_short_description'] : '';
    // For LD >= 3.0
    if ( function_exists( 'learndash_get_course_price' ) ) {
        $price_args = learndash_get_course_price( $course_id );
        $price = $price_args['price'];
        $price_type = $price_args['type'];
    } else {

        if ($free_custom_text) {
        $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : $free_custom_text;        
        } 
        else {
        $price = $course_options && isset($course_options['sfwd-courses_course_price']) ? $course_options['sfwd-courses_course_price'] : esc_html__( 'Free', 'edubin' );
        }
        

        $price_type = $course_options && isset( $course_options['sfwd-courses_course_price_type'] ) ? $course_options['sfwd-courses_course_price_type'] : '';
    }

    /**
     * Filter: individual grid class
     * 
     * @param int   $course_id Course ID
     * @param array $course_options Course options
     * @var string
     */

    $has_access   = sfwd_lms_has_access( $course_id, $user_id );
    $is_completed = learndash_course_completed( $user_id, $course_id );

    $price_text = '';

    if ( is_numeric( $price ) && ! empty( $price ) ) {
        $price_format = apply_filters( 'learndash_course_grid_price_text_format', '{currency}{price}' );

        $price_text = str_replace(array( '{currency}', '{price}' ), array( $currency, $price ), $price_format );
    } elseif ( is_string( $price ) && ! empty( $price ) ) {
        $price_text = $price;
    } elseif ( empty( $price ) ) {
        if ($free_custom_text) {
            $price_text = $free_custom_text;
        } else {
            $price_text = esc_html__( 'Free', 'edubin' );
        }
        
    }

    $class       = 'ld_course_grid_price';
    $course_class = '';
    $ribbon_text = get_post_meta( $post->ID, '_learndash_course_grid_custom_ribbon_text', true );
    $ribbon_text = isset( $ribbon_text ) && ! empty( $ribbon_text ) ? $ribbon_text : '';

    if ( $has_access && ! $is_completed && $price_type != 'open' && empty( $ribbon_text ) ) {
        $class .= ' ribbon-enrolled';
        $course_class .= ' learndash-available learndash-incomplete ';

        if ($enrolled_custom_text) {
            $ribbon_text = $enrolled_custom_text;

        } else {
            $ribbon_text = esc_html__( 'Enrolled', 'edubin' );
        }
        

    } elseif ( $has_access && $is_completed && $price_type != 'open' && empty( $ribbon_text ) ) {
        $class .= '';
        $course_class .= ' learndash-available learndash-complete';

        if ($completed_custom_text) {
            $ribbon_text = $completed_custom_text;
        } else {
            $ribbon_text = esc_html__( 'Completed', 'edubin' );

        }
        

    } elseif ( $price_type == 'open' && empty( $ribbon_text ) ) {
        if ( is_user_logged_in() && ! $is_completed ) {
            $class .= ' ribbon-enrolled';
            $course_class .= ' learndash-available learndash-incomplete';

            if ($enrolled_custom_text) {
                $ribbon_text = $enrolled_custom_text;
            } else {
                $ribbon_text = esc_html__( 'Enrolled', 'edubin' );
            }
            

        } elseif ( is_user_logged_in() && $is_completed ) {
            $class .= '';
            $course_class .= ' learndash-available learndash-complete';

            if ($completed_custom_text) {
                $ribbon_text = $completed_custom_text;

            } else {
                $ribbon_text = esc_html__( 'Completed', 'edubin' );
            }
            
        } else {
            $course_class .= ' learndash-available';
            $class .= ' ribbon-enrolled';
            $ribbon_text = '';
        }
    } elseif ( $price_type == 'closed' && empty( $price ) ) {
        $class .= ' ribbon-enrolled';
        $course_class .= ' learndash-available';

        if ( $is_completed ) {
            $course_class .= ' learndash-complete';
        } else {
            $course_class .= ' learndash-incomplete';
        }

        if ( is_numeric( $price ) ) {
            $ribbon_text = $price_text;
        } else {
            $ribbon_text = '';
        }
    } else {
        if ( empty( $ribbon_text ) ) {
            $class .= ! empty( $course_options['sfwd-courses_course_price'] ) ? ' price_' . $currency : ' free';
            $course_class .= ' learndash-not-available learndash-incomplete';
            $ribbon_text = $price_text;
        } else {
            $class .= ' custom';
            $course_class .= ' learndash-not-available learndash-incomplete';
        }
    }

    /**
     * Filter: individual course ribbon text
     *
     * @param string $ribbon_text Returned ribbon text
     * @param int    $course_id   Course ID
     * @param string $price_type  Course price type
     */
    $ribbon_text = apply_filters( 'learndash_course_grid_ribbon_text', $ribbon_text, $course_id, $price_type );

    if ( '' == $ribbon_text ) {
        $class = '';
    }

    /**
     * Filter: individual course ribbon class names
     *
     * @param string $class          Returned class names
     * @param int    $course_id      Course ID
     * @param array  $course_options Course's options
     * @var string
     */
    $class = apply_filters( 'learndash_course_grid_ribbon_class', $class, $course_id, $course_options );

?>

<?php if ( $ld_price_show && $ribbon_text ) : ?>
    <div class="price">
        <span><?php echo wp_kses_post($ribbon_text); ?></span>
    </div>
<?php endif; ?>