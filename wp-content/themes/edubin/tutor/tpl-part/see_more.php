    <?php
    
    $defaults = edubin_generate_defaults();
    $tutor_see_more_text = get_theme_mod( 'tutor_see_more_text', $defaults['tutor_see_more_text']);
    $tutor_permalink_type = get_theme_mod( 'tutor_permalink_type', $defaults['tutor_permalink_type']);
    $tutor_archive_dynamic_url = get_theme_mod( 'tutor_archive_dynamic_url', $defaults['tutor_archive_dynamic_url']);

     if($tutor_permalink_type == 'tutor_archive_dynamic_url'): ?>
<?php tutor_course_loop_price(); ?>

     <?php   else : ?>
            <a href="<?php the_permalink(); ?>">
               <?php echo $tutor_see_more_text; ?>                           
            </a>   
        <?php 
        endif; 
    ?>
