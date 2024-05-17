$(document).ready(function() {
    // jQuery selector for the input field and the button
    var $plateInput = $('#plate_no');
    var $generateBtn = $('#generateBtn');

    // Add an input event listener using jQuery
    $plateInput.on('input', function() {
        // Check if the input field is empty
        if ($plateInput.val().trim() === '') {
            // If empty, disable the button
            $generateBtn.prop('disabled', true);
        } else {
            // If not empty, enable the button
            $generateBtn.prop('disabled', false);
        }
    });
});