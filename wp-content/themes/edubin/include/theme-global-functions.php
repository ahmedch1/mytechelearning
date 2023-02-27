<?php

defined('ABSPATH') || exit;

//Sets up theme defaults and registers support for various WordPress features.
function edubin_setup()
{

    //Make theme available for translation.
    load_theme_textdomain('edubin', get_template_directory() . '/languages');
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    //Let WordPress manage the document title.
    add_theme_support('title-tag');

    //Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size('edubin-featured-image', 1450, 480, true);
    add_image_size('edubin-blog-image', 1140, 710, true);
    add_image_size('edubin_blog_image_360x210', 360, 210, true);
    add_image_size('course_thumb', 470, 274, true);

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(array(
        'primary'     => esc_html__('Primary Menu', 'edubin'),
        'footer_menu' => esc_html__('Footer Menu', 'edubin'),
    ));

    //Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Enable support for Post Formats.
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));

    // Add theme support for Custom Logo.
    add_theme_support('custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Enqueue editor styles.
    add_editor_style('style-editor.css');

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     */
    add_editor_style(array('assets/css/editor-style.css', edubin_get_font_url()));

    // Load regular editor styles into the new block-based editor.
    add_theme_support('editor-styles');

    // Add support for responsive embeds.
    add_theme_support('responsive-embeds');

    // Add theme support for Custom Background.
    $args = array(
        'default-color' => '#ffffff',
        'default-image' => '',
    );

    add_theme_support('custom-background', $args);

    $args = array(
        'width'              => 1450,
        'flex-height'        => true,
        'flex-width'         => true,
        'height'             => 480,
        'default-text-color' => '',
        'default-image'      => get_template_directory_uri() . '/assets/images/header.jpg',
        'wp-head-callback'   => 'edubin_header_style',
    );
    register_default_headers(array(
        'default-image' => array(
            'url'           => '%s/assets/images/header.jpg',
            'thumbnail_url' => '%s/assets/images/header.jpg',
            'description'   => esc_html__('Default Header Image', 'edubin'),
        ),
    ));
    add_theme_support('custom-header', $args);
}

add_action('after_setup_theme', 'edubin_setup');

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Edubin 5.0.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function edubin_get_font_url()
{
    $fonts_url = '';
    $subsets   = 'latin';
    $defaults  = edubin_generate_defaults();

    /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'.
     * Do not translate into your own language.
     */
    $bodyFont = json_decode(get_theme_mod('edubin_body_text_font', $defaults['edubin_body_text_font']), true);

    /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'.
     * Do not translate into your own language.
     */
    $headerFont = json_decode(get_theme_mod('edubin_heading_font', $defaults['edubin_heading_font']), true);

    /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'.
     * Do not translate into your own language.
     */
    $menuFont = json_decode(get_theme_mod('edubin_menu_text_font', $defaults['edubin_menu_text_font']), true);

    /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'.
     * Do not translate into your own language.
     */
    $submenuFont = json_decode(get_theme_mod('edubin_sub_menu_text_font', $defaults['edubin_sub_menu_text_font']), true);

    if ('off' !== $bodyFont || 'off' !== $headerFont || 'off' !== $menuFont || 'off' !== $submenuFont) {
        $font_families = array();

        if ('off' !== $bodyFont) {
            $font_families[] = $bodyFont['font'] . ':' . ',' . $bodyFont['boldweight'];
        }

        if ('off' !== $headerFont) {
            $font_families[] = $headerFont['font'] . ':' . ',' . $headerFont['boldweight'];
        }

        if ('off' !== $menuFont) {
            $font_families[] = $menuFont['font'] . ':' . ',' . $menuFont['boldweight'];
        }

        if ('off' !== $submenuFont) {
            $font_families[] = $submenuFont['font'] . ':' . ',' . $submenuFont['boldweight'];
        }

        $query_args = array(
            'family'  => urlencode(implode('|', $font_families)),
            'subset'  => urlencode($subsets),
            'display' => urlencode('fallback'),
        );
        $fonts_url = add_query_arg($query_args, "https://fonts.googleapis.com/css");
    }

    return esc_url_raw($fonts_url);
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Edubin 5.0.0
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function edubin_resource_hints($urls, $relation_type)
{
    if (wp_style_is('edubin-fonts', 'queue') && 'preconnect' === $relation_type) {
        if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '>=')) {
            $urls[] = array(
                'href' => 'https://fonts.gstatic.com',
                'crossorigin',
            );
        } else {
            $urls[] = 'https://fonts.gstatic.com';
        }
    }

    return $urls;
}
add_filter('wp_resource_hints', 'edubin_resource_hints', 10, 2);

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses edubin_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Edubin 5.0.0
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function edubin_mce_css($mce_css)
{
    $font_url = edubin_get_font_url();

    if (empty($font_url)) {
        return $mce_css;
    }

    if (!empty($mce_css)) {
        $mce_css .= ',';
    }

    $mce_css .= esc_url_raw(str_replace(',', '%2C', $font_url));

    return $mce_css;
}
add_filter('mce_css', 'edubin_mce_css');

/**
 * Change the excerpt length
 */
function edubin_excerpt_length($length)
{
    $excerpt = get_theme_mod('exc_lenght', '45');
    return $excerpt;
}
add_filter('excerpt_length', 'edubin_excerpt_length', 999);

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
function edubin_javascript_detection()
{
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'edubin_javascript_detection', 0);

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function edubin_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
    }
}
add_action('wp_head', 'edubin_pingback_header');

/**
 * Filter the `sizes` value in the header image markup.
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function edubin_header_image_tag($html, $header, $attr)
{
    if (isset($attr['sizes'])) {
        $html = str_replace($attr['sizes'], '100vw', $html);
    }
    return $html;
}
add_filter('get_header_image_tag', 'edubin_header_image_tag', 10, 3);

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function edubin_front_page_template($template)
{
    return is_home() ? '' : $template;
}
add_filter('frontpage_template', 'edubin_front_page_template');

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size and use list format for better accessibility.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function edubin_widget_tag_cloud_args($args)
{
    $args['largest']  = 1;
    $args['smallest'] = 1;
    $args['unit']     = 'em';
    $args['format']   = 'list';

    return $args;
}
add_filter('widget_tag_cloud_args', 'edubin_widget_tag_cloud_args');


/**
 * Edubin get id
 */

if (!function_exists('edubin_array_get')) {
    function edubin_array_get($array, $key, $default = null)
    {
        if (!is_array($array)) {
            return $default;
        }

        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}

if (!function_exists('edubin_get_id')) {
    function edubin_get_id()
    {
        global $wp_query;
        return $wp_query->get_queried_object_id();
    }
}
