$(document).ready(function() {
    $('#create').click(function() {
        var uName = $('#u_name').val();
        var fName = $('#f_name').val();
        var lName = $('#l_name').val();
        var emailAdd = $('#email_add').val();
        var contactNo = $('#contact_no').val();
        var address = $('#address').val();
        var profilePic = $('#profile_pic')[0].files[0]; // Get the file object
        var password = $('#password').val();
        var cPassword = $('#c_password').val();

        // Reset previous styles
        $('#u_name, #f_name, #l_name, #email_add, #contact_no, #address, #profile_pic, #password, #c_password').css('border', '');

        var isValid = true;

        // Validate each field
        if (!uName) {
            $('#u_name').css('border', '2px solid red');
            isValid = false;
        }
        if (!fName) {
            $('#f_name').css('border', '2px solid red');
            isValid = false;
        }
        if (!lName) {
            $('#l_name').css('border', '2px solid red');
            isValid = false;
        }
        if (!emailAdd) {
            $('#email_add').css('border', '2px solid red');
            isValid = false;
        } else {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(emailAdd)) {
                $('#email_add').css('border', '2px solid red');
                alertify.error('Please enter a valid email address!');
                isValid = false;
            }
        }
        if (!contactNo) {
            $('#contact_no').css('border', '2px solid red');
            isValid = false;
        } else if (!/^\d{11}$/.test(contactNo)) {
            $('#contact_no').css('border', '2px solid red');
            alertify.error('Contact number must be 11 digits!');
            isValid = false;
        }
        if (!address) {
            $('#address').css('border', '2px solid red');
            isValid = false;
        }
        if (!profilePic) {
            $('#profile_pic').css('border', '2px solid red');
            isValid = false;
        }
        if (!password) {
            $('#password').css('border', '2px solid red');
            isValid = false;
        }
        if (!cPassword) {
            $('#c_password').css('border', '2px solid red');
            isValid = false;
        }

        if (!isValid) {
            alertify.error('All fields are required!');
            return;
        }

        if (password !== cPassword) {
            // If passwords do not match, highlight the fields and show an alert
            $('#password, #c_password').css('border', '2px solid red');
            alertify.error('Passwords do not match!');
        } else {
            // If passwords match, proceed with the AJAX call
            var formData = new FormData();
            formData.append('u_name', uName);
            formData.append('f_name', fName);
            formData.append('l_name', lName);
            formData.append('email_add', emailAdd);
            formData.append('contact_no', contactNo);
            formData.append('address', address);
            formData.append('profile_pic', profilePic);
            formData.append('password', password);

            $.ajax({
                url: '../server/create_account.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle the response from the server
                    alertify.success('Account created successfully!');
                    console.log(response);
                    // Delay the reload by 3 seconds
                    setTimeout(function() {
                        // Reload the current page
                        location.reload();
                    }, 2000); // 3000 milliseconds = 3 seconds

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle any errors
                    alertify.error('An error occurred: ' + textStatus);
                    console.log('Error: ' + errorThrown);
                }
            });
        }
    });
});
