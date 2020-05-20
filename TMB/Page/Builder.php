<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class TMB_Page_Builder {
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

  public function getFieldsRepeat()
  {
    global $wp_query;
    if(is_front_page()){
      $frontpage_id = get_queried_object_id();
      $rows = get_field('builder');
      $data['rows'] = $rows;
      $data['frontpage_id'] = $frontpage_id;
      TMB_View::get_instance()->public_partials('builder/index.php', $data);
    }
  }


}//TMB_Page_Builder
