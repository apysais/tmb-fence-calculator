<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class TMB_DataCondition {
  /**
	 * instance of this class
	 *
	 * @since 0.0.1
	 * @access protected
	 * @var	null
	 * */
	protected static $instance = null;

  private $wp_query_data;
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

    $query_args = [
      'post_type' => 'fence',
      'post_status' => 'publish',
			'posts_per_page'=> -1
    ];

    $location = '';
    if(isset($args['location'])){
      $location = $args['location'];
      $query_args['tax_query'][] = [
        'taxonomy' => 'au-state',
        'field'    => 'slug',
        'terms'    => $location,
      ];
    }

    $fence_type = '';
    if(isset($args['fence_type'])){
      $fence_type = $args['fence_type'];
      $query_args['tax_query'][] = [
        'taxonomy' => 'fence-type',
        'field'    => 'slug',
        'terms'    => $fence_type,
      ];
    }

    if($fence_type != 'pailing'){
      $fence_shape = '';
      if(isset($args['fence_shape'])){
        $fence_shape = $args['fence_shape'];
        $query_args['tax_query'][] = [
          'taxonomy' => 'picket-shapes',
          'field'    => 'slug',
          'terms'    => $fence_shape,
        ];
      }
    }

		if(isset($args['board_height'])){
			$board_height = $args['board_height'];
			$query_args['meta_query'][] = [
				'key' 	=> 'board_height',
				'value' => $board_height,
			];
		}

		if(isset($args['timber_species'])){
			$timber_species = $args['timber_species'];
			$query_args['tax_query'][] = [
				'taxonomy' => 'timber-species',
				'field'    => 'slug',
				'terms'    => $timber_species,
			];
		}

		//tmb_dd($query_args);
    $query = new WP_Query( $query_args );

    if ( $query->have_posts() ) {
        wp_reset_postdata();
        $this->setData($query);
    }
    return false;
  }

  public function setData($query)
  {
    $this->wp_query_data = $query;
  }

  public function getData()
  {
    return $this->wp_query_data;
  }


}//TMB_DataCondition
