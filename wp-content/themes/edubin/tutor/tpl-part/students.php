<?php 

  $students = (int) tutor_utils()->count_enrolled_users_by_course(); 

?>
<span class="course-enroll"><i class="flaticon-user-4"></i> <?php echo $students; ?> </span>