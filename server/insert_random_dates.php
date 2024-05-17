<?php
// Database configuration
include '../config/config.php';

// Function to generate a random date between 2019 and 2023
function generateRandomDate() {
    $start = strtotime("2019-01-01");
    $end = strtotime("2023-12-31");
    $timestamp = mt_rand($start, $end);
    return date("Y-m-d", $timestamp);
}

// Select rows where date is NULL
$sql_select = "SELECT id FROM sales WHERE date IS NULL";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    // Update each row with a random date
    while($row = $result->fetch_assoc()) {
        $randomDate = generateRandomDate();
        $id = $row['id'];
        
        $sql_update = "UPDATE sales SET date = '$randomDate' WHERE id = $id";
        if ($conn->query($sql_update) === TRUE) {
            echo "Record updated successfully. ID: $id, New Date: $randomDate\n";
        } else {
            echo "Error updating record: " . $conn->error . "\n";
        }
    }
} else {
    echo "No records found with date NULL.\n";
}

// Close connection
$conn->close();
?>
