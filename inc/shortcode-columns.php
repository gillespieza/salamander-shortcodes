<?php
/**
 * Shortcode for creating various Bootstrap 3 columns
 *
 * @package salamander-shortcodes
 */

// Security Check: Prevent this file being executed outside the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}


/**
 * Display columns shortcode.
 *
 * Usage: [one_half]Some text.[/one_half][one_half_last]More text.[/one_half_last]
 *   Variations of: one_half, one_third, two_thirds, one_quarter, three_quarters, one_fifth
 *   The last box should always be your_fraction_last, eg one_half_last, three_quarters_last
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @param string $tag     Shortcode tag.
 * @return string HTML markup for the columns.
 */
function sbs_columns( $atts, $content = null, $tag ) {

	// Enqueue the stylesheet. No need for the javascript.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Extract shortcode attributes.
	$atts = shortcode_atts(
		array(
			'class' => '',
			'style' => '',
		),
		$atts
	);

	// Set class attribute if specified.
	$class_attr = ( ! empty( $atts['class'] ) ) ? ' ' . esc_attr( $atts['class'] ) : '';

	// Set style attribute if specified.
	$style_attr = ( ! empty( $atts['style'] ) ) ? ' style="' . esc_attr( $atts['style'] ) . '"' : '';

	// Check if the shortcode tag contains '_last' to add a "last" class.
	$last = ( strpos( $tag, '_last' ) !== false ) ? ' last' : '';

	// Remove '_last' from the tag.
	$tag = str_replace( '_last', '', $tag );

	// Generate and return the columns markup.
	$output = '<div class="' . esc_attr( $tag . $last . $class_attr ) . '"' . $style_attr . '>' . do_shortcode( $content ) . '</div>';
	return $output;
}

// Define column tags.
$column_tags = array(
	'one_half',
	'one-third',
	'two-thirds',
	'one-quarter',
	'one-fourth',
	'three-quarters',
	'three-fourths',
	'one-fifth',
	'four-fifths',
	'one-half_last',
	'one-third_last',
	'two-thirds_last',
	'one-quarter_last',
	'one-fourth_last',
	'three-quarters_last',
	'three-fourths_last',
	'one-fifth_last',
	'four-fifths_last',
);

// Register the shortcode handler for each column tag.
foreach ( $column_tags as $column_tag ) {
	add_shortcode( $column_tag, 'sbs_columns' );
}
