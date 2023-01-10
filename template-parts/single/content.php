<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Startupx
 */
$startupx_alignment_class = "text-center";
$startupx_single_post_thumb = 'no-thumbnails';
$startupx_single_title_align	= get_theme_mod( 'startupx_single_heading_alignment', 'center');

if( $startupx_single_title_align == 'left' ) {
	$startupx_alignment_class = "text-left";
}

if ( has_post_thumbnail() ) { 
	$startupx_single_post_thumb = 'has-thumbnails';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article-content'); ?>>
	<?php startupx_post_thumbnail(); ?>
	<header class="entry-header <?php echo esc_attr( $startupx_single_post_thumb ); ?>">
		<?php
			if ( 'post' === get_post_type() ) :
				startupx_single_postmeta();
			endif; 

			if ( is_singular() ) :
				the_title( '<h1 class="entry-title '.esc_attr($startupx_alignment_class).'">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title '.esc_attr($startupx_alignment_class).'"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'startupx' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'startupx' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php startupx_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php
		get_template_part( 'template-parts/snippets/content', 'author' );
		get_template_part( 'template-parts/snippets/content', 'related' );
		
	?>

</article><!-- #post-<?php the_ID(); ?> -->
