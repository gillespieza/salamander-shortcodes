<?php
/**
 * Plugin Name:       Salamander Bootstrap Shortcodes
 * Plugin URI:        http://www.salamanderthemes.net/wordpress-plugins/salamander-bootstrap-shortcodes
 * Description:       Theme-independent, bootstrap-compatible shortcodes for permalinks, dividers, dropcaps, lists, multi-column layouts, alert boxes, and more.
 * Version:           1.0.0
 * Author:            gillespieza
 * Author URI:        https://github.com/gillespieza
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       salamander_bootstrap_shortcodes
 * Domain Path:       /languages
 *
 * @since       1.0.0
 * @package     salamander-shortcodes
 * @wordpress-plugin
 */

// Security Check: Prevent this file being executed outside the WordPress context.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Initialize plugin and load text domain.
 *
 * Initialise and load text domain to make this plugin translation-ready from the
 * get-go. No translations have been included, but new .mo files could be added to /languages/
 *
 * This function is hooked into the 'plugins_loaded' action to ensure that the plugin's text domain
 * is loaded, allowing for translation of plugin strings.
 *
 * @since 1.0.0
 *
 * @link http://codex.wordpress.org/load_plugin_textdomain
 */
function sbs_plugin_init() {
	load_plugin_textdomain( 'salamander_bootstrap_shortcodes', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'sbs_plugin_init' );


/** Load the plugin functions */
require_once dirname( __FILE__ ) . '/inc/styles-scripts.php'; // loads the stylesheets and scripts.
require_once dirname( __FILE__ ) . '/inc/shortcode-alerts.php';
require_once dirname( __FILE__ ) . '/inc/shortcode-callout.php';
require_once dirname( __FILE__ ) . '/inc/shortcode-columns.php';
require_once dirname( __FILE__ ) . '/inc/shortcode-divider.php';
require_once dirname( __FILE__ ) . '/inc/shortcode-dropcaps.php';
require_once dirname( __FILE__ ) . '/inc/shortcode-hr.php';
require_once dirname( __FILE__ ) . '/inc/shortcode-lists.php';
require_once dirname( __FILE__ ) . '/inc/shortcode-permalink.php';
require_once dirname( __FILE__ ) . '/inc/shortcode-spacer.php';

/**
 *  move wpautop filter to AFTER shortcode is processed *
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop', 99 );
add_filter( 'the_content', 'shortcode_unautop', 100 );

/**
 * Stop WP auto-inserting blank <p> tags in shortcodes and empty <p> tags in general
 */
function sbs_empty_paragraph_fix( $content ) {
	$array   = array(
		'<p><!--'       => '<!--',
		'--></p>'       => '-->',
		'<p><script>'   => '<script>',
		'</script></p>' => '</script>',
		'<p>['          => '[',
		']</p>'         => ']',
		']<br />'       => ']',
	);
	$content = strtr( $content, $array );
	return $content;
}
add_filter( 'the_content', 'sbs_empty_paragraph_fix' );
