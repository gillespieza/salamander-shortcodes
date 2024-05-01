<?php
/**
 * Shortcode for creating pretty styled lists.
 *
 * @package salamander-shortcodes
 */

// Security Check: Prevent this file being executed outside the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

/**
 * Display check list shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string HTML markup for the check list.
 */
function sbs_check_list( $atts, $content = null ) {

	// Enqueue the stylesheet. No need for the javascript.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Wrap content with div tag having check_list class.
	return '<div class="check_list">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'check_list', 'sbs_check_list' );


/**
 * Display arrow list shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string HTML markup for the check list.
 */
function sbs_arrow_list( $atts, $content = null ) {

	// Enqueue the stylesheet. No need for the javascript.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Wrap content with div tag having arrow_list class.
	return '<div class="arrow_list">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'arrow_list', 'sbs_arrow_list' );


/**
 * Display bullet list shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string HTML markup for the bullet list.
 */
function sbs_bullet_list( $atts, $content = null ) {
	// Parse the provided attributes.
	$atts = shortcode_atts(
		array(
			'color' => '',
		),
		$atts
	);

	// Determine the class based on the color attribute.
	$class = 'bullet_list';
	if ( ! empty( $atts['color'] ) ) {
		$class .= '_' . sanitize_html_class( $atts['color'] );
	}

	// Wrap content with div tag having the determined class.
	return '<div class="' . esc_attr( $class ) . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'bullet_list', 'sbs_bullet_list' );
