<?php
namespace Elementor;

if (!defined('ABSPATH')) {
exit;
}
// Exit if accessed directly

use Elementor\{Widget_Base, Controls_Manager};
use Elementor\{Group_Control_Border, Group_Control_Typography, Group_Control_Box_Shadow, Group_Control_Background};
use RTAddons\Gostudy_Global_Variables as Gostudy_Globals;

class Edubin_Footer_Menu extends Widget_Base
{

public function get_name()
{
    return 'edubin-footer-menu';
}

public function get_title()
{
    return __('Footer Menu', 'edubin-core');
}

public function get_icon()
{
    return 'edubin-icon eicon-layout-settings';
}

public function get_categories()
{
    return ['edubin-core'];
}
public function get_keywords() {
    return [ 'menu', 'edubin menu', 'nav menu', 'nav', 'footer menu', 'bottom menu', 'copyright menu' ];
}

protected function register_controls()
    {
        /*-----------------------------------------------------------------------------------*/
        /*  CONTENT -> GENERAL
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'section_content_general',
            ['label' => esc_html__('General', 'edubin-core')]
        );
        $this->add_control(
            'menu_title',
            [
                'label'         => __('Menu Title', 'edubin-core'),
                'type'          => Controls_Manager::TEXT,
                'default'       => __('Footer Menu','edubin-core'),
            ]
        );
        $this->add_control(
            'menu',
            [
                'label' => esc_html__('Menu', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'options' => edubin_get_custom_menu(),
            ]
        );
       $this->add_control(
            'enable_two_clm',
            [
                'label' => esc_html__('Two Column Menu', 'gostudy-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
       $this->add_control(
            'enable_menu_icon',
            [
                'label' => esc_html__('Hide Menu Icon', 'gostudy-core'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );
       $this->add_control(
            'enable_inline_block_menu',
            [
                'label' => esc_html__('Inline Block', 'gostudy-core'),
                'type' => Controls_Manager::SWITCHER,
            ]
        );
        $this->add_control(
            'heading_width',
            [
                'label' => esc_html__('Width', 'edubin-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'display',
            [
                'label' => esc_html__('Display', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'inline-flex; width: auto' => esc_html__('Inline-Flex', 'edubin-core'),
                    'block' => esc_html__('Block', 'edubin-core'),
                ],
                'default' => 'inline-flex; width: auto',
                'selectors' => [
                    '{{WRAPPER}}' => 'display: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'flex_grow',
            [
                'label' => esc_html__('Flex Grow', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'condition' => ['display' => 'inline-flex; width: auto'],
                'min' => -1,
                'max' => 20,
                'default' => 1,
                'selectors' => [
                    '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_height',
            [
                'label' => esc_html__('Height', 'edubin-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'menu_height',
            [
                'label' => esc_html__('Module Height (px)', 'edubin-core'),
                'type' => Controls_Manager::NUMBER,
                'separator' => 'after',
                'min' => 30,
                'default' => 84,
                'selectors' => [
                    '{{WRAPPER}} .main-navigation' => 'height: {{VALUE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'alignmentt_flex',
            [
                'label' => esc_html__('Alignment', 'edubin-core'),
                'type' => Controls_Manager::CHOOSE,
                'condition' => ['display' => 'inline-flex; width: auto'],
                'toggle' => false,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'edubin-core'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'edubin-core'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'edubin-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}}' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'alignmentt_block',
            [
                'label' => esc_html__('Alignment', 'edubin-core'),
                'type' => Controls_Manager::CHOOSE,
                'condition' => ['display' => 'block'],
                'toggle' => false,
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
                    '{{WRAPPER}} .main-navigation' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  STYLE -> MENU
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'section_style_menu',
            [
                'label' => esc_html__('Style', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_menu_title',
            [
                'label' => esc_html__('Title', 'edubin-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_title',
                'selector' => '{{WRAPPER}} .site-footer .widget-title',
            ]
        );

        $this->add_control(
            'menu_title_color',
            [
                'label' => esc_html__('Title Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .site-footer .widget-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_title_padding',
            [
                'label' => esc_html__('Title Padding', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .site-footer .widget-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_title_margin',
            [
                'label' => esc_html__('Title Margin', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .site-footer .widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_menu',
            [
                'label' => esc_html__('Menu', 'edubin-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'items',
                'selector' => '{{WRAPPER}} .site-footer a',
            ]
        );
        $this->add_responsive_control(
            'menu_items_padding',
            [
                'label' => esc_html__('Items Padding', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .site-footer ul.menu li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'tabs_menu'
        );

        $this->start_controls_tab(
            'tab_menu_idle',
            ['label' => esc_html__('Normal' , 'edubin-core')]
        );

        $this->add_control(
            'menu_text_idle',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .site-footer ul.menu li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'menu_icon_idle',
            [
                'label' => esc_html__('Icon Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'selectors' => [
                    '{{WRAPPER}} .site-footer .widget ul.menu li:before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_menu_hover',
            ['label' => esc_html__('Hover' , 'edubin-core')]
        );

        $this->add_control(
            'menu_text_hover',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .site-footer .widget ul.menu li a:hover' => 'color: {{VALUE}}',
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
       extract($settings);

        $menu = $menu ?? '';

       // enable_two_clm
        if ($settings['enable_two_clm']) {
            $depth = 1;
            $edubin_two_clm = 'two-column-menu';
        }
        else{
          $depth = 0;   
          $edubin_two_clm = '';
        }

    ?>

        <div class="site-footer <?php echo ($enable_menu_icon) ? 'hide-menu-icon' : '' ; ?>">

            <div class=" <?php if ($settings['enable_inline_block_menu']) { echo esc_attr('social-navigation');} else {echo esc_attr('widget widget_nav_menu');} ?> <?php echo $edubin_two_clm; ?>">

                <?php if ($settings['menu_title'] && !$settings['enable_inline_block_menu']): ?>
                    <h2 class="widget-title"><?php echo $settings['menu_title']; ?></h2>
                <?php endif ?>

                <?php wp_nav_menu( array(
                    'menu' => $menu,
                    'menu_class'     => 'menu',
                    'theme_location' => 'footer_menu',
                    'depth'          => 0,
                ) ); 
                ?>

            </div>

        </div>
        <?php
    }
}
