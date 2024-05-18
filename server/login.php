<?php
include '../config/config.php'; // Include the file containing database connection details

// Check if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = hash('sha256', $password);

        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any rows were returned
        if ($result->num_rows == 1) {
            // Start a session
            session_start();

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
            $_SESSION['user_type'] = $user['user_type'];

            // Insert user login log
            $stmt_log = $conn->prepare("INSERT INTO `user_logs` (`id`, `date`, `user_id`, `status`) VALUES (NULL, NOW(), ?, 'login')");
            $stmt_log->bind_param("i", $user['id']);
            $stmt_log->execute();

            echo "1";
        } else {
            // Return failure message
            echo "0";
        }

        // Close the statement and database connection
        $stmt->close();
        $stmt_log->close();
        $conn->close();
    } else {
        // Return failure message if username or password is not set
        echo "0";
    }
} else {
    // Return failure message if not a POST request
    echo "Only POST requests are allowed!";
}
?>
