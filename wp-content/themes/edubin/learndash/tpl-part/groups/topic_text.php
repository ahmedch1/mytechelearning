<?php 
    $topic  = learndash_get_course_steps( get_the_ID(), array('sfwd-topic') );
    $topic = $topic ? count($topic) : 0;
    $topic_text = ('1' == $topic) ? esc_html__('Topic', 'edubin') : esc_html__('Topics', 'edubin'); ?>

    <?php echo esc_html($topic_text); ?>
