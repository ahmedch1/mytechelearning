<?php 

    $defaults = edubin_generate_defaults();
   
    $sensei_related_course_position = get_theme_mod( 'sensei_related_course_position', $defaults['sensei_related_course_position']); 
    $sensei_single_social_shear = get_theme_mod( 'sensei_single_social_shear', $defaults['sensei_single_social_shear']);  
    $sensei_single_course_info = get_theme_mod( 'sensei_single_course_info', $defaults['sensei_single_course_info']); 
    $sensei_single_course_cat = get_theme_mod( 'sensei_single_course_cat', $defaults['sensei_single_course_cat']); 
    
    $sensei_single_sidebar_sticky = get_theme_mod( 'sensei_single_sidebar_sticky', $defaults['sensei_single_sidebar_sticky']); 
    $sidebar_sticky_on_off = ( $sensei_single_sidebar_sticky ? 'do_sticky' : '');

?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">

    <div class="course-sidebar-preview sensei">

    <!--   edubin_sensei_course_info -->
    <?php if ( $sensei_single_course_info ) { ?>

        <?php if( function_exists('edubin_sensei_course_info') ){ ?>

            <div class="sensei__widget">
                <?php edubin_sensei_course_info(); ?>
            </div>

        <?php } ?>

    <?php } ?>

      <?php if ( $sensei_single_social_shear ) { ?>
          
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
    
    <!--   edubin_sensei_course_category -->
    <?php if ( $sensei_single_course_cat ) { ?>

        <?php if( function_exists('edubin_sensei_course_category') ){ ?>
            <div class="sensei__widget">
                <?php edubin_sensei_course_category(); ?>
            </div>

        <?php } ?>

    <?php } ?>

    <!--   edubin_sensei_related_course_sidebar -->
    <?php if ($sensei_related_course_position == 'sidebar') { ?>

        <?php if( function_exists('edubin_sensei_related_course_sidebar') ){ ?>
            <div class="sensei__widget">
                <?php edubin_sensei_related_course_sidebar(); ?>
            </div>

        <?php } ?>

    <?php } ?>

      <!--   sensei-course-sidebar-1 sidebar -->
    <?php if ( is_active_sidebar( 'sensei-course-sidebar-1' ) ) : ?>
        <div class="sensei__widget">                   
            <?php dynamic_sidebar( 'sensei-course-sidebar-1' ); ?>
        </div>
    <?php endif; ?>

</aside>

