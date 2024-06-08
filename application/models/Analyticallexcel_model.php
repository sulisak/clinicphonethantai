<?php

class Analyticallexcel_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

      


           public function Getproduct($data)
        {

$query = $this->db->query('SELECT  ps.product_service_name as "สินค้า/บริการ",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า",  co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(cl.addtime,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN customer_owner as co  on cl.cus_id=co.cus_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'"  and cl.product_service_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"  ORDER BY cl.addtime DESC');

return $query;

        }


     public function Getcustomergroup($data)
        {
$query = $this->db->query('SELECT cg.customer_group_name as "กลุ่มลูกค้า",cl.contact_list_detail as "รายละเอียดการติดต่อ",  co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(cl.addtime,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on co.cus_id=cl.cus_id
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and co.customer_group_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" ORDER BY cl.addtime DESC ' );
return $query;

        }





   public function Getcustomerlevel($data)
        {
$query = $this->db->query('SELECT clv.customer_level_name as "ระดับลูกค้า",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on co.cus_id=cl.cus_id
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and co.customer_level_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" 
    ORDER BY cl.addtime DESC');
return $query;

        }

           public function Getcustomersex($data)
        {
$query = $this->db->query('SELECT cs.customer_sex_name as "เพศลูกค้า",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on co.cus_id=cl.cus_id
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    WHERE cs.owner_id="'.$_SESSION['owner_id'].'"   and co.customer_sex_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    ORDER BY cl.addtime DESC');
return $query;

        }

           public function Getcontactfrom($data)
        {
$query = $this->db->query('SELECT cf.contact_from_name as "ช่องทางการติดต่อ",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_owner as co  on cl.cus_id=co.cus_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN contact_from as cf on cf.contact_from_id=cl.contact_from_id
    WHERE cf.owner_id="'.$_SESSION['owner_id'].'" and cl.contact_from_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    ORDER BY cl.addtime DESC');
return $query;

        }



           public function Getcontactgrade($data)
        {
$query = $this->db->query('SELECT cg.contact_grade_name as "เกรดคะแนนการติดต่อ",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",cgp.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_owner as co  on cl.cus_id=co.cus_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cgp on cgp.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN contact_grade as cg on cg.contact_grade_id=cl.contact_grade_id
    WHERE cg.owner_id="'.$_SESSION['owner_id'].'"  and cg.contact_grade_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    ORDER BY cl.addtime DESC');
return $query;

        }

           public function Getreasonbuy($data)
        {

$query = $this->db->query('SELECT cr.customer_reasonbuy_name as "เหตุผลที่ซื้อ",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_owner as co  on cl.cus_id=co.cus_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN customer_reasonbuy as cr on cr.customer_reasonbuy_id=cl.customer_reasonbuy_id
    WHERE cr.owner_id="'.$_SESSION['owner_id'].'" and cr.customer_reasonbuy_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" 
    ORDER BY cl.addtime DESC');
return $query;
        }

           public function Getreasonnotbuy($data)
        {
$query = $this->db->query('SELECT crn.customer_reasonnotbuy_name as "เหตุผลที่ไม่ซื้อ",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า", cs.customer_sex_name as "เพศลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_owner as co  on cl.cus_id=co.cus_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN customer_reasonnotbuy as crn on crn.customer_reasonnotbuy_id=cl.customer_reasonnotbuy_id
    WHERE crn.owner_id="'.$_SESSION['owner_id'].'" and crn.customer_reasonnotbuy_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    ORDER BY cl.addtime DESC');
return $query;

        }

           public function Getprovince($data)
        {
$query = $this->db->query('SELECT tp.province_name as "ลูกค้าในจังหวัด",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on co.cus_id=cl.cus_id
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and co.province_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    ORDER BY cl.addtime DESC');
return $query;

        }


            public function Getamphur($data)
        {
$query = $this->db->query('SELECT ta.amphur_name as "ลูกค้าในอำเภอ",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(co.cus_add_time,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on co.cus_id=cl.cus_id
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id 
    LEFT JOIN thai_province as tp on ta.province_id=tp.province_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and tp.province_id="'.$data['id'].'" and ta.amphur_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    ORDER BY cl.addtime DESC');
return $query;

        }


    public function Getdistrict($data)
        {
$query = $this->db->query('SELECT td.district_name as "ลูกค้าในตำบล",cl.contact_list_detail as "รายละเอียดการติดต่อ", co.cus_name as "ชื่อลูกค้า",cs.customer_sex_name as "เพศลูกค้า",cg.customer_group_name as "กลุ่มลูกค้า",clv.customer_level_name as "ระดับลูกค้า", co.cus_tel as "เบอร์โทร",co.cus_email as "อีเมล์" , co.cus_address as "ที่อยู่", tp.province_name as "จังหวัด",ta.amphur_name as "อำเภอ",td.district_name as "ตำบล", co.cus_address_postcode as "รหัสไปรษณีย์",ps.product_service_name as "สินค้า/บริการที่สนใจ",from_unixtime(cl.addtime,"%d-%m-%Y %H:%i:%s") as "วันที่ทำรายการ"
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on co.cus_id=cl.cus_id
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    LEFT JOIN customer_level as clv on clv.customer_level_id=co.customer_level_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id 
    LEFT JOIN thai_amphur as ta on td.amphur_id=ta.amphur_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and ta.amphur_id="'.$data['id'].'" and td.district_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    ORDER BY cl.addtime DESC');
return $query;

        }


public function Getcustomergroupproduct($data)
        {
$query = $this->db->query('SELECT cg.customer_group_name as "กลุ่มลูกค้า",COUNT(co.customer_group_id) as "จำนวนครั้ง", ps.product_service_name as "ชื่อสินค้า/บริการ" 
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_owner as co on cl.cus_id=co.cus_id
    LEFT JOIN customer_group as cg on co.customer_group_id=cg.customer_group_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and co.customer_group_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" 
    GROUP BY cl.product_service_id ORDER BY COUNT(co.customer_group_id) DESC');
return $query;

        }


        public function Getcustomerlevelproduct($data)
        {
$query = $this->db->query('SELECT cg.customer_level_name as "ระดับลูกค้า",COUNT(co.customer_level_id) as "จำนวนครั้ง", ps.product_service_name as "ชื่อสินค้า/บริการ" 
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_owner as co on cl.cus_id=co.cus_id
    LEFT JOIN customer_level as cg on co.customer_level_id=cg.customer_level_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and co.customer_level_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" 
    GROUP BY cl.product_service_id ORDER BY COUNT(co.customer_level_id) DESC');
return $query;

        }


        public function Getcustomersexproduct($data)
        {
$query = $this->db->query('SELECT cg.customer_sex_name as "เพศลูกค้า",COUNT(co.customer_sex_id) as "จำนวนครั้ง", ps.product_service_name as "ชื่อสินค้า/บริการ" 
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_owner as co on cl.cus_id=co.cus_id
    LEFT JOIN customer_sex as cg on co.customer_sex_id=cg.customer_sex_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and co.customer_sex_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" 
    GROUP BY cl.product_service_id ORDER BY COUNT(co.customer_sex_id) DESC');
return $query;

        }


  public function Getcontactfromproduct($data)
        {
$query = $this->db->query('SELECT cg.contact_from_name as "ช่องทางการติดต่อ",COUNT(cl.contact_from_id) as "จำนวนครั้ง", ps.product_service_name as "ชื่อสินค้า/บริการ" 
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN contact_from as cg on cl.contact_from_id=cg.contact_from_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and cl.contact_from_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" 
    GROUP BY cl.product_service_id ORDER BY COUNT(cl.contact_from_id) DESC');
return $query;

        }



           public function Getcontactgradeproduct($data)
        {
$query = $this->db->query('SELECT cg.contact_grade_name as "เกรด/คะแนนการติดต่อ",COUNT(cl.contact_grade_id) as "จำนวนครั้ง", ps.product_service_name as "ชื่อสินค้า/บริการ" 
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN contact_grade as cg on cl.contact_grade_id=cg.contact_grade_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and cl.contact_grade_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.product_service_id ORDER BY COUNT(cl.contact_grade_id) DESC');
return $query;

        }

           public function Getreasonbuyproduct($data)
        {

$query = $this->db->query('SELECT cr.customer_reasonbuy_name as "เหตุผลที่ซื้อ",COUNT(cl.customer_reasonbuy_id) as "จำนวนครั้ง", ps.product_service_name as "ชื่อสินค้า/บริการ" 
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and cl.customer_reasonbuy_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" 
    GROUP BY cl.product_service_id ORDER BY COUNT(cl.customer_reasonbuy_id) DESC');
return $query;
        }

           public function Getreasonnotbuyproduct($data)
        {
$query = $this->db->query('SELECT cr.customer_reasonnotbuy_name as "เหตุผลที่ไม่ซื้อ",COUNT(cl.customer_reasonnotbuy_id) as "จำนวนครั้ง", ps.product_service_name as "ชื่อสินค้า/บริการ" 
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonnotbuy as cr on cl.customer_reasonnotbuy_id=cr.customer_reasonnotbuy_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and cl.customer_reasonnotbuy_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.product_service_id ORDER BY COUNT(cl.customer_reasonnotbuy_id) DESC');
return $query;

        }




        public function Getprovinceproduct($data)
        {
$query = $this->db->query('SELECT tp.province_name as "จังหวัด",COUNT(tp.province_id) as "จำนวนที่สนใจ", ps.product_service_name as "ชื่อสินค้า/บริการ" 
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_owner as co on cl.cus_id=co.cus_id
    LEFT JOIN thai_province as tp on co.province_id=tp.province_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and tp.province_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.product_service_id ORDER BY COUNT(tp.province_id) DESC');
return $query;

        }


            public function Getamphurproduct($data)
        {
$query = $this->db->query('SELECT ta.amphur_name as "อำเภอ",COUNT(ta.amphur_id) as "จำนวนที่สนใจ", ps.product_service_name as "ชื่อสินค้า/บริการ" 
FROM contact_list as cl
LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
LEFT JOIN customer_owner as co on cl.cus_id=co.cus_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id 
    LEFT JOIN thai_province as tp on ta.province_id=tp.province_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and tp.province_id="'.$data['id'].'" and ta.amphur_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.product_service_id ORDER BY COUNT(ta.amphur_id) DESC');
return $query;

        }


    public function Getdistrictproduct($data)
        {
$query = $this->db->query('SELECT td.district_name as "อำเภอ",COUNT(td.district_id) as "จำนวนที่สนใจ", ps.product_service_name as "ชื่อสินค้า/บริการ" 
FROM contact_list as cl
LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
LEFT JOIN customer_owner as co on cl.cus_id=co.cus_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id 
    LEFT JOIN thai_amphur as ta on td.amphur_id=ta.amphur_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and ta.amphur_id="'.$data['id'].'" and td.district_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" 
    GROUP BY cl.product_service_id ORDER BY COUNT(td.district_id) DESC');
return $query;

        }








           public function Getreasonbuycontact($data)
        {

$query = $this->db->query('SELECT cr.customer_reasonbuy_name as "เหตุผลที่ซื้อ", ps.product_service_name as "ชื่อสินค้า/บริการ" , cl.contact_list_detail as "รายละอียด",ow.cus_name as "ชื่อลูกค้า", from_unixtime(cl.addtime,"%d-%m-%Y %H:%i:%s") as "วันที่"
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_owner as ow on cl.cus_id=ow.cus_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and cl.customer_reasonbuy_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" ORDER BY cl.product_service_id ASC');
return $query;
        }

           public function Getreasonnotbuycontact($data)
        {
$query = $this->db->query('SELECT cr.customer_reasonnotbuy_name as "เหตุผลที่ไม่ซื้อ", ps.product_service_name as "ชื่อสินค้า/บริการ" , cl.contact_list_detail as "รายละอียด", ow.cus_name as "ชื่อลูกค้า", from_unixtime(cl.addtime,"%d-%m-%Y %H:%i:%s") as "วันที่"
    FROM contact_list as cl
    LEFT JOIN product_service as ps  on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_owner as ow on cl.cus_id=ow.cus_id
    LEFT JOIN customer_reasonnotbuy as cr on cl.customer_reasonnotbuy_id=cr.customer_reasonnotbuy_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'"  and cl.customer_reasonnotbuy_id="'.$data['excel_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" ORDER BY cl.product_service_id ASC');
return $query;

        }




    }