 <?php  

    $course_id       = get_the_ID();
    $course_rate_res = learn_press_get_course_rate( $course_id, false );
    $course_rate     = $course_rate_res['rated'];
    $total           = $course_rate_res['total'];

    learn_press_course_review_template( 'rating-stars.php', array( 'rated' => $course_rate ) ); 


    ?>


