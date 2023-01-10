<?php
/**
 * Typography Customizer options
 *
 * @package Startupx 
 */
$wp_customize->add_panel(
	'startupx_typography_panel',
	array(
		'title'         => esc_html__( 'Typography', 'startupx'),
		'priority'      => 10,
	)
); 

/*--------------------------------------------
	Heading
---------------------------------------------*/
$wp_customize->add_section(
	'startupx_heading_section',
	array(
		'title'      => esc_html__( 'Headings', 'startupx'),
		'panel'      => 'startupx_typography_panel',
	)
);

$wp_customize->add_setting( 'startupx_heading_font',
    array(
        'default'           => '{"font":"System default","regularweight":"regular","italicweight":"italic","boldweight":"bold","category":"sans-serif"}',
        'sanitize_callback' => 'startupx_google_fonts_sanitize',
        'transport'	 		=> 'postMessage'
    )
);

$wp_customize->add_control( new Startupx_Control_Typography( $wp_customize, 'startupx_heading_font',
    array(
        'label' => esc_html__( 'Heading font', 'startupx' ),
        'section' => 'startupx_heading_section',
        'settings' => array (
			'family' => 'startupx_heading_font',
		),
        'input_attrs' => array(
			'font_count'    => 'all',
			'orderby'       => 'alpha',
			'disableRegular' => false,
		),
    )
));

$wp_customize->add_setting( 'startupx_heading_font_style', array(
	'sanitize_callback' => 'startupx_sanitize_select',
	'default' 			=> 'normal',
	'transport'	 		=> 'postMessage'
) );

$wp_customize->add_control( 'startupx_heading_font_style', array(
	'type' 		=> 'select',
	'section' 	=> 'startupx_heading_section',
	'label' 	=> esc_html__( 'Font style', 'startupx' ),
	'choices' => array(
		'normal' 	=> esc_html__( 'Normal', 'startupx' ),
		'italic' 	=> esc_html__( 'Italic', 'startupx' ),
		'oblique' 	=> esc_html__( 'Oblique', 'startupx' ),
	),
) );

$wp_customize->add_setting( 'startupx_heading_line_height', array(
	'default'   		=> 1.4,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'startupx_range',
) );			

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_heading_line_height',
	array(
		'label' 		=> esc_html__( 'Line height', 'startupx' ),
		'section' 		=> 'startupx_heading_section',
		'responsive'	=> false,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_heading_line_height',
		),
		'input_attrs' => array (
			'min'	=> 0,
			'max'	=> 5,
			'step'  => 0.01,
			'unit'  => 'em'
		)
	)
) ); 

$wp_customize->add_setting( 'startupx_heading_letter_spacing', array(
	'default'   		=> 0,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'startupx_range',
) );			

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_heading_letter_spacing',
	array(
		'label' 		=> esc_html__( 'Letter spacing', 'startupx' ),
		'section' 		=> 'startupx_heading_section',
		'responsive'	=> false,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_heading_letter_spacing',
		),
		'input_attrs' => array (
			'min'	=> 0,
			'max'	=> 5,
			'step'  => 0.1,
			'unit'  => 'px'
		)
	)
) );


$wp_customize->add_setting( 'startupx_heading_text_transform',
	array(
		'default' 			=> 'none',
		'sanitize_callback' => 'startupx_sanitize_text',
		'transport'			=> 'postMessage',
	)
);
$wp_customize->add_control( new Startupx_Control_RadioButtons( $wp_customize, 'startupx_heading_text_transform',
	array(
		'label'   => esc_html__( 'Text transform', 'startupx' ),
		'section' => 'startupx_heading_section',
		'choices' => array(
			'none' 			=> '-',
			'capitalize' 	=> 'Aa',
			'lowercase' 	=> 'aa',
			'uppercase' 	=> 'AA',
		)
	)
) );

$wp_customize->add_setting( 'startupx_heading_typography_divider',
	array(
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Divider( $wp_customize, 'startupx_heading_typography_divider',
		array(
			'section' 		=> 'startupx_heading_section',
		)
	)
);


$wp_customize->add_setting( 'startupx_heading_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Heading( $wp_customize, 'startupx_heading_title',
		array(
			'label'			=> esc_html__( 'Heading', 'startupx' ),
			'description'	=> esc_html__( '(H1 - h6) heading font size.', 'startupx' ),
			'section' 		=> 'startupx_heading_section',
		)
	)
);

$wp_customize->add_setting( 'startupx_heading_h1_font_size_desktop', array(
	'default'   		=> 40,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h1_font_size_tablet', array(
	'default'   		=> 36,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h1_font_size_mobile', array(
	'default'   		=> 28,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_heading_h1_font_size',
	array(
		'label' 		=> esc_html__( 'H1 font size', 'startupx' ),
		'section' 		=> 'startupx_heading_section',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_heading_h1_font_size_desktop',
			'size_tablet' 		=> 'startupx_heading_h1_font_size_tablet',
			'size_mobile' 		=> 'startupx_heading_h1_font_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 10,
			'max'	=> 72,
			'step'  => 1,
			'unit'  => 'px'
		)
	)
) );

$wp_customize->add_setting( 'startupx_heading_h2_font_size_desktop', array(
	'default'   		=> 32,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h2_font_size_tablet', array(
	'default'   		=> 28,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h2_font_size_mobile', array(
	'default'   		=> 22,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_heading_h2_font_size',
	array(
		'label' 		=> esc_html__( 'H2 font size', 'startupx' ),
		'section' 		=> 'startupx_heading_section',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_heading_h2_font_size_desktop',
			'size_tablet' 		=> 'startupx_heading_h2_font_size_tablet',
			'size_mobile' 		=> 'startupx_heading_h2_font_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 10,
			'max'	=> 72,
			'step'  => 1,
			'unit'  => 'px'
		)
	)
) );

$wp_customize->add_setting( 'startupx_heading_h3_font_size_desktop', array(
	'default'   		=> 28,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h3_font_size_tablet', array(
	'default'   		=> 24,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h3_font_size_mobile', array(
	'default'   		=> 18,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_heading_h3_font_size',
	array(
		'label' 		=> esc_html__( 'H3 font size', 'startupx' ),
		'section' 		=> 'startupx_heading_section',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_heading_h3_font_size_desktop',
			'size_tablet' 		=> 'startupx_heading_h3_font_size_tablet',
			'size_mobile' 		=> 'startupx_heading_h3_font_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 10,
			'max'	=> 72,
			'step'  => 1,
			'unit'  => 'px'
		)
	)
) );

$wp_customize->add_setting( 'startupx_heading_h4_font_size_desktop', array(
	'default'   		=> 24,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h4_font_size_tablet', array(
	'default'   		=> 20,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h4_font_size_mobile', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_heading_h4_font_size',
	array(
		'label' 		=> esc_html__( 'H4 font size', 'startupx' ),
		'section' 		=> 'startupx_heading_section',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_heading_h4_font_size_desktop',
			'size_tablet' 		=> 'startupx_heading_h4_font_size_tablet',
			'size_mobile' 		=> 'startupx_heading_h4_font_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 10,
			'max'	=> 72,
			'step'  => 1,
			'unit'  => 'px'
		)
	)
) );

$wp_customize->add_setting( 'startupx_heading_h5_font_size_desktop', array(
	'default'   		=> 20,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h5_font_size_tablet', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h5_font_size_mobile', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_heading_h5_font_size',
	array(
		'label' 		=> esc_html__( 'H5 font size', 'startupx' ),
		'section' 		=> 'startupx_heading_section',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_heading_h5_font_size_desktop',
			'size_tablet' 		=> 'startupx_heading_h5_font_size_tablet',
			'size_mobile' 		=> 'startupx_heading_h5_font_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 10,
			'max'	=> 72,
			'step'  => 1,
			'unit'  => 'px'
		)
	)
) );

$wp_customize->add_setting( 'startupx_heading_h6_font_size_desktop', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h6_font_size_tablet', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_heading_h6_font_size_mobile', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_heading_h6_font_size',
	array(
		'label' 		=> esc_html__( 'H6 font size', 'startupx' ),
		'section' 		=> 'startupx_heading_section',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_heading_h6_font_size_desktop',
			'size_tablet' 		=> 'startupx_heading_h6_font_size_tablet',
			'size_mobile' 		=> 'startupx_heading_h6_font_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 10,
			'max'	=> 72,
			'step'  => 1,
			'unit'  => 'px'
		)
	)
) );


/*--------------------------------------------
	Base
---------------------------------------------*/
$wp_customize->add_section(
	'startupx_base_section',
	array(
		'title'         => esc_html__( 'Body', 'startupx'),
		'panel'         => 'startupx_typography_panel',
	)
);

$wp_customize->add_setting( 'startupx_base_font',
    array(
        'default'           => '{"font":"System default","regularweight":"regular","italicweight":"italic","boldweight":"bold","category":"sans-serif"}',
        'sanitize_callback' => 'startupx_google_fonts_sanitize',
        'transport'	 		=> 'postMessage'
    )
);

$wp_customize->add_control( new Startupx_Control_Typography( $wp_customize, 'startupx_base_font',
    array(
        'label' => esc_html__( 'Body font', 'startupx' ),
        'section' => 'startupx_base_section',
        'settings' => array (
			'family' => 'startupx_base_font',
		),
        'input_attrs' => array(
			'font_count'    => 'all',
			'orderby'       => 'alpha',
			'disableRegular' => false,
		),
    )
));

$wp_customize->add_setting( 'startupx_base_font_style', array(
	'sanitize_callback' => 'startupx_sanitize_select',
	'default' 			=> 'normal',
	'transport'	 		=> 'postMessage'
) );

$wp_customize->add_control( 'startupx_base_font_style', array(
	'type' 		=> 'select',
	'section' 	=> 'startupx_base_section',
	'label' 	=> esc_html__( 'Font style', 'startupx' ),
	'choices' => array(
		'normal' 	=> esc_html__( 'Normal', 'startupx' ),
		'italic' 	=> esc_html__( 'Italic', 'startupx' ),
		'oblique' 	=> esc_html__( 'Oblique', 'startupx' ),
	),
) );

$wp_customize->add_setting( 'startupx_base_line_height', array(
	'default'   		=> 1.68,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'startupx_sanitize_text',
) );			

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_base_line_height',
	array(
		'label' 		=> esc_html__( 'Line height', 'startupx' ),
		'section' 		=> 'startupx_base_section',
		'responsive'	=> false,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_base_line_height',
		),
		'input_attrs' => array (
			'min'	=> 0,
			'max'	=> 5,
			'step'  => 0.01,
			'unit'  => 'em'
		)
	)
) ); 

$wp_customize->add_setting( 'startupx_base_letter_spacing', array(
	'default'   		=> 0,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'startupx_sanitize_text',
) );			

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_base_letter_spacing',
	array(
		'label' 		=> esc_html__( 'Letter spacing', 'startupx' ),
		'section' 		=> 'startupx_base_section',
		'responsive'	=> false,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_base_letter_spacing',
		),
		'input_attrs' => array (
			'min'	=> 0,
			'max'	=> 5,
			'step'  => 0.1,
			'unit'  => 'px'
		)
	)
) );


$wp_customize->add_setting( 'startupx_base_text_transform',
	array(
		'default' 			=> 'none',
		'sanitize_callback' => 'startupx_sanitize_text',
		'transport'			=> 'postMessage',
	)
);
$wp_customize->add_control( new Startupx_Control_RadioButtons( $wp_customize, 'startupx_base_text_transform',
	array(
		'label'   => esc_html__( 'Text transform', 'startupx' ),
		'section' => 'startupx_base_section',
		'choices' => array(
			'none' 			=> '-',
			'capitalize' 	=> 'Aa',
			'lowercase' 	=> 'aa',
			'uppercase' 	=> 'AA',
		)
	)
) );

$wp_customize->add_setting( 'startupx_base_typography_divider',
	array(
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Divider( $wp_customize, 'startupx_base_typography_divider',
		array(
			'section' 		=> 'startupx_base_section',
		)
	)
);


$wp_customize->add_setting( 'startupx_base_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Heading( $wp_customize, 'startupx_base_title',
		array(
			'label'			=> esc_html__( 'Body', 'startupx' ),
			'section' 		=> 'startupx_base_section',
		)
	)
);

$wp_customize->add_setting( 'startupx_base_font_size_desktop', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_base_font_size_tablet', array(
	'default'   		=> 14,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_base_font_size_mobile', array(
	'default'   		=> 14,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_base_font_size',
	array(
		'label' 		=> esc_html__( 'Font size', 'startupx' ),
		'section' 		=> 'startupx_base_section',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_base_font_size_desktop',
			'size_tablet' 		=> 'startupx_base_font_size_tablet',
			'size_mobile' 		=> 'startupx_base_font_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 10,
			'max'	=> 72,
			'step'  => 1,
			'unit'  => 'px'
		)
	)
) );