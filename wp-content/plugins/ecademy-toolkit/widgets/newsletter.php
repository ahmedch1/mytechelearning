<?php
/**
 * Newsletter Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Newsletter extends Widget_Base {

	public function get_name() {
        return 'eCademy_Newsletter';
    }

	public function get_title() {
        return __( 'Newsletter', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-email-field';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

    public function get_keywords() {
        return [ 'mailchimp', 'form', 'newsletter' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Newsletter',
			[
				'label' => __( 'eCademy Newsletter', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'select_style',
                [
                    'label' => esc_html__( 'Newsletter Style', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'            => esc_html__( 'Style One', 'ecademy-toolkit' ),
                        '2'            => esc_html__( 'Style Two', 'ecademy-toolkit' ),
                        '3'            => esc_html__( 'Style Three', 'ecademy-toolkit' ),
                        '4'            => esc_html__( 'Style Four', 'ecademy-toolkit' ),
                        '5'            => esc_html__( 'Style Five', 'ecademy-toolkit' ),
                        '6'            => esc_html__( 'Style Six', 'ecademy-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $this->add_group_control(
               Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'ecademy-toolkit' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .subscribe-area-two, .kitchen-inner-subscribe',
                    'condition' => [
                        'select_style' => ['3', '4', '6'],
                    ]
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
                'top_title', [
                    'label' => __( 'Top Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Go At Your Own Pace', 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'title', [
                    'label' => __( 'Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Subscribe to Our Newsletter' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'title_tag',
                [
                    'label' => esc_html__( 'Title Tag', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'h1'         => esc_html__( 'h1', 'ecademy-toolkit' ),
                        'h2'         => esc_html__( 'h2', 'ecademy-toolkit' ),
                        'h3'         => esc_html__( 'h3', 'ecademy-toolkit' ),
                        'h4'         => esc_html__( 'h4', 'ecademy-toolkit' ),
                        'h5'         => esc_html__( 'h5', 'ecademy-toolkit' ),
                        'h6'         => esc_html__( 'h6', 'ecademy-toolkit' ),
                    ],
                    'default' => 'h2',
                ]
            );

            $this->add_control(
                'content', [
                    'label' => __( 'Description', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'placeholder_text', [
                    'label' => __( 'Email Placeholder Text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Enter your email address' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'button_text', [
                    'label' => __( 'Button text', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Subscribe Now' , 'ecademy-toolkit' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
				'button_icon',
				[
					'label' => esc_html__( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
				]
            );
            $this->add_control(
				'fimage',
				[
					'label' => __( 'Section Image', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
                    'condition' => [
                        'select_style' => ['2', '3', '4'],
                    ]
				]
            );
            $this->add_control(
				'shape1',
				[
					'label' => __( 'Shape Image One', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
                    'condition' => [
                        'select_style' => ['1', '2', '3', '4', '5'],
                    ]
				]
            );
			$this->add_control(
				'shape2',
				[
					'label' => __( 'Shape Image Two', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
                    'condition' => [
                        'select_style' => ['1', '2', '3', '4', '5'],
                    ]
				]
            );
			$this->add_control(
				'shape3',
				[
					'label' => __( 'Shape Image Three', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
                    'condition' => [
                        'select_style' => ['1', '5'],
                    ]
				]
            );
			$this->add_control(
				'shape4',
				[
					'label' => __( 'Shape Image Four', 'ecademy-toolkit' ),
					'type' => Controls_Manager::MEDIA,
                    'condition' => [
                        'select_style' => ['1', '5'],
                    ]
				]
            );


        $this->end_controls_section();

        $this->start_controls_section(
			'newsletter_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'top_title_color',
                [
                    'label' => esc_html__( 'Top Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-content .sub-title, .kitchen-inner-subscribe .subscribe-content .sub-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .subscribe-content .sub-title, .kitchen-inner-subscribe .subscribe-content .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-content h2, .subscribe-content h3, .subscribe-content h4, .subscribe-content h5, .subscribe-content h5, .subscribe-content h6, .subscribe-content h1, .subscribe-content.text-left h2, .kitchen-inner-subscribe .subscribe-content h2' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .subscribe-content h2, .subscribe-content h3, .subscribe-content h4, .subscribe-content h5, .subscribe-content h5, .subscribe-content h6, .subscribe-content h1, .subscribe-content.text-left h2, .kitchen-inner-subscribe .subscribe-content h2',
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => esc_html__( 'Content Color', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-content p, .subscribe-content.text-left p, .kitchen-inner-subscribe .subscribe-content p' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .subscribe-content p, .subscribe-content.text-left p',
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

        // Button Icon
        if( $settings['button_icon'] != '' ):
            $icon = $settings['button_icon'];
        else:
            $icon = 'flaticon-user';
        endif;

        ?>
        <?php if( $settings['select_style'] == '1' ): ?>
            <?php if( $settings['select_mod'] == 'mailchimp' ): ?>
                <div class="subscribe-area bg-f9f9f9 ptb-100">
                    <div class="container">
                        <div class="subscribe-content">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                            <form class="mailchimp newsletter-form" method="post">
                                <div class="subcribes">
                                    <input type="email" class="input-newsletter memail" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="EMAIL" required>
                                    <?php if( $settings['button_text'] != '' ): ?>
                                        <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                    <?php endif; ?>
                                </div>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>

                    <?php if( $settings['shape1']['url'] != '' ): ?>
                        <div class="shape4">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="shape13">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape3']['url'] != '' ): ?>
                        <div class="shape14">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape4']['url'] != '' ): ?>
                        <div class="shape15">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
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
                <div class="subscribe-area bg-f9f9f9 ptb-100">
                    <div class="container">
                        <div class="subscribe-content">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                            <form class="newsletter-form" method="post" action="<?php echo home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                                <input type="email" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="ne" required>
                                <?php if( $settings['button_text'] != '' ): ?>
                                    <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                <?php endif; ?>
                                <div id="validator-newsletter" class="form-result"></div>
                            </form>
                        </div>
                    </div>

                    <?php if( $settings['shape1']['url'] != '' ): ?>
                        <div class="shape4">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="shape13">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape3']['url'] != '' ): ?>
                        <div class="shape14">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape4']['url'] != '' ): ?>
                        <div class="shape15">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php elseif( $settings['select_style'] == '2' ): ?>
            <?php if( $settings['select_mod'] == 'mailchimp' ): ?>
                <div class="subscribe-area bg-f5f7fa ptb-100">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <?php if( $settings['fimage']['url'] != '' ): ?>
                                    <div class="subscribe-image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="subscribe-content">
                                    <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <form class="mailchimp newsletter-form" method="post">
                                        <div class="subcribes">
                                            <input type="email" class="input-newsletter memail" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="EMAIL" required>
                                            <?php if( $settings['button_text'] != '' ): ?>
                                                <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                            <?php endif; ?>
                                        </div>
                                        <p class="mchimp-errmessage" style="display: none;"></p>
                                        <p class="mchimp-sucmessage" style="display: none;"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if( $settings['shape1']['url'] != '' ): ?>
                        <div class="shape4">
                            <?php if( $is_lazyloader == true ): ?>
                                <img data-speed="0.06" data-revert="true" sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img data-speed="0.06" data-revert="true" src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="shape13">
                            <?php if( $is_lazyloader == true ): ?>
                                <img data-speed="0.06" data-revert="true" sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img data-speed="0.06" data-revert="true" src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
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
                <div class="subscribe-area bg-f5f7fa ptb-100">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <?php if( $settings['fimage']['url'] != '' ): ?>
                                    <div class="subscribe-image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="subscribe-content">
                                    <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <form class="newsletter-form" method="post" action="<?php echo home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                                        <input type="email" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="ne" required>
                                        <?php if( $settings['button_text'] != '' ): ?>
                                            <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                        <?php endif; ?>
                                        <div id="validator-newsletter" class="form-result"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if( $settings['shape1']['url'] != '' ): ?>
                        <div class="shape4"><img data-speed="0.06" data-revert="true" src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>"></div>
                    <?php endif; ?>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="shape13"><img data-speed="0.06" data-revert="true" src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>"></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php elseif( $settings['select_style'] == '3' ): ?>
            <?php if( $settings['select_mod'] == 'mailchimp' ): ?>
                <div class="subscribe-area-two">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <?php if( $settings['fimage']['url'] != '' ): ?>
                                    <div class="subscribe-image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="subscribe-content">
                                    <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <form class="mailchimp newsletter-form" method="post">
                                        <div class="subcribes">
                                            <input type="email" class="input-newsletter memail" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="EMAIL" required>
                                            <?php if( $settings['button_text'] != '' ): ?>
                                                <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                            <?php endif; ?>
                                        </div>
                                        <p class="mchimp-errmessage" style="display: none;"></p>
                                        <p class="mchimp-sucmessage" style="display: none;"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="subscribe-area-two">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <?php if( $settings['fimage']['url'] != '' ): ?>
                                    <div class="subscribe-image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="subscribe-content">
                                    <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <form class="newsletter-form" method="post" action="<?php echo home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                                        <input type="email" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="ne" required>
                                        <?php if( $settings['button_text'] != '' ): ?>
                                            <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                        <?php endif; ?>
                                        <div id="validator-newsletter" class="form-result"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php elseif( $settings['select_style'] == '4' ): ?>
            <?php if( $settings['select_mod'] == 'mailchimp' ): ?>
                <div class="subscribe-area bg-eee8df ptb-70">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <?php if( $settings['fimage']['url'] != '' ): ?>
                                    <div class="subscribe-image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="subscribe-content text-left">
                                    <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> class="font-weight-black" <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <form class="mailchimp newsletter-form" method="post">
                                        <div class="subcribes">
                                            <input type="email" class="input-newsletter memail" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="EMAIL" required>
                                            <?php if( $settings['button_text'] != '' ): ?>
                                                <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                            <?php endif; ?>
                                        </div>
                                        <p class="mchimp-errmessage" style="display: none;"></p>
                                        <p class="mchimp-sucmessage" style="display: none;"></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="kindergarten-shape19">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="kindergarten-shape20">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

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
                <div class="subscribe-area bg-eee8df ptb-70">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <?php if( $settings['fimage']['url'] != '' ): ?>
                                    <div class="subscribe-image">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $settings['fimage']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="subscribe-content text-left">
                                    <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> class="font-weight-black" <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <form class="newsletter-form" method="post" action="<?php echo home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                                        <input type="email" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="ne" required>
                                        <?php if( $settings['button_text'] != '' ): ?>
                                            <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                        <?php endif; ?>
                                        <div id="validator-newsletter" class="form-result"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="kindergarten-shape19">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="kindergarten-shape20">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr_e( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php elseif( $settings['select_style'] == '5' ): ?>
            <?php if( $settings['select_mod'] == 'mailchimp' ): ?>
                <div class="motivation-subscribe-area bg-f9f9f9 ptb-100">
                    <div class="container">
                        <div class="subscribe-content">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                            <form class="mailchimp newsletter-form" method="post">
                                <div class="subcribes">
                                    <input type="email" class="input-newsletter memail" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="EMAIL" required>
                                    <?php if( $settings['button_text'] != '' ): ?>
                                        <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                    <?php endif; ?>
                                </div>
                                <p class="mchimp-errmessage" style="display: none;"></p>
                                <p class="mchimp-sucmessage" style="display: none;"></p>
                            </form>
                        </div>
                    </div>

                    <?php if( $settings['shape1']['url'] != '' ): ?>
                        <div class="motivation-shape-7">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="motivation-shape-8">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape3']['url'] != '' ): ?>
                        <div class="motivation-shape-9">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape4']['url'] != '' ): ?>
                        <div class="motivation-shape-10">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
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
                <div class="subscribe-area bg-f9f9f9 ptb-100">
                    <div class="container">
                        <div class="subscribe-content">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                            <form class="newsletter-form" method="post" action="<?php echo home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                                <input type="email" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="ne" required>
                                <?php if( $settings['button_text'] != '' ): ?>
                                    <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                <?php endif; ?>
                                <div id="validator-newsletter" class="form-result"></div>
                            </form>
                        </div>
                    </div>

                    <?php if( $settings['shape1']['url'] != '' ): ?>
                        <div class="motivation-shape-7">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape1']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['shape2']['url'] != '' ): ?>
                        <div class="motivation-shape-8">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape2']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['motivation-shape-9']['url'] != '' ): ?>
                        <div class="shape14">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape3']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['motivation-shape-10']['url'] != '' ): ?>
                        <div class="shape15">
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $settings['shape4']['url'] ); ?>" alt="<?php echo esc_attr__( 'Shape Image', 'ecademy-toolkit' ); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php elseif( $settings['select_style'] == '6' ): ?>
            <?php if( $settings['select_mod'] == 'mailchimp' ): ?>
                <div class="kitchen-subscribe-area">
                    <div class="container">
                        <div class="kitchen-inner-subscribe ptb-70">
                            <div class="subscribe-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                <form class="mailchimp newsletter-form" method="post">
                                    <div class="subcribes">
                                        <input type="email" class="input-newsletter memail" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="EMAIL" required>
                                        <?php if( $settings['button_text'] != '' ): ?>
                                            <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                        <?php endif; ?>
                                    </div>
                                    <p class="mchimp-errmessage" style="display: none;"></p>
                                    <p class="mchimp-sucmessage" style="display: none;"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="kitchen-subscribe-area">
                    <div class="container">
                        <div class="kitchen-inner-subscribe ptb-70">
                            <div class="subscribe-content">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <<?php echo esc_attr( $settings['title_tag'] ); ?> <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo wp_kses_post( $settings['title'] ); ?></<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                <form class="newsletter-form" method="post" action="<?php echo home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                                    <input type="email" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" name="ne" required>
                                    <?php if( $settings['button_text'] != '' ): ?>
                                        <button type="submit" class="default-btn"><i class="<?php echo esc_attr( $icon ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span></button>
                                    <?php endif; ?>
                                    <div id="validator-newsletter" class="form-result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Newsletter );