<?php
/**
 * Plugin Name: Hijri Date Shortcodes
 * Plugin URI: https://github.com/jvarn/hijri-date-shortcodes
 * Description: Adds shortcodes for converting between Gregorian and Hijri dates
 * Version: 0.2.3
 * Author: Jeremy Varnham
 * Author URI: https://abuyasmeen.com/
 *
 * @package jvarn\hijri-date-shortcodes
 */

namespace Jvarn;

// Prevent Direct Access.
if ( ! defined( 'ABSPATH' ) ) {
	wp_die();
}

/**
 * Loads external class (Hijri Date) Converter.
 *
 * @since 0.1.0
 */

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

