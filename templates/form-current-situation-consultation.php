<?php
/**
 * Template for Current Situation Consultation Form.
 * 
 * @package NumerologyGuide
 */
?>
<form class="ng-form" method="post">
    <?php wp_nonce_field('ng_nonce_action', 'ng_nonce'); ?>
    <input type="hidden" name="ng_type" value="current_situation_consultation">

    <label for="situation-description"><?php _e('Describe your current situation:', 'numerology-guide'); ?></label>
    <textarea name="situation_description" id="situation-description" required></textarea>

    <button type="submit" name="ng_submit"><?php _e('Get Consultation', 'numerology-guide'); ?></button>
</form>

<div class="ng-result"></div>