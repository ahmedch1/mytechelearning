<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    //opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       //github.com/thomasgriffin/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

/**
 * Undocumented function
 */
function ecademy_register_required_plugins() {
	$selected_lms	=	get_option('et_selected_lms_plugin');


	if($selected_lms == 'tutor'):
		$plugins = array(

			array(
				'name'               => esc_html__('eCademy Toolkit', 'ecademy'),
				'slug'               => 'ecademy-toolkit',
				'source'             => get_template_directory() . '/lib/plugins/ecademy-toolkit.zip',
				'required'           => true,
			),

			array(
				'name'               => esc_html__('Elementor Page Builder', 'ecademy'),
				'slug'               => 'elementor',
				'required'           => true,
			),

			array(
				'name'               => esc_html__('Advanced Custom Fields Pro', 'ecademy'),
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => 'https://themes.envytheme.com/tools/advanced-custom-fields-pro.zip',
				'required'           => true,
			),

			array(
				'name'      => esc_html__('Tutor LMS', 'ecademy'),
				'slug'      => 'tutor',
				'required'  => false,
			),

			array(
				'name'      => esc_html__('WooCommerce', 'ecademy'),
				'slug'      => 'woocommerce',
				'required'  => false,
			),

			array(
				'name'      => esc_html__('WP Events Manager', 'ecademy'),
				'slug'      => 'wp-events-manager',
				'required'  => false,
			),


			// eCademy Plugins
			array(
				'name'      => esc_html__('Contact Form 7', 'ecademy'),
				'slug'      => 'contact-form-7',
				'source'    => 'https://downloads.wordpress.org/plugin/contact-form-7.5.6.3.zip',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('Newsletter', 'ecademy'),
				'slug'      => 'newsletter',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('Front End PM', 'ecademy'),
				'slug'      => 'front-end-pm',
				'required'  => false,
			),
			array(
				'name'               => esc_html__('Unyson', 'ecademy'),
				'slug'               => 'unyson',
				'required'           => true,
			),
		);
	elseif($selected_lms == 'learndash'):
		$plugins = array(

			array(
				'name'               => esc_html__('eCademy Toolkit', 'ecademy'),
				'slug'               => 'ecademy-toolkit',
				'source'             => get_template_directory() . '/lib/plugins/ecademy-toolkit.zip',
				'required'           => true,
			),

			array(
				'name'               => esc_html__('Elementor Page Builder', 'ecademy'),
				'slug'               => 'elementor',
				'required'           => true,
			),

			array(
				'name'               => esc_html__('Advanced Custom Fields Pro', 'ecademy'),
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => 'https://themes.envytheme.com/tools/advanced-custom-fields-pro.zip',
				'required'           => true,
			),

			array(
				'name'      => esc_html__('WooCommerce', 'ecademy'),
				'slug'      => 'woocommerce',
				'required'  => false,
			),

			array(
				'name'      => esc_html__('WP Events Manager', 'ecademy'),
				'slug'      => 'wp-events-manager',
				'required'  => false,
			),


			// eCademy Plugins
			array(
				'name'      => esc_html__('Contact Form 7', 'ecademy'),
				'slug'      => 'contact-form-7',
				'source'    => 'https://downloads.wordpress.org/plugin/contact-form-7.5.6.3.zip',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('Newsletter', 'ecademy'),
				'slug'      => 'newsletter',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('Front End PM', 'ecademy'),
				'slug'      => 'front-end-pm',
				'required'  => false,
			),
			array(
				'name'               => esc_html__('Unyson', 'ecademy'),
				'slug'               => 'unyson',
				'required'           => true,
			),
		);
	else:
		$plugins = array(

			array(
				'name'               => esc_html__('eCademy Toolkit', 'ecademy'),
				'slug'               => 'ecademy-toolkit',
				'source'             => get_template_directory() . '/lib/plugins/ecademy-toolkit.zip',
				'required'           => true,
			),

			array(
				'name'               => esc_html__('Elementor Page Builder', 'ecademy'),
				'slug'               => 'elementor',
				'required'           => true,
			),

			array(
				'name'               => esc_html__('Advanced Custom Fields Pro', 'ecademy'),
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => 'https://themes.envytheme.com/tools/advanced-custom-fields-pro.zip',
				'required'           => true,
			),

			array(
				'name'      => esc_html__('LearnPress', 'ecademy'),
				'slug'      => 'learnpress',
				'required'  => false,
			),

			array(
				'name'      => esc_html__('LearnPress – Course Review', 'ecademy'),
				'slug'      => 'learnpress-course-review',
				'required'  => false,
			),

			array(
				'name'      => esc_html__('WooCommerce', 'ecademy'),
				'slug'      => 'woocommerce',
				'required'  => false,
			),

			array(
				'name'      => esc_html__('WP Events Manager', 'ecademy'),
				'slug'      => 'wp-events-manager',
				'required'  => false,
			),


			// eCademy Plugins
			array(
				'name'      => esc_html__('Contact Form 7', 'ecademy'),
				'slug'      => 'contact-form-7',
				'source'    => 'https://downloads.wordpress.org/plugin/contact-form-7.5.6.3.zip',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('Newsletter', 'ecademy'),
				'slug'      => 'newsletter',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('Front End PM', 'ecademy'),
				'slug'      => 'front-end-pm',
				'required'  => false,
			),
			array(
				'name'               => esc_html__('Unyson', 'ecademy'),
				'slug'               => 'unyson',
				'required'           => true,
			),
		);
	endif;

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'ecademy_register_required_plugins' );
