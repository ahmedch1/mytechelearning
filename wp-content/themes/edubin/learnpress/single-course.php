
<?php
/**
 * The template for displaying learnpress single page
 *
 */

get_header();

    $post_id = edubin_get_id();

    $defaults = edubin_generate_defaults();

    $mb_lp_single_page_layout = get_post_meta($post_id, 'mb_lp_single_page_layout', true);
    $lp_single_page_layout = get_theme_mod( 'lp_single_page_layout', $defaults['lp_single_page_layout']);


   if ( $mb_lp_single_page_layout == '4' ) :

         get_template_part( 'learnpress/tpl-part/single/single-layout', '4');  

    elseif ( $mb_lp_single_page_layout == '3' ) :

        get_template_part( 'learnpress/tpl-part/single/single-layout', '3');  

    elseif ( $mb_lp_single_page_layout == '2' ) :

        get_template_part( 'learnpress/tpl-part/single/single-layout', '2');  

    elseif ( $mb_lp_single_page_layout == '1' ) :

        get_template_part( 'learnpress/tpl-part/single/single-layout', '1');  

    elseif ( $lp_single_page_layout == '4' ) :

        get_template_part( 'learnpress/tpl-part/single/single-layout', '4');  

    elseif ( $lp_single_page_layout == '3' ) :

        get_template_part( 'learnpress/tpl-part/single/single-layout', '3');  

    elseif ( $lp_single_page_layout == '2' ) :

        get_template_part( 'learnpress/tpl-part/single/single-layout', '2');  

    elseif ( $lp_single_page_layout == '1' ) :

        get_template_part( 'learnpress/tpl-part/single/single-layout', '1');  

    endif; //End single page layout



get_footer();
