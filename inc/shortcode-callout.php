<?php
/**
 * Shortcode for creating pullouts and callouts.
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
 * Display callout shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string HTML markup for the callout.
 */
function sbs_callout( $atts, $content = null ) {

	// Enqueue the stylesheet. No need for the javascript.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Process shortcodes within the content.
	$output = do_shortcode( $content );

	// Wrap content with div tag having callout class.
	return '<div class="callout">' . wp_kses_post( $output ) . '</div>';
}
add_shortcode( 'callout', 'sbs_callout' );



/**
 * Display pullquote shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @return string HTML markup for the pullquote.
 */
function sbs_pullquote( $atts, $content = null ) {

	// Enqueue the stylesheet. No need for the javascript.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Parse the provided attributes.
	$atts = shortcode_atts(
		array(
			'quotes'    => '',
			'align'     => '',
			'textcolor' => '',
			'cite'      => '',
			'citelink'  => '',
		),
		$atts
	);

	$class = array();

	// Add quotes class if specified.
	if ( 'true' === trim( $atts['quotes'] ) ) {
		$class[] = ' quotes';
	}

	// Add alignment class if specified.
	if ( preg_match( '/left|right|center/', trim( $atts['align'] ) ) ) {
		$class[] = ' align' . esc_attr( $atts['align'] );
	}

	// Construct citation link.
	$citelink = '';
	if ( $atts['citelink'] ) {
		$citelink = ', <a href="' . esc_url( $atts['citelink'] ) . '" target="_blank">' . esc_html( $atts['citelink'] ) . '</a>';
	}

	// Construct citation.
	$cite = '';
	if ( $atts['cite'] ) {
		$cite = '<cite>&ndash; ' . esc_html( $atts['cite'] ) . $citelink . '</cite>';
	}

	// Set text color style if specified.
	$style = $atts['textcolor'] ? ' style="color:' . esc_attr( $atts['textcolor'] ) . ';"' : '';

	// Combine classes into a string.
	$class = join( '', array_unique( $class ) );

	// Process shortcodes within the content.
	$output = do_shortcode( $content );

	// Return the pullquote markup.
	return '<div class="clearfix"><span class="pullquote' . esc_attr( $class ) . '"' . $style . '>' . wp_kses_post( $output ) . $cite . '</span></div>';
}
add_shortcode( 'pullquote', 'sbs_pullquote' );
