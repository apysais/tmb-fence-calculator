<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class TMB_ACF_Fields {
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
    add_filter('acf/load_field/name=fence_type', [$this, 'load_field']);
  }

  public function load_field($field )
  {
    $terms = get_terms([
      'taxonomy'   => 'fence-type',
      'hide_empty' => false,
    ]);
    if($terms){
      foreach($terms as $k => $v){
        $field['choices'][$v->term_id] = $v->name;
      }
    }
    return $field;
  }


}//TMB_ACF_Fields
