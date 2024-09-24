<?php
/**
 * Loader Class
 * 
 * Loads all necessary classes and initializes hooks.
 * 
 * @package NumerologyGuide
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class NG_Loader {
    /**
     * Initialize hooks.
     */
    public function init_hooks() {
        // Load text domain for translations.
        load_plugin_textdomain('numerology-guide', false, NG_PLUGIN_DIR . 'languages');

        // Register shortcodes.
        require_once NG_PLUGIN_DIR . 'includes/class-ng-shortcodes.php';
        $shortcodes = new NG_Shortcodes();
        $shortcodes->register_shortcodes();

        // Enqueue styles and scripts.
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    /**
     * Enqueue plugin styles and scripts.
     */
    public function enqueue_assets() {
        wp_enqueue_style('ng-styles', NG_PLUGIN_URL . 'assets/css/styles.css');

        wp_enqueue_script('ng-scripts', NG_PLUGIN_URL . 'assets/js/scripts.js', array('jquery'), '1.0.0', true);
        wp_localize_script('ng-scripts', 'ng_ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'loading_message' => __('Generating insights...', 'numerology-guide'),
        ));
    }
}