<?php 
$defaults = edubin_generate_defaults();

$course              = get_post( get_the_ID() );
$lesson_count        = Sensei()->course->course_lesson_count( get_the_ID() );
 ?>

<ul class="course-info-list">
    <li>
      <i class="fab fa-readme"></i>
      <span class="label"><?php esc_html_e( 'Lessons', 'edubin' ); ?> :</span>
      <span class="value"><?php echo esc_attr($lesson_count); ?></span>
    </li>
    <li>
      <i class="fab fa-readme"></i>
      <span class="label"><?php esc_html_e( 'Category', 'edubin' ); ?> :</span>
      <span class="value lp_course_cat"><?php echo get_the_term_list(get_the_ID(), 'course-category', '', ' ', ''); ?></span>
    </li>
</ul>
