<?php
/**
*
* Excerpt Length
* @since 1.0.0
*
*/
if ( ! function_exists( 'startupx_excerpt_length' ) ) :
	function startupx_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}
	    return 20;
	}
	add_filter( 'excerpt_length', 'startupx_excerpt_length', 100 );
endif;

if ( ! function_exists( 'startupx_excerpts_auto' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a option from customizer
	 *
	 * @return string option from customizer prepended with an ellipsis.
	 */
	function startupx_excerpts_auto( $link ) {
		if ( is_admin() ) {
			return $link;
		}
	    return sprintf( '<a class="read-more more-link" href="%1$s">%2$s</a>',
	        get_permalink( get_the_ID() ),
	        __( 'Read More', 'startupx' )
	    );
	}
endif;
add_filter( 'excerpt_more', 'startupx_excerpts_auto' );

if ( ! function_exists( 'startupx_breadcrumb' ) ) :
    function startupx_breadcrumb() {
        $breadcrumb_args = array(
            'container'   => 'nav',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
    }
endif;


if ( ! function_exists( 'startupx_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a option from customizer
	 *
	 * @return string option from customizer prepended with an ellipsis.
	 */
	function startupx_excerpt_more( $excerpt ) {
		if ( has_excerpt() && ! is_attachment() ) {
		    $link = sprintf( '<a class="read-more more-link" href="%1$s">%2$s</a>',
		        get_permalink( get_the_ID() ),
		        __( 'Read More', 'startupx' )
		    );
			$excerpt .= $link;
		}
		return $excerpt;
	}
endif;
add_filter( 'get_the_excerpt', 'startupx_excerpt_more' );

/**
 * Google Fonts URL
 */
function startupx_google_fonts_url() {
	$fonts_url 	= '';
	$subsets 	= 'latin';

	$defaults = json_encode(
		array(
			'font' 			=> 'System default',
			'regularweight' => 'regular',
			'mediumweight' => '500',
			'boldweight' => '700',
			'category' 		=> 'sans-serif'
		)
	);	

	//Get and decode options
	$body_font		= get_theme_mod( 'startupx_base_font', $defaults );
	$headings_font 	= get_theme_mod( 'startupx_heading_font', $defaults );

	$body_font 		= json_decode( $body_font, true );
	$headings_font 	= json_decode( $headings_font, true );

	if ( 'System default' === $body_font['font'] && 'System default' === $headings_font['font'] ) {
		return; //return early if defaults are active
	}

	$font_families = array();
		
	$font_families[] = $headings_font['font'] . ':' . $headings_font['regularweight'];
	$font_families[] = $body_font['font'] . ':' . $body_font['regularweight'];

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( $subsets ),
		'display' => urlencode( 'swap' ),
	);

	$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

	return esc_url_raw( $fonts_url );
}


/**
 * Google fonts preconnect
 */
function startupx_preconnect_google_fonts() {

	$defaults = json_encode(
		array(
			'font' 			=> 'System default',
			'regularweight' => 'regular',
			'category' 		=> 'sans-serif'
		)
	);	

	$startupx_body_fonts		= get_theme_mod( 'startupx-base-website-font', $defaults );
	$startupx_heading_fonts 	= get_theme_mod( 'startupx-heading-website-font', $defaults );

	$startupx_body_fonts 		= json_decode( $startupx_body_fonts, true );
	$startupx_heading_fonts 	= json_decode( $startupx_heading_fonts, true );

	if ( 'System default' === $startupx_body_fonts['font'] && 'System default' === $startupx_heading_fonts['font'] ) {
		return;
	}
	
	echo '<link rel="preconnect" href="//fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action( 'wp_head', 'startupx_preconnect_google_fonts', 1);


function startupx_copyright_cb(){
	
	/* translators: %1$1s, %2$2s theme copyright tags*/
	$credits 	= get_theme_mod( 'startupx_footer_credits', sprintf( __( '%1$1s. <small class="credit">Proudly powered by %2$2s</small>', 'startupx' ), '{copyright} {year} {site_title}', '{theme_author}' ) );

	$tags 		= array( '{theme_author}', '{site_title}', '{copyright}', '{year}' );
	$replace 	= array( '<a rel="nofollow" target="_blank" href="https://codegearthemes.com/products/startupx/">' . esc_html__( 'Startupx', 'startupx' ) . '</a>', get_bloginfo( 'name' ), '&copy;', date('Y') );

	$credits 	= str_replace( $tags, $replace, $credits );

	echo $credits;
}
add_action( 'startupx_footer_copyright', 'startupx_copyright_cb' );

function startupx_has_social_links(){

	$startupx_facebook_link 		= get_theme_mod('startupx_facebook_url', '');
	$startupx_twitter_link 			= get_theme_mod('startupx_twitter_url', '');
	$startupx_linkedin_link 		= get_theme_mod('startupx_linkedin_url', '');
	$startupx_instagram_link 		= get_theme_mod('startupx_instagram_url', '');
	$startupx_pinterest_link 		= get_theme_mod('startupx_pinterest_url', '');
	$startupx_youtube_link 			= get_theme_mod('startupx_youtube_url', '');
	if(	empty($startupx_facebook_link) && empty($startupx_twitter_link) && empty($startupx_linkedin_link) && empty($startupx_instagram_link) && empty($startupx_pinterest_link) && empty($startupx_youtube_link) ){
		return false;
	}

	return true;
}