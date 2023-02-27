
<?php
/**
 * The template for displaying learndash single page
 *
 */

get_header();

    $post_id = edubin_get_id();

    if (function_exists('edubinGetPostViewsCustom')) {edubinSetPostViewsCustom(get_the_ID());}

    $defaults = edubin_generate_defaults();

    $mb_ld_single_page_layout = get_post_meta($post_id, 'mb_ld_single_page_layout', true);
    $ld_single_page_layout = get_theme_mod( 'ld_single_page_layout', $defaults['ld_single_page_layout']);


   if ( $mb_ld_single_page_layout == '4' ) :

         get_template_part( 'learndash/tpl-part/single/single-layout', '4');  

    elseif ( $mb_ld_single_page_layout == '3' ) :

        get_template_part( 'learndash/tpl-part/single/single-layout', '3');  

    elseif ( $mb_ld_single_page_layout == '2' ) :

        get_template_part( 'learndash/tpl-part/single/single-layout', '2');  

    elseif ( $mb_ld_single_page_layout == '1' ) :

        get_template_part( 'learndash/tpl-part/single/single-layout', '1');  

    elseif ( $ld_single_page_layout == '4' ) :

        get_template_part( 'learndash/tpl-part/single/single-layout', '4');  

    elseif ( $ld_single_page_layout == '3' ) :

        get_template_part( 'learndash/tpl-part/single/single-layout', '3');  

    elseif ( $ld_single_page_layout == '2' ) :

        get_template_part( 'learndash/tpl-part/single/single-layout', '2');  

    elseif ( $ld_single_page_layout == '1' ) :

        get_template_part( 'learndash/tpl-part/single/single-layout', '1');  

    endif; //End single page layout



get_footer();
