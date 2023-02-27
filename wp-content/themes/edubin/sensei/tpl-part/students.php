<?php 

 $students = (int)learn_press_get_course()->count_students(); ?>

<span class="course-enroll"><i class="flaticon-user-4"></i> <?php echo $students; ?> </span>