<?php

/**
 * Class LP_Certificate_Layer
 */
class LP_Certificate_Layer {
	/**
	 * @var null
	 */
	public $options = null;

	/**
	 * LP_Certificate_Layer constructor.
	 *
	 * @param $options
	 */
	public function __construct( $options ) {
		$this->options = wp_parse_args(
			$options,
			array(
				'name' => uniqid(),
			)
		);
	}

	/**
	 * Get name of layer.
	 *
	 * @return string
	 */
	public function get_name() {
		return $this->options['name'];
	}

	public function apply( $data ) {
		$this->options['text'] = ! empty( $this->options['variable'] ) ? $this->options['variable'] : ( isset( $this->options['text'] ) ? $this->options['text'] : '' );
	}

	/**
	 * Default layer's options.
	 *
	 * @return array
	 */
	public function get_options() {
		$font_element = array();
		$font_ttf     = array();

		$font_element = array(
			'name'        => 'fontFamily',
			'type'        => 'font',
			'title'       => esc_html__( 'Font', 'ecademy-toolkit' ),
			'std'         => '',
			'google_font' => true,
		);

		$fields = array( $font_element );
		if ( ! empty( $font_ttf ) ) {
			$fields = array_merge( $fields, array( $font_ttf ) );
		}

		$fields = array_merge(
			$fields,
			array(
				array(
					'name'  => 'fontSize',
					'type'  => 'slider',
					'title' => esc_html__( 'Font size', 'ecademy-toolkit' ),
					'std'   => '',
					'min'   => 8,
					'max'   => 512,
				),
				array(
					'name'    => 'fontStyle',
					'type'    => 'select',
					'title'   => esc_html__( 'Font style', 'ecademy-toolkit' ),
					'std'     => '',
					'options' => array(
						''        => esc_html__( 'Normal', 'ecademy-toolkit' ),
						'italic'  => esc_html__( 'Italic', 'ecademy-toolkit' ),
						'oblique' => esc_html__( 'Oblique', 'ecademy-toolkit' ),
					),
				),
				array(
					'name'    => 'fontWeight',
					'type'    => 'select',
					'title'   => esc_html__( 'Font weight', 'ecademy-toolkit' ),
					'std'     => '',
					'options' => array(
						''     => esc_html__( 'Normal', 'ecademy-toolkit' ),
						'bold' => esc_html__( 'Bold', 'ecademy-toolkit' ),
					),
				),
				array(
					'name'    => 'textDecoration',
					'type'    => 'select',
					'title'   => esc_html__( 'Text decoration', 'ecademy-toolkit' ),
					'std'     => '',
					'options' => array(
						''             => esc_html__( 'Normal', 'ecademy-toolkit' ),
						'underline'    => esc_html__( 'Underline', 'ecademy-toolkit' ),
						'overline'     => esc_html__( 'Overline', 'ecademy-toolkit' ),
						'line-through' => esc_html__( 'Line-through', 'ecademy-toolkit' ),
					),
				),
				array(
					'name'  => 'fill',
					'type'  => 'color',
					'title' => esc_html__( 'Color', 'ecademy-toolkit' ),
					'std'   => '',
				),
				array(
					'name'    => 'originX',
					'type'    => 'select',
					'title'   => esc_html__( 'Text align', 'ecademy-toolkit' ),
					'options' => array(
						'left'   => esc_html__( 'Left', 'ecademy-toolkit' ),
						'center' => esc_html__( 'Center', 'ecademy-toolkit' ),
						'right'  => esc_html__( 'Right', 'ecademy-toolkit' ),
					),
					'std'     => '',
				),
				array(
					'name'    => 'originY',
					'type'    => 'select',
					'title'   => esc_html__( 'Text vertical align', 'ecademy-toolkit' ),
					'options' => array(
						'top'    => esc_html__( 'Top', 'ecademy-toolkit' ),
						'center' => esc_html__( 'Middle', 'ecademy-toolkit' ),
						'bottom' => esc_html__( 'Bottom', 'ecademy-toolkit' ),
					),
					'std'     => '',
				),
				array(
					'name'  => 'top',
					'type'  => 'number',
					'title' => esc_html__( 'Top', 'ecademy-toolkit' ),
					'std'   => '',
				),
				array(
					'name'  => 'left',
					'type'  => 'number',
					'title' => esc_html__( 'Left', 'ecademy-toolkit' ),
					'std'   => '',
				),
				array(
					'name'  => 'angle',
					'type'  => 'slider',
					'title' => esc_html__( 'Angle', 'ecademy-toolkit' ),
					'std'   => '',
					'min'   => 0,
					'max'   => 360,
				),
				array(
					'name'  => 'scaleX',
					'type'  => 'slider',
					'title' => esc_html__( 'Scale X', 'ecademy-toolkit' ),
					'std'   => '',
					'min'   => - 50,
					'max'   => 50,
					'step'  => 0.1,
				),
				array(
					'name'  => 'scaleY',
					'type'  => 'slider',
					'title' => esc_html__( 'Scale Y', 'ecademy-toolkit' ),
					'std'   => '',
					'min'   => - 50,
					'max'   => 50,
					'step'  => 0.1,
				),
			)
		);

		if ( get_class( $this ) === 'LP_Certificate_Layer' ) {
			array_unshift(
				$fields,
				array(
					'name'  => 'variable',
					'type'  => 'text',
					'title' => esc_html__( 'Custom Text', 'ecademy-toolkit' ),
					'std'   => '',
				)
			);
		}

		$fields = apply_filters( 'learn-press/certificates/fields', $fields, $this );

		foreach ( $fields as $k => $field ) {
			$name = $field['name'];

			if ( array_key_exists( $name, $this->options ) ) {
				$fields[ $k ]['std'] = $this->options[ $name ];
			}
		}

		return $fields;
	}

	public function __toString() {
		return LP_Helper::json_encode( $this->options );
	}
}
