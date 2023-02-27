<?php
namespace Elementor;

if (!defined('ABSPATH')) {
	exit;
}
// Exit if accessed directly

use Elementor\{Widget_Base, Controls_Manager, Group_Control_Background};

class Edubin_Elementor_Widget_Delimiter extends Widget_Base {

	public function get_name() {
		return 'edubin-delimiter';
	}

	public function get_title() {
		return __('Delimiter', 'edubin-core');
	}
    public function get_keywords() {
        return [ 'delimiter', 'decider', 'line', 'header'];
    }
	public function get_icon() {
		return 'edubin-icon eicon-h-align-center';
	}

	public function get_categories() {
		return ['edubin-core'];
	}

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_content_general',
            ['label' => esc_html__('General', 'edubin-core')]
        );

        $this->add_control(
            'delimiter_height',
            [
                'label' => esc_html__('Delimiter Height', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'separator' => 'before',
                'min' => 0,
                'default' => 100,
                'selectors' => [
                    '{{WRAPPER}} .delimiter' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'delimiter_width',
            [
                'label' => esc_html__('Delimiter Width', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'default' => 3,
                'description' => esc_html__('Values in pixels', 'edubin-core'),
                'selectors' => [
                    '{{WRAPPER}} .delimiter' => 'width: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_control(
            'delimiter_align',
            [
                'label' => esc_html__('Alignment', 'edubin-core'),
                'type' => Controls_Manager::CHOOSE,
                'separator' => 'after',
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .delimiter-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'delimiter_background',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .delimiter',
            ]
        );

        $this->add_control(
            'delimiter_margin',
            [
                'label' => esc_html__('Margin', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'separator' => 'before',
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .delimiter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    public function render()
    { ?>
        <div class="delimiter-wrapper">
            <div class="delimiter"></div>
        </div><?php
    }
}
