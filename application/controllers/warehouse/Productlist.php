<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productlist extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/productlist_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

//ini_set("memory_limit","100000000M");


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
		$this->warehouselayout('warehouse/productlist',$data);
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

$imgname = "pic/product_image/".$_SESSION['owner_id']."/".time().md5($_FILES["product_image"]["name"]).'.jpg';

    //$upload = move_uploaded_file($_FILES["product_image"]["tmp_name"],$imgname);

    $data['product_image'] = $imgname;




    $images = $_FILES["product_image"]["tmp_name"];

    $img = getimagesize( $images );

    if (image_type_to_mime_type($img[2]) == 'image/jpeg'){
      $images_orig = ImageCreateFromJPEG($images);
      $new_images = time()."_".md5($_FILES["product_image"]["name"]).'.jpg';

    }else if (image_type_to_mime_type($img[2]) == 'image/png'){
      $images_orig = ImageCreateFromPNG($images);
      $new_images = time()."_".md5($_FILES["product_image"]["name"]).'.jpg';

    }else if (image_type_to_mime_type($img[2]) == 'image/gif'){
      $images_orig = ImageCreateFromGIF($images);
      $new_images = time()."_".md5($_FILES["product_image"]["name"]).'.jpg';
    }

    $photoX = ImagesX($images_orig);
    $photoY = ImagesY($images_orig);

    if($photoX >=3200){
      $width=3200; //*** Fix Width & Heigh (Autu caculate) ***//
    }else{
      $width=$photoX;
    }

    $size=GetimageSize($images);
    $height=round($width*$size[1]/$size[0]);

    $images_fin = ImageCreateTrueColor($width, $height);
    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
    ImageJPEG($images_fin,$imgname);
    ImageDestroy($images_orig);
    ImageDestroy($images_fin);



}else{
$data['product_image'] = '';
}

if(!isset($_POST['product_code']) || $_POST['product_code']==''){
$data['product_code'] = rand(100000,999999);
}else{
$data['product_code'] =  $_POST['product_code'];
}

$data['product_name'] = $_POST['product_name'];
$data['product_date_end'] = $_POST['product_date_end'];
$data['product_date_end2'] = strtotime($_POST['product_date_end']);
$data['product_des'] = $_POST['product_des'];
$data['product_price'] = $_POST['product_price'];
$data['product_wholesale_price'] = $_POST['product_wholesale_price'];
$data['product_price3'] = $_POST['product_price3'];
$data['product_price4'] = $_POST['product_price4'];
$data['product_price5'] = $_POST['product_price5'];
$data['product_pricebase'] = $_POST['product_pricebase'];
$data['product_category_id'] = $_POST['product_category_id'];
$data['product_unit_id'] = $_POST['product_unit_id'];
$data['supplier_id'] = $_POST['supplier_id'];
$data['product_score'] = $_POST['product_score'];
$data['zone_id'] = $_POST['zone_id'];
$data['count_stock'] = $_POST['count_stock'];


$data['product_num_min'] = $_POST['product_num_min'];
$data['is_course'] = $_POST['is_course'];
$data['product_weight'] = $_POST['product_weight'];

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

$imgname = "pic/product_image/".$_SESSION['owner_id']."/".time().md5($_FILES["product_image"]["name"]).'.jpg';

    //$upload = move_uploaded_file($_FILES["product_image"]["tmp_name"],$imgname);

    $data['product_image'] = $imgname;




    $images = $_FILES["product_image"]["tmp_name"];

    $img = getimagesize( $images );

    if (image_type_to_mime_type($img[2]) == 'image/jpeg'){
      $images_orig = ImageCreateFromJPEG($images);
      $new_images = time()."_".md5($_FILES["product_image"]["name"]).'.jpg';

    }else if (image_type_to_mime_type($img[2]) == 'image/png'){
      $images_orig = ImageCreateFromPNG($images);
      $new_images = time()."_".md5($_FILES["product_image"]["name"]).'.jpg';

    }else if (image_type_to_mime_type($img[2]) == 'image/gif'){
      $images_orig = ImageCreateFromGIF($images);
      $new_images = time()."_".md5($_FILES["product_image"]["name"]).'.jpg';
    }

    $photoX = ImagesX($images_orig);
    $photoY = ImagesY($images_orig);

    if($photoX >=3200){
      $width=3200; //*** Fix Width & Heigh (Autu caculate) ***//
    }else{
      $width=$photoX;
    }

    $size=GetimageSize($images);
    $height=round($width*$size[1]/$size[0]);

    $images_fin = ImageCreateTrueColor($width, $height);
    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
    ImageJPEG($images_fin,$imgname);
    ImageDestroy($images_orig);
    ImageDestroy($images_fin);



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
$data['product_price3'] = $_POST['product_price3'];
$data['product_price4'] = $_POST['product_price4'];
$data['product_price5'] = $_POST['product_price5'];
$data['product_pricebase'] = $_POST['product_pricebase'];
$data['product_category_id'] = $_POST['product_category_id'];
$data['product_unit_id'] = $_POST['product_unit_id'];
$data['supplier_id'] = $_POST['supplier_id'];
$data['product_score'] = $_POST['product_score'];
$data['zone_id'] = $_POST['zone_id'];
$data['count_stock'] = $_POST['count_stock'];
$data['product_num_min'] = $_POST['product_num_min'];
$data['is_course'] = $_POST['is_course'];
$data['product_weight'] = $_POST['product_weight'];

		$success = $this->productlist_model->Update($data);

}




function Addsizecolor()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$data2['product_price'] = $data['product_price'];
$data2['product_category_id'] = $data['product_category_id'];


$csc = count($data['sizelist_checked']);
$clc = count($data['colorlist_checked']);

if($csc != 0){
foreach($data['sizelist_checked'] as $value1){
	
if($clc != 0){
	 foreach($data['colorlist_checked'] as $value2){
		 
	  $data2['product_name'] = $data['product_name'].' 
	  '.$value1['size_name'].' 
	  '.$value2['color_name'];
	  $this->productlist_model->Addsizecolor($data2);

	 }
}else{
$data2['product_name'] = $data['product_name'].' 
	  '.$value1['size_name'];
	  $this->productlist_model->Addsizecolor($data2);
}

}
}else{

	 foreach($data['colorlist_checked'] as $value3){
	$data3['product_price'] = $data['product_price'];
$data3['product_category_id'] = $data['product_category_id'];	 
	  $data3['product_name'] = $data['product_name'].'  
	  '.$value3['color_name'];
	  $this->productlist_model->Addsizecolor($data3);

	 }

}







}




    function Get()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Get($data);

}


    function Updatenopic()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Updatenopic($data);

}






    function Changecodethtoen()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$code = $this->C2mpos_barcode_th_to_en($data['product_code']);
echo  $code;

}





function Searchpot()
{


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Searchpot($data);

}







function Opensn()
{


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Opensn($data);

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






function Update_vat()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Update_vat($data);

}




function Update_popup_pricenum()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Update_popup_pricenum($data);

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




if($dataexcel[0] ==null){
$data['product_code'] = rand(100000,999999);
}else{
	$data['product_code'] = str_replace(' ', '', $dataexcel[0]);
}


if($dataexcel[1] ==null){
$data['product_name'] = '0';
}else{
	$data['product_name'] = $dataexcel[1];
}



if($dataexcel[2] ==null){
$data['product_stock_num'] = '';
}else{
	$data['product_stock_num'] = $dataexcel[2];
}




if($dataexcel[3] ==null){
	$data['product_pricebase'] = '0';
}else{
	$data['product_pricebase']  = $dataexcel[3];
}


if($dataexcel[4] ==null){
$data['product_price'] = '0';
}else{
	$data['product_price'] = $dataexcel[4];
}





if($dataexcel[5] ==null){
$data['product_wholesale_price'] = '0';
}else{
	$data['product_wholesale_price'] = $dataexcel[5];
}


if($dataexcel[6] ==null){
$data['product_price3'] = '0';
}else{
	$data['product_price3'] = $dataexcel[6];
}


if($dataexcel[7] ==null){
$data['product_price4'] = '0';
}else{
	$data['product_price4'] = $dataexcel[7];
}


if($dataexcel[8] ==null){
$data['product_price5'] = '0';
}else{
	$data['product_price5'] = $dataexcel[8];
}


if($dataexcel[9] ==null){
$data['product_score'] = '0';
}else{
	$data['product_score'] = $dataexcel[9];
}


if($dataexcel[10] ==null){
$data['product_des'] = '';
}else{
	$data['product_des'] = $dataexcel[10];
}



$data['product_category_id'] = $_POST['product_category_id'];
$data['product_image']  = '';


$data['supplier_id'] = '';
$data['zone_id'] = '';
$data['product_date_end'] = '';
$data['product_date_end2'] = '';
$data['product_unit_id'] = '';
$data['product_num_min'] = '';



$data['count_stock'] = 0;
$data['is_course'] = 0;
$data['product_weight'] = '0';



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


//Line notify
if($_SESSION['line_deleteproduct']=='1'){
$text = $_SESSION['owner_name']."\n++ສິນຄ້າຖຶກລົບ++\n".$data['product_name']."\nໂດຍ: ".$_SESSION['name']."\nເວລາ " .date('H:i',time());
$this->Line_notify($text);
}
//Line notify



$success = $this->productlist_model->Delete($data);
      if($success){
      	return true;
      }else{
      	return false;
      }

}






function Searchpot2()
{


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Searchpot2($data);

}



function Getpotlist2()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Getpotlist2($data);

}



function Getpotall2()
{
echo  $this->productlist_model->Getpotall2();

}




function Getpotlistshowall2()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Getpotlistshowall2($data);

}



function Addpot2()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Addpot2($data);

}


function Delpot2()
{

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->productlist_model->Delpot2($data);

}




function Downloadexcel() {
       

 $list = $this->productlist_model->Downloadexcel();


    $this->to_excel($list, 'c2mpos-product');

 

}






	}
