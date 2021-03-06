<?php
/*
	Plugin Name: WP Less Compiler
	Plugin URI: http://www.thejakegroup.com
	Author: Tyler Bruffy
	Description: Compiles LESS into CSS.  Allows the administrator to output LESS to Admin users, and CSS to everyone else.
*/

if( ! defined('DS') ) {
	define('DS', DIRECTORY_SEPARATOR);
}

require_once( "Controller.php" );

class PluginObject {
	const DB_VERSION    = "1.0";
	const PREFIX        = "wlc_";
	const LESS_JS_VER   = "1.3.3.min";
	const LESS_PHP_VER  = "0.3.8";

	public static $plugin_url;
	public static $plugin_path;
	public static $template_url;
	public static $template_path;

	function plugin_info() {
		self::$template_path = get_template_directory();
		self::$template_url  = get_template_directory_uri();
		self::$plugin_path   = plugin_dir_path(__FILE__);
		self::$plugin_url    = plugins_url('', __FILE__);
	}

	protected function _get_wp_option( $option ) {
		return get_option( self::PREFIX.$option );
	}

	protected function _set_wp_option( $option, $value ) {
		return update_option( self::PREFIX.$option, $value );
	}


}

new Controller();

?>