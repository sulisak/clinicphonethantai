<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_return extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/product_return_model');
		$this->load->model('warehouse/importproduct_model');

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
		

$data['tab'] = 'product_return';
$data['title'] = 'Product Return';
		$this->deshboardlayout('sale/product_return',$data);
}




function Getproductlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->product_return_model->Getproductlist($data);
        
	}

	function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->product_return_model->Findproduct($data);
        
	}



function Customer()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->product_return_model->Customer($data);
        
	}


	function Gettoday()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->product_return_model->Gettoday($data);
        
	}
	
	
	
	
	
		function Findrunno()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->product_return_model->Findrunno($data);
        
	}
	
	


function Savesale()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

$header_code = time();

for($i=1;$i<=count($data['listsale']) ;$i++){

$data['return_runno'] = 'r'.$header_code;
$data['adddate'] = $header_code;

	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
$data['listsale'][$i-1]['return_runno'] = 'r'.$header_code;
$data['listsale'][$i-1]['adddate'] = $header_code;
	
if($this->product_return_model->Adddetail($data['listsale'][$i-1])){
	$this->product_return_model->Updateproductaddstock($data['listsale'][$i-1]);
}



$getrelationlist = $this->importproduct_model->Getrelationlist($data['listsale'][$i-1]['product_id']);

echo $data['listsale'][$i-1]['product_id'];
//print_r($getrelationlist);
foreach ($getrelationlist as $key => $value) {
$this->importproduct_model->Updateproductimportstock_relation($value['product_id_relation'],($value['product_num_relation']*$data['listsale'][$i-1]['product_sale_num']));

}




if($i==1){

$this->product_return_model->Addheader($data);

}

}

}


        
	}


	function Getone()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->product_return_model->Getone($data);
        
	}

function Deletelist()
    {

$data = json_decode(file_get_contents("php://input"),true); 
if(!isset($data)){
exit();
}       


$resault =  $this->product_return_model->Getone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['product_price'] = $row->product_price;
  $data2['product_sale_num'] =   $row->product_sale_num;

$this->product_return_model->Updateproductdeletestock($data2);


    }

 $this->product_return_model->Deletelist($data);


	}





	}

