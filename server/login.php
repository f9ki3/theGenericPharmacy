<?php
include '../config/config.php'; // Include the file containing database connection details

// Start a session at the beginning
session_start();

// Check if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        // Hash the password (it's better to use password_hash for secure password storage)
        $password_hashed = hash('sha256', $password);

        // Prepare and execute the query
        // Add parentheses to ensure proper precedence of OR and AND conditions
        $stmt = $conn->prepare("SELECT * FROM users WHERE (user_name = ? OR user_email = ?) AND user_password = ?");
        $stmt->bind_param("sss", $username, $username, $password_hashed);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows == 1) {
            // Fetch user data and store in session variables
            $user = $result->fetch_assoc();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['user_fname'] = $user['user_fname'];
            $_SESSION['user_lname'] = $user['user_lname'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_contact'] = $user['user_contact'];
            $_SESSION['user_address'] = $user['user_address'];
            $_SESSION['user_profile'] = $user['user_profile'];
            $_SESSION['user_type'] = $user['type'];

            // Insert user login log
            $stmt_log = $conn->prepare("INSERT INTO `user_logs` (`id`, `date`, `user_id`, `status`) VALUES (NULL, NOW(), ?, 'login')");
            $stmt_log->bind_param("i", $user['id']);
            $stmt_log->execute();
            $type = $_SESSION['user_type'];

            // Check the user type and return corresponding result
            if ($type === 0) {
                echo "1"; // Admin type
            } else {
                echo "2"; // Regular user type
            }
        } else {
            // Return failure message if no matching user
            echo "0"; // Invalid username/password
        }

        // Close the statement and database connection
        $stmt->close();
        $stmt_log->close();
        $conn->close();
    } else {
        // Return failure message if username or password is not set
        echo "0"; // Missing username/password
    }
} else {
    // Return failure message if not a POST request
    echo "Only POST requests are allowed!";
}
?>
