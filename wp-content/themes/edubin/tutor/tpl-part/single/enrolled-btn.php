
<?php
    // Utility data
    $is_enrolled           = apply_filters( 'tutor_alter_enroll_status', tutor_utils()->is_enrolled() );
    $lesson_url            = tutor_utils()->get_course_first_lesson();
    $is_privileged_user    = tutor_utils()->has_user_course_content_access();
    $tutor_course_sell_by  = apply_filters( 'tutor_course_sell_by', null );
    $is_public             = get_post_meta( get_the_ID(), '_tutor_is_public_course', true ) == 'yes';

    // Monetization info
    $monetize_by              = tutor_utils()->get_option( 'monetize_by' );
    $is_purchasable           = tutor_utils()->is_course_purchasable();

    // Get login url if
    $is_tutor_login_disabled = ! tutor_utils()->get_option( 'enable_tutor_native_login', null, true, true );
    $auth_url                = $is_tutor_login_disabled ? ( isset( $_SERVER['REQUEST_SCHEME'] ) ? wp_login_url( $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ) : '' ) : '';
    $default_meta = array(
        array(
            'icon_class' => 'tutor-icon-mortarboard',
            'label'      => __( 'Total Enrolled', 'tutor' ),
            'value'      => tutor_utils()->get_option( 'enable_course_total_enrolled' ) ? tutor_utils()->count_enrolled_users_by_course() . ' ' . __("Total Enrolled", "tutor") : null,
        ),
        array(
            'icon_class' => 'tutor-icon-clock-line',
            'label'      => __( 'Duration', 'tutor' ),
            'value'      => get_tutor_option( 'enable_course_duration' ) ? ( get_tutor_course_duration_context() ? get_tutor_course_duration_context() . ' ' . __("Duration", "tutor") : false ) : null,
        ),
        array(
            'icon_class' => 'tutor-icon-refresh-o',
            'label'      => __( 'Last Updated', 'tutor' ),
            'value'      => get_tutor_option( 'enable_course_update_date' ) ? get_the_modified_date( get_option( 'date_format' ) ) . ' ' . __("Last Updated", "tutor") : null,
        ),
    );

    // Add level if enabled
    if(tutor_utils()->get_option('enable_course_level', true, true)) {
        array_unshift($default_meta, array(
            'icon_class' => 'tutor-icon-level',
            'label'      => __( 'Level', 'tutor' ),
            'value'      => get_tutor_course_level( get_the_ID() ),
        ));
    }

    // Right sidebar meta data
    $sidebar_meta = apply_filters('tutor/course/single/sidebar/metadata', $default_meta, get_the_ID() );
    $login_url = tutor_utils()->get_option( 'enable_tutor_native_login', null, true, true ) ? '' : wp_login_url( tutor()->current_url );
?>
<div class="course__border"></div>
<div class="tutor-enrolled-btn-wrap">
    
        <?php
        if ( $is_enrolled || $is_privileged_user) {
            ob_start();

            // Course Info
            $completed_percent   = tutor_utils()->get_course_completed_percent();
            $is_completed_course = tutor_utils()->is_completed_course();
            $retake_course       = tutor_utils()->can_user_retake_course();
            $course_id           = get_the_ID();
            $course_progress     = tutor_utils()->get_course_completed_percent( $course_id, 0, true );
            ?>
            <!-- course progress -->
   
            <?php
            $start_content = '';

            // The user is enrolled anyway. No matter manual, free, purchased, woocommerce, edd, membership
            do_action( 'tutor_course/single/actions_btn_group/before' );

            // Show Start/Continue/Retake Button
            if ( $lesson_url ) {
                $button_class = 'tutor-btn ' .
                                ( $retake_course ? 'tutor-btn-outline-primary' : 'tutor-btn-primary' ) .
                                ' tutor-btn-block-disable' .
                                ( $retake_course ? ' tutor-course-retake-button' : '' );

                // Button identifier class
                $button_identifier = 'start-continue-retake-button';
                $tag               = $retake_course ? 'button' : 'a';
                ob_start();
                ?>
                    <<?php echo $tag; ?> <?php echo $retake_course ? 'disabled="disabled"' : ''; ?> href="<?php echo esc_url( $lesson_url ); ?>" class="<?php echo esc_attr( $button_class . ' ' . $button_identifier ); ?>" data-course_id="<?php echo esc_attr( get_the_ID() ); ?>">
                    <?php
                    if ( $retake_course ) {
                        esc_html_e( 'Retake This Course', 'tutor' );
                    } elseif ( $completed_percent <= 0 ) {
                        esc_html_e( 'Start Learning', 'tutor' );
                    } else {
                        esc_html_e( 'Continue Learning', 'tutor' );
                    }
                    ?>
                    </<?php echo $tag; ?>>
                    <?php
                    $start_content = ob_get_clean();
            }
            echo apply_filters( 'tutor_course/single/start/button', $start_content, get_the_ID() );

            // Show Course Completion Button.
            if ( ! $is_completed_course ) {
                ob_start();
                ?>
                <form method="post" class="tutor-complete-course-edubin">
                    <?php wp_nonce_field( tutor()->nonce_action, tutor()->nonce ); ?>

                    <input type="hidden" value="<?php echo esc_attr( get_the_ID() ); ?>" name="course_id"/>
                    <input type="hidden" value="tutor_complete_course" name="tutor_action"/>

                    <button type="submit" class="tutor-btn tutor-btn-outline-primary tutor-btn-block-disable" name="complete_course_btn" value="complete_course">
                        <?php esc_html_e( 'Complete Course', 'tutor' ); ?>
                    </button>
                </form>
                <?php
                echo apply_filters( 'tutor_course/single/complete_form', ob_get_clean() );
            }

            ?>
 
            <?php
            do_action( 'tutor_course/single/actions_btn_group/after' );
            echo apply_filters( 'tutor/course/single/entry-box/is_enrolled', ob_get_clean(), get_the_ID() );
        } else if ( $is_public ) {
            // Get the first content url
            $first_lesson_url = tutor_utils()->get_course_first_lesson( get_the_ID(), tutor()->lesson_post_type );
            !$first_lesson_url ? $first_lesson_url = tutor_utils()->get_course_first_lesson( get_the_ID() ) : 0;
            ob_start();
            ?>
                <a href="<?php echo esc_url( $first_lesson_url ); ?>" class="tutor-btn tutor-btn-primary tutor-btn-lg tutor-btn-block-disable">
                    <?php esc_html_e( 'Start Learning', 'tutor' ); ?>
                </a>
            <?php
            echo apply_filters( 'tutor/course/single/entry-box/is_public', ob_get_clean(), get_the_ID() );
        } else {
            // The course enroll options like purchase or free enrollment
            $price = apply_filters( 'get_tutor_course_price', null, get_the_ID() );

            if ( tutor_utils()->is_course_fully_booked( null ) ) {
                ob_start();
                ?>
                    <div class="tutor-alert tutor-warning tutor-mt-28">
                        <div class="tutor-alert-text">
                            <span class="tutor-icon-circle-info tutor-alert-icon tutor-mr-12" area-hidden="true"></span>
                            <span>
                                <?php esc_html_e( 'This course is full right now. We limit the number of students to create an optimized and productive group dynamic.', 'tutor' ); ?>
                            </span>
                        </div>
                    </div>
                <?php
                echo apply_filters( 'tutor/course/single/entry-box/fully_booked', ob_get_clean(), get_the_ID() );
            } elseif ( $is_purchasable && $price && $tutor_course_sell_by ) {
                // Load template based on monetization option
                ob_start();
                tutor_load_template( 'single.course.add-to-cart-' . $tutor_course_sell_by );
                echo apply_filters( 'tutor/course/single/entry-box/purchasable', ob_get_clean(), get_the_ID() );
            } else {
                ob_start();
                ?>
                    <div class="tutor-course-single-pricing">
                        <span class="tutor-fs-4 tutor-fw-bold tutor-color-black">
                            <?php esc_html_e( 'Free', 'tutor' ); ?>
                        </span>
                    </div>

                    <div class="tutor-course-single-btn-group <?php echo is_user_logged_in() ? '' : 'tutor-course-entry-box-login'; ?>" data-login_url="<?php echo $login_url; ?>">
                        <form class="tutor-enrol-course-form" method="post">
                            <?php wp_nonce_field( tutor()->nonce_action, tutor()->nonce ); ?>
                            <input type="hidden" name="tutor_course_id" value="<?php echo esc_attr( get_the_ID() ); ?>">
                            <input type="hidden" name="tutor_course_action" value="_tutor_course_enroll_now">
                            <button type="submit" class="tutor-btn tutor-btn-primary tutor-btn-lg tutor-btn-block-disable tutor-mt-24-edubin tutor-enroll-course-button tutor-static-loader">
                                <?php esc_html_e( 'Enroll now', 'tutor' ); ?>
                            </button>
                        </form>
                    </div>

                    <div class="tutor-fs-7 tutor-color-muted tutor-text-center">
                        <?php esc_html_e( 'Free access this course', 'tutor' ); ?>
                    </div>
                <?php
                echo apply_filters( 'tutor/course/single/entry-box/free', ob_get_clean(), get_the_ID() );
            }
        }

        do_action('tutor_course/single/entry/after', get_the_ID());
        ?>
  


</div>

<?php
if ( ! is_user_logged_in() ) {
    tutor_load_template_from_custom_path( tutor()->path . '/views/modal/login.php' );
}
?>

            