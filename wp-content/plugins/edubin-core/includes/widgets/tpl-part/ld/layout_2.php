<?php

    $settings   = $this->get_settings_for_display();

    $ld_course_archive_style = $settings['course_style'];
    $ld_archive_media_show = $settings['media_show'];
    $ld_cat_show = $settings['show_cat'];
    $ld_price_show = $settings['show_price'];
    $ld_review_show = $settings['show_review'];
    $ld_review_text_show =  $settings['show_review_text'];
    $ld_instructor_img_on_off = $settings['show_author_avator'];
    $ld_instructor_name_on_off = $settings['show_author_name'];
    $ld_archive_title_show = $settings['show_title'];
    $ld_topic_show =  $settings['show_topic'];
    $ld_topic_text_show =  $settings['show_topic_text'];
    $ld_excerpt_show =  $settings['show_excerpt'];
    $ld_lesson_show =  $settings['show_lesson'];
    $ld_lesson_text_show =  $settings['show_lesson_text'];

    if ($settings['posts_column'] == '12') : 
        $ld_course_archive_clm = '1';
    elseif ($settings['posts_column'] == '6') : 
        $ld_course_archive_clm = '2';
    elseif ($settings['posts_column'] == '4') : 
        $ld_course_archive_clm = '3';
    elseif ($settings['posts_column'] == '3') :
        $ld_course_archive_clm = '4';
    elseif ($settings['course_style'] == '2') :
        $ld_course_archive_clm = '6';
    endif; 
?> 

  <div class="edubin-course layout__<?php echo esc_attr($ld_course_archive_style); ?> <?php if ( function_exists( 'ldcr_course_rating_stars' ) && $ld_review_show ) { echo esc_attr('review__show'); } ?> col__<?php echo esc_attr( $ld_course_archive_clm ); ?>">
      <div class="course__container">
         <div class="course__media intro-video-sidebar tpc_mb_0">

              <?php 
                if ( $ld_archive_media_show ) {
                    require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/ld/media.php';
                }
                if ( $ld_cat_show ) {
                    get_template_part( 'learndash/tpl-part/category'); 
                }
                if ( $ld_price_show ) { ?>
                    <div class="price__2">
                       <?php get_template_part( 'learndash/tpl-part/price'); ?>
                    </div>
               <?php } 
            ?>
         </div>
         <div class="course__content">
            <div class="course__content--info">

                <?php
                if ( $ld_archive_title_show ) {
                    get_template_part( 'learndash/tpl-part/title'); 
                }
                if ( $ld_excerpt_show ) {
                    get_template_part( 'learndash/tpl-part/excerpt_text'); 
                }
            ?>
                <?php        
                     if ( function_exists( 'ldcr_course_rating_stars' ) && $ld_review_show ): ?>
                        <div class="edubin-course-rate">
                            <?php   
                                if ( $ld_review_show ) {
                                    get_template_part( 'learndash/tpl-part/review'); 
                                } 
                                if ( $ld_review_text_show) {
                                    get_template_part( 'learndash/tpl-part/review_text'); 
                                } 
                            ?>
                        </div>
                <?php endif; ?><!--  End review -->
            </div>

            <div class="course__border"></div>

            <div class="course__content--meta">

                <?php if ( $ld_instructor_img_on_off || $ld_instructor_name_on_off): ?>
                    <div class="author__name <?php echo $ld_course_archive_style == '1' ? ' tpc_mt_15' : ''; ?>">
                        <?php          
                            if ( $ld_instructor_img_on_off ) {
                                get_template_part( 'learndash/tpl-part/author_avator'); 
                            } 
                            if ( $ld_instructor_name_on_off ) {
                                get_template_part( 'learndash/tpl-part/author_name'); 
                            }  
                        ?>
                    </div>  
                <?php endif ?> 

                <div class="course__meta-right">

                <?php if ( $ld_lesson_show ) { ?>
                     <span class="course-lessons">
                        <?php                                
                            if ( $ld_lesson_show ) {
                               get_template_part( 'learndash/tpl-part/lessons'); 
                            }                              
                            if ( $ld_lesson_text_show ) {
                               get_template_part( 'learndash/tpl-part/lessons_text'); 
                            }   
                        ?>
                    </span>
                <?php } ?> 

                <?php if ( $ld_topic_show ) { ?>     
                    <span class="course-topic">
                        <?php 
                            if ( $ld_topic_show ) {
                                get_template_part( 'learndash/tpl-part/topic'); 
                            }                                      
                            if ( $ld_topic_text_show ) {
                                get_template_part( 'learndash/tpl-part/topic_text'); 
                            }                                      
                        ?>
                    </span>
                <?php } ?> 

                </div>
            </div>
         </div>
      </div>
   </div>