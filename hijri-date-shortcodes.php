<?php
/**
 * Plugin Name: Hijri Date Shortcodes
 * Plugin URI: https://github.com/jvarn/hijri-date-shortcodes
 * Description: Adds shortcodes for converting between Gregorian and Hijri dates
 * Version: 0.2.5
 * Author: Jeremy Varnham
 * Author URI: https://abuyasmeen.com/
 *
 * @package jvarn\hijri-date-shortcodes
 */

namespace Jvarn;

/**
 * No direct access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	wp_die();
}

/**
 * Define plugin constants.
 */
define( 'WP_HIJRI_DATE_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP_HIJRI_DATE_DIR', dirname( plugin_basename( __FILE__ ) ) );

/**
 * Load plugin textdomain.
 */
function load_textdomain() {
	load_plugin_textdomain( 'hirji-date-shortcodes', false, WP_HIJRI_DATE_DIR . '/languages' );
}
add_action( 'init', 'Jvarn\load_textdomain' );

/**
 * Composer autoloader.
 */
require_once WP_HIJRI_DATE_PATH . 'vendor/autoload.php';

