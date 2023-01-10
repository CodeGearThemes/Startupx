<?php
/**
 * Startupx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Startupx
 * @version     1.0.6
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
if ( ! defined( 'STARTUPX_THEME_VERSION' ) ) 
	define( 'STARTUPX_THEME_VERSION', '1.0.6' );
	define( 'STARTUPX_THEME_DIR', trailingslashit( get_template_directory() ) );
	define( 'STARTUPX_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

if ( ! function_exists( 'startupx_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function startupx_setup(){
	
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Startupx, use a find and replace
		* to change 'startupx' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'startupx', get_template_directory() . '/languages' );

		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		   * Let WordPress manage the document title.
		   * By adding theme support, we declare that this theme does not use a
		   * hard-coded <title> tag in the document head, and expect WordPress to
		   * provide it for us.
		   */
		add_theme_support( 'title-tag' );

		/*
		   * Enable support for Post Thumbnails on posts and pages.
		   *
		   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		   */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary Menu', 'startupx' )
		) );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background',
			apply_filters(
				'startupx_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support('editor-styles');

		/**
		 * Editor font sizes
		 */
		add_theme_support( 'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'startupx' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'startupx' ),
					'size'      => 14,
					'slug'      => 'small',
				),				
				array(
					'name'      => esc_html__( 'Normal', 'startupx' ),
					'shortName' => esc_html_x( 'N', 'Font size', 'startupx' ),
					'size'      => 16,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'startupx' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'startupx' ),
					'size'      => 18,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Larger', 'startupx' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'startupx' ),
					'size'      => 24,
					'slug'      => 'larger',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'startupx' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'startupx' ),
					'size'      => 32,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'startupx' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'startupx' ),
					'size'      => 48,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'startupx' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'startupx' ),
					'size'      => 64,
					'slug'      => 'gigantic',
				),
			)
		);		

		/**
		 * Responsive embeds
		 */
		add_theme_support( 'responsive-embeds' );

		/*
		* Styles the visual editor to resemble the theme style
		*
		*/
		add_editor_style( trailingslashit( get_template_directory_uri() ) . 'assets/admin/css/editor-style.css' );

	}
endif;
add_action( 'after_setup_theme', 'startupx_setup' );

update_option( 'elementor_onboarded', true );

/**
 * Disable Elementor default schemes
 */
function startupx_set_elementor_defaults() {
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
	update_option( 'elementor_container_width', 1160 );
}
add_action( 'after_switch_theme', 'startupx_set_elementor_defaults' );

function startupx_widgets_init(){

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'startupx' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'startupx' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar(array(
		'name' => esc_html__('Footer I', 'startupx'),
		'id' => 'footer-column-1',
		'description' => esc_html__('Add widgets here to display to displays content on the footer section.', 'startupx'),
		'before_widget' => '<div id="%1$s" class="widget widget_recent_entries %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

	register_sidebar(array(
		'name' => esc_html__('Footer II', 'startupx'),
		'id' => 'footer-column-2',
		'description' => esc_html__('Add widgets here to display to displays content on the footer section.', 'startupx'),
		'before_widget' => '<div id="%1$s" class="widget widget_recent_entries %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

	register_sidebar(array(
		'name' => esc_html__('Footer III', 'startupx'),
		'id' => 'footer-column-3',
		'description' => esc_html__('Add widgets here to display to displays content on the footer section.', 'startupx'),
		'before_widget' => '<div id="%1$s" class="widget widget_recent_entries %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

	register_sidebar(array(
		'name' => esc_html__('Footer IV', 'startupx'),
		'id' => 'footer-column-4',
		'description' => esc_html__('Add widgets here to display to displays content on the footer section.', 'startupx'),
		'before_widget' => '<div id="%1$s" class="widget widget_recent_entries %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));

}
add_action( 'widgets_init', 'startupx_widgets_init' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Autoload
 */
require_once get_parent_theme_file_path( 'vendor/autoload.php' );

/**
 * Theme dashboard.
 */
require get_template_directory() . '/theme-dashboard/class-theme-dashboard.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/functions/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/functions/theme-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/functions/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Header
 */
require get_template_directory() . '/includes/class_startupx_header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/extras/extras.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/config/jetpack/jetpack.php';
}

/**
 * Breadcrumb
 */
require get_template_directory() . '/config/breadcrumb/breadcrumb.php';


