<?php
/**
 * OpenAI API Class
 * 
 * Handles communication with the OpenAI API.
 * 
 * @package NumerologyGuide
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class NG_OpenAI {
    /**
     * API Key for OpenAI.
     * 
     * @var string
     */
    private $api_key;

    /**
     * Constructor to set up API key.
     */
    public function __construct() {
        $this->api_key = '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'; // Replace with your OpenAI API key.
    }

    /**
     * Generate numerology insights based on user input.
     * @param string $prompt The prompt to send to OpenAI.
     * @param string $locale The locale to use for the response.
     * @return string The generated content.
     */
    public function generate_insights($prompt, $locale) {
        // OpenAI API endpoint.
        $endpoint = 'https://api.openai.com/v1/chat/completions';

        // Prepare the request data.
        $data = array(
            'model' => 'gpt-4',
            'messages' => array(
                array(
                    'role' => 'system',
                    'content' => sprintf(
                        'You are a numerology specialist. Provide insightful numerology readings using only valid HTML tags like <h2>, <h3>, <ol>, <ul>, <li>, and <p>. Do not use Markdown or any other formatting. Respond in the language corresponding to the locale code %s. Make sure the output is well-formatted HTML.',
                        $locale
                    ),
                ),
                array(
                    'role' => 'user',
                    'content' => $prompt,
                ),
            ),
            'temperature' => 0.7,
        );

        // Set up the request headers.
        $headers = array(
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $this->api_key,
        );

        // Make the request.
        $response = wp_remote_post(
            $endpoint,
            array(
                'headers' => $headers,
                'body' => wp_json_encode($data),
                'timeout' => 60,
            )
        );

        // Handle the response.
        if (is_wp_error($response)) {
            error_log('OpenAI API error: ' . $response->get_error_message());
            return __('An error occurred while generating the insight.', 'numerology-guide');
        } else {
            $body = json_decode(wp_remote_retrieve_body($response), true);

            if (isset($body['choices'][0]['message']['content'])) {
                return $body['choices'][0]['message']['content'];
            } else {
                error_log('OpenAI API error: ' . wp_json_encode($body));
                return __('An error occurred while generating the insight.', 'numerology-guide');
            }
        }
    }
}