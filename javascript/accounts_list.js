$(document).ready(function () {
    // Fetch data using AJAX
    $.ajax({
        url: '../server/get_accounts.php',
        dataType: 'json',
        success: function (data) {
            // Populate DataTable with fetched data
            $('#accounts').DataTable({
                data: data,
                columns: [
                    { data: 'user_name' },
                    { data: 'user_password' },
                    { data: 'user_fname' },
                    { data: 'user_lname' },
                    { data: 'user_address' },
                    { data: 'user_contact' }
                ]
            });
        },
        error: function (xhr, status, error) {
            console.error("An error occurred: " + error);
        }
    });
});
