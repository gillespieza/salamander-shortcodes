<?php
/**
 * Shortcode for creating a permalink to a post or page ID.
 *
 * @package salamander-shortcodes
 */

// Security Check: Prevent this file being executed outside the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}


/**
 * Generate a permalink anchor tag shortcode.
 *
 * This function generates an anchor tag with the permalink of the specified post or the current post if no ID is provided.
 *
 * @param array $atts {
 *     Array of attributes for the shortcode.
 *
 *     @type int    $id     Optional. Post ID. Default is null (current post).
 *     @type string $target Optional. Target attribute for the anchor tag. Default is an empty string.
 *     @type string $class  Optional. Class attribute for the anchor tag. Default is an empty string.
 *     @type string $rel    Optional. Rel attribute for the anchor tag. Default is an empty string.
 *     @type string $title  Optional. Title attribute for the anchor tag. Default is an empty string (post title).
 *     @type string $text   Optional. Text content for the anchor tag. Default is an empty string (post title).
 * }
 * @return string The generated anchor tag.
 */
function sbs_display_permalink( $atts ) {

	// Default attributes.
	$defaults = array(
		'id'     => null,
		'target' => '',
		'class'  => '',
		'rel'    => '',
		'title'  => '',
		'text'   => '',
	);

	// Parse the provided attributes.
	$atts = shortcode_atts( $defaults, $atts );

	// If no ID is provided, use the current post ID.
	if ( empty( $atts['id'] ) ) {
		$atts['id'] = get_the_ID();
	}

	// Start building the HTML anchor tag.
	$output = sprintf( '<a href="%s"', esc_url( get_permalink( $atts['id'] ) ) );

	// Add target attribute if provided.
	if ( ! empty( $atts['target'] ) ) {
		$output .= sprintf( ' target="%s"', esc_attr( $atts['target'] ) );
	}

	// Add class attribute if provided.
	if ( ! empty( $atts['class'] ) ) {
		$output .= sprintf( ' class="%s"', esc_attr( $atts['class'] ) );
	}

	// Add rel attribute if provided.
	if ( ! empty( $atts['rel'] ) ) {
		$output .= sprintf( ' rel="%s"', esc_attr( $atts['rel'] ) );
	}

	// Add title attribute if provided, otherwise use post title.
	$title   = ! empty( $atts['title'] ) ? esc_attr( $atts['title'] ) : esc_attr( get_the_title( $atts['id'] ) );
	$output .= sprintf( ' title="%s"', $title );

	// Add link text if provided, otherwise use post title.
	$text    = ! empty( $atts['text'] ) ? esc_html( $atts['text'] ) : esc_html( get_the_title( $atts['id'] ) );
	$output .= sprintf( '>%s', $text );

	// Close anchor tag.
	$output .= '</a>';

	return $output;
}
add_shortcode( 'permalink', 'sbs_display_permalink' );
