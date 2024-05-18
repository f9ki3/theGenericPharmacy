<?php
// Include database configuration
include '../config/config.php';

// Check if the request method is POST or GET
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod == 'POST' || $requestMethod == 'GET') {
    // SQL query
    $sql = "SELECT SUM(sales) as revenue FROM `sales` ";

    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo json_encode(["message" => "No results found"]);
        exit;
    }

    // Close connection
    $conn->close();

    // Return JSON encoded data
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Return an error if the request method is not POST or GET
    header('Content-Type: application/json');
    echo json_encode(["error" => "Invalid request method"]);
    http_response_code(405); // Method Not Allowed
    exit;
}
?>
