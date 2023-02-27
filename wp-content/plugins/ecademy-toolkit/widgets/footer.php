<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Footer extends Widget_Base {

    public function get_name() {
        return 'ecademy_footer';
    }

    public function get_title() {
        return __( 'Website Footer', 'ecademy-toolkit' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'ecademy-elements' ];
    }

    protected function register_controls() {

        /**
         * Style Tab
         */
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style section', 'ecademy-toolkit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_note', [
                'label' => '',
                'type' => Controls_Manager::RAW_HTML,
                'raw' => __( 'This is the website default footer. You can control the Footer from Theme Options > Footer. Set the widgets from Appearance > Widgets', 'ecademy-toolkit' ),
                'content_classes' => 'elementor-warning',
            ]
        );

        $this->add_control(
            'sec_padding', [
                'label' => __( 'Section Padding', 'ecademy-toolkit' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'unit' => 'px', // The selected CSS Unit. 'px', '%', 'em',

                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings();

        global $ecademy_opt;
        if( isset( $ecademy_opt['copyright_text'] )):
            $copyright_text 		= $ecademy_opt['copyright_text'];
            $footer_desc 			= $ecademy_opt['footer_desc'];
            $enable_back_to_top 	= $ecademy_opt['enable_back_to_top'];
            $enable_footer_social 	= $ecademy_opt['enable_footer_social'];
            $enable_footer_line 	= $ecademy_opt['enable_footer_line'];
            $logo 					= $ecademy_opt['footer_main_logo']['url'];
        else:
            $copyright_text 		= '';
            $enable_back_to_top 	= true;
            $logo					= '';
            $footer_desc			= '';
            $enable_footer_social	= false;
            $enable_footer_line		= false;
        endif;

        // Footer Class
        if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ):
            $footer_class = 'footer-area';
        else:
            $footer_class = 'footer-area pt-40';
        endif;
        ?>

		<footer class="<?php echo esc_attr( $footer_class ); ?>">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget">

							<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php if( $logo != '' ): ?>
                                    <?php if( $is_lazyloader == true ): ?>
									    <img sm-src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    <?php else: ?>
									    <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    <?php endif; ?>
								<?php else: ?>
									<h2><?php bloginfo( 'name' ); ?></h2>
								<?php endif; ?>
							</a>
							<?php if( $footer_desc != '' ): ?>
								<p><?php echo esc_html( $footer_desc ); ?></p>
							<?php endif; ?>
							<?php if( $enable_footer_social == true ): ?>
								<?php ecademy_social_link();  ?>
							<?php endif; ?>
						</div>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<?php if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar('footer-1');  } ?>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<?php if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar('footer-2');  } ?>
					</div>

					<div class="col-lg-3 col-md-6 col-sm-6">
						<?php if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar('footer-3');  } ?>
					</div>
				</div>

				<?php if( has_nav_menu('footer-menu') ){ ?>
					<div class="footer-bottom-area">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-6">
								<?php if( $copyright_text != '' ){ ?>
									<p><?php echo wp_kses_post( $copyright_text ); ?></p>
								<?php } ?>
							</div>

							<div class="col-lg-6 col-md-6">
								<?php
								if( has_nav_menu('footer-menu') ){
									$args = array(
										'theme_location' 	=> 'footer-menu',
										'menu'            	=> 'footer-menu',
										'container'       	=> 'ul',
										'fallback_cb'  		=> false,
										'menu_class'      	=> 'menu',
										'depth'           	=> 1,
									);
									wp_nav_menu( $args );
								}
								?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

			<?php if( $enable_footer_line == true ): ?>
				<div class="lines">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
			<?php endif; ?>
		</footer>
        <?php
    }
}


Plugin::instance()->widgets_manager->register( new Footer );