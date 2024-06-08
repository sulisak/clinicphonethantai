<?php

class Pricebycus_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       





                   public function Update($data)
        {



//$data2['cus_name'] = $data['cus_name'];
$data2['product_score_all'] = $data['product_score_all'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'cus_id'  => $data['cus_id']
);

$this->db->where($where);
if ($this->db->update("customer_owner", $data2)){
        return true;
    }

}





           public function Mycustomer($data)
        {

            $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';      
            }
            
           if($data['searchtype'] == '0'){
$searchtext0 = $data['searchtext'];          
$searchtext1 = '';
$searchtext2 = '';
$searchtext3 = '';
$searchtext4 = '';
            }else if($data['searchtype'] == '1'){
$searchtext0 = '';                
$searchtext1 = $data['searchtext'];
$searchtext2 = '';
$searchtext3 = '';
$searchtext4 = '';
            }else if($data['searchtype'] == '2'){
$searchtext0 = '';
$searchtext1 = '';
$searchtext2 = $data['searchtext'];
$searchtext3 = '';
$searchtext4 = '';
            }else if($data['searchtype'] == '3'){
$searchtext0 = '';
$searchtext1 = '';
$searchtext2 = '';
$searchtext3 = $data['searchtext'];
$searchtext4 = '';
            }else if($data['searchtype'] == '4'){
$searchtext0 = '';
$searchtext1 = '';
$searchtext2 = '';
$searchtext3 = '';
$searchtext4 = $data['searchtext'];
            }else{
$searchtext0 = '';
$searchtext1 = '';
$searchtext2 = '';
$searchtext3 = ''; 
$searchtext4 = '';
            }

$start = ($page - 1) * $perpage;

$querynum = $this->db->query('SELECT cus_id,cus_name,cus_address,cus_tel,cus_email,cus_birthday,customer_group_id,     customer_level_id,customer_sex_id,province_id,  amphur_id,district_id,cus_address_postcode,cus_remark FROM customer_owner WHERE owner_id="'.$_SESSION['owner_id'].'" and cus_add_time LIKE "%'.$searchtext0.'%" and cus_name LIKE "%'.$searchtext1.'%" and cus_tel LIKE "%'.$searchtext2.'%" and cus_email LIKE "%'.$searchtext3.'%" and cus_birthday LIKE "%'.$searchtext4.'%" ORDER BY cus_id DESC');

$query = $this->db->query('SELECT cus_id,cus_name,cus_address,cus_tel,cus_email,cus_birthday,customer_group_id, product_score_all,	cus_add_time, customer_level_id,customer_sex_id,province_id, 	amphur_id,district_id,cus_address_postcode,cus_remark FROM customer_owner WHERE owner_id="'.$_SESSION['owner_id'].'" and cus_add_time LIKE "%'.$searchtext0.'%" and cus_name LIKE "%'.$searchtext1.'%" and cus_tel LIKE "%'.$searchtext2.'%" and cus_email LIKE "%'.$searchtext3.'%" and cus_birthday LIKE "%'.$searchtext4.'%" ORDER BY product_score_all DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall;

return $json;

        }

           public function Allmycustomer()
        {

$query = $this->db->query('SELECT cus_id FROM customer_owner WHERE owner_id="'.$_SESSION['owner_id'].'"');
$encode_data = json_encode($query->num_rows(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


    



      public function Exportexcel($data)
        {

            if($data['searchtype'] == '1'){
$searchtext1 = $data['searchtext'];
$searchtext2 = '';
$searchtext3 = '';
$searchtext4 = '';
            }else if($data['searchtype'] == '2'){
$searchtext1 = '';
$searchtext2 = $data['searchtext'];
$searchtext3 = '';
$searchtext4 = '';
            }else if($data['searchtype'] == '3'){
$searchtext1 = '';
$searchtext2 = '';
$searchtext3 = $data['searchtext'];
$searchtext4 = '';
            }else if($data['searchtype'] == '4'){
$searchtext1 = '';
$searchtext2 = '';
$searchtext3 = '';
$searchtext4 = $data['searchtext'];
            }else{
$searchtext1 = '';
$searchtext2 = '';
$searchtext3 = ''; 
$searchtext4 = '';
            }



$query = $this->db->query('SELECT  co.cus_name as "ชื่อลูกค้า", co.product_score_all as "คะแนน", co.cus_birthday as "วันเกิด",cs.customer_sex_name as "เพศ" ,cg.customer_group_name as "กลุ่ม", cl.customer_level_name as "ระดับ", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์", co.cus_remark as "หมายเหตุ"
    FROM customer_owner as co
    LEFT JOIN owner as ow on ow.owner_id=co.owner_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as cl on cl.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    WHERE ow.owner_id="'.$_SESSION['owner_id'].'" and co.cus_name LIKE "%'.$searchtext1.'%" and co.cus_tel LIKE "%'.$searchtext2.'%" and co.cus_email LIKE "%'.$searchtext3.'%" and co.cus_birthday LIKE "%'.$searchtext4.'-%" ORDER BY co.product_score_all DESC');

return $query;

        }






 public function Getproduct($data)
        {

$query = $this->db->query('SELECT *
    FROM wh_product_list  
    WHERE owner_id="'.$_SESSION['owner_id'].'" 
	AND product_name LIKE "%'.$data['text'].'%"
	OR owner_id="'.$_SESSION['owner_id'].'" AND product_code LIKE "%'.$data['text'].'%"
    ORDER BY product_id DESC LIMIT 10');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

        }


 public function Getproductcus($data)
        {

$query = $this->db->query('SELECT *
    FROM product_price_cus  
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND cus_id="'.$data['cus_id'].'"
    ORDER BY product_id DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

        }




public function Saveprice($data)
        {
$data['owner_id'] = $_SESSION['owner_id'];
$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];

$query_delete = $this->db->query('DELETE FROM product_price_cus  WHERE product_id="'.$data['product_id'].'" AND cus_id="'.$data['cus_id'].'" AND  owner_id="'.$_SESSION['owner_id'].'"');

if ($query_delete){
      $this->db->insert("product_price_cus", $data);
    }

        }



public function Deleteprice($data)
        {

$query_delete = $this->db->query('DELETE FROM product_price_cus  WHERE product_id="'.$data['product_id'].'" AND cus_id="'.$data['cus_id'].'" AND  owner_id="'.$_SESSION['owner_id'].'"');


        }












    }