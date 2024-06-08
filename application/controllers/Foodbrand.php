<?php
class Foodbrand extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('food_brand_model');
    }

    function index()
    {

$data['food_name'] = '';
$id['id'] = $_GET['id'];
$data['getcat'] = $this->food_brand_model->getcat($id);

if(isset($_GET['foodid'])){
$id['foodid'] = $_GET['foodid'];
$data['getdata'] = $this->food_brand_model->getproduct($id);

foreach ($data['getdata'] as $row) {
   $data['food_name'] = $row['food_name'].' - ';
}


}else if(isset($_GET['catid'])){

$id['catid'] = $_GET['catid'];
$data['getdata'] = $this->food_brand_model->getfromcat($id);


}else{
$data['getdata'] = $this->food_brand_model->getall($id);
}


$getbrand = $this->food_brand_model->getbrand($id);

foreach ($getbrand as $row) {
   $data['food_brand_name'] = $row['food_brand_name'];
   $data['food_brand_address'] = $row['food_brand_address'];
   $data['food_brand_tel'] = $row['food_brand_tel'];
}



$data['title'] = $data['food_name'].$data['food_brand_name'].'-รายการสินค้า';
        $this->foodbrandlayout('webbody/foodbrand',$data);

        
    }



    function Searchbox()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
        
echo $this->food_brand_model->Searchbox($data);
      
}




}