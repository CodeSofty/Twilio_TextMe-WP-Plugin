<?php 
/**
 * Plugin Name:       Twilio SMS Client
 * Description:      Give your vistors a way to text you from your website with a Twilio phone number!
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Evan L
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 */

 // Exit if accessed directly

if(!defined('ABSPATH')) {
    exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/wp-tut-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__).'/includes/wp-tut-class.php');


// Load Twilio API
require_once(plugin_dir_path(__FILE__).'/includes/wp-tut-api.php');


// Register Class

function register_wptut() {
    register_widget('WpTut_Widget');
}


// Hook in functions

add_action('widgets_init', 'register_wptut');
add_action('wp_head', 'capture_form_data');

?>