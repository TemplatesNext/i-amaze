<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'i-amaze' ),
				'background-image'      => esc_attr__( 'Background Image', 'i-amaze' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'i-amaze' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'i-amaze' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'i-amaze' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'i-amaze' ),
				'inherit'               => esc_attr__( 'Inherit', 'i-amaze' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'i-amaze' ),
				'cover'                 => esc_attr__( 'Cover', 'i-amaze' ),
				'contain'               => esc_attr__( 'Contain', 'i-amaze' ),
				'background-size'       => esc_attr__( 'Background Size', 'i-amaze' ),
				'fixed'                 => esc_attr__( 'Fixed', 'i-amaze' ),
				'scroll'                => esc_attr__( 'Scroll', 'i-amaze' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'i-amaze' ),
				'left-top'              => esc_attr__( 'Left Top', 'i-amaze' ),
				'left-center'           => esc_attr__( 'Left Center', 'i-amaze' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'i-amaze' ),
				'right-top'             => esc_attr__( 'Right Top', 'i-amaze' ),
				'right-center'          => esc_attr__( 'Right Center', 'i-amaze' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'i-amaze' ),
				'center-top'            => esc_attr__( 'Center Top', 'i-amaze' ),
				'center-center'         => esc_attr__( 'Center Center', 'i-amaze' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'i-amaze' ),
				'background-position'   => esc_attr__( 'Background Position', 'i-amaze' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'i-amaze' ),
				'on'                    => esc_attr__( 'ON', 'i-amaze' ),
				'off'                   => esc_attr__( 'OFF', 'i-amaze' ),
				'all'                   => esc_attr__( 'All', 'i-amaze' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'i-amaze' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'i-amaze' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'i-amaze' ),
				'greek'                 => esc_attr__( 'Greek', 'i-amaze' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'i-amaze' ),
				'khmer'                 => esc_attr__( 'Khmer', 'i-amaze' ),
				'latin'                 => esc_attr__( 'Latin', 'i-amaze' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'i-amaze' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'i-amaze' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'i-amaze' ),
				'arabic'                => esc_attr__( 'Arabic', 'i-amaze' ),
				'bengali'               => esc_attr__( 'Bengali', 'i-amaze' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'i-amaze' ),
				'tamil'                 => esc_attr__( 'Tamil', 'i-amaze' ),
				'telugu'                => esc_attr__( 'Telugu', 'i-amaze' ),
				'thai'                  => esc_attr__( 'Thai', 'i-amaze' ),
				'serif'                 => _x( 'Serif', 'font style', 'i-amaze' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'i-amaze' ),
				'monospace'             => _x( 'Monospace', 'font style', 'i-amaze' ),
				'font-family'           => esc_attr__( 'Font Family', 'i-amaze' ),
				'font-size'             => esc_attr__( 'Font Size', 'i-amaze' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'i-amaze' ),
				'line-height'           => esc_attr__( 'Line Height', 'i-amaze' ),
				'font-style'            => esc_attr__( 'Font Style', 'i-amaze' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'i-amaze' ),
				'top'                   => esc_attr__( 'Top', 'i-amaze' ),
				'bottom'                => esc_attr__( 'Bottom', 'i-amaze' ),
				'left'                  => esc_attr__( 'Left', 'i-amaze' ),
				'right'                 => esc_attr__( 'Right', 'i-amaze' ),
				'center'                => esc_attr__( 'Center', 'i-amaze' ),
				'justify'               => esc_attr__( 'Justify', 'i-amaze' ),
				'color'                 => esc_attr__( 'Color', 'i-amaze' ),
				'add-image'             => esc_attr__( 'Add Image', 'i-amaze' ),
				'change-image'          => esc_attr__( 'Change Image', 'i-amaze' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'i-amaze' ),
				'add-file'              => esc_attr__( 'Add File', 'i-amaze' ),
				'change-file'           => esc_attr__( 'Change File', 'i-amaze' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'i-amaze' ),
				'remove'                => esc_attr__( 'Remove', 'i-amaze' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'i-amaze' ),
				'variant'               => esc_attr__( 'Variant', 'i-amaze' ),
				'subsets'               => esc_attr__( 'Subset', 'i-amaze' ),
				'size'                  => esc_attr__( 'Size', 'i-amaze' ),
				'height'                => esc_attr__( 'Height', 'i-amaze' ),
				'spacing'               => esc_attr__( 'Spacing', 'i-amaze' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'i-amaze' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'i-amaze' ),
				'light'                 => esc_attr__( 'Light 200', 'i-amaze' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'i-amaze' ),
				'book'                  => esc_attr__( 'Book 300', 'i-amaze' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'i-amaze' ),
				'regular'               => esc_attr__( 'Normal 400', 'i-amaze' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'i-amaze' ),
				'medium'                => esc_attr__( 'Medium 500', 'i-amaze' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'i-amaze' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'i-amaze' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'i-amaze' ),
				'bold'                  => esc_attr__( 'Bold 700', 'i-amaze' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'i-amaze' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'i-amaze' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'i-amaze' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'i-amaze' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'i-amaze' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'i-amaze' ),
				'add-new'           	=> esc_attr__( 'Add new', 'i-amaze' ),
				'row'           		=> esc_attr__( 'row', 'i-amaze' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'i-amaze' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'i-amaze' ),
				'back'                  => esc_attr__( 'Back', 'i-amaze' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'i-amaze' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'i-amaze' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'i-amaze' ),
				'none'                  => esc_attr__( 'None', 'i-amaze' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'i-amaze' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'i-amaze' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'i-amaze' ),
				'initial'               => esc_attr__( 'Initial', 'i-amaze' ),
				'select-page'           => esc_attr__( 'Select a Page', 'i-amaze' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'i-amaze' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'i-amaze' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'i-amaze' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'i-amaze' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
