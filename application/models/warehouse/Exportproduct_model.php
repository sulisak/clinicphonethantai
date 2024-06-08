<?php

class Exportproduct_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Adddetail($data)
        {

$data2['importproduct_header_code'] = $data['importproduct_header_code'];
$data2['product_id'] = $data['product_id'];
$data2['product_name'] = $data['product_name_title'];
$data2['lotno'] = $data['lotno'];
$data2['date_end'] = $data['date_end'];
$data2['date_end2'] = strtotime($data['date_end']);

$data2['importproduct_detail_pricebase'] = $data['importproduct_detail_pricebase'];
$data2['importproduct_detail_num'] = $data['importproduct_detail_num'];
$data2['importproduct_detail_date'] = $data['importproduct_detail_date'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['branch_id'] = $_SESSION['branch_id'];
if ($this->db->insert("wh_exportproduct_detail", $data2)){

		return true;
	}

  }


      public function Addheader($data)
        {
$data2['importproduct_header_remark'] = $data['importproduct_header_remark'];
$data2['importproduct_header_refcode'] = $data['importproduct_header_refcode'];
$data2['importproduct_header_num'] = $data['importproduct_header_num'];
$data2['importproduct_header_amount'] = $data['importproduct_header_amount'];
$data2['importproduct_header_code'] = $data['importproduct_header_code'];
$data2['importproduct_header_date'] = $data['importproduct_header_date'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['branch_id'] = $_SESSION['branch_id'];

$data2['lotno'] = $data['lotno'];
$data2['date_end'] = $data['date_end'];
$data2['date_end2'] = strtotime($data['date_end']);


if ($this->db->insert("wh_exportproduct_header", $data2)){
        return true;
    }

  }







           public function Get($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *,
    from_unixtime(importproduct_header_date,"%d-%m-%Y %H:%i:%s") as importproduct_header_date2,
	(SELECT SUM(importproduct_detail_num) FROM wh_exportproduct_detail as wd WHERE wd.importproduct_header_code=wh.importproduct_header_code) as importproduct_header_num
    FROM wh_exportproduct_header as wh
	LEFT JOIN wh_exportproduct_detail as wd on wd.importproduct_header_code=wh.importproduct_header_code
	LEFT JOIN branch as b on b.branch_id=wh.branch_id
    WHERE
    wh.branch_id="'.$_SESSION['branch_id'].'"  AND wh.importproduct_header_refcode LIKE "%'.$data['searchtext'].'%"
    OR wh.branch_id="'.$_SESSION['branch_id'].'"  AND wh.importproduct_header_remark LIKE "%'.$data['searchtext'].'%"
    OR wh.branch_id="'.$_SESSION['branch_id'].'"  AND wh.importproduct_header_code LIKE "%'.$data['searchtext'].'%"
	OR wh.branch_id="'.$_SESSION['branch_id'].'"  AND wd.product_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY wh.importproduct_header_id ORDER BY wh.importproduct_header_id DESC');


$query = $this->db->query('SELECT *,
    from_unixtime(importproduct_header_date,"%d-%m-%Y %H:%i:%s") as importproduct_header_date2,
	(SELECT SUM(importproduct_detail_num) FROM wh_exportproduct_detail as wd WHERE wd.importproduct_header_code=wh.importproduct_header_code) as importproduct_header_num
    FROM wh_exportproduct_header as wh
	LEFT JOIN wh_exportproduct_detail as wd on wd.importproduct_header_code=wh.importproduct_header_code
	LEFT JOIN branch as b on b.branch_id=wh.branch_id
    WHERE
    wh.branch_id="'.$_SESSION['branch_id'].'"  AND wh.importproduct_header_refcode LIKE "%'.$data['searchtext'].'%"
    OR wh.branch_id="'.$_SESSION['branch_id'].'"  AND wh.importproduct_header_remark LIKE "%'.$data['searchtext'].'%"
    OR wh.branch_id="'.$_SESSION['branch_id'].'"  AND wh.importproduct_header_code LIKE "%'.$data['searchtext'].'%"
	OR wh.branch_id="'.$_SESSION['branch_id'].'"  AND wd.product_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY wh.importproduct_header_id ORDER BY wh.importproduct_header_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }









        public function Getdateend($data)
     {


     $perpage = $data['perpage'];

         if($data['page'] && $data['page'] != ''){
     $page = $data['page'];
         }else{
       $page = '1';
         }


         $start = ($page - 1) * $perpage;


     $querynum = $this->db->query('SELECT wl.product_name,
       wd.lotno,
       wd.date_end,
       wd.date_end2,
     from_unixtime(importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date2
     FROM wh_exportproduct_detail as wd
     LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
     WHERE  wd.date_end !="" AND wd.status="0"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
     OR  wd.date_end !="" AND wd.status="0" AND wd.lotno LIKE "%'.$data['searchtext'].'%"
     ORDER BY wd.date_end2 ASC LIMIT '.$start.' , '.$perpage.' ');


     $query = $this->db->query('SELECT wl.product_id,wl.product_name,wl.product_code,
       wd.lotno,
       wd.date_end,
       wd.date_end2,
       wd.importproduct_detail_num,
       wd.importproduct_detail_id,
     from_unixtime(importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date2
     FROM wh_exportproduct_detail as wd
     LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
     WHERE  wd.date_end !="" AND wd.status="0"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
     OR  wd.date_end !="" AND wd.status="0" AND wd.lotno LIKE "%'.$data['searchtext'].'%"
     ORDER BY wd.date_end2 ASC LIMIT '.$start.' , '.$perpage.' ');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


     $num_rows = $querynum->num_rows();

     $pageall = ceil($num_rows/$perpage);




     $json = '{"list": '.$encode_data.',
     "numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

     return $json;


     }











public function Getimportone($data)
        {

$query = $this->db->query('SELECT
wi.product_name as product_name,
wp.product_code as product_code,
wi.lotno as lotno,
wi.date_end as date_end,
wi.importproduct_detail_pricebase as importproduct_detail_pricebase,
wi.importproduct_detail_num as importproduct_detail_num,
from_unixtime(wi.importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date,
z.zone_name as zone_name,
u.product_unit_name as unit_name
    FROM wh_exportproduct_detail as wi
    LEFT JOIN wh_product_list as wp on wp.product_id=wi.product_id
    LEFT JOIN zone as z on z.zone_id=wi.product_id
	LEFT JOIN wh_product_unit as u on u.product_unit_id=wp.product_unit_id
    WHERE wi.owner_id="'.$_SESSION['owner_id'].'" and wi.importproduct_header_code="'.$data['importproduct_header_code'].'"
    ORDER BY wi.importproduct_detail_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getimportone2($data)
        {

$query = $this->db->query('SELECT
wp.product_id as product_id,
wp.product_name as product_name,
wi.importproduct_detail_pricebase as importproduct_detail_pricebase,
wi.importproduct_detail_num as importproduct_detail_num,
from_unixtime(wi.importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date
    FROM wh_exportproduct_detail as wi
    LEFT JOIN wh_product_list as wp on wp.product_id=wi.product_id
    WHERE wi.owner_id="'.$_SESSION['owner_id'].'" and wi.importproduct_header_code="'.$data['importproduct_header_code'].'"
    ORDER BY wi.importproduct_detail_id ASC');
$encode_data = $query->result();
return $encode_data;

        }





    public function Deleteimportlist($data)
        {

$query = $this->db->query('DELETE FROM wh_exportproduct_detail  WHERE importproduct_header_code="'.$data['importproduct_header_code'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

if($query){
$query2 = $this->db->query('DELETE FROM wh_exportproduct_header  WHERE importproduct_header_code="'.$data['importproduct_header_code'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
}


return true;

        }




        public function Updatestatusdateend($data)
        {

        $query = $this->db->query('UPDATE wh_exportproduct_detail
        SET status="1"
        WHERE importproduct_detail_id="'.$data['importproduct_detail_id'].'"');



        $query2 = $this->db->query('UPDATE wh_product_list
            SET product_stock_num=product_stock_num + '.$data['importproduct_detail_num'].'
            WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

        return true;




        }






        public function Salestatusdateend3($data)
        {

        $query = $this->db->query('UPDATE wh_exportproduct_detail
        SET status="3"
        WHERE importproduct_detail_id="'.$data['importproduct_detail_id'].'"');

        return true;




        }






        public function Updateproductimportstock($data)
        {

$query = $this->db->query('UPDATE stock
    SET product_stock_num=product_stock_num - '.$data['importproduct_detail_num'].'
    WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');

return true;

        }
		
		
		
		
		
		public function Transferstock($data,$branch_id)
        {

$query1 = $this->db->query('SELECT * FROM stock WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$branch_id.'"');
$num_rows = $query1->num_rows();

if($num_rows == 1){
	$this->db->query('UPDATE stock SET product_stock_num=product_stock_num+'.$data['importproduct_detail_num'].'
WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$branch_id.'"');	
}else{ 
$data2['product_id'] = $data['product_id'];
$data2['branch_id'] = $branch_id;
$data2['product_stock_num'] = $data['importproduct_detail_num'];
$this->db->insert("stock", $data2);
}






	
			$query_prl = $this->db->query('SELECT
        *
        FROM wh_product_relation_list
        WHERE product_id="'.$data['product_id'].'"');
$prl = $query_prl->result_array();

foreach ($prl as $key => $value) {

$query_ss = $this->db->query('SELECT * FROM stock WHERE product_id="'.$value['product_num_relation'].'" and  branch_id="'.$branch_id.'"');
$num_rows_ss = $query_ss->num_rows();


if($value['product_type_relation'] == 0){
if($num_rows_ss > 0){
	
	$numnew = $value['product_num_relation']*$data['importproduct_detail_num'];
$this->db->query('UPDATE stock SET product_stock_num=product_stock_num+'.$numnew.'
WHERE product_id="'.$value['product_id_relation'].'" and  branch_id="'.$branch_id.'"');
	
}else{ 
$data_ss['product_id'] = $value['product_id_relation'];
$data_ss['branch_id'] = $branch_id;
$data_ss['product_stock_num'] = $value['product_num_relation']*$data['importproduct_detail_num'];
$this->db->insert("stock", $data_ss);
}
}
	
	
}
	


return true;

        }
		
		
		
				public function Movesn($data,$branch_id)
        {


	$this->db->query('UPDATE serial_number SET branch_id='.$branch_id.'
WHERE sn_code="'.$data['sn_code'].'" and  branch_id="'.$_SESSION['branch_id'].'" AND status="0"');	

return true;

        }
		
		
		
						public function Delsn($data)
        {

$query = $this->db->query('DELETE FROM serial_number  
WHERE sn_code="'.$data['sn_code'].'" and  branch_id="'.$_SESSION['branch_id'].'" AND status="0"');

return true;

        }
		
		
		
		
		public function Confirm($data)
        {

$this->db->query('UPDATE wh_exportproduct_header
             SET confirm="1"
             WHERE importproduct_header_id="'.$data['header_id'].'" ');
return true;
        }
		
		
		
		
		
		

         public function Updateproductdeletestock($data2)
        {
$query = $this->db->query('UPDATE stock
    SET product_stock_num=product_stock_num + '.$data2['detailnum'].'
    WHERE product_id="'.$data2['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');
return true;

        }



         public function Findproduct($data)
        {

$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_pricebase as product_pricebase,
    z.zone_name as zone_name,
    wu.product_unit_name as product_unit_name
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_code="'.$data['product_code'].'"
    ORDER BY wl.product_id DESC');
	
	
	$num_rows = $query->num_rows();
	
	
	
	if($num_rows == 0){
$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_pricebase as product_pricebase,
    z.zone_name as zone_name,
    wu.product_unit_name as product_unit_name,
	sn.sn_code as sn_code
    FROM wh_product_list  as wl
	LEFT JOIN serial_number as sn on sn.product_id=wl.product_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE sn.branch_id="'.$_SESSION['branch_id'].'" AND  sn.sn_code="'.$data['product_code'].'" AND sn.status="0"
    ORDER BY wl.product_id DESC LIMIT 1');
	
	}




	
	
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }






        public function Getrelationlist($product_id)
        {

        $query = $this->db->query('SELECT
        *
        FROM wh_product_relation_list
        WHERE product_id="'.$product_id.'"');
        return $query->result_array();

        }




        public function Updateproductimportstock_relation($product_id,$numnow)
        {

        $query = $this->db->query('UPDATE stock
        SET product_stock_num=product_stock_num - '.$numnow.'
        WHERE product_id="'.$product_id.'" and  branch_id="'.$_SESSION['branch_id'].'"');
        return true;

        }






    }
