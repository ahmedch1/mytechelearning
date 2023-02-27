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
defined( 'ABSPATH' ) || exit();

$user = LP_Global::user();
$course    = LP()->global['course'];
$course_id = get_the_ID();
$count = $course->get_users_enrolled();
$defaults = edubin_generate_defaults();
// Customizer option
$lp_course_archive_style = get_theme_mod( 'lp_course_archive_style', $defaults['lp_course_archive_style']); 
$lp_course_archive_clm = get_theme_mod( 'lp_course_archive_clm', $defaults['lp_course_archive_clm'] ); 

$lp_price_show = get_theme_mod( 'lp_price_show', $defaults['lp_price_show']);
// $lp_full_price_show = get_theme_mod( 'lp_full_price_show', $defaults['lp_full_price_show']);
$lp_review_show = get_theme_mod( 'lp_review_show', $defaults['lp_review_show']);
$lp_review_text_show = get_theme_mod( 'lp_review_text_show', $defaults['lp_review_text_show']);
$lp_instructor_img_on_off = get_theme_mod( 'lp_instructor_img_on_off', $defaults['lp_instructor_img_on_off']);
$lp_instructor_name_on_off = get_theme_mod( 'lp_instructor_name_on_off', $defaults['lp_instructor_name_on_off']);
// $lp_enroll_on_off = get_theme_mod( 'lp_enroll_on_off', $defaults['lp_enroll_on_off']);

// $lp_comment_show = get_theme_mod( 'lp_comment_show', $defaults['lp_comment_show']); 
$lp_cat_show = get_theme_mod( 'lp_cat_show', $defaults['lp_cat_show']); 
$lp_quiz_show = get_theme_mod( 'lp_quiz_show', $defaults['lp_quiz_show']); 
$lp_lesson_show = get_theme_mod( 'lp_lesson_show', $defaults['lp_lesson_show']); 

// LearnPress course archive image size
$lp_archive_image_size = get_theme_mod( 'lp_archive_image_size', $defaults['lp_archive_image_size']); 

  if ($lp_archive_image_size == 'medium_large') {
    $final_lp_archive_image_size = 'medium_large'; 
  } else {
    $final_lp_archive_image_size = !empty(get_intermediate_image_sizes()[$lp_archive_image_size]);
  }

?>
<?php 
   if ($lp_course_archive_style == '6') :     

      get_template_part( 'learnpress/tpl-part/layout', '6'); 

   elseif ($lp_course_archive_style == '5') :      

      get_template_part( 'learnpress/tpl-part/layout', '5'); 

   elseif ($lp_course_archive_style == '4') :   

      get_template_part( 'learnpress/tpl-part/layout', '4'); 

   elseif ($lp_course_archive_style == '3') :

      get_template_part( 'learnpress/tpl-part/layout', '3'); 

   elseif ($lp_course_archive_style == '2') :
      
      get_template_part( 'learnpress/tpl-part/layout', '2');

   else :       
      get_template_part( 'learnpress/tpl-part/layout', '1');   

   endif; //End course style

 ?>