<?php
/**
 * Shortcode for creating a styled horizontal rule.
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
 * Create a horizontal rule (HR) with specified class.
 *
 * You may use `dotted`, `dashed`, or `solid`, or insert your own CSS class.
 *
 * Usage: [hr] or [hr style="dashed"]
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string HTML markup for the HR element.
 */
function sbs_display_hr( $atts, $content = null ) {

	// Enqueue the stylesheet. No need for the javascript.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Parse the provided attributes.
	$atts = shortcode_atts(
		array(
			'style' => 'solid',  // Default style if not specified.
		),
		$atts
	);

	// Get the specified style, or default to 'solid'.
	$style = sanitize_html_class( $atts['style'] );

	// Generate and return the HR element.
	return '<hr class="' . esc_attr( $style ) . '" />';

}
add_shortcode( 'hr', 'sbs_display_hr' );
