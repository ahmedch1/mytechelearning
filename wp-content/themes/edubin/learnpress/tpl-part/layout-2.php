<?php

    $defaults = edubin_generate_defaults();
    $lp_course_archive_style = get_theme_mod( 'lp_course_archive_style', $defaults['lp_course_archive_style']);
    $lp_instructor_img_on_off = get_theme_mod( 'lp_instructor_img_on_off', $defaults['lp_instructor_img_on_off']);
    $lp_instructor_name_on_off = get_theme_mod( 'lp_instructor_name_on_off', $defaults['lp_instructor_name_on_off']);
    $lp_archive_title_show = get_theme_mod( 'lp_archive_title_show', $defaults['lp_archive_title_show']);
    $lp_excerpt_show = get_theme_mod( 'lp_excerpt_show', $defaults['lp_excerpt_show']);
    $lp_cat_show = get_theme_mod( 'lp_cat_show', $defaults['lp_cat_show']);
    $lp_archive_media_show = get_theme_mod( 'lp_archive_media_show', $defaults['lp_archive_media_show']);
    $lp_lesson_show = get_theme_mod( 'lp_lesson_show', $defaults['lp_lesson_show']);
    // $lp_duration_show = get_theme_mod( 'lp_duration_show', $defaults['lp_duration_show']);
    $lp_price_show = get_theme_mod( 'lp_price_show', $defaults['lp_price_show']);
    $lp_enroll_show = get_theme_mod( 'lp_enroll_show', $defaults['lp_enroll_show']);
    $lp_review_show = get_theme_mod( 'lp_review_show', $defaults['lp_review_show']);
    $lp_review_text_show = get_theme_mod( 'lp_review_text_show', $defaults['lp_review_text_show']);
    $lp_level_show = get_theme_mod( 'lp_level_show', $defaults['lp_level_show']);
    $lp_wishlist_show = get_theme_mod( 'lp_wishlist_show', $defaults['lp_wishlist_show']);
    $lp_quiz_show = get_theme_mod( 'lp_quiz_show', $defaults['lp_quiz_show']);
    
    $lp_course_archive_clm = get_theme_mod( 'lp_course_archive_clm', $defaults['lp_course_archive_clm']);
    $lp_course_archive_clm_modify = get_theme_mod( 'lp_course_archive_clm', $defaults['lp_course_archive_clm']);

        if ($lp_course_archive_clm_modify == '12') : 
        $lp_course_archive_clm_final = '1';
    elseif ($lp_course_archive_clm_modify == '6') : 
        $lp_course_archive_clm_final = '2';
    elseif ($lp_course_archive_clm_modify == '4') : 
        $lp_course_archive_clm_final = '3';
    elseif ($lp_course_archive_clm_modify == '3') :
        $lp_course_archive_clm_final = '4';
    elseif ($lp_course_archive_clm_modify == '2') :
        $lp_course_archive_clm_final = '6';
    endif; 

?>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-<?php echo esc_attr($lp_course_archive_clm); ?>">

   <div class="edubin-course layout__<?php echo esc_attr($lp_course_archive_style); ?> <?php if (class_exists('LP_Addon_Course_Review_Preload') && $lp_review_show ) { echo esc_attr('review__show'); } ?> col__<?php echo esc_attr($lp_course_archive_clm_final); ?>">
      <div class="course__container">
         <div class="course__media intro-video-sidebar tpc_mb_0">

              <?php 
                if ( $lp_archive_media_show ) {
                    get_template_part( 'learnpress/tpl-part/media'); 
                }
                if ( $lp_cat_show ) {
                    get_template_part( 'learnpress/tpl-part/category'); 
                }
                if ( $lp_price_show ) { ?>
                    <div class="price__2">
                       <?php get_template_part( 'learnpress/tpl-part/price'); ?>
                    </div>
               <?php } 
            ?>
         </div>
         <div class="course__content">
            <div class="course__content--info">

                <?php
                if ( $lp_archive_title_show ) {
                    get_template_part( 'learnpress/tpl-part/title'); 
                }
                if ( $lp_excerpt_show ) {
                    get_template_part( 'learnpress/tpl-part/excerpt_text'); 
                }
            ?>
                <?php        
                     if ( class_exists('LP_Addon_Course_Review_Preload') && $lp_review_show ): ?>
                        <div class="edubin-course-rate">
                            <?php   
                                if ( $lp_review_show ) {
                                    get_template_part( 'learnpress/tpl-part/review'); 
                                } 
                                if ( $lp_review_text_show) {
                                    get_template_part( 'learnpress/tpl-part/review_text'); 
                                } 
                            ?>
                        </div>
                <?php endif; ?><!--  End review -->
            </div>

            <div class="course__border"></div>

            <div class="course__content--meta">

                <?php if ( $lp_instructor_img_on_off || $lp_instructor_name_on_off): ?>
                    <div class="author__name <?php echo $lp_course_archive_style == '1' ? ' tpc_mt_15' : ''; ?>">
                        <?php          
                            if ( $lp_instructor_img_on_off ) {
                                get_template_part( 'learnpress/tpl-part/author_avator'); 
                            } 
                            if ( $lp_instructor_name_on_off ) {
                                get_template_part( 'learnpress/tpl-part/author_name'); 
                            }  
                        ?>
                    </div>  
                <?php endif ?> 

                <div class="course__meta-right">
                <?php                 
                    if ( $lp_enroll_show ) {
                        get_template_part( 'learnpress/tpl-part/students'); 
                    }                 
                    if ( $lp_lesson_show ) {
                        get_template_part( 'learnpress/tpl-part/lessons'); 
                    }                 
                    if ( $lp_quiz_show ) {
                        get_template_part( 'learnpress/tpl-part/quiz'); 
                    } 
                ?>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
