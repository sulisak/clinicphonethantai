<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salereport extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/salereport_model');

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
		

$data['tab'] = 'salereport';
$data['title'] = 'Sale Report';
		$this->salelayout('sale/salereport',$data);
}



function Daylist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salereport_model->Daylist($data);
        
	}


function Salelistdatail()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salereport_model->Salelistdatail($data);
        
	}



function Salelistdatailinlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salereport_model->Salelistdatailinlist($data);
        
	}


	

	function Discountlastlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salereport_model->Discountlastlist($data);
        
	}




		function Pawnlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salereport_model->Pawnlist($data);
        
	}



	function Excel() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->salereport_model->Exportexcel($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}



}