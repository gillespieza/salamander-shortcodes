<?php
/**
 * Shortcode for creating styled dropcaps
 *
 * NOTE: This is obsolete now with Gutenberg Blocks.
 *
 * @package salamander-shortcodes
 */

// Security Check: Prevent this file being executed outside the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}


/**
 * Display dropcaps shortcode.
 *
 * Usage: [dropcap]T[/dropcap]his is the beginning.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string HTML markup for the dropcap.
 */
function sbs_dropcap( $atts, $content = null ) {

	// Enqueue the stylesheet. No need for the javascript.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	return '<span class="dropcap">' . esc_html( $content ) . '</span>';
}
add_shortcode( 'dropcap', 'sbs_dropcap' );
