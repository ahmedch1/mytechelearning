<?php 
    $course_id       = get_the_ID();
    $course_rate_res = learn_press_get_course_rate( $course_id, false );
    $course_rate     = $course_rate_res['rated'];
    $total           = $course_rate_res['total'];

  
    $total_text = ('1' == $total) ? esc_html__('Review', 'edubin') : esc_html__('reviews', 'edubin');

 ?>
  <span class="course-reviews-text">
    <?php echo esc_attr('(') ?>
    <?php echo esc_html($total); ?> 
    <?php echo esc_html($total_text); ?>
    <?php echo esc_attr(')') ?>
  </span>



