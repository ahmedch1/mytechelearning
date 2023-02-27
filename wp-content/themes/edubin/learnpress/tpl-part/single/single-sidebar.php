<?php 

    global $post;
    $post_id    = $post->ID;
        
    $defaults = edubin_generate_defaults();
    $lp_related_course_position = get_theme_mod( 'lp_related_course_position', $defaults['lp_related_course_position']); 
    $lp_single_social_shear = get_theme_mod( 'lp_single_social_shear', $defaults['lp_single_social_shear']);  
    $lp_single_course_info = get_theme_mod( 'lp_single_course_info', $defaults['lp_single_course_info']); 
    $lp_single_course_cat = get_theme_mod( 'lp_single_course_cat', $defaults['lp_single_course_cat']); 
    $lp_single_course_price = get_theme_mod( 'lp_single_course_price', $defaults['lp_single_course_price']); 
    $lp_single_enroll_btn = get_theme_mod( 'lp_single_enroll_btn', $defaults['lp_single_enroll_btn']); 
    $lp_single_course_graduation = get_theme_mod( 'lp_single_course_graduation', $defaults['lp_single_course_graduation']); 
    $lp_single_course_time = get_theme_mod( 'lp_single_course_time', $defaults['lp_single_course_time']); 
    $lp_single_progress = get_theme_mod( 'lp_single_progress', $defaults['lp_single_progress']); 
    $lp_intro_video_position = get_theme_mod( 'lp_intro_video_position', $defaults['lp_intro_video_position']); 

    
    $lp_single_sidebar_sticky = get_theme_mod( 'lp_single_sidebar_sticky', $defaults['lp_single_sidebar_sticky']); 
    $sidebar_sticky_on_off = ( $lp_single_sidebar_sticky ? 'do_sticky' : '');

?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">

    <div class="course-sidebar-preview lp">
      <div class="intro-video-sidebar intro-video-content is__sidebar">

        <?php 
            $edubin_lp_video = get_post_meta($post_id, 'edubin_lp_video', true);
        ?>

        <?php if ($edubin_lp_video && $lp_intro_video_position == 'intro_video_sidebar') : ?>

          <div class="intro-video-sidebar intro-video-sidebar">
            <div class="intro-video" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'full')); ?>)"> <a href="<?php echo esc_url( $edubin_lp_video ); ?>" class="edubin-popup-videos bla-2"><span class="fas fa-play"></span></a>
            </div>
          </div>  

        <!--   the video will be show on sidebar -->
        <?php elseif( has_post_thumbnail() && $lp_intro_video_position == 'intro_video_sidebar') : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        <?php endif; ?>

      </div>
  <div class="lp_sidebar_wrap lp__widget">
        <?php
        if ( $lp_single_course_price ) { 

           // Price box.
         LP()->template( 'course' )->course_pricing();
        }
        
        if ( $lp_single_enroll_btn ) { 
          // Buttons.
          LP()->template( 'course' )->course_buttons();
        }
        if ( $lp_single_course_graduation ) { 
            // Graduation.
            LP()->template( 'course' )->course_graduation();
        }
       if ( $lp_single_course_time ) { 
           LP()->template( 'course' )->user_time();
       }
       if ( $lp_single_progress ) { 
           LP()->template( 'course' )->user_progress();
       }

      ?>
    </div>
    <!--   edubin_lp_course_info -->
    <?php if ( $lp_single_course_info ) { ?>

        <?php if( function_exists('edubin_lp_course_info') ){ ?>
            <div class="lp__widget">
                <?php edubin_lp_course_info(); ?>
            </div>
        <?php } ?>

    <?php } ?>

      <?php if ( $lp_single_social_shear ) { ?>
          
          <div class="entry-post-share text-center tpc_pb_30">
              <div class="post-share style-03">
                  <div class="share-label">
                      <?php esc_html_e( 'Share this course', 'edubin' ); ?>
                  </div>
                  <div class="share-media">
                      <span class="share-icon fas fa-share-alt"></span>

                      <div class="share-list">
                          <?php edubin_get_sharing_list(); ?>
                      </div>
                  </div>
              </div>
          </div>
          
       <?php } ?>


    </div>
    
  <!--   edubin_lp_related_course_sidebar -->
    <?php if ($lp_related_course_position == 'sidebar') { ?>

        <?php if( function_exists('edubin_lp_related_course_sidebar') ){ ?>
            <div class="lp__widget">
                <?php edubin_lp_related_course_sidebar(); ?>
            </div>

        <?php } ?>

    <?php } ?>

  <!--   edubin_lp_course_category -->
    <?php if ( $lp_single_course_cat && !empty(get_the_terms(get_the_ID(), 'lp_course_category'))) { ?>

        <?php if( function_exists('edubin_lp_course_category') ){ ?>
            <div class="lp__widget">
                <?php edubin_lp_course_category(); ?>
            </div>

        <?php } ?>

    <?php } ?>


    <?php if ( is_active_sidebar( 'lp-course-sidebar-2' ) ) : ?>
      <!--   lp-course-sidebar-2 sidebar -->
        <div class="lp__widget">                   
            <?php dynamic_sidebar( 'lp-course-sidebar-2' ); ?>
        </div>
    <?php endif; ?>


</aside>

