<?php

use TUTOR\Input;


$per_page   = tutor_utils()->get_option( 'pagination_per_page', 10 );
$current_page = max( 1, Input::post( 'current_page', 0, Input::TYPE_INT ) );
$offset     = ( $current_page - 1 ) * $per_page;

$current_user_id  = get_current_user_id();
$course_id      = Input::post( 'course_id', get_the_ID(), Input::TYPE_INT );
$is_enrolled    = tutor_utils()->is_enrolled( $course_id, $current_user_id );

$reviews    = tutor_utils()->get_course_reviews( $course_id, $offset, $per_page, false, array( 'approved' ), $current_user_id );

$total_text = ('1' == $reviews) ? esc_html__('Review', 'edubin') : esc_html__('reviews', 'edubin');

?>

  <span class="course-reviews-text">
    <?php echo esc_attr('(') ?>
    <?php echo esc_html(count( $reviews )); ?>
    <?php echo esc_html($total_text); ?>
    <?php echo esc_attr(')') ?>
  </span>



