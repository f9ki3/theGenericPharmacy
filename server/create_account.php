<?php
// Include your database connection file
include '../config/config.php'; // Make sure this file sets up $conn

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present
    if (
        isset($_POST['u_name']) &&
        isset($_POST['f_name']) &&
        isset($_POST['l_name']) &&
        isset($_POST['email_add']) &&
        isset($_POST['contact_no']) &&
        isset($_POST['address']) &&
        isset($_POST['profile_pic']) &&
        isset($_POST['password'])
    ) {
        // Sanitize the inputs to prevent SQL injection
        $uName = mysqli_real_escape_string($conn, $_POST['u_name']);
        $fName = mysqli_real_escape_string($conn, $_POST['f_name']);
        $lName = mysqli_real_escape_string($conn, $_POST['l_name']);
        $emailAdd = mysqli_real_escape_string($conn, $_POST['email_add']);
        $contactNo = mysqli_real_escape_string($conn, $_POST['contact_no']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $profilePic = mysqli_real_escape_string($conn, $_POST['profile_pic']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        // Your SQL query to insert data into the database
        $sql = "INSERT INTO your_table_name (u_name, f_name, l_name, email_add, contact_no, address, profile_pic, password) 
                VALUES ('$uName', '$fName', '$lName', '$emailAdd', '$contactNo', '$address', '$profilePic', '$password')";

        if (mysqli_query($conn, $sql)) {
            // If the query was successful
            echo "Account created successfully!";
        } else {
            // If there was an error with the query
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // If any required field is missing
        echo "All fields are required!";
    }
} else {
    // If the request is not a POST request
    echo "Invalid request method!";
}
?>
