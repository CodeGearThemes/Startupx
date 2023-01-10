<?php
/**
 * Customizer Control: Divider
 *
 * @package     Startupx
 * @author      CodeGearThemes
 * @copyright   Copyright (c) 2020, Startupx
 * @link        https://codegearthemes.com/
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Startupx_Control_Divider extends WP_Customize_Control {
		
	/**
	 * The type of control being rendered
	 */
	public $type = 'startupx-divider';

	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render the control in the customizer
	 */
	public function render_content() { ?>
		<hr class="item-divider divider">
	<?php
	}
}
