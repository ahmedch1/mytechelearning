<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    $defaults = edubin_generate_defaults();

    $course              = get_post( get_the_ID() );
    $lesson_count        = Sensei()->course->course_lesson_count( get_the_ID() );

    $sensei_price_show = get_theme_mod( 'sensei_price_show', $defaults['sensei_price_show']); 
    $sensei_lesson_show = get_theme_mod( 'sensei_lesson_show', $defaults['sensei_lesson_show']); 
    $sensei_lesson_text_show = get_theme_mod( 'sensei_lesson_text_show', $defaults['sensei_lesson_text_show']); 
    $sensei_see_more_btn_text = get_theme_mod( 'sensei_see_more_btn_text', $defaults['sensei_see_more_btn_text']); 
    $sensei_cat_show = get_theme_mod( 'sensei_cat_show', $defaults['sensei_cat_show']); 
    $sensei_instructor_img_on_off = get_theme_mod( 'sensei_instructor_img_on_off', $defaults['sensei_instructor_img_on_off']); 
    $sensei_instructor_name_on_off = get_theme_mod( 'sensei_instructor_name_on_off', $defaults['sensei_instructor_name_on_off']); 
    $sensei_excerpt_show = get_theme_mod( 'sensei_excerpt_show', $defaults['sensei_excerpt_show']); 
    $see_more_btn_or_icon = get_theme_mod( 'see_more_btn_or_icon', $defaults['see_more_btn_or_icon']); 
    $sensei_intor_video_image = get_theme_mod( 'sensei_intor_video_image', $defaults['sensei_intor_video_image']); 
    $sensei_custom_placeholder_image = get_theme_mod( 'sensei_custom_placeholder_image', $defaults['sensei_custom_placeholder_image'] ); 
    $sensei_archive_media_show = get_theme_mod( 'sensei_archive_media_show', $defaults['sensei_archive_media_show'] ); 
    $sensei_archive_title_show = get_theme_mod( 'sensei_archive_title_show', $defaults['sensei_archive_title_show'] ); 

    $sensei_course_archive_style = get_theme_mod( 'sensei_course_archive_style', $defaults['sensei_course_archive_style']);
    $sensei_course_archive_clm = get_theme_mod( 'sensei_course_archive_clm', $defaults['sensei_course_archive_clm']);
    $sensei_course_archive_clm_modify = get_theme_mod( 'sensei_course_archive_clm', $defaults['sensei_course_archive_clm']);

        if ($sensei_course_archive_clm_modify == '12') : 
        $sensei_course_archive_clm_final = '1';
    elseif ($sensei_course_archive_clm_modify == '6') : 
        $sensei_course_archive_clm_final = '2';
    elseif ($sensei_course_archive_clm_modify == '4') : 
        $sensei_course_archive_clm_final = '3';
    elseif ($sensei_course_archive_clm_modify == '3') :
        $sensei_course_archive_clm_final = '4';
    elseif ($sensei_course_archive_clm_modify == '2') :
        $sensei_course_archive_clm_final = '6';
    endif; 

    // Sensei course archive image size
    $sensei_course_archive_clm = get_theme_mod( 'sensei_course_archive_clm', $defaults['sensei_course_archive_clm']); 
    $sensei_archive_image_size = get_theme_mod( 'sensei_archive_image_size', $defaults['sensei_archive_image_size']); 

    if ($sensei_archive_image_size == 'medium_large' ) {
    $final_sensei_archive_image_size = 'medium_large'; 
    } else {
    $final_sensei_archive_image_size = !empty(get_intermediate_image_sizes()[$sensei_archive_image_size]);
    }

?>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-<?php echo esc_attr($sensei_course_archive_clm); ?>">

   <div class="edubin-course layout__<?php echo esc_attr($sensei_course_archive_style); ?> col__<?php echo esc_attr($sensei_course_archive_clm_final); ?>">
      <div class="course__container">
         <div class="course__media intro-video-sidebar tpc_mb_0">

              <?php 
                if ( $sensei_archive_media_show ) {
                    get_template_part( 'sensei/tpl-part/media'); 
                }
                if ( $sensei_cat_show ) {
                    get_template_part( 'sensei/tpl-part/category'); 
                }
                if ( $sensei_price_show ) { ?>
                    <div class="price__2">
                       <?php get_template_part( 'sensei/tpl-part/price'); ?>
                    </div>
               <?php } 
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

                <?php if ( $sensei_instructor_img_on_off || $sensei_instructor_name_on_off): ?>
                    <div class="author__name <?php echo $sensei_course_archive_style == '1' ? ' tpc_mt_15' : ''; ?>">
                        <?php          
                            if ( $sensei_instructor_img_on_off ) {
                                get_template_part( 'sensei/tpl-part/author_avator'); 
                            } 
                            if ( $sensei_instructor_name_on_off ) {
                                get_template_part( 'sensei/tpl-part/author_name'); 
                            }  
                        ?>
                    </div>  
                <?php endif ?> 

                <div class="course__meta-right">
                <?php                            
                    if ( $sensei_lesson_show ) {
                        get_template_part( 'sensei/tpl-part/lessons'); 
                    }                                   
                    if ( $sensei_lesson_text_show ) {
                        get_template_part( 'sensei/tpl-part/lessons_text'); 
                    }                 
                ?>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
