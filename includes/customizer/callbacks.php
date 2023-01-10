<?php
/**
 * Customizer callbacks
 *
 * @package Startupx
 */

/**
 * Archive Grid
 */
function startupx_archives_callback_grid() {
	$archive= get_theme_mod( 'startupx_archive_layout', 'simple' );

	if ( 'simple' !== $archive ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Top header active
 */
function startupx_top_header_active_callback() {
    $startupx_enable_top_header = get_theme_mod( 'startupx_enable_top_header' );

	if ( $startupx_enable_top_header ) {
		return true;
	} else {
		return false;
	}    
}

/**
 * Header centered Search 
 */

 function startupx_header_search_active_callback(){
	$layout = get_theme_mod( 'startupx_main_header_layout', 'default' );

	if( 'default' !== $layout ){
		return true;
	} else {
		return false;
	}
 }


/**
 * Header button
 */
function startupx_header_button_active_callback() {
    $enable = get_theme_mod( 'startupx_enable_header_button', 1 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	}    
}

/**
 * Header contact
 */
function startupx_header_contact_active_callback() {
    $enable = get_theme_mod( 'startupx_enable_header_contact', 0 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	}    
}
