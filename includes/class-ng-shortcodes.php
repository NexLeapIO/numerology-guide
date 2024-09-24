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

    /**
     * Handle AJAX requests for generating insights.
     */
    public function handle_ajax_request() {
        // Check nonce for security.
        check_ajax_referer('ng_nonce_action', 'ng_nonce');

        // Get form data and sanitize.
        $type = sanitize_text_field($_POST['ng_type']);

        // Get the current site language.
        $locale = get_locale();

        switch ($type) {
            case 'general_forecast':
            case 'personal_advice':
                $zodiac_sign = sanitize_text_field($_POST['zodiac_sign']);
                $prompt_type = ( $type === 'general_forecast' ) ? __( 'general astrological forecast', 'numerology-guide' ) : __( 'personal life advice', 'numerology-guide' );
                $prompt = sprintf(
                    __('Provide %1$s for the zodiac sign %2$s.', 'numerology-guide'),
                    $prompt_type,
                    $zodiac_sign
                );
                break;
            case 'career_finance_forecast':
            case 'future_events_forecast':
                $birt_date = sanitize_text_field($_POST['birth_date']);
                $favorite_number = sanitize_text_field($_POST['favorite_number']);
                $prompt_type = ($type === 'career_finance_forecast'  ) ? __( 'annual career and finance forecast', 'numerology-guide' ) : __( 'future events forecast', 'numerology-guide' );
                $prompt = sprintf(
                    __( 'Provide %1$s based on the birth date %2$s and favorite number %3$s.', 'numerology-guide' ),
                    $prompt_type,
                    $birth_date,
                    $favorite_number
                );
                break;
            case 'current_situation_consultation':
                $description = sanitize_textarea_field( $_POST['situation_description'] );
                $prompt = sprintf(
                    __( 'Provide a consultation for the following situation: %s.', 'numerology-guide' ),
                    $description
                );
                break;
            default:
                echo __( 'Invalid form type.', 'numerology-guide' );
                wp_die();
        }

        // Generate insight using OpenAI API.
        require_once NG_PLUGIN_DIR . 'includes/class-ng-openai.php';
        $openai = new NG_OpenAI();
        $insight = $openai->generate_insights($prompt, $locale);

        // Return the result.
        echo '<div class="ng-result">' . wp_kses_post($insight) . '</div>';

        wp_die();
    }
}