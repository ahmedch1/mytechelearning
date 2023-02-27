<?php
namespace Elementor;

if (!defined('ABSPATH')) {
exit;
}

// Exit if accessed directly
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;


class Edubin_Elementor_Widget_CTA extends Widget_Base
{

public function get_name()
{
    return 'edubin-cta';
}

public function get_title()
{
    return __('Call To Action', 'edubin-core');
}

public function get_icon()
{
    return 'eicon-bullet-list';
}

public function get_categories()
{
    return ['edubin-core'];
}

protected function register_controls()
{
    $this->start_controls_section(
        'content_section',
        [
            'label' => __( 'Content', 'edubin-core' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->add_control(
        'icon',
        [
            'label' => esc_html__( 'Icon', 'edubin-core' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-star',
                'library' => 'solid',
            ],
        ]
    );
    $this->add_control(
        'show_content',
        [
            'label' => __( 'Content', 'edubin-core' ),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'edubin-core' ),
            'label_off' => __( 'Hide', 'edubin-core' ),
            'default' => 'yes',
            'return_value' => 'yes',
        ]
    );
    $this->add_control(
        'title',
        [
            'label' => __( 'Text 1', 'edubin-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '321 325 5678', 'edubin-core' ),
            'placeholder' => __( 'Type your text here', 'edubin-core' ),
            'label_block' => true
        ]
    );

    $this->add_control(
        'text',
        [
            'label' => __( 'Text 2', 'edubin-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Call For Any Query', 'edubin-core' ),
            'placeholder' => __( 'Type your text here', 'edubin-core' ),
            'label_block' => true
        ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
        'style_section',
        [
            'label' => __( 'Style', 'edubin-core' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );
    
    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background',
            'label' => esc_html__( 'Background', 'edubin-core' ),
            'types' => [ 'classic', 'gradient','video' ],
            'selector' => '{{WRAPPER}} .edubin-cta-1',
        ]
    );  

    $this->add_control(
        'image_overlay_heading',
        [
            'label' => esc_html__( 'Overview', 'elementor' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'background_overlay',
            'label' => esc_html__( 'Background', 'edubin-core' ),
            'types' => [ 'classic', 'gradient','video' ],
            'selector' => '{{WRAPPER}} .edubin-cta-1:before',
        ]
    );  
    $this->end_controls_section();

    $this->start_controls_section(
        'section_style_content',
        [
            'label' => esc_html__( 'Content', 'elementor' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ]
    );

    $this->add_control(
        'heading_title',
        [
            'label' => esc_html__( 'Title', 'elementor' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'title_color',
        [
            'label' => esc_html__( 'Color', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .edubin-cta-1 .cta-content .number' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} .edubin-cta-1 .cta-content .number',
            'global' => [
                'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
            ],
        ]
    );

    $this->add_control(
        'heading_description',
        [
            'label' => esc_html__( 'Text', 'elementor' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'text_color',
        [
            'label' => esc_html__( 'Color', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .edubin-cta-1 .cta-content p' => 'color: {{VALUE}};',
            ],

        ]
    );

    $this->add_control(
        'icon_1',
        [
            'label' => esc_html__( 'Icon', 'elementor' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]
    );

    $this->add_control(
        'icon_color',
        [
            'label' => esc_html__( 'Color', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .edubin-cta-1 .cta-content .cta-icon i' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_control(
        'icon_background',
        [
            'label' => esc_html__( 'Background', 'elementor' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .edubin-cta-1 .cta-content .cta-icon i' => 'background: {{VALUE}};',
            ],
        ]
    );
    

    $this->add_responsive_control(
        'text_padding',
        [
            'label' => esc_html__( 'Padding', 'elementor' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .edubin-cta-1 .cta-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before',
        ]
    );


}

protected function render($instance = []){ 
    $settings = $this->get_settings_for_display();

    ?>
    
    <div class="edubin-cta-1">
        <div class="cta-content">

        <?php if ($settings['show_content']): ?>
            <div class="cta-icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </div>
    
            <div class="cta-text">
                <p><?php echo $settings['text']; ?></p>
                <span class="number"><?php echo $settings['title']; ?></span>
            </div>
        <?php endif; ?>

        </div>
    </div>

<?php
}


}
