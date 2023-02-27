
<?php
/**
 * The template for displaying tutor single page
 *
 */

get_header();

    $post_id = edubin_get_id();

    $defaults = edubin_generate_defaults();

    $mb_tutor_single_page_layout = get_post_meta($post_id, 'mb_tutor_single_page_layout', true);
    $tutor_single_page_layout = get_theme_mod( 'tutor_single_page_layout', $defaults['tutor_single_page_layout']);

   if ( $mb_tutor_single_page_layout == '4' ) :

         get_template_part( 'tutor/tpl-part/single/single-layout', '4');  

    elseif ( $mb_tutor_single_page_layout == '3' ) :

        get_template_part( 'tutor/tpl-part/single/single-layout', '3');  

    elseif ( $mb_tutor_single_page_layout == '2' ) :

        get_template_part( 'tutor/tpl-part/single/single-layout', '2');  

    elseif ( $mb_tutor_single_page_layout == '1' ) :

        get_template_part( 'tutor/tpl-part/single/single-layout', '1');  

    elseif ( $tutor_single_page_layout == '4' ) :

        get_template_part( 'tutor/tpl-part/single/single-layout', '4');  

    elseif ( $tutor_single_page_layout == '3' ) :

        get_template_part( 'tutor/tpl-part/single/single-layout', '3');  

    elseif ( $tutor_single_page_layout == '2' ) :

        get_template_part( 'tutor/tpl-part/single/single-layout', '2');  

    elseif ( $tutor_single_page_layout == '1' ) :

        get_template_part( 'tutor/tpl-part/single/single-layout', '1');  

    endif; //End single page layout



get_footer();
