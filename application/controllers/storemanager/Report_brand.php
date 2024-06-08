<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_brand extends MY_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('storemanager/store_brand_model');
        $this->load->model('storemanager/store_reportbrand_model');

 if(!isset($_SESSION['store_manager_id']) || $_SESSION['store_type']!='0'){
            header( "location: ".$this->base_url."/storemanager/login" );
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

		$data['tab'] = 'report_brand';
		$data['title'] = 'Report Brand';

		$this->storemanagerlayout('storemanager/report_brand',$data);
	}

	


function Daylist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->store_reportbrand_model->Daylist($data);
        
	}


	function Excel() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->store_reportbrand_model->Exportexcel($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}


function Getbrand()
    {
 	
echo $this->store_brand_model->Get();
      
}


}
