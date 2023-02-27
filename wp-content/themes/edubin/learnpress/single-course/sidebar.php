<?php 

    $defaults = edubin_generate_defaults();
    $post_id = edubin_get_id();

    $mb_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
    $lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);

    if ( $mb_lp_single_page_layout == '4' ) :
        $final_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
    elseif ( $mb_lp_single_page_layout == '3' ) :
        $final_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
    elseif ( $mb_lp_single_page_layout == '2' ) :
        $final_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
    elseif ( $mb_lp_single_page_layout == '1' ) :
        $final_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
    elseif ( $lp_single_page_layout == '4' ) :
        $final_lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);
    elseif ( $lp_single_page_layout == '3' ) :
        $final_lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);
    elseif ( $lp_single_page_layout == '2' ) :
        $final_lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);
    elseif ( $lp_single_page_layout == '1' ) :
        $final_lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);
    endif; //End single page layout

    if ( $final_lp_single_page_layout == '3' ) {
        return;
    }


?>

    <div class="col-lg-4 order-1 order-lg-2 lp-sidebar-col">
        <?php   get_template_part( 'learnpress/tpl-part/single/single', 'sidebar');  ?>
    </div>