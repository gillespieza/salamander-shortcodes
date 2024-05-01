<?php
/**
 * Shortcode for creating styled Web 2.0 alert boxes
 *
 * @package salamander-shortcodes
 */

// Security Check: Prevent this file being executed outside the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}


/**
 * Display alert boxes shortcode.
 *
 * @param array  $atts    Shortcode attributes.
 * @param string $content Shortcode content.
 * @param string $tag     Shortcode tag.
 * @return string HTML markup for the alert box.
 */
function sbs_alert_boxes( $atts, $content = null, $tag ) {

	// Enqueue the stylesheet. No need for the javascript.
	wp_enqueue_style( 'sbs-style' );
	wp_enqueue_style( 'bootstrap-3' );

	// Extract shortcode attributes.
	$atts = shortcode_atts(
		array(
			'class' => 'alert', // default.
			'style' => '',
		),
		$atts
	);

	// Set style attribute if specified.
	$style_attr = ( ! empty( $atts['style'] ) ) ? ' style="' . esc_attr( $atts['style'] ) . '"' : '';

	// Set class attribute with the tag name and any additional classes.
	$class_attr = ' class="alert ' . esc_attr( $tag . ' ' . $atts['class'] ) . '"';

	// Generate and return the alert box markup.
	return '<div' . $class_attr . $style_attr . '>' . do_shortcode( $content ) . '</div>';
}

$alert_tags = array(
	'address_box',
	'arrow_right_box',
	'arrow_left_box',
	'arrow_up_box',
	'arrow_down_box',
	'basket_box',
	'bluearrow_right_box',
	'bluearrow_left_box',
	'bluearrow_up_box',
	'bluearrow_down_box',
	'book_box',
	'calendar_box',
	'camera_box',
	'chart_box',
	'check_box',
	'comment_box',
	'contact_box',
	'download_box',
	'error_box',
	'fancy_box',
	'folder_box',
	'hammer_box',
	'heart_box',
	'home_box',
	'info_box',
	'idea_box', // deprecated
	'lightbulb_on_box',
	'lightbulb_off_box',
	'news_box',
	'note_box',
	'plain_box',
	'plus_box',
	'save_box',
	'screen_on_box',
	'screen_off_box',
	'screwdriver_box',
	'search_box',
	'search_blue_box',
	'search_green_box',
	'star_box',
	'tool_box',
	'twitter_box',
	'user_black_box',
	'user_blue_box',
	'user_business_box',
	'users_box',
	'users_business_box',
	'video_box',
	'warning_box',
);

// Register the shortcode handler for each alert box.
foreach ( $alert_tags as $alert_tag ) {
	add_shortcode( $alert_tag, 'sbs_alert_boxes' );
}
