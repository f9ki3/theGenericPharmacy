<?php
require '../library/phpoffice/vendor/autoload.php'; // Include Composer's autoloader

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

$filePath = '../documents/excel_new_data_source/categories2.csv'; // Path to the CSV file
$sheetName = 'categories';

try {
    // Load the file based on its extension
    $fileType = IOFactory::identify($filePath);
    $reader = IOFactory::createReader($fileType);
    
    // Load the spreadsheet
    $spreadsheet = $reader->load($filePath);

    // Check if the sheet exists and retrieve it
    $sheet = ($fileType === 'Csv') ? $spreadsheet->getActiveSheet() : $spreadsheet->getSheetByName($sheetName);

    if ($sheet) {
        // Convert the sheet to a 2D array
        $data = $sheet->toArray();

        // Extract the first row as keys
        $keys = array_shift($data);
        $jsonResult = [];

        // Process each row with key-value pairs
        foreach ($data as $row) {
            $rowData = [];
            foreach ($keys as $index => $key) {
                $value = isset($row[$index]) ? $row[$index] : null;
                if ($value !== null) {
                    $rowData[$key] = $value;
                }
            }
            if (!empty($rowData)) {
                $jsonResult[] = $rowData;
            }
        }

        // Output as JSON
        header('Content-Type: application/json');
        echo json_encode($jsonResult);
    } else {
        throw new Exception("Sheet '{$sheetName}' not found in the workbook.");
    }
} catch (Exception $e) {
    // Return error in JSON format
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}
