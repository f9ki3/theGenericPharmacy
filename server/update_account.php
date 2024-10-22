<?php
include '../config/config.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required data parameters are set in the POST data
    if (isset($_POST['edit_id']) && isset($_POST['edit_u_name']) && isset($_POST['edit_f_name']) && isset($_POST['edit_l_name']) && isset($_POST['edit_address']) && isset($_POST['edit_email_add']) && isset($_POST['edit_contact_no'])) {

        // Retrieve the data sent via POST
        $edit_id = $_POST['edit_id'];
        $edit_u_name = $_POST['edit_u_name'];
        $edit_f_name = $_POST['edit_f_name'];
        $edit_l_name = $_POST['edit_l_name'];
        $edit_address = $_POST['edit_address'];
        $edit_email_add = $_POST['edit_email_add'];
        $edit_contact_no = $_POST['edit_contact_no'];

        // Check if edit_profile_pic has a value
        if (isset($_FILES['edit_profile_pic']) && $_FILES['edit_profile_pic']['error'] == 0) {
            // Handle the profile picture upload
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["edit_profile_pic"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file is an image
            $check = getimagesize($_FILES["edit_profile_pic"]["tmp_name"]);
            if ($check !== false) {
                // Check file size (e.g., limit to 2MB)
                if ($_FILES["edit_profile_pic"]["size"] <= 2000000) {
                    // Allow certain file formats
                    if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                        if (move_uploaded_file($_FILES["edit_profile_pic"]["tmp_name"], $target_file)) {
                            // File successfully uploaded
                            $edit_profile_pic = basename($_FILES["edit_profile_pic"]["name"]);
                            
                            // Construct the SQL query to update data in the 'users' table
                            $sql = "UPDATE users SET user_name=?, user_fname=?, user_lname=?, user_email=?, user_contact=?, user_address=?, user_profile=? WHERE id=?";

                            // Prepare the SQL statement
                            $stmt = $conn->prepare($sql);

                            // Bind parameters
                            $stmt->bind_param('sssssssi', $edit_u_name, $edit_f_name, $edit_l_name, $edit_email_add, $edit_contact_no, $edit_address, $edit_profile_pic, $edit_id);

                            // Execute the statement
                            if ($stmt->execute()) {
                                echo json_encode(array("success" => "Record updated successfully"));
                            } else {
                                echo json_encode(array("error" => "Error updating record: " . $stmt->error));
                            }
                        } else {
                            echo json_encode(array("error" => "Sorry, there was an error uploading your file."));
                            exit();
                        }
                    } else {
                        echo json_encode(array("error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."));
                        exit();
                    }
                } else {
                    echo json_encode(array("error" => "Sorry, your file is too large."));
                    exit();
                }
            } else {
                echo json_encode(array("error" => "File is not an image."));
                exit();
            }
        } else {
            // Construct the SQL query to update data in the 'users' table
            $sql = "UPDATE users SET user_name=?, user_fname=?, user_lname=?, user_email=?, user_contact=?, user_address=? WHERE id=?";

            // Prepare the SQL statement
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bind_param('ssssssi', $edit_u_name, $edit_f_name, $edit_l_name, $edit_email_add, $edit_contact_no, $edit_address, $edit_id);

            // Execute the statement
            if ($stmt->execute()) {
                echo json_encode(array("success" => "Record updated successfully"));
            } else {
                echo json_encode(array("error" => "Error updating record: " . $stmt->error));
            }
        }


        // Close the statement
        $stmt->close();
    } else {
        // Echo an error message if any required parameter is missing
        echo json_encode(array("error" => "Missing parameters"));
    }
} else {
    // Echo an error message if the request method is not POST
    echo json_encode(array("error" => "Invalid request method"));
}

// Close the database connection
$conn->close();

?>