    <?php
    
    $defaults = edubin_generate_defaults();
    $ld_see_more_btn_text = get_theme_mod( 'ld_see_more_btn_text', $defaults['ld_see_more_btn_text']);
    ?>
    <?php if ($ld_see_more_btn_text): ?>
       <a href="<?php the_permalink(); ?>">
            <?php echo $ld_see_more_btn_text; ?>                           
        </a>  
    <?php else: ?>
        <a href="<?php the_permalink(); ?>">
           <?php esc_html_e( 'See More', 'edubin' ); ?>
        </a>       
    <?php endif ?>


