<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
	$startupx_content_class[] = 'large--two-thirds medium--three-quarters small--one-whole';
}

$startupx_container_class = 'container';
if(  $startupx_website_layout === 'container-fluid' ){
	$startupx_container_class = 'container-fluid';
}

get_header();
?>
<div class="section-search section--search-template <?php echo esc_attr( implode( ' ', $startupx_main_class ) ); ?>">
	<div class="<?php echo esc_attr( $startupx_container_class ); ?>">
		<div class="grid">
			<div id="primary" class=" grid__item <?php echo esc_attr( implode( ' ', $startupx_content_class ) ); ?> content-area">
				<main id="main" class="site-main">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title">
								<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'startupx' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
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
<?php
get_footer();
