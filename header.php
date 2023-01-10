<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Startupx
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Mobile Specific Metas -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="640">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>
<?php 
	$startupx_website_layout 		= get_theme_mod( 'startupx_website_container', 'container' );
	$startupx_container_class = 'container';
	if(  $startupx_website_layout === 'container-fluid' ){
		$startupx_container_class = 'container-fluid';
	}
	$startupx_header_is_transparent	=	get_theme_mod( 'startupx_enable_header_transparent', 0 );
	$startupx_transparent_class	=	'';
	if( $startupx_header_is_transparent ){
		$startupx_transparent_class	= 'transparent-header';
	}
	$header_layout		= get_theme_mod( 'startupx_main_header_layout', 'default' ); 
?>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'startupx' ); ?></a>
    <div class="wrapper">
		<header id="masthead" class="site-header <?php echo esc_attr( $startupx_transparent_class ); ?>">
			<div class="<?php echo esc_attr( $startupx_container_class ); ?>">
				<?php do_action( 'startupx_header' ); ?>
			</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content">