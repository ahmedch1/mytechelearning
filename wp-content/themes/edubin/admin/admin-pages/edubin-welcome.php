<?php
function edubin_let_to_num( $size ) {
	$l   = substr( $size, -1 );
	$ret = substr( $size, 0, -1 );
	switch ( strtoupper( $l ) ) {
		case 'P':
		$ret *= 1024;
		case 'T':
		$ret *= 1024;
		case 'G':
		$ret *= 1024;
		case 'M':
		$ret *= 1024;
		case 'K':
		$ret *= 1024;
	}
	return $ret;
}
$ssl_check = 'https' === substr( get_home_url('/'), 0, 5 );
$green_mark = '<mark class="green"><span class="dashicons dashicons-yes"></span></mark>';

$edubintheme = wp_get_theme();

$plugins_counts = (array) get_option( 'active_plugins', array() );

if ( is_multisite() ) {
	$network_activated_plugins = array_keys( get_site_option( 'active_sitewide_plugins', array() ) );
	$plugins_counts            = array_merge( $plugins_counts, $network_activated_plugins );
}
?>

    <h2 class="nav-tab-wrapper">
        <?php

        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=edubin-admin-menu' ), esc_html__( 'Welcome', 'edubin' ) );

        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=edubin-theme-active' ), esc_html__( 'Activate Theme', 'edubin' ) );

        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'customize.php' ), esc_html__( 'Theme Options', 'edubin' ) );

        if (class_exists('OCDI_Plugin')):
            printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'themes.php?page=pt-one-click-demo-import' ), esc_html__( 'Demo Import', 'edubin' ) );
        endif;

        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=edubin-requirements' ), esc_html__( 'Requirements', 'edubin' ) );
        
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=edubin-help-center' ), esc_html__( 'Help Center', 'edubin' ) );

        ?>
    </h2>
	
	

		<div class="edubin-getting-started">
				<div class="edubin-getting-started__box">

					<div class="edubin-getting-started__content">
						<div class="edubin-getting-started__content--narrow">
							<h2><?php echo __( 'Welcome to Edubin', 'edubin' ); ?></h2>
							<p><?php echo __( 'Just complete the steps below and you will be able to use all functionalities of Edubin theme by Pixelcurve:', 'edubin' ); ?></p>
						</div>

						<div class="edubin-getting-started__video">
							<iframe width="620" height="350" src="https://www.youtube.com/embed/FoXWLqJPZz0;controls=1&amp;modestbranding=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>

						<div class="edubin-getting-started__actions edubin-getting-started__content--narrow">
	
							<a href="<?php echo admin_url( 'admin.php?page=edubin-setup' ); ?>" class="button-primary button-large button-next"><?php echo __( 'Getting Started', 'edubin' ); ?></a>
						</div>
					</div>
				</div>
			</div>


	


