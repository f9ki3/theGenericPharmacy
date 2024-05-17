<?php
// Start a session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['user_type'] == 0) {
    // Redirect to the dashboard page
    header("Location: admin/");
    exit;
} 

?> 
