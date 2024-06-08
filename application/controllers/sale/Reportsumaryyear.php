<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportsumaryyear extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/reportsumaryyear_model');

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
		

$data['tab'] = 'reportsumaryyear';
$data['title'] = 'Report Sumary Year';
		$this->salelayout('sale/reportsumaryyear',$data);
}



function Daylist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->reportsumaryyear_model->Daylist1($data);
        
	}
	
	
	function Daylist2()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->reportsumaryyear_model->Daylist2($data);


        
	}
	


	function Excel() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->reportsumary_model->Exportexcel($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}



}