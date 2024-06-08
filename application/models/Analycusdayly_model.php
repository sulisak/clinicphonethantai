<?php

class Analycusdayly_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



    


           public function Get($data)
        {

$query = $this->db->query('SELECT 
    COUNT(*) as count, 
    from_unixtime(cus_add_time,"%d-%m-%Y") as name 
    FROM customer_owner 
    WHERE owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cus_add_time,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" GROUP BY name ORDER BY name ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


             public function Getm($data)
        {

$query = $this->db->query('SELECT 
    COUNT(*) as count, 
    from_unixtime(cus_add_time,"%m-%Y") as name 
    FROM customer_owner 
    WHERE owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cus_add_time,"%Y")= "'.$data['yearselect'].'"  GROUP BY name ORDER BY name ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




public function Exportexcel($data)
        {
         

$query = $this->db->query('SELECT  from_unixtime(co.cus_add_time,"%d-%m-%Y") as "วันที่เพิ่มลูกค้าเข้าระบบ",co.cus_name as "ชื่อลูกค้า",co.cus_birthday as "วันเกิด",cs.customer_sex_name as "เพศ" ,cg.customer_group_name as "กลุ่ม", cl.customer_level_name as "ระดับ", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์", co.cus_remark as "หมายเหตุ"
    FROM customer_owner as co
    LEFT JOIN owner as ow on ow.owner_id=co.owner_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as cl on cl.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    WHERE ow.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(co.cus_add_time,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"  ORDER BY co.cus_id DESC');

return $query;

        }





public function Exportexcelm($data)
        {
         

$query = $this->db->query('SELECT  from_unixtime(co.cus_add_time,"%m-%Y") as "เดือนที่เพิ่มลูกค้าเข้าระบบ",co.cus_name as "ชื่อลูกค้า",co.cus_birthday as "วันเกิด",cs.customer_sex_name as "เพศ" ,cg.customer_group_name as "กลุ่ม", cl.customer_level_name as "ระดับ", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์", co.cus_remark as "หมายเหตุ",
    from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่เพิ่มลูกค้าเข้าระบบ"
    FROM customer_owner as co
    LEFT JOIN owner as ow on ow.owner_id=co.owner_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as cl on cl.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    WHERE ow.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(co.cus_add_time,"%Y") = "'.$data['yearselect'].'"  ORDER BY co.cus_id DESC');

return $query;

        }



        public function Exportexcelthisday($data)
        {
         

$query = $this->db->query('SELECT  from_unixtime(co.cus_add_time,"%d-%m-%Y") as "วันที่เพิ่มลูกค้าเข้าระบบ",co.cus_name as "ชื่อลูกค้า",co.cus_birthday as "วันเกิด",cs.customer_sex_name as "เพศ" ,cg.customer_group_name as "กลุ่ม", cl.customer_level_name as "ระดับ", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์", co.cus_remark as "หมายเหตุ"
    FROM customer_owner as co
    LEFT JOIN owner as ow on ow.owner_id=co.owner_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as cl on cl.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    WHERE ow.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(co.cus_add_time,"%d-%m-%Y")="'.$data['thisday'].'"  ORDER BY co.cus_id DESC');

return $query;

        }




        public function Exportexcelthism($data)
        {
         

$query = $this->db->query('SELECT  from_unixtime(co.cus_add_time,"%m-%Y") as "เดือนที่เพิ่มลูกค้าเข้าระบบ",co.cus_name as "ชื่อลูกค้า",co.cus_birthday as "วันเกิด",cs.customer_sex_name as "เพศ" ,cg.customer_group_name as "กลุ่ม", cl.customer_level_name as "ระดับ", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์", co.cus_remark as "หมายเหตุ",
    from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่เพิ่มลูกค้าเข้าระบบ"
    FROM customer_owner as co
    LEFT JOIN owner as ow on ow.owner_id=co.owner_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as cl on cl.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    WHERE ow.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(co.cus_add_time,"%m-%Y")="'.$data['thism'].'"  ORDER BY co.cus_id DESC');

return $query;

        }






    }