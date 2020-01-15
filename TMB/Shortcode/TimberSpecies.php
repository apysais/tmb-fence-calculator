<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class TMB_Shortcode_TimberSpecies {
  /**
	 * instance of this class
	 *
	 * @since 0.0.1
	 * @access protected
	 * @var	null
	 * */
	protected static $instance = null;

	/**
	 * Return an instance of this class.
	 *
	 * @since     0.0.1
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		/*
		 * - Uncomment following lines if the admin class should only be available for super admins
		 */
		/* if( ! is_super_admin() ) {
			return;
		} */

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public function __construct()
	{
		add_shortcode( 'tmb_get_timber_species', [$this, 'init'] );
	}

	public function init($atts)
	{
		$a = shortcode_atts( array(

		), $atts );
		$timber = new TMB_TimberSpecies;

		$data['timber_species'] = $timber->get();

		ob_start();
		TMB_View::get_instance()->public_partials('timber-species.php', $data);
		return ob_get_clean();
	}

}//TMB_Shortcode_TimberSpecies
