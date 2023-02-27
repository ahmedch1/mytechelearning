<?php 
    $course              = get_post( get_the_ID() );
    $lesson_count        = Sensei()->course->course_lesson_count( get_the_ID() );

    echo esc_attr($lesson_count ); 

 ?> 

