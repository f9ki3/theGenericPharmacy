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
        isset($_FILES['profile_pic']) &&
        isset($_POST['password'])
    ) {
        // Sanitize the inputs to prevent SQL injection
        $uName = mysqli_real_escape_string($conn, $_POST['u_name']);
        $fName = mysqli_real_escape_string($conn, $_POST['f_name']);
        $lName = mysqli_real_escape_string($conn, $_POST['l_name']);
        $emailAdd = mysqli_real_escape_string($conn, $_POST['email_add']);
        $contactNo = mysqli_real_escape_string($conn, $_POST['contact_no']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = hash('sha256', $password);
        
        // Handle file upload for profile picture
        $targetDir = "../uploads/";
        $profilePic = basename($_FILES["profile_pic"]["name"]);
        $targetFilePath = $targetDir . $profilePic;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        // Check if the file is a valid image
        $allowedExtensions = array("jpg", "jpeg", "png");
        if (in_array($fileType, $allowedExtensions)) {
            // Move the uploaded file to the destination directory
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFilePath)) {
                // Your SQL query to insert data into the database
                $sql = "INSERT INTO users (user_name, user_fname, user_lname, user_email, user_contact, user_address, user_profile, user_password, type) 
                        VALUES ('$uName', '$fName', '$lName', '$emailAdd', '$contactNo', '$address', '$profilePic', '$password', 1)";

                if (mysqli_query($conn, $sql)) {
                    // If the query was successful
                    echo "Account created successfully!";
                } else {
                    // If there was an error with the query
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                // If file upload failed
                echo "Error uploading file!";
            }
        } else {
            // If the file format is not allowed
            echo "Profile picture must be in JPG, JPEG, or PNG format!";
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
