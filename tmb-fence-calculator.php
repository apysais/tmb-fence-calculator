<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              tornmarketing.com.au
 * @since             1.0.0
 * @package           Tmb_Fence_Calculator
 *
 * @wordpress-plugin
 * Plugin Name:       TM Bunning Fencing Calculator
 * Plugin URI:        tornmarketing.com.au
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Torn Marketing
 * Author URI:        tornmarketing.com.au
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tmb-fence-calculator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'TMB_FENCE_CALCULATOR_VERSION', '1.0.3' );
define( 'TRE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
/**
 * For autoloading classes
 * */
spl_autoload_register('tmb_directory_autoload_class');
function tmb_directory_autoload_class($class_name){
		if ( false !== strpos( $class_name, 'TMB' ) ) {
	 $include_classes_dir = realpath( get_template_directory( __FILE__ ) ) . DIRECTORY_SEPARATOR;
	 $admin_classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR;
	 $class_file = str_replace( '_', DIRECTORY_SEPARATOR, $class_name ) . '.php';
	 if( file_exists($include_classes_dir . $class_file) ){
		 require_once $include_classes_dir . $class_file;
	 }
	 if( file_exists($admin_classes_dir . $class_file) ){
		 require_once $admin_classes_dir . $class_file;
	 }
 }
}

function tmb_get_plugin_details(){
 // Check if get_plugins() function exists. This is required on the front end of the
 // site, since it is in a file that is normally only loaded in the admin.
 if ( ! function_exists( 'get_plugins' ) ) {
	 require_once ABSPATH . 'wp-admin/includes/plugin.php';
 }
 $ret = get_plugins();
 return $ret['tmb-fence-calculator/tmb-fence-calculator.php'];
}
function tmb_get_text_domain(){
 $ret = tmb_get_plugin_details();
 return $ret['TextDomain'];
}
function tmb_get_plugin_dir(){
 return plugin_dir_path( __FILE__ );
}
function tmb_get_plugin_dir_url(){
 return plugin_dir_url( __FILE__ );
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tmb-fence-calculator-activator.php
 */
function activate_tmb_fence_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tmb-fence-calculator-activator.php';
	Tmb_Fence_Calculator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tmb-fence-calculator-deactivator.php
 */
function deactivate_tmb_fence_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tmb-fence-calculator-deactivator.php';
	Tmb_Fence_Calculator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tmb_fence_calculator' );
register_deactivation_hook( __FILE__, 'deactivate_tmb_fence_calculator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tmb-fence-calculator.php';
require plugin_dir_path( __FILE__ ) . 'functions/wp.php';
require plugin_dir_path( __FILE__ ) . 'functions/page-builder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tmb_fence_calculator() {

	$plugin = new Tmb_Fence_Calculator();
	$plugin->run();

	TMB_ACF_Fields::get_instance();
	TMB_Shortcode_State::get_instance();
	TMB_Shortcode_FenceType::get_instance();
	TMB_Shortcode_FenceTypeShape::get_instance();
	TMB_Shortcode_TimberSpecies::get_instance();
	TMB_Shortcode_LengthHeightInput::get_instance();
	TMB_Shortcode_Capping::get_instance();
	TMB_Shortcode_Plinth::get_instance();
	TMB_Shortcode_WidthSpacingPalingOverlap::get_instance();
	TMB_Shortcode_BomInfo::get_instance();

	TMB_LocationTypeShapeAjax::get_instance();
	TMB_TimberSpeciesAjax::get_instance();
	TMB_WidthAjax::get_instance();
	TMB_PicketShapeAjax::get_instance();
	TMB_SendEmailAjax::get_instance();
}
//run_tmb_fence_calculator();

add_action('plugins_loaded', 'run_tmb_fence_calculator');

function tmb_wp_loaded()
{

}
add_action('wp', 'tmb_wp_loaded');

function tmb_dd($arr = []) {
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}
