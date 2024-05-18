<?php
include '../config/config.php'; 

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required data parameters are set in the POST data
    if (isset($_POST['edit_id']) && isset($_POST['edit_u_name']) && isset($_POST['edit_f_name']) && isset($_POST['edit_l_name']) && isset($_POST['edit_address']) && isset($_POST['edit_email_add']) && isset($_POST['edit_contact_no']) && isset($_POST['edit_profile_pic'])) {
        // Retrieve the data sent via POST
        $edit_id = $_POST['edit_id'];
        $edit_u_name = $_POST['edit_u_name'];
        $edit_f_name = $_POST['edit_f_name'];
        $edit_l_name = $_POST['edit_l_name'];
        $edit_address = $_POST['edit_address'];
        $edit_email_add = $_POST['edit_email_add'];
        $edit_contact_no = $_POST['edit_contact_no'];
        $edit_profile_pic = $_POST['edit_profile_pic'];

        // Construct the SQL query to update data in the 'users' table
        $sql = "UPDATE users SET user_name=?, user_fname=?, user_lname=?, user_email=?, user_contact=?, user_address=?, user_profile=? WHERE id=?";
        
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param('sssssssi', $edit_u_name, $edit_f_name, $edit_l_name, $edit_email_add, $edit_contact_no, $edit_address, $edit_profile_pic, $edit_id);

        // Execute the statement
        $stmt->execute();

        // Echo the processed data back to the client
        echo json_encode($_POST); // Echo back the received data for confirmation
    } else {
        // Echo an error message if any required parameter is missing
        echo json_encode(array("error" => "Missing parameters"));
    }
} else {
    // Echo an error message if the request method is not POST
    echo json_encode(array("error" => "Invalid request method"));
}
?>
