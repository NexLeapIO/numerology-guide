<?php
/**
 * Shortcodes Class
 * 
 * Registers all plugin shortcodes.
 * 
 * @package NumerologyGuide
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class NG_Shortcodes {
    /**
     * Register all shortcodes.
     */
    public function register_shortcodes() {
        add_shortcode('ng_form', array($this, 'render_form_shortcode'));
    }

    /**
     * Render the form based on type attribute.
     * 
     * @param array $atts Shortcode attributes.
     * @return string HTML output of the form.
     */
    public function render_form_shortcode($atts) {
        $atts = shortcode_atts(array(
            'type' => 'general',
        ), $atts, 'ng_form');

        ob_start();

        switch ( $atts['type'] ) {
            case 'general_forecast':
                include NG_PLUGIN_DIR . 'templates/form-general-forecast.php';
                break;
            case 'personal_advice':
                include NG_PLUGIN_DIR . 'templates/form-personal-advice.php';
                break;
            case 'career_finance_forecast':
                include NG_PLUGIN_DIR . 'templates/form-career-finance-forecast.php';
                break;
            case 'future_events_forecast':
                include NG_PLUGIN_DIR . 'templates/form-future-events-forecast.php';
                break;
            case 'current_situation_consultation':
                include NG_PLUGIN_DIR . 'templates/form-current-situation-consultation.php';
                break;
            default:
                echo __( 'Invalid form type.', 'numerology-guide' );
        }

        return ob_get_clean();
    }
}