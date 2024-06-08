<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packing_list extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/packing_list_model');

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


$data['tab'] = 'packing_list';
$data['title'] = 'Packing List';
		$this->warehouselayout('warehouse/packing_list',$data);
}




function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Get($data);

	}



function Get_product_notsend()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Get_product_notsend($data);

	}
	


function Get_product_notsend_mat()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Get_product_notsend_mat($data);

	}
	
	
	function Get_product_notsend_mat_fml()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Get_product_notsend_mat_fml($data);

	}




function Get_detail()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Get_detail($data);

	}



	

function Getone()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Getone($data);

	}




function Checkbarcode()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Checkbarcode($data);

	}
	
	
	
	function Checkbarcode_new()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Checkbarcode_new($data);

	}
	
	
	function Checkbarcode_tkn_save()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->packing_list_model->Checkbarcode_tkn_save($data);

	}
	
	
	
	
	
	





	}
