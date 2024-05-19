$(document).ready(function() {
    $('#update').click(function() {
        // Create a FormData object
        var formData = new FormData();

        // Get all the id values and append them to the FormData object
        formData.append('edit_id', $('#edit_id').val());
        formData.append('edit_u_name', $('#edit_u_name').val());
        formData.append('edit_f_name', $('#edit_f_name').val());
        formData.append('edit_l_name', $('#edit_l_name').val());
        formData.append('edit_address', $('#edit_address').val());
        formData.append('edit_email_add', $('#edit_email_add').val());
        formData.append('edit_contact_no', $('#edit_contact_no').val());

        // Get the profile picture file input and append it to the FormData object
        var edit_profile_pic = $('#edit_profile_pic')[0].files[0];
        formData.append('edit_profile_pic', edit_profile_pic);

        // Make an AJAX request
        $.ajax({
            url: "../server/update_account.php",
            type: "POST",
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false, // Prevent jQuery from overriding the Content-Type header
            success: function(response) {
                alertify.success('Updated Successfully!');
                console.log(response);
                // Delay the reload by 3 seconds
                setTimeout(function() {
                    // Reload the current page
                    location.reload();
                }, 2000); // 2000 milliseconds = 2 seconds
            },
            error: function(xhr, status, error) {
                // Handle error
                console.log(error);
            }
        });
    });
});
