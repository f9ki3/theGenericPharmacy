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
                    { data: 'user_name', width: '5%' },
                    {
                        data: 'user_profile',
                        render: function (data, type, row) {
                            return '<img src="../uploads/' + data + '" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 100%" />';
                        },
                        width: '10%'
                    },
                    { data: 'user_fname', width: '5%' },
                    { data: 'user_lname', width: '5%' },
                    { data: 'user_address', width: '20%' },
                    { data: 'user_email', width: '15%' },
                    { data: 'user_contact', width: '10%' },
                    {
                        data: null,
                        className: "center",
                        defaultContent: '<button data-bs-toggle="modal" data-bs-target="#edit" class="edit-btn btn btn-sm" style="font-size: 12px"><i class="bi bi-pencil-square"></i></button> <button class="change-pass-btn btn btn-sm" data-bs-toggle="modal" data-bs-target="#change_pass" style="font-size: 12px"><i class="bi bi-arrow-90deg-down"></i></button> <button class="delete-btn btn btn-sm" style="font-size: 12px" data-bs-toggle="modal" data-bs-target="#remove"><i class="bi bi-trash"></i></button>',
                        width: '15%'
                    }
                ],
                columnDefs: [
                    { orderable: false, targets: [2, 4, 5, 6, 7] } // Disable sorting for the email, contact, and action columns
                ]
            });
    
            // Edit button click event
            $('#accounts').on('click', '.edit-btn', function () {
                var data = $('#accounts').DataTable().row($(this).parents('tr')).data();
                // Trigger edit action
                $('#edit_id').val(data.id);
                $('#edit_u_name').val(data.user_name);
                $('#edit_f_name').val(data.user_fname);
                $('#edit_l_name').val(data.user_lname);
                $('#edit_address').val(data.user_address);
                $('#edit_email_add').val(data.user_email);
                $('#edit_contact_no').val(data.user_contact);
                $('#edit_profile_pic').attr('src', data.user_profile);
            });
    
            // Change Password button click event
            $('#accounts').on('click', '.change-pass-btn', function () {
                var data = $('#accounts').DataTable().row($(this).parents('tr')).data();
                // Trigger change password action
                $('#edit_id_pass').val(data.id);
            });
    
            // Delete button click event
            $('#accounts').on('click', '.delete-btn', function () {
                var data = $('#accounts').DataTable().row($(this).parents('tr')).data();
                // Trigger delete action
                $('#deleted_id').val(data.id);
            });
        },
        error: function (xhr, status, error) {
            console.error("An error occurred: " + error);
        }
    });
    
});
