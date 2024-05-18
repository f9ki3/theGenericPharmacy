$(document).ready(function() {
    $('#delete').click(function() {
        var deleted_id = $('#deleted_id').val();
        
        // AJAX request to pass the ID to PHP script
        $.ajax({
            url: '../server/delete_account.php', // Replace 'your_php_script.php' with the actual path to your PHP script
            method: 'POST',
            data: { id: deleted_id }, // Pass the ID as data
            success: function(response) {
                // // Handle success response
                // console.log(response);
                alertify.success('Deleted successfully!');
                $('#cancel').trigger('click');
                setTimeout(function() {
                        // Reload the current page
                        location.reload();
                }, 1000); // 3000 milliseconds = 3 seconds
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
    });
});


        