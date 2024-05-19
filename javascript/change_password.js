$('#change_password').click(function() {
    var edit_id_pass = $('#edit_id_pass').val();
    var new_pass = $('#new_pass').val();
    var confirm_pass = $('#confirm_pass').val();

    // Password validation
    if (new_pass.length < 8) {
        alertify.error('Password must be at least 8 characters long.');
        return;
    }
    if (new_pass !== confirm_pass) {
        alertify.error('Password and confirm password do not match.');
        return;
    }
    if (!(/[a-z]/.test(new_pass) && /[A-Z]/.test(new_pass) && /[0-9]/.test(new_pass) && /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(new_pass))) {
        alertify.error('Password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.');
        return;
    }

    $.ajax({
        url: '../server/change_pass.php',
        method: 'POST',
        data: { id: edit_id_pass, password: new_pass },
        success: function(response) {
            // Handle success response
            alertify.success('Password updated successfully!');
            $('#cancel').trigger('click');
            // Optionally update page content dynamically here
            setTimeout(function() {
                // Reload the current page
                location.reload();
            }, 2000);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error('Failed to change password:', error);
            alertify.error('Failed to change password. Please try again later.');
        }
    });
});
