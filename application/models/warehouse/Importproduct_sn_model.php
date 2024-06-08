<?php

class Importproduct_sn_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




public function Getpn_detail($data)
                {

        $query = $this->db->query('SELECT
        wp.product_id as product_id,
        wp.product_name as product_name_title,
        wp.product_code as product_code,
        pd.price_per_num as importproduct_detail_pricebase,
        pd.importproduct_detail_num as importproduct_detail_num,
        wu.product_unit_name,
        wp.product_stock_num,
		pd.lotno,
		pd.date_end
            FROM purchase_buy_detail as pd
			LEFT JOIN purchase_buy_header as ph on ph.importproduct_header_code=pd.importproduct_header_code
            LEFT JOIN wh_product_list as wp on wp.product_id=pd.product_id
            LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wp.product_unit_id
            WHERE pd.owner_id="'.$_SESSION['owner_id'].'" AND ph.status="0"  and pd.importproduct_header_code="'.$data['importproduct_header_code'].'"
            ORDER BY pd.importproduct_detail_id ASC');
        $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
        return $encode_data;

                }
				
				
				
        public function Add($data)
        {
$this->db->insert("serial_number", $data);		

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


if ($this->db->insert("wh_importproduct_header", $data2)){

//start PURCHASE INSTOCK
  $this->db->query('UPDATE purchase_buy_header
             SET status="1"
             WHERE importproduct_header_code="'.$data['importproduct_header_refcode'].'" ');
//end PURCHASE INSTOCK

        return true;
    }
	

  }






public function Confirm($data)
        {

$this->db->query('UPDATE serial_number
             SET confirm="1"
             WHERE im_no="'.$data['header_id'].'" ');
return true;
        }
		
		
		
		public function Checksn($data)
        {

$aa = $this->db->query('SELECT * FROM serial_number
             WHERE sn_code="'.$data['sn_code'].'" LIMIT 1');
	$num_rows = $aa->num_rows();		 
if($num_rows>0){
	foreach ($aa->result() as $row) {	
$sn = $row->sn_code;
	}
}else{
$sn = '';
}			 
return $sn;
        }
		
		
		public function Checksnnum($data)
        {
$aa = $this->db->query('SELECT * FROM serial_number
             WHERE sn_code="'.$data['sn_code'].'" LIMIT 1');
	$num_rows = $aa->num_rows();		 			 
return $num_rows;
        }
		
		
		
		




        public function Updateproductimportstock_sn($data)
        {

$query1 = $this->db->query('SELECT * FROM stock WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');
$num_rows = $query1->num_rows();

if($num_rows == 1){
$this->db->query('UPDATE stock SET product_stock_num=product_stock_num + 1
WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');	
}else{ 
$data2['product_id'] = $data['product_id'];
$data2['branch_id'] = $_SESSION['branch_id'];
$data2['product_stock_num'] = '1';
$this->db->insert("stock", $data2);
}



return true;

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
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM serial_number as sn
	LEFT JOIN wh_product_list as wl on wl.product_id=sn.product_id
	LEFT JOIN branch as b on b.branch_id=sn.branch_id
    WHERE sn.branch_id="'.$_SESSION['branch_id'].'"  AND sn.sn_code LIKE "%'.$data['searchtext'].'%"
	OR sn.branch_id="'.$_SESSION['branch_id'].'"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
	OR sn.branch_id="'.$_SESSION['branch_id'].'"  AND sn.im_no LIKE "%'.$data['searchtext'].'%"
	GROUP BY sn.im_no
    ORDER BY adddate DESC ');


$query = $this->db->query('SELECT *,
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate,
	COUNT(*) as csn
    FROM serial_number as sn
	LEFT JOIN wh_product_list as wl on wl.product_id=sn.product_id
	LEFT JOIN branch as b on b.branch_id=sn.branch_id
    WHERE sn.branch_id="'.$_SESSION['branch_id'].'"  AND sn.sn_code LIKE "%'.$data['searchtext'].'%"
	OR sn.branch_id="'.$_SESSION['branch_id'].'"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
	OR sn.branch_id="'.$_SESSION['branch_id'].'"  AND sn.im_no LIKE "%'.$data['searchtext'].'%"
	GROUP BY sn.im_no
    ORDER BY sn.adddate DESC LIMIT '.$start.' , '.$perpage.' ');
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
     FROM wh_importproduct_detail as wd
     LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
     WHERE wd.branch_id="'.$_SESSION['branch_id'].'" AND  wd.lotno !="" AND wd.status="0"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
     OR wd.branch_id="'.$_SESSION['branch_id'].'" AND  wd.lotno !="" AND wd.status="0" AND wd.lotno LIKE "%'.$data['searchtext'].'%"
	 OR wd.branch_id="'.$_SESSION['branch_id'].'" AND  wd.lotno !="" AND wd.status="0" AND wd.importproduct_header_code LIKE "%'.$data['searchtext'].'%"
	 OR wd.branch_id="'.$_SESSION['branch_id'].'" AND  wd.lotno !="" AND wd.status="0" AND wl.product_code LIKE "%'.$data['searchtext'].'%"
     ORDER BY wd.date_end2 ASC LIMIT '.$start.' , '.$perpage.' ');


     $query = $this->db->query('SELECT wl.product_id,wl.product_name,wl.product_code,
       wd.lotno,
       wd.date_end,
       wd.date_end2,
       wd.importproduct_detail_num,
	   wd.importproduct_detail_pricebase,
       wd.importproduct_detail_id,
	   wd.importproduct_header_code,
	   b.branch_name,
     from_unixtime(importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date2
     FROM wh_importproduct_detail as wd
     LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
	 LEFT JOIN branch as b on b.branch_id=wd.branch_id
     WHERE wd.branch_id="'.$_SESSION['branch_id'].'" AND wd.lotno !="" AND wd.status="0"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
     OR wd.branch_id="'.$_SESSION['branch_id'].'" AND  wd.lotno !="" AND wd.status="0" AND wd.lotno LIKE "%'.$data['searchtext'].'%"
	 OR wd.branch_id="'.$_SESSION['branch_id'].'" AND  wd.lotno !="" AND wd.status="0" AND wd.importproduct_header_code LIKE "%'.$data['searchtext'].'%"
	 OR wd.branch_id="'.$_SESSION['branch_id'].'" AND  wd.lotno !="" AND wd.status="0" AND wl.product_code LIKE "%'.$data['searchtext'].'%"
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

$query = $this->db->query('SELECT sn_code
    FROM serial_number
    WHERE branch_id="'.$_SESSION['branch_id'].'" and im_no="'.$data['im_no'].'"
    ORDER BY sn_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getimportone2($data)
        {

$query = $this->db->query('SELECT sn_code,product_id
    FROM serial_number
    WHERE branch_id="'.$_SESSION['branch_id'].'" and im_no="'.$data['im_no'].'"
    ORDER BY sn_id ASC');
$encode_data = $query->result();
return $encode_data;

        }





    public function Deleteimportlist($data)
        {

$this->db->query('DELETE FROM serial_number  WHERE im_no="'.$data['im_no'].'"');
return true;

        }




        public function Updatestatusdateend($data)
        {

        $query = $this->db->query('UPDATE wh_importproduct_detail
        SET status="1"
        WHERE importproduct_detail_id="'.$data['importproduct_detail_id'].'"');



        $query2 = $this->db->query('UPDATE stock
            SET product_stock_num=product_stock_num - '.$data['importproduct_detail_num'].'
            WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');

        return true;




        }






        public function Salestatusdateend3($data)
        {

        $this->db->query('UPDATE wh_importproduct_detail
        SET status="3"
        WHERE importproduct_detail_id="'.$data['importproduct_detail_id'].'"');

		$this->db->query('UPDATE stock
        SET product_pricebase="'.$data['importproduct_detail_pricebase'].'"
        WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');




        return true;




        }






        public function Updateproductimportstock($data)
        {

$query1 = $this->db->query('SELECT * FROM stock WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');
$num_rows = $query1->num_rows();

if($num_rows == 1){
$this->db->query('UPDATE stock SET product_stock_num=product_stock_num + '.$data['importproduct_detail_num'].'
WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');	
}else{ 
$data2['product_id'] = $data['product_id'];
$data2['branch_id'] = $_SESSION['branch_id'];
$data2['product_stock_num'] = $data['importproduct_detail_num'];
$this->db->insert("stock", $data2);
}



return true;

        }
		
		
		

         public function Updateproductdeletestock($data2)
        {
$query = $this->db->query('UPDATE stock
    SET product_stock_num=product_stock_num - 1
    WHERE product_id="'.$data2['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');
return true;

        }



         public function Findproduct($data)
        {

$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
	IFNULL((SELECT s.product_stock_num FROM stock as s WHERE s.product_id=wl.product_id AND s.branch_id="'.$_SESSION['branch_id'].'"), "0") as product_stock_num,
    wl.product_pricebase as product_pricebase,
    z.zone_name as zone_name,
    wu.product_unit_name as product_unit_name
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_code="'.$data['product_code'].'"
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



        public function Findproduct2($data)
               {

               $query = $this->db->query('SELECT
               wl.product_id as product_id,
               wl.product_code as product_code,
               wl.product_name as product_name,
               wl.product_pricebase as product_pricebase,
               z.zone_name as zone_name
               FROM wh_product_list  as wl
               LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
               LEFT JOIN zone as z on z.zone_id=wl.zone_id
               WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_name LIKE "%'.$data['product_name'].'%"
               ORDER BY wl.product_id DESC LIMIT 100');
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
        SET product_stock_num=product_stock_num + '.$numnow.'
        WHERE product_id="'.$product_id.'" and  branch_id="'.$_SESSION['branch_id'].'"');
        return true;

        }






    }
