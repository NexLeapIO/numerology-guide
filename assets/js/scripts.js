jQuery(document).ready(function($) {
    $('.ng-form').on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = form.serialize();
        var resultContainer = form.next('.ng-result');

        // Show loading message
        resultContainer.html('<p class="ng-loading">' + ng_ajax_object.loading_message + '</p>');

        // Add action to the data
        formData += '&action=ng_generate_insight';

        // Send AJAX request
        $.post(ng_ajax_object.ajax_url, formData, function(response) {
            resultContainer.html(response);
        });
    });
});