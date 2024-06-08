<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricebycus extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('salesetting/pricebycus_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }
        
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		

$data['tab'] = 'pricebycus';
$data['title'] = 'Price by Customer';
		$this->salesettinglayout('salesetting/pricebycus',$data);
}






function Getproduct()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		echo  $this->pricebycus_model->Getproduct($data);
      
}

function Getproductcus()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		echo  $this->pricebycus_model->Getproductcus($data);
      
}






    function Get()
    {
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$list = $this->pricebycus_model->Mycustomer($data);
 $all = $this->pricebycus_model->Allmycustomer();
				
		
		if($list)
		{
			echo '{ '.$list.',
			"all": '.$all.' }';
		}
		else{
			echo 'no';
		}
      
}




    function Saveprice()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->pricebycus_model->Saveprice($data);
   

}






    function Deleteprice()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->pricebycus_model->Deleteprice($data);
      

}



function Excel() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->pricebycus_model->Exportexcel($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}







	}

