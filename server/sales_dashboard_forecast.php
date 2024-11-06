<?php
require '../library/phpoffice/vendor/autoload.php'; // Ensure you include Composer's autoloader

use PhpOffice\PhpSpreadsheet\IOFactory;

$filePath = '../documents/excel_new_data_source/tgp_forecasted.xlsx'; // Path to the Excel file

// Check if the 'type' parameter (sheet name) is provided in the URL
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

    // Extract the header (first row) to map the data
    $keys = array_shift($data); // This assumes the first row contains column headers

    // Prepare the result array
    $jsonResult = [];

    // Process each row
    foreach ($data as $row) {
        // Prepare a new array to hold the processed row
        $rowData = [];

        // Check if row has sufficient columns to match expected keys
        if (count($row) < count($keys)) {
            continue; // Skip rows that don't have enough data
        }

        // Map each cell to its corresponding header
        foreach ($keys as $index => $key) {
            $value = isset($row[$index]) ? $row[$index] : null;

            // Only add non-null values for 'Date' and 'Quantity'
            if ($value !== null) {
                switch ($key) {
                    case 'Date':
                        $rowData['Date'] = $value;
                        break;
                    case 'Quantity':
                        $rowData['Quantity'] = $value;
                        break;
                    default:
                        // Ignore other columns
                        break;
                }
            }
        }

        // Add the row to the result only if it contains valid data
        if (!empty($rowData)) {
            $jsonResult[] = $rowData;
        }
    }

    // Convert the result to JSON format and output it
    header('Content-Type: application/json'); // Set the content type to JSON
    echo json_encode($jsonResult, JSON_PRETTY_PRINT); // Encode the array as JSON and output
} else {
    // Return error message in JSON format if the sheet is not found
    header('Content-Type: application/json');
    echo json_encode(['error' => "Sheet '{$sheetName}' not found in the workbook."]);
}
?>
