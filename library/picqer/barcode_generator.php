<?php

require 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

$generator = new BarcodeGeneratorPNG();
$barcode = $generator->getBarcode('123456789', $generator::TYPE_CODE_128);

header('Content-Type: image/png');
echo $barcode;

?>
