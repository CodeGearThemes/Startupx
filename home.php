<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Startupx
 */

$startupx_post_layout 			= get_theme_mod( 'startupx_posts_sidebar', 'right' );
$startupx_website_layout 		= get_theme_mod( 'startupx_website_container', 'container' );

/*Main container class*/
$startupx_main_class[] = 'main-container';
if ( $startupx_post_layout == 'none' ) {
	$startupx_main_class[] = 'no-sidebar';
} else {
	$startupx_main_class[] = $startupx_post_layout . '-sidebar has-sidebar';
}

$startupx_content_class   = array();
if( $startupx_post_layout == 'none' ) {
	$startupx_content_class[] 		= 'one-whole';
}
else{
	$startupx_content_class[] = 'large--two-thirds medium--three-fifths small--one-whole';
}

$startupx_container_class = 'container';
if(  $startupx_website_layout === 'container-fluid' ){
	$startupx_container_class = 'container-fluid';
}

get_header();
?>
<div class="section-index section--index-template">
	<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
	<div class="page-header">
		<div class="<?php echo esc_attr( $startupx_container_class ); ?>">
			<div class="grid">
				<div class="grid__item one-whole">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
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

								the_posts_navigation(
									array(
										'prev_text' => __( 'Previous Posts', 'startupx' ),
										'next_text' => __( 'Next Posts', 'startupx' ),
									)
								);

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>

					</main><!-- #main -->
				</div>
				<?php
					if( $startupx_post_layout == 'left' || $startupx_post_layout == 'right' ):
						get_sidebar();
					endif;
				?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
