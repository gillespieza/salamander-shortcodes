<?php
/**
 * Shortcode for creating a 10px high spacer (or other specified height).
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
 * Create a spacing div.
 *
 * Creates a div with specified height (default 10px) to pad space.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string HTML markup for the spacer.
 */
function sbs_display_spacer( $atts, $content = null ) {
	// Enqueue the stylesheet if needed.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Parse the provided attributes.
	$atts = shortcode_atts(
		array(
			'height' => '10',
		),
		$atts
	);

	$height = (int) $atts['height']; // Ensure height is an integer.

	// Generate and return the spacer markup.
	if ( $height > 0 ) {
		return "<div class='spacer' style='height: {$height}px'></div>";
	} else {
		return "<div class='spacer'></div>";
	}

}
add_shortcode( 'spacer', 'sbs_display_spacer' );
