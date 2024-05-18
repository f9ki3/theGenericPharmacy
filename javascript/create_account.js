$(document).ready(function() {
    $('#create').click(function() {
        var fName = $('#f_name').val();
        var lName = $('#l_name').val();
        var emailAdd = $('#email_add').val();
        var contactNo = $('#contact_no').val();
        var profilePic = $('#profile_pic').val();
        var password = $('#password').val();
        var cPassword = $('#c_password').val();

        console.log("First Name: " + fName);
        console.log("Last Name: " + lName);
        console.log("Email: " + emailAdd);
        console.log("Contact: " + contactNo);
        console.log("Profile Picture: " + profilePic);
        console.log("Password: " + password);
        console.log("Confirm Password: " + cPassword);
    });
});
