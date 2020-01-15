<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
* Get the timber species condition
* by location, fence type and height
**/
class TMB_GetTimberSpeciesCondition {
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
			$old_timber_species = '';
			foreach($data_wp_arr->posts as $k => $v){
				$timber_species = get_the_terms( $v->ID, 'timber-species' );

				if($timber_species){
					foreach($timber_species as $tax_k => $tax_v){
						$img = get_field('image', $tax_v);
						$card_img = tmb_get_tax_acf_img($img);
						$data[$tax_v->term_id] = [
							'id' 		=> $tax_v->term_id,
							'image' => $card_img,
							'slug' 	=> $tax_v->slug,
							'name' 	=> $tax_v->name,
						];
					}

				}

			}

		}

		return $data;
  }

}//TMB_GetTimberSpeciesCondition
