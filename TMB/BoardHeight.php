<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class TMB_BoardHeight {
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

	}

  public function get($args = [])
  {
		$data = [];
		$get_wp_data = new TMB_LocationTypeShape;
		$get_wp_data->get($args);
		$data_wp_arr = $get_wp_data->getData();
		if($data_wp_arr){
			foreach($data_wp_arr->posts as $k => $v){
				$height = get_field('board_height', $v->ID);
				if($height){
					$data[] = $height;
				}
			}
		}

		sort($data);
		$result = array_unique($data);

		return $result;
  }

}//TMB_BoardHeightAjax
