<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Startupx
 */
$startupx_archive_layout	= get_theme_mod( 'startupx_archive_layout', 'simple' );
$startupx_archive_sidebar_layout 			= get_theme_mod( 'startupx_archive_sidebar', 'none' );
$startupx_website_layout 			= get_theme_mod( 'startupx_website_container', 'container' );

/*Main container class*/
$startupx_main_class[] = 'main-container';
if ( $startupx_archive_sidebar_layout  == 'full' ) {
	$startupx_main_class[] = 'no-sidebar';
} else {
	$startupx_main_class[] = $startupx_archive_sidebar_layout  . '-sidebar has-sidebar';
}

$startupx_content_class   = array();
if( $startupx_archive_sidebar_layout == 'none' ) {
	$startupx_content_class[] 		= 'one-whole';
}else{
	$startupx_content_class[] = 'large--two-thirds medium--three-fifths small--one-whole';
}
$startupx_container_class = 'container';
if(  $startupx_website_layout === 'container-fluid' ){
	$startupx_container_class = 'container-fluid';
}

get_header();
?>
<div class="section-archive section--archive-template">
	<?php if ( have_posts() ) : ?>
	<div class="page-header">
		<div class="<?php echo esc_attr( $startupx_container_class ); ?>">
			<div class="grid">
				<div class="grid__item one-whole">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="main-content <?php echo esc_attr( implode( ' ', $startupx_main_class ) ); ?>">
		<div class="<?php echo esc_attr( $startupx_container_class ); ?>">
			<div class="grid">
				<div id="primary" class="grid__item <?php echo esc_attr( implode( ' ', $startupx_content_class ) ); ?> content-area">
					<main id="main" class="site-main grid">

						<?php 
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>

					</main><!-- #main -->
				</div>
				<?php
					if( $startupx_archive_sidebar_layout == 'left' || $startupx_archive_sidebar_layout == 'right' ):
						get_sidebar();
					endif;
				?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
