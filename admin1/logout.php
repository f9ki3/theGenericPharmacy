<?php
// Start a session
session_start();

include 'session.php';
include '../config/config.php';

// Insert user login log
$stmt_log = $conn->prepare("INSERT INTO user_logs (date, user_id, status) VALUES (NOW(), ?, 'logout')");
if ($stmt_log) {
    $stmt_log->bind_param("i", $id);
    $stmt_log->execute();
    $stmt_log->close();
} else {
    // Handle error if prepare fails
    // Example: die("Error: " . $conn->error);
}

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: ../");
exit;
?>
