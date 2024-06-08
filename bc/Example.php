<?php
include "src/BarcodeGenerator.php";
include "src/BarcodeGeneratorHTML.php";


function barcode($code){
	
	$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
	$border = 2;//กำหนดความหน้าของเส้น Barcode
	$height = 40;//กำหนดความสูงของ Barcode

	return $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);

}

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "barcode";

// สร้างการเชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($servername, $username, $password,$db_name);

//กำหนด charset ให้เป็น utf8 เพื่อรองรับภาษาไทย
mysqli_set_charset($conn,"utf8");

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if (!$conn) {
	//กรณีเชื่อมต่อไม่ได้
	die("Connection failed: " . mysqli_connect_error());
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Barcode Genrator</title>
  </head>
  <body>
  <div class="container">
  
    <h4>Barcode Genrator</h4>
	
	<?php
		$sql = "SELECT * FROM barcode";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			
			echo "<table class='table'>";
				
				while ($r = mysqli_fetch_assoc($result)) {
					
					echo "<tr>";
						echo "<td>";
						echo barcode($r['code'])."<br>";
						echo "รหัส : ".$r['code']."<br>";
						echo "สินค้า : ".$r['product']."<br>";
						echo "ราคา : ".$r['price']."&nbsp;บาท";
						echo "</td>";
					echo "</tr>";
				}
				
			echo "</table>";
		}

		mysqli_close($conn);
	?>
	
   </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
