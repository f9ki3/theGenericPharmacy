<?php
include '../config/config.php'; 

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required data parameters are set in the POST data
    if (isset($_POST['edit_id']) && isset($_POST['edit_u_name']) && isset($_POST['edit_f_name']) && isset($_POST['edit_l_name']) && isset($_POST['edit_address']) && isset($_POST['edit_email_add']) && isset($_POST['edit_contact_no']) && isset($_FILES['edit_profile_pic'])) {
        
        // Retrieve the data sent via POST
        $edit_id = $_POST['edit_id'];
        $edit_u_name = $_POST['edit_u_name'];
        $edit_f_name = $_POST['edit_f_name'];
        $edit_l_name = $_POST['edit_l_name'];
        $edit_address = $_POST['edit_address'];
        $edit_email_add = $_POST['edit_email_add'];
        $edit_contact_no = $_POST['edit_contact_no'];

        // Handle the file upload
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["edit_profile_pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["edit_profile_pic"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo json_encode(array("error" => "File is not an image."));
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo json_encode(array("error" => "Sorry, file already exists."));
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["edit_profile_pic"]["size"] > 500000) {
            echo json_encode(array("error" => "Sorry, your file is too large."));
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo json_encode(array("error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."));
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo json_encode(array("error" => "Sorry, your file was not uploaded."));
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["edit_profile_pic"]["tmp_name"], $target_file)) {
                // File uploaded successfully, now update the database
                $edit_profile_pic = basename($_FILES["edit_profile_pic"]["name"]);

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
                echo json_encode(array("error" => "Sorry, there was an error uploading your file."));
            }
        }
    } else {
        // Echo an error message if any required parameter is missing
        echo json_encode(array("error" => "Missing parameters"));
    }
} else {
    // Echo an error message if the request method is not POST
    echo json_encode(array("error" => "Invalid request method"));
}
?>
