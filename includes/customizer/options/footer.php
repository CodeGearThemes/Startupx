<?php
/**
 * Footer Customizer options
 *
 * @package Startupx
 */

/*--------------------------------------------
	Footer Panel
---------------------------------------------*/
$wp_customize->add_panel( 'startupx_footer_panel',
	array(
		'title'         => esc_html__( 'Footer', 'startupx'),
		'priority'      => 40,
	)
);

/*--------------------------------------------
	Footer Section
---------------------------------------------*/
$wp_customize->add_section( 'startupx_footer_section',
	array(
		'title'      => esc_html__( 'Footer widgets', 'startupx'),
		'panel'      => 'startupx_footer_panel',
	)
);

$wp_customize->add_setting( 'startupx_footer_tabs',
	array(
		'default'           => '',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Tabs( $wp_customize, 'startupx_footer_tabs',
		array(
			'label' 				=> esc_html__( 'Footer credit tabs', 'startupx' ),
			'section'       		=> 'startupx_footer_section',
			'controls_general'		=> json_encode( array( '#customize-control-footer_section_layout' ) ),
			'controls_design'		=> json_encode( array( '#customize-control-startupx_footer_section_heading_color', '#customize-control-startupx_footer_section_text_color', '#customize-control-startupx_footer_section_background' ) ),
		)
	)
);

$wp_customize->add_setting( 'footer_section_layout',
	array(
		'default'           => 'simple',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control( new Startupx_Control_RadioImage( $wp_customize, 'footer_section_layout',
		array(
			'label'    => esc_html__( 'Footer layout', 'startupx' ),
			'section'  => 'startupx_footer_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'disabled' => array(
					'label' => esc_html__( 'Disabled', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/disabled.svg'
				),				
				'simple' => array(
					'label' => esc_html__( 'Simple', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/footer-simple.svg'
				)
			)
		)
	)
); 

$wp_customize->add_setting( 'startupx_footer_section_heading_color',
	array(
		'default'           => '#222222',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);
$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_footer_section_heading_color',
		array(
			'label'         	=> esc_html__( 'Heading color', 'startupx' ),
			'section'       	=> 'startupx_footer_section',
			'priority' 			=> 100
		)
	)
);

$wp_customize->add_setting( 'startupx_footer_section_text_color',
	array(
		'default'           => '#333333',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_footer_section_text_color',
		array(
			'label'         	=> esc_html__( 'Text color', 'startupx' ),
			'section'       	=> 'startupx_footer_section',
			'priority' 			=> 110
		)
	)
);

$wp_customize->add_setting( 'startupx_footer_section_background',
	array(
		'default'           => '#f8f8f8',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_footer_section_background',
		array(
			'label'         	=> esc_html__( 'Background color', 'startupx' ),
			'section'       	=> 'startupx_footer_section',
			'priority' 			=> 110
		)
	)
);

/*--------------------------------------------
	Footer Credits
---------------------------------------------*/
$wp_customize->add_section('startupx_footer_credits',
	array(
		'title'      => esc_html__( 'Copyright', 'startupx'),
		'panel'      => 'startupx_footer_panel',
	)
);

$wp_customize->add_setting( 'startupx_footer_credits_tabs',
	array(
		'default'           => '',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Tabs( $wp_customize, 'startupx_footer_credits_tabs',
		array(
			'label' 				=> esc_html__( 'Footer credit tabs', 'startupx' ),
			'section'       		=> 'startupx_footer_credits',
			'controls_general'		=> json_encode( array( '#customize-control-footer_copyright_layout', '#customize-control-startupx_footer_credits' ) ),
			'controls_design'		=> json_encode( array( '#customize-control-startupx_footer_credits_background', '#customize-control-startupx_footer_credits_color', '#customize-control-startupx_footer_credits_style_divider', '#customize-control-startupx_footer_credits_link_color', '#customize-control-startupx_footer_credits_link_hover_color' ) ),
		)
	)
);

/*--------------------------------------------
	Footer Credits General
---------------------------------------------*/
$wp_customize->add_setting('startupx_footer_credits',
	array(
		'sanitize_callback' => 'startupx_sanitize_text',
		'default'           => sprintf( esc_html__( '%1$1s. Proudly powered by %2$2s', 'startupx' ), '{copyright} {year} {site_title}', '{theme_author}' ),// phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
		'transport' 		=> 'refresh'
	)       
);
$wp_customize->add_control( 'startupx_footer_credits',
	array(
		'label'       	  => esc_html__( 'Footer credits', 'startupx' ),
		'description' 	  => esc_html__( 'You can use the following tags: {copyright}, {year}, {site_title}', 'startupx' ),
		'type'        	  => 'textarea',
		'section'         => 'startupx_footer_credits',
		'priority'    	  => 10
	) 
);


/*--------------------------------------------
	Footer Credits Styling
---------------------------------------------*/
$wp_customize->add_setting( 'startupx_footer_credits_color',
	array(
		'default'           => '#333333',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_footer_credits_color',
		array(
			'label'         	=> esc_html__( 'Text color', 'startupx' ),
			'section'       	=> 'startupx_footer_credits',
			'priority' 			=> 100
		)
	)
);

$wp_customize->add_setting( 'startupx_footer_credits_background',
	array(
		'default'           => '#f8f8f8',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);

$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_footer_credits_background',
		array(
			'label'         	=> esc_html__( 'Background color', 'startupx' ),
			'section'       	=> 'startupx_footer_credits',
			'priority' 			=> 110
		)
	)
);

$wp_customize->add_setting( 'startupx_footer_credits_style_divider',
	array(
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Divider( $wp_customize, 'startupx_footer_credits_style_divider',
		array(
			'section' 		=> 'startupx_footer_credits',
			'priority' 			=> 115
		)
	)
);

$wp_customize->add_setting( 'startupx_footer_credits_link_color',
	array(
		'default'           => '#7e7e7e',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);
$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_footer_credits_link_color',
		array(
			'label'         	=> esc_html__( 'Link color', 'startupx' ),
			'section'       	=> 'startupx_footer_credits',
			'priority' 			=> 120
		)
	)
);

$wp_customize->add_setting( 'startupx_footer_credits_link_hover_color',
	array(
		'default'           => '#222222',
		'sanitize_callback' => 'startupx_sanitize_hex_rgba',
		'transport'         => 'refresh'
	)
);
$wp_customize->add_control( new Startupx_Control_AlphaColor( $wp_customize, 'startupx_footer_credits_link_hover_color',
		array(
			'label'         	=> esc_html__( 'Link hover color', 'startupx' ),
			'section'       	=> 'startupx_footer_credits',
			'priority' 			=> 130
		)
	)
);