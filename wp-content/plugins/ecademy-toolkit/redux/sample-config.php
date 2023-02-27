<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = ECADEMY_FRAMEWORK_VAR;

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'opt_name/opt_name', $opt_name );

    // Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {
        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();
            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    // All the possible arguments for Redux.
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'ecademy-toolkit' ),
        'page_title'           => esc_html__( 'Theme Options', 'ecademy-toolkit' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 90,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'ecademy_opt',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p></p>', 'ecademy-toolkit' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'ecademy-toolkit' );
    }
    Redux::setArgs( $opt_name, $args );
    // END ARGUMENTS

// General Options
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'General Options', 'ecademy-toolkit' ),
    'id'                => 'general_options',
    'customizer'        => false,
    'icon'              => ' el el-home',
    'fields'     => array(
        array(
            'id'      => 'ecademy_enable_rtl',
            'type'    => 'select',
            'options' => array(
                'enable'        => 'Enable',
                'disable'       => 'Disable',
            ),
            'title'     => esc_html__( 'RTL', 'ecademy-toolkit' ),
            'default'   => 'disable',
        ),
        array(
            'id'       => 'main_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Site Logo', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'ecademy-toolkit' ),
        ),
        array(
            'title'     => esc_html__( 'Main Logo dimensions', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo. Recommended size 160X35', 'ecademy-toolkit' ),
            'id'        => 'logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.ecademy-nav .navbar .navbar-brand'
        ),
        array(
            'id'       => 'mobile_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Logo For Mobile (optional)', 'ecademy-toolkit' ),
            'subtitle' => esc_html__( 'Upload here a image file for your mobile logo.', 'ecademy-toolkit' ),
        ),
        array(
            'title'     => esc_html__( 'Mobile Logo dimensions', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo. Recommended size 130X35', 'ecademy-toolkit' ),
            'id'        => 'mobile_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.ecademy-responsive-menu>.logo>a>img'
        ),
        array(
            'id'       => 'footer_main_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Site Logo for Footer', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload footer logo.Recommended size 160X35', 'ecademy-toolkit' ),
        ),
        array(
            'title'     => esc_html__( 'Footer Logo dimensions', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your footer logo. Recommended size 160X35', 'ecademy-toolkit' ),
            'id'        => 'footer_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.single-footer-widget .logo>img'
        ),
        array(
            'id'        => 'enable_sticky_header',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Sticky Header', 'ecademy-toolkit'),
            'desc'      => esc_html__('', 'ecademy-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'        => 'enable_back_to_top',
            'type'      => 'switch',
            'title'     => esc_html__('Enable back-to-top Button', 'ecademy-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'      => 'enable_lazyloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Lazy Loader', 'ecademy-toolkit' ),
            'on'      => esc_html__( 'Enable', 'ecademy-toolkit' ),
            'off'     => esc_html__( 'Disable', 'ecademy-toolkit' ),
            'default' => true,
        ),

        array(
            'id'      => 'ecademy_event_posts_per_page',
            'type'    => 'text',
            'title'   => esc_html__( 'Event Per Page', 'ecademy-toolkit' ),
            'default' => 9,
        ),
    ),
) );

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Preloader', 'ecademy-toolkit' ),
    'id'               => 'preloader_opt',
    'icon'             => 'dashicons dashicons-controls-repeat',
    'fields'           => array(

        array(
            'id'      => 'enable_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Pre-loader', 'ecademy-toolkit' ),
            'on'      => esc_html__( 'Enable', 'ecademy-toolkit' ),
            'off'     => esc_html__( 'Disable', 'ecademy-toolkit' ),
            'default' => true,
        ),

        array(
            'required' => array( 'enable_preloader', '=', '1' ),
            'id'       => 'preloader_style',
            'type'     => 'select',
            'title'    => esc_html__( 'Pre-loader Style', 'ecademy-toolkit' ),
            'default'   => 'text',
            'options'  => array(
                'circle-spin'   => esc_html__( 'Circle Spin Preloader', 'ecademy-toolkit' ),
                'text'          => esc_html__( 'Text Preloader', 'ecademy-toolkit' ),
                'image'         => esc_html__( 'Image Preloader', 'ecademy-toolkit' )
            ),
            'default'  => array(
                'preloader_style'  => 'circle-spin',
            ),
        ),

        /**
         * Text Preloader
         */
        array(
            'title'     => esc_html__( 'Color', 'ecademy-toolkit' ),
            'id'        => 'preloader_color',
            'type'      => 'color',
            'output'    => array( '.preloader .loader .sbl-half-circle-spin, .preloader p' ),
            'required'  => array( 'preloader_style', '!=', 'image' ),
        ),
        array(
            'id'       => 'loading_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Loading Text', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Loading', 'ecademy-toolkit' ),
            'required' => array( 'preloader_style', '=', 'text' ),
        ),

        array(
            'title'         => esc_html__( 'Loading Text Typography', 'ecademy-toolkit' ),
            'id'            => 'preloader_small_typo',
            'type'          => 'typography',
            'text-align'    => false,
            'color'         => false,
            'output'        => '.preloader p',
            'required' => array( 'preloader_style', '=', 'text' ),
        ),

        /**
         * Image Preloader
         */
        array(
            'required' => array( 'preloader_style', '=', 'image' ),
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Pre-loader image', 'ecademy-toolkit' ),
            'compiler' => true,
            'default'  => array(
                'url'  => get_template_directory_uri() .'/assets/img/status.gif'
            ),
        ),
    )
));

// Header Option
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Header', 'ecademy-toolkit'),
	'icon'  => 'el el-caret-up',
	'customizer' => false,
	'fields' => array(
        array(
            'title'     => esc_html__( 'Header Template', 'ecademy-toolkit' ),
            'subtitle'  => __( 'Navigate to Headers > Add New from your WordPress dashboard to add a new Header Template.', 'ecademy-toolkit' ),
            'id'        => 'header_style',
            'type'      => 'select',
            'options'   => ecademy_get_post_title_array('header'),
        ),
        array(
            'id'        => 'if_header_template_selected',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Warning', 'ecademy-toolkit' ),
            'desc'      => esc_html__( 'You have selected a Custom Header template. Now, all the Header Settings will not apply. Edit your Header template with Header Elementor.', 'ecademy-toolkit' ),
            'required'  => array( 'header_style', '!=', '' ),
        ),
        array(
            'id' => 'enable_cart_btn',
            'type' => 'switch',
            'title' => esc_html__('Enable Woocommerce Cart', 'ecademy-toolkit'),
            'default' => '1',
            'required'  => array( 'header_style', '=', '' ),
        ),
        array(
            'id'        => 'enable_search_bar',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Search Bar', 'ecademy-toolkit'),
            'default'   => '1',
            'required'  => array( 'header_style', '=', '' ),
        ),
        array(
			'id'        => 'search_placeholder_text',
            'type'      => 'text',
			'title'     => esc_html__('Course Search Placeholder Text', 'ecademy-toolkit'),
            'required'  => array( 'enable_search_bar', '=', '1', ),
        ),
        array(
			'id'        => 'login_register_title',
            'type'      => 'text',
			'title'     => esc_html__('Login/Register Title', 'ecademy-toolkit'),
            'required'  => array( 'header_style', '=', '' ),
        ),
        array(
            'id'        => 'login_register_link_type',
            'type'       => 'select',
            'options'   => ecademy_toolkit_get_page_as_list(),
            'title'     => esc_html__( 'Login/Register Page', 'ecademy-toolkit' ),
        ),
        array(
			'id'        => 'profile_text',
            'type'      => 'text',
			'title'     => esc_html__('Profile Title', 'ecademy-toolkit'),
            'required'  => array( 'header_style', '=', '' ),
        ),
        array(
            'id'        => 'profile_link',
            'type'      => 'select',
            'options'   => ecademy_toolkit_get_page_as_list(),
            'title'     => esc_html__( 'Profile Page', 'ecademy-toolkit' ),
            'required'  => array( 'header_style', '=', '' ),
        ),
	)
) );

// Header Styling
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Header Styling', 'ecademy-toolkit' ),
    'id'               => 'header_styling_sec',
    'customizer_width' => '400px',
    'icon'             => '',
    'subsection'       => true,
    'fields'           => array(
        array(
            'title'     => esc_html__( 'Navbar box layout', 'ecademy-toolkit' ),
            'id'        => 'nav_layout',
            'type'      => 'select',
            'default'   => 'container-fluid',
            'options'   => array(
                'container' => esc_html__( 'Container', 'ecademy-toolkit' ),
                'container-fluid' => esc_html__( 'Full Width', 'ecademy-toolkit' ),
            )
        ),

        array(
            'title'     => esc_html__( 'Menu Alignment', 'ecademy-toolkit' ),
            'id'        => 'menu_alignment',
            'type'      => 'select',
            'default'   => 'menu_right',
            'options'   => array(
                'menu_left'     => esc_html__( 'Left', 'ecademy-toolkit' ),
                'menu_center'   => esc_html__( 'Center', 'ecademy-toolkit' ),
                'menu_right'    => esc_html__( 'Right', 'ecademy-toolkit' ),
            )
        ),
        array(
            'id'            => 'opt-typography-menu-item',
            'type'          => 'typography',
            'title'         => esc_html__( 'Menu Item Typography', 'ecademy-toolkit' ),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => true,
            'output' => array(
                '.ecademy-nav .navbar .navbar-nav .nav-item a',
            ),
        ),
        // Mobile Menu
        array(
            'id'            => 'opt-typography-mobile-menu-item',
            'type'          => 'typography',
            'title'         => esc_html__( 'Mobile Menu Item Typography', 'ecademy-toolkit' ),
            'google'        => true,
            'font-backup'   => true,
            'all_styles'    => true,
            'font-style'    => true,
            'font-weight'   => true,
            'font-size'     => true,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => true,
            'output' => array(
                '.mean-container .mean-nav ul li a, .mean-container .mean-nav ul li li a',
            ),
        ),

    ),
));

// Banner
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Banner', 'ecademy-toolkit' ),
    'id'                => 'banner_options',
    'customizer'        => false,
    'icon'              => 'el el-website',
    'fields'     => array(
        array(
            'id'        => 'titlebar_title_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Title Typography', 'ecademy-toolkit' ),
            'output'    => '.page-title-content h2'
        ),

        array(
            'id'      => 'is_breadcrumb',
            'type'    => 'switch',
            'title'   => esc_html__( 'Breadcrumb', 'ecademy-toolkit' ),
            'on'      => esc_html__( 'Enable', 'ecademy-toolkit' ),
            'off'     => esc_html__( 'Disable', 'ecademy-toolkit' ),
            'default' => true,
        ),

        array(
            'id'        => 'titlebar_breadcrumb_typo',
            'type'      => 'typography',
            'title'     => esc_html__( 'Breadcrumb Typography', 'ecademy-toolkit' ),
            'output'    => '.page-title-content ul li, .learn-press-breadcrumb, .woocommerce-breadcrumb',
            'required'  => array('is_breadcrumb','equals','1'),
        ),

        array(
            'title'     => esc_html__( 'Banner Padding', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'Padding around the Banner.', 'ecademy-toolkit' ),
            'id'        => 'banner_padding',
            'type'      => 'spacing',
            'output'    => array( '.page-title-area' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),
            'units_extended' => 'true',
        ),
        array(
            'title'     => esc_html__( 'Background Shape Image', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'The default background shape image. Use here a transparent png shape image. The shape will appear on the top right side of the banner.', 'ecademy-toolkit' ),
            'id'        => 'banner_shape_image',
            'type'      => 'media',
            'compiler'  => true,
        ),
        array(
            'id'      => 'enable_shape_images',
            'type'    => 'switch',
            'title'   => esc_html__( 'Enable Page Shape Image', 'ecademy-toolkit' ),
            'on'      => esc_html__( 'Enable', 'ecademy-toolkit' ),
            'off'     => esc_html__( 'Disable', 'ecademy-toolkit' ),
            'default' => true,
        ),
        array(
            'id'       => 'shape_image1',
            'type'     => 'media',
            'title'    => esc_html__( 'Shape Image 1', 'ecademy-toolkit' ),
            'type'     => 'media',
            'compiler' => true,
            'default'  => array(
                'url'  => get_template_directory_uri() .'/assets/img/shape8.svg'
            ),
            'required' => array('enable_shape_images','equals','1'),
        ),
    ),
) );

// Popup Option
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Popup Subscribe', 'ecademy-toolkit' ),
    'id'            => 'sub',
    'customizer'    => false,
    'icon'          => 'el el-resize-full',
    'desc'          => 'if you do not active Newsletter plugin then popup not work!',
    'fields'     => array(
        array(
            'id' => 'ecademy_newsletter_type',
            'type' => 'select',
            'options' => array(
                'mailchimp'             => esc_html__( 'Mailchimp', 'ecademy-toolkit' ),
                'newsletter'            => esc_html__( 'Newsletter Plugin', 'ecademy-toolkit' ),
            ),
            'title'     => esc_html__( 'Newsletter Option', 'ecademy-toolkit' ),
            'default'   => 'mailchimp',
        ),

        array(
            'id'    => 'action_url',
            'type'  => 'text',
            'title' => esc_html__( 'Action URL', 'ecademy-toolkit' ),
            'desc' => __( 'Enter here your MailChimp action URL. <a href="https://www.docs.envytheme.com/docs/ecademy-theme-documentation/tips-guides-troubleshoots/get-mailchimp-newsletter-form-action-url/" target="_blank"> How to </a>', 'ecademy-toolkit' ),
            'required' => array( 'ecademy_newsletter_type', '=', 'mailchimp' ),
        ),

        array(
            'id' => 'enable_popup_massage',
            'type' => 'switch',
            'title' => esc_html__('Enable Popup Message!', 'ecademy-toolkit'),
            'default' => '1',
        ),
        array(
            'id'       => 'popup_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Popup Image', 'ecademy-toolkit' ),
            'default'  => array(
                'url'  => get_template_directory_uri() .'/assets/img/newsletter-img.jpg'
            ),
            'required' => array( 'enable_popup_massage', '=', '1' ),
        ),
        array(
            'id'    => 'popup_title',
            'type'  => 'text',
            'title' => esc_html__( 'Popup Title', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Subscribe to our newsletter', 'ecademy-toolkit' ),
            'required' => array( 'enable_popup_massage', '=', '1' ),
        ),
        array(
            'id'    => 'popup_desc',
            'type'  => 'textarea',
            'title' => esc_html__( 'Popup Description', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Sign up to receive updates, promotions, and sneak peeks of upcoming courses. Plus 20% off your next course.', 'ecademy-toolkit' ),
            'required' => array( 'enable_popup_massage', '=', '1' ),
        ),
        array(
            'id'    => 'popup_place',
            'type'  => 'text',
            'title' => esc_html__( 'Popup Placeholder Text', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Enter your email', 'ecademy-toolkit' ),
            'required' => array( 'enable_popup_massage', '=', '1' ),
        ),
        array(
            'id'    => 'popup_button_text',
            'type'  => 'text',
            'title' => esc_html__( 'Popup Button Text', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Subscribe Now', 'ecademy-toolkit' ),
            'required' => array( 'enable_popup_massage', '=', '1' ),
        ),

        array(
            'id'    => 'popup_bottom_desc',
            'type'  => 'textarea',
            'title' => esc_html__( 'Newsletter Bottom Description', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Your information will never be shared with any third party', 'ecademy-toolkit' ),
            'required' => array( 'enable_popup_massage', '=', '1' ),
        ),
    ),
) );

// Social Profiles
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Social Profiles', 'ecademy-toolkit'),
	'desc'  => 'Social profiles are used in different places inside the theme.',
	'icon'  => 'el-icon-user',
	'customizer' => false,
	'fields' => array(
        array(
            'id' => 'ecademy_social_target',
            'type' => 'select',
            'options' => array(
                '_blank'    => 'Load in a new window. ( _blank )',
                '_self'     => 'Load in the same frame as it was clicked. ( _self )',
                '_parent'   => 'Load in the parent frameset. ( _parent )',
                '_top'      => 'Load in the full body of the window ( _top )',
            ),
            'title'     => esc_html__( 'Social Link Target', 'ecademy-toolkit' ),
            'default'   => '_blank',
        ),

        array(
			'id'    => 'twitter_url',
            'type'  => 'text',
			'title' => esc_html__('Twitter URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'facebook_url',
			'type'  => 'text',
			'title' =>esc_html__('Facebook URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'instagram_url',
			'type'  => 'text',
			'title' => esc_html__('Instagram URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'linkedin_url',
			'type'  => 'text',
			'title' => esc_html__('Linkedin URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'pinterest_url',
			'type'  => 'text',
			'title' =>esc_html__('Pinterest URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'dribbble_url',
			'type'  => 'text',
			'title' =>esc_html__('Dribbble URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'tumblr_url',
			'type'  => 'text',
			'title' =>esc_html__('Tumblr URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'youtube_url',
			'type'  => 'text',
			'title' =>  esc_html__('Youtube URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'flickr_url',
			'type'  => 'text',
			'title' =>  esc_html__('Flickr URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'behance_url',
			'type'  => 'text',
			'title' =>  esc_html__('Behance URL', 'ecademy-toolkit'),
		),
		array(
			'id'    => 'github_url',
			'type'  => 'text',
			'title' =>  esc_html__('Github URL', 'ecademy-toolkit'),
		),
		array(
			'id'    => 'skype_url',
			'type'  => 'text',
			'title' =>  esc_html__('Skype URL', 'ecademy-toolkit'),
		),
		array(
			'id'    => 'rss_url',
			'type'  => 'text',
			'title' =>  esc_html__('RSS URL', 'ecademy-toolkit')
		),
		array(
			'id'    => 'custom_url_1',
			'type'  => 'text',
			'title' =>  esc_html__('Custom URL 1', 'ecademy-toolkit'),
		),
		array(
			'id'    => 'custom_icon_1',
			'type'  => 'text',
			'title' =>  esc_html__('Cutom Icon 1', 'ecademy-toolkit'),
			'desc' =>  esc_html__('use icon class name here(boxicons.com | fontawesome.com icons)', 'ecademy-toolkit')
		),
        array(
			'id'    => 'custom_url_2',
			'type'  => 'text',
			'title' =>  esc_html__('Custom URL 2', 'ecademy-toolkit'),
		),
		array(
			'id'    => 'custom_icon_2',
			'type'  => 'text',
			'title' =>  esc_html__('Cutom Icon 2', 'ecademy-toolkit'),
			'desc' =>  esc_html__('use icon class name here(boxicons.com | fontawesome.com icons)', 'ecademy-toolkit')
		),
        array(
			'id'    => 'custom_url_3',
			'type'  => 'text',
			'title' =>  esc_html__('Custom URL 3', 'ecademy-toolkit'),
		),
		array(
			'id'    => 'custom_icon_3',
			'type'  => 'text',
			'title' =>  esc_html__('Cutom Icon 3', 'ecademy-toolkit'),
			'desc' =>  esc_html__('use icon class name here(boxicons.com | fontawesome.com icons)', 'ecademy-toolkit')
		),
	)
) );

// Footer Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Footer', 'ecademy-toolkit' ),
    'id'                => 'footer',
    'customizer'        => false,
    'icon'              => 'el el-edit',
    'fields' => array(
        array(
            'title'     => esc_html__( 'Footer Style', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'Select a Footer template from here. Leave the field empty to use the default footer.', 'ecademy-toolkit' ),
            'id'        => 'footer_style',
            'type'      => 'select',
            'options'   => ecademy_get_post_title_array('footer'),
        ),
        array(
            'title'     => esc_html__( 'Footer Column', 'ecademy-toolkit' ),
            'id'        => 'footer_column',
            'type'      => 'select',
            'default'   => '3',
            'options'   => array(
                '12' => esc_html__( 'One Column', 'ecademy-toolkit' ),
                '6' => esc_html__( 'Two Column', 'ecademy-toolkit' ),
                '4' => esc_html__( 'Three Column', 'ecademy-toolkit' ),
                '3' => esc_html__( 'Four Column', 'ecademy-toolkit' ),
            ),
        ),
		array(
			'id'    => 'footer_desc',
			'type'  => 'textarea',
			'title' =>  esc_html__('Footer Description', 'ecademy-toolkit'),
        ),
        array(
            'id'        => 'enable_footer_social',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Footer Social Icons', 'ecademy-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'        => 'enable_footer_line',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Footer Line Animation', 'ecademy-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'        => 'copyright_text',
            'type'      => 'editor',
            'title'     => esc_html__('Footer copyright text (optional)', 'ecademy-toolkit'),
            'subtitle'  => esc_html__('HTML and Shortcodes are allowed', 'ecademy-toolkit'),
            'desc'      => '',
            'args' => array(
                'teeny'         => true,
                'media_buttons' => false
            ),
        ),
    )
));

// Cursor
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Cursor', 'ecademy-toolkit' ),
    'id'                => 'cursor_options',
    'customizer'        => false,
    'icon'              => 'el el-move',
    'fields'     => array(
        array(
            'id'      => 'is_cursor',
            'type'    => 'switch',
            'title'   => esc_html__( 'Cursor Animation', 'ecademy-toolkit' ),
            'on'      => esc_html__( 'Enable', 'ecademy-toolkit' ),
            'off'     => esc_html__( 'Disable', 'ecademy-toolkit' ),
            'default' => true,
        ),
        array(
            'title'     => esc_html__( 'Cursor Dot Color', 'ecademy-toolkit' ),
            'id'        => 'cursor_dot_color',
            'type'      => 'color',
            'output'    => array( '.ecademy-cursor' ),
            'mode'      => 'background-color',
            'required'  => array( 'is_cursor', '=', '1' ),
        ),
        array(
            'title'     => esc_html__( 'Cursor Border Color', 'ecademy-toolkit' ),
            'id'        => 'cursor_border_color',
            'type'      => 'color',
            'output'    => array( '.ecademy-cursor2' ),
            'mode'      => 'border-color',
            'required'  => array( 'is_cursor', '=', '1' ),
        ),
    ),
) );

// Styling
Redux::setSection( $opt_name, array(
    'title'        => esc_html__( 'Styling Options', 'ecademy-toolkit' ),
    'id'           => 'styling_options',
    'customizer'   => false,
    'icon'         => ' el el-magic',
    'fields'     => array(
        array(
            'id'            => 'primary_color',
            'type'          => 'color',
            'title'         => esc_html__('Primary Color', 'ecademy-toolkit'),
            'default'       => '#fe4a55',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'header_background_color',
            'type'          => 'color',
            'title'         => esc_html__('Header Background Color.', 'ecademy-toolkit'),
            'default'       => '#fff',
            'validate'      => 'color',
            'transparent'   => false
        ),
        array(
            'title'     => esc_html__( 'Menu Item Color', 'ecademy-toolkit' ),
            'id'        => 'menu_item_color',
            'type'      => 'color',
            'output'    => array( '.ecademy-nav .navbar .navbar-nav .nav-item a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li a, .ecademy-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a, .mean-container .mean-nav ul li a, .mean-container .mean-nav ul li li a' ),
            'important'     => true,
            'transparent'   => false,
        ),
        array(
            'id'            => 'footer_bg',
            'type'          => 'color',
            'title'         => esc_html__('Footer Background Color.', 'ecademy-toolkit'),
            'default'       => '#100f1f',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'title'     => esc_html__( 'Footer Color', 'ecademy-toolkit' ),
            'id'        => 'footer_item_color',
            'type'      => 'color',
            'output'    => array( '.footer-area .single-footer-widget p, .footer-area .single-footer-widget ul li, .single-footer-widget .footer-contact-info li a' ),
            'transparent'   => false,
        ),
        array(
            'title'     => esc_html__( 'Footer Title Color', 'ecademy-toolkit' ),
            'id'        => 'footer_title_color',
            'type'      => 'color',
            'output'    => array( '.footer-area .single-footer-widget h3' ),
            'transparent'   => false,
        ),
        array(
            'id'            => 'kitchen_color',
            'type'          => 'color',
            'title'         => esc_html__('Kitchen Coach Demo Color', 'ecademy-toolkit'),
            'default'       => '#72ae44',
            'validate'      => 'color',
            'transparent'   => false,
        ),
    ),
) );

// Blog Area
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Blog Settings', 'ecademy-toolkit' ),
    'id'            => 'ecademy_blog',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your blog settings.',
    'fields' => array(
        array(
			'id'    => 'ecademy_search_page',
            'type'  => 'switch',
            'title' => esc_html__('Enable Pages on Search Result Page', 'ecademy-toolkit'),
        ),
        array(
			'id'    => 'hide_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide Blog Breadcrumb', 'ecademy-toolkit'),
            'default'   => '0',
        ),
        array(
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Title', 'ecademy-toolkit' ),
        ),
        array(
            'id' => 'ecademy_blog_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'ecademy-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'ecademy-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Width', 'ecademy-toolkit' ),
            'default'   => 'container',
        ),
        array(
            'id' => 'ecademy_blog_grid',
            'type' => 'select',
            'options' => array(
                'col-lg-12 col-md-12'       => esc_html__( 'One Column', 'ecademy-toolkit' ),
                'col-lg-6 col-md-6'         => esc_html__( 'Two Column', 'ecademy-toolkit' ),
                'col-lg-4 col-md-6'         => esc_html__( 'Three Column', 'ecademy-toolkit' ),
                'col-lg-3 col-md-6'         => esc_html__( 'Four Column', 'ecademy-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Sidebar', 'ecademy-toolkit' ),
            'default'   => 'col-lg-12 col-md-12',
        ),
        array(
            'id' => 'ecademy_blog_sidebar',
            'type' => 'select',
            'options' => array(
                'ecademy_with_sidebar'              => 'With Sidebar',
                'ecademy_without_sidebar'           => 'Without Sidebar ( full width )',
                'ecademy_without_sidebar_center'    => 'Without Sidebar( center )',
            ),
            'title'     => esc_html__( 'Blog Sidebar', 'ecademy-toolkit' ),
            'default'   => 'ecademy_with_sidebar',
        ),
        array(
			'id'    => 'hide_author_info',
            'type'  => 'switch',
			'title' => esc_html__('Hide Post Author Info', 'ecademy-toolkit'),
            'default'   => '0',
        ),
        array(
			'id'    => 'hide_post_meta',
            'type'  => 'switch',
			'title' => esc_html__('Hide Post Meta', 'ecademy-toolkit'),
            'default'   => '0',
        ),
        array(
            'id'       => 'author_cover_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Author Cover Image', 'ecademy-toolkit' ),
            'required' => array( 'hide_author_info', '=', '0' ),
        ),
    )
));

// Courses Post
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Course Settings', 'ecademy-toolkit' ),
    'id'            => 'ecademy_course',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your Course settings.',
    'fields' => array(
        array(
            'id'        => 'hide_course_card_meta',
            'type'      => 'switch',
            'title'     => esc_html__('Hide Course Card Meta Info', 'ecademy-toolkit'),
            'default'   => '0',
            'desc'      => esc_html__('To hide course students and lessons info into course card', 'ecademy-toolkit'),
        ),
        array(
            'id'       => 'buy_course_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Buy Course Button Text', 'ecademy-toolkit' ),
        ),

        array(
            'id'       => 'lessons_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Lessons Text', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Lessons', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'students_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Students Text', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Students', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'tutor_course_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Tutor/LearnDash Course Page Title Text', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Courses', 'ecademy-toolkit' ),
        ),
    )
));

// LearnPress
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'LearnPress Course', 'ecademy-toolkit' ),
    'id'            => 'ecademy_course_lp',
    'customizer'    => false,
    'subsection'    => true,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your LearnPress Course settings.',
    'fields' => array(
        array(
            'id' => 'enable_buy_now_btn_tab',
            'type' => 'select',
            'options' => array(
                '1'          => 'Click to open curriculum tab',
                '0'          => 'Click to enroll course',
            ),
            'title'     => esc_html__( 'Buy Now Button Free Course Action', 'ecademy-toolkit' ),
            'default'   => 'ecademy_with_sidebar',
        ),
        array(
            'id'       => 'course_page_bg_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Course Page Background Image', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'price_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Price Title', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Price', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'rating_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Rating Title', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'course_instructor_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Instructor Label Text', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'student_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Students Label Text', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'lessons_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Lessons Label Text', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'duration_label',
            'type'     => 'text',
            'title'    => esc_html__( ' Duration Label Text', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'access_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Access Label Text', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'enrolled_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Enrolled Label Text', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'share_course_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Share Course Title', 'ecademy-toolkit' ),
        ),

        array(
            'id'      => 'is_related_courses',
            'type'    => 'switch',
            'title'   => esc_html__( 'Related Courses', 'ecademy-toolkit' ),
            'on'      => esc_html__( 'Enable', 'ecademy-toolkit' ),
            'off'     => esc_html__( 'Disable', 'ecademy-toolkit' ),
            'default' => true,
        ),
        array(
            'id'       => 'related_courses_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Related Courses Title', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'More Courses You Might Like', 'ecademy-toolkit' ),
            'required'  => array( 'is_related_courses', '=', '1' ),
        ),
        array(
            'id'       => 'related_post_count',
            'type'     => 'text',
            'title'    => esc_html__( 'Related Courses Count', 'ecademy-toolkit' ),
            'default'  => esc_html__( '3', 'ecademy-toolkit' ),
            'required'  => array( 'is_related_courses', '=', '1' ),
        ),
        array(
            'id'       => 'massage_btn_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Massage Button Text', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Massage', 'ecademy-toolkit' ),
        ),
        array(
            'id'        => 'if_massage_btn_text_used',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Warning', 'ecademy-toolkit' ),
            'desc'      => esc_html__( 'Please make sure Front End PM plugin is activate', 'ecademy-toolkit' ),
            'required'  => array( 'massage_btn_text', '!=', '' ),
        ),
        array(
            'id'        => 'massage_btn_link',
            'type'       => 'select',
            'options'   => ecademy_toolkit_get_page_as_list(),
            'title'     => esc_html__( 'Select Massage Page', 'ecademy-toolkit' ),
            'required'  => array( 'massage_btn_text', '!=', '' ),
        ),
        array(
            'id'        => 'lesson_icon',
            'type'      => 'select',
            'title'     => esc_html__( 'Lesson Icon', 'ecademy-toolkit' ),
            'options' => array(
                '\f100'      => esc_html__('Search', 'ecademy'),
                '\f101'      => esc_html__('Cart', 'ecademy'),
                '\f102'      => esc_html__('Arrow', 'ecademy'),
                '\f103'      => esc_html__('People', 'ecademy'),
                '\f104'      => esc_html__('Brain Process', 'ecademy'),
                '\f105'      => esc_html__('Computer', 'ecademy'),
                '\f106'      => esc_html__('World', 'ecademy'),
                '\f107'      => esc_html__('Shield', 'ecademy'),
                '\f108'      => esc_html__('Search Two', 'ecademy'),
                '\f109'      => esc_html__('Time Left', 'ecademy'),
                '\f10a'      => esc_html__('Quotation', 'ecademy'),
                '\f10b'      => esc_html__('Play', 'ecademy'),
                '\f10c'      => esc_html__('User', 'ecademy'),
                '\f10d'      => esc_html__('Calender', 'ecademy'),
                '\f10e'      => esc_html__('Heart', 'ecademy'),
                '\f10f'      => esc_html__('Right Chevron', 'ecademy'),
                '\f110'      => esc_html__('Tag', 'ecademy'),
                '\f111'      => esc_html__('Teacher', 'ecademy'),
                '\f112'      => esc_html__('Time 3', 'ecademy'),
                '\f113'      => esc_html__('Distance Learning', 'ecademy'),
                '\f114'      => esc_html__('Web', 'ecademy'),
                '\f115'      => esc_html__('Lock', 'ecademy'),
                '\f116'      => esc_html__('Credit Card', 'ecademy'),
                '\f117'      => esc_html__('Share', 'ecademy'),
                '\f118'      => esc_html__('Password', 'ecademy'),
                '\f119'      => esc_html__('Right', 'ecademy'),
                '\f11a'      => esc_html__('History', 'ecademy'),
                '\f11b'      => esc_html__('Home', 'ecademy'),
                '\f11c'      => esc_html__('Chevron', 'ecademy'),
                '\f11d'      => esc_html__('Right Arrow', 'ecademy'),
                '\f11f'      => esc_html__('Tick', 'ecademy'),
                '\f11e'      => esc_html__('HTML', 'ecademy'),
                '\f120'      => esc_html__('Caption', 'ecademy'),
                '\f121'      => esc_html__('Quiz', 'ecademy'),
                '\f122'      => esc_html__('Certification 1', 'ecademy'),
                '\f123'      => esc_html__('Experience', 'ecademy'),
                '\f124'      => esc_html__('Tutorials', 'ecademy'),
                '\f125'      => esc_html__('Self Growth', 'ecademy'),
                '\f126'      => esc_html__('Checkmark', 'ecademy'),
                '\f127'      => esc_html__('Webinar', 'ecademy'),
                '\f128'      => esc_html__('Redit Card 1', 'ecademy'),
                '\f129'      => esc_html__('Verify', 'ecademy'),
                '\f12a'      => esc_html__('Cancel', 'ecademy'),
                '\f12b'      => esc_html__('Agenda', 'ecademy'),
                '\f12c'      => esc_html__('Diet', 'ecademy'),
                '\f12d'      => esc_html__('Vitamin C', 'ecademy'),
                '\f12e'      => esc_html__('Heart Rate Monitor', 'ecademy'),
                '\f12f'      => esc_html__('Pineapple', 'ecademy'),
                '\f130'      => esc_html__('Healthy Food', 'ecademy'),
                '\f131'      => esc_html__('Yoga', 'ecademy'),
                '\f132'      => esc_html__('Lotus', 'ecademy'),
                '\f133'      => esc_html__('Tomato', 'ecademy'),
                '\f134'      => esc_html__('Yoga 1', 'ecademy'),
                '\f135'      => esc_html__('Yoga 2', 'ecademy'),
                '\f136'      => esc_html__('Strawberry', 'ecademy'),
                '\f137'      => esc_html__('Guitar', 'ecademy'),
                '\f138'      => esc_html__('Certification 2', 'ecademy'),
                '\f139'      => esc_html__('Artist', 'ecademy'),
                '\f13a'      => esc_html__('Translation', 'ecademy'),
            ),
        ),
    )
));

// LearnDash
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'LearnDash Course', 'ecademy-toolkit' ),
    'id'            => 'ecademy_course_ld',
    'customizer'    => false,
    'subsection'    => true,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your LearnDash Course settings.',
    'fields' => array(

        array(
            'id'       => 'ld_enroll_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Enroll Now Button Title', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Enroll Now', 'ecademy-toolkit' ),
        ),

        array(
            'id'       => 'ld_enrolled_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Enrolled Button Title', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Continue Course', 'ecademy-toolkit' ),
        ),

        array(
            'id'       => 'ld_free_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Free Text', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'Free', 'ecademy-toolkit' ),
        ),

        array(
            'id'      => 'ld_is_related_courses',
            'type'    => 'switch',
            'title'   => esc_html__( 'Related Courses', 'ecademy-toolkit' ),
            'on'      => esc_html__( 'Enable', 'ecademy-toolkit' ),
            'off'     => esc_html__( 'Disable', 'ecademy-toolkit' ),
            'default' => true,
        ),
        array(
            'id'       => 'ld_related_courses_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Related Courses Title', 'ecademy-toolkit' ),
            'default'  => esc_html__( 'More Courses You Might Like', 'ecademy-toolkit' ),
            'required'  => array( 'is_related_courses', '=', '1' ),
        ),
        array(
            'id'       => 'ld_related_post_count',
            'type'     => 'text',
            'title'    => esc_html__( 'Related Courses Count', 'ecademy-toolkit' ),
            'default'  => esc_html__( '3', 'ecademy-toolkit' ),
            'required'  => array( 'is_related_courses', '=', '1' ),
        ),
    )
));

// Typography
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Typography', 'ecademy-toolkit' ),
    'desc' => esc_html__( 'Manage your fonts and typefaces.', 'ecademy-toolkit' ),
    'icon' => 'el-icon-fontsize',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'            => 'opt-typography-body',
            'type'          => 'typography',
            'title'         => esc_html__( 'Body primary  font', 'ecademy-toolkit' ),
            'google'        => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                'body',
            ), // An array of CSS selectors to apply this font style to dynamically
            'default' => array(
                'font-family' => 'Poppins',
                'google' => true,
            ),
        ),
    ),
) );

// Advanced Settings
Redux::setSection( $opt_name, array(
	'title'         => esc_html__('Advanced Settings', 'ecademy-toolkit'),
    'icon'          => 'el-icon-cogs',
    'customizer'    => false,
	'fields' => array(
		array(
			'id' => 'css_code',
			'type' => 'ace_editor',
			'title' => esc_html__('Custom CSS Code', 'ecademy-toolkit'),
			'desc' => esc_html__('e.g. .btn-primary{ background: #000; } Don\'t use &lt;style&gt; tags', 'ecademy-toolkit'),
			'subtitle' => esc_html__('Paste your CSS code here.', 'ecademy-toolkit'),
			'mode' => 'css',
			'theme' => 'monokai'
		),
		array(
			'id'        => 'js_code',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom JS Code', 'ecademy-toolkit'),
			'desc'      => esc_html__('e.g. alert("Hello World!"); Don\'t use&lt;script&gt;tags.', 'ecademy-toolkit'),
			'subtitle'  => esc_html__('Paste your JS code here.', 'ecademy-toolkit'),
			'mode'      => 'javascript',
			'theme'     => 'monokai'
		)
	)
) );

// WooCommerce Product
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'WooCommerce', 'ecademy-toolkit' ),
    'desc'  => esc_html__( 'Manage product page settings.', 'ecademy-toolkit' ),
    'icon'  => 'el-icon-list-alt',
    'customizer'    => false,
    'fields' => array(
        array(
            'title'     => esc_html__( 'Page title', 'ecademy-toolkit' ),
            'subtitle'  => esc_html__( 'Give here the shop page title', 'ecademy-toolkit' ),
            'desc'      => esc_html__( 'This text will show on the shop page banner', 'ecademy-toolkit' ),
            'id'        => 'shop_title',
            'type'      => 'text',
            'default'   => esc_html__( 'Shop', 'ecademy-toolkit' ),
        ),

        array(
            'id'    => 'enable_auto_complete',
            'type'  => 'select',
            'options' => array(
                'yes'       => 'Yes',
                'no'        => 'No',
            ),
            'title' => esc_html__('Enable Woocommerce Automatically Complete Orders', 'ecademy-toolkit'),
            'default'   => 'yes',
        ),
        array(
            'id'        => 'enable_shop_pages_banner',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Shop Page Banner', 'ecademy-toolkit'),
            'default'   => '0'
        ),
        array(
            'id'    => 'product_columns',
            'type'  => 'select',
            'options' => array(
                ''         => 'Default',
                '2'        => '2',
                '3'        => '3',
                '4'        => '4',
            ),
            'title' => esc_html__('Select Product Columns', 'ecademy-toolkit'),
            'default'   => '',
        ),
        array(
            'id'        => 'products_page_count',
            'desc'      => esc_html__( 'Number of products per page on product pages.', 'ecademy-toolkit' ),
            'type'      => 'text',
            'title'     => esc_html__( 'Products per page', 'ecademy-toolkit' ),
            'default'   => '6',
        ),
        array(
            'id'    => 'ecademy_product_sidebar',
            'type'  => 'select',
            'options' => array(
                'ecademy_product_no_sidebar'       => 'None',
                'ecademy_product_left_sidebar'     => 'Sidebar on the left',
                'ecademy_product_right_sidebar'    => 'Sidebar on the right',
            ),
            'title'     => esc_html__( 'Product Sidebar Position', 'ecademy-toolkit' ),
            'default'   => 'ecademy_product_no_sidebar',
        ),
        array(
            'id'    => 'ecademy_related_product_count',
            'type'  => 'text',
            'title' => esc_html__( 'Product Details Related Product Count', 'ecademy-toolkit' ),
            'desc'  => esc_html__( 'e.g. 3', 'ecademy-toolkit' ),
            'default' => '3',
        ),
        array(
            'id'        => 'enable_product_share',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Product Social share', 'ecademy-toolkit'),
            'default'   => '0'
        ),

        array(
            'id'        => 'enable_social_share_title',
            'type'      => 'text',
            'title'     => esc_html__('Share Title', 'ecademy-toolkit'),
            'default'   => 'Share:',
            'required'  => array('enable_product_share','equals','1'),
        ),
        array(
            'id'        => 'enable_product_fb',
            'type'      => 'switch',
            'title'     => esc_html__('Share on facebook', 'ecademy-toolkit'),
            'default'   => '0',
            'required'  => array('enable_product_share','equals','1'),
        ),

        array(
            'id'        => 'enable_product_tw',
            'type'      => 'switch',
            'title'     => esc_html__('Share on twitter', 'ecademy-toolkit'),
            'default'   => '0',
            'required'  => array('enable_product_share','equals','1'),
        ),
        array(
            'id'        => 'enable_product_ld',
            'type'      => 'switch',
            'title'     => esc_html__('Share on linkdin', 'ecademy-toolkit'),
            'default'   => '0',
            'required'  => array('enable_product_share','equals','1'),
        ),
        array(
            'id'        => 'enable_product_wp',
            'type'      => 'switch',
            'title'     => esc_html__('Share on whatsapp', 'ecademy-toolkit'),
            'default'   => '0',
            'required'  => array('enable_product_share','equals','1'),
        ),
        array(
            'id'        => 'enable_product_email',
            'type'      => 'switch',
            'title'     => esc_html__('Share by email', 'ecademy-toolkit'),
            'default'   => '0',
            'required'  => array('enable_product_share','equals','1'),
        ),
        array(
            'id'        => 'enable_product_cp',
            'type'      => 'switch',
            'title'     => esc_html__('Copy link', 'ecademy-toolkit'),
            'default'   => '0',
            'required'  => array('enable_product_share','equals','1'),
        ),
    ),
));

// 404 Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( '404 Settings', 'ecademy-toolkit' ),
    'id'                => 'ecademy_404',
    'customizer'        => false,
    'icon'              => 'el el-question-sign',
    'fields'            => array(
        array(
            'id'       => 'not_found_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( '404 Page Image', 'ecademy-toolkit' ),
        ),
        array(
            'id'    => 'title_not_found',
            'type'  => 'text',
            'title' => esc_html__('404 Title', 'ecademy-toolkit'),
        ),
        array(
            'id'       => 'content_not_found',
            'type'     => 'textarea',
            'title'    => esc_html__( '404 Content', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'button_two_not_found',
            'type'     => 'text',
            'title'    => esc_html__( 'Go Back Button Text', 'ecademy-toolkit' ),
        ),
        array(
            'id'       => 'button_not_found',
            'type'     => 'text',
            'title'    => esc_html__( 'Back to Home Button Text', 'ecademy-toolkit' ),
        ),
    )
));

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    // Custom function for the callback validation referenced above
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    // Custom function for the callback referenced above
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'ecademy-toolkit' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'ecademy-toolkit' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    // Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    // Filter hook for filtering the default value of any given field. Very useful in development mode.
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    // Removes the demo link and the notice of integrated demo from the redux-framework plugin
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

// Add this on bottom of the file
if( !function_exists('ecademy_toolkit_js_code') ){
    trigger_error("Hey! Are you trying to heck this theme! Please register eCademy theme!", E_USER_ERROR);
}