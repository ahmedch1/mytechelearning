<?php
/**
 * Plugin Name: Edubin Core
 * Description: A Required core plugin for Edubin Theme.
 * Plugin URI: 	https://themeforest.net/item/edubin-education-lms-wordpress-theme/24037792
 * Author: 		ThePixelcurve
 * Author URI: 	http://thepixelcurve.com/
 * Version: 	8.13.27
 * Text Domain: edubin-core
*/

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

define( 'EDUBIN_VERSION', '8.13.27' );
define( 'EDUBIN_ADDONS_PL_URL', plugins_url( '/', __FILE__ ) );
define( 'EDUBIN_ADDONS_PL_PATH', plugin_dir_path( __FILE__ ) );

// Required File
require_once EDUBIN_ADDONS_PL_PATH.'includes/helper-function.php';
require_once EDUBIN_ADDONS_PL_PATH.'includes/metabox.php';
require_once EDUBIN_ADDONS_PL_PATH.'includes/cmb2/init.php';
// require_once EDUBIN_ADDONS_PL_PATH.'includes/cmb2-conditionals/cmb2-conditionals.php';
// require_once EDUBIN_ADDONS_PL_PATH.'includes/cmb2-switch-button/cmb2-switch-button.php';
require_once EDUBIN_ADDONS_PL_PATH.'includes/cmb2-fontawesome-icon-picker/cmb2-fontawesome-picker.php';
require_once EDUBIN_ADDONS_PL_PATH.'init.php';

// Shortcode initialization
function edubin_core_load() {
    Edubin_Shortcode_Social::init();
    Edubin_Shortcode_QuickInfo::init();
}
add_action( 'plugins_loaded', 'edubin_core_load' );

// Shortcode 
 require_once EDUBIN_ADDONS_PL_PATH . '/shortcodes/shortcode-social.php';
 require_once EDUBIN_ADDONS_PL_PATH . '/shortcodes/shortcode-quick-info.php';

// Widgets 
 require_once EDUBIN_ADDONS_PL_PATH . '/widgets/latest_post_widget.php';
 require_once EDUBIN_ADDONS_PL_PATH . '/widgets/lp_course.php';
 require_once EDUBIN_ADDONS_PL_PATH . '/widgets/ld_course.php';
 //require_once EDUBIN_ADDONS_PL_PATH . '/widgets/sensei_course.php';

 // Post Type 
 require_once EDUBIN_ADDONS_PL_PATH . '/post-types/post-types-register.php';


