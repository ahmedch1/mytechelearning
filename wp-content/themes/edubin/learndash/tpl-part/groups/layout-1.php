<?php

    $defaults = edubin_generate_defaults();
    $ld_course_archive_style = get_theme_mod( 'ld_course_archive_style', $defaults['ld_course_archive_style']);
    $ld_course_archive_clm = get_theme_mod( 'ld_course_archive_clm', $defaults['ld_course_archive_clm']);
    $ld_instructor_img_on_off = get_theme_mod( 'ld_instructor_img_on_off', $defaults['ld_instructor_img_on_off']);
    $ld_instructor_name_on_off = get_theme_mod( 'ld_instructor_name_on_off', $defaults['ld_instructor_name_on_off']);
    $ld_archive_title_show = get_theme_mod( 'ld_archive_title_show', $defaults['ld_archive_title_show']);
    $ld_excerpt_show = get_theme_mod( 'ld_excerpt_show', $defaults['ld_excerpt_show']);
    $ld_cat_show = get_theme_mod( 'ld_cat_show', $defaults['ld_cat_show']);
    $ld_archive_media_show = get_theme_mod( 'ld_archive_media_show', $defaults['ld_archive_media_show']);
    $ld_topic_show = get_theme_mod( 'ld_topic_show', $defaults['ld_topic_show']);
    $ld_topic_text_show = get_theme_mod( 'ld_topic_text_show', $defaults['ld_topic_text_show']);
    $ld_lesson_show = get_theme_mod( 'ld_lesson_show', $defaults['ld_lesson_show']);
    $ld_lesson_text_show = get_theme_mod( 'ld_lesson_text_show', $defaults['ld_lesson_text_show']);
    $ld_price_show = get_theme_mod( 'ld_price_show', $defaults['ld_price_show']);
    $ld_enroll_show = get_theme_mod( 'ld_enroll_show', $defaults['ld_enroll_show']);
    $ld_review_show = get_theme_mod( 'ld_review_show', $defaults['ld_review_show']);
    $ld_review_text_show = get_theme_mod( 'ld_review_text_show', $defaults['ld_review_text_show']);
    $ld_quiz_show = get_theme_mod( 'ld_quiz_show', $defaults['ld_quiz_show']);

?>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-<?php echo esc_attr($ld_course_archive_clm); ?>">
    
  <div class="edubin-course layout__<?php echo esc_attr($ld_course_archive_style); ?> <?php if ( function_exists( 'ldcr_course_rating_stars' ) && $ld_review_show ) { echo esc_attr('review__show'); } ?> col__<?php echo esc_attr( $ld_course_archive_clm ); ?>">
      <div class="course__container">
         <div class="course__media">
            <?php 
                if ( $ld_archive_media_show ) {
                    get_template_part( 'learndash/tpl-part/groups/media'); 
                }
                if ( $ld_cat_show ) {
                   get_template_part( 'learndash/tpl-part/groups/category'); 
                }
            ?>
         </div>
         <div class="course__content">

            <div class="course__content--info">
                <?php 
                     if ( function_exists( 'ldcr_course_rating_stars' )  && $ld_review_show ): ?>
                        <div class="edubin-course-rate">
                            <?php   
                                if ( $ld_review_show ) {
                                    get_template_part( 'learndash/tpl-part/groups/review'); 
                                } 
                                if ( $ld_review_text_show ) {
                                  get_template_part( 'learndash/tpl-part/groups/review_text'); 
                                } 
                            ?>
                        </div>
                <?php endif; ?><!--  End review -->
                
                <?php
                    if ( $ld_archive_title_show ) {
                        get_template_part( 'learndash/tpl-part/groups/title'); 
                    }
                    if ( $ld_excerpt_show ) {
                        get_template_part( 'learndash/tpl-part/groups/excerpt_text'); 
                    }
                ?>

            </div>
            
            <div class="course__border"></div>

            <div class="course__content--meta">
                <div class="course__meta-left">

                   <?php if ( $ld_instructor_img_on_off || $ld_instructor_name_on_off ): ?>
                    <div class="author__name <?php echo $ld_course_archive_style == '1' ? ' ' : ''; ?>">
                        <?php          
                            if ( $ld_instructor_img_on_off ) {
                                get_template_part( 'learndash/tpl-part/groups/author_avator'); 
                            } 
                            if ( $ld_instructor_name_on_off ) {
                                get_template_part( 'learndash/tpl-part/groups/author_name'); 
                            }  
                        ?>
                    </div>  
                <?php endif; ?> 

                </div>
                <div class="course__meta-right">
                    <?php 
                        if ( $ld_price_show ) { ?>
                            <div class="price__1">
                               <?php get_template_part( 'learndash/tpl-part/groups/price'); ?>
                            </div>
                       <?php } 
                    ?>
                </div> 
            </div><!-- End course__content--meta -->

         </div>
      </div>
   </div>

</div>