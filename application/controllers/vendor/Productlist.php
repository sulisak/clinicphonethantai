<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productlist extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('vendor/productlist_model');

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


$data['tab'] = 'productlist';
$data['title'] = 'Product List';
		$this->vendorlayout('vendor/productlist',$data);
}





 function Add()
    {

/*if(!isset($_POST['product_code']) || $_POST['product_code']==''){
exit();
} */

if(isset($_FILES["product_image"]["name"]) && $_FILES["product_image"]["name"] != ''){

if(!file_exists("pic/product_image/".$_SESSION['owner_id'])){
	mkdir("pic/product_image/".$_SESSION['owner_id'],0777,true);
}

    $upload = move_uploaded_file($_FILES["product_image"]["tmp_name"],"pic/product_image/".$_SESSION['owner_id']."/".time().md5($_FILES["product_image"]["name"]).'.jpg');

    $data['product_image'] = 'pic/product_image/'.$_SESSION['owner_id'].'/'.time().md5($_FILES["product_image"]["name"]).'.jpg';

}else{
$data['product_image'] = '';
}

if(!isset($_POST['product_code']) || $_POST['product_code']==''){
$data['product_code'] = time();
}else{
$data['product_code'] =  $_POST['product_code'];
}

$data['product_name'] = $_POST['product_name'];
$data['product_date_end'] = $_POST['product_date_end'];
$data['product_date_end2'] = strtotime($_POST['product_date_end']);
$data['product_des'] = $_POST['product_des'];
$data['product_price'] = $_POST['product_price'];
$data['product_wholesale_price'] = $_POST['product_wholesale_price'];
$data['product_pricebase'] = $_POST['product_pricebase'];
$data['product_category_id'] = $_POST['product_category_id'];
$data['product_unit_id'] = $_POST['product_unit_id'];
//$data['supplier_id'] = $_POST['supplier_id'];
$data['product_score'] = $_POST['product_score'];
$data['zone_id'] = $_POST['zone_id'];
$data['product_num_min'] = $_POST['product_num_min'];


		$success = $this->productlist_model->Add($data);

}



 function Update()
    {

if(!isset($_POST['product_code']) || $_POST['product_code']==''){
exit();
}
if(isset($_FILES["product_image"]["name"]) && $_FILES["product_image"]["name"] != ''){

if(!file_exists("pic/product_image/".$_SESSION['owner_id'])){
	mkdir("pic/product_image/".$_SESSION['owner_id'],0777,true);
}

    $upload = move_uploaded_file($_FILES["product_image"]["tmp_name"],"pic/product_image/".$_SESSION['owner_id']."/".time().md5($_FILES["product_image"]["name"]).'.jpg');

    $data['product_image'] = 'pic/product_image/'.$_SESSION['owner_id'].'/'.time().md5($_FILES["product_image"]["name"]).'.jpg';

}else{
 $data['product_image']  = $_POST['product_image2'];
}

$data['product_id'] =  $_POST['product_id'];
$data['product_code'] =  $_POST['product_code'];
$data['product_name'] = $_POST['product_name'];
$data['product_date_end'] = $_POST['product_date_end'];
$data['product_date_end2'] = strtotime($_POST['product_date_end']);
$data['product_des'] = $_POST['product_des'];
$data['product_price'] = $_POST['product_price'];
$data['product_wholesale_price'] = $_POST['product_wholesale_price'];
$data['product_pricebase'] = $_POST['product_pricebase'];
$data['product_category_id'] = $_POST['product_category_id'];

if($_POST['product_unit_id']!=null){
$data['product_unit_id'] = $_POST['product_unit_id'];
}else{
  $data['product_unit_id'] = '0';
}
//$data['supplier_id'] = $_POST['supplier_id'];
$data['product_score'] = $_POST['product_score'];
$data['zone_id'] = $_POST['zone_id'];
$data['product_num_min'] = $_POST['product_num_min'];

		$success = $this->productlist_model->Update($data);

}




    function Get()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Get($data);

}





function Searchpot()
{


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Searchpot($data);

}



function Getpotlist()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Getpotlist($data);

}



function Getpotlistshowall()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Getpotlistshowall($data);

}



function Addpot()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Addpot($data);

}


function Delpot()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Delpot($data);

}




    function Uploadexcel()
    {
$time = time().$_SESSION['owner_id'];

if(move_uploaded_file($_FILES["excel"]["tmp_name"], "upload/" . $time.'.csv'))
{
$file = 'upload/'.$time.'.csv';

$fileopen = fopen($file, "r");
//$data = fgetcsv( $fileopen , 3, ',' );

$i=0;
while (($dataexcel = fgetcsv($fileopen, 1000, ",")) !== FALSE) {
if($i>0){

if(!isset($dataexcel[2])){
	$data['product_pricebase'] = '0';
}else{
	$data['product_pricebase']  = $dataexcel[2];
}

if($dataexcel[3] ==null){
$data['product_price'] = '0';
}else{
	$data['product_price'] = $dataexcel[3];
}

if($dataexcel[1] ==null){
$data['product_name'] = '0';
}else{
	$data['product_name'] = $dataexcel[1];
}

if($dataexcel[0] ==null){
$data['product_code'] = '0';
}else{
	$data['product_code'] = $dataexcel[0];
}

$data['product_category_id'] = '1';
$data['product_image']  = '';
$data['product_des']  = '';
$data['product_wholesale_price'] = '';
$data['product_score'] = '';
$data['supplier_id'] = '';
$data['zone_id'] = '';
$data['product_date_end'] = '';
$data['product_date_end2'] = '';
$data['product_unit_id'] = '';
$data['product_num_min'] = '';

 $success = $this->productlist_model->Add($data);

}
$i=1;
}

fclose($fileopen);



}else{
	echo 'no';
}

}








    function Delete()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->productlist_model->Delete($data);
      if($success){
      	return true;
      }else{
      	return false;
      }

}





	}
