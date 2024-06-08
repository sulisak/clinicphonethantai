<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode_ds_full extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/barcode_ds_full_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }



	public function index()
	{
$data['title'] = 'barcode_ds_full';
$data['barcode_array'] = $this->barcode_ds_full_model->Getall_array();
        $this->deshboardlayout('warehouse/barcode_ds_full',$data);


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





    function Getall()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }
    echo  $this->barcode_ds_full_model->Getall($data);

    }







    function Saveall()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }
	$data['data'] = json_encode($data['data'], JSON_UNESCAPED_UNICODE);
    echo  $this->barcode_ds_full_model->Saveall($data);

    }




}
