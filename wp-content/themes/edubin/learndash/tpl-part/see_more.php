    <?php
    
    $defaults = edubin_generate_defaults();
    $tutor_see_more_text = get_theme_mod( 'tutor_see_more_text', $defaults['tutor_see_more_text']);
    $tutor_permalink_type = get_theme_mod( 'tutor_permalink_type', $defaults['tutor_permalink_type']);
    $tutor_archive_dynamic_url = get_theme_mod( 'tutor_archive_dynamic_url', $defaults['tutor_archive_dynamic_url']);

     if($tutor_permalink_type == 'tutor_archive_dynamic_url'):

        $course_id = get_the_ID();
        $enroll_btn = '
                    <a href="'. get_the_permalink(). '" class="tutor-btn tutor-pr-0 tutor-pl-0 tutor-btn-disable-outline tutor-btn-md tutor-btn-full">
                        ' . __( 'Start Learning', 'edubin' ) . '
                    </a>
                ';

        $lesson_url = tutor_utils()->get_course_first_lesson();
        $completed_lessons = tutor_utils()->get_completed_lesson_count_by_course();
        $completed_percent = tutor_utils()->get_course_completed_percent();
        $is_completed_course = tutor_utils()->is_completed_course();
        $retake_course = tutor_utils()->get_option( 'course_retake_feature', false ) && ( $is_completed_course || $completed_percent >= 100 );
        $button_class = 'tutor-btn tutor-btn-disable-outline tutor-btn-outline-fd tutor-btn-md tutor-btn-full tutor-pr-0 tutor-pl-0 ' . ( $retake_course ? ' tutor-course-retake-button' : '' );

        if ( $lesson_url && ! $is_completed_course ) { 
        ob_start();
        ?>
        <a href="<?php echo $lesson_url; ?>" class="<?php echo $button_class; ?>" data-course_id="<?php echo get_the_ID(); ?>">
            <?php
                if ( ! $is_completed_course && $completed_percent != 0 ) {
                    esc_html_e( 'Continue Learning', 'edubin' );
                }
                if ( $completed_percent == 0 && ! $is_completed_course ) {
                    esc_html_e( 'Start Learning', 'edubin' );
                }
            ?>
        </a>
        <?php 
        $enroll_btn = ob_get_clean();
        }

        echo apply_filters( 'tutor_course/loop/start/button', $enroll_btn, get_the_ID() );

        else : ?>
            <a href="<?php the_permalink(); ?>">
               <?php echo $tutor_see_more_text; ?>                           
            </a>   
        <?php 
        endif; 
    ?>
