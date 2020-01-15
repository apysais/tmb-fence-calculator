<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       tornmarketing.com.au
 * @since      1.0.0
 *
 * @package    Tmb_Fence_Calculator
 * @subpackage Tmb_Fence_Calculator/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Tmb_Fence_Calculator
 * @subpackage Tmb_Fence_Calculator/includes
 * @author     Torn Marketing <info@tornmarketing.com.au>
 */
class Tmb_Fence_Calculator_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tmb-fence-calculator',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
