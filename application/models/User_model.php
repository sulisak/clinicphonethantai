<?php

class User_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

        public function insert_user($data)
        {

                $this->db->where('owner_email', $data['owner_email']);

    $query = $this->db->get('owner');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {

         $this->db->insert('owner', $data);
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }




        }



           public function get_user($data)
        {

        $query =  $this->db->get_where('user_owner' , array('user_email' => $data['user_email'] , 'user_password' => $data['user_password']));

    $count_row = $query->num_rows();

    if ($count_row > 0) {



foreach ($query->result() as $row) {

        # code...
        $owner_id = $row->owner_id;
        $food_brand_id = $row->food_brand_id;
        $apartment_brand_id = $row->apartment_brand_id;
        $user_id = $row->user_id;
        $store_id = $row->store_id;
        $store_type = $row->store_type;
         //$owner_name = $row->owner_name;
         $name = $row->name;
         //$owner_tax_number = $row->owner_tax_number;
        //$owner_email = $row->owner_email;
         $owner_email = $row->user_email;
         $user_type = $row->user_type;

         $supplier_id = $row->supplier_id;
        //$owner_add_time = $row->add_time;
		$branch_id = $row->branch_id;

}


 $query_owner =  $this->db->get_where('owner' , array('owner_id' => $owner_id));


 foreach ($query_owner->result() as $row) {

         $owner_name = $row->owner_name;
         $owner_address = $row->owner_address;
         $owner_tel = $row->tel;
         $owner_email = $row->owner_email;
         $owner_tax_number = $row->owner_tax_number;

         $owner_end_time = $row->end_time;

        $owner_logo = $row->owner_logo;
        $owner_vat = $row->owner_vat;
        $owner_vat_status = $row->owner_vat_status;

        $owner_bgimg = $row->owner_bgimg;

        $printer_type = $row->printer_type;
        $printer_ul = $row->printer_ul;
        $printer_name = $row->printer_name;

        $header_slip = $row->header_slip;
        $footer_slip = $row->footer_slip;
        $header_a4 = $row->header_a4;
        $footer_a4 = $row->footer_a4;

        $befor_runno = $row->befor_runno;
        $runno_digit = $row->runno_digit;
        $reset_runno = $row->reset_runno;

        $youtube_url_forcus = $row->youtube_url_forcus;
        $ads = $row->ads;
		$color_theme = $row->color_theme;
		$playbeep = $row->playbeep;
		$open_number_for_cus = $row->open_number_for_cus;
		$show_price_per_one = $row->show_price_per_one;
		$vat = $row->vat;
		$open_vat_on_slip = $row->open_vat_on_slip;
		$show_order_on_slip = $row->show_order_on_slip;
		$picunderslip = $row->picunderslip;
		$fontc2m = $row->fontc2m;
		$fontslip = $row->fontslip;
		$logoonslip = $row->logoonslip;
		$exchangerateonslip = $row->exchangerateonslip;
		
		$showstorename = $row->showstorename;
		$showstoreaddress = $row->showstoreaddress;
		$showstorevatnumber = $row->showstorevatnumber;
		$showsalesname = $row->showsalesname;
		$showadddate = $row->showadddate;
		$showrunno = $row->showrunno;
		$showcusname = $row->showcusname;
		$showcusaddress = $row->showcusaddress;
		$showcustel = $row->showcustel;
		$decimal_print = $row->decimal_print;
		$c2m_bd_noti = $row->c2m_bd_noti;
		$have_product_course = $row->have_product_course;
}


$query_branch =  $this->db->get_where('branch' , array('branch_id' => $branch_id));

 foreach ($query_branch->result() as $row) {
         $branch_name = $row->branch_name;
		 $branch_address = $row->branch_address;
		 $branch_tel = $row->branch_tel;
		 $branch_type = $row->branch_type;
}

if($branch_type !=NULL && $branch_type=='1'){
$owner_name = $branch_name;
$owner_address = $branch_address;
$owner_tel = $branch_tel;
}

if($branch_name == NULL){
$branch_name = $owner_name;	
}


//WHERE user_id="'.$user_id.'"

$queryshiftend = $this->db->query('SELECT
shift_id,shift_start_time,shift_end_time,user_id
FROM shift WHERE user_id="'.$user_id.'" ORDER BY shift_id DESC LIMIT 1 ');
$shift_end = $queryshiftend->result_array();

if($shift_end && $shift_end[0]['shift_end_time']==''){
$newdatashift = array(
           'shift_id' => $shift_end[0]['shift_id'],
           'shift_user_id' => $shift_end[0]['user_id']
         );

$this->session->set_userdata($newdatashift);
}




$querystockrule = $this->db->query('SELECT
stock_noti,
stock_nosale
FROM stock_rule LIMIT 1 ');
$stockrule = $querystockrule->result_array();

$newdatasr = array(
           'stock_noti' => $stockrule[0]['stock_noti'],
		   'stock_nosale' => $stockrule[0]['stock_nosale']
         );

$this->session->set_userdata($newdatasr);



		//Get line notify


$querylinenotify = $this->db->query('SELECT *
FROM line_notify LIMIT 1 ');
$linedata = $querylinenotify->result_array();

$newdataline = array(
           'line_linetoken' => $linedata[0]['linetoken'],
		   'line_whenlogin' => $linedata[0]['whenlogin'],
		   'line_openshift' => $linedata[0]['openshift'],
		   'line_stocknoti' => $linedata[0]['stocknoti'],
		   'line_allbill' => $linedata[0]['allbill'],
		   'line_deletebill' => $linedata[0]['deletebill'],
		   'line_sumsaleshift' => $linedata[0]['sumsaleshift'],
		   'line_listsaleshift' => $linedata[0]['listsaleshift'],
		   'line_deleteproduct' => $linedata[0]['deleteproduct'],
		   'line_editstock' => $linedata[0]['editstock'],
		   'line_whenlogin_check' => "1"
         );

$this->session->set_userdata($newdataline);

//Get line notify








      $newdata = array(
        'owner_id' => $owner_id,
		'branch_id' => $branch_id,
		'branch_name' => $branch_name,
        'owner_logo' => $owner_logo,
        'owner_bgimg' => $owner_bgimg,
        'user_id' => $user_id,
        'user_type' => $user_type,
        'supplier_id' => $supplier_id,
        'name' => $name,
        'store_id' => $store_id,
        'store_type' => $store_type,
        'owner_email'     => $owner_email,
        'owner_name' => $owner_name,
        'owner_address' => $owner_address,
        'owner_tel' => $owner_tel,
        'owner_tax_number' => $owner_tax_number,
       // 'owner_add_time' => $owner_add_time,
         'owner_end_time' => $owner_end_time,
          'owner_vat' => $owner_vat,
          'owner_vat_status' => $owner_vat_status,
            'printer_type' => $printer_type,
            'printer_ul' => $printer_ul,
          'printer_name' => $printer_name,
          'header_slip' => $header_slip,
          'footer_slip' => $footer_slip,
          'header_a4' => $header_a4,
          'footer_a4' => $footer_a4,
          'befor_runno' => $befor_runno,
          'runno_digit' => $runno_digit,
          'reset_runno' => $reset_runno,
          'youtube_url_forcus' => $youtube_url_forcus,
          'ads' => $ads,
		  'color_theme' => $color_theme,
		  'playbeep' => $playbeep,
		  'open_number_for_cus' => $open_number_for_cus,
		  'show_price_per_one' => $show_price_per_one,
		  'vat' => $vat,
		  'open_vat_on_slip' => $open_vat_on_slip,
		  'show_order_on_slip' => $show_order_on_slip,
		  'picunderslip' => $picunderslip,
		  'fontc2m' => $fontc2m,
		  'fontslip' => $fontslip,
		  'logoonslip' => $logoonslip,
		  'exchangerateonslip' => $exchangerateonslip,
		  'showstorename' => $showstorename,
		  'showstoreaddress' => $showstoreaddress,
		  'showstorevatnumber' => $showstorevatnumber,
		  'showsalesname' => $showsalesname,
		  'showadddate' => $showadddate,
		  'showrunno' => $showrunno,
		  'showcusname' => $showcusname,
		  'showcusaddress' => $showcusaddress,
		  'showcustel' => $showcustel,
		  'decimal_print' => $decimal_print,
		  'c2m_bd_noti' => $c2m_bd_noti,
		  'have_product_course' => $have_product_course,
        'logged_in' => TRUE
);




$this->session->set_userdata($newdata);




$querydws = $this->db->query('SELECT
dws_type
FROM wh_product_dws');
$querydws_array = $querydws->result_array();
$newdatadws = array(
           'dws_type' => $querydws_array[0]['dws_type']
         );
$this->session->set_userdata($newdatadws);



return TRUE;

     } else {


        return FALSE;
     }




        }




}
