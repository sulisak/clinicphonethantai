<?php
	 header( 'Content-Type: image/jpg' );
if(!isset($_SERVER["HTTP_REFERER"])){
//die();
	}
		
include "src/BarcodeGenerator.php";
include "src/BarcodeGeneratorJPG.php";

$code = $_GET['barcode'];//รหัส Barcode ที่ต้องการสร้าง

$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
$border = 2;//กำหนดความหน้าของเส้น Barcode
$height = 50;//กำหนดความสูงของ Barcode
$width = 100;

echo $generator->getBarcode($code, $generator::TYPE_CODE_128,1,50,array(0,0,0)); 


?>
