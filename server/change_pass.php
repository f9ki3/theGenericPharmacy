<?php
// Include your database connection file
include '../config/config.php'; // Make sure this file sets up $conn

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"]) && isset($_POST["password"])) {
        $id = $_POST["id"];
        $password = $_POST["password"];
        $hashed_password = hash('sha256', $password);
        
        // Prepare the query to update the user's password
        $query = "UPDATE users SET user_password='$hashed_password' WHERE id=$id";

        // Execute the query
        if ($conn->query($query) === TRUE) {
            // Return success message if the update was successful
            echo "1";
        } else {
            // Return failure message if there was an error with the query
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        // Return failure message if ID or password is not set
        echo "0";
    }
} else {
    // Return failure message if not a POST request
    echo "0";
}
?>
