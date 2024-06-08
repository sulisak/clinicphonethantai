<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pawnreturnlist extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('pawn/pawnlist_model');

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
		

$data['tab'] = 'pawnreturnlist';
$data['title'] = 'Pawn Return List';
		$this->pawnlayout('pawn/pawnreturnlist',$data);
}





 function Add()
    {
 

$data['cus_name'] = $_POST['cus_name'];
$data['cus_code'] = $_POST['cus_code'];
$data['cus_address'] = $_POST['cus_address'];
$data['cus_tel'] = $_POST['cus_tel'];
$data['product_name'] = $_POST['product_name'];
$data['product_sn'] = $_POST['product_sn'];
$data['pawn_money'] = $_POST['pawn_money'];
$data['pawn_percent'] = $_POST['pawn_percent'];
$data['end_date'] = strtotime($_POST['end_date']);
$data['add_time'] = time();

		$success = $this->pawnlist_model->Add($data);
      
}



 function Update()
    {
 


$data['pawn_id'] =  $_POST['pawn_id'];
$data['cus_name'] = $_POST['cus_name'];
$data['cus_code'] = $_POST['cus_code'];
$data['cus_address'] = $_POST['cus_address'];
$data['cus_tel'] = $_POST['cus_tel'];
$data['product_name'] = $_POST['product_name'];
$data['product_sn'] = $_POST['product_sn'];
$data['pawn_money'] = $_POST['pawn_money'];
$data['pawn_percent'] = $_POST['pawn_percent'];
$data['end_date'] = strtotime($_POST['end_date']);

		$success = $this->pawnlist_model->Update($data);
      
}




    function Get()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->pawnlist_model->Get($data);

}





	






    function Delete()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->pawnlist_model->Delete($data);
      if($success){
      	return true;
      }else{
      	return false;
      }

}













 function Pawnadddateok()
    {
 $data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
		$success = $this->pawnlist_model->Pawnadddateok($data);
      
}




function Pawnreturnconfirm()
    {
 $data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
		$success = $this->pawnlist_model->Pawnreturnconfirm($data);
      
}









	}

