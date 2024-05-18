<?php
// Connect to the database
include '../config/config.php';

// Fetch data from the database
$sql = "SELECT * FROM user_logs JOIN users ON users.id = user_logs.user_id";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return JSON encoded data
echo json_encode($data);
?>
