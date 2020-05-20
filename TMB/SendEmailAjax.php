<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class TMB_SendEmailAjax {
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
    add_action( 'wp_ajax_send_email', [$this, 'get'] );
    add_action( 'wp_ajax_nopriv_send_email', [$this, 'get'] );
	}

  public function get()
  {

		$data = [
			'email_to' => isset($_POST['send_to_email']) ? $_POST['send_to_email'] : '',
			'selected_state' => isset($_POST['selected_state']) ? $_POST['selected_state'] : '',
			'type_fence' => isset($_POST['type_fence']) ? $_POST['type_fence'] : '',
			'fence_type_shape' => isset($_POST['fence_type_shape']) ? $_POST['fence_type_shape'] : '',
			'length' => isset($_POST['length']) ? $_POST['length'] : '',
			'height' => isset($_POST['height']) ? $_POST['height'] : '',
			'capping' => isset($_POST['capping']) ? $_POST['capping'] : '',
			'plinth' => isset($_POST['plinth']) ? $_POST['plinth'] : '',
			'timber_species' => isset($_POST['timber_species']) ? $_POST['timber_species'] : '',
			'width' => isset($_POST['width']) ? $_POST['width'] : '',
			'spacing'	=> isset($_POST['spacing']) ? $_POST['spacing'] : '',
			'overlap'	=> isset($_POST['overlap']) ? $_POST['overlap'] : '',
			'timber_units' => isset($_POST['calculate_timber_units']) ? $_POST['calculate_timber_units'] : 0,
			'vertical_fence_post' => isset($_POST['calculate_vertical_fence_post']) ? $_POST['calculate_vertical_fence_post'] : 0,
			'min_height_vertical_fence_post' => isset($_POST['calculate_min_height_vertical_fence_post']) ? $_POST['calculate_min_height_vertical_fence_post'] : 0,
			'timber_capping_units' => isset($_POST['calculate_timber_capping_units']) ? $_POST['calculate_timber_capping_units'] : 0,
			'fixings' => isset($_POST['calculate_fixings']) ? $_POST['calculate_fixings'] : 0,
			'overlapping_timber_units' => isset($_POST['calculate_overlapping_timber_units']) ? $_POST['calculate_overlapping_timber_units'] : 0,
			'horizontal_support' => isset($_POST['calculate_horizontal_support']) ? $_POST['calculate_horizontal_support'] : 0,
			'total_picket_pailing' => isset($_POST['calculate_total_picket_pailing']) ? $_POST['calculate_total_picket_pailing'] : 0,
		];
		if($data['fence_type_shape'] == 'gothic-tas'){
			$data['fence_type_shape'] = 'Gothic';
		}

		$data['selected_state'] = str_replace('-', ' / ', $data['selected_state']);

		$email_subject = 'Fence Calculator';
		$user_email = $data['email_to'];
		$headers[] = 'Content-Type: text/html; charset=UTF-8';

		ob_start();
		TMB_View::get_instance()->public_partials('mail/calculator.php', $data);
		$message = ob_get_contents();
    ob_end_clean();


    $ret = wp_mail($user_email, $email_subject, $message, $headers);

		$ret_msg = [
			'msg' => '',
			'status' => 0
		];

		if($ret){
			$ret_msg = [
				'msg' => 'Email Sent',
				'status' => 1
			];
		}
		echo json_encode($ret_msg);
    wp_die();
  }

}//TMB_SendEmail
