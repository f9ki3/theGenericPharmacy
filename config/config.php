<?php
// Database credentials
// $host = 'localhost'; // or your database host
// $dbname = 'tgp';
// $username = 'root';
// $password = '';

$host = 'localhost'; // or your database host
$dbname = 'u552678172_pharmasims';
$username = 'u552678172_pharmasims';
$password = '^+Fp>6d?O2';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
