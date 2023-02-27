<?php

    $settings   = $this->get_settings_for_display();

    $sensei_course_archive_style = $settings['course_style'];
    $sensei_course_archive_clm = $settings['posts_column'];
    $sensei_archive_media_show = $settings['media_show'];
    $sensei_cat_show = $settings['show_cat'];
    $sensei_price_show = $settings['show_price'];
    // $sensei_review_show = $settings['show_review'];
    // $sensei_review_text_show =  $settings['show_review_text'];
    $sensei_instructor_img_on_off = $settings['show_author_avator'];
    $sensei_instructor_name_on_off = $settings['show_author_name'];
    $sensei_archive_title_show = $settings['show_title'];
    $sensei_excerpt_show =  $settings['show_excerpt'];
    // $sensei_enroll_show =  $settings['show_enroll'];
    $sensei_lesson_show =  $settings['show_lesson'];
    $sensei_lesson_text_show =  $settings['show_lesson_text'];
    // $sensei_quiz_show =  $settings['show_quiz'];
    // $sensei_level_show =  $settings['show_level'];
    // $sensei_wishlist_show =  $settings['show_wishlist'];
    
    if ($settings['posts_column'] == '12') : 
        $sensei_course_archive_clm = '1';
    elseif ($settings['posts_column'] == '6') : 
        $sensei_course_archive_clm = '2';
    elseif ($settings['posts_column'] == '4') : 
        $sensei_course_archive_clm = '3';
    elseif ($settings['posts_column'] == '3') :
        $sensei_course_archive_clm = '4';
    elseif ($settings['course_style'] == '2') :
        $sensei_course_archive_clm = '6';
    endif; 

?> 

<div class="edubin-course layout__<?php echo esc_attr($sensei_course_archive_style); ?> col__<?php echo esc_attr($sensei_course_archive_clm); ?>">
      <div class="course__container">
         <div class="course__media">
            <?php 
                if ( $sensei_archive_media_show ) {
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/lp/media.php';
                }
              if ( $sensei_cat_show ) {
                   get_template_part( 'sensei/tpl-part/category'); 
              }
               // if ( $sensei_wishlist_show ) {
               //    get_template_part( 'sensei/tpl-part/wishlist'); 
               // }
            ?>
         </div>
         <div class="course__content">

            <div class="course__content--info">
                
                <?php
                    if ( $sensei_archive_title_show ) {
                        get_template_part( 'sensei/tpl-part/title'); 
                    }
                    if ( $sensei_excerpt_show ) {
                        get_template_part( 'sensei/tpl-part/excerpt_text'); 
                    }
                    ?>

            </div>
            
            <div class="course__border"></div>

            <div class="course__content--meta">

                <?php if ( $sensei_lesson_show ): ?>
                    <div class="course__meta-center">
                        <?php                 
                            if ( $sensei_lesson_show ) {
                                get_template_part( 'sensei/tpl-part/lessons'); 
                            }   
                            if ( $sensei_lesson_text_show ) {
                                get_template_part( 'sensei/tpl-part/lessons_text'); 
                            }                
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (  $sensei_price_show ): ?>
                <div class="course__meta-right">
                  <?php 
                        if ( $sensei_price_show ) { ?>
                            <div class="price__1">
                               <?php get_template_part( 'sensei/tpl-part/price'); ?>
                            </div>
                       <?php } 
                    ?>
                </div> 
                <?php endif; ?>

            </div><!-- End course__content--meta -->

         </div>
      </div>
   </div>