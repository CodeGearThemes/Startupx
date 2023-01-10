<?php
/**
 * Header Customizer options
 *
 * @package Startupx
 */

$wp_customize->add_panel( 'startupx_header_panel',
	array(
		'title'         => esc_html__( 'Header', 'startupx'),
		'priority'      => 10,
	)
);

/**
 * Site identity
 */
$wp_customize->add_setting( 'startupx_logo_size_desktop', array(
	'default'   		=> 250,
	'sanitize_callback' => 'absint',
) );			

$wp_customize->add_setting( 'startupx_logo_size_tablet', array(
	'default'   		=> 175,
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_logo_size_mobile', array(
	'default'   		=> 125,
	'sanitize_callback' => 'absint',
) );			


$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_logo_size',
	array(
		'label' 		=> esc_html__( 'Logo width', 'startupx' ),
		'section' 		=> 'title_tagline',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_logo_size_desktop',
			'size_tablet' 		=> 'startupx_logo_size_tablet',
			'size_mobile' 		=> 'startupx_logo_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 10,
			'max'	=> 500,
            'step'  => 1,
            'unit'  => 'px'
		)		
	)
) );


/**
 * Main header 
 */
$wp_customize->add_section(
	'startupx_main_header',
	array(
		'title'         => esc_html__( 'Main header', 'startupx' ),
		'priority'      => 10,
		'panel'			=> 'startupx_header_panel'
	)
);

$wp_customize->add_setting(
	'startupx_enable_header_transparent',
	array(
		'default'           => 0,
		'sanitize_callback' => 'startupx_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Startupx_Control_Switch(
		$wp_customize,
		'startupx_enable_header_transparent',
		array(
			'label'         	=> esc_html__( 'Enable Transparent Header', 'startupx' ),
			'section'       	=> 'startupx_main_header',
			'settings'      	=> 'startupx_enable_header_transparent',
		)
	)
);



//Layout
$wp_customize->add_setting(
	'startupx_main_header_layout',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control(
	new Startupx_Control_RadioImage(
		$wp_customize,
		'startupx_main_header_layout',
		array(
			'label'    		=> esc_html__( 'Main Header layout', 'startupx' ),
			'section'  => 'startupx_main_header',
			'columns'  => 'one-half',
			'choices'  => array(
				'default' => array(
					'label' => esc_html__( 'Default', 'startupx' ),
					'url'   => '%s/assets/admin/src/header/header-default.svg'
				),
				'centered' => array(
					'label' => esc_html__( 'Centered', 'startupx' ),
					'url'   => '%s/assets/admin/src/header/header-centered.svg'
				),				
			),
			'priority' 			=> 10,
		)
	)
); 


$wp_customize->add_setting(
	'startupx_enable_header_button',
	array(
		'default'           => 1,
		'sanitize_callback' => 'startupx_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Startupx_Control_Switch(
		$wp_customize,
		'startupx_enable_header_button',
		array(
			'label'         	=> esc_html__( 'Enable Header Button', 'startupx' ),
			'section'       	=> 'startupx_main_header',
			'settings'      	=> 'startupx_enable_header_button',
		)
	)
);

$wp_customize->add_setting(
	'startupx_header_button_text',
	array(
		'default'           => esc_html__( 'Get Started', 'startupx' ),
		'sanitize_callback' => 'startupx_sanitize_text',
	)
);
$wp_customize->add_control(
	'startupx_header_button_text',
	array(
		'label' 			=> esc_html__( 'Button Label', 'startupx' ),
		'section' 			=> 'startupx_main_header',
		'type' 				=> 'text',
		'active_callback' 	=> 'startupx_header_button_active_callback'
	)
);

$wp_customize->add_setting(
	'startupx_header_button_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'startupx_header_button_url',
	array(
		'label' 			=> esc_html__( 'Button Link', 'startupx' ),
		'section' 			=> 'startupx_main_header',
		'type' 				=> 'url',
		'active_callback' 	=> 'startupx_header_button_active_callback'
	)
);

$wp_customize->add_setting(
	'startupx_enable_header_search',
	array(
		'default'           => 1,
		'sanitize_callback' => 'startupx_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Startupx_Control_Switch(
		$wp_customize,
		'startupx_enable_header_search',
		array(
			'label'         	=> esc_html__( 'Enable Header Search', 'startupx' ),
			'section'       	=> 'startupx_main_header',
			'settings'      	=> 'startupx_enable_header_search',
			'active_callback' 	=> 'startupx_header_search_active_callback',
		)
	)
);

