<?php

class Printercategory_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




           public function Update($data)
        {


$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_category_id'  => $data['product_category_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_category", $data)){
        return true;
    }

}




           public function Print_preview_save($data)
        {





if (isset($data['print_preview'])){

if (isset($data['showstorename'])){
$newdata = array(
  'showstorename' => $data['showstorename'],
  'showstoreaddress' => $data['showstoreaddress'],
  'showstorevatnumber' => $data['showstorevatnumber'],
  'showsalesname' => $data['showsalesname'],
  'showadddate' => $data['showadddate'],
  'showrunno' => $data['showrunno'],
  'showcusname' => $data['showcusname'],
  'showcusaddress' => $data['showcusaddress'],
  'showcustel' => $data['showcustel'],
  'decimal_print' => $data['decimal_print']
);
$this->session->set_userdata($newdata);
}


$this->db->update("owner", $data);
$query = $this->db->query('SELECT * FROM owner');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
    }else{

$query = $this->db->query('SELECT * FROM owner');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;	
	}
	
	
	

}









           public function Get()
        {

$query = $this->db->query('SELECT product_category_id,product_category_name,printer_ip FROM wh_product_category WHERE owner_id="'.$_SESSION['owner_id'].'" ORDER BY product_category_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


   public function Getcashier()
        {

$query = $this->db->query('SELECT cashier_printer_ip,printer_type,printer_ul,printer_name FROM owner WHERE owner_id="'.$_SESSION['owner_id'].'"');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




   public function Cashierprinteripupdate($data)
        {


$where = array(
        'owner_id' => $_SESSION['owner_id']
);


$newdata = array(
  'printer_type' => $data['printer_type'],
  'printer_ul' => $data['printer_ul'],
  'printer_name' => $data['printer_name']
);

$this->session->set_userdata($newdata);



$this->db->where($where);
if ($this->db->update("owner", $data)){
        return true;
    }

}








 public function Addimg($data)
        {

$this->db->where('owner_id',$_SESSION['owner_id']);


$newdata = array(
        'picunderslip'     => $data['picunderslip']
);

$this->session->set_userdata($newdata);



if ($this->db->update("owner", $data)){
        return true;
    }


  }
  
  
  
  
  
   public function Nopic()
        {

$this->db->where('owner_id',$_SESSION['owner_id']);

$data['picunderslip'] = '';

$newdata = array(
        'picunderslip'     => ''
);
$this->session->set_userdata($newdata);

if ($this->db->update("owner", $data)){
        return true;
    }


  }
  
  
  
  
  

    }
