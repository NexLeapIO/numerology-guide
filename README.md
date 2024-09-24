
# Numerology Guide

**Contributors:** Your Name  
**Tags:** numerology, astrology, OpenAI, shortcode  
**Requires at least:** 5.0  
**Tested up to:** 6.0  
**Stable tag:** 1.0.0  
**License:** GPLv2 or later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

Numerology Guide is a WordPress plugin that provides users with personalized numerology insights using the OpenAI API.

## Description

The Numerology Guide plugin allows you to display various forms on your website where users can input their information to receive personalized numerology readings. The insights are generated using the OpenAI API and are displayed directly on your site.

### Features

- Multiple types of numerology insights:
  - General Astrological Forecast
  - Personal Life Advice
  - Career, Finance, and Annual Forecast
  - Future Events Forecast
  - Current Situation Consultation
- Responsive forms that can be embedded using shortcodes.
- Multilingual support, adapting to the site's current language.
- Clean and simple design with customizable styles.

## Installation

1. Upload the plugin files to the `/wp-content/plugins/numerology-guide` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Open the `includes/class-ng-openai.php` file and replace `'your-openai-api-key'` with your actual OpenAI API key.

## Usage

Use the `[ng_form]` shortcode with the `type` attribute to display the desired form.

### Available Shortcodes

- **General Astrological Forecast**

  `[ng_form type="general_forecast"]`

- **Personal Life Advice**

  `[ng_form type="personal_advice"]`

- **Career, Finance, and Annual Forecast**

  `[ng_form type="career_finance_forecast"]`

- **Future Events Forecast**

  `[ng_form type="future_events_forecast"]`

- **Current Situation Consultation**

  `[ng_form type="current_situation_consultation"]`

## Screenshots

1. Example of the General Astrological Forecast form.
2. Display of the generated numerology insight.

## Frequently Asked Questions

### Q: Do I need an OpenAI API key?

A: Yes, you need to obtain an OpenAI API key to use this plugin. You can get one from the [OpenAI website](https://openai.com/).

### Q: How do I enter my OpenAI API key?

A: Open the `includes/class-ng-openai.php` file and replace `'your-openai-api-key'` with your actual API key.

### Q: Is the plugin multilingual?

A: Yes, the plugin adapts to the current language of the website and generates insights in that language.

### Q: How do I use the shortcodes?

A: Place the shortcode `[ng_form type="your_desired_type"]` in any page or post. Replace `your_desired_type` with one of the available types: `general_forecast`, `personal_advice`, `career_finance_forecast`, `future_events_forecast`, or `current_situation_consultation`.

## Changelog

### 1.0.0

- Initial release.

## Upgrade Notice

### 1.0.0

- Ensure you have an OpenAI API key before activating the plugin.

## License

This plugin is licensed under the GPLv2 or later.