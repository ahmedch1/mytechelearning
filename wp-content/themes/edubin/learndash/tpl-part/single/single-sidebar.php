<?php 

    $defaults = edubin_generate_defaults();
   
    $ld_related_course_position = get_theme_mod( 'ld_related_course_position', $defaults['ld_related_course_position']); 
    $ld_single_social_shear = get_theme_mod( 'ld_single_social_shear', $defaults['ld_single_social_shear']);  
    $ld_single_course_info = get_theme_mod( 'ld_single_course_info', $defaults['ld_single_course_info']); 
    $ld_single_course_cat = get_theme_mod( 'ld_single_course_cat', $defaults['ld_single_course_cat']); 
    
    $ld_single_sidebar_sticky = get_theme_mod( 'ld_single_sidebar_sticky', $defaults['ld_single_sidebar_sticky']); 
    $sidebar_sticky_on_off = ( $ld_single_sidebar_sticky ? 'do_sticky' : '');

?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">

    <div class="course-sidebar-preview ld">

    <!--   edubin_ld_course_info -->
    <?php if ( $ld_single_course_info ) { ?>

        <?php if( function_exists('edubin_ld_course_info') ){ ?>
            <div class="ld__widget">
                <?php edubin_ld_course_info(); ?>
            </div>

        <?php } ?>

    <?php } ?>

      <?php if ( $ld_single_social_shear ) { ?>
          
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
    
  <!--   edubin_ld_course_category -->
    <?php if ( $ld_single_course_cat && !empty(get_the_terms(get_the_ID(), 'ld_course_category'))) { ?>

        <?php if( function_exists('edubin_ld_course_category') ){ ?>
            <div class="ld__widget">
                <?php edubin_ld_course_category(); ?>
            </div>

        <?php } ?>

    <?php } ?>


  <!--   edubin_ld_related_course_sidebar -->
    <?php if ($ld_related_course_position == 'sidebar') { ?>

        <?php if( function_exists('edubin_ld_related_course_sidebar') ){ ?>
            <div class="ld__widget">
                <?php edubin_ld_related_course_sidebar(); ?>
            </div>

        <?php } ?>

    <?php } ?>


    <?php if ( is_active_sidebar( 'ld-course-sidebar-1' ) ) : ?>
      <!--   ld-course-sidebar-1 sidebar -->
        <div class="ld__widget">                   
            <?php dynamic_sidebar( 'ld-course-sidebar-1' ); ?>
        </div>
    <?php endif; ?>


</aside>

