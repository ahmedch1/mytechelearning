<?php 
    $topic  = learndash_get_course_steps( get_the_ID(), array('sfwd-topic') );
    $topic = $topic ? count($topic) : 0;
?>

    <i class="flaticon-play"></i>
    <?php echo esc_html($topic); ?>
