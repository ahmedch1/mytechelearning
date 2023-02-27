<?php

    $settings   = $this->get_settings_for_display();

    $tutor_list_show_cat = $settings['list_show_cat'];
    $tutor_list_show_price = $settings['list_show_price'];
    $tutor_list_show_review = $settings['list_show_review'];
    $tutor_list_show_review_text =  $settings['list_show_review_text'];
    $tutor_list_show_author_avator = $settings['list_show_author_avator'];
    $tutor_list_show_author_name = $settings['list_show_author_name'];
    $tutor_list_show_title = $settings['list_show_title'];
    $tutor_list_show_excerpt =  $settings['list_show_excerpt'];
    $tutor_list_show_enroll =  $settings['list_show_enroll'];
    $tutor_list_show_lesson =  $settings['list_show_lesson'];
    $tutor_list_show_lesson_text =  $settings['list_show_lesson_text'];
    $tutor_list_show_quiz =  $settings['list_show_quiz'];
    
?>
<div class="col-lg-12">
  <div class="edubin-course edubin-course-list">
    <div class="row tpc_g_30">

      <div class="col-md-5">

          <?php 
              if ( $tutor_archive_media_show ) {
                  require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/tutor/media.php';
              }
              if ( $tutor_list_show_cat ) {
                 get_template_part( 'tutor/tpl-part/category'); 
              }
          ?>

      </div>

      <div class="col-md-7">
       <div class="course-content">

        <div class="course__content--meta tpc_pt_0 tpc_pb_0">
            <div class="course__meta-left">
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
            <div class="course__meta-right">
         
                <?php   
                    if ( $tutor_review_show ) {
                        get_template_part( 'tutor/tpl-part/review'); 
                    } 
                    if ( $tutor_show_review_text) {
                        get_template_part( 'tutor/tpl-part/review_text'); 
                    } 
                ?>
    

            </div>
        </div>
              <?php
                    if ( $tutor_archive_title_show ) {
                        get_template_part( 'tutor/tpl-part/title'); 
                    }
                    if ( $tutor_list_show_excerpt ) {
                        get_template_part( 'tutor/tpl-part/excerpt_text'); 
                    }
                ?>

                  <div class="course-bottom tpc_mt_10">

                    <div class="course__content--meta">

                          <div class="course__meta-left">

                           <?php if ( $tutor_instructor_img_on_off || $tutor_instructor_name_on_off): ?>
                            <div class="author__name">
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

                          </div>

                          <div class="course__meta-right">
                                <?php 
                                    if ( $tutor_price_show ) { ?>
                                        <div class="price__1">
                                           <?php get_template_part( 'tutor/tpl-part/price'); ?>
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