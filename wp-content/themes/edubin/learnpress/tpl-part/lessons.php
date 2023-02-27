<?php 
  $course = \LP_Global::course();
  $lessons = $course->get_items('lp_lesson', false) ? count($course->get_items('lp_lesson', false)) : 0;
  printf('<span class="course-lessons"><i class="flaticon-book-1"></i> %s </span>', $lessons); 

?>
