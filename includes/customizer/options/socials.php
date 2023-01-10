<?php

/**
 * Social Customizer options
 *
 * @package Startupx
 */
/*--------------------------------------------
	#Social 
---------------------------------------------*/
$wp_customize->add_panel(
    'startupx_social_panel',
    array(
        'title' => esc_html__('Social Profiles', 'startupx'),
        'description' => esc_html__('Social settings', 'startupx'),
        'priority' => 15,
    )
);

$wp_customize->add_section('startupx_social_section', array(
    'title'          => esc_html__('Social Links', 'startupx'),
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'panel'             => 'startupx_social_panel',
    'priority'       => 10,
));

$startupx_social_icons = array('facebook', 'twitter', 'linkedin', 'instagram', 'youtube');
foreach ($startupx_social_icons as $icon) {
    $label = ucfirst($icon);
    $wp_customize->add_setting('startupx_' . $icon . '_url', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('startupx_' . $icon . '_url', array(
        'label'         => esc_html($label),
        'type'          => 'url',
        'section'       => 'startupx_social_section',
    ));
}
