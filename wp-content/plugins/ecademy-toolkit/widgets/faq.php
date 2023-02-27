<?php
/**
 * FAQ Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Faq extends Widget_Base {

	public function get_name() {
        return 'FAQ';
    }

	public function get_title() {
        return __( 'eCademy FAQ', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Faq',
			[
				'label' => __( 'Faq Control', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $repeater = new Repeater();
            $repeater->add_control(
                'tab_title', [
                    'label' => __( 'Tab Title', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __( 'Getting Started', 'ecademy-toolkit' ),
                ]
            );
            $repeater->add_control(
                'default_icon', [
                    'label' => esc_html__( 'Select Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'options' => ecademy_flaticons(),
                ]
            );
            $repeater->add_control(
                'faqs', [
                    'label'=>esc_html__('Faq Items', 'ecademy-toolkit'),
                    'type'=>Controls_Manager:: TEXTAREA,
                    'default' =>    "<li class='accordion-item'>
                                        <a class='accordion-title' href='javascript:void(0)'>
                                            <i class='bx bx-chevron-down'></i>
                                            Where should I study abroad?
                                        </a>

                                        <div class='accordion-content'>
                                            <p>Only you can answer this question. However, we have some excellent resources to help you make the best decision. Take our 'Where Should I Study Abroad?' quiz or read our country guides for an in-depth look at studying in specific countries.</p>
                                        </div>
                                    </li>",
                ]
            );
            $this->add_control(
                'faq_tabs',
                [
                    'label' => esc_html__('Faq Tabs', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'partner_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
            'tab_title_size',
            [
                'label' => __( 'Tab Title Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 70,
                        'step' => 1,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion-tab .tabs li a span' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'faq_title_size',
            [
                'label' => __( 'Faq Title Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 70,
                        'step' => 1,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion .accordion-title' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'faq_content_size',
            [
                'label' => __( 'Faq Content Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 70,
                        'step' => 1,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion .accordion-content p' => 'font-size: {{SIZE}}px;',
                ],
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
        ?>

        <div class="faq-area ptb-100">
            <div class="container">
                <div class="tab faq-accordion-tab">
                    <ul class="tabs d-flex flex-wrap justify-content-center">
                        <?php foreach( $settings['faq_tabs'] as $item ): ?>
                            <?php
                                // Icon
                                $icon =$item['default_icon'];
                            ?>
                            <li><a href="#"><i class='<?php echo esc_attr( $icon ); ?>'></i> <span><?php echo esc_html( $item['tab_title'] ); ?></span></a></li>
                        <?php endforeach; ?>

                    </ul>

                    <div class="tab-content">
                        <?php foreach( $settings['faq_tabs'] as $item ): ?>
                            <div class="tabs-item">
                                <div class="faq-accordion">
                                    <ul class="accordion">
                                        <?php echo $item['faqs']; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
	}


}

Plugin::instance()->widgets_manager->register( new eCademy_Faq );