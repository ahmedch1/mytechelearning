<?php
/**
 * Team Widget
 */
namespace Elementor;
class eCademy_Team extends Widget_Base{
    public function get_name(){
        return "eCademy_Team";
    }
    public function get_title(){
        return "Team";
    }
    public function get_icon(){
        return "eicon-gallery-group";
    }
    public function get_categories(){
        return ['ecademy-elements'];
    }
    protected function register_controls(){

    $this->start_controls_section(
        'eCademy_Team',
        [
            'label' => __( 'eCademy Team', 'ecademy-toolkit' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

        $repeater = new Repeater();

        $repeater->add_control(
            'member_img',
            [
                'label' => esc_html__( 'Image', 'ecademy-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'name',
            [
                'label' => esc_html__( 'Member Name', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'label' => esc_html__( 'Designation', 'ecademy-toolkit' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'icon1',
            [
                'label' => esc_html__( 'Social Icon One', 'ecademy-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url1',
            [
                'label' => esc_html__( 'Social Link One', 'ecademy-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'icon2',
            [
                'label' => esc_html__( 'Social Icon Two', 'ecademy-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url2',
            [
                'label' => esc_html__( 'Social Link Two', 'ecademy-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'icon3',
            [
                'label' => esc_html__( 'Social Icon Three', 'ecademy-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url3',
            [
                'label' => esc_html__( 'Social Link Three', 'ecademy-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'icon4',
            [
                'label' => esc_html__( 'Social Icon Four', 'ecademy-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url4',
            [
                'label' => esc_html__( 'Social Link Four', 'ecademy-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'icon5',
            [
                'label' => esc_html__( 'Social Icon Five', 'ecademy-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url5',
            [
                'label' => esc_html__( 'Social Link Five', 'ecademy-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'teams',
            [
                'label' => esc_html__( 'Add Member', 'ecademy-toolkit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
    $this-> end_controls_section();

    // Start Style content controls
    $this-> start_controls_section(
        'style',
        [
            'label'=>esc_html__('Style', 'ecademy-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Member Name Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-trainer-box .content h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'name_size',
            [
                'label' => esc_html__( 'Member Name Font Size', 'ecademy-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'unit' => 'px',
                'selectors' => [
                    '{{WRAPPER}} .single-team .team-info h3' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Member Designation Color', 'ecademy-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-trainer-box .content p' => 'color: {{VALUE}}',
                ],
            ]
        );
    $this->add_responsive_control(
        'designation_size',
        [
            'label' => esc_html__( 'Member Designation Font Size', 'ecademy-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 20,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .single-team .team-info span, .single-trainer-box .designation' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this-> end_controls_section();
}
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        global $ecademy_opt;
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

        $slider         = $settings['teams'];

        ?>
        <div class="container-fluid">
            <div class="trainer-slides owl-carousel owl-theme">
                <?php foreach( $settings['teams'] as $item ): ?>
                    <div class="single-trainer-box">
                        <?php if( $item['member_img']['url'] != '' ): ?>
                            <?php if( $is_lazyloader == true ): ?>
                                <img sm-src="<?php echo esc_url( $item['member_img']['url'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
                            <?php else: ?>
                                <img src="<?php echo esc_url( $item['member_img']['url'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
                            <?php endif; ?>
                        <?php endif; ?>

                        <span class="designation"><?php echo esc_html( $item['designation'] ); ?></span>
                        <div class="content">
                            <h3><?php echo esc_html( $item['name'] ); ?></h3>
                            <ul class="social-link">

                            <?php if( $item['icon1'] != '' && $item['url1']['url'] != '' ): ?>
                                <li><a class="d-block" href="<?php echo esc_url( $item['url1']['url'] ); ?>"><i class="<?php echo esc_attr( $item['icon1'] ); ?>"></i></a></li>
                            <?php endif; ?>

                            <?php if( $item['icon2'] != '' && $item['url2']['url'] != '' ): ?>
                                <li><a class="d-block" href="<?php echo esc_url( $item['url2']['url'] ); ?>"><i class="<?php echo esc_attr( $item['icon2'] ); ?>"></i></a></li>
                            <?php endif; ?>

                            <?php if( $item['icon3'] != '' && $item['url3']['url'] != '' ): ?>
                                <li><a class="d-block" href="<?php echo esc_url( $item['url3']['url'] ); ?>"><i class="<?php echo esc_attr( $item['icon3'] ); ?>"></i></a></li>
                            <?php endif; ?>

                            <?php if( $item['icon4'] != '' && $item['url4']['url'] != '' ): ?>
                                <li><a class="d-block" href="<?php echo esc_url( $item['url4']['url'] ); ?>"><i class="<?php echo esc_attr( $item['icon4'] ); ?>"></i></a></li>
                            <?php endif; ?>
                            <?php if( $item['icon5']
                                != '' && $item['url5']['url'] != '' ): ?>
                                <li><a class="d-block" href="<?php echo esc_url( $item['url5']['url'] ); ?>"><i class="<?php echo esc_attr( $item['icon5'] ); ?>"></i></a></li>
                            <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php
    }
}
Plugin::instance()->widgets_manager->register( new eCademy_Team );