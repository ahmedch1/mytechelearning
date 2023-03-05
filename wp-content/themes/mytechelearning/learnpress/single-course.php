
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

?>
<div class="container">
    <?php
    if(is_user_logged_in()) {
        $current_user = wp_get_current_user();
        echo '<strong>Welcome ' . $current_user->display_name . ' !<br> </strong>';
    }
    ?>
<br/>
</div>
<?php
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
