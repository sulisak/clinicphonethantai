<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/importproduct_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }



	public function index()
	{
$data['title'] = 'barcode';
        $this->barcodelayout('warehouse/barcode',$data);


    }

    public function png()
    {

     // Random Number
        $temp = rand(10000, 99999);

        $this->set_barcode($_GET['barcode']);

    }

    private function set_barcode($code)
    {
       //load library
        $this->load->library('zend');
        //load in folder Zend
        require_once('./application/libraries/Zend/Barcode.php');
        //generate barcode
        Zend_Barcode::render('code128', 'image', array('text'=>$code), array());


    }

}
