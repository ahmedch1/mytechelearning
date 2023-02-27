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
    $tutor_wishlist_show = get_theme_mod( 'tutor_wishlist_show', $defaults['tutor_wishlist_show']);
    $tutor_level_show = get_theme_mod( 'tutor_level_show', $defaults['tutor_level_show']);
    // $tutor_show_btn = get_theme_mod( 'tutor_show_btn', $defaults['tutor_show_btn']);
    $tutor_permalink_type = get_theme_mod( 'tutor_permalink_type', $defaults['tutor_permalink_type']);
    $tutor_see_more_text = get_theme_mod( 'tutor_see_more_text', $defaults['tutor_see_more_text']);

    // Get option for tutor LMS plugin
    $tutor_course_archive_clm = tutor_utils()->get_option( 'courses_col_per_row', 3 );

?> 

<div class="edubin-course layout__<?php echo esc_attr($tutor_course_archive_style); ?> col__<?php echo esc_attr($tutor_course_archive_clm); ?>">
      <div class="course__container">
         <div class="course__media">
            <?php 
                if ( $tutor_archive_media_show ) {
                    get_template_part( 'tutor/tpl-part/media'); 
                }
               if ( $tutor_level_show ) {
                   get_template_part( 'tutor/tpl-part/level'); 
               }
               if ( $tutor_wishlist_show ) {
                   get_template_part( 'tutor/tpl-part/wishlist'); 
               }
            ?>
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
            
            <div class="course__border"></div>

            <div class="course__content--meta">

                <?php if (  $tutor_review_show ): ?>
                <div class="course__meta-left">

                        <div class="edubin-course-rate tpc_pt_0">
                            <?php   
                                if ( $tutor_review_show ) {
                                    get_template_part( 'tutor/tpl-part/review'); 
                                } 
                                // if ( $tutor_show_review_text) {
                                //     get_template_part( 'tutor/tpl-part/review_text'); 
                                // } 
                            ?>
                        </div>

                </div>
                <?php endif; ?><!--  End review -->

                <?php if (  $tutor_enroll_show ||  $tutor_lesson_show || $tutor_quiz_show): ?>
                    <div class="course__meta-center">
                        <?php                 
                            if ( $tutor_enroll_show ) {
                                get_template_part( 'tutor/tpl-part/students'); 
                            }                 
                            if ( $tutor_lesson_show ) {
                                get_template_part( 'tutor/tpl-part/lessons'); 
                            }                                        
                            if ( $tutor_quiz_show ) {
                                get_template_part( 'tutor/tpl-part/quiz'); 
                            } 
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (  $tutor_price_show || $tutor_permalink_type == 'tutor_archive_dynamic_url' || $tutor_permalink_type == 'tutor_archive_permalink' ): ?>
                <div class="course__meta-right">
                    <?php 
                        if ( $tutor_permalink_type == 'tutor_archive_dynamic_url') : ?>
                            <?php get_template_part( 'tutor/tpl-part/see_more'); 

                        elseif ( $tutor_permalink_type == 'tutor_archive_permalink' ) : ?>
                            <a href="<?php the_permalink(); ?>">
                               <?php echo $tutor_see_more_text; ?>                           
                            </a>  
                       <?php else: ?>
                            <div class="price__1">
                               <?php get_template_part( 'tutor/tpl-part/price'); ?>
                            </div>
                      <?php endif;
                    ?>
                </div> 
                <?php endif; ?>

            </div><!-- End course__content--meta -->

         </div>
      </div>
   </div>
