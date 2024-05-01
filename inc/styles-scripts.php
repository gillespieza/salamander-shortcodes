<?php
/**
 * Load Bootstrap 3 and custom stylesheet.
 *
 * @package salamander-shortcodes
 */

// Security Check: Prevent this file being executed outside the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * Register and enqueue the stylesheet for the front end.
 *
 * Registers the plugin's stylesheet and enqueues it.
 *
 * @since 1.0.0
 *
 * @see wp_register_script()
 * @see wp_register_style()
 * @link http://www.w3.org/TR/CSS2/media.html#media-types List of CSS media types.
 * @param string      $handle Name of the stylesheet.
 * @param string|bool $src    Path to the stylesheet from the WordPress root directory. Example: '/css/mystyle.css'.
 * @param array       $deps   An array of registered style handles this stylesheet depends on. Default empty array.
 * @param string|bool $ver    String specifying the stylesheet version number. Used to ensure that the correct version
 *                            is sent to the client regardless of caching. Default 'false'. Accepts 'false', 'null', or 'string'.
 * @param string      $media  Optional. The media for which this stylesheet has been defined.
 *                            Default 'all'. Accepts 'all', 'aural', 'braille', 'handheld', 'projection', 'print',
 *                            'screen', 'tty', or 'tv'.
 *
 * @todo: enqueue styles in individual shortcodes so the CSS is only loaded when needed
 *
 * @return void
 */
function sbs_styles_init() {
	wp_register_style( 'sbs-style', plugins_url( '/salamander-shortcodes.css', __FILE__ ), false, '1.0' );
	// wp_enqueue_style( 'sbs-style' );

	// Register other scripts and styles.
	wp_register_script( 'bootstrap-3', 'https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js', array( 'jquery' ), '3.4.1', true );
	wp_register_style( 'bootstrap-3', 'https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css', array(), '3.4.1', 'all' );

}
add_action( 'wp_enqueue_scripts', 'sbs_styles_init' );
