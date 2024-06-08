<?php
class Brand extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('brand_model');
    }

    function index()
    {

$data['product_name'] = '';
$id['id'] = $_GET['id'];
$data['getcat'] = $this->brand_model->getcat($id);

if(isset($_GET['productid'])){
$id['productid'] = $_GET['productid'];
$data['getdata'] = $this->brand_model->getproduct($id);

foreach ($data['getdata'] as $row) {
   $data['product_name'] = $row['product_name'].' - ';
}


}else if(isset($_GET['catid'])){

$id['catid'] = $_GET['catid'];
$data['getdata'] = $this->brand_model->getfromcat($id);


}else{
$data['getdata'] = $this->brand_model->getall($id);
}


$getbrand = $this->brand_model->getbrand($id);

foreach ($getbrand as $row) {
   $data['brand_name'] = $row['owner_name'];
   $data['address'] = $row['owner_address'];
   $data['tel'] = $row['tel'];
}



$data['title'] = $data['product_name'].$data['brand_name'].'-รายการสินค้า';
        $this->brandlayout('webbody/brand',$data);

        
    }



    function Searchbox()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
        
echo $this->brand_model->Searchbox($data);
      
}




}