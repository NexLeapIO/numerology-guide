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

        // Enqueue styles.
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
    }

    /**
     * Enqueue plugin styles.
     */
    public function enqueue_styles() {
        wp_enqueue_style('ng-styles', NG_PLUGIN_URL . 'assets/css/styles.css');
    }
}