<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addnew extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('accounting/addnew_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'addnew';
$data['title'] = 'New Accounting';
		$this->accountinglayout('accounting/addnew',$data);
}



 function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$runnolast = $this->addnew_model->Get_taxinvoice_runnolast();

if($runnolast){
	$runnonow = $runnolast[0]['taxinvoice_runno'];

$runnoplus = $runnonow + '1';
$taxinvoice_runno = str_pad($runnoplus, 10, "0", STR_PAD_LEFT);
}else{
	$taxinvoice_runno = '0000000001';
}

$data['taxinvoice_runno'] = $taxinvoice_runno;



$getrunno = $this->addnew_model->Get_runno($data);
$runno = $getrunno[0]['sale_runno'];

if($runno){
echo 'dup';
}else{
echo  $this->addnew_model->Add($data);
}



}



function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->addnew_model->Get($data);

	}








    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->buy_model->Getimportone($data);

}



  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$resault =  $this->buy_model->Getimportone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['detailpricebase'] = $row->importproduct_detail_pricebase;
  $data2['detailnum'] =   $row->importproduct_detail_num;

//$this->buy_model->Updateproductdeletestock($data2);


    }

$this->buy_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->buy_model->Findproduct($data);

    }




    function Searchbillfind()
        {

    $data = json_decode(file_get_contents("php://input"),true);
    echo  $this->addnew_model->Searchbillfind($data);

        }



        function Findcustomer()
            {

        $data = json_decode(file_get_contents("php://input"),true);
        echo  $this->addnew_model->Findcustomer($data);

            }



            function Addbill()
                {

            $data = json_decode(file_get_contents("php://input"),true);
            echo  $this->addnew_model->Addbill($data);

                }




	}
