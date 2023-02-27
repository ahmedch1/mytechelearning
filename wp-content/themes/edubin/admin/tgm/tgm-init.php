<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part('admin/tgm/class-tgm-plugin-activation');

add_action( 'tgmpa_register', 'edubin_register_required_plugins' );
          
function edubin_register_required_plugins() {

	$plugins = array(
	    
	    array(
            'name'      => esc_html__('Envato Market', 'edubin'),
            'slug'      => 'envato-market',
            'source'    => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
            'required'  => false,
		),
		array(
			'name'      => esc_html__('Elementor','edubin'),
			'slug'      => 'elementor',
			'required'  => true,
		),
		array(
            'name'      => esc_html__('Edubin Core', 'edubin'),
            'slug'      => 'edubin-core',
			'source'    => get_template_directory() . '/admin/tgm/plugins/edubin-core.zip',
            'required'  => true,
            'version'   => '8.13.27',
		),
        // array(
        //     'name'     => esc_html__( 'Edubin Core', 'edubin' ),
        //     'slug'     => 'edubin-core',
        //     'source'   => 'https://drive.google.com/uc?id=1aI3stefE8J--U_r4VXCSNI1CTQyHKcaq&export=download',
        //     'version'  => '8.13.27',
        //     'required' => true,
        // ),	
        array(
            'name'     => esc_html__('WooCommerce', 'edubin'),
            'slug'     => 'woocommerce',
            'required' => false
        ),
        array(
            'name'     => esc_html__('LearnPress', 'edubin'),
            'slug'     => 'learnpress',
            'required' => false,
        ),        
        array(
            'name'     => esc_html__('LearnPress Course Review', 'edubin'),
            'slug'     => 'learnpress-course-review',
            'required' => false,
        ),       
        array(
            'name'     => esc_html__('Tutor LMS', 'edubin'),
            'slug'     => 'tutor',
            'required' => false,
        ),       
        array(
            'name'     => esc_html__('Sensei LMS', 'edubin'),
            'slug'     => 'sensei-lms',
            'required' => false,
        ), 
        array(
            'name'     => esc_html__('The Events Calender', 'edubin'),
            'slug'     => 'the-events-calendar',
            'required' => false
        ),      
        array(
            'name'     => esc_html__('Registrations for The Events Calendar', 'edubin'),
            'slug'     => 'registrations-for-the-events-calendar',
            'required' => false
        ),      
        array(
            'name'     => esc_html__('Loco Translate', 'edubin'),
            'slug'     => 'loco-translate',
            'required' => false
        ),
        array(
            'name'      => esc_html__('Contact Form 7','edubin'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => esc_html__('One Click Demo Import', 'edubin'),
            'slug'      => 'one-click-demo-import',
            'required'  => false,
        )

);
	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'edubin-required-plugins', 			// Menu slug.
		'parent_slug'  => 'admin.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => false,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

function edubin_plugins_menu_args($args) {
    $args['parent_slug'] = 'edubin-admin-menu';
    return $args;
}

add_filter( 'tgmpa_admin_menu_args', 'edubin_plugins_menu_args' );