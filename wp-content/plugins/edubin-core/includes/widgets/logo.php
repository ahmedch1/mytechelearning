<?php
namespace Elementor;

if (!defined('ABSPATH')) {
	exit;
}
// Exit if accessed directly

use Elementor\Core\Schemes\Color as Scheme_Color;
use Elementor\Core\Schemes\Typography as Scheme_Typography;


class Edubin_Elementor_Widget_Logo extends Widget_Base {

	public function get_name() {
		return 'edubin-site-logo';
	}

	public function get_title() {
		return __('Logo', 'edubin-core');
	}
    public function get_keywords() {
        return [ 'Logo', 'main logo', 'top logo', 'site logo'];
    }
	public function get_icon() {
		return 'edubin-icon eicon-site-logo';
	}
	public function get_categories() {
		return ['edubin-core'];
	}protected function register_controls()
    {
        /*-----------------------------------------------------------------------------------*/
        /*  CONTENT -> GENERAL
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'section_content_general',
            ['label' => esc_html__('General', 'edubin-core')]
        );

        $this->add_control(
            'use_custom_logo',
            [
                'label' => esc_html__('Use Custom Logo?', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );

        $this->add_control(
            'custom_logo',
            [
                'label' => esc_html__('Custom Logo', 'edubin-core'),
                'type' => Controls_Manager::MEDIA,
                'condition' => ['use_custom_logo!' => ''],
                'label_block' => true,
                'default' => ['url' => Utils::get_placeholder_image_src()],
            ]
        );

        $this->add_control(
            'enable_logo_height',
            [
                'label' => esc_html__('Enable Logo Height?', 'edubin-core'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => ['use_custom_logo!' => ''],
            ]
        );
        $this->add_responsive_control(
            'logo_height',
            [
                'label' => esc_html__('Logo Height', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'condition' => [
                    'use_custom_logo!' => '',
                    'enable_logo_height!' => '',
                ],
                'min' => 1,
                'default' => 65,
            ]
        );
        $this->add_control(
            'logo_align',
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
                'default' => 'left',
                 'condition' => ['use_custom_logo' => ''],
                'selectors' => [
                    '{{WRAPPER}} .edubin-logotype-container' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'logo_align_img',
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
                'default' => 'left',
                'condition' => ['use_custom_logo!' => ''],
                'selectors' => [
                    '{{WRAPPER}} .edubin-logotype-container' => 'display: flex; justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_text_style',
            [
                'label' => esc_html__( 'Text Logo', 'edubin-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'logo_text_color',
            [
                'label' => esc_html__( 'Text Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .edubin-logotype-container .logo-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'selector' => '{{WRAPPER}} .edubin-logotype-container .logo-name',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow',
                'selector' => '{{WRAPPER}} .edubin-logotype-container .logo-name',
            ]
        );

        $this->end_controls_section();
    }

    public function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);

        $custom_size = false;

        $logo = !empty($custom_logo) ? $custom_logo : false;
        
      if ($settings['logo_height']) {
            $style = $logo_height ? 'height: ' . esc_attr((int) $logo_height) . 'px;' : '';
            $style = $style ? ' style="' . $style . '"' : '';
        }
        else {
            $style = '';
        }

        if (
            $logo
            && !empty($enable_logo_height)
            && !empty($logo_height)
        ) {
            $custom_size = $logo_height;
        }

            $class = '';
            $alt = get_bloginfo('name');

            $logo = $settings['custom_logo'];
            $src = $logo['url'] ?? '';

            echo '<div class="edubin-logotype-container ', esc_attr($class), '">';
            echo '<a href="', esc_url(home_url('/')), '">';
            if ($src) {
                echo '<img',
                    ' class="', $class, '"',
                    ' src="', esc_url($src), '"',
                    ' alt="', esc_attr($alt) ?: 'logotype', '"',
                    $style,
                    '>';
            } else {
                echo '<h1 class="logo-name">',
                    get_bloginfo('name'),
                '</h1>';
            }
            echo '</a>';
            echo '</div>';
        
    }
}
