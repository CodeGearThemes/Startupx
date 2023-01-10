<?php
/**
 * Class to handle the header elements
 *
 * @package Startupx
 */

if ( !class_exists( 'Startupx_Header' ) ) :

    /**
	 * Startupx_Header 
	 */

    class Startupx_Header {

        /**
         * Instance
         */
        private static $instance;

        /**
         * Initiator
         */

        public static function get_instance(){
            if ( !isset( self::$instance ) ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'startupx_header', array( $this, 'header_markup' ) );
		}

         public function header_markup() {
			
            //Main header layout
			$header_layout		= get_theme_mod( 'startupx_main_header_layout', 'default' );
			get_template_part( 'template-parts/header/layout-header', $header_layout );

        }

        /**
		 * Main navigation
		*/
        
        public function main_navigation(){?>
            <div class="navigation header--main-navigation align--flex-center">
				<div id="header-navigation" class="header--desktop-navigation header-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-menu">
							<line x1="3" y1="12" x2="21" y2="12"/>
							<line x1="3" y1="6" x2="21" y2="6"/>
							<line x1="3" y1="18" x2="21" y2="18"/>
						</svg>
						<small class="screen-reader-text"><?php esc_html_e( 'Menu', 'startupx' ); ?></small>
					</button>
					<nav id="site-navigation" class="main-navigation">
						<button class="mobile-menu__toggle hide" aria-controls="primary-menu" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
								<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
							</svg>
							<small class="screen-reader-text"><?php esc_html_e( 'Close', 'startupx' ); ?></small>
						</button>
						<div class="navigation--desktop">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'main-menu',
									'menu_id'        => 'primary-menu',
								) );
							?>
						</div>
					</nav><!-- #site-navigation --> 
				</div>
			</div>
        <?php
        }

        /**
		 * Header button
		 */
		public function header_button() {

			$enable = get_theme_mod( 'startupx_enable_header_button', 1 );

			if ( !$enable ) {
				return;
			}

			$text 	= get_theme_mod( 'startupx_header_button_text', esc_html__( 'Get Started', 'startupx' ) );
			$url 	= get_theme_mod( 'startupx_header_button_url', '#' );

			echo '<div class="header-action-button"><a class="button btn-primary" href="' . esc_url( $url ) . '">' . esc_html( $text ) . '</a></div>';
		}

        /**
         * Header search
         */
        public function header_search() {

            $enable = get_theme_mod( 'startupx_enable_header_search', 1 );

            if ( !$enable ) {
                return;
            }
            get_search_form();
        }

    }

    
    /**
	 * Initialize class
	 */
	Startupx_Header::get_instance();

endif;