<?php 

    $course_nav_item = apply_filters( 'tutor_course/single/nav_items', tutor_utils()->course_nav_items(), get_the_ID() );
    tutor_utils()->tutor_custom_header();

    $defaults = edubin_generate_defaults();
   
    $tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
    $tutor_related_course_position = get_theme_mod( 'tutor_related_course_position', $defaults['tutor_related_course_position']);
    $tutor_single_social_shear = get_theme_mod( 'tutor_single_social_shear', $defaults['tutor_single_social_shear']);
    $tutor_single_course_cat = get_theme_mod( 'tutor_single_course_cat', $defaults['tutor_single_course_cat']);
    
    $tutor_single_sidebar_sticky = get_theme_mod( 'tutor_single_sidebar_sticky', $defaults['tutor_single_sidebar_sticky']);
    $sidebar_sticky_on_off = ( $tutor_single_sidebar_sticky ? 'do_sticky' : '');

?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $sidebar_sticky_on_off ); ?>">
<div class="tutor-single-course-sidebar ">
      <?php tutor_utils()->has_video_in_single() ? tutor_course_video() : get_tutor_course_thumbnail(); ?>
      <?php do_action('tutor_course/single/before/sidebar'); ?>
      <?php tutor_load_template('single.course.course-entry-box'); ?>
      <?php tutor_course_requirements_html(); ?>
      <?php tutor_course_tags_html(); ?>
      <?php tutor_course_target_audience_html(); ?>
      <?php do_action('tutor_course/single/after/sidebar'); ?>
  </div>
    <div class="course-sidebar-preview tutor">

      <?php if ( $tutor_single_social_shear ) { ?>
          
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
    
  <!--   edubin_tutor_course_category -->
    <?php if ( $tutor_single_course_cat && !empty(get_the_terms(get_the_ID(), 'course-category'))) { ?>

        <?php if( function_exists('edubin_tutor_course_category') ){ ?>
            <div class="tutor__widget">
                <?php edubin_tutor_course_category(); ?>
            </div>

        <?php } ?>

    <?php } ?>


  <!--   edubin_tutor_related_course_sidebar -->
    <?php if ( $tutor_related_course_position == 'sidebar' ) { ?>

        <?php if( function_exists('edubin_tutor_related_course_sidebar' ) ){ ?>
            <div class="tutor__widget">
                <?php edubin_tutor_related_course_sidebar(); ?>
            </div>

        <?php } ?>

    <?php } ?>


    <?php if ( is_active_sidebar( 'tutor-course-sidebar-2' ) ) : ?>
      <!--   tutor-course-sidebar-2 sidebar -->
        <div class="tutor__widget">                   
            <?php dynamic_sidebar( 'tutor-course-sidebar-2' ); ?>
        </div>
    <?php endif; ?>


</aside>

