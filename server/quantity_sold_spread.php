<?php
require '../library/phpoffice/vendor/autoload.php'; // Ensure you include Composer's autoloader

use PhpOffice\PhpSpreadsheet\IOFactory;

$filePath = '../documents/excel_new_data_source/tgp_qty_sold.xlsx'; // Path to the Excel file

// Check if the 'sheet' parameter is provided in the URL
if (isset($_GET['type'])) {
    $sheetName = $_GET['type'];
} else {
    // Return an error if the 'sheet' parameter is missing
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Sheet name parameter is missing.']);
    exit;
}

// Load the Excel file
$spreadsheet = IOFactory::load($filePath);

// Get the specific sheet by name
$sheet = $spreadsheet->getSheetByName($sheetName);

if ($sheet) {
    // Read data from the sheet (e.g., read all rows and columns)
    $data = $sheet->toArray(); // Converts sheet to a 2D array

    // Extract the first row (keys)
    $keys = array_shift($data);

    // Prepare the result array with keys as the first row
    $jsonResult = [];

    // Process each row and check for null values in columns
    foreach ($data as $row) {
        $rowData = [];
        foreach ($keys as $index => $key) {
            $value = isset($row[$index]) ? $row[$index] : null;
            // Only add value if it's not null
            if ($value !== null) {
                $rowData[$key] = $value;
            }
        }

        // Add the row to the result only if it contains data (non-null values)
        if (!empty($rowData)) {
            $jsonResult[] = $rowData;
        }
    }

    // Convert the result to JSON format and output it
    header('Content-Type: application/json'); // Set the content type to JSON
    echo json_encode($jsonResult); // Encode the array as JSON and output
} else {
    // Return error message in JSON format if sheet is not found
    header('Content-Type: application/json');
    echo json_encode(['error' => "Sheet '{$sheetName}' not found in the workbook."]);
}
?>
