<?php

    $settings   = $this->get_settings_for_display();

    $ld_list_show_cat = $settings['list_show_cat'];
    $ld_list_show_price = $settings['list_show_price'];
    $ld_list_show_review = $settings['list_show_review'];
    $ld_list_show_review_text =  $settings['list_show_review_text'];
    $ld_list_show_author_avator = $settings['list_show_author_avator'];
    $ld_list_show_author_name = $settings['list_show_author_name'];
    $ld_list_show_title = $settings['list_show_title'];
    $ld_list_show_excerpt =  $settings['list_show_excerpt'];
    $ld_list_show_lesson =  $settings['list_show_lesson'];
    $ld_list_show_lesson_text =  $settings['list_show_lesson_text'];
    $ld_list_media_show =  $settings['list_media_show'];
    
?>
<div class="col-lg-12">
  <div class="edubin-course edubin-course-list">
    <div class="row tpc_g_30">

      <div class="col-md-5">

          <?php 
              if ( $ld_list_media_show ) {
                  require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/ld/media.php';
              }
              if ( $ld_list_show_cat ) {
                 get_template_part( 'learndash/tpl-part/groups/category'); 
              }
          ?>

      </div>

      <div class="col-md-7">
       <div class="course-content">

        <div class="course__content--meta tpc_pt_0 tpc_pb_0">
            <div class="course__meta-left">

                <?php if ( $ld_lesson_show ) { ?>
                     <span class="course-lessons">
                        <?php                                
                            if ( $ld_lesson_show ) {
                               get_template_part( 'learndash/tpl-part/groups/lessons'); 
                            }                              
                            if ( $ld_lesson_text_show ) {
                               get_template_part( 'learndash/tpl-part/groups/lessons_text'); 
                            }   
                        ?>
                    </span>
                <?php } ?> 

                <?php if ( $ld_topic_show ) { ?>     
                    <span class="course-topic">
                        <?php 
                            if ( $ld_topic_show ) {
                                get_template_part( 'learndash/tpl-part/groups/topic'); 
                            }                                      
                            if ( $ld_topic_text_show ) {
                                get_template_part( 'learndash/tpl-part/groups/topic_text'); 
                            }                                      
                        ?>
                    </span>
                <?php } ?> 
            </div>
            <div class="course__meta-right">
         
                <?php   
                    if ( $ld_review_show ) {
                        get_template_part( 'learndash/tpl-part/groups/review'); 
                    } 
                    if ( $ld_review_text_show) {
                        get_template_part( 'learndash/tpl-part/groups/review_text'); 
                    } 
                ?>
    

            </div>
        </div>
              <?php
                    if ( $ld_archive_title_show ) {
                        get_template_part( 'learndash/tpl-part/groups/title'); 
                    }
                    if ( $ld_list_show_excerpt ) {
                        get_template_part( 'learndash/tpl-part/groups/excerpt_text'); 
                    }
                ?>

                  <div class="course-bottom tpc_mt_10">

                    <div class="course__content--meta">

                          <div class="course__meta-left">

                           <?php if ( $ld_instructor_img_on_off || $ld_instructor_name_on_off): ?>
                            <div class="author__name">
                                <?php          
                                    if ( $ld_instructor_img_on_off ) {
                                        get_template_part( 'learndash/tpl-part/groups/author_avator'); 
                                    } 
                                    if ( $ld_instructor_name_on_off ) {
                                        get_template_part( 'learndash/tpl-part/groups/author_name'); 
                                    }  
                                ?>
                            </div>  
                        <?php endif ?> 

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
                    <!--  End course bottom -->
              </div>
          </div>
      </div> <!--  row  -->

    </div> <!-- single course -->
</div>