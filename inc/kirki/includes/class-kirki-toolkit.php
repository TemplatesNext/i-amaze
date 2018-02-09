<?php
/**
 * The main Kirki object
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2015, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Early exit if the class already exists
if ( class_exists( 'Kirki_Toolkit' ) ) {
	return;
}

class Kirki_Toolkit {

	/** @var Kirki The only instance of this class */
	public static $instance = null;

	public static $version = '1.0.2';

	public $font_registry = null;
	public $scripts       = null;
	public $api           = null;
	public $styles        = array();

	/**
	 * Access the single instance of this class
	 * @return Kirki
	 */
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new Kirki_Toolkit();
		}
		return self::$instance;
	}

	/**
	 * Shortcut method to get the translation strings
	 */
	public static function i18n() {

		$i18n = array(
			'background-color'      => __( 'Background Color', 'i-amaze' ),
			'background-image'      => __( 'Background Image', 'i-amaze' ),
			'no-repeat'             => __( 'No Repeat', 'i-amaze' ),
			'repeat-all'            => __( 'Repeat All', 'i-amaze' ),
			'repeat-x'              => __( 'Repeat Horizontally', 'i-amaze' ),
			'repeat-y'              => __( 'Repeat Vertically', 'i-amaze' ),
			'inherit'               => __( 'Inherit', 'i-amaze' ),
			'background-repeat'     => __( 'Background Repeat', 'i-amaze' ),
			'cover'                 => __( 'Cover', 'i-amaze' ),
			'contain'               => __( 'Contain', 'i-amaze' ),
			'background-size'       => __( 'Background Size', 'i-amaze' ),
			'fixed'                 => __( 'Fixed', 'i-amaze' ),
			'scroll'                => __( 'Scroll', 'i-amaze' ),
			'background-attachment' => __( 'Background Attachment', 'i-amaze' ),
			'left-top'              => __( 'Left Top', 'i-amaze' ),
			'left-center'           => __( 'Left Center', 'i-amaze' ),
			'left-bottom'           => __( 'Left Bottom', 'i-amaze' ),
			'right-top'             => __( 'Right Top', 'i-amaze' ),
			'right-center'          => __( 'Right Center', 'i-amaze' ),
			'right-bottom'          => __( 'Right Bottom', 'i-amaze' ),
			'center-top'            => __( 'Center Top', 'i-amaze' ),
			'center-center'         => __( 'Center Center', 'i-amaze' ),
			'center-bottom'         => __( 'Center Bottom', 'i-amaze' ),
			'background-position'   => __( 'Background Position', 'i-amaze' ),
			'background-opacity'    => __( 'Background Opacity', 'i-amaze' ),
			'ON'                    => __( 'ON', 'i-amaze' ),
			'OFF'                   => __( 'OFF', 'i-amaze' ),
			'all'                   => __( 'All', 'i-amaze' ),
			'cyrillic'              => __( 'Cyrillic', 'i-amaze' ),
			'cyrillic-ext'          => __( 'Cyrillic Extended', 'i-amaze' ),
			'devanagari'            => __( 'Devanagari', 'i-amaze' ),
			'greek'                 => __( 'Greek', 'i-amaze' ),
			'greek-ext'             => __( 'Greek Extended', 'i-amaze' ),
			'khmer'                 => __( 'Khmer', 'i-amaze' ),
			'latin'                 => __( 'Latin', 'i-amaze' ),
			'latin-ext'             => __( 'Latin Extended', 'i-amaze' ),
			'vietnamese'            => __( 'Vietnamese', 'i-amaze' ),
			'serif'                 => _x( 'Serif', 'font style', 'i-amaze' ),
			'sans-serif'            => _x( 'Sans Serif', 'font style', 'i-amaze' ),
			'monospace'             => _x( 'Monospace', 'font style', 'i-amaze' ),
		);

		$config = apply_filters( 'kirki/config', array() );

		if ( isset( $config['i18n'] ) ) {
			$i18n = wp_parse_args( $config['i18n'], $i18n );
		}

		return $i18n;

	}

	/**
	 * Shortcut method to get the font registry.
	 */
	public static function fonts() {
		return self::get_instance()->font_registry;
	}

	/**
	 * Constructor is private, should only be called by get_instance()
	 */
	private function __construct() {
	}

}
