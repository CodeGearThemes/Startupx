<?php
/**
 * General Customizer options
 *
 * @package Startupx
 */
/*--------------------------------------------
	General Panel
---------------------------------------------*/
$wp_customize->add_panel('startupx_general_panel',
	array(
		'title'         => esc_html__( 'General', 'startupx'),
		'priority'      => 5,
	)
);

$wp_customize->add_section( 'startupx_container_section',
	array(
		'title'      => esc_html__( 'Container', 'startupx'),
		'panel'      => 'startupx_general_panel',
	)
);

$wp_customize->add_setting( 'startupx_website_container',
	array(
		'default' 			=> 'container',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_RadioButtons( $wp_customize, 'startupx_website_container',
	array(
		'label' 		=> esc_html__( 'Container', 'startupx' ),
		'section' 		=> 'startupx_container_section',
		'choices' => array(
			'container' 		=> esc_html__( 'Fixed', 'startupx' ),
			'container-fluid' 	=> esc_html__( 'Full Width', 'startupx' ),
		),
		'priority'		  => 10
	)
) );