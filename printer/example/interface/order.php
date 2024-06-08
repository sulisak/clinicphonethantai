<?php








/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

/* Most printers are open on port 9100, so you just need to know the IP 
 * address of your receipt printer, and then fsockopen() it on that port.
 */
try {

$data = json_decode(file_get_contents("php://input"),true);

$json = json_encode($data['data']);
$array = json_decode( $json, true );

//echo $array[0]['product_name'];


foreach($array as $item) { //foreach element in $arr
    echo $item['printer_ip'].'<br />'; //etc

        $connector = new NetworkPrintConnector($item['printer_ip'], 9100);
    
    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);

    $fonts = array(
    Printer::FONT_A,
    Printer::FONT_B,
    Printer::FONT_C);

    $justification = array(
    Printer::JUSTIFY_LEFT,
    Printer::JUSTIFY_CENTER,
    Printer::JUSTIFY_RIGHT);



    $printer -> setJustification($justification[1]);
    $printer -> setFont($fonts[0]);
    $printer -> text("".$item['food_table_name']."\n");
    $printer -> setFont();
    $printer -> setJustification();

    $printer -> setFont($fonts[0]);
    $printer -> text($item['product_name']." (".$item['product_sale_num'].") "."\n");
    $printer -> setFont();

    $printer -> setJustification($justification[1]);
    $printer -> setFont($fonts[0]);
    $printer -> text("Note: ".$item['note_order']."\n");
    $printer -> setFont();
    $printer -> setJustification();


    $printer -> setJustification($justification[1]);
    $printer -> setFont($fonts[1]);
    $printer -> text("".date("d-m-Y H:i:s",time())."\n");
    $printer -> setFont();
    $printer -> setJustification();

    $printer -> feed(2);
    $printer -> cut();
    
    /* Close printer */
    $printer -> close();


}






} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
