<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Edubin_Elementor_Widget_Revolution_Slider extends Widget_Base {

    public function get_name() {
        return 'edubin-revolution-addons';
    }
    
    public function get_title() {
        return __( 'Revolution Slider', 'edubin-core' );
    }

    public function get_icon() {
        return 'edubin-icon eicon-slideshow';
    }

    public function get_categories() {
        return [ 'edubin-core' ];
    }

    public function edubin_rev_slider_options() {
        if( class_exists( 'RevSlider' ) ){
            $slider = new \RevSlider();
            $revolution_sliders = $slider->getArrSliders();
            $slider_options     = ['0' => esc_html__( 'Select Slider', 'edubin-core' ) ];
            if ( ! empty( $revolution_sliders ) && ! is_wp_error( $revolution_sliders ) ) {
                foreach ( $revolution_sliders as $revolution_slider ) {
                   $alias = $revolution_slider->getAlias();
                   $title = $revolution_slider->getTitle();
                   $slider_options[$alias] = $title;
                }
            }
        } else {
            $slider_options = ['0' => esc_html__( 'No Slider Found.', 'edubin-core' ) ];
        }
        return $slider_options;
    }

    protected function register_controls() {

        $this->start_controls_section(
            'revolution_slider_content',
            [
                'label' => __( 'Revolution Slider', 'edubin-core' ),
            ]
        );

            $this->add_control(
                'slider_alias',
                [
                    'label'   => esc_html__( 'Select Slider', 'edubin-core' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => '0',
                    'options' => $this->edubin_rev_slider_options(),
                ]
            );
            
        $this->end_controls_section();

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $revolution_attributes = [
            'alias'  => $settings['slider_alias'],
        ];
        $this->add_render_attribute( 'shortcode', $revolution_attributes );
        echo do_shortcode( sprintf( '[rev_slider %s]', $this->get_render_attribute_string( 'shortcode' ) ) );

    }

}

