<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/stock_model');

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
		

$data['tab'] = 'stock';
$data['title'] = 'Product Stock';
		$this->warehouselayout('warehouse/stock',$data);
}


	 function Getstock()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}	

echo $list = $this->stock_model->Getstock($data);


      
}






function Updatematok()
    {


$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}	


//Line notify
// if($_SESSION['line_editstock']=='1'){
// $text = $_SESSION['owner_name']."\n++ແກ້ໄຂສະຕັອກ++\n".$data['product_name']."\nຈາກ: ".number_format($data['product_stock_num'])."\nເປັນ: ".number_format($data['product_stock_num_change'])."\nໂດຍ: ".$_SESSION['name']."\nເວລາ " .date('H:i',time());
// $this->Line_notify($text);
// }
//Line notify



$success = $this->stock_model->Updatematok($data);


      
}




	function Product_num_min_noti()
    {

if(!isset($_SESSION['remove_num_min_noti_modal'])){
echo  $this->stock_model->Product_num_min_noti();
}

	}
	
	
	
	
	function Remove_num_min_noti_modal()
    {

$data = array(
           'remove_num_min_noti_modal' => '1'
         );

$this->session->set_userdata($data);
header( "location: ".$this->base_url );

	}
	
	
	



	}

