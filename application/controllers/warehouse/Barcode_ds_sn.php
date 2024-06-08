<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode_ds_sn extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/barcode_ds_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }



	public function index()
	{
$data['sn_code'] = $this->barcode_ds_model->Getsncode($_GET['im_no']);
$data['title'] = 'barcode_ds_sn';
        $this->deshboardlayout('warehouse/barcode_ds_sn',$data);


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





    function Getsetting()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }
    echo  $this->barcode_ds_model->Getsetting($data);

    }







    function Savesetting()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }
    echo  $this->barcode_ds_model->Savesetting($data);

    }




}
