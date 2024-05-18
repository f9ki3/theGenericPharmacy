$(document).ready(function() {
    $('#update').click(function() {
        // Get all the id values
        var edit_id = $('#edit_id').val();
        var edit_u_name = $('#edit_u_name').val();
        var edit_f_name = $('#edit_f_name').val();
        var edit_l_name = $('#edit_l_name').val();
        var edit_address = $('#edit_address').val();
        var edit_email_add = $('#edit_email_add').val();
        var edit_contact_no = $('#edit_contact_no').val();
        var edit_profile_pic = $('#edit_profile_pic').val();
        
        // Make an AJAX request
        $.ajax({
            url: "../server/update_account.php",
            type: "POST",
            data: {
                edit_id: edit_id,
                edit_u_name: edit_u_name,
                edit_f_name: edit_f_name,
                edit_l_name: edit_l_name,
                edit_address: edit_address,
                edit_email_add: edit_email_add,
                edit_contact_no: edit_contact_no,
                edit_profile_pic: edit_profile_pic
            },
            success: function(response) {
                // console.log(response);
                alertify.success('Wla ih Ma14l quo Parin : (!');
                    console.log(response);
                    // Delay the reload by 3 seconds
                    setTimeout(function() {
                        // Reload the current page
                        location.reload();
                    }, 2000); // 3000 milliseconds = 3 seconds
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });
    });
});
