<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Startupx
 */

$startupx_page_layout 			= get_theme_mod( 'startupx_page_sidebar', 'none' );
$startupx_website_layout 			= get_theme_mod( 'startupx_website_container', 'container' );

/*Main container class*/
$startupx_main_class[] = 'main-container';
if ( $startupx_page_layout == 'none' ) {
	$startupx_main_class[] = 'no-sidebar';
} else {
	$startupx_main_class[] = $startupx_page_layout . '-sidebar has-sidebar';
}

$startupx_content_class   = array();
if( $startupx_page_layout == 'none' ) {
	$startupx_content_class[] 		= 'one-whole';
}else{
	$startupx_content_class[] = 'large--three-quarters medium--three-quarters small--one-whole';
}

$startupx_container_class = 'container';
if(  $startupx_website_layout === 'container-fluid' ){
	$startupx_container_class = 'container-fluid';
}

get_header();
?>

<div class="section-page section--page-template">
	<?php if( !is_front_page() ): ?>
	<div class="page-header-wrapper">
		<div class="<?php echo esc_attr( $startupx_container_class ); ?>">
			<div class="page-header entry-header">	
				<?php
					the_title( '<h1 class="entry-title">', '</h1>' );
					startupx_breadcrumb();
				?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="main-content <?php echo esc_attr( implode( ' ', $startupx_main_class ) ); ?>">
		<div class="<?php echo esc_attr( $startupx_container_class ); ?>">
			<div class="grid">
				<div id="primary" class="grid__item <?php echo esc_attr( implode( ' ', $startupx_content_class ) ); ?> content-area">
					<main id="main" class="site-main">

						<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div>
				<?php
					if( $startupx_page_layout == 'left' || $startupx_page_layout == 'right' ):
						get_sidebar();
					endif;
				?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
