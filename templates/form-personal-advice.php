<?php
/**
 * Template for Personal Advice Form.
 * 
 * @package NumerologyGuide
 */
?>
<form class="ng-form" method="post">
    <?php wp_nonce_field('ng_nonce_action', 'ng_nonce'); ?>
    <input type="hidden" name="ng_type" value="personal_advice">

    <label for="zodiac-sign"><?php _e('Your Zodiac Sign:', 'numerology-guide'); ?></label>
    <select name="zodiac_sign" id="zodiac-sign" required>
        <option value=""><?php _e('Select your zodiac sign', 'numerology-guide'); ?></option>
        <option value="aries"><?php _e('Aries', 'numerology-guide'); ?></option>
        <option value="taurus"><?php _e('Taurus', 'numerology-guide'); ?></option>
        <option value="gemini"><?php _e('Gemini', 'numerology-guide'); ?></option>
        <option value="cancer"><?php _e('Cancer', 'numerology-guide'); ?></option>
        <option value="leo"><?php _e('Leo', 'numerology-guide'); ?></option>
        <option value="virgo"><?php _e('Virgo', 'numerology-guide'); ?></option>
        <option value="libra"><?php _e('Libra', 'numerology-guide'); ?></option>
        <option value="scorpio"><?php _e('Scorpio', 'numerology-guide'); ?></option>
        <option value="sagittarius"><?php _e('Sagittarius', 'numerology-guide'); ?></option>
        <option value="capricorn"><?php _e('Capricorn', 'numerology-guide'); ?></option>
        <option value="aquarius"><?php _e('Aquarius', 'numerology-guide'); ?></option>
        <option value="pisces"><?php _e('Pisces', 'numerology-guide'); ?></option>
    </select>

    <button type="submit" name="ng_submit"><?php _e('Get Advice', 'numerology-guide'); ?></button>
</form>

<div class="ng-result"></div>