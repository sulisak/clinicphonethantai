<?php

class Store_brand_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }



 public function Add($data)
        {

$date = date("d-m-Y",time());

$data['owner_pass'] = md5(time());
$data['owner_email'] = md5(time());
$data['add_time'] = date("d-m-Y",time());
$data['end_time'] = date("d-m-Y",strtotime($date. ' + 7 days'));
$data['store_id'] = $_SESSION['store_id'];
if ($this->db->insert("owner", $data)){
        return true;
    }


  }
  
  
  
  
  
  
  
 public function Addbranch($data)
        {
$this->db->insert("branch", $data);
  }
  
  
  
   public function Getbranch()
        {

$this->db->select('*')->from('branch')->order_by('branch_id','ASC');
$query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
  }





   public function Editebranch($data)
        {

$this->db->where('branch_id',$data['branch_id']);
$this->db->update("branch", $data); 
  }
  
  

   public function Edit($data)
        {

$this->db->where('owner_id',$data['owner_id']);
$this->db->where('store_id',$_SESSION['store_id']);


  $newdata = array(
         'owner_name'     => $data['owner_name'],
        'owner_address' => $data['owner_address'],
        'owner_tel' => $data['tel'],
        'owner_tax_number' => $data['owner_tax_number'],
          'owner_vat' => $data['owner_vat'],
          'owner_vat_status' => $data['owner_vat_status']
);

$this->session->set_userdata($newdata);
$this->db->update("owner", $data);


$data5['branch_name'] = $data['owner_name'];
$data5['branch_address'] = $data['owner_address'];
$data5['branch_tel'] = $data['tel'];
$this->db->where('branch_id','1');
$this->db->update("branch", $data5); 




  }



 public function Addimg($data)
        {

$this->db->where('owner_id',$data['owner_id']);


$newdata = array(
        'owner_logo'     => $data['owner_logo']
);

$this->session->set_userdata($newdata);
$this->db->update("owner", $data);


  }
  
  
  
  
  
  
  
  
   public function Fontc2m($data)
        {

$this->db->where('owner_id',$_SESSION['owner_id']);
$newdata = array(
        'fontc2m'     => $data['fontc2m']
);

$this->session->set_userdata($newdata);
$this->db->update("owner", $data);

  }
  
  
  
   public function Fontslip($data)
        {

$this->db->where('owner_id',$_SESSION['owner_id']);
$newdata = array(
        'fontslip'     => $data['fontslip']
);

$this->session->set_userdata($newdata);
$this->db->update("owner", $data);

  }
  



 public function Logoonslip($data)
        {

$this->db->where('owner_id',$_SESSION['owner_id']);

$newdata = array(
        'logoonslip'     => $data['logoonslip']
);

$this->session->set_userdata($newdata);



if ($this->db->update("owner", $data)){
        return true;
    }


  }



 public function Addbgimg($data)
        {

$this->db->where('owner_id',$data['owner_id']);


$newdata = array(
        'owner_bgimg'     => $data['owner_bgimg']
);

$this->session->set_userdata($newdata);



if ($this->db->update("owner", $data)){
        return true;
    }


  }






  public function Updatefooter_slip($data)
         {

 $this->db->where('owner_id',$data['owner_id']);


 $newdata = array(
         'header_slip'     => $data['header_slip'],
         'footer_slip'     => $data['footer_slip'],
         'header_a4'     => $data['header_a4'],
         'footer_a4'     => $data['footer_a4'],
         'befor_runno'     => $data['befor_runno'],
         'runno_digit'     => $data['runno_digit'],
         'reset_runno'     => $data['reset_runno'],
         'youtube_url_forcus' => $data['youtube_url_forcus']
 );

 $this->session->set_userdata($newdata);



 if ($this->db->update("owner", $data)){
         return true;
     }


   }




   public function Get()
        {

$this->db->select('owner_id,owner_logo,owner_bgimg,
owner_name,owner.owner_tax_number,owner_vat,
owner_vat_status,owner_address,
owner.tel,add_time,end_time,
header_slip,
footer_slip,
header_a4,
footer_a4,
befor_runno,
runno_digit,
reset_runno,
logoonslip,
youtube_url_forcus')
        ->from('owner')
        ->where('store_id', $_SESSION['store_id'])
        ->order_by('owner_id','DESC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
        }





 public function Savecolortheme($color)
        {

$this->db->where('owner_id','1');


$newdata = array(
        'color_theme'     => $color
);

$this->session->set_userdata($newdata);



if ($this->db->update("owner", $newdata)){
        return true;
    }


  }
  
  
  


}
