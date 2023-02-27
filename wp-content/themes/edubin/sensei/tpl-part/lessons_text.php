<?php 

    $course              = get_post( get_the_ID() );
    $lesson_count        = Sensei()->course->course_lesson_count( get_the_ID() );

    $lesson_text = ('1' == $lesson_count) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin'); ?>

    <?php echo esc_html($lesson_text); ?>

