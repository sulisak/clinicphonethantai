<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_value extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/product_value_model');

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
		

$data['tab'] = 'product_value';
$data['title'] = 'Product Value';
		$this->salelayout('sale/product_value',$data);
}


	 function Getstock()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}	

echo $list = $this->product_value_model->Getstock($data);


      
}




function Opensn()
{


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
echo  $this->product_value_model->Opensn($data);

}





	 function Openone()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}	

echo $list = $this->product_value_model->Openone($data);



}





	 function Openone2()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}	

echo $list = $this->product_value_model->Openone2($data);


      
}


function Updatematok()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}	

$success = $this->product_value_model->Updatematok($data);


      
}






	}

