<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
* Get the timber species condition
* by location, fence type, height, timber species and shape
**/
class TMB_GetWidthCondition {
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
		$get_wp_data = new TMB_DataCondition;
		$get_wp_data->get($args);
		$data_wp_arr = $get_wp_data->getData();
		if($data_wp_arr){
			foreach($data_wp_arr->posts as $k => $v){
				$board_width = get_field('board_width', $v->ID);
				if($board_width){
					$data[] = $board_width;
				}
			}
		}

		sort($data);
		$result = array_unique($data);

		return $result;
  }

}//TMB_GetTimberSpeciesCondition
