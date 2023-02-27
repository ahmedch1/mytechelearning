<?php
namespace Elementor;

if (!defined('ABSPATH')) {
	exit;
}
use Elementor\{Plugin, Widget_Base, Controls_Manager, Group_Control_Typography, Group_Control_Box_Shadow};

// Exit if accessed directly

class Edubin_Elementor_Widget_Join_Login_Logout extends Widget_Base {

	public function get_name() {
		return 'edubin-join-login-logout';
	}

	public function get_title() {
		return __('Join Login Logout', 'edubin-core');
	}
    public function get_keywords() {
        return [ 'sign up', 'login', 'join', 'registration', 'sign out'];
    }
	public function get_icon() {
		return 'edubin-icon eicon-lock-user';
	}
	public function get_categories() {
		return ['edubin-core'];
	}

    protected function register_controls()
    {
        $this->start_controls_section(
            'section-login-join-settings',
            [
                'label' => esc_html__( 'Login/Join', 'edubin-core' ),
            ]
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
            'login_text',
            [
                'label' => esc_html__('Login Text', 'edubin-core'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => ['active' => true],
                'default' => esc_html__('Login', 'edubin-core'),
            ]
        );

        $this->add_control(
            'login_page_url',
            [
                'label' => esc_html__('Login Page URL', 'edubin-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_attr__('https://your-link.com', 'edubin-core'),
               // 'default' => ['url' => '#'],
            ]
        );

        $this->add_control(
            'join_text',
            [
                'label' => esc_html__('Join Now', 'edubin-core'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => ['active' => true],
                'default' => esc_html__('Join Now', 'edubin-core'),
            ]
        );
        $this->add_control(
            'join_page_url',
            [
                'label' => esc_html__('Join Page URL', 'edubin-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_attr__('https://your-link.com', 'edubin-core'),
                 // 'default' => ['url' => '#'],
            ]
        );

        $this->add_control(
            'logout_text',
            [
                'label' => esc_html__('Logout Text', 'edubin-core'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => ['active' => true],
                'default' => esc_html__('Logout', 'edubin-core'),
            ]
        );
        $this->add_control(
            'logout_page_url',
            [
                'label' => esc_html__('Logout Page URL', 'edubin-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_attr__('https://your-link.com', 'edubin-core'),
                  // 'default' => ['url' => '#'],
            ]
        );

        $this->add_control(
            'profile_text',
            [
                'label' => esc_html__('Profile Text', 'edubin-core'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => ['active' => true],
                'default' => esc_html__('Profile', 'edubin-core'),
            ]
        );
        $this->add_control(
            'profile_page_url',
            [
                'label' => esc_html__('Profile Page URL', 'edubin-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_attr__('https://your-link.com', 'edubin-core'),
                  // 'default' => ['url' => '#'],
            ]
        );
        $this->add_responsive_control(
            'alignmentt_flex',
            [
                'label' => esc_html__('Alignment', 'edubin-core'),
                'type' => Controls_Manager::CHOOSE,
                // 'condition' => ['display' => 'inline-flex; width: auto'],
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
                    '{{WRAPPER}}' => 'display: flex; justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        /**
        * STYLE
        */

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typo',
                'selector' => '{{WRAPPER}} .login-join .login-join_wrapper a, .login-join a, .login-join .login-register ul li a, .login-join li.top-seperator',
            ]
        );

        $this->end_controls_section();

        /**
        * Login
        */

        $this->start_controls_section(
            'login_section_style',
            [
                'label' => esc_html__('Login', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'sp_color_tabs',
            [
                'separator' => 'before',
            ]
        );
        $this->start_controls_tab(
            'tab_color_idle',
            [ 'label' => esc_html__('Idle' , 'edubin-core') ]
        );

        $this->add_control(
            'color_idle',
            [
                'label' => esc_html__( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper a.login_link' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .login-join .login-register ul li a.login_link' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_color_hover',
            [ 'label' => esc_html__('Hover' , 'edubin-core') ]
        );

        $this->add_control(
            'color_hover',
            [
                'label' => esc_html__( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper a.login_link:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .login-join .login-register ul li a.login_link:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


        /**
        * Join
        */

        $this->start_controls_section(
            'join_section_style',
            [
                'label' => esc_html__('Join/Logout', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'join_sp_color_tabs',
            [
                'separator' => 'before',
            ]
        );
        $this->start_controls_tab(
            'join_tab_color_idle',
            [ 'label' => esc_html__('Idle' , 'edubin-core') ]
        );

        $this->add_control(
            'join_color_idle',
            [
                'label' => esc_html__( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper .join_link' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .login-join .login-join_wrapper .logout_link' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .login-join .login-register ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'join_bg_idle',
            [
                'label' => esc_html__( 'Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper .join_link' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .login-join .login-join_wrapper .logout_link' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'join_shadow_idle',
                'selector' => '{{WRAPPER}} .login-join .login-join_wrapper .join_link, .login-join .login-join_wrapper .logout_link',
            ]
        );
        $this->add_control(
            'join_button_border',
            [
                'label' => __( 'Border Radius', 'edubin-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper .join_link, .login-join .login-join_wrapper .logout_link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'join_tab_color_hover',
            [ 'label' => esc_html__('Hover' , 'edubin-core') ]
        );

        $this->add_control(
            'join_color_hover',
            [
                'label' => esc_html__( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper .join_link:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .login-join .login-join_wrapper .logout_link:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .login-join .login-register ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'join_bg_hover',
            [
                'label' => esc_html__( 'Background', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper .join_link:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .login-join .login-join_wrapper .logout_link:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'join_shadow_hover',
                'selector' => '{{WRAPPER}} .login-join .login-join_wrapper .join_link:hover, .login-join .login-join_wrapper .logout_link:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label' => esc_html__('Margin', 'edubin-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'default' => [
                    'top' => 0,
                    'left' => 15,
                    'right' => 0,
                    'bottom' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .login-join .login-join_wrapper a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        /**
        * Profile
        */

        $this->start_controls_section(
            'profile_section_style',
            [
                'label' => esc_html__('Profile', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'profile_sp_color_tabs',
            [
                'separator' => 'before',
            ]
        );
        $this->start_controls_tab(
            'profile_tab_color_idle',
            [ 'label' => esc_html__('Idle' , 'edubin-core') ]
        );

        $this->add_control(
            'profile_color_idle',
            [
                'label' => esc_html__( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join .edubin-custom-user-profile a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'profile_tab_color_hover',
            [ 'label' => esc_html__('Hover' , 'edubin-core') ]
        );

        $this->add_control(
            'profile_color_hover',
            [
                'label' => esc_html__( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join .edubin-custom-user-profile a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        /**
        * Separator
        */

        $this->start_controls_section(
            'separator_section_style',
            [
                'label' => esc_html__('Separator', 'edubin-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'separator_color_idle',
            [
                'label' => esc_html__( 'Color', 'edubin-core' ),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .login-join li.top-seperator' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();
    }

    public function render()
    {

        $_ = $this->get_settings_for_display();

        $layout_style = $_['layout_style'];
        $login_page_url = $_['login_page_url'];
        $join_page_url = $_['join_page_url'];
        $login_text = $_['login_text'];
        $join_text = $_['join_text'];
        $logout_text = $_['logout_text'];
        $logout_page_url = $_['logout_page_url'];
        $profile_page_url = $_['profile_page_url'];
        $profile_text = $_['profile_text'];

        if ($layout_style == '1') { ?>
        <div class="login-join">
                    <?php
                        if ( is_user_logged_in() ) : ?>

                        <div class="edubin-custom-user-profile">
                          <ul> 
                            <?php if (!empty($profile_page_url['url'])) : ?>
                                <li class="profile">
                                    <a href="<?php echo esc_url($profile_page_url['url']); ?>"><?php echo $profile_text; ?></a>
                            <?php else : ?>
                                    <a href="<?php echo esc_url(get_edit_user_link()); ?>"><?php echo $profile_text; ?></a>
                                <li>
                            <?php endif; ?>
                            <?php //if ($login_reg_show == '1') : ?>
                              <li class="top-seperator"><?php echo esc_attr('/'); ?></li>
                            <?php //endif; ?>
                          </ul>
                        </div>
                    <?php endif; ?>
                <?php //endif; ?> 

                <?php //if ($login_reg_show == '1') : ?>
                    <?php
                        if ( is_user_logged_in() ) : ?>
                            
                        <div class="login-register logout">
                          <ul> 
                            <li class="logouthide">
                                <?php if (!empty($logout_page_url['url'])) : ?>
                                    <a href="<?php echo esc_url($logout_page_url['url']); ?>"><?php echo $logout_text; ?></a>
                                <?php else : ?>
                                    <a href="<?php echo esc_url(wp_logout_url( home_url('/') )); ?>"><?php echo $logout_text; ?></a>
                                <?php endif; ?>
                            <li>
                          </ul>
                        </div>
                        <?php else : ?>
                        <div class="login-register">
                          <ul>
                            <?php if (!empty($login_page_url['url'])) : ?>
                                <li> <a class="login_link" href="<?php echo esc_url($login_page_url['url']); ?>"><?php echo $login_text; ?></a></li>
                            <?php else : ?>
                                <li><a class="login_link" href="<?php echo esc_url(wp_login_url( home_url('/') )); ?>"><?php echo $login_text; ?></a></li>
                            <?php endif; ?>
                                <li class="top-seperator"><?php echo esc_attr('/'); ?></li>
                            <?php if (!empty($join_page_url['url'])) : ?>
                                <li> <a href="<?php echo esc_url($join_page_url['url']); ?>"><?php echo $join_text; ?></a></li>
                            <?php else : ?>
                                <li> <a href="<?php echo esc_url( wp_registration_url() ); ?>"><?php echo $join_text; ?></a></li>
                            <?php endif; ?>

                          </ul>
                        </div>
                    <?php endif; ?>
                <?php //endif; ?> 

            </div>

       <?php } else { 
            echo '<div class="login-join">';
            echo '<span class="login-join_wrapper">';

           if (!is_user_logged_in()) :

                echo '<a class="login_link', '" href="', esc_url($login_page_url['url']), '">',
                '<i class="flaticon eicon-sign-out"> </i> '.
                   $login_text,
                    '</a>';

                echo '<a class="join_link', '" href="', esc_url($join_page_url['url']), '">',
                '<i class="flaticon flaticon-user-4"> </i> '.
                $join_text,
                '</a>';

           else :
                echo '<a class="logout_link" href="',
                    esc_url(wp_logout_url(apply_filters('edubin_default_logout_redirect', (!empty($_SERVER['HTTPS']) ? "https" : "http") . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]))), '">',
                    '<i class="flaticon eicon-sign-out"> </i> '
                    .$logout_text,
                    '</a>';
           endif;

            echo '</span>';
            echo '</div>'; 
    
            } ?>

<?php        

    }
}