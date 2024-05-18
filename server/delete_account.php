<?php
// Include your database connection file
include '../config/config.php'; // Make sure this file sets up $conn

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id_delete = $_POST["id"];
        
        // Prepare the query to delete the user
        $query = "DELETE FROM users WHERE id=$id_delete";

        // Execute the query
        if ($conn->query($query) === TRUE) {
            // Return success message if the deletion was successful
            echo "1";
        } else {
            // Return failure message if there was an error with the query
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        // Return failure message if ID is not set
        echo "0";
    }
} else {
    // Return failure message if not a POST request
    echo "0";
}
?>
