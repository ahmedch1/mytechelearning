<?php
/**
 * eCademy Dashboard Install Plugins Page
 *
 * @package ecademy
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ecademy_my_theme = wp_get_theme();
if ( $ecademy_my_theme->parent_theme ) {
	$ecademy_my_theme = wp_get_theme( basename( get_template_directory() ) );
}

?>

<div class="wrap about-wrap et-admin-wrap">

	<div class="et-header">
		<h1><?php echo esc_html__( 'Welcome to ', 'ecademy' ) . esc_html( $ecademy_my_theme->Name ); ?> <?php printf( esc_html__( 'V%s', 'ecademy' ), esc_html( $ecademy_my_theme->Version ) ); ?></h1>
		<div class="about-text"><?php echo esc_html( $ecademy_my_theme->Name ) . esc_html__( ' is now installed and ready to use!', 'ecademy' ); ?></div>
	</div>

	<h2 class="nav-tab-wrapper wp-clearfix">
		<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'admin.php?page=ecademy-dashboard' ) ); ?>"><?php esc_html_e( 'Dashboard', 'ecademy' ); ?></a>
		<a class="nav-tab nav-tab-active" href="<?php echo esc_url( self_admin_url( 'admin.php?page=ecademy-admin-plugins' ) ); ?>"><?php esc_html_e( 'Install Plugins', 'ecademy' ); ?></a>
		<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'tools.php?page=fw-backups-demo-content' ) ); ?>"><?php esc_html_e( 'Demo Importer', 'ecademy' ); ?></a>
		<?php if ( function_exists( 'ecademy_init' ) ) { ?>
			<a class="nav-tab" href="<?php echo esc_url( self_admin_url( 'admin.php?page=ecademy_opt' ) ); ?>"><?php esc_html_e( 'Theme Options', 'ecademy' ); ?></a>
		<?php } ?>
	</h2>
	<?php
    if ( isset($_POST['lms']) ) {
		echo "<meta http-equiv='refresh' content='0'>";
        update_option('et_lms_plugin_name', $_POST['lms'], 'yes');
    }
    $lms = get_option( 'et_lms_plugin_name' );
    if($lms):
        update_option('et_selected_lms_plugin', $lms, 'yes');
    else:
        update_option('et_selected_lms_plugin', 'learnpress', 'yes');
    endif;
    ?>

    <form action="" method="post" id="et-lms-check" class="et-theme-register-form">
        <div class="lms-plugin">
            <h3><?php echo esc_html__('Please select the LMS plugin which you want to use.', 'ecademy'); ?></h3>
            <ul>
                <li>
                    <input type="radio" id="tutor" name="lms" value="tutor" <?php if($lms == 'tutor'): ?>checked<?php endif; ?>>
                    <label for="tutor"><?php echo esc_html__('Tutor LMS', 'ecademy'); ?></label>
                </li>
                <li>
                    <input type="radio" id="learnpress" name="lms" value="learnpress" <?php if($lms == 'learnpress'): ?>checked<?php endif; ?>>
                    <label for="learnpress"><?php echo esc_html__('LearnPress', 'ecademy'); ?></label>
                </li>
                <li>
                    <input type="radio" id="learndash" name="lms" value="learndash" <?php if($lms == 'learndash'): ?>checked<?php endif; ?>>
                    <label for="learndash"><?php echo esc_html__('LearnDash', 'ecademy'); ?></label>
                </li>
            </ul>
        </div>

		<?php if($lms == 'learndash'): ?>
			<div class="ld-notice"><p><?php echo esc_html('LearnDash is a premium plugin, you have to buy this plugin. Please install the plugin manually from Plugins->Add New', 'ecademy'); ?></p></div>
		<?php endif; ?>

        <input type="submit" class="et-lms-btn" value='Save'>
    </form>

	<div id="ecademy-dashboard" class="wrap about-wrap">
		<div class="welcome-content w-clearfix extra">
			<div class="ecademy-plugins ecademy-theme-browser-wrap">
				<div class="theme-browser rendered">
					<div class="whi-install-plugins-wrap">
						<h3><?php echo esc_html__( 'These below plugins are required', 'ecademy' ); ?></h3>
						<a href="#" class="ecademy-admin-btn whi-install-plugins"><?php echo esc_html__( 'Activate all plugins', 'ecademy' ); ?></a>
					</div>
					<div class="ecademy-plugins-wrap ecademy-plugins">

					<?php

					$tgmpa_list_table = new TGMPA_List_Table();
					$plugins          = TGM_Plugin_Activation::$instance->plugins;

					foreach ( $plugins as $plugin ) :

						$plugin_status              = '';
						$plugin['type']             = isset( $plugin['type'] ) ? $plugin['type'] : 'recommended';
						$plugin['sanitized_plugin'] = $plugin['name'];

						$plugin_action = $tgmpa_list_table->actions_plugin( $plugin );

						if ( strpos( $plugin_action, 'deactivate' ) !== false ) {
							$plugin_status = 'active';
							$plugin_action = '<div class="row-actions visible active"><span class="activate"><a class="button ecademy-admin-btn">' . esc_html__( 'Activated', 'ecademy' ) . '</a></span></div>';
						}

						?>
						<div class="ecademy-plugin wp-clearfix <?php echo esc_attr( $plugin_status ); ?>" data-plugin-name="<?php echo esc_html( $plugin['name'] ); ?>">
							<h4><?php echo esc_html( $plugin['name'] ); ?></h4>
							<?php echo '' . $plugin_action; ?>
						</div>

					<?php endforeach; ?>

					</div>
				</div>
			</div>
			<?php if ( defined( 'FW' ) && ! get_option( 'fw:ext:backups:log' ) ) : ?>
				<div class="ecademy-notice ecademy-notice-success plugin-install-success">
					<p><a href="<?php echo esc_url( self_admin_url( 'tools.php?page=fw-backups-demo-content' ) ); ?>"><?php echo esc_html__( 'Click Here to continue with Demo Import process.', 'ecademy' ); ?></a></p>
				</div>
			<?php endif; ?>
		</div>
	</div>

</div> <!-- end wrap -->
