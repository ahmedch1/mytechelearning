<?php

    $settings   = $this->get_settings_for_display();

    $list_archive_media_show = $settings['list_media_show'];
    $list_show_cat = $settings['list_show_cat'];
    $list_show_price = $settings['list_show_price'];
    $list_show_review = $settings['list_show_review'];
    $list_show_review_text =  $settings['list_show_review_text'];
    $list_show_author_avator = $settings['list_show_author_avator'];
    $list_show_author_name = $settings['list_show_author_name'];
    $list_archive_title_show = $settings['list_show_title'];
    $list_show_excerpt =  $settings['list_show_excerpt'];
    $list_show_enroll =  $settings['list_show_enroll'];
    $list_show_enroll_text =  $settings['list_show_enroll_text'];
    $list_show_lesson =  $settings['list_show_lesson'];
    $list_show_quiz =  $settings['list_show_quiz'];
    $list_media_show =  $settings['list_media_show'];
    $list_show_enroll =  $settings['list_show_enroll'];
    
?> 
<div class="col-lg-12">
  <div class="edubin-course edubin-course-list">
    <div class="row tpc_g_30">

      <div class="col-md-5">

          <?php 
              if ( $list_media_show ) {
                  require EDUBIN_ADDONS_PL_PATH . 'includes/widgets/tpl-part/lp/media.php';
              }
              if ( $list_show_cat ) {
                 get_template_part( 'learnpress/tpl-part/category'); 
              }
          ?>

      </div>

      <div class="col-md-7">
       <div class="course-content">

        <div class="course__content--meta tpc_pt_0 tpc_pb_0">
            <div class="course__meta-left">

                <?php                 
                    if ( $list_show_enroll ) { ?>
                        <span class="course-enroll">
                            <?php get_template_part( 'learnpress/tpl-part/students'); ?>
                        </span>
                    <?php } ?>

                       <?php                
                        if ( $list_show_lesson ) {
                            get_template_part( 'learnpress/tpl-part/lessons'); 
                        }                                        
                        if ( $list_show_quiz ) {
                            get_template_part( 'learnpress/tpl-part/quiz'); 
                        } 
                    ?>

            </div>
            <div class="course__meta-right">
         
                <?php   
                    if ( class_exists('LP_Addon_Course_Review_Preload') && $list_show_review ) {
                        get_template_part( 'learnpress/tpl-part/review'); 
                    } 
                    if ( $list_show_review_text) {
                        get_template_part( 'learnpress/tpl-part/review_text'); 
                    } 
                ?>
    

            </div>
        </div>
              <?php
                    if ( $list_archive_title_show ) {
                        get_template_part( 'learnpress/tpl-part/title'); 
                    }
                    if ( $list_show_excerpt ) {
                        get_template_part( 'learnpress/tpl-part/excerpt_text'); 
                    }
                ?>

                  <div class="course-bottom tpc_mt_10">

                    <div class="course__content--meta">

                          <div class="course__meta-left">

                           <?php if ( $list_show_author_avator || $list_show_author_name): ?>
                            <div class="author__name">
                                <?php          
                                    if ( $list_show_author_avator ) {
                                        get_template_part( 'learnpress/tpl-part/author_avator'); 
                                    } 
                                    if ( $list_show_author_name ) {
                                        get_template_part( 'learnpress/tpl-part/author_name'); 
                                    }  
                                ?>
                            </div>  
                        <?php endif ?> 

                          </div>

                          <div class="course__meta-right">
                                <?php 
                                    if ( $list_show_price ) { ?>
                                        <div class="price__1">
                                           <?php get_template_part( 'learnpress/tpl-part/price'); ?>
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