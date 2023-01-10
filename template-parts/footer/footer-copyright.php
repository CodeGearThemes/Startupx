<?php

/**
 *
 * Footer copyright
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Startupx
 * @version     1.0.0
 *
 */
$startupx_has_social_links = startupx_has_social_links();

$startupx_classes = 'flex-center text-center';
if( $startupx_has_social_links ){
	$startupx_classes = 'flex-space';
}

?>
<div class="section-copyright <?php echo esc_attr( $startupx_classes ); ?> align--flex-center">

	<div class="site-info ">
		<p class="copyright no-margin">
			<?php do_action('startupx_footer_copyright'); ?>
		</p>
	</div>

	<?php do_action('startupx_social_profiles'); ?>
</div>