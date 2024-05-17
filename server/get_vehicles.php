<?php
// Assuming you have established a conn to your database
include '../config/config.php';

// Perform a query to select parking_name and parking_rate from parking_type table
$query = "SELECT id, parking_name, parking_rate FROM parking_type";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    $parking_types = array();

    // Fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
        // Add parking_name and parking_rate to the $parking_types array
        $parking_types[] = array(
            'p_id' => $row['id'],
            'parking_name' => $row['parking_name'],
            'parking_rate' => $row['parking_rate']
        );
    }

    // Encode the array as JSON and output it
    echo json_encode($parking_types);
} else {
    // If the query fails, handle the error
    echo json_encode(array('error' => 'Failed to fetch parking types.'));
}

// Close the database conn
mysqli_close($conn);
?>
