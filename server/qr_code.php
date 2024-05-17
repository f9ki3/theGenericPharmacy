<?php
require '../library/endroid/vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// Define the text to encode
$text = 'https://www.example.com';

// Create a QR code
$qrCode = QrCode::create($text)
    ->setSize(300) // Size of the QR code
    ->setMargin(10); // Margin around the QR code

// Create a writer and save the QR code to a file
$writer = new PngWriter();
$writer->write($qrCode)->saveToFile(__DIR__ . '../uploads/qrcode.png');

// Display the QR code as an image
header('Content-Type: '.$qrCode->getMimeTypePart());
echo $writer->write($qrCode)->getString();
?>