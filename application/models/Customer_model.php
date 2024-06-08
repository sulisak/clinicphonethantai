<?php

class Customer_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Addnewcustomer($data)
        {



$data2['cus_name'] = $data['cusname'];
$data2['cus_address'] = $data['cusaddress'];
$data2['cus_tel'] = $data['custel'];
$data2['cus_email'] = $data['cusemail'];

$data2['cus_birthday'] = $data['cusbirthday'];
$data2['customer_group_id'] = $data['customer_group'];
$data2['customer_level_id'] = $data['customer_level'];
$data2['customer_sex_id'] = $data['customer_sex'];
$data2['province_id'] = $data['province'];
$data2['amphur_id'] = $data['amphur'];
$data2['district_id'] = $data['district'];
$data2['cus_address_postcode'] = $data['cusaddresspostcode'];


$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];


$data2['cus_add_time'] = $data['cus_add_time'];

$data2['cus_remark'] = $data['cusremark'];
$data2['credit_day'] = $data['credit_day'];
$data2['credit_limit'] = $data['credit_limit'];
$data2['taxnumber'] = $data['taxnumber'];

$data2['d'] = substr($data['cusbirthday'], 0 ,2);
$data2['m'] = substr($data['cusbirthday'], 3 ,2);

if ($this->db->insert("customer_owner", $data2)){
		return true;
	}



        }







       public function Addexcel($data)
        {


if ($this->db->insert("customer_owner", $data)){
		return true;
	}



        }







                   public function Update($data)
        {



$data2['cus_name'] = $data['cus_name'];
$data2['cus_address'] = $data['cus_address'];
$data2['cus_tel'] = $data['cus_tel'];
$data2['cus_email'] = $data['cus_email'];

$data2['cus_birthday'] = $data['cusbirthday'];
$data2['customer_group_id'] = $data['customer_group'];
$data2['customer_level_id'] = $data['customer_level'];
$data2['customer_sex_id'] = $data['customer_sex'];
$data2['province_id'] = $data['province'];
$data2['amphur_id'] = $data['amphur'];
$data2['district_id'] = $data['district'];
$data2['cus_address_postcode'] = $data['cusaddresspostcode'];


$data2['cus_add_time'] = $data['cus_add_time'];

$data2['cus_remark'] = $data['cus_remark'];
$data2['credit_day'] = $data['credit_day'];
$data2['credit_limit'] = $data['credit_limit'];
$data2['taxnumber'] = $data['taxnumber'];

$data2['d'] = substr($data['cusbirthday'], 0 ,2);
$data2['m'] = substr($data['cusbirthday'], 3 ,2);

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
      
$searchtext = $data['searchtext'];


$start = ($page - 1) * $perpage;



$querynum = $this->db->query('SELECT *
FROM customer_owner as co 
LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
WHERE co.cus_add_time LIKE "%'.$searchtext.'%" 
OR co.cus_name LIKE "%'.$searchtext.'%" 
OR co.cus_tel LIKE "%'.$searchtext.'%" 
OR co.cus_email LIKE "%'.$searchtext.'%"  
OR co.cus_birthday LIKE "%'.$searchtext.'%" 
OR co.cus_address LIKE "%'.$searchtext.'%" 
OR cg.customer_group_name LIKE "%'.$searchtext.'%" 
ORDER BY co.cus_id DESC');

$query = $this->db->query('SELECT *
FROM customer_owner as co 
LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
WHERE co.cus_add_time LIKE "%'.$searchtext.'%"
OR co.cus_name LIKE "%'.$searchtext.'%"
OR co.cus_tel LIKE "%'.$searchtext.'%"
OR co.cus_email LIKE "%'.$searchtext.'%"
OR co.cus_birthday LIKE "%'.$searchtext.'%"
OR co.cus_address LIKE "%'.$searchtext.'%"
OR cg.customer_group_name LIKE "%'.$searchtext.'%"
ORDER BY co.cus_id DESC LIMIT '.$start.' , '.$perpage.' ');



$querynum2 = $this->db->query('SELECT *
FROM customer_owner as co 
LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
WHERE co.cus_add_time LIKE "%'.$searchtext.'%"   AND co.m="'.$data['bdm'].'"
OR co.cus_name LIKE "%'.$searchtext.'%"   AND co.m="'.$data['bdm'].'"
OR co.cus_tel LIKE "%'.$searchtext.'%"   AND co.m="'.$data['bdm'].'"
OR co.cus_email LIKE "%'.$searchtext.'%"    AND co.m="'.$data['bdm'].'"
OR co.cus_birthday LIKE "%'.$searchtext.'%"   AND co.m="'.$data['bdm'].'"
OR co.cus_address LIKE "%'.$searchtext.'%"   AND co.m="'.$data['bdm'].'"
OR cg.customer_group_name LIKE "%'.$searchtext.'%"   AND co.m="'.$data['bdm'].'"
ORDER BY co.cus_id DESC');

$query2 = $this->db->query('SELECT *
FROM customer_owner as co 
LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
WHERE co.cus_add_time LIKE "%'.$searchtext.'%"  AND co.m="'.$data['bdm'].'"
OR co.cus_name LIKE "%'.$searchtext.'%"  AND co.m="'.$data['bdm'].'"
OR co.cus_tel LIKE "%'.$searchtext.'%"  AND co.m="'.$data['bdm'].'"
OR co.cus_email LIKE "%'.$searchtext.'%"   AND co.m="'.$data['bdm'].'"
OR co.cus_birthday LIKE "%'.$searchtext.'%"  AND co.m="'.$data['bdm'].'"
OR co.cus_address LIKE "%'.$searchtext.'%"  AND co.m="'.$data['bdm'].'"
OR cg.customer_group_name LIKE "%'.$searchtext.'%" AND co.m="'.$data['bdm'].'"
ORDER BY co.cus_id DESC LIMIT '.$start.' , '.$perpage.' ');


if($data['bdm']=='0'){
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
$num_rows = $querynum->num_rows();
}else{
$encode_data = json_encode($query2->result(),JSON_UNESCAPED_UNICODE );
$num_rows = $querynum2->num_rows();
}




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




   public function Checktel($data)
        {
$query = $this->db->query('SELECT cus_tel FROM customer_owner WHERE cus_tel="'.$data['custel'].'"');
return $query->num_rows();

        }
		
		
		




   public function C2m_bd_noti()
        {

$dnow = date('j');
$mnow = date('n');


$query = $this->db->query('SELECT 
*,
d-'.$dnow.' as bdday
FROM customer_owner 
WHERE m="'.$mnow.'" AND d-'.$dnow.'>="0" AND d-'.$dnow.'<='.$_SESSION['c2m_bd_noti'].' 
ORDER BY bdday,cus_id ASC
');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		
		


      public function Check_point($data)
        {

$query = $this->db->query('SELECT * FROM customer_owner 
WHERE cus_name LIKE "%'.$data['searchtext'].'%"
OR cus_tel LIKE "%'.$data['searchtext'].'%"
OR cus_add_time LIKE "%'.$data['searchtext'].'%"
LIMIT 1
');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		
		
		

    public function Deletecustomer($data)
        {

$query = $this->db->query('DELETE FROM customer_owner  WHERE cus_id="'.$data['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

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



$query = $this->db->query('SELECT  co.cus_name as "ชื่อลูกค้า",co.cus_birthday as "วันเกิด",cs.customer_sex_name as "เพศ" ,cg.customer_group_name as "กลุ่ม", cl.customer_level_name as "ระดับ", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์", co.cus_remark as "หมายเหตุ"
    FROM customer_owner as co
    LEFT JOIN owner as ow on ow.owner_id=co.owner_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as cl on cl.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    WHERE ow.owner_id="'.$_SESSION['owner_id'].'" and co.cus_name LIKE "%'.$searchtext1.'%" and co.cus_tel LIKE "%'.$searchtext2.'%" and co.cus_email LIKE "%'.$searchtext3.'%" and co.cus_birthday LIKE "%'.$searchtext4.'-%" ORDER BY co.cus_id DESC');

return $query;

        }





    }
