<?php
/**
 * Layout Customizer options
 *
 * @package Startupx
 */
/*--------------------------------------------
	Layout Panel
---------------------------------------------*/
$wp_customize->add_panel( 'startupx_layout_panel', 
    array(
        'title'          => esc_html__( 'Layout', 'startupx' ),
        'capability'     => 'edit_theme_options',
        'priority'       => 20,
    ) 
);

/*--------------------------------------------
	Archive Section
---------------------------------------------*/
$wp_customize->add_section( 'startupx_archive_section',
	array(
		'title'         => esc_html__( 'Archive layout', 'startupx'),
		'panel'         => 'startupx_layout_panel',
        'priority'      => 10,
	)
);

$wp_customize->add_setting('startupx_archive_tabs',
	array(
		'default'           => '',
		'sanitize_callback'	=> 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Tabs ( $wp_customize, 'startupx_archive_tabs',
		array(
			'label' 				=> esc_html__( 'Archive tabs', 'startupx'),
			'section'       		=> 'startupx_archive_section',
			'controls_general'		=> json_encode( array( '#customize-control-startupx_archive_layout', '#customize-control-startupx_archive_layout_divider', '#customize-control-startupx_archive_sidebar', '#customize-control-startupx_archive_sidebar_divider', '#customize-control-startupx_archives_grid_columns' ) ),
			'controls_design'		=> json_encode( array( '#customize-control-startupx_archive_title_size', '#customize-control-startupx_archive_meta_size' ) ),
		)
	)
);

/*--------------------------------------------
	Archive General
---------------------------------------------*/
$wp_customize->add_setting( 'startupx_archive_layout',
	array(
		'default'           => 'simple',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control( new Startupx_Control_RadioImage( $wp_customize, 'startupx_archive_layout',
		array(
			'label'    => esc_html__( 'Layout', 'startupx' ),
			'section'  => 'startupx_archive_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'simple' => array(
					'label' => esc_html__( 'Simple', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/simple.svg'
				),
				'grid' => array(
					'label' => esc_html__( 'Grid', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/grid.svg'
				)
			)
		)
	)
); 

$wp_customize->add_setting( 'startupx_archive_layout_divider',
	array(
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Divider( $wp_customize, 'startupx_archive_layout_divider',
		array(
			'section' 		=> 'startupx_archive_section',
		)
	)
);

$wp_customize->add_setting( 'startupx_archive_sidebar',
	array(
		'default'           => 'none',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control( new Startupx_Control_RadioImage( $wp_customize, 'startupx_archive_sidebar',
		array(
			'label'    => esc_html__( 'Sidebar', 'startupx' ),
			'section'  => 'startupx_archive_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'left' => array(
					'label' => esc_html__( 'Left Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/left-sidebar@2x.png'
				),
				'none' => array(
					'label' => esc_html__( 'No Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/fullwidth@2x.png'
                ),
                'right' => array(
					'label' => esc_html__( 'Right Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/right-sidebar@2x.png'
				)
			)
		)
	)
); 

$wp_customize->add_setting( 'startupx_archive_sidebar_divider',
	array(
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_Divider( $wp_customize, 'startupx_archive_sidebar_divider',
		array(
			'section' 		=> 'startupx_archive_section',
			'active_callback' 	=> 'startupx_archives_callback_grid'
		)
	)
);

$wp_customize->add_setting( 'startupx_archives_grid_columns',
	array(
		'default' 			=> '2',
		'sanitize_callback' => 'startupx_sanitize_text',

	)
);
$wp_customize->add_control( new Startupx_Control_RadioButtons( $wp_customize, 'startupx_archives_grid_columns',
	array(
		'label' 	=> esc_html__( 'Columns', 'startupx' ),
		'section' 	=> 'startupx_archive_section',
		'choices' 	=> array(
			'2' 		=> esc_html__( '2', 'startupx' ),
			'3' 		=> esc_html__( '3', 'startupx' ),
			'4' 		=> esc_html__( '4', 'startupx' ),
		),
		'active_callback' 	=> 'startupx_archives_callback_grid'
	)
) );

/*--------------------------------------------
	Archive Styling
---------------------------------------------*/
$wp_customize->add_setting( 'startupx_archive_title_size_desktop', array(
	'default'   		=> 18,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );			

$wp_customize->add_setting( 'startupx_archive_title_size_tablet', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_setting( 'startupx_archive_title_size_mobile', array(
	'default'   		=> 16,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );			


$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_archive_title_size',
	array(
		'label' 		=> esc_html__( 'Title size', 'startupx' ),
		'section' 		=> 'startupx_archive_section',
		'responsive'	=> true,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_archive_title_size_desktop',
			'size_tablet' 		=> 'startupx_archive_title_size_tablet',
			'size_mobile' 		=> 'startupx_archive_title_size_mobile',
		),
		'input_attrs' => array (
			'min'	=> 14,
			'max'	=> 100,
            'step'  => 1,
            'unit'  => 'px'
		)		
	)
) );

$wp_customize->add_setting( 'startupx_archive_meta_size', array(
	'default'   		=> 12,
	'transport'			=> 'postMessage',
	'sanitize_callback' => 'absint',
) );					


$wp_customize->add_control( new Startupx_Control_Slider( $wp_customize, 'startupx_archive_meta_size',
	array(
		'label' 		=> esc_html__( 'Meta size', 'startupx' ),
		'section' 		=> 'startupx_archive_section',
		'responsive'	=> false,
		'settings' 		=> array (
			'size_desktop' 		=> 'startupx_archive_meta_size',
		),
		'input_attrs' => array (
			'min'	=> 8,
			'max'	=> 72,
            'step'  => 1,
            'unit'  => 'px'
		)		
	)
) );


/*--------------------------------------------
	Posts Section
---------------------------------------------*/
$wp_customize->add_section( 'startupx_posts_section',
	array(
		'title'         => esc_html__( 'Posts layout', 'startupx'),
		'panel'         => 'startupx_layout_panel',
        'priority'      => 15,
	)
);

$wp_customize->add_setting( 'startupx_posts_sidebar',
	array(
		'default'           => 'right',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control( new Startupx_Control_RadioImage( $wp_customize, 'startupx_posts_sidebar',
		array(
			'label'    => esc_html__( 'Sidebar', 'startupx' ),
			'section'  => 'startupx_posts_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'left' => array(
					'label' => esc_html__( 'Left Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/left-sidebar@2x.png'
				),
				'none' => array(
					'label' => esc_html__( 'No Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/fullwidth@2x.png'
                ),
                'right' => array(
					'label' => esc_html__( 'Right Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/right-sidebar@2x.png'
				)
			)
		)
	)
); 

/*--------------------------------------------
	Page Section
---------------------------------------------*/
$wp_customize->add_section( 'startupx_page_section',
	array(
		'title'         => esc_html__( 'Page layout', 'startupx'),
		'panel'         => 'startupx_layout_panel',
        'priority'      => 20,
	)
);

$wp_customize->add_setting( 'startupx_page_sidebar',
	array(
		'default'           => 'none',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control( new Startupx_Control_RadioImage( $wp_customize, 'startupx_page_sidebar',
		array(
			'label'    => esc_html__( 'Sidebar', 'startupx' ),
			'section'  => 'startupx_page_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'left' => array(
					'label' => esc_html__( 'Left Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/left-sidebar@2x.png'
				),
				'none' => array(
					'label' => esc_html__( 'No Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/fullwidth@2x.png'
                ),
                'right' => array(
					'label' => esc_html__( 'Right Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/right-sidebar@2x.png'
				)
			)
		)
	)
);

/*--------------------------------------------
	Single Section
---------------------------------------------*/
$wp_customize->add_section( 'startupx_single_section',
	array(
		'title'         => esc_html__( 'Single layout', 'startupx'),
		'panel'         => 'startupx_layout_panel',
        'priority'      => 25,
	)
);

$wp_customize->add_setting( 'startupx_single_sidebar',
	array(
		'default'           => 'none',
		'sanitize_callback' => 'sanitize_key',
	)
);

$wp_customize->add_control( new Startupx_Control_RadioImage( $wp_customize, 'startupx_single_sidebar',
		array(
			'label'    => esc_html__( 'Sidebar', 'startupx' ),
			'section'  => 'startupx_single_section',
			'columns'  => 'one-half',
			'choices'  => array(
				'left' => array(
					'label' => esc_html__( 'Left Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/left-sidebar@2x.png'
				),
				'none' => array(
					'label' => esc_html__( 'No Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/fullwidth@2x.png'
                ),
                'right' => array(
					'label' => esc_html__( 'Right Sidebar', 'startupx' ),
					'url'   => '%s/assets/admin/src/layout/right-sidebar@2x.png'
				)
			)
		)
	)
);

$wp_customize->add_setting( 'startupx_single_heading_alignment',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'startupx_sanitize_text'
	)
);

$wp_customize->add_control( new Startupx_Control_RadioButtons( $wp_customize, 'startupx_single_heading_alignment',
	array(
		'label' 	=> esc_html__( 'Header alignment', 'startupx' ),
		'section' 	=> 'startupx_single_section',
		'choices' 	=> array(
			'left' 		=> esc_html__( 'Left', 'startupx' ),
			'center' 	=> esc_html__( 'Center', 'startupx' ),
		),
		'priority'  => 70
	)
) );


