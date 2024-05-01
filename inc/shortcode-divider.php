<?php
/**
 * Shortcode for creating a divider with a "back to the top" hyperlink.
 *
 * @package salamander-shortcodes
 */

// Security Check: Prevent this file being executed outside the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}


/**
 * Display a divider with a link to the top of the page.
 *
 * @return string HTML markup for the divider.
 */
function sbs_backtotop_divider() {
	// Enqueue the stylesheet if needed.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Generate and return the divider markup.
	return '<div class="divider top clearfix text-right"><small><a href="#top">' . esc_html__( 'Back To Top', 'salamander_bootstrap_shortcodes' ) . '</a></small></div>';
}
add_shortcode( 'topdivider', 'sbs_backtotop_divider' );
