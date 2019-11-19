<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class TMB_LocationTypeShapeAjax {
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
    add_action( 'wp_ajax_get_location_type_shape', [$this, 'get'] );
    add_action( 'wp_ajax_nopriv_get_location_type_shape', [$this, 'get'] );
	}

  public function get()
  {

		$data_wp_arr = TMB_BoardHeight::get_instance()->get($_POST);
    $data = [
      'post' => $_POST,
			'data' => $data_wp_arr
    ];
    echo json_encode($data);
    wp_die();
  }

}//TMB_LocationTypeShapeAjax
