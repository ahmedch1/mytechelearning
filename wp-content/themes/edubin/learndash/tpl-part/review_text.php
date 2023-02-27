<?php 
  $get_rating_data = ldcr_get_course_total_reviews();
  $total_text = (1 == $get_rating_data) ? esc_html__('Review', 'edubin') : esc_html__('reviews', 'edubin');

 ?>
 <?php  if ( !$get_rating_data == 0) { ?>
   
  <span class="course-reviews-text">
    <?php echo esc_attr('(') ?>
    <?php echo esc_html( $get_rating_data); ?>
    <?php echo esc_html( $total_text); ?>
    <?php echo esc_attr(')') ?>
  </span>

 <?php }?>

