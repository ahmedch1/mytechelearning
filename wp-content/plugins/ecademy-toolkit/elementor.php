<?php
/**
 * Load eCademy Elementor support  
 */

// Disable Elementor's Default Colors and Default Fonts
update_option( 'elementor_disable_color_schemes', 'yes' );
update_option( 'elementor_disable_typography_schemes', 'yes' );
update_option( 'elementor_global_image_lightbox', '' );

/**
 * Main Elementor ecademy Extension Class
 */
final class Elementor_eCademy_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '7.0';

	// Instance
    private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	// Constructor
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	// init
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

        add_action('elementor/elements/categories_registered',[ $this, 'register_new_category'] );
    }

    public function register_new_category($manager){
        $manager->add_category('ecademy-elements',[
            'title'=>esc_html__('eCademy','ecademy-toolkit'),
            'icon'=> 'fa fa-image'
        ]);
    }

	//Admin notice
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'ecademy-toolkit' ),
			'<strong>' . esc_html__( 'eCademy Toolkit', 'ecademy-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ecademy-toolkit' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ecademy-toolkit' ),
			'<strong>' . esc_html__( 'eCademy Toolkit', 'ecademy-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'ecademy-toolkit' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'ecademy-toolkit' ),
			'<strong>' . esc_html__( 'eCademy Toolkit', 'ecademy-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'ecademy-toolkit' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	// Toolkit Widgets
	public function init_widgets() {

		// Include Widget files
		$pcs = trim( get_option( 'ecademy_purchase_code_status' ) );
		if ( $pcs == 'valid' ) {
			require_once( __DIR__ . '/widgets/section.php' );
			require_once( __DIR__ . '/widgets/banner-one.php' );
			require_once( __DIR__ . '/widgets/banner-two.php' );
			require_once( __DIR__ . '/widgets/banner-three.php' );
			require_once( __DIR__ . '/widgets/banner-four.php' );
			require_once( __DIR__ . '/widgets/banner-five.php' );
			require_once( __DIR__ . '/widgets/banner-slider.php' );
			require_once( __DIR__ . '/widgets/main-banner-area.php' );
			require_once( __DIR__ . '/widgets/modern-schooling-hero.php' );
			require_once( __DIR__ . '/widgets/yoga-hero.php' );
			require_once( __DIR__ . '/widgets/health-coaching-hero.php' );
			require_once( __DIR__ . '/widgets/kindergarten-hero.php' );
			require_once( __DIR__ . '/widgets/partner.php' );
			require_once( __DIR__ . '/widgets/features-boxes.php' );
			require_once( __DIR__ . '/widgets/features-boxes.php' );
			require_once( __DIR__ . '/widgets/language-courses.php' );
			require_once( __DIR__ . '/widgets/distance-learning.php' );
			require_once( __DIR__ . '/widgets/feedback.php' );
			require_once( __DIR__ . '/widgets/feedback-two.php' );
			require_once( __DIR__ . '/widgets/feedback-three.php' );
			require_once( __DIR__ . '/widgets/feedback-slider.php' );
			require_once( __DIR__ . '/widgets/funfacts.php' );
			require_once( __DIR__ . '/widgets/video-box.php' );
			require_once( __DIR__ . '/widgets/video-area.php' );
			require_once( __DIR__ . '/widgets/instant-courses-area.php' );
			require_once( __DIR__ . '/widgets/blog-posts.php' );
			require_once( __DIR__ . '/widgets/instructors.php' );
			require_once( __DIR__ . '/widgets/single-feedback.php' );
			require_once( __DIR__ . '/widgets/our-story-area.php' );
			require_once( __DIR__ . '/widgets/newsletter.php' );
			require_once( __DIR__ . '/widgets/faq.php' );
			require_once( __DIR__ . '/widgets/contact-area.php' );
			require_once( __DIR__ . '/widgets/contact-area.php' );
			require_once( __DIR__ . '/widgets/coming-soon.php' );

			if ( ecademy_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ) {
				require_once( __DIR__ . '/widgets/events.php' );
			}
			require_once( __DIR__ . '/widgets/single-testimonial.php' );
			require_once( __DIR__ . '/widgets/about-area-two.php' );
			require_once( __DIR__ . '/widgets/about-area-three.php' );
			require_once( __DIR__ . '/widgets/information-area.php' );
			require_once( __DIR__ . '/widgets/sign-up.php' );
			require_once( __DIR__ . '/widgets/navbar.php' );
			require_once( __DIR__ . '/widgets/footer.php' );
			require_once( __DIR__ . '/widgets/overview-area.php' );
			require_once( __DIR__ . '/widgets/experience-area.php' );
			require_once( __DIR__ . '/widgets/courses-syllabus-area.php' );
			require_once( __DIR__ . '/widgets/pricing.php' );
			require_once( __DIR__ . '/widgets/program-area.php' );
			require_once( __DIR__ . '/widgets/services-area.php' );
			require_once( __DIR__ . '/widgets/feedback-four.php' );
			require_once( __DIR__ . '/widgets/feature-card.php' );
			
			require_once( __DIR__ . '/widgets/lp/courses.php' );
			require_once( __DIR__ . '/widgets/lp/courses-filter.php' );
			require_once( __DIR__ . '/widgets/lp/course_cat.php' );

			require_once( __DIR__ . '/widgets/tutor/tutor-courses.php' );
			require_once( __DIR__ . '/widgets/tutor/tutor-instructors.php' );
			require_once( __DIR__ . '/widgets/tutor/tutor-courses-filter.php' );

			require_once( __DIR__ . '/widgets/ld/ld-courses.php' );
			require_once( __DIR__ . '/widgets/ld/ld-instructors.php' );
			require_once( __DIR__ . '/widgets/ld/ld-courses-filter.php' );
			require_once( __DIR__ . '/widgets/team-slider.php' );
			require_once( __DIR__ . '/widgets/app-download-area.php' );
			require_once( __DIR__ . '/widgets/online-platform-area.php' );

			require_once( __DIR__ . '/widgets/coaching-banner-area.php' );
			require_once( __DIR__ . '/widgets/about-me-area.php' );
			require_once( __DIR__ . '/widgets/grid-card.php' );
			require_once( __DIR__ . '/widgets/feedback-slider-two.php' );
			require_once( __DIR__ . '/widgets/events-area.php' );
			require_once( __DIR__ . '/widgets/motivation-banner.php' );
			require_once( __DIR__ . '/widgets/about-me-area-two.php' );
			require_once( __DIR__ . '/widgets/feedback-slider-three.php' );
			require_once( __DIR__ . '/widgets/events-area-two.php' );
			require_once( __DIR__ . '/widgets/kitchen-coach-banner.php' );
			require_once( __DIR__ . '/widgets/kitchen-about-area.php' );
			require_once( __DIR__ . '/widgets/kitchen-book-area.php' );
			require_once( __DIR__ . '/widgets/feedback-slider-four.php' );
			require_once( __DIR__ . '/widgets/events-card.php' );
			require_once( __DIR__ . '/widgets/cooking-area.php' );
		}
	}

}
Elementor_ecademy_Extension::instance();