<?php

        $settings   = $this->get_settings_for_display(); ?>

            <?php 
                global $post; $post_id = $post->ID;
                $course_id = $post_id;
                $user_id   = get_current_user_id();
                $current_id = $post->ID;

                $enable_video = get_post_meta( $post->ID, '_learndash_course_grid_enable_video_preview', true );
                $embed_code   = get_post_meta( $post->ID, '_learndash_course_grid_video_embed_code', true );
                $button_text  = $settings['button_text'];

                    // Retrive oembed HTML if URL provided
                if ( preg_match( '/^http/', $embed_code ) ) {
                    $embed_code = wp_oembed_get( $embed_code, array( 'height' => 600, 'width' => 400 ) );
                }

                $button_text = isset( $button_text ) && ! empty( $button_text ) ? $button_text : esc_html__( 'See more', 'edubin-core' );

                $button_text = apply_filters( 'learndash_course_grid_custom_button_text', $button_text, $post_id );

                $options = get_option('sfwd_cpt_options');
                $currency = null;

                if ( ! is_null( $options ) ) {
                    if ( isset($options['modules'] ) && isset( $options['modules']['sfwd-courses_options'] ) && isset( $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'] ) )
                        $currency = $options['modules']['sfwd-courses_options']['sfwd-courses_paypal_currency'];
                }

                if( is_null( $currency ) )
                    $currency = 'USD';

                $course_options = get_post_meta($post_id, "_groups", true);

                if ($settings['free_custom_text']) {

                 $price = $course_options && isset($course_options['groups_group_price']) ? $course_options['groups_group_price'] : $settings['free_custom_text'];

                } else {
                  $price = $course_options && isset($course_options['groups_group_price']) ? $course_options['groups_group_price'] : esc_html__( 'Free', 'edubin-core' );
                }

                $has_access   = sfwd_lms_has_access( $course_id, $user_id );
                $is_completed = learndash_course_completed( $user_id, $course_id );

                if( $price == '' )

                if ($settings['free_custom_text']) {
                    $price .= $settings['free_custom_text'];
                } else {
                     $price .= esc_html__( 'Free', 'edubin-core' );
                }   
                if ( is_numeric( $price ) ) {
                    if ( $currency == "USD" )
                        $price = '$' . $price;
                    else
                        $price .= ' ' . $currency;
                }

                $class       = '';
                $ribbon_text = '';

                if ( $has_access && ! $is_completed ) {
                    $class = 'ld_course_grid_price ribbon-enrolled';

                    if ($settings['enrolled_custom_text']) {

                        $ribbon_text = $settings['enrolled_custom_text'];

                    } else {
                        $ribbon_text = esc_html__( 'Enrolled', 'edubin-core' );
                    }

                } elseif ( $has_access && $is_completed ) {
                    $class = 'ld_course_grid_price';

                    if ($settings['completed_custom_text']) {

                        $ribbon_text = $settings['completed_custom_text'];

                    } else {
                       $ribbon_text = esc_html__( 'Completed', 'edubin-core' );
                    }
                } else {
                    $class = ! empty( $course_options['groups_group_price'] ) ? 'ld_course_grid_price price_' . $currency : 'ld_course_grid_price free';
                    $ribbon_text = $price;
                }

             ?>
                 
            <!--********* Custom code Add to fetch close url **********-->
            <?php $meta= learndash_get_setting( $post_id );  
                    $post_button_url   = ( isset( $meta['custom_button_url'] ) ) ? $meta['custom_button_url'] : '';

                    if ( empty( $post_button_url ) ) {
                    $post_button = '';
                    } else {
                    $post_button_url = trim( $post_button_url );
                    /**
                    * If the value does NOT start with [http://, https://, /] we prepend the home URL.
                    */
                    if ( ( stripos( $post_button_url, 'http://', 0 ) !== 0 ) && ( stripos( $post_button_url, 'https://', 0 ) !== 0 ) && ( strpos( $post_button_url, '/', 0 ) !== 0 ) ) {
                    $post_button_url = get_home_url( null, $post_button_url );
                    }

                    }

            ?> <!--************ Custom code Add to fetch close url End *************-->


            <div <?php echo $this->get_render_attribute_string( 'edubin_posts_column' ); ?> >

            <?php if ($settings['course_style'] == '1' || $settings['course_style'] == '2' || $settings['course_style'] == '3') : 
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/templates/ld_course_layout_1_2_3.php'; 
                elseif ($settings['course_style'] == '4') : 
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/templates/ld_course_layout_4.php';
                elseif ($settings['course_style'] == '5') :
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/templates/ld_course_layout_5.php';
                elseif ($settings['course_style'] == '6') :
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/templates/ld_course_layout_6.php'; 
            endif; ?>

            </div>
