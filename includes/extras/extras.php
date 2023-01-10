<?php
/**
 * Enqueue admin scripts and styles.
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Startupx
 * @version     1.0.0
 *
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function startupx_public_scripts(){

	$defaults = json_encode(
		array(
			'font' 			=> 'System default',
			'regularweight' => 'regular',
			'category' 		=> 'sans-serif'
		)
	);	


    $startupx_site_width 				= '1170px'; 

	$startupx_primary_color			= get_theme_mod( 'startupx_website_primary_color', '#000000' );
	$startupx_secondary_color			= get_theme_mod( 'startupx_website_secondary_color', '#4E7661' );


	$font_body 						= json_decode( get_theme_mod( 'startupx_base_font', $defaults ), true );
	if ( 'System default' === $font_body['font'] ) {
		$startupx_base_fonts			= '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif';
	}else{
		$startupx_base_fonts			= $font_body['font'];
	}

	$startupx_desktop_logo_size = get_theme_mod( 'startupx_logo_size_desktop' , '250'). 'px';
	$startupx_tablet_logo_size = get_theme_mod( 'startupx_logo_size_tablet' , '175'). 'px';
	$startupx_mobile_logo_size = get_theme_mod( 'startupx_logo_size_mobile' , '125'). 'px';


	$startupx_base_font_size			= get_theme_mod('startupx_base_font_size_desktop', '16' ).'px';
	$startupx_base_tablet_font_size	= get_theme_mod('startupx_base_font_size_tablet', '14' ).'px';
	$startupx_base_mobile_font_size	= get_theme_mod('startupx_base_font_size_mobile', '14' ).'px';

	$startupx_base_font_weight = 'normal';
	if( isset( $font_body['regularweight'] ) ){
		$startupx_base_font_weight		= $font_body['regularweight'];
	}

	$startupx_base_font_style		= get_theme_mod('startupx_base_font_style', 'normal');
	$startupx_base_line_height 		= get_theme_mod( 'startupx_base_line_height', '1.4' );
	$startupx_base_letter_spacing 	= get_theme_mod( 'startupx_base_letter_spacing', '0' );
	$startupx_base_text_transform 	= get_theme_mod( 'sstartupx_base_text_transform', 'none' );


	$font_heading = json_decode( get_theme_mod( 'startupx_heading_font', $defaults ), true  ); 
	if ( 'System default' === $font_heading['font'] ) {
		$startupx_heading_fonts			= '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif';
	}else{
		$startupx_heading_fonts			= $font_heading['font'];
	}

	$startupx_heading_font_weight = 'bold';
	if( isset( $font_heading['boldweight'] ) ){
		$startupx_heading_font_weight		= $font_heading['boldweight'];
	}

	$startupx_heading_font_style		= get_theme_mod( 'startupx_heading_font_style', 'normal');
	$startupx_heading_line_height 		= get_theme_mod( 'startupx_heading_line_height', '1.4' );
	$startupx_heading_letter_spacing 	= get_theme_mod( 'startupx_heading_letter_spacing', '0' );
	$startupx_heading_text_transform 	= get_theme_mod( 'startupx_heading_text_transform', 'none' );

	$startupx_heading_fontsizeh1 			= get_theme_mod( 'startupx_heading_h1_font_size_desktop' , '40' );
	$startupx_heading_fontsizeh2			= get_theme_mod( 'startupx_heading_h2_font_size_desktop' , '32' );
	$startupx_heading_fontsizeh3			= get_theme_mod( 'startupx_heading_h3_font_size_desktop' , '28' );
	$startupx_heading_fontsizeh4			= get_theme_mod( 'startupx_heading_h4_font_size_desktop' , '24' );
	$startupx_heading_fontsizeh5			= get_theme_mod( 'startupx_heading_h5_font_size_desktop' , '20' );
	$startupx_heading_fontsizeh6			= get_theme_mod( 'startupx_heading_h6_font_size_desktop' , '16' );

	$startupx_heading_tablet_fontsizeh1 	= get_theme_mod( 'startupx_heading_h1_font_size_tablet' , '36' );
	$startupx_heading_tablet_fontsizeh2		= get_theme_mod( 'startupx_heading_h2_font_size_tablet' , '28' );
	$startupx_heading_tablet_fontsizeh3		= get_theme_mod( 'startupx_heading_h3_font_size_tablet' , '24' );
	$startupx_heading_tablet_fontsizeh4		= get_theme_mod( 'startupx_heading_h4_font_size_tablet' , '20' );
	$startupx_heading_tablet_fontsizeh5		= get_theme_mod( 'startupx_heading_h5_font_size_tablet' , '16' );
	$startupx_heading_tablet_fontsizeh6		= get_theme_mod( 'startupx_heading_h6_font_size_tablet' , '16' );
	

	$startupx_heading_mobile_fontsizeh1 	= get_theme_mod( 'startupx_heading_h1_font_size_mobile' , '28' );
	$startupx_heading_mobile_fontsizeh2		= get_theme_mod( 'startupx_heading_h2_font_size_mobile' , '22' );
	$startupx_heading_mobile_fontsizeh3		= get_theme_mod( 'startupx_heading_h3_font_size_mobile' , '18' );
	$startupx_heading_mobile_fontsizeh4		= get_theme_mod( 'startupx_heading_h4_font_size_mobile' , '16' );
	$startupx_heading_mobile_fontsizeh5		= get_theme_mod( 'startupx_heading_h5_font_size_mobile' , '16' );
	$startupx_heading_mobile_fontsizeh6		= get_theme_mod( 'startupx_heading_h6_font_size_mobile' , '16' );

	$startupx_form_border_color 			= get_theme_mod( 'startupx_border_color', '#cccccc' );
	$startupx_form_field_background			= get_theme_mod( 'startupx_form_field_background', '#ffffff' );

	$startupx_button_text_color				= get_theme_mod( 'startupx_button_text_color', '#ffffff' );
	$startupx_button_hover_text_color		= get_theme_mod( 'startupx_button_hover_color', '#ffffff' );
	

	$startupx_footer_text_color				=  get_theme_mod( 'startupx_footer_section_text_color', '#333333' );
	$startupx_footer_heading_color				=  get_theme_mod( 'startupx_footer_section_heading_color', '#222222' );
	$startupx_footer_background				=  get_theme_mod( 'startupx_footer_section_background', '#f8f8f8' );

	$startupx_footer_credit_color 			= get_theme_mod( 'startupx_footer_credits_color', '#333333' );
	$startupx_footer_credit_background 		= get_theme_mod( 'startupx_footer_credits_background', '#f8f8f8' );
	$startupx_footer_credit_link_color 		= get_theme_mod( 'startupx_footer_credits_link_color', '#7e7e7e' );
	$startupx_footer_credit_link_hover_color 	= get_theme_mod( 'startupx_footer_credits_link_hover_color', '#222222' );


    $startupx_custom_styles = "
		:root{
			--theme--site-width: $startupx_site_width;

			--theme--primary-color:		". esc_attr ( $startupx_primary_color ) .";
			--theme--secondary-color:	". esc_attr( $startupx_secondary_color ) .";

			--theme--website-base-font-size:		". absint( $startupx_base_font_size ) ."px;
			--theme--website-base-tablet-font-size: ". absint( $startupx_base_tablet_font_size ) ."px;
			--theme--website-base-mobile-font-size: ". absint( $startupx_base_mobile_font_size ) ."px;
			--theme--website-base-font-family:		". esc_attr ( $startupx_base_fonts ) .";
			--theme--website-base-font-weight:		". esc_attr ( $startupx_base_font_weight ) .";
			--theme--website-base-font-style:		". esc_attr ( $startupx_base_font_style ) .";
			--theme--website-base-line-height:		". esc_attr ( $startupx_base_line_height ) .";
			--theme--website-base-letter-spacing:	". esc_attr ( $startupx_base_letter_spacing ) ."px;
			--theme--website-base-text-transform:	". esc_attr ( $startupx_base_text_transform ) .";

			--theme--desktop-logo-size:	". absint( $startupx_desktop_logo_size ) ."px;
			--theme--tablet-logo-size:  ". absint( $startupx_tablet_logo_size ) ."px;
			--theme--mobile-logo-size:	". absint( $startupx_mobile_logo_size ) ."px;

			--theme--heading-size1:	". absint( $startupx_heading_fontsizeh1 ) ."px;
			--theme--heading-size2: ". absint( $startupx_heading_fontsizeh2 ) ."px;
			--theme--heading-size3: ". absint( $startupx_heading_fontsizeh3 ) ."px;
			--theme--heading-size4: ". absint( $startupx_heading_fontsizeh4 ) ."px;
			--theme--heading-size5: ". absint( $startupx_heading_fontsizeh5 ) ."px;
			--theme--heading-size6: ". absint( $startupx_heading_fontsizeh6 ) ."px;	

			--theme--heading-tablet-size1: ". absint( $startupx_heading_tablet_fontsizeh1 ) ."px;
			--theme--heading-tablet-size2: ". absint( $startupx_heading_tablet_fontsizeh2 ) ."px;
			--theme--heading-tablet-size3: ". absint( $startupx_heading_tablet_fontsizeh3 ) ."px;
			--theme--heading-tablet-size4: ". absint( $startupx_heading_tablet_fontsizeh4 ) ."px;
			--theme--heading-tablet-size5: ". absint( $startupx_heading_tablet_fontsizeh5 ) ."px;
			--theme--heading-tablet-size6: ". absint( $startupx_heading_tablet_fontsizeh6 ) ."px;

			--theme--heading-mobile-size1: ". absint( $startupx_heading_mobile_fontsizeh1 ) ."px;
			--theme--heading-mobile-size2: ". absint( $startupx_heading_mobile_fontsizeh2 ) ."px;
			--theme--heading-mobile-size3: ". absint( $startupx_heading_mobile_fontsizeh3 ) ."px;
			--theme--heading-mobile-size4: ". absint( $startupx_heading_mobile_fontsizeh4 ) ."px;
			--theme--heading-mobile-size5: ". absint( $startupx_heading_mobile_fontsizeh5 ) ."px;
			--theme--heading-mobile-size6: ". absint( $startupx_heading_mobile_fontsizeh6 ) ."px;

			--theme--website-heading-font-weight: ". esc_attr ( $startupx_heading_font_weight ) .";
			--theme--website-heading-font-style: ". esc_attr ( $startupx_heading_font_style ) .";
			--theme--website-heading-font-family: ". esc_attr ( $startupx_heading_fonts ) .";
			--theme--website-heading-line-height: ". esc_attr ( $startupx_heading_line_height ) .";
			--theme--website-heading-letter-spacing: ". esc_attr ( $startupx_heading_letter_spacing ) ."px;
			--theme--website-heading-text-transform: ". esc_attr ( $startupx_heading_text_transform ) .";

			--theme--form-border-color: ". esc_attr ( $startupx_form_border_color ) .";
			--theme--form-background-color: ". esc_attr ( $startupx_form_field_background ) .";

			--theme--button-text-color: ". esc_attr ( $startupx_button_text_color ) .";	
			--theme--button-text-hover-color: ". esc_attr ( $startupx_button_hover_text_color ) ."; 

			--theme--footer-color: ". esc_attr ( $startupx_footer_text_color ) .";
			--theme--footer-heading-color: ". esc_attr ( $startupx_footer_heading_color ) .";
			--theme--footer-background: ". esc_attr ( $startupx_footer_background ) .";

			--theme--credit-color: ". esc_attr ( $startupx_footer_credit_color ) .";
			--theme--credit-link-color: ". esc_attr ( $startupx_footer_credit_link_color ) .";
			--theme--credit-link-hover-color: ". esc_attr ( $startupx_footer_credit_link_hover_color ) .";
			--theme--credit-background: ". esc_attr ( $startupx_footer_credit_background ) .";
		}"; 

	
	wp_enqueue_style( 'startupx-google-fonts', startupx_google_fonts_url(), array(), STARTUPX_THEME_VERSION );
    wp_enqueue_style( 'startupx-theme-style', STARTUPX_THEME_URI . '/assets/public/css/theme.css', array(), STARTUPX_THEME_VERSION );
	wp_enqueue_style( 'startupx-media-style', STARTUPX_THEME_URI . '/assets/public/css/media.css', array(), STARTUPX_THEME_VERSION );
    wp_add_inline_style( 'startupx-theme-style', $startupx_custom_styles );


	wp_enqueue_script( 'navigation', STARTUPX_THEME_URI . '/assets/lib/navigation/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'skip-link-focus-fix', STARTUPX_THEME_URI . '/assets/lib/automattic/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'startupx_public_scripts' );