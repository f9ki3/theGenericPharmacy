$(document).ready(function () {
    // Fetch data using AJAX
    $.ajax({
        url: '../server/user_logs.php',
        dataType: 'json',
        success: function (data) {
            // Populate DataTable with fetched data
            $('#userlogs').DataTable({
                data: data,
                columns: [
                    { data: 'user_name' },
                    { data: 'date' },
                    { data: 'user_email' },
                    { data: 'user_contact' },
                    { data: 'status' }
                ]
            });
        }
    });
});