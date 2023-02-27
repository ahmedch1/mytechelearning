<?php

    $settings   = $this->get_settings_for_display();

    $lp_course_archive_style = $settings['course_style'];
    $lp_course_archive_clm = $settings['posts_column'];
    $lp_archive_media_show = $settings['media_show'];
    $lp_cat_show = $settings['show_cat'];
    $lp_price_show = $settings['show_price'];
    $lp_review_show = $settings['show_review'];
    $lp_review_text_show =  $settings['show_review_text'];
    $lp_instructor_img_on_off = $settings['show_author_avator'];
    $lp_instructor_name_on_off = $settings['show_author_name'];
    $lp_archive_title_show = $settings['show_title'];
    $lp_excerpt_show =  $settings['show_excerpt'];
    $lp_enroll_show =  $settings['show_enroll'];
    $lp_lesson_show =  $settings['show_lesson'];
    $lp_quiz_show =  $settings['show_quiz'];
    $lp_level_show =  $settings['show_level'];
    $lp_wishlist_show =  $settings['show_wishlist'];
    
    if ($settings['posts_column'] == '12') : 
        $lp_course_archive_clm = '1';
    elseif ($settings['posts_column'] == '6') : 
        $lp_course_archive_clm = '2';
    elseif ($settings['posts_column'] == '4') : 
        $lp_course_archive_clm = '3';
    elseif ($settings['posts_column'] == '3') :
        $lp_course_archive_clm = '4';
    elseif ($settings['course_style'] == '2') :
        $lp_course_archive_clm = '6';
    endif; 

?>     
   <div class="edubin-course layout__<?php echo esc_attr($lp_course_archive_style); ?> <?php if (class_exists('LP_Addon_Course_Review_Preload') && $lp_review_show ) { echo esc_attr('review__show'); } ?> col__<?php echo esc_attr($lp_course_archive_clm); ?>">
      <div class="course__container">
         <div class="course__media intro-video-sidebar tpc_mb_0">

              <?php 
                if ( $lp_archive_media_show ) {
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/lp/media.php';
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