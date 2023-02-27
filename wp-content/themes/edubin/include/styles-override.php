<?php

defined('ABSPATH') || exit;

/**
 * Output our Customizer styles in the site header
 *
 */
function edubin_customizer_css_styles()
{
    $defaults    = edubin_generate_defaults();
    $styles      = '';
    $bodyFont    = json_decode(get_theme_mod('edubin_body_text_font', $defaults['edubin_body_text_font']), true);
    $headerFont  = json_decode(get_theme_mod('edubin_heading_font', $defaults['edubin_heading_font']), true);
    $menuFont    = json_decode(get_theme_mod('edubin_menu_text_font', $defaults['edubin_menu_text_font']), true);
    $submenuFont = json_decode(get_theme_mod('edubin_sub_menu_text_font', $defaults['edubin_sub_menu_text_font']), true);

    // Header styles
    $styles .= "h1, h2, h3, h4, h5, h6, .widget .widget-title, .learnpress .lp-single-course .widget-title, .tribe-common--breakpoint-medium.tribe-common .tribe-common-h6--min-medium { font-family: '" . $headerFont['font'] . "'," . $headerFont["category"] . "; font-weight: " . $headerFont['boldweight'] . ";}";

    // Body Text styles
    $styles .= "body p, button, .tutor-lead-info-btn-group a.tutor-button,
.tutor-lead-info-btn-group .tutor-course-complete-form-wrap button,
.tutor-lead-info-btn-group .tutor-button.tutor-success,
.tutor-course-enrolled-review-wrap .write-course-review-link-btn,
.tutor-login-form-wrap input[type='submit'],
a.tutor-profile-photo-upload-btn,
.tutor-course-loop-meta>div span,
.tutor-course-filter-wrap,
.tutor-loop-rating-wrap,
.tutor-loop-course-footer,
.tutor-loop-author,
.tutor-price-preview-box,
.tutor-container,
.breadcrumbs,
.widget-area,
.entry-content ul,
.nav-links,
select,
option,
.header-top,
.site-footer .edubin-quickinfo,
button.tutor-profile-photo-upload-btn,
.woocommerce .woocommerce-error .button,
.woocommerce .woocommerce-info .button,
.woocommerce .woocommerce-message .button,
.woocommerce div.product form.cart .button,
.woocommerce ul.products li.product a,
a.button.wc-backward,
.woocommerce-cart .wc-proceed-to-checkout,
div.wpforms-container-full .wpforms-form input[type=submit],
div.wpforms-container-full .wpforms-form button[type=submit],
div.wpforms-container-full .wpforms-form .wpforms-page-button,
.edubin-main-btn,
.edubin-main-btn a,
.single_add_to_cart_button,
a.tutor-button,
.tutor-button,
a.tutor-btn,
.tutor-btn,
.tribe-common .tribe-common-c-btn,
.tribe-common a.tribe-common-c-btn,
#rtec .rtec-register-button,
#rtec input[type='submit'],
.learnpress.course-item-popup #course-item-content-header .form-button.lp-button-back button { font-family: '" . $bodyFont['font'] . "'," . $bodyFont["category"] . "; font-weight: " . $bodyFont['boldweight'] . ";}";

    // Menu Text styles
    $styles .= ".main-navigation a { font-family: '" . $menuFont['font'] . "'," . $menuFont["category"] . "; font-weight: " . $menuFont['boldweight'] . ";}";

    // Sub menu Text styles
    $styles .= ".main-navigation ul ul a { font-family: '" . $submenuFont['font'] . "'," . $submenuFont["category"] . "; font-weight: " . $submenuFont['boldweight'] . ";}";

    echo '<style type="text/css">' . $styles . '</style>';
}
add_action('wp_head', 'edubin_customizer_css_styles');

