<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productother extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/productother_model');

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


$data['tab'] = 'productother';
$data['title'] = 'Product Other';
		$this->warehouselayout('warehouse/productother',$data);
}





 function Add()
    {

/*if(!isset($_POST['product_code']) || $_POST['product_code']==''){
exit();
} */

if(isset($_FILES["product_ot_image"]["name"]) && $_FILES["product_ot_image"]["name"] != ''){

if(!file_exists("pic/product_image/".$_SESSION['owner_id'])){
	mkdir("pic/product_image/".$_SESSION['owner_id'],0777,true);
}

    $upload = move_uploaded_file($_FILES["product_ot_image"]["tmp_name"],"pic/product_image/".$_SESSION['owner_id']."/".time().md5($_FILES["product_ot_image"]["name"]).'.jpg');

    $data['product_ot_image'] = 'pic/product_image/'.$_SESSION['owner_id'].'/'.time().md5($_FILES["product_ot_image"]["name"]).'.jpg';

}else{
$data['product_ot_image'] = '';
}


$data['product_ot_name'] = $_POST['product_ot_name'];
$data['product_ot_price'] = $_POST['product_ot_price'];
$data['show_all'] = $_POST['show_all'];
$data['type'] = $_POST['type'];

		$success = $this->productother_model->Add($data);

}



 function Update()
    {


if(isset($_FILES["product_ot_image"]["name"]) && $_FILES["product_ot_image"]["name"] != ''){

if(!file_exists("pic/product_image/".$_SESSION['owner_id'])){
	mkdir("pic/product_image/".$_SESSION['owner_id'],0777,true);
}

    $upload = move_uploaded_file($_FILES["product_ot_image"]["tmp_name"],"pic/product_image/".$_SESSION['owner_id']."/".time().md5($_FILES["product_ot_image"]["name"]).'.jpg');

    $data['product_ot_image'] = 'pic/product_image/'.$_SESSION['owner_id'].'/'.time().md5($_FILES["product_ot_image"]["name"]).'.jpg';

}else{
 $data['product_ot_image']  = $_POST['product_ot_image2'];
}

$data['pot_ID'] =  $_POST['pot_ID'];
$data['product_ot_name'] = $_POST['product_ot_name'];
$data['product_ot_price'] = $_POST['product_ot_price'];
$data['show_all'] = $_POST['show_all'];
$data['type'] = $_POST['type'];

		$success = $this->productother_model->Update($data);

}




    function Get()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productother_model->Get($data);

}












    function Delete()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->productother_model->Delete($data);
      if($success){
      	return true;
      }else{
      	return false;
      }

}





	}
