<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Startupx
 */

get_header();

$startupx_single_layout 			= get_theme_mod( 'startupx_single_sidebar', 'none' );
$startupx_website_layout 			= get_theme_mod( 'startupx_website_container', 'container' );

/*Main container class*/
$startupx_main_class[] = 'main-container';
if ( $startupx_single_layout == 'none' ) {
	$startupx_main_class[] = 'no-sidebar';
} else {
	$startupx_main_class[] = $startupx_single_layout . '-sidebar has-sidebar';
}

$startupx_content_class   = array();
if( $startupx_single_layout == 'none' ) {
	$startupx_content_class[] 		= 'one-whole';
}elseif( $startupx_single_layout == 'centered' ){
	$startupx_content_class[] = 'large--two-thirds medium--three-fifths small--one-whole';
}else{
	$startupx_content_class[] = 'large--two-thirds medium--three-fifths small--one-whole';
	if( $startupx_single_layout === 'left' ){
		$startupx_content_class[] = 'omega';
	}else{
		$startupx_content_class[] = 'alpha';
	}
}

$startupx_container_class = 'container';
if(  $startupx_website_layout === 'container-fluid' ){
	$startupx_container_class = 'container-fluid';
}

?>
<div class="section-single section--single-template">
	<div class="main-content <?php echo esc_attr( implode( ' ', $startupx_main_class ) ); ?>">
		<div class="<?php echo esc_attr( $startupx_container_class ); ?>">
			<div class="grid">
				<div id="primary" class="grid__item <?php echo esc_attr( implode( ' ', $startupx_content_class ) ); ?> content-area">
					<main id="main" class="site-main">

						<?php
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/single/content', get_post_type() );
								the_post_navigation(
									array(
										'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'startupx' ) . '</span> <span class="nav-title">%title</span>',
										'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'startupx' ) . '</span> <span class="nav-title">%title</span>',
									)
								);
								

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div>
							
				<?php
					if( $startupx_single_layout == 'left' || $startupx_single_layout == 'right' ):
						get_sidebar();
					endif;
				?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
