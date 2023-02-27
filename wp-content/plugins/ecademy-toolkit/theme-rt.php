<?php
$theme = wp_get_theme(); // gets the current theme
if ( 'eCademy' == $theme->name || 'eCademy' == $theme->parent_theme ) {
	/**	
	 * Classes
	 */
	require_once(ECADEMY_ACC_PATH . 'inc/classes/eCademy_base.php');
	require_once(ECADEMY_ACC_PATH . 'inc/classes/eCademy_rt.php');
	require_once(ECADEMY_ACC_PATH . 'inc/classes/eCademy_admin_page.php');
	require_once(ECADEMY_ACC_PATH . 'inc/admin/dashboard/eCademy_admin_dashboard.php');
	require_once(ECADEMY_ACC_PATH . 'inc/functions.php');

    /**
     * Redirect after theme activation
     */
    add_action( 'after_switch_theme', function() {
        if ( isset( $_GET['activated'] ) ) {
            wp_safe_redirect( admin_url('admin.php?page=ecademy') );
            update_option( 'ecademy_purchase_code_status', '', 'yes' );
            update_option( 'ecademy_purchase_code', '', 'yes' );
            exit;
        }
        update_option('notice_dismissed', '0');
    });
}