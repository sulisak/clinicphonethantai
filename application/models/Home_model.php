<?php

class Home_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



public function Getlogo()
        {

$query = $this->db->query('SELECT
    owner_logo,owner_bgimg,owner_name,color_theme,fontc2m
    FROM owner  LIMIT 1  ');
return $query->result_array();
        }






 public function Addimgbanner($data)
        {
$this->db->where('id','1');
$this->db->update("banner_cus2mer", $data);
  }
  
  
  
  
   public function Delimage($xx)
        {

if($xx['image']=='1'){
$data['image1'] = '';
}

if($xx['image']=='2'){
$data['image2'] = '';
}

if($xx['image']=='3'){
$data['image3'] = '';
}

if($xx['image']=='4'){
$data['image4'] = '';
}

if($xx['image']=='5'){
$data['image5'] = '';
}

$this->db->update("banner_cus2mer", $data);
  }
  
  
  
  
  
   public function Getimgbanner()
        {

$query = $this->db->query('SELECT
*
 FROM banner_cus2mer');
 
 $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
  return $encode_data;

  }
  
  
  
  
  

           public function Saletoday()
        {


if(isset($_SESSION['shift_id'])){
$shift_id= $_SESSION['shift_id'];
}else{
  $shift_id= '0';
}

$data['today'] = date('d-m-Y',time());

$dayfrom = strtotime($data['today']);
$dayto = strtotime($data['today'])+86400;


$query = $this->db->query('SELECT
COUNT(ID) AS allbill,
SUM(sumsale_num) as sumnum,
SUM(sumsale_price) as sumprice,
SUM(discount_last) as sumdiscount
 FROM sale_list_header WHERE owner_id="'.$_SESSION['owner_id'].'"
 AND adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" ');

 $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
  return $encode_data;


        }



          public function Productsaletoday()
        {


if(isset($_SESSION['shift_id'])){
$shift_id= $_SESSION['shift_id'];
}else{
  $shift_id= '0';
}

$data['today'] = date('d-m-Y',time());

$dayfrom = strtotime($data['today']);
$dayto = strtotime($data['today'])+86400;


$query = $this->db->query('SELECT
    wpl.product_code as product_code,
    wpl.product_name as product_name,
sum(sd.product_sale_num) as product_numall

    FROM wh_product_list as wpl 
	LEFT JOIN sale_list_datail as sd on sd.product_id=wpl.product_id
	WHERE wpl.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
	GROUP BY wpl.product_id ORDER BY product_numall DESC LIMIT 6');

    $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

        }



          public function Customersaletoday()
        {

$today = date('d-m-Y',time());

$dayfrom = strtotime($today);
$dayto = strtotime($today)+86400;

$query = $this->db->query('SELECT
    wpl.cus_name as name,
    (SELECT sum(sd.sumsale_num) FROM sale_list_header as sd WHERE sd.cus_id=wpl.cus_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as sumsale_num


    FROM customer_owner as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'" ORDER BY sumsale_num DESC LIMIT 9');

    $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

        }



          public function Productoutofstock()
        {

$query = $this->db->query('SELECT
    wl.product_name,
	s.product_stock_num
    FROM stock as s
	LEFT JOIN wh_product_list as wl on s.product_id=wl.product_id
    WHERE s.product_stock_num > 0
	GROUP BY s.product_id
    ORDER BY s.product_stock_num+0 ASC  LIMIT 15  ');
    $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;
        }



         public function Productdateend()
        {

        $query = $this->db->query('SELECT
		wl.product_name,
		wd.date_end,
        wd.date_end2
        FROM wh_importproduct_detail as wd
		LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
        WHERE wd.date_end != "" AND wd.status="0" AND wd.branch_id="'.$_SESSION['branch_id'].'"
        ORDER BY wd.date_end2 ASC  LIMIT 15  ');
        $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
 return $encode_data;
        }



      public function Productpawnenddate()
        {


$timenow = time();

$query = $this->db->query('SELECT
    *,end_date+86400 as end_date
    ,from_unixtime(end_date,"%d-%m-%Y") as end_date_date
    ,from_unixtime(add_time,"%d-%m-%Y") as add_time_date
    FROM pawn
    WHERE (end_date+86400) < "'.$timenow.'" AND pawn_status="0"
    ORDER BY end_date ASC  LIMIT 9');

    $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

        }


public function Getpermission_rule()
        {

$query = $this->db->query('SELECT
    permission_rule
    FROM permission_group WHERE group_id="'.$_SESSION['user_type'].'" LIMIT 1 ');
return $query->result_array();
        }





    }
