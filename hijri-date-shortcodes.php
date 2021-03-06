<?php
/*
Plugin Name: Hijri Date Shortcodes
Plugin URI: https://github.com/saudi-adhd-society/hijri-date-shortcodes
Description: Adds shortcodes for converting between Gregorian and Hijri dates
Version: 0.2.3
Author: Jeremy Varnham
Author URI: https://abuyasmeen.com/
*/

namespace jvarn\HijriDateShortcodes;

// Prevent Direct Access
if ( ! defined( 'ABSPATH' ) ) { 
	wp_die(); 
}

/**
 * loads external class (Hijri Date) Converter 
 *
 *	@since 0.1.0
 */
if ( ! class_exists( 'Converter' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php');
}

/**
 * Class Shortcodes
 *
 * @package jvarn\hijri-date-shortcodes
 */
class Shortcodes {

	public function __construct() {
		add_shortcode( 'hijri_date', array( $this, 'jlv_hijri_date_shortcode') );
	}

	public function jlv_hijri_date_shortcode( $atts, $content="" ) {
		extract( \shortcode_atts( 
			array( 
				'rel' => 'now', // now, today, tomorrow, yesterday
				'gdate' => null, // 2022-01-01
				'hdate' => null, // 1438-01-01
				), $atts ) );
	
		if ( isset( $gdate ) ) {
			return \GeniusTS\HijriDate\Hijri::convertToHijri($gdate);
		} else if ( isset( $hdate ) ) {
			$hstring = explode( '-', $hdate );
			return \GeniusTS\HijriDate\Hijri::convertToGregorian($hstring[2], $hstring[1], $hstring[0]);
		} else {
			switch ( $rel ) {
			    case 'now':
			        return \GeniusTS\HijriDate\Date::now();
			        break;
			    case 'today':
			        return \GeniusTS\HijriDate\Date::today();
			        break;
			    case 'tomorrow':
			        return \GeniusTS\HijriDate\Date::tomorrow();
			        break;
			    case 'yesterday':
			    	return \GeniusTS\HijriDate\Date::yesterday();
			        break;
			}
		}
	}
}
$HirjiDateShortcodes = new Shortcodes();
