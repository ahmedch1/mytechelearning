<?php
/**
 * Template for displaying single course
 */

// Prepare the nav items
$course_nav_item = apply_filters( 'tutor_course/single/nav_items', tutor_utils()->course_nav_items(), get_the_ID() );

tutor_utils()->tutor_custom_header();
do_action('tutor_course/single/before/wrap');

$defaults = edubin_generate_defaults();
$tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
$tutor_last_update_single = get_theme_mod( 'tutor_last_update_single', $defaults['tutor_last_update_single']);
$tutor_review_single = get_theme_mod( 'tutor_review_single', $defaults['tutor_review_single']);
$tutor_instructor_single = get_theme_mod( 'tutor_instructor_single', $defaults['tutor_instructor_single']);
$tutor_lesson_single = get_theme_mod( 'tutor_lesson_single', $defaults['tutor_lesson_single']);
$tutor_enrolled_single = get_theme_mod( 'tutor_enrolled_single', $defaults['tutor_enrolled_single']);
$tutor_duration_single = get_theme_mod( 'tutor_duration_single', $defaults['tutor_duration_single']);

$tutor_single_sidebar_sticky = get_theme_mod( 'tutor_single_sidebar_sticky', $defaults['tutor_single_sidebar_sticky']  );
$sidebar_sticky_on_off = ( $tutor_single_sidebar_sticky ? 'do_sticky' : '');

global $post, $authordata;

$profile_url        = tutor_utils()->profile_url( $authordata->ID, true );
$show_author        = tutor_utils()->get_option( 'enable_course_author' );
$course_categories  = get_tutor_course_categories();
$disable_reviews    = ! get_tutor_option( 'enable_course_review' );
$is_wish_listed     = tutor_utils()->is_wishlisted( $post->ID, get_current_user_id() );

$course_duration = get_tutor_course_duration_context();

$lesson = tutor_utils()->get_lesson_count_by_course(get_the_ID());
$lesson_text = ('1' == $lesson) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin');

$students = (int) tutor_utils()->count_enrolled_users_by_course(); 

$rating  = tutor_utils()->get_course_rating( get_the_ID() );


// Prepare the nav items
$course_nav_item = apply_filters( 'tutor_course/single/nav_items', tutor_utils()->course_nav_items(), get_the_ID() );

tutor_utils()->tutor_custom_header();
do_action('tutor_course/single/before/wrap');
?>

<div class="edubin-course-top-info light">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="edubin-single-course-lead-info">

        <?php if ($tutor_review_single || tutor_last_update_single) { ?>
          <div class="edubin-single-course-lead-meta">

            <?php if ($tutor_review_single) { ?>

                <div class="lead-meta-item meta-last-update">
                  <span class="lead-meta-value"> <?php tutor_utils()->star_rating_generator_v2( $rating->rating_avg, null, false, '', 'lg' ); ?></span>
                </div>

            <?php } ?>

            <?php if ($tutor_last_update_single) { ?>

            <div class="lead-meta-item meta-last-update">
              <span class="lead-meta-value"><?php echo esc_html__('Last Updated :', 'edubin'); ?> <?php echo get_the_modified_date(); ?></span>
            </div>         
                
            <?php } ?>

          </div>
        <?php } ?>

          <h1 class="course-title"><?php the_title(); ?></h1>

        <?php if ($tutor_review_single) { ?> 
          <div class="course-short-text"><?php the_excerpt(); ?></div>
        <?php } ?>

          <div class="edubin-single-course-lead-meta">

            <div class="page-title-bar-meta">

            <?php if ($tutor_instructor_single) : ?>
              <div class="course-instructor post-author">
                <span class="meta-icon meta-image">
                    <a href="<?php echo esc_url( $profile_url ); ?>">
                       <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                    </a>
                </span>
                <span class="meta-value"><a href="<?php echo esc_url( $profile_url ); ?>"><?php echo get_the_author_meta('display_name'); ?></a></span>
              </div>
            <?php endif; ?>

            <?php if ($tutor_lesson_single) : ?>
              <div class="course-lesson">
                <span class="meta-icon far fa-file-alt"></span>
                <span class="meta-value"> <?php echo $lesson; ?> <?php echo $lesson_text; ?> </span>
              </div>
            <?php endif; ?>

            <?php if ($tutor_enrolled_single) : ?>
              <div class="course-students">
                <span class="meta-icon far fa-user"></span>
                <span class="meta-value"><?php echo $students; ?> <?php echo esc_html__('Enrolled', 'edubin'); ?></span>
              </div>
            <?php endif; ?>

            <?php if ($tutor_duration_single) : ?>
              <div class="course-duration">
                <span class="meta-icon far fa-clock"></span>
                <span class="meta-value"><?php echo $course_duration; ?></span>
              </div>
            <?php endif; ?>

            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>


<div <?php tutor_post_class('tutor-full-width-course-top tutor-course-top-info tutor-page-wrap'); ?>>
    <div class="tutor-course-details-page tutor-container">
        <?php //(isset($is_enrolled) && $is_enrolled) ? tutor_course_enrolled_lead_info() : tutor_course_lead_info(); ?>
        <div class="tutor-course-details-page-main">
            <div class="tutor-course-details-page-main-left">
                <?php tutor_utils()->has_video_in_single() ? tutor_course_video() : get_tutor_course_thumbnail(); ?>
	            <?php do_action('tutor_course/single/before/inner-wrap'); ?>
                <div class="tutor-course-details-tab tutor-mt-32">
                    <div class="tutor-is-sticky">
                        <?php tutor_load_template( 'single.course.enrolled.nav', array('course_nav_item' => $course_nav_item ) ); ?>
                    </div>
                    <div class="tutor-tab tutor-pt-24">
                        <?php foreach( $course_nav_item as $key => $subpage ) : ?>
                            <div id="tutor-course-details-tab-<?php echo $key; ?>" class="tutor-tab-item<?php echo $key == 'info' ? ' is-active' : ''; ?>">
                                <?php
                                    do_action( 'tutor_course/single/tab/'.$key.'/before' );
                                    
                                    $method = $subpage['method'];
                                    if ( is_string($method) ) {
                                        $method();
                                    } else {
                                        $_object = $method[0];
                                        $_method = $method[1];
                                        $_object->$_method(get_the_ID());
                                    }

                                    do_action( 'tutor_course/single/tab/'.$key.'/after' );
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
	            <?php do_action('tutor_course/single/after/inner-wrap'); ?>
            </div>
            <!-- end of /.tutor-course-details-page-main-left -->
            <div class="tutor-course-details-page-main-right">
                
                <?php get_template_part( 'tutor/tpl-part/single/single', 'sidebar');  ?>
                 
            </div>
            <!-- end of /.tutor-course-details-page-main-right -->
        </div>
        <!-- end of /.tutor-course-details-page-main -->
    </div>
</div>

<?php do_action('tutor_course/single/after/wrap'); ?>

<?php
tutor_utils()->tutor_custom_footer();
