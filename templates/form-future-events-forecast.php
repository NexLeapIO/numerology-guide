<?php
/**
 * Template for Future Events Forecast Form.
 * 
 * @package NumerologyGuide
 */
?>
<form class="ng-form" method="post">
    <?php wp_nonce_field('ng_nonce_action', 'ng_nonce'); ?>
    <input type="hidden" name="ng_type" value="future_events_forecast">

    <label for="birth-date"><?php _e('Your Birth Date:', 'numerology-guide'); ?></label>
    <input type="date" name="birth_date" id="birth-date" required>

    <label for="favorite-number"><?php _e('Your Favorite Number:', 'numerology-guide'); ?></label>
    <input type="number" name="favorite_number" id="favorite-number" required>

    <button type="submit" name="ng_submit"><?php _e('Get Forecast', 'numerology-guide'); ?></button>
</form>

<div class="ng-result"></div>