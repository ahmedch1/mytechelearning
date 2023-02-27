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
	
	



	<div class="edubin-system-stats">
		<h3><?php esc_html_e( 'System Status', 'edubin' ); ?></h3>

		<table class="system-status-table">
			<tbody>
				<tr>
					<td><?php esc_html_e( 'WP Version', 'edubin' ); ?></td>
					<td><?php bloginfo('version'); ?></td>
				</tr>
				
				<tr>
					<td><?php esc_html_e( 'Language', 'edubin' ); ?></td>
					<td><?php echo get_locale() ?></td>
				</tr>
				
				<tr>
					<td><?php esc_html_e( 'WP Memory Limit', 'edubin' ); ?></td>
					<td><?php
					$memory = edubin_let_to_num( WP_MEMORY_LIMIT );

					if ( $memory < 100663296 ) {
						echo '<mark class="error">' . sprintf(__('%s - We recommend setting memory to at least 96MB. %s.','edubin'), size_format( $memory ), '<a href="' . esc_url('https://thepixelcurve.com/how-to-increase-memory-limit-for-wordpress-site/') . '" target="_blank">'.esc_html__('More info','edubin').'</a>') . '</mark>';
					} else {
						echo '<mark class="green">' . size_format( $memory ) . '</mark>';
					}
					?></td>
				</tr>
			
				<tr>
					<td><?php esc_html_e( 'PHP Max Input Vars', 'edubin' ); ?></td>
					<td><?php
					$max_input = ini_get('max_input_vars');
					if ( $max_input < 3000 ) {
						echo '<mark class="error">' . sprintf( wp_kses(__( '%s - We recommend setting PHP max_input_vars to at least 3000. See: <a href="%s" target="_blank">Increasing the PHP max vars limit</a>', 'edubin' ), array( 'a' => array( 'href' => array(),'target' => array() ) ) ), $max_input, 'https://thepixelcurve.com/max-input-vars/' ) . '</mark>';
					} else {
						echo '<mark class="green">' . $max_input . '</mark>';
					}
					?></td>
				</tr>
				<tr>
					<td>
						<?php esc_html_e( 'PHP Version', 'edubin' ); ?> 
					</td>
					
					<td>
						<?php
						
						$mayo_php = phpversion();

						if ( version_compare( $mayo_php, '7.4', '<' ) ) {
							echo sprintf( '<mark class="error"> %s </mark> - We recommend using PHP version 7.4 or above for greater performance and security.', esc_html( $mayo_php ), '' );
						} else {
							echo '<mark class="green">' . esc_html( $mayo_php ) . '</mark>';
						}
						
						?>
					</td>
				</tr>
				
				<tr>
					<td>
						<?php esc_html_e( 'Secure Connection(HTTPS)', 'edubin' ); ?> 
					</td>
					<td>
						<?php 
						echo esc_attr($ssl_check) ? $green_mark : '<mark class="error">Your site is not using secure connection (HTTPS).</mark>'; ?>
					</td>
				</tr>
				
			</tbody>		
		</table>
	</div>
	
	<div class="edubin-system-stats">
		<h3><?php esc_html_e( 'Theme Information', 'edubin' ); ?></h3>

		<table class="system-status-table">
			<tbody>
				<tr>
					<td><?php esc_html_e( 'Theme Name', 'edubin' ); ?></td>
					<td><?php echo wp_get_theme(); ?></td>
				</tr>
				
				<tr>
					<td><?php esc_html_e( 'Author Name', 'edubin' ); ?></td>
					<td><?php echo esc_html($edubintheme->get( 'Author' )); ?></td>
				</tr>
				
				<tr>
					<td><?php esc_html_e( 'Current Version', 'edubin' ); ?></td>
					<td><?php echo esc_html($edubintheme->get( 'Version' )); ?></td>
				</tr>
				
				<tr>
					<td><?php esc_html_e( 'Text Domain', 'edubin' ); ?></td>
					<td><?php echo esc_html($edubintheme->get( 'edubin' )); ?></td>
				</tr>
				
				<tr>
					<td><?php esc_html_e( 'Child Theme', 'edubin' ); ?></td>
					<td><?php echo is_child_theme() ? $green_mark : 'No'; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	


