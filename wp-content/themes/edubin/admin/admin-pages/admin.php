<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $pagenow;

function edubin_welcome_page(){
   require_once 'edubin-welcome.php';
}

function edubin_theme_active_page(){
   require_once 'edubin-theme-active.php';
}

// function edubin_theme_plugins_page(){
//    require_once 'edubin-theme-plugins.php';
// }

function edubin_help_center_page(){
   require_once 'edubin-help-center.php';
}

function edubin_requirements_page(){
   require_once 'edubin-requirements.php';
}

function edubin_admin_menu(){
    if ( current_user_can( 'edit_theme_options' ) ) {

        add_menu_page( 'Edubin', 'Edubin', 'administrator', 'edubin-admin-menu', 'edubin_welcome_page', get_template_directory_uri() . '/assets/images/fav.png', 4 );

        add_submenu_page( 'edubin-admin-menu', 'edubin', esc_html__('Welcome','edubin'), 'administrator', 'edubin-admin-menu', 'edubin_welcome_page' );

        add_submenu_page( 'edubin-admin-menu', 'edubin', esc_html__('Activate Theme','edubin'), 'administrator', 'edubin-theme-active', 'edubin_theme_active_page' );

        add_submenu_page('edubin-admin-menu', '', 'Theme Options', 'manage_options', 'customize.php' );

        if (class_exists('OCDI_Plugin')):
           add_submenu_page( 'edubin-admin-menu', esc_html__( 'Demo Import', 'edubin' ), esc_html__( 'Demo Import', 'edubin' ), 'administrator', 'demo_install', 'demo_install_function' );
       endif;
      // add_submenu_page( 'edubin-admin-menu', 'edubin', esc_html__('Theme Plugins','edubin'), 'administrator', 'edubin-theme-plugins', 'edubin_theme_plugins_page' );      

      add_submenu_page( 'edubin-admin-menu', 'edubin', esc_html__('Requirements','edubin'), 'administrator', 'edubin-requirements', 'edubin_requirements_page' );

      add_submenu_page( 'edubin-admin-menu', 'edubin', esc_html__('Help Center','edubin'), 'administrator', 'edubin-help-center', 'edubin_help_center_page' );


   }


}

add_action( 'admin_menu', 'edubin_admin_menu' );

function demo_install_function(){
    ?>
    <script>location.href='<?php echo esc_url(admin_url().'themes.php?page=pt-one-click-demo-import');?>';</script>
    <?php
}

if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

	wp_redirect(admin_url("admin.php?page=edubin-admin-menu"));
	
}









