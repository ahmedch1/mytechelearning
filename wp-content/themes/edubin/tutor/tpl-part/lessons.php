<?php 
  $lesson = tutor_utils()->get_lesson_count_by_course(get_the_ID());
  $lesson_text = ('1' == $lesson) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin'); ?>

<span class="course-lessons">
<i class="flaticon-book-1"></i>
  <?php echo esc_attr( $lesson); ?>                                             
 </span>