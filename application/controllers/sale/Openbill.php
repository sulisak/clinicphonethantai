<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Openbill extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/salepage_model');

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
		

$data['tab'] = 'openbill';
$data['title'] = 'Open Bill';
		$this->deshboardlayout('sale/openbill',$data);
}




function Getproductlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlist($data);
        
	}

	function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Findproduct($data);
        
	}



function Customer()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Customer($data);
        
	}


	function Gettoday()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Gettoday($data);
        
	}


function Savesale()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

$header_code = time();

for($i=1;$i<=count($data['listsale']) ;$i++){


$data['sale_runno'] = $header_code;
$data['adddate'] = $header_code;

	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
$data['listsale'][$i-1]['sale_runno'] = $header_code;
$data['listsale'][$i-1]['adddate'] = $header_code;
	
if($this->salepage_model->Adddetail($data['listsale'][$i-1])){
	$this->salepage_model->Updateproductdeletestock($data['listsale'][$i-1]);
}




if($i==1){
$this->salepage_model->Addheader($data);

}

}

}


        
	}


	}

