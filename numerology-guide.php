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