<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-course.php
 *
 */

/**
 * Prevent loading this file directly
 */
defined('ABSPATH') || exit();

$user      = LP_Global::user();
$course    = LP()->global['course'];
$course_id = get_the_ID();
$count     = $course->get_users_enrolled();
$defaults  = edubin_generate_defaults();
// Customizer option
$lp_course_archive_style = get_theme_mod('lp_course_archive_style', $defaults['lp_course_archive_style']);

$lp_review_show          = get_theme_mod('lp_review_show', $defaults['lp_review_show']);
$lp_review_text_show          = get_theme_mod('lp_review_text_show', $defaults['lp_review_text_show']);
// $lp_full_price_show          = get_theme_mod('lp_full_price_show', $defaults['lp_full_price_show']);
$lp_instructor_img_on_off  = get_theme_mod('lp_instructor_img_on_off', $defaults['lp_instructor_img_on_off']);
$lp_instructor_name_on_off = get_theme_mod('lp_instructor_name_on_off', $defaults['lp_instructor_name_on_off']);
// $lp_enroll_on_off          = get_theme_mod('lp_enroll_on_off', $defaults['lp_enroll_on_off']);

// $lp_comment_show       = get_theme_mod('lp_comment_show', $defaults['lp_comment_show']);
$lp_course_archive_clm = get_theme_mod('lp_course_archive_clm', $defaults['lp_course_archive_clm']);

?>

<div class="col-lg-12">
  <div class="edubin-single-course-1 mb-30">
    <div class="row no-gutters">
      <div class="col-md-5">
        <div class="thum">
          <?php if (has_post_thumbnail()): ?>
            <figure class="image thumb">
              <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail();?>
              </a>
            </figure>
        <?php else : ?>
        <?php $placholder_img = get_template_directory_uri() . '/assets/images/course-ph.png'; ?>
          <figure class="image">
              <a href="<?php the_permalink(); ?>">
                  <img src="<?php echo esc_url($placholder_img); ?>" alt="placeholder">
              </a>
          </figure>
          <?php endif;?>
          <div class="edubin-course-price-<?php if ($lp_course_archive_style == '4' || $lp_course_archive_style == '5'): echo '1';else:echo esc_html($lp_course_archive_style);endif;?>">

            <?php if ($price_html = $course->get_price_html()): ?>

              <?php if ($lp_course_archive_style == '2' || $lp_course_archive_style == '3'): ?>
              <?php $origin_price_html = $course->get_origin_price_html();?>
                 <span>
                    <?php echo '<del>' . $origin_price_html . '</del>'; ?>
                     <?php if($origin_price_html) : echo '/'; endif; ?>
                     <?php echo $price_html; ?>
                 </span>
                <?php else: ?>

                  <?php if ($lp_full_price_show) : ?>
                      <span><?php echo $price_html; ?></span>
                  <?php else : ?>
                      <span><?php $new_price = preg_replace('/.00/', '', $price_html); echo esc_html($new_price); ?></span>
                  <?php endif; ?> 
                  
                <?php endif;?>

              <?php endif;?>
            </div>
          </div>
        </div>
        <div class="col-md-7">
         <div class="course-content">

        <?php if (class_exists('LP_Addon_Course_Review_Preload') & $lp_review_show == '1'): ?>
            <div class="edubin-course-rate">
                 <?php  
                    $course_id       = get_the_ID();
                    $course_rate_res = learn_press_get_course_rate( $course_id, false );
                    $course_rate     = $course_rate_res['rated'];
                    $total           = $course_rate_res['total'];
            
                    learn_press_course_review_template( 'rating-stars.php', array( 'rated' => $course_rate ) ); 

                    $total_text = ('1' == $total) ? esc_html__('Review', 'edubin') : esc_html__('reviews', 'edubin');

                    ?>

                  <?php if ($lp_review_text_show) :?>
                      <span class="course-reviews">
                        <?php echo esc_attr('(') ?>
                        <?php echo esc_html($total); ?> 
                        <?php echo esc_html($total_text); ?>
                        <?php echo esc_attr(')') ?>
                      </span>
                  <?php endif; ?><!--  End review text-->
            </div>
        <?php endif; ?><!--  End review -->

            <?php
              the_title(sprintf('<h2 class="course-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
              do_action('learn_press_after_the_title');
            ?>
            <?php the_excerpt();?>
            <div class="course-bottom">
              <?php if (true == $lp_instructor_img_on_off): ?>
                <div class="thum">
                 <a href="<?php echo esc_url(learn_press_user_profile_link(get_the_author_meta('ID'))); ?>" class="instructor-img">
                  <?php echo wp_kses_post($course->get_instructor()->get_profile_picture()); ?>
                </a>
              </div>
              <?php endif;?><!--  End instructor image -->

              <?php if ($lp_instructor_name_on_off == '1'): ?>
                <div class="name">
                  <a href="<?php echo esc_url(learn_press_user_profile_link(get_the_author_meta('ID'))); ?>"><h6><?php echo wp_kses_post($course->get_instructor_html()); ?></h6></a>
                </div>
                <?php endif;?><!--  End instructor name -->
                <div class="admin">
                  <ul>
                   <?php if ($lp_enroll_on_off == '1'): ?>
                    <li><i class="flaticon-user-4"></i><span class="enroll-users"><?php echo esc_html($count); ?></span></li>
                    <?php endif;?><!--  End enroll -->
                    <?php if ($lp_comment_show): ?>
                      <li><a href="<?php the_permalink();?>"><i class="flaticon-chat-1"></i><span><?php echo get_comments_number(); ?></span></a></li>
                      <?php endif;?><!--  End comments -->
                    </ul>
                  </div>
                </div>
                <!--  End course bottom -->
              </div>
            </div>
          </div> <!--  row  -->
        </div> <!-- single course -->
      </div>