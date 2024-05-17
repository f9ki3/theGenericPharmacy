<?php
// Include database configuration
include '../config/config.php';

// Function to return JSON response
function return_json_response($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate a 5-digit random number and concatenate "TMR" with it
    $transaction_code = "TMR" . rand(10000, 99999);
    $ticket_date = date("Y-m-d H:i:s"); // Current date and time

    // Retrieve POST data
    $ticket_plate_no = $_POST['plate_no'];
    $ticket_date_start = $_POST['time_in'];
    $ticket_date_end = $_POST['time_out'];
    $ticket_no_hours = $_POST['hours'];
    $ticket_rate = $_POST['rate'];
    $ticket_total_amount = $_POST['total_bill'];
    $ticket_qr_code = $_POST['vehicle_id']; // Assuming vehicle_id is used for QR code

    // Prepare and bind the SQL insert statement
    $stmt = $conn->prepare("INSERT INTO `transaction` (`transaction_code`, `ticket_date`, `ticket_plate_no`, `ticket_date_start`, `ticket_date_end`, `ticket_no_hours`, `ticket_rate`, `ticket_total_amount`, `ticket_qr_code`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $transaction_code, $ticket_date, $ticket_plate_no, $ticket_date_start, $ticket_date_end, $ticket_no_hours, $ticket_rate, $ticket_total_amount, $ticket_qr_code);

    // Execute the insert statement
    if ($stmt->execute()) {
        // Prepare and execute the SQL select statement
        $stmt = $conn->prepare("SELECT * 
        FROM `transaction` t
        JOIN `parking_type` o ON t.id = o.ticket_qr_code
        WHERE t.transaction_code = ?
        ");
        $stmt->bind_param("s", $transaction_code);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the result as an associative array
        if ($result->num_rows > 0) {
            $transaction = $result->fetch_assoc();
            return_json_response($transaction);
        } else {
            return_json_response(["error" => "No transaction found with the given transaction code."]);
        }
    } else {
        return_json_response(["error" => "Failed to insert transaction."]);
    }

    // Close the statement
    $stmt->close();
} else {
    // If request method is not POST, return an error message
    return_json_response(["error" => "Invalid request method."]);
}

// Close the database connection
$conn->close();
?>
