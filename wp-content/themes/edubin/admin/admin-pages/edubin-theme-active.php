


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
	
	
	<div class="edubin-section nav-tab-active" id="activate-theme">

	<?php edubin_tv_options_page(); ?>

	</div>

