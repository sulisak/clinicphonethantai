<?php

class Analycontactdayly_model extends CI_Model {



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
    from_unixtime(addtime,"%d-%m-%Y") as name 
    FROM contact_list 
    WHERE owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" GROUP BY name ORDER BY name ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




   public function Getm($data)
        {

$query = $this->db->query('SELECT 
    COUNT(*) as count, 
    from_unixtime(addtime,"%m-%Y") as name 
    FROM contact_list 
    WHERE owner_id="'.$_SESSION['owner_id'].'" 
    and from_unixtime(addtime,"%Y") = "'.$data['yearselect'].'" GROUP BY name ORDER BY name ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




public function Exportexcel($data)
        {
        
$query = $this->db->query('SELECT 
    ct.cus_name as "ชื่อลูกค้า",
    ct.cus_tel as "เบอร์โทร",
    ct.cus_email as "อีเมล์",
    cl.contact_list_detail as "รายละเอียดการติดต่อ",
    cf.contact_from_name as "ช่องทางการติดต่อ",
    cg.contact_grade_name as "เกรด/คะแนนการติดต่อ",
    ps.product_service_name as "สินค้า/บริการ",
    cr.customer_reasonbuy_name as "เหตุผลที่ซื้อ",
    crb.customer_reasonnotbuy_name as "เหตุผลที่ไม่ซื้อ",
    from_unixtime(cl.addtime,"%d-%m-%Y  %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN customer_owner as ct on cl.cus_id=ct.cus_id
    LEFT JOIN contact_from as cf on cl.contact_from_id=cf.contact_from_id
    LEFT JOIN contact_grade as cg on cl.contact_grade_id=cg.contact_grade_id
    LEFT JOIN product_service as ps on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    LEFT JOIN customer_reasonnotbuy as crb on cl.customer_reasonnotbuy_id=crb.customer_reasonnotbuy_id

    WHERE cl.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") BETWEEN "'.$data['dayfrom'].'" AND "'.$data['dayto'].'" ORDER BY cl.contact_list_id DESC');

return $query;

        }





public function Exportexcelm($data)
        {
         
    
$query = $this->db->query('SELECT 
    from_unixtime(cl.addtime,"%m-%Y") as "เดือนที่ทำรายการ",
    ct.cus_name as "ชื่อลูกค้า",
    ct.cus_tel as "เบอร์โทร",
    ct.cus_email as "อีเมล์",
    cl.contact_list_detail as "รายละเอียดการติดต่อ",
    cf.contact_from_name as "ช่องทางการติดต่อ",
    cg.contact_grade_name as "เกรด/คะแนนการติดต่อ",
    ps.product_service_name as "สินค้า/บริการ",
    cr.customer_reasonbuy_name as "เหตุผลที่ซื้อ",
    crb.customer_reasonnotbuy_name as "เหตุผลที่ไม่ซื้อ",
    from_unixtime(cl.addtime,"%d-%m-%Y  %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN customer_owner as ct on cl.cus_id=ct.cus_id
    LEFT JOIN contact_from as cf on cl.contact_from_id=cf.contact_from_id
    LEFT JOIN contact_grade as cg on cl.contact_grade_id=cg.contact_grade_id
    LEFT JOIN product_service as ps on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    LEFT JOIN customer_reasonnotbuy as crb on cl.customer_reasonnotbuy_id=crb.customer_reasonnotbuy_id

    WHERE cl.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%Y") = "'.$data['yearselect'].'" ORDER BY cl.contact_list_id DESC');

return $query;

        }



        public function Exportexcelthisday($data)
        {
         
$query = $this->db->query('SELECT 
    ct.cus_name as "ชื่อลูกค้า",
    ct.cus_tel as "เบอร์โทร",
    ct.cus_email as "อีเมล์",
    cl.contact_list_detail as "รายละเอียดการติดต่อ",
    cf.contact_from_name as "ช่องทางการติดต่อ",
    cg.contact_grade_name as "เกรด/คะแนนการติดต่อ",
    ps.product_service_name as "สินค้า/บริการ",
    cr.customer_reasonbuy_name as "เหตุผลที่ซื้อ",
    crb.customer_reasonnotbuy_name as "เหตุผลที่ไม่ซื้อ",
    from_unixtime(cl.addtime,"%d-%m-%Y  %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN customer_owner as ct on cl.cus_id=ct.cus_id
    LEFT JOIN contact_from as cf on cl.contact_from_id=cf.contact_from_id
    LEFT JOIN contact_grade as cg on cl.contact_grade_id=cg.contact_grade_id
    LEFT JOIN product_service as ps on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    LEFT JOIN customer_reasonnotbuy as crb on cl.customer_reasonnotbuy_id=crb.customer_reasonnotbuy_id

    WHERE cl.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%d-%m-%Y") = "'.$data['thisday'].'" ORDER BY cl.contact_list_id DESC');

return $query;

        }




        public function Exportexcelthism($data)
        {
         

$query = $this->db->query('SELECT 
    from_unixtime(cl.addtime,"%m-%Y") as "เดือนที่ทำรายการ",
    ct.cus_name as "ชื่อลูกค้า",
    ct.cus_tel as "เบอร์โทร",
    ct.cus_email as "อีเมล์",
    cl.contact_list_detail as "รายละเอียดการติดต่อ",
    cf.contact_from_name as "ช่องทางการติดต่อ",
    cg.contact_grade_name as "เกรด/คะแนนการติดต่อ",
    ps.product_service_name as "สินค้า/บริการ",
    cr.customer_reasonbuy_name as "เหตุผลที่ซื้อ",
    crb.customer_reasonnotbuy_name as "เหตุผลที่ไม่ซื้อ",
    from_unixtime(cl.addtime,"%d-%m-%Y  %H:%i:%s") as "วันที่ทำรายการ"
    FROM contact_list as cl
    LEFT JOIN customer_owner as ct on cl.cus_id=ct.cus_id
    LEFT JOIN contact_from as cf on cl.contact_from_id=cf.contact_from_id
    LEFT JOIN contact_grade as cg on cl.contact_grade_id=cg.contact_grade_id
    LEFT JOIN product_service as ps on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    LEFT JOIN customer_reasonnotbuy as crb on cl.customer_reasonnotbuy_id=crb.customer_reasonnotbuy_id

    WHERE cl.owner_id="'.$_SESSION['owner_id'].'" and from_unixtime(cl.addtime,"%m-%Y") = "'.$data['thism'].'" ORDER BY cl.contact_list_id DESC');

return $query;

        }



    }