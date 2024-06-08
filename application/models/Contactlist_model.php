<?php

class Contactlist_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {

$data['owner_id'] = $_SESSION['owner_id'];
$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];
$data['addtime'] = time();

if ($this->db->insert("contact_list", $data)){
		return true;
	}

  }


           public function Update($data)
        {



$where = array(
    'contact_list_id'  => $data['contact_list_id'],
        'owner_id' => $_SESSION['owner_id'],
        'cus_id'  => $data['cus_id']
);

$this->db->where($where);
if ($this->db->update("contact_list", $data)){
        return true;
    }

}



      



           public function Getone($data)
        {

$query = $this->db->query('SELECT 
    cl.cus_id as cus_id,
    cl.contact_list_id as contact_list_id,
    cl.contact_list_detail as contact_list_detail,
    from_unixtime(cl.addtime,"%d-%m-%Y  %H:%i:%s") as addtime,
     cf.contact_from_id as contact_from_id,
    cg.contact_grade_id as contact_grade_id,
    ps.product_service_id as product_service_id,
    cr.customer_reasonbuy_id as customer_reasonbuy_id,
    crb.customer_reasonnotbuy_id as customer_reasonnotbuy_id,
    cf.contact_from_name as contact_from_name,
    cg.contact_grade_name as contact_grade_name,
    ps.product_service_name as product_service_name,
    cr.customer_reasonbuy_name as customer_reasonbuy_name,
    crb.customer_reasonnotbuy_name as customer_reasonnotbuy_name
   

    FROM contact_list as cl
    LEFT JOIN contact_from as cf on cl.contact_from_id=cf.contact_from_id
    LEFT JOIN contact_grade as cg on cl.contact_grade_id=cg.contact_grade_id
    LEFT JOIN product_service as ps on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    LEFT JOIN customer_reasonnotbuy as crb on cl.customer_reasonnotbuy_id=crb.customer_reasonnotbuy_id

    WHERE cl.owner_id="'.$_SESSION['owner_id'].'" and cl.cus_id="'.$data['cus_id'].'" ORDER BY contact_list_id DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }

    public function Allcontact()
        {

$query = $this->db->query('SELECT *
    FROM contact_list
    WHERE owner_id="'.$_SESSION['owner_id'].'" ');
$num_rows = $query->num_rows();
return $num_rows;
        }




            public function Getall($data)
        {

             $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';      
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT 
    ct.cus_name as cus_name,
    cl.cus_id as cus_id,
    cl.contact_list_id as contact_list_id,
    cl.contact_list_detail as contact_list_detail,
    from_unixtime(cl.addtime,"%d-%m-%Y  %H:%i:%s") as addtime,
     cf.contact_from_id as contact_from_id,
    cg.contact_grade_id as contact_grade_id,
    ps.product_service_id as product_service_id,
    cr.customer_reasonbuy_id as customer_reasonbuy_id,
    crb.customer_reasonnotbuy_id as customer_reasonnotbuy_id,
    cf.contact_from_name as contact_from_name,
    cg.contact_grade_name as contact_grade_name,
    ps.product_service_name as product_service_name,
    cr.customer_reasonbuy_name as customer_reasonbuy_name,
    crb.customer_reasonnotbuy_name as customer_reasonnotbuy_name
   

    FROM contact_list as cl
    LEFT JOIN customer_owner as ct on cl.cus_id=ct.cus_id
    LEFT JOIN contact_from as cf on cl.contact_from_id=cf.contact_from_id
    LEFT JOIN contact_grade as cg on cl.contact_grade_id=cg.contact_grade_id
    LEFT JOIN product_service as ps on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    LEFT JOIN customer_reasonnotbuy as crb on cl.customer_reasonnotbuy_id=crb.customer_reasonnotbuy_id

    WHERE cl.owner_id="'.$_SESSION['owner_id'].'" and cl.contact_list_detail LIKE "%'.$data['searchtext'].'%" and from_unixtime(cl.addtime,"%d-%m-%Y") LIKE "%'.$data['searchdate'].'%" ORDER BY contact_list_id DESC');


$query = $this->db->query('SELECT 
    ct.cus_name as cus_name,
    cl.cus_id as cus_id,
    cl.contact_list_id as contact_list_id,
    cl.contact_list_detail as contact_list_detail,
    from_unixtime(cl.addtime,"%d-%m-%Y  %H:%i:%s") as addtime,
     cf.contact_from_id as contact_from_id,
    cg.contact_grade_id as contact_grade_id,
    ps.product_service_id as product_service_id,
    cr.customer_reasonbuy_id as customer_reasonbuy_id,
    crb.customer_reasonnotbuy_id as customer_reasonnotbuy_id,
    cf.contact_from_name as contact_from_name,
    cg.contact_grade_name as contact_grade_name,
    ps.product_service_name as product_service_name,
    cr.customer_reasonbuy_name as customer_reasonbuy_name,
    crb.customer_reasonnotbuy_name as customer_reasonnotbuy_name
   

    FROM contact_list as cl
    LEFT JOIN customer_owner as ct on cl.cus_id=ct.cus_id
    LEFT JOIN contact_from as cf on cl.contact_from_id=cf.contact_from_id
    LEFT JOIN contact_grade as cg on cl.contact_grade_id=cg.contact_grade_id
    LEFT JOIN product_service as ps on cl.product_service_id=ps.product_service_id
    LEFT JOIN customer_reasonbuy as cr on cl.customer_reasonbuy_id=cr.customer_reasonbuy_id
    LEFT JOIN customer_reasonnotbuy as crb on cl.customer_reasonnotbuy_id=crb.customer_reasonnotbuy_id

    WHERE cl.owner_id="'.$_SESSION['owner_id'].'" and cl.contact_list_detail LIKE "%'.$data['searchtext'].'%" and from_unixtime(cl.addtime,"%d-%m-%Y") LIKE "%'.$data['searchdate'].'%" ORDER BY contact_list_id DESC  LIMIT '.$start.' , '.$perpage.' ');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall;

return $json;

        }




    public function Delete($data)
        {
$query = $this->db->query('DELETE FROM contact_list  WHERE contact_list_id="'.$data['contact_list_id'].'" and  owner_id="'.$_SESSION['owner_id'].'" and cus_id="'.$data['cus_id'].'"');
return true;

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

    WHERE cl.owner_id="'.$_SESSION['owner_id'].'" and cl.contact_list_detail LIKE "%'.$data['searchtext'].'%" and from_unixtime(cl.addtime,"%d-%m-%Y") LIKE "%'.$data['searchdate'].'%" ORDER BY contact_list_id DESC');

return $query;

        }




    }