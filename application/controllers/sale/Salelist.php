<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salelist extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/salelist_model');
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


$data['tab'] = 'salelist';
$data['title'] = 'Sale List';
		$this->salelayout('sale/salelist',$data);
}




function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salelist_model->Get($data);

	}


function Get_detail()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salelist_model->Get_detail($data);

	}



function Seemorepay()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salelist_model->Seemorepay($data);

	}
	
	

function Getone()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salelist_model->Getone($data);

	}



  function Getonequotation()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  echo  $this->salelist_model->Getonequotation($data);

  	}




function Deletelist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


//Line notify
if($_SESSION['line_deletebill']=='1'){
$text = $_SESSION['owner_name']."\n++ບິນຖືກລົບ++\nເລກບິນ: ".$data['sale_runno']."\nເຫດຜົນ: ".$data['whydel']."\nໂດຍ: ".$_SESSION['name']."\nເວລາ " .date('H:i',time());
$this->Line_notify($text);
}
//Line notify



$resault =  $this->salelist_model->Getone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['product_price'] = $row->product_price;
  $data2['product_sale_num'] =   $row->product_sale_num;

$this->salelist_model->Updateproductaddstock($data2);

$getproductformat = $this->salepage_model->Getproductformat($data2);

//print_r($getproductformat);

for($i=1;$i<=count($getproductformat) ;$i++){

	$matnum = $getproductformat[$i-1]['product_num_relation']*$data2['product_sale_num'];
$this->salepage_model->Productmaterialaddstock($getproductformat[$i-1]['product_id_relation'],$matnum);
}


    }

 $this->salelist_model->Deletelist($data);


	}




function Deletelist_pass()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$md5password =  $data['billpassword'].$this->c2m_key;
    $data['billpassword'] = md5($md5password);

echo $this->salelist_model->Deletelist_pass($data);


	}
	
	





  function Deletequotationlist()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }

   $this->salelist_model->Deletequotationlist($data);


  	}






	}
