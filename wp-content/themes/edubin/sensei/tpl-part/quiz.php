<?php 

      $course = \LP_Global::course();
      $lessons = $course->get_items('lp_quiz', false) ? count($course->get_items('lp_quiz', false)) : 0;
      printf('<span class="course-quiz"><i class="flaticon-question"></i> %s </span>', $lessons);
      
 ?>