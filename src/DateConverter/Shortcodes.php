<?php
/**
 * Class Shortcodes
 *
 * @package jvarn\hijri-date-shortcodes
 */

namespace Jvarn\DateConverter;

//use \GeniusTS\HijriDate\Hijri as Convert;
//use \GeniusTS\HijriDate\Date as Relative;

/**
 * Shortcode class.
 */
class Shortcodes {

	/**
	 * Construct.
	 */
	public function __construct() {
		add_shortcode( 'hijri_date', array( $this, 'make_shortcode' ) );
	}

	/**
	 * Shortcode init.
	 *
	 * Initializes the shortcode.
	 *
	 * @since 0.1.0
	 *
	 * @param array  $atts {
	 *   Required. Array of WP shortcode arguments.
	 *
	 *   @type string    $rel      Relative date. Default now. Accepts today, tomorrow, yesterday.
	 *   @type string    $gdate    Gregorian date string in yyyy-MM-dd format.
	 *   @type string    $hdate    Hijri date string in yyyy-MM-dd format.
	 * }
	 * @param string $content WP shortcode html contents. Default null.
	 */
	public function make_shortcode( $atts, $content = '' ) {
		$defaults = array(
			'rel'   => 'now',
			'gdate' => null,
			'hdate' => null,
		);

		$atts = \shortcode_atts(
			$defaults,
			$atts,
			'hijri-date-input'
		);

		if ( isset( $atts['gdate'] ) ) {
			return Hijri::convertToHijri( $atts['gdate'] );
		} elseif ( isset( $atts['hdate'] ) ) {
			$hstring = explode( '-', $atts['hdate'] );
			return \GeniusTS\HijriDate\Hijri::convertToGregorian( $hstring[2], $hstring[1], $hstring[0] );
		} else {
			switch ( $atts['rel'] ) {
				case 'now':
					return \GeniusTS\HijriDate\Date::now();
				case 'today':
					return \GeniusTS\HijriDate\Date::today();
				case 'tomorrow':
					return \GeniusTS\HijriDate\Date::tomorrow();
				case 'yesterday':
					return \GeniusTS\HijriDate\Date::yesterday();
			}
		}
	}
}
$hijri_date_shortcode = new Shortcodes();

