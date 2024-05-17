<?php
// Connect to database
include '../config/config.php';

// Fetch data from database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close connection
$conn->close();

// Return JSON encoded data
echo json_encode($data);
?>
