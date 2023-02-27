<?php

    $defaults = edubin_generate_defaults();
    $tutor_course_archive_style = get_theme_mod( 'tutor_course_archive_style', $defaults['tutor_course_archive_style']);
    $tutor_instructor_img_on_off = get_theme_mod( 'tutor_instructor_img_on_off', $defaults['tutor_instructor_img_on_off']);
    $tutor_instructor_name_on_off = get_theme_mod( 'tutor_instructor_name_on_off', $defaults['tutor_instructor_name_on_off']);
    $tutor_archive_title_show = get_theme_mod( 'tutor_archive_title_show', $defaults['tutor_archive_title_show']);
    $tutor_excerpt_show = get_theme_mod( 'tutor_excerpt_show', $defaults['tutor_excerpt_show']);
    $tutor_cat_show = get_theme_mod( 'tutor_cat_show', $defaults['tutor_cat_show']);
    $tutor_archive_media_show = get_theme_mod( 'tutor_archive_media_show', $defaults['tutor_archive_media_show']);
    $tutor_lesson_show = get_theme_mod( 'tutor_lesson_show', $defaults['tutor_lesson_show']);
    $tutor_duration_show = get_theme_mod( 'tutor_duration_show', $defaults['tutor_duration_show']);
    $tutor_price_show = get_theme_mod( 'tutor_price_show', $defaults['tutor_price_show']);
    $tutor_enroll_show = get_theme_mod( 'tutor_enroll_show', $defaults['tutor_enroll_show']);
    $tutor_review_show = get_theme_mod( 'tutor_review_show', $defaults['tutor_review_show']);
    $tutor_show_review_text = get_theme_mod( 'tutor_show_review_text', $defaults['tutor_show_review_text']);
    $tutor_quiz_show = get_theme_mod( 'tutor_quiz_show', $defaults['tutor_quiz_show']);
    
    // Get option for tutor LMS plugin
    $tutor_course_archive_clm = tutor_utils()->get_option( 'courses_col_per_row', 3 );

?>

   <div class="edubin-course layout__<?php echo esc_attr($tutor_course_archive_style); ?> <?php if ($tutor_review_show ) { echo esc_attr('review__show'); } ?> col__<?php echo esc_attr( $tutor_course_archive_clm ); ?>">
      <div class="course__container">
         <div class="course__media">

              <?php 
                if ( $tutor_archive_media_show ) {
                    get_template_part( 'tutor/tpl-part/media'); 
                }
                if ( $tutor_cat_show ) {
                    get_template_part( 'tutor/tpl-part/category'); 
                }
                if ( $tutor_price_show ) { ?>
                    <div class="price__2">
                       <?php get_template_part( 'tutor/tpl-part/price'); ?>
                    </div>
               <?php } 
            ?>
       
        <div class="course__content--meta layout__5">

            <?php if ( $tutor_instructor_img_on_off || $tutor_instructor_name_on_off): ?>
                <div class="author__name <?php echo $tutor_course_archive_style == '1' ? ' tpc_mt_15' : ''; ?>">
                    <?php          
                        if ( $tutor_instructor_img_on_off ) {
                            get_template_part( 'tutor/tpl-part/author_avator'); 
                        } 
                        if ( $tutor_instructor_name_on_off ) {
                            get_template_part( 'tutor/tpl-part/author_name'); 
                        }  
                    ?>
                </div>  
            <?php endif ?> 

            <?php 
                 if ( $tutor_review_show ): ?>
                    <div class="edubin-course-rate">
                        <?php   
                            if ( $tutor_review_show ) {
                                get_template_part( 'tutor/tpl-part/review'); 
                            } 
                            if ( $tutor_show_review_text) {
                                get_template_part( 'tutor/tpl-part/review_text'); 
                            } 
                        ?>
                    </div>
            <?php endif; ?><!--  End review -->
        </div>
    </div>

         <div class="course__content">

            <div class="course__content--info">
                <?php 
                    if ( $tutor_archive_title_show ) {
                        get_template_part( 'tutor/tpl-part/title'); 
                    }
                    if ( $tutor_excerpt_show ) {
                        get_template_part( 'tutor/tpl-part/excerpt_text'); 
                    }
                ?>
            </div>

         </div>

      </div>
   </div>

