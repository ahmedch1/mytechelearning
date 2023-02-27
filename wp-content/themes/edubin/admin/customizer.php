<?php

/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function edubin_sanitize_colorscheme($input)
{
    $valid = array('light', 'dark', 'custom');

    if (in_array($input, $valid, true)) {
        return $input;
    }
    return 'light';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Edubin 1.0
 * @see edubin_customize_register()
 *
 * @return void
 */
function edubin_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Edubin 1.0
 * @see edubin_customize_register()
 *
 * @return void
 */
function edubin_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function edubin_is_static_front_page()
{
    return (is_front_page() && !is_home());
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function edubin_is_view_with_layout_option()
{
    // This option is available on all pages. It's also available on archives when there isn't a sidebar.
    return (is_page() || (is_archive() && !is_active_sidebar('sidebar-1')));
}

if (!function_exists('edubin_sanitize_checkbox')):

    /**
     * Sanitize checkbox.
     *
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function edubin_sanitize_checkbox($checked)
{

        return ((isset($checked) && true === $checked) ? true : false);

    }

endif;

if (!function_exists('edubin_sanitize_select')):

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function edubin_sanitize_select($input, $setting)
{

        // Ensure input is clean.
        $input = sanitize_text_field($input);

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);

    }

endif;

// If custom color active
if (!function_exists('edubin_custom_color_active')):

    function edubin_custom_color_active($control)
{

        if (true == $control->manager->get_setting('show_custom_color')->value()) {
            return true;
        } else {
            return false;
        }

    }
endif;

if (!function_exists('edubin_header_style')):
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see edubin_custom_header_setup().
 */
    function edubin_header_style()
{

        $header_text_color = get_header_textcolor();?>
          <?php if (!empty($header_text_color && $header_text_color !== 'blank')): ?>
            <style type="text/css">
              .site-description{
               color: #<?php echo esc_attr($header_text_color); ?>;
             }
           </style>
         <?php endif;?>
<?php }

endif;

/**
 * Customize video play/pause button in the custom header.
 *
 * @param array $settings Video settings.
 * @return array The filtered video settings.
 */
function edubin_video_controls($settings)
{
    $settings['l10n']['play']  = '<span class="screen-reader-text">' . esc_html__('Play background video', 'edubin') . '</span>' . edubin_get_svg(array('icon' => 'play'));
    $settings['l10n']['pause'] = '<span class="screen-reader-text">' . esc_html__('Pause background video', 'edubin') . '</span>' . edubin_get_svg(array('icon' => 'pause'));
    return $settings;
}
add_filter('header_video_settings', 'edubin_video_controls');

//  Start customizer 2
if (!function_exists('edubin_customizer_preview_scripts')) {
    function edubin_customizer_preview_scripts()
    {
        wp_enqueue_script('edubin-customizer-preview', trailingslashit(get_template_directory_uri()) . 'admin/assets/js/customizer-preview.js', array('customize-preview', 'jquery'));
    }
}
add_action('customize_preview_init', 'edubin_customizer_preview_scripts');

/**
 * Load dynamic logic for the customizer controls area.
 */
function edubin_panels_js()
{
    wp_enqueue_script('edubin-customize-controls', trailingslashit(get_template_directory_uri()) . '/assets/js/customize-controls.js', array(), 1.0, true);
}
add_action('customize_controls_enqueue_scripts', 'edubin_panels_js');

/**
 * Set our Social Icons URLs.
 * Only needed for our sample customizer preview refresh
 *
 * @return array Multidimensional array containing social media data
 */
if (!function_exists('edubin_generate_social_urls')) {
    function edubin_generate_social_urls()
    {
        $social_icons = array(
            array('url' => 'behance.net', 'icon' => 'flaticon-behance-logo', 'title' => esc_html__('Follow me on Behance', 'edubin'), 'class' => 'behance'),
            array('url' => 'bitbucket.org', 'icon' => 'flaticon-bitbucket-logo', 'title' => esc_html__('Fork me on Bitbucket', 'edubin'), 'class' => 'bitbucket'),
            array('url' => 'dribbble.com', 'icon' => 'flaticon-dribbble-logo', 'title' => esc_html__('Follow me on Dribbble', 'edubin'), 'class' => 'dribbble'),
            array('url' => 'facebook.com', 'icon' => 'flaticon-facebook', 'title' => esc_html__('Like me on Facebook', 'edubin'), 'class' => 'facebook'),
            array('url' => 'flickr.com', 'icon' => 'flaticon-flickr-website-logo-silhouette', 'title' => esc_html__('Connect with me on Flickr', 'edubin'), 'class' => 'flickr'),
            array('url' => 'github.com', 'icon' => 'flaticon-github-character', 'title' => esc_html__('Fork me on GitHub', 'edubin'), 'class' => 'github'),
            array('url' => 'instagram.com', 'icon' => 'flaticon-instagram-1', 'title' => esc_html__('Follow me on Instagram', 'edubin'), 'class' => 'instagram'),

            array('url' => 'linkedin.com', 'icon' => 'flaticon-linkedin', 'title' => esc_html__('Connect with me on LinkedIn', 'edubin'), 'class' => 'linkedin'),
            array('url' => 'telegram.org', 'icon' => 'flaticon-send', 'title' => esc_html__('Connect with me on Telegram', 'edubin'), 'class' => 'telegram'),
            array('url' => 'medium.com', 'icon' => 'flaticon-medium-size', 'title' => esc_html__('Folllow me on Medium', 'edubin'), 'class' => 'medium'),
            array('url' => 'pinterest.com', 'icon' => 'flaticon-pinterest', 'title' => esc_html__('Follow me on Pinterest', 'edubin'), 'class' => 'pinterest'),
            array('url' => 'plus.google.com', 'icon' => 'flaticon-logo', 'title' => esc_html__('Connect with me on Google+', 'edubin'), 'class' => 'googleplus'),
            array('url' => 'slack.com', 'icon' => 'fa-slack', 'title' => esc_html__('Join me on Slack', 'edubin'), 'class' => 'slack.'),
            array('url' => 'snapchat.com', 'icon' => 'flaticon-snapchat', 'title' => esc_html__('Add me on Snapchat', 'edubin'), 'class' => 'snapchat'),
            array('url' => 'soundcloud.com', 'icon' => 'flaticon-soundcloud', 'title' => esc_html__('Follow me on SoundCloud', 'edubin'), 'class' => 'soundcloud'),
            array('url' => 'stackoverflow.com', 'icon' => 'flaticon-overflowing-stacked-papers-tray', 'title' => esc_html__('Join me on Stack Overflow', 'edubin'), 'class' => 'stackoverflow'),
            array('url' => 'tumblr.com', 'icon' => 'flaticon-tumblr-logo', 'title' => esc_html__('Follow me on Tumblr', 'edubin'), 'class' => 'tumblr'),
            array('url' => 'twitter.com', 'icon' => 'flaticon-twitter', 'title' => esc_html__('Follow me on Twitter', 'edubin'), 'class' => 'twitter'),
            array('url' => 'vimeo.com', 'icon' => 'flaticon-vimeo-logo', 'title' => esc_html__('Follow me on Vimeo', 'edubin'), 'class' => 'vimeo'),
            array('url' => 'youtube.com', 'icon' => 'flaticon-youtube-logotype', 'title' => esc_html__('Subscribe to me on YouTube', 'edubin'), 'class' => 'youtube'),
            array('url' => 'whatsapp.com', 'icon' => 'flaticon-whatsapp', 'title' => esc_html__('Subscribe to me on whatsapp', 'edubin'), 'class' => 'whatsapp'),
            array('url' => 'skype.com', 'icon' => 'flaticon-skype', 'title' => esc_html__('Subscribe to me on skype', 'edubin'), 'class' => 'skype'),
            array('url' => 'vk.com', 'icon' => 'flaticon-vk', 'title' => esc_html__('Subscribe to me on vk', 'edubin'), 'class' => 'vk'),
        );

        return apply_filters('edubin_social_icons', $social_icons);
    }
}

/**
 * Return an unordered list of linked social media icons, based on the urls provided in the Customizer Sortable Repeater
 * This is a sample function to display some social icons on your site.
 * This sample function is also used to show how you can call a PHP function to refresh the customizer preview.
 * Add the following to header.php if you want to see the sample social icons displayed in the customizer preview and your theme.
 * Before any social icons display, you'll also need to add the relevent URL's to the Header Navigation > Social Icons section in the Customizer.
 * <div class="social">
 *   <?php echo edubin_get_social_media(); ?>
 * </div>
 *
 * @return string Unordered list of linked social media icons
 */
if (!function_exists('edubin_get_social_media')) {
    function edubin_get_social_media()
    {
        $defaults         = edubin_generate_defaults();
        $output           = '';
        $social_icons     = edubin_generate_social_urls();
        $social_urls      = [];
        $social_newtab    = 0;
        $social_alignment = '';

        $social_urls      = explode(',', get_theme_mod('social_urls', $defaults['social_urls']));
        $social_newtab    = get_theme_mod('social_newtab', $defaults['social_newtab']);
        $social_alignment = get_theme_mod('social_alignment', $defaults['social_alignment']);

        foreach ($social_urls as $key => $value) {
            if (!empty($value)) {
                $domain = str_ireplace('www.', '', parse_url($value, PHP_URL_HOST));
                $index  = array_search($domain, array_column($social_icons, 'url'));
                if (false !== $index) {
                    $output .= sprintf('<li class="%1$s"><a href="%2$s" title="%3$s"%4$s><i class="glyph-icon %5$s"></i></a></li>',
                        $social_icons[$index]['class'],
                        esc_url($value),
                        $social_icons[$index]['title'],
                        (!$social_newtab ? '' : ' target="_blank"'),
                        $social_icons[$index]['icon']
                    );
                } else {
                    $output .= sprintf('<li class="nosocial"><a href="%2$s"%3$s><i class="glyph-icon %4$s"></i></a></li>',
                        $social_icons[$index]['class'],
                        esc_url($value),
                        (!$social_newtab ? '' : ' target="_blank"'),
                        'flaticon-world'
                    );
                }
            }
        }

        if (!empty($output)) {
            $output = '<ul class="social-icons ' . $social_alignment . '">' . $output . '</ul>';
        }

        return $output;
    }
}

/**
 * Append a search icon to the primary menu
 * This is a sample function to show how to append an icon to the menu based on the customizer search option
 * The search icon wont actually do anything
 */
if (!function_exists('edubin_add_search_menu_item')) {
    function edubin_add_search_menu_item($items, $args)
    {
        $defaults = edubin_generate_defaults();

        if ( get_theme_mod('search_menu_icon', $defaults['search_menu_icon']) ) {
            if ( $args->theme_location == 'primary' ) {
                $items .= '<li class="menu-item menu-item-search"><a href="#" class="nav-search"><i class="flaticon-zoom"></i></a></li>';
            }
        }
        return $items;
    }
}
add_filter('wp_nav_menu_items', 'edubin_add_search_menu_item', 10, 2);

if (file_exists(get_template_directory() . '/admin/customizer-defaults.php')) {
    require_once get_template_directory() . '/admin/customizer-defaults.php';
}

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class edubin_initialise_customizer_settings
{
    // Get our default values
    private $defaults;

    public function __construct()
    {
        // Get our Customizer defaults
        $this->defaults = edubin_generate_defaults();

        // Register our Panels
        add_action('customize_register', array($this, 'edubin_add_customizer_panels'));

        // Register our sections
        add_action('customize_register', array($this, 'edubin_add_customizer_sections'));

        // Register our sections
        add_action('customize_register', array($this, 'edubin_add_customizer_sections'));

        // Register our social media controls
        add_action('customize_register', array($this, 'edubin_register_body_text_controls'));

        // Register our heading controls
        add_action('customize_register', array($this, 'edubin_register_heading_controls'));

        // Register our menu controls
        add_action('customize_register', array($this, 'edubin_register_menu_text_controls'));

        // Register our menu controls
        add_action('customize_register', array($this, 'edubin_register_sub_menu_text_controls'));
    }
    //Customizer Panel
    public function edubin_add_customizer_panels($wp_customize)
    {
        $wp_customize->add_panel('general_panel',
            array(
                'title'    => esc_html__('General', 'edubin'),
                'priority' => 90,
            )
        );
        $wp_customize->add_panel('header_naviation_panel',
            array(
                'title'    => esc_html__('Header', 'edubin'),
                'priority' => 90,
            )
        );
        $wp_customize->add_panel('tutor_panel',
            array(
                'title'    => esc_html__('Tutor LMS', 'edubin'),
                'priority' => 90,
            )
        );
        $wp_customize->add_panel('learnpress_panel',
            array(
                'title'    => esc_html__('LearnPress LMS', 'edubin'),
                'priority' => 90,
            )
        );
        $wp_customize->add_panel('learndash_panel',
            array(
                'title'    => esc_html__('LearnDash LMS', 'edubin'),
                'priority' => 90,
            )
        );
        $wp_customize->add_panel('sensei_panel',
            array(
                'title'    => esc_html__('Sensei LMS', 'edubin'),
                'priority' => 90,
            )
        );
        $wp_customize->add_panel('zoom_meeting_panel',
            array(
                'title'    => esc_html__('Zoom Meeting', 'edubin'),
                'priority' => 90,
            )
        );
        $wp_customize->add_panel('edubin_tribe_customizer_panel',
            array(
                'title'    => esc_html__('Events', 'edubin'),
                'priority' => 125,
            )
        );
        $wp_customize->add_panel('footer_panel',
            array(
                'title'    => esc_html__('Footer', 'edubin'),
                'priority' => 200,
            )
        );

        $wp_customize->add_panel('typography_panel',
            array(
                'title'       => __('Typography', 'edubin'),
                'description' => esc_html__('Configure your fonts.', 'edubin'),
                'priority'    => 50,
            )
        );

    }

    //Customizer Settings
    public function edubin_add_customizer_sections($wp_customize)
    {

        // Move customizer default settings
        $wp_customize->add_section('title_tagline', array(
            'title'    => esc_html__('Name & Logo', 'edubin'),
            'priority' => 20,
            'panel'    => 'general_panel',
        ));
        $wp_customize->add_section('colors', array(
            'title'    => esc_html__('Colors', 'edubin'),
            'priority' => 40,
            'panel'    => 'general_panel',
        ));
        $wp_customize->add_section('background_image', array(
            'title'          => esc_html__('Background Image', 'edubin'),
            'theme_supports' => 'custom-background',
            'priority'       => 80,
            'panel'          => 'general_panel',
        ));

        $wp_customize->add_section('error_404', array(
            'title'    => esc_html__('404 Page', 'edubin'),
            'priority' => 80,
            'panel'    => 'general_panel',
        ));

        $wp_customize->add_section('header_image', array(
            'title'          => esc_html__('Page Header', 'edubin'),
            'theme_supports' => 'custom-header',
            'priority'       => 200,
            'panel'          => 'header_naviation_panel',
        ));

        if (file_exists(get_template_directory() . '/admin/theme-panel/general.php')) {
            require_once get_template_directory() . '/admin/theme-panel/general.php';
        }
        if (file_exists(get_template_directory() . '/admin/theme-panel/header.php')) {
            require_once get_template_directory() . '/admin/theme-panel/header.php';
        }
        if (class_exists('LearnPress') && file_exists(get_template_directory() . '/admin/theme-panel/learnpress.php')) {
            require_once get_template_directory() . '/admin/theme-panel/learnpress.php';
        }
        if (class_exists('SFWD_LMS') && file_exists(get_template_directory() . '/admin/theme-panel/learndash.php')) {
            require_once get_template_directory() . '/admin/theme-panel/learndash.php';
        }
        if (function_exists('tutor') && file_exists(get_template_directory() . '/admin/theme-panel/tutor.php')) {
            require_once get_template_directory() . '/admin/theme-panel/tutor.php';
        }
        if (class_exists('Sensei_Main') && file_exists(get_template_directory() . '/admin/theme-panel/sensei.php')) {
            require_once get_template_directory() . '/admin/theme-panel/sensei.php';
        }
        if (class_exists('Video_Conferencing_With_Zoom') && file_exists(get_template_directory() . '/admin/theme-panel/zoom.php')) {
            require_once get_template_directory() . '/admin/theme-panel/zoom.php';
        }
        if (class_exists('Tribe__Events__Main') && file_exists(get_template_directory() . '/admin/theme-panel/tribe_events.php')) {
            require_once get_template_directory() . '/admin/theme-panel/tribe_events.php';
        }
        if (class_exists('WooCommerce') && file_exists(get_template_directory() . '/admin/theme-panel/woocommerce.php')) {
            require_once get_template_directory() . '/admin/theme-panel/woocommerce.php';
        }
        if (file_exists(get_template_directory() . '/admin/theme-panel/color.php')) {
            require_once get_template_directory() . '/admin/theme-panel/color.php';
        }
        if (file_exists(get_template_directory() . '/admin/theme-panel/typography.php')) {
            require_once get_template_directory() . '/admin/theme-panel/typography.php';
        }
        if (file_exists(get_template_directory() . '/admin/theme-panel/social.php')) {
            require_once get_template_directory() . '/admin/theme-panel/social.php';
        }
        if (file_exists(get_template_directory() . '/admin/theme-panel/footer.php')) {
            require_once get_template_directory() . '/admin/theme-panel/footer.php';
        }
        if (file_exists(get_template_directory() . '/admin/theme-panel/blog.php')) {
            require_once get_template_directory() . '/admin/theme-panel/blog.php';
        }

    }
    /**
     * Register our Body Text controls
     */
    public function edubin_register_body_text_controls($wp_customize)
    {
        // Add our Google Font Control for getting the Body text font
        $wp_customize->add_setting('edubin_body_text_font',
            array(
                'default'           => $this->defaults['edubin_body_text_font'],
                'sanitize_callback' => 'edubin_google_font_sanitization',
            )
        );
        $wp_customize->add_control(new Edubin_Google_Font_Select_Custom_Control($wp_customize, 'edubin_body_text_font',
            array(
                'label'       => __('Body Typography', 'edubin'),
                'section'     => 'typography_section',
                'input_attrs' => array(
                    'font_count' => 'all',
                    'orderby'    => 'alpha',
                ),
            )
        ));
        // body font size
        $wp_customize->add_setting('edubin_body_font_size',
            array(
                'default'           => $this->defaults['edubin_body_font_size'],
                'transport'         => 'refresh',
                'sanitize_callback' => 'edubin_sanitize_integer',

            )
        );
        $wp_customize->add_control(new Edubin_Slider_Custom_Control($wp_customize, 'edubin_body_font_size',
            array(
                'label'       => esc_html__('Body Font Size', 'edubin'),
                'section'     => 'typography_section',
                'input_attrs' => array(
                    'min'  => 12,
                    'max'  => 22,
                    'step' => 1,
                ),
            )
        ));
        // body line height
        $wp_customize->add_setting('edubin_body_line_height',
            array(
                'default'           => $this->defaults['edubin_body_line_height'],
                'transport'         => 'refresh',
                'sanitize_callback' => 'edubin_sanitize_integer',

            )
        );
        $wp_customize->add_control(new Edubin_Slider_Custom_Control($wp_customize, 'edubin_body_line_height',
            array(
                'label'       => esc_html__('Body Line Height', 'edubin'),
                'section'     => 'typography_section',
                'input_attrs' => array(
                    'min'  => 18,
                    'max'  => 38,
                    'step' => 1,
                ),
            )
        ));
    }

    /**
     * Register our Heading controls
     */
    public function edubin_register_heading_controls($wp_customize)
    {
        // Add our Google Font Control for getting the Heading font
        $wp_customize->add_setting('edubin_heading_font',
            array(
                'default'           => $this->defaults['edubin_heading_font'],
                'sanitize_callback' => 'edubin_google_font_sanitization',
            )
        );
        $wp_customize->add_control(new Edubin_Google_Font_Select_Custom_Control($wp_customize, 'edubin_heading_font',
            array(
                'label'       => __('Heading Typography', 'edubin'),
                'section'     => 'typography_section',
                'input_attrs' => array(
                    'font_count' => 'all',
                    'orderby'    => 'alpha',
                ),
            )
        ));

    }

    /**
     * Register our Body Text controls
     */
    public function edubin_register_menu_text_controls($wp_customize)
    {
        // Add our Google Font Control for getting the menu text font
        $wp_customize->add_setting('edubin_menu_text_font',
            array(
                'default'           => $this->defaults['edubin_menu_text_font'],
                'sanitize_callback' => 'edubin_google_font_sanitization',
            )
        );
        $wp_customize->add_control(new Edubin_Google_Font_Select_Custom_Control($wp_customize, 'edubin_menu_text_font',
            array(
                'label'       => __('Menu Typography', 'edubin'),
                'section'     => 'typography_section',
                'input_attrs' => array(
                    'font_count' => 'all',
                    'orderby'    => 'alpha',
                ),
            )
        ));
    }

    /**
     * Register our Body Text controls
     */
    public function edubin_register_sub_menu_text_controls($wp_customize)
    {
        // Add our Google Font Control for getting the menu text font
        $wp_customize->add_setting('edubin_sub_menu_text_font',
            array(
                'default'           => $this->defaults['edubin_sub_menu_text_font'],
                'sanitize_callback' => 'edubin_google_font_sanitization',
            )
        );
        $wp_customize->add_control(new Edubin_Google_Font_Select_Custom_Control($wp_customize, 'edubin_sub_menu_text_font',
            array(
                'label'       => __('Sub Menu Typography', 'edubin'),
                'section'     => 'typography_section',
                'input_attrs' => array(
                    'font_count' => 'all',
                    'orderby'    => 'alpha',
                ),
            )
        ));

    }
}

// Admin init
if (file_exists(get_template_directory() . '/admin/tgm/tgm-init.php')) {
    require_once get_template_directory() . '/admin/tgm/tgm-init.php';
}

if (file_exists(get_template_directory() . '/admin/admin-pages/admin.php')) {
    require_once get_template_directory() . '/admin/admin-pages/admin.php';
}

if (!is_customize_preview() && is_admin()) {
    require get_template_directory() . '/admin/envato_setup/envato_setup.php';
}

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit(dirname(__FILE__)) . 'custom-controls.php';

/**
 * Initialise our Customizer settings
 */
$edubin_settings = new edubin_initialise_customizer_settings();
