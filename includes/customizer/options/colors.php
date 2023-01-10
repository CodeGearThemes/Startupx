<?php
/**
 * Colors Customizer options
 *
 * @package Startupx
 */
/*--------------------------------------------
	General
---------------------------------------------*/
$wp_customize->add_setting( 'startupx_general_color_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Heading( $wp_customize, 'startupx_general_color_title',
		array(
			'label'			=> esc_html__( 'General', 'startupx' ),
			'section' 		=> 'colors',
            'priority' 			=> 5
		)
	)
);

$wp_customize->add_setting( 'startupx_website_primary_color',
	array(
		'default'           => '#000000',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_website_primary_color',
		array(
			'label'         	=> esc_html__( 'Primary color', 'startupx' ),
			'section'       	=> 'colors',
            'priority' 			=> 5
		)
	)
);

$wp_customize->add_setting( 'startupx_website_secondary_color',
	array(
		'default'           => '#4E7661',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_website_secondary_color',
		array(
			'label'         	=> esc_html__( 'Secondary color', 'startupx' ),
			'section'       	=> 'colors',
            'priority' 			=> 5
		)
	)
);

$wp_customize->add_setting( 'startupx_colors_general_divider',
	array(
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Divider( $wp_customize, 'startupx_colors_general_divider',
		array(
			'section' 		=> 'colors',
            'priority' 			=> 6
		)
	)
);

$wp_customize->add_setting( 'startupx_header_color_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Heading( $wp_customize, 'startupx_header_color_title',
		array(
			'label'			=> esc_html__( 'Website', 'startupx' ),
			'section' 		=> 'colors',
            'priority' 			=> 6
		)
	)
);

$wp_customize->add_setting( 'startupx_colors_website_divider',
	array(
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Divider( $wp_customize, 'startupx_colors_website_divider',
		array(
			'section' 		=> 'colors',
            'priority' 			=> 10
		)
	)
);


$wp_customize->add_setting( 'startupx_form_color_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Heading( $wp_customize, 'startupx_form_color_title',
		array(
			'label'			=> esc_html__( 'Form', 'startupx' ),
			'section' 		=> 'colors',
            'priority' 			=> 15
		)
	)
);

$wp_customize->add_setting( 'startupx_form_field_background',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_form_field_background',
		array(
			'label'         	=> esc_html__( 'Form field background', 'startupx' ),
			'section'       	=> 'colors',
            'priority' 			=> 20
		)
	)
);

$wp_customize->add_setting( 'startupx_border_color',
	array(
		'default'           => '#cccccc',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_border_color',
		array(
			'label'         	=> esc_html__( 'Border color', 'startupx' ),
			'section'       	=> 'colors',
            'priority' 			=> 25
		)
	)
);

$wp_customize->add_setting( 'startupx_colors_website_divider',
	array(
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Divider( $wp_customize, 'startupx_colors_website_divider',
		array(
			'section' 		=> 'colors',
            'priority' 			=> 30
		)
	)
);

$wp_customize->add_setting( 'startupx_button_text_color',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_button_text_color',
		array(
			'label'         	=> esc_html__( 'Button Text Color', 'startupx' ),
			'section'       	=> 'colors',
            'priority' 			=> 35
		)
	)
);

$wp_customize->add_setting( 'startupx_button_hover_color',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_button_hover_color',
		array(
			'label'         	=> esc_html__( 'Button Hover Color', 'startupx' ),
			'section'       	=> 'colors',
            'priority' 			=> 40
		)
	)
);