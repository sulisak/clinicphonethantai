<?php
 class MY_Controller extends CI_Controller {


 	 public function __construct()
    {
        parent::__construct();
         $this->load->library('session');
		 $this->load->model('home_model');

        $this->base_url = 'http://'.$_SERVER['HTTP_HOST'].'/clinicphonethantai';
		$this->base_url_local = 'http://localhost/clinicphonethantai';


       if(!isset($_SESSION['lang'])){
        $this->base_lang = 'lao';
        }else{
          $this->base_lang = $_SESSION['lang'];
        }


$this->c2m_key = 'S#b*7&&@sDFR+=2!@3Bmcd';
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 10);

//ini_set('memory_limit', '-1');
//ini_set('max_execution_time', 1000);


$this->mainmenu_th = '[
{"id":"0","name":"หน้าจอขายสินค้า","status":false},
{"id":"1","name":"สินค้า/สต็อก/บาร์โค้ด","status":false},
{"id":"2","name":"เครดิต/ค้างชำระ","status":false},
{"id":"3","name":"ผลิตสินค้า/สูตรการผลิต","status":false},
{"id":"4","name":"จัดทำดัชนีบาร์โค้ด","status":false},
{"id":"5","name":"จัดซื้อ/บันทึกรายจ่าย","status":false},
{"id":"6","name":"ลูกค้าสมาชิก","status":false},
{"id":"7","name":"รายงาน","status":false},
{"id":"8","name":"พนักงาน/ขาดลามาสาย/จ่ายเงินเดือน","status":false},
{"id":"9","name":"ตั้งค่าการขาย","status":false},
{"id":"10","name":"จัดการผู้ใช้งาน","status":false},
{"id":"11","name":"จัดการร้าน/สาขา","status":false},
{"id":"12","name":"ตั้งค่าใบเสร็จ","status":false},
{"id":"13","name":"จอลูกค้า","status":false},
{"id":"14","name":"Backup Database","status":false},
{"id":"15","name":"ลบประวัติการขายทั้งหมด","status":false},
{"id":"16","name":"ลบรายการสินค้าทั้งหมด","status":false},
{"id":"17","name":"ต้นทุนสินค้า","status":false},

{"id":"18","faid":"0","name":"ลบบิล","status":false},
{"id":"19","faid":"0","name":"ลบสินค้าที่ลูกค้าสั่งซื้อ ทีละรายการ","status":false},
{"id":"20","faid":"0","name":"ส่วนลดท้ายบิล","status":false},
{"id":"21","faid":"0","name":"ส่วนลดสินค้า","status":false},
{"id":"22","faid":"0","name":"เปลี่ยนราคาสินค้า","status":false},
{"id":"23","faid":"0","name":"เปลี่ยนจำนวนสินค้า","status":false},

{"id":"24","faid":"1","name":"ลบรายการสินค้า","status":false},
{"id":"25","faid":"1","name":"แก้ไขรายการสินค้า","status":false},

{"id":"26","faid":"0","name":"เลือกวันที่ขาย","status":false},

{"id":"27","name":"การแจ้งเตือน","status":false},
{"id":"28","faid":"27","name":"แจ้งเตือน วันเกิดลูกค้า","status":false},

{"id":"29","faid":"0","name":"ปุ่มเปิดลิ้นชัก","status":false},

{"id":"30","faid":"27","name":"แจ้งเตือน สินค้าเหลือน้อย","status":false},
{"id":"31","faid":"27","name":"แจ้งเตือน ใบสั่งซื้อสินค้าอัตโนมัติ","status":false},

{"id":"32","faid":"0","name":"ลบสินค้าที่ลูกค้าสั่งซื้อ ทั้งหมด","status":false}
]';





$this->mainmenu_lao = '[
{"id":"0","name":"ໜ້າຈໍຂາຍສິນຄ້າ","status":false},
{"id":"1","name":"ສິນຄ້າ/ສະຕັອກ/ບາໂຄ້ດ","status":false},
{"id":"2","name":"ເຄດິດ/ຄ້າງຊຳລະ","status":false},
{"id":"3","name":"ຜະລິດສິນຄ້າ/ສູດການຜະລິດ","status":false},
{"id":"4","name":"ສ້າງບາໂຄ້ດ","status":false},
{"id":"5","name":"ຈັດຊື້/ບັນທຶກລາຍຈ່າຍ","status":false},
{"id":"6","name":"ລູກຄ້າສະມາຊິກ","status":false},
{"id":"7","name":"ລາຍງານ","status":false},
{"id":"8","name":"ພະນັກງານ/ຂາດລາມາສວາຍ/ຈ່າຍເງິນເດືອນ","status":false},
{"id":"9","name":"ຕັ້ງຄ່າການຂາຍ","status":false},
{"id":"10","name":"ຈັດຊື້ຜູ້ໃຊ້ງານ","status":false},
{"id":"11","name":"ຈັດການຮ້ານ/ສາຂາ","status":false},
{"id":"12","name":"ຕັ້ງຄ່າໃບບິນ","status":false},
{"id":"13","name":"ຈໍລູກຄ້າ","status":false},
{"id":"14","name":"Backup Database","status":false},
{"id":"15","name":"ລົບປະຫວັດການຂາຍທັ້ງໝົດ","status":false},
{"id":"16","name":"ລົບລາຍການສິນຄ້າທັ້ງໝົດ","status":false},
{"id":"17","name":"ຕົ້ນທຶນສິນຄ້າ","status":false},

{"id":"18","faid":"0","name":"ລົບບິນ","status":false},
{"id":"19","faid":"0","name":"ລົບສິນຄ້າທີ່ລູກຄ້າສັ່ງຊື້ ທີ່ລະລາຍການ","status":false},
{"id":"20","faid":"0","name":"ສ່ວນຫຼຸດທ້າຍບິນ","status":false},
{"id":"21","faid":"0","name":"ສ່ວນຫຼຸດສິນຄ້າ","status":false},
{"id":"22","faid":"0","name":"ປ່ຽນລາຄາສິນຄ້າ","status":false},
{"id":"23","faid":"0","name":"ປ່ຽນຈຳນວນສິນຄ້າ","status":false},

{"id":"24","faid":"1","name":"ລົບລາຍການສິນຄ້າ","status":false},
{"id":"25","faid":"1","name":"ແກ້ໄຂລາຍການສິນຄ້າ","status":false},

{"id":"26","faid":"0","name":"ເລືອກວັນທີ່ຂາຍ","status":false},

{"id":"27","name":"ການແຈ້ງເຕືອນ","status":false},
{"id":"28","faid":"27","name":"ແຈ້ງເຕືອນ ວັນເກີດລູກຄ້າ","status":false},

{"id":"29","faid":"0","name":"ປຸ່ມເປີດລີ້ນຊັກ","status":false},

{"id":"30","faid":"27","name":"ແຈ້ງເຕືອນ ສິນຄ້າໃນສະຕັອກເຫຼືອນ້ອຍ","status":false},
{"id":"31","faid":"27","name":"ແຈ້ງເຕືອນ ໃບສັ່ງຊື້ສິນຄ້າອັດຕະໂນມັດ","status":false},

{"id":"32","faid":"0","name":"ລົບສິນຄ້າທີ່ລູກຄ້າສັ່ງຊື່ ທັ້ງໝົດ","status":false}
]';







$this->fontfamily_json_th = '[
{"id":"0","fontname":"Kanit"},
{"id":"1","fontname":"Prompt"},
{"id":"2","fontname":"Chakra Petch"},
{"id":"3","fontname":"Taviraj"},
{"id":"4","fontname":"Sarabun"},
{"id":"5","fontname":"Thasadith"},
{"id":"6","fontname":"Mitr"},
{"id":"7","fontname":"Itim"},
{"id":"8","fontname":"Trirong"},
{"id":"9","fontname":"Mali"},
{"id":"10","fontname":"Krub"},
{"id":"11","fontname":"Bai Jamjuree"},
{"id":"12","fontname":"Pridi"},
{"id":"13","fontname":"Sriracha"},
{"id":"14","fontname":"Pattaya"},
{"id":"15","fontname":"Charm"},
{"id":"16","fontname":"Niramit"},
{"id":"17","fontname":"Maitree"},
{"id":"18","fontname":"Athiti"},
{"id":"19","fontname":"Chonburi"},
{"id":"20","fontname":"K2D"},
{"id":"21","fontname":"Srisakdi"},
{"id":"22","fontname":"Kodchasan"},
{"id":"23","fontname":"KoHo"},
{"id":"24","fontname":"Charmonman"},
{"id":"25","fontname":"Fahkwang"}
]';


$this->fontfamily_json_lao = '[
{"id":"0","fontname":"Phetsarath OT"},
{"id":"1","fontname":"SaysetTha OT"},
{"id":"0","fontname":"Kanit"},
{"id":"1","fontname":"Prompt"},
{"id":"2","fontname":"Chakra Petch"},
{"id":"3","fontname":"Taviraj"},
{"id":"4","fontname":"Sarabun"},
{"id":"5","fontname":"Thasadith"},
{"id":"6","fontname":"Mitr"},
{"id":"7","fontname":"Itim"},
{"id":"8","fontname":"Trirong"},
{"id":"9","fontname":"Mali"},
{"id":"10","fontname":"Krub"},
{"id":"11","fontname":"Bai Jamjuree"},
{"id":"12","fontname":"Pridi"},
{"id":"13","fontname":"Sriracha"},
{"id":"14","fontname":"Pattaya"},
{"id":"15","fontname":"Charm"},
{"id":"16","fontname":"Niramit"},
{"id":"17","fontname":"Maitree"},
{"id":"18","fontname":"Athiti"},
{"id":"19","fontname":"Chonburi"},
{"id":"20","fontname":"K2D"},
{"id":"21","fontname":"Srisakdi"},
{"id":"22","fontname":"Kodchasan"},
{"id":"23","fontname":"KoHo"},
{"id":"24","fontname":"Charmonman"},
{"id":"25","fontname":"Fahkwang"}
]';

	





//เงื่อนไข
if($this->base_lang=='th'){
	$this->mainmenu = $this->mainmenu_th;
	$this->fontfamily_json = $this->fontfamily_json_th;
}

if($this->base_lang=='lao'){
	$this->mainmenu = $this->mainmenu_lao;
	$this->fontfamily_json = $this->fontfamily_json_lao;
}
//เงื่อนไข

    
	
	
	

$fnarray =	json_decode($this->fontfamily_json, true);
	
$fn='';
foreach($fnarray as $value) {
	$fntext = str_replace(" ","+",$value['fontname']);
	$fn .= '&family='.$fntext.':wght@400';
  
}

$this->fontfamily_th = '<link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500'.$fn.'&display=swap" rel="stylesheet">';


$this->fontfamily_lao = '<link rel="preconnect" href="https://fonts.gstatic.com"><link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500'.$fn.'&display=swap" rel="stylesheet"><style>@font-face {font-family: "Phetsarath OT";src: URL("'.$this->base_url.'/font/PhetsarathOT.ttf") format("truetype");}@font-face {font-family: "SaysetTha OT";src: URL("'.$this->base_url.'/font/saysettha_ot.ttf") format("truetype");}</style>';


	
	//เงื่อนไข
if($this->base_lang=='th'){
	$this->fontfamily = $this->fontfamily_th;
}

if($this->base_lang=='lao'){
	$this->fontfamily = $this->fontfamily_lao;
}
//เงื่อนไข

    }
	
	

 public function weblayout($view,$data) {
 // Page local resource
$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;

include 'lang/'.$this->base_lang.'.php';
//$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();


$this->load->view('layout/web/header.php',$data);
 $this->load->view('layout/web/left.php',$data);
  $this->load->view($view,$data);
 $this->load->view('layout/web/right.php',$data);
 $this->load->view('layout/web/footer.php',$data);
 }



 public function employeelayout($view,$data) {
 // Page local resource
$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;

include 'lang/'.$this->base_lang.'.php';
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();


$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/employee/left.php',$data);
  $this->load->view($view,$data);
 $this->load->view('layout/employee/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }
 
 
 
 
  public function producelayout($view,$data) {
 // Page local resource
$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
include 'lang/'.$this->base_lang.'.php';
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();


$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/produce/left.php',$data);
  $this->load->view($view,$data);
 $this->load->view('layout/produce/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }
 
 
 


 public function accountinglayout($view,$data) {
 include 'lang/'.$this->base_lang.'.php';


 $data['base_url'] = $this->base_url;
 $data['fontfamily'] = $this->fontfamily;
 $data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

 $this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/accounting/left.php',$data);
  $this->load->view($view,$data);
 $this->load->view('layout/accounting/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }


 

public function purchaselayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/warehouse/header.php',$data);
$this->load->view('layout/purchase/left.php',$data);
$this->load->view($view,$data);
$this->load->view('layout/purchase/right.php',$data);
$this->load->view('layout/warehouse/footer.php',$data);

}




 public function vendorlayout($view,$data) {
 // Page local resource
 include 'lang/'.$this->base_lang.'.php';


 $data['base_url'] = $this->base_url;
 $data['fontfamily'] = $this->fontfamily;
 $data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

 $this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/vendor/left.php',$data);
 $this->load->view($view,$data);
 $this->load->view('layout/vendor/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }




 public function showcuslayout($view,$data) {
 // Page local resource
 $data['base_url'] = $this->base_url;
 $data['fontfamily'] = $this->fontfamily;
 include 'lang/'.$this->base_lang.'.php';
 $data['Getpermission_rule'] = $this->home_model->Getpermission_rule();


 $this->load->view('layout/showcus/header.php',$data);
 $this->load->view('layout/showcus/left.php',$data);
 $this->load->view($view,$data);
 $this->load->view('layout/showcus/right.php',$data);
 $this->load->view('layout/showcus/footer.php',$data);
 }




 public function pawnlayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/pawn/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/pawn/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



 public function adminlayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/admin/header.php',$data);
 $this->load->view('layout/admin/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/admin/right.php',$data);
 $this->load->view('layout/admin/footer.php',$data);
 }




  public function ownerlayout($view,$data) {
 // Page local resource
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/owner/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/owner/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



  public function warehouselayout($view,$data) {
 // Page local resource
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/warehouse/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/warehouse/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }

  public function barcodelayout($view,$data) {
 // Page local resource
$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;

$this->load->view($view,$data);

 }







  public function salelayout($view,$data) {
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();


$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/sale/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/sale/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }


  public function salereservlayout($view,$data) {
include 'lang/'.$this->base_lang.'.php';


$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/salereserv/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/salereserv/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



 public function salesettinglayout($view,$data) {

include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/salesetting/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/salesetting/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



 public function marketinglayout($view,$data) {
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/marketing/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/marketing/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }



 public function brandlayout($view,$data) {
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/brand/header.php',$data);
 $this->load->view('layout/brand/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/brand/right.php',$data);
 $this->load->view('layout/brand/footer.php',$data);
 }








 public function deshboardlayout($view,$data) {
 // Page local resource

if(!isset($_SESSION['store_type'])){
            header( "location: ".$this->base_url );
        }
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['fontfamily_json'] = $this->fontfamily_json;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$data['base_url_local'] = $this->base_url_local;

$this->load->view('layout/warehouse/header.php',$data);
$this->load->view('layout/deshboard/left.php',$data);
$this->load->view($view,$data);
$this->load->view('layout/deshboard/right.php',$data);
$this->load->view('layout/warehouse/footer.php',$data);
 }


  public function storemanagerlayout($view,$data) {

if(!isset($_SESSION['store_id'])){
            header( "location: ".$this->base_url );
        }
include 'lang/'.$this->base_lang.'.php';

$data['base_url'] = $this->base_url;
$data['fontfamily'] = $this->fontfamily;
$data['mainmenu'] = $this->mainmenu;
$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();

$this->load->view('layout/warehouse/header.php',$data);
 $this->load->view('layout/storemanager/left.php',$data);
   $this->load->view($view,$data);
 $this->load->view('layout/storemanager/right.php',$data);
 $this->load->view('layout/warehouse/footer.php',$data);
 }




public function to_excel($array, $filename) {
	header('Content-Encoding: UTF-8');
    header('Content-Disposition: attachment; filename='.$filename.'.xls');
    header('Content-type: application/force-download');
    header('Content-Transfer-Encoding: binary');
    header('Pragma: public');


    echo '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>Sheet0</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>';
    $h = array();
    foreach($array->result_array() as $row){
        foreach($row as $key=>$val){
            if(!in_array($key, $h)){
                $h[] = $key;
            }
        }
    }
    echo '<table>';
    foreach($h as $key) {
        //$key = ucwords($key);
        echo '<th>'.$key.'</th>';
    }
    echo '</tr>';

    foreach($array->result_array() as $row){
        echo '<tr>';
        foreach($row as $val)
            $this->writeRow($val);
    }
    echo '</tr>';
    echo '</table></body></html>';


}

 public function writeRow($val) {
    echo '<td>'.$val.'</td>';
}







public function sendmailfunc($to,$subject,$data)
  {
ob_start();

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: noreply@gmail.com\r\n";
  $Send = mail($to,$subject,$data,$headers);  // @ = No Show Error //
  if($Send)
  {

  }
  else
  {

  }



  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
public function C2mpos_barcode_th_to_en($code){
 
 if (!preg_match('/[^A-Za-z0-9-]/', $code)) // check text en
{
	return $code;
  exit();
}

$c2mpos_jsondata = '[
{"th":"จ","en":"0"},
{"th":"ๅ","en":"1"},
{"th":"/","en":"2"},
{"th":"-","en":"3"},
{"th":"ภ","en":"4"},
{"th":"ถ","en":"5"},
{"th":"ุ","en":"6"},
{"th":"ึ","en":"7"},
{"th":"ค","en":"8"},
{"th":"ต","en":"9"},
{"th":"ข","en":"-"},

{"th":"ฟ","en":"a"},
{"th":"ิ","en":"b"},
{"th":"แ","en":"c"},
{"th":"ก","en":"d"},
{"th":"ำ","en":"e"},
{"th":"ด","en":"f"},
{"th":"เ","en":"g"},
{"th":"้","en":"h"},
{"th":"ร","en":"i"},
{"th":"่","en":"j"},
{"th":"า","en":"k"},
{"th":"ส","en":"l"},
{"th":"ท","en":"m"},
{"th":"ื","en":"n"},
{"th":"น","en":"o"},
{"th":"ย","en":"p"},
{"th":"ๆ","en":"q"},
{"th":"พ","en":"r"},
{"th":"ห","en":"s"},
{"th":"ะ","en":"t"},
{"th":"ี","en":"u"},
{"th":"อ","en":"v"},
{"th":"ไ","en":"w"},
{"th":"ป","en":"x"},
{"th":"ั","en":"y"},
{"th":"ผ","en":"z"},

{"th":"ฤ","en":"A"},
{"th":"ฺ","en":"B"},
{"th":"ฉ","en":"C"},
{"th":"ฏ","en":"D"},
{"th":"ฎ","en":"E"},
{"th":"โ","en":"F"},
{"th":"ฌ","en":"G"},
{"th":"็","en":"H"},
{"th":"ณ","en":"I"},
{"th":"๋","en":"J"},
{"th":"ษ","en":"K"},
{"th":"ศ","en":"L"},
{"th":"?","en":"M"},
{"th":"์","en":"N"},
{"th":"ฯ","en":"O"},
{"th":"ญ","en":"P"},
{"th":"๐","en":"Q"},
{"th":"ฑ","en":"R"},
{"th":"ฆ","en":"S"},
{"th":"ธ","en":"T"},
{"th":"๊","en":"U"},
{"th":"ฮ","en":"V"},
{"th":"\"","en":"W"},
{"th":")","en":"X"},
{"th":"ํ","en":"Y"},
{"th":"(","en":"Z"}
]';	
	
$c2mpos_jsondata_to_array = json_decode( $c2mpos_jsondata, JSON_UNESCAPED_UNICODE );
	
$c2mpos_code = $code;
$c2mpos_len = mb_strlen($c2mpos_code, 'UTF-8');
$c2mpos_result_array = [];
for ($i = 0; $i < $c2mpos_len; $i++) {
    $c2mpos_result_array[] = mb_substr($c2mpos_code, $i, 1, 'UTF-8');
}

$new_code = '';
foreach ($c2mpos_result_array as $one) {	
foreach ($c2mpos_jsondata_to_array as $then) {
		
				 if($then['th']==$one){
						$new_code .=  $then['en']; 
				 } 
			}  
}


return $new_code;
 }
 
 
 


 public function Line_notify($text){
	 
	 
    define('LINE_API',"https://notify-api.line.me/api/notify");
	define('LINE_TOKEN', $_SESSION['line_linetoken']);


	
	$linemessage = $text;


		$linedata = array('message' => $linemessage);
		$linedata = http_build_query($linedata,'','&');
		$lineheader = array(
			'http'=>array(
				'method'=>'POST',
				'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
						."Authorization: Bearer ".LINE_TOKEN."\r\n"
						."Content-Length: ".strlen($linedata)."\r\n",
				'content' => $linedata
			)
		);
		// $linecontext = stream_context_create($lineheader);
		// $lineresult = file_get_contents(LINE_API,FALSE,$linecontext);
		// return json_decode($lineresult);

	 
	 
 }







 }