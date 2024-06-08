<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */
try {
    // Enter the share name for your USB printer here
    $connector = new WindowsPrintConnector("XP-58");
    //$connector = new WindowsPrintConnector("Receipt Printer");

    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    /* Print some bold text */
    $printer -> setEmphasis(true);
    $printer -> text("ดีจ้า.\n");
    $printer -> setEmphasis(false);
    $printer -> feed();
    $printer -> text("สวัสดี \n for whatever\n");
    $printer -> feed(4);

    /* Bar-code at the end */
    $printer -> setJustification(Printer::JUSTIFY_CENTER);
    $printer -> barcode("987654321");
    $printer -> feed(4);
    
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
