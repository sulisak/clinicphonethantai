<?php

class Analyticall_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

      


           public function Getproduct($data)
        {

$query = $this->db->query('SELECT COUNT(ps.product_service_id) as count, ps.product_service_name as name, ps.product_service_id as id
    FROM contact_list as cl
    LEFT JOIN product_service as ps on ps.product_service_id=cl.product_service_id
    WHERE ps.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.product_service_id 
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


     public function Getcustomergroup($data)
        {
$query = $this->db->query('SELECT COUNT(cg.customer_group_id) as count, cg.customer_group_name as name ,cg.customer_group_id as id, COUNT(cl.product_service_id) as productcount
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on cl.cus_id=co.cus_id
    LEFT JOIN customer_group as cg on cg.customer_group_id=co.customer_group_id
    WHERE cg.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY co.customer_group_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





   public function Getcustomerlevel($data)
        {
$query = $this->db->query('SELECT COUNT(cl.customer_level_id) as count, cl.customer_level_name as name,cl.customer_level_id as id, COUNT(clv.product_service_id) as productcount
    FROM customer_owner as co
    LEFT JOIN contact_list as clv on clv.cus_id=co.cus_id
    LEFT JOIN customer_level as cl on cl.customer_level_id=co.customer_level_id
    WHERE cl.owner_id="'.$_SESSION['owner_id'].'"  and from_unixtime(clv.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY co.customer_level_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }

           public function Getcustomersex($data)
        {
$query = $this->db->query('SELECT COUNT(cs.customer_sex_id) as count, cs.customer_sex_name as name,cs.customer_sex_id as id, COUNT(cl.product_service_id) as productcount
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on cl.cus_id=co.cus_id
    LEFT JOIN customer_sex as cs on cs.customer_sex_id=co.customer_sex_id
    WHERE cs.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY co.customer_sex_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }

           public function Getcontactfrom($data)
        {
$query = $this->db->query('SELECT COUNT(cf.contact_from_id) as count, cf.contact_from_name as name ,cf.contact_from_id as id, COUNT(cl.product_service_id) as productcount
    FROM contact_list as cl
    LEFT JOIN contact_from as cf on cf.contact_from_id=cl.contact_from_id
    WHERE cf.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.contact_from_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }

           public function Getcontactgrade($data)
        {
$query = $this->db->query('SELECT COUNT(cg.contact_grade_id) as count, cg.contact_grade_name as name ,cg.contact_grade_id as id, COUNT(cl.product_service_id) as productcount
    FROM contact_list as cl
    LEFT JOIN contact_grade as cg on cg.contact_grade_id=cl.contact_grade_id
    WHERE cg.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.contact_grade_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }

           public function Getreasonbuy($data)
        {

$query = $this->db->query('SELECT COUNT(cr.customer_reasonbuy_id) as count, cr.customer_reasonbuy_name as name,cr.customer_reasonbuy_id as id , COUNT(cl.product_service_id) as productcount
    FROM contact_list as cl
    LEFT JOIN customer_reasonbuy as cr on cr.customer_reasonbuy_id=cl.customer_reasonbuy_id
    WHERE cr.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.customer_reasonbuy_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
        }

           public function Getreasonnotbuy($data)
        {
$query = $this->db->query('SELECT COUNT(crn.customer_reasonnotbuy_id) as count, crn.customer_reasonnotbuy_name as name ,crn.customer_reasonnotbuy_id as id, COUNT(cl.product_service_id) as productcount
    FROM contact_list as cl
    LEFT JOIN customer_reasonnotbuy as crn on crn.customer_reasonnotbuy_id=cl.customer_reasonnotbuy_id
    WHERE crn.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY cl.customer_reasonnotbuy_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }

           public function Getprovince($data)
        {
$query = $this->db->query('SELECT COUNT(co.cus_id) as count, tp.province_name as name,co.province_id as id , COUNT(cl.product_service_id) as productcount
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on cl.cus_id=co.cus_id
    LEFT JOIN thai_province as tp on tp.province_id=co.province_id 
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY co.province_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


            public function Getamphur($data)
        {
$query = $this->db->query('SELECT COUNT(co.cus_id) as count, ta.amphur_name as name,co.amphur_id as id , COUNT(cl.product_service_id) as productcount
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on cl.cus_id=co.cus_id
    LEFT JOIN thai_amphur as ta on ta.amphur_id=co.amphur_id 
    LEFT JOIN thai_province as tp on ta.province_id=tp.province_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and tp.province_id="'.$data['id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY co.amphur_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


    public function Getdistrict($data)
        {
$query = $this->db->query('SELECT COUNT(co.cus_id) as count, td.district_name as name, co.district_id as id, COUNT(cl.product_service_id) as productcount
    FROM customer_owner as co
    LEFT JOIN contact_list as cl on cl.cus_id=co.cus_id
    LEFT JOIN thai_district as td on td.district_id=co.district_id 
    LEFT JOIN thai_amphur as ta on td.amphur_id=ta.amphur_id
    WHERE co.owner_id="'.$_SESSION['owner_id'].'" and ta.amphur_id="'.$data['id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'"
    GROUP BY co.district_id
    ORDER BY count DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }








    }