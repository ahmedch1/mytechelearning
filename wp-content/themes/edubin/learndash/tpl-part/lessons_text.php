<?php 

    $defaults = edubin_generate_defaults();
    $ld_lesson_text_show = get_theme_mod( 'ld_lesson_text_show', $defaults['ld_lesson_text_show']);

    $lesson  = learndash_get_course_steps( get_the_ID(), array('sfwd-lessons') );
    $lesson = $lesson ? count($lesson) : 0;
    $lesson_text = ('1' == $lesson) ? esc_html__('Lesson', 'edubin') : esc_html__('Lessons', 'edubin'); ?>

    <?php echo esc_html($lesson_text); ?>

