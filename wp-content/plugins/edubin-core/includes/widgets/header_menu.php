<?php
namespace Elementor;

if (!defined('ABSPATH')) {
exit;
}
// Exit if accessed directly

use Elementor\{Widget_Base, Controls_Manager};
use Elementor\{Group_Control_Border, Group_Control_Typography, Group_Control_Box_Shadow, Group_Control_Background};
use RTAddons\Gostudy_Global_Variables as Gostudy_Globals;

class Edubin_Header_Menu extends Widget_Base
{

public function get_name()
{
    return 'edubin-header-menu';
}

public function get_title()
{
    return __('Header Menu', 'edubin-core');
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
    return [ 'menu', 'edubin menu', 'nav menu', 'nav', 'header menu' ];
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
            'template',
            [
                'label' => esc_html__('Template', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'default' => esc_html__('Theme Default', 'edubin-core'),
                    'custom' => esc_html__('Custom', 'edubin-core'),
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'menu',
            [
                'label' => esc_html__('Menu', 'edubin-core'),
                'type' => Controls_Manager::SELECT,
                'condition' => ['template' => 'custom'],
                'options' => edubin_get_custom_menu(),
            ]
        );
        $this->add_control(
            'submenu_disable',
            [
                'label' => esc_html__('Disable Submenu', 'edubin-core'),
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
                'label' => esc_html__('Menu', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'items',
                'selector' => '{{WRAPPER}} .main-navigation a',
            ]
        );

        $this->add_responsive_control(
            'menu_items_padding',
            [
                'label' => esc_html__('Items Padding', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .main-navigation a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .main-navigation a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .icon.icon-angle-down' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menu_border',
            [
                'label' => esc_html__('Border Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-navigation ul ul a::before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .menu-effect-2 .main-navigation ul ul' => 'border-top: 3px solid {{VALUE}}',
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
                    '{{WRAPPER}} .main-navigation a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_menu_active',
            ['label' => esc_html__('Active', 'edubin-core')]
        );

        $this->add_control(
            'menu_text_active',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-navigation li.current-menu-item>a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-navigation li.current-menu-ancestor>a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  STYLE -> SUBMENU
        /*-----------------------------------------------------------------------------------*/

        $this->start_controls_section(
            'section_style_submenu',
            [
                'label' => esc_html__('Submenu', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'submenu_typo',
                'selector' => '{{WRAPPER}} .main-navigation ul ul a',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'submenu_bg',
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .main-navigation ul li ul',
            ]
        );

        $this->start_controls_tabs(
            'tabs_submenu'
        );

        $this->start_controls_tab(
            'tab_submenu_idle',
            ['label' => esc_html__('Normal' , 'edubin-core')]
        );

        $this->add_control(
            'submenu_text_idle',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-navigation ul ul a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'submenu_icon_idle',
            [
                'label' => esc_html__('Icon Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'selectors' => [
                    '{{WRAPPER}} .main-navigation ul ul .menu-item-has-children>a>.icon, .main-navigation ul ul .page_item_has_children>a>.icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_submenu_hover',
            ['label' => esc_html__('Hover' , 'edubin-core')]
        );

        $this->add_control(
            'submenu_text_hover',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-navigation ul li ul li:hover > a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_submenu_active',
            ['label' => esc_html__('Active' , 'edubin-core')]
        );

        $this->add_control(
            'submenu_text_active',
            [
                'label' => esc_html__('Text Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-navigation li ul .current-menu-item a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'submenu_icon_active',
            [
                'label' => esc_html__('Icon Color', 'edubin-core'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .main-navigation li ul .current-menu-item a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'submenu_border',
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .main-navigation ul li ul',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'submenu_shadow',
                'selector' => '{{WRAPPER}} .main-navigation ul li ul',
            ]
        );

        $this->add_responsive_control(
            'submenu_padding',
            [
                'label' => esc_html__('Padding', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'separator' => 'before',
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .main-navigation ul li ul' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                    '{{WRAPPER}} .main-navigation ul li ul a' => 'padding-left: {{LEFT}}{{UNIT}}; padding-right: {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  STYLE -> Mobile Menu
        /*-----------------------------------------------------------------------------------*/

        // $this->start_controls_section(
        //     'section_style_mobile_menu',
        //     [
        //         'label' => esc_html__('Mobile Menu', 'edubin-core'),
        //         'tab' => Controls_Manager::TAB_STYLE,
        //     ]
        // );


        // $this->end_controls_section();
    }

    public function render()
    {
        $settings = $this->get_settings_for_display();
       extract($settings);

        $menu = $menu ?? '';

        if ( $template === 'default' && has_nav_menu('primary')) {
            $menu = 'primary';
        }
        // submenu_disable
        if ($settings['submenu_disable']) {
            $depth = 1;
            $edubin_hide_submenu = 'edubin-hide-submenu';
        }
        else{
          $depth = 0;   
          $edubin_hide_submenu = '';
        }
 

    ?>
        <div class="menu-effect-2">
             <div class="navigation-section">
                 <div class="mobile-menu-wrapper">
                    <span class="mobile-menu-icon"><i class="fas fa-bars"></i></span>
                </div>
                <nav id="site-navigation" class="main-navigation <?php echo $edubin_hide_submenu; ?>" role="navigation">
                    <?php wp_nav_menu( array(
                        'menu' => $menu,
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'main-menu',
                        'depth' => $depth,
                    ) ); 
                    ?>
                </nav>
            </div>
        </div>
        <?php
    }
}
