<?php 
// Prepare the nav items
$course_nav_item = apply_filters( 'tutor_course/single/nav_items', tutor_utils()->course_nav_items(), get_the_ID() );

tutor_utils()->tutor_custom_header();
do_action('tutor_course/single/before/wrap');

$defaults = edubin_generate_defaults();
$post_id = $post->ID;
$prefix = '_edubin_';

$tutor_related_course_position = get_theme_mod( 'tutor_related_course_position', $defaults['tutor_related_course_position']);

$tutor_last_update_single = get_theme_mod( 'tutor_last_update_single', $defaults['tutor_last_update_single']);
$tutor_review_single = get_theme_mod( 'tutor_review_single', $defaults['tutor_review_single']);
$tutor_instructor_single = get_theme_mod( 'tutor_instructor_single', $defaults['tutor_instructor_single']);
$tutor_lesson_single = get_theme_mod( 'tutor_lesson_single', $defaults['tutor_lesson_single']);
$tutor_enrolled_single = get_theme_mod( 'tutor_enrolled_single', $defaults['tutor_enrolled_single']);
$tutor_duration_single = get_theme_mod( 'tutor_duration_single', $defaults['tutor_duration_single']);
$tutor_single_header_meta = get_theme_mod( 'tutor_single_header_meta', $defaults['tutor_single_header_meta']);
$tutor_single_excerpt = get_theme_mod( 'tutor_single_excerpt', $defaults['tutor_single_excerpt']);

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


    $mb_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
    $tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);

    if ( $mb_tutor_single_page_layout == '4' ) :
        $final_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
    elseif ( $mb_tutor_single_page_layout == '3' ) :
        $final_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
    elseif ( $mb_tutor_single_page_layout == '2' ) :
        $final_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
    elseif ( $mb_tutor_single_page_layout == '1' ) :
        $final_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
    elseif ( $tutor_single_page_layout == '4' ) :
        $final_tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
    elseif ( $tutor_single_page_layout == '3' ) :
        $final_tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
    elseif ( $tutor_single_page_layout == '2' ) :
        $final_tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
    elseif ( $tutor_single_page_layout == '1' ) :
        $final_tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);
    endif; //End single page layout

    $top_header_type = ($final_tutor_single_page_layout == '4') ? 'light' : 'dark';
    $header_content_col = ($final_tutor_single_page_layout == '3') ? '12' : '8';
    $header_top_meta_center = ($final_tutor_single_page_layout == '3') ? 'text-center' : '';
    $header_meta_center = ($final_tutor_single_page_layout == '3') ? 'justify-content-center' : '';
    $header_bg_class = ($final_tutor_single_page_layout == '3') ? 'course-page-header' : '';

    $breadcrumb_show = get_theme_mod( 'breadcrumb_show', $defaults['breadcrumb_show']); 
    $shortcode_breadcrumb = get_theme_mod( 'shortcode_breadcrumb', $defaults['shortcode_breadcrumb']); 
    $tutor_single_breadcrumb = get_theme_mod( 'tutor_single_breadcrumb', $defaults['tutor_single_breadcrumb']); 

    $page_header_img = get_post_meta($post_id, $prefix . 'header_img', true);


 ?>

<?php if ($final_tutor_single_page_layout == '3'): ?>
<div class="edubin-course-top-info <?php echo esc_attr($top_header_type); ?> <?php echo esc_attr($header_bg_class); ?>" style="background-image: url('<?php if ( $page_header_img ): ?><?php echo esc_url( $page_header_img ); ?><?php else : ?><?php echo esc_url( get_header_image() ); ?><?php endif ?>');">

<?php else: ?>
<div class="edubin-course-top-info <?php echo esc_attr($top_header_type); ?>">
<?php endif ?>

  <div class="container">
    <div class="row <?php echo esc_attr($header_top_meta_center); ?>">
      <div class="col-lg-<?php echo esc_attr($header_content_col); ?>">
        <div class="edubin-single-course-lead-info tutor">

          <?php if( $breadcrumb_show && $tutor_single_breadcrumb ): ?>
              <div class="header-breadcrumb">
                  <?php if($shortcode_breadcrumb) : ?>
                      <?php echo do_shortcode( $shortcode_breadcrumb ); ?>
                  <?php else : ?>
                      <?php edubin_breadcrumb_trail(); ?>
                  <?php endif; ?>
              </div>
          <?php endif; ?>

          <h1 class="course-title"><?php the_title(); ?></h1>

          <?php if ( $tutor_single_excerpt) : ?> 
            <?php if ( ! has_excerpt()) : ?> 
            <?php else : ?>
                <div class="course-short-text"> <p><?php the_excerpt(); ?></p></div>
            <?php endif; ?>
          <?php endif; ?>

       <?php if ( $final_tutor_single_page_layout == '2' || $final_tutor_single_page_layout == '4' ) : ?>
          <?php if ($tutor_review_single || tutor_last_update_single) { ?>
            <div class="edubin-single-course-lead-meta <?php echo esc_attr($header_meta_center); ?>">

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
        <?php endif; ?>

        <?php if ( $tutor_single_header_meta ) : ?>
          <div class="edubin-single-course-lead-meta <?php echo esc_attr($header_meta_center); ?>">

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
        <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
