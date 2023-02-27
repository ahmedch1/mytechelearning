<?php
/**
 * Coming Soon Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Coming_Soon extends Widget_Base {

	public function get_name() {
        return 'eCademy_Coming_Soon';
    }

	public function get_title() {
        return __( 'Coming Soon', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-number-field';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Coming_Soon_Area',
			[
				'label' => __( 'Coming Soon Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );


            $this->add_control(
                'due_date',
                [
                    'label' => __( 'Due Date', 'ecademy-toolkit' ),
                    'type'  => Controls_Manager::DATE_TIME,
                ]
            );

            $this->add_control(
                'bg_image',
                [
                    'label' => __( 'Background Image', 'ecademy-toolkit' ),
                    'type'  => Controls_Manager::MEDIA,
                ]
            );

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'ecademy-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('We Are Launching Soon', 'ecademy-toolkit'),
				]
			);

            $this->add_control(
                'date', [
                    'label' => __( 'Day Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Days' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'hours', [
                    'label' => __( 'Hours Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Hours' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'minutes', [
                    'label' => __( 'Minutes Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Minutes' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'seconds', [
                    'label' => __( 'Seconds Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Seconds' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'select_mod',
                [
                    'label' => esc_html__( 'Newsletter Option', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'mailchimp'             => esc_html__( 'Mailchimp', 'ecademy-toolkit' ),
                        'newsletter'            => esc_html__( 'Newsletter Plugin', 'ecademy-toolkit' ),
                    ],
                    'default' => 'mailchimp',
                ]
            );

            $this->add_control(
                'action_url', [
                    'label' => esc_html__( 'Action URL', 'ecademy-toolkit' ),
                    'description' => __( 'Enter here your MailChimp action URL. <a href="https://www.docs.envytheme.com/docs/ecademy-theme-documentation/tips-guides-troubleshoots/get-mailchimp-newsletter-form-action-url/" target="_blank"> How to </a>', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'condition' => [
                        'select_mod' => 'mailchimp',
                    ]
                ]
            );

            $this->add_control(
                'placeholder_text', [
                    'label' => __( 'Placeholder Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Enter your email' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'button_text', [
                    'label' => __( 'Button text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Subscribe' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
				'content',
				[
					'label' => __( 'Content', 'ecademy-toolkit' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => __('If you would like to be notified when your app is live, Please subscribe to our mailing list', 'ecademy-toolkit'),
				]
            );


        $this->end_controls_section();

    }

	protected function render() {

		$settings = $this->get_settings_for_display();

        global $ecademy_opt;
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('content','none');

        global $ecademy_opt;

        // Main site logo
        if( isset( $ecademy_opt['ecademy_main_logo']['url'] ) ):
            $ecademy_logo 	= $ecademy_opt['ecademy_main_logo']['url'];
        else:
            $ecademy_logo	= '';
        endif;

        $date = $settings['due_date'];
        $date = str_replace("-","/",$date);
        $due_date = substr($date, 0, -5);
		?>
        <div class="coming-soon-area" style="background-image:url(<?php echo esc_url( $settings['bg_image']['url'] ); ?>);">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="coming-soon-content">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php if( $ecademy_logo != '' ): ?>
                                <?php if( $is_lazyloader == true ): ?>
                                    <img sm-src="<?php echo esc_url( $ecademy_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                <?php else: ?>
                                    <img src="<?php echo esc_url( $ecademy_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <h2><?php bloginfo( 'name' ); ?></h2>
                            <?php endif; ?>
                        </a>

						<h2><?php echo wp_kses_post( $settings['title'] ); ?></h2>

                        <div id="timer" class="flex-wrap d-flex justify-content-center">
                            <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                            <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
                        </div>

                        <?php if( $settings['select_mod'] == 'mailchimp' ): ?>
                            <form class="mailchimp newsletter-form" method="post">
                                <div class="form-group subcribes">
                                    <input type="email" class="input-newsletter memail" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="EMAIL" required>
                                    <span class="label-title"><i class='bx bx-envelope'></i></span>
                                </div>
                                <?php if( $settings['button_text'] != '' ): ?>
                                        <button type="submit" class="default-btn"><i class="flaticon-user"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                    <?php endif; ?>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                                <p><?php echo esc_html( $settings['content'] ); ?></p>
                            </form>
                            <script>
                                ;(function($){
                                    "use strict";
                                    $(document).ready(function () {
                                        // MAILCHIMP
                                        if ($(".mailchimp").length > 0) {
                                            $(".mailchimp").ajaxChimp({
                                                callback: mailchimpCallback,
                                                url: "<?php echo esc_js($settings['action_url']) ?>"
                                            });
                                        }
                                        if ($(".mailchimp_two").length > 0) {
                                            $(".mailchimp_two").ajaxChimp({
                                                callback: mailchimpCallback,
                                                url: "<?php echo esc_js($settings['action_url']) ?>" //Replace this with your own mailchimp post URL. Don't remove the "". Just paste the url inside "".
                                            });
                                        }
                                        $(".memail").on("focus", function () {
                                            $(".mchimp-errmessage").fadeOut();
                                            $(".mchimp-sucmessage").fadeOut();
                                        });
                                        $(".memail").on("keydown", function () {
                                            $(".mchimp-errmessage").fadeOut();
                                            $(".mchimp-sucmessage").fadeOut();
                                        });
                                        $(".memail").on("click", function () {
                                            $(".memail").val("");
                                        });

                                        function mailchimpCallback(resp) {
                                            if (resp.result === "success") {
                                                $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                                                $(".mchimp-sucmessage").fadeOut(500);
                                            } else if (resp.result === "error") {
                                                $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                                            }
                                        }
                                    });
                                })(jQuery)
                            </script>
                        <?php else: ?>
                            <form class="newsletter-form" method="post" action="<?php echo home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                                <div class="form-group">
                                    <input type="email" name="ne" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" required autocomplete="off">
                                    <span class="label-title"><i class='bx bx-envelope'></i></span>
                                </div>

                                <?php if( $settings['button_text'] != '' ): ?>
                                    <button type="submit" class="default-btn"><i class="flaticon-user"></i> <?php echo esc_html( $settings['button_text'] ); ?></button>
                                <?php endif; ?>

                                <p><?php echo esc_html( $settings['content'] ); ?></p>
                            </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <script>
            (function($){
            "use strict";
                $( window ).on( 'elementor/frontend/init', function() {
                    elementorFrontend.hooks.addAction( 'frontend/element_ready/eCademy_Coming_Soon.default', function($scope, $){
                        // Count Time
                        function makeTimer() {
                            var endTime = new Date("<?php echo $due_date; ?>");
                            var endTime = (Date.parse(endTime)) / 1000;
                            var now = new Date();
                            var now = (Date.parse(now) / 1000);
                            var timeLeft = endTime - now;
                            var days = Math.floor(timeLeft / 86400);
                            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
                            if (hours < "10") { hours = "0" + hours; }
                            if (minutes < "10") { minutes = "0" + minutes; }
                            if (seconds < "10") { seconds = "0" + seconds; }
                            $("#days").html(days + "<span><?php echo esc_html( $settings['date'] ); ?></span>");
                            $("#hours").html(hours + "<span><?php echo esc_html( $settings['hours'] ); ?></span>");
                            $("#minutes").html(minutes + "<span><?php echo esc_html( $settings['minutes'] ); ?></span>");
                            $("#seconds").html(seconds + "<span><?php echo esc_html( $settings['seconds'] ); ?></span>");
                        }
                        setInterval(function() { makeTimer(); }, 1000);
                        });

                });

                if( typeof elementorFrontend !== 'undefined'  ){
                    elementorFrontend.hooks.addAction( 'frontend/element_ready/eCademy_Coming_Soon.default', function($scope, $){
                        // Count Time
                        function makeTimerLive() {
                            var endTime = new Date("<?php echo $due_date; ?>");
                            var endTime = (Date.parse(endTime)) / 1000;
                            var now = new Date();
                            var now = (Date.parse(now) / 1000);
                            var timeLeft = endTime - now;
                            var days = Math.floor(timeLeft / 86400);
                            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
                            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
                            if (hours < "10") { hours = "0" + hours; }
                            if (minutes < "10") { minutes = "0" + minutes; }
                            if (seconds < "10") { seconds = "0" + seconds; }

                            $("#days").html(days + "<span><?php echo esc_html( $settings['date'] ); ?></span>");
                            $("#hours").html(hours + "<span><?php echo esc_html( $settings['hours'] ); ?></span>");
                            $("#minutes").html(minutes + "<span><?php echo esc_html( $settings['minutes'] ); ?></span>");
                            $("#seconds").html(seconds + "<span><?php echo esc_html( $settings['seconds'] ); ?></span>");
                        }
                        setInterval(function() { makeTimerLive(); }, 1000);
                    });
                }

            }(jQuery));
        </script>

        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Coming_Soon );