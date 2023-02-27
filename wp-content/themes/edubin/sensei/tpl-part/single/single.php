
<?php
/**
 * The template for displaying sensei single page
 *
 */

get_header();

    $post_id = edubin_get_id();

    $defaults = edubin_generate_defaults();

    $mb_sensei_single_page_layout = get_post_meta($post_id, 'mb_sensei_single_page_layout', true);
    $sensei_single_page_layout = get_theme_mod( 'sensei_single_page_layout', $defaults['sensei_single_page_layout']);

   if ( $mb_sensei_single_page_layout == '4' ) :

         get_template_part( 'sensei/tpl-part/single/single-layout', '4');  

    elseif ( $mb_sensei_single_page_layout == '3' ) :

        get_template_part( 'sensei/tpl-part/single/single-layout', '3');  

    elseif ( $mb_sensei_single_page_layout == '2' ) :

        get_template_part( 'sensei/tpl-part/single/single-layout', '2');  

    elseif ( $mb_sensei_single_page_layout == '1' ) :

        get_template_part( 'sensei/tpl-part/single/single-layout', '1');  

    elseif ( $sensei_single_page_layout == '4' ) :

        get_template_part( 'sensei/tpl-part/single/single-layout', '4');  

    elseif ( $sensei_single_page_layout == '3' ) :

        get_template_part( 'sensei/tpl-part/single/single-layout', '3');  

    elseif ( $sensei_single_page_layout == '2' ) :

        get_template_part( 'sensei/tpl-part/single/single-layout', '2');  

    elseif ( $sensei_single_page_layout == '1' ) :

        get_template_part( 'sensei/tpl-part/single/single-layout', '1');  

    endif; //End single page layout



get_footer();
