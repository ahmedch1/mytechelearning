<?php
namespace Elementor;

if (!defined('ABSPATH')) {
	exit;
}
// Exit if accessed directly

use Elementor\{Plugin, Widget_Base, Controls_Manager};

class Edubin_Elementor_Widget_WooCart extends Widget_Base {

	public function get_name() {
		return 'edubin-woo-cart';
	}

	public function get_title() {
		return __('WooCart', 'edubin-core');
	}
    public function get_keywords() {
        return [ 'WooCart', 'cart', 'woocommerce', 'woocommerce cart'];
    }
	public function get_icon() {
		return 'edubin-icon eicon-cart-medium';
	}
	public function get_categories() {
		return ['edubin-core'];
	}

    protected function register_controls()
    {
        /*-----------------------------------------------------------------------------------*/
        /*  CONTENT -> GENERAL
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'section_search_settings',
            [ 'label' => esc_html__('General', 'edubin-core') ]
        );
        $this->add_control(
            'layout_style',
            [
                'label' => esc_html__('Type', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__('Type 1', 'edubin-core'),
                    '2' => esc_html__('Type 2', 'edubin-core'),
                ],
                'default' => '1',
            ]
        );

        $this->add_control(
            'cart_align',
            [
                'label' => esc_html__('Alignment', 'edubin-core'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'toggle' => true,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'edubin-core'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'edubin-core'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'edubin-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .edubin-mini-cart_wrapper' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .edubin-mini-cart_wrapper-2' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  STYLE -> GENERAL
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'section_style_general',
            [
                'label' => esc_html__('General', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'layout_style' => '1'
                ]
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-mini-cart_wrapper i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'counter_bg',
            [
                'label' => esc_html__('Items Counter Background', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-mini-cart_wrapper a span' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'counter_text',
            [
                'label' => esc_html__('Items Counter Text', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .edubin-mini-cart_wrapper a span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_general_2',
            [
                'label' => esc_html__('General', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition'     => [
                    'layout_style' => '2'
                ]
            ]
        );

        $this->start_controls_tabs('style_type_2_tabs');

        $this->start_controls_tab(
            'tab_normal',
            [ 'label' => esc_html__('Normal' , 'edubin-core') ]
        );
        $this->add_control(
            'content_text',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} a.edubin-ajax-cart-2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_hover',
            [ 'label' => esc_html__('Hover' , 'edubin-core') ]
        );

        $this->add_control(
            'text_hover_hover',
            [
                'label' => esc_html__('Text Hover Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'selectors' => [
                    '{{WRAPPER}} a.edubin-ajax-cart-2:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }

    public function render()
    {
        $settings = $this->get_settings_for_display();

        if(class_exists('WooCommerce')){

            if(!WC()->cart ){
                return;
            } 

            if ($settings['layout_style'] == '1' && function_exists('woocommerce_header_add_to_cart_fragment')) { ?>

               <div class="edubin-mini-cart_wrapper">
                    <a class="edubin-ajax-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>"><i class="flaticon-shopping-cart-1"></i><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                </div>
            <?php } elseif ($settings['layout_style'] == '2' && function_exists('woocommerce_header_add_to_cart_fragment_2')) { ?>
               <div class="edubin-mini-cart_wrapper-2">

                    <a class="edubin-ajax-cart-2" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> – <?php echo WC()->cart->get_cart_total(); ?></a>

                </div>
            <?php  } ?>
            <?php        
        }
    }

 
}