<?php
/**
 *
 * Header Default Layout
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     startupx
 * @version     1.0.0
 *
 */

$startupx_header = new Startupx_Header();

?>
<div class="header--default-main header-main header-sticky header-ghost">
	<div class="site--header-inner">
		<div class="grid align--flex-center">
			<div class="grid__item large--one-quarter medium--one-half small--one-half">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
					<div class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
					<?php 
						$startupx_description = get_bloginfo( 'description', 'display' );
						if ( $startupx_description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $startupx_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
			</div>
			
			<div class="grid__item large--three-quarters medium--one-half small--one-half d-flex align--flex-center flex-end">
				<?php $startupx_header->main_navigation(); ?>
				<?php $startupx_header->header_button(); ?>
			</div>	
		</div>
	</div>
</div>