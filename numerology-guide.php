<?php
/**
 * Plugin Name: Numerology Guide
 * Description: Displays forms to collect user data and generates numerology insights using OpenAI API.
 * Version: 1.0.0
 * Author: NexLeap
 * Author URI: https://nexleap.cloud
 * Text Domain: numerology-guide
 * Domain Path: /languages
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants.
define('NG_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('NG_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include the main plugin loader class.
require_once NG_PLUGIN_DIR . 'includes/class-ng-loader.php';

// Initialize the plugin.
function nv_initialize_plugin() {
    $plugin = new NG_Loader();
    $plugin->init_hooks();
}
add_action('plugins_loaded', 'nv_initialize_plugin');

// Register AJAX actions.
function ng_register_ajax_actions() {
    $shortcodes = new NG_Shortcodes(); // Assuming the NG_Shortcodes class is handling the AJAX request.

    // Register AJAX actions for logged-in users.
    add_action('wp_ajax_ng_generate_insight', array($shortcodes, 'handle_ajax_request'));

    // Register AJAX actions for non-logged-in users.
    add_action('wp_ajax_nopriv_ng_generate_insight', array($shortcodes, 'handle_ajax_request'));
}
add_action('init', 'ng_register_ajax_actions');