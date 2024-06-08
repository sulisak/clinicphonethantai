<?php

class Stock_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }






         public function Getstock($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;

$dayfrom = time()-(86400*$data['day_return']);
$dayto = time();


$querynum = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name
    FROM wh_product_list  as wl
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num > "0"   AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num > "0" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num > "0" AND z.zone_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_stock_num ASC');


$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name,
    wu.product_unit_name as product_unit_name
    FROM wh_product_list  as wl
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num > "0"   AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num > "0" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_stock_num > "0" AND z.zone_name LIKE "%'.$data['searchtext'].'%"

    ORDER BY wl.product_stock_num+0 ASC  LIMIT'.$start.' , '.$perpage.'  ');






$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }



// ============ ori ======================

//    public function Updatematok($data)
//         {


// $this->db->query('DELETE FROM stock  
// WHERE product_id="'.$data['product_id'].'" ');


// $data2['product_id'] = $data['product_id'];
// $data2['branch_id'] = $_SESSION['branch_id'];
// $data2['product_stock_num'] = $data['product_stock_num_change'];
// $this->db->insert("stock", $data2);


	

// // log update
// $data['adddate'] = time();
// $data['user_id'] = $_SESSION['user_id'];
// $data['name'] = $_SESSION['name'];
// $data['branch_id'] = $_SESSION['branch_id'];
// $this->db->insert("log_edit_product_stock", $data);
	


// $query_prl = $this->db->query('SELECT
//         *
//         FROM wh_product_relation_list as wrl
// 		LEFT JOIN wh_product_list as wl on wl.product_id=wrl.product_id_relation
//         WHERE wrl.product_id="'.$data['product_id'].'"');
// $prl = $query_prl->result_array();

// foreach ($prl as $key => $value) {



// if($value['product_type_relation'] == 0){
	
	
// 	$querystock = $this->db->query('SELECT 
// *
//            FROM stock
//            WHERE product_id="'.$value['product_id_relation'].'"  LIMIT 1');
		   

// foreach ($querystock->result() as $row)
// {
// 	$product_stock_num = $row->product_stock_num;

// }



// // log 
// $data2['product_id'] = $value['product_id_relation'];
// $data2['product_name'] = $value['product_name'];
// $data2['product_code'] = $value['product_code'];
// $data2['product_stock_num_change'] = $value['product_num_relation']*$data['product_stock_num_change'];
// $data2['product_stock_num'] = $product_stock_num;
// $data2['adddate'] = time();
// $data2['user_id'] = $_SESSION['user_id'];
// $data2['name'] = $_SESSION['name'];
// $data2['branch_id'] = $_SESSION['branch_id'];
// $this->db->insert("log_edit_product_stock", $data2);

// $this->db->query('DELETE FROM stock  
// WHERE product_id="'.$value['product_id_relation'].'" and  branch_id="'.$_SESSION['branch_id'].'"');



// $data_ss['product_id'] = $value['product_id_relation'];
// $data_ss['branch_id'] = $_SESSION['branch_id'];
// $data_ss['product_stock_num'] = $value['product_num_relation']*$data['product_stock_num_change'];
// $this->db->insert("stock", $data_ss);

// }




// }






// }


// =========== update =========

   public function Updatematok($data)
        {


$where = array(
        'product_id'  => $data['product_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_list", $data)){
        return true;
    }

}





















public function Product_num_min_noti(){
	
	$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_price as product_price,
	s.product_stock_num as product_stock_num,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
s.product_stock_num as product_stock_num,
wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name,
	wl.product_pricebase as product_pricebase,
wu.product_unit_name as product_unit_name,
wl.product_num_min,
(s.product_stock_num-wl.product_num_min)*1 as numdiff,
(s.product_stock_num-"'.$_SESSION['stock_noti'].'")*1 as numdiff2
    FROM wh_product_list  as wl
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
	LEFT JOIN stock as s on s.product_id=wl.product_id
    WHERE wl.product_num_min > "0" 
	AND s.product_stock_num > "0"
	AND s.product_stock_num <= wl.product_num_min
	AND s.branch_id="'.$_SESSION['branch_id'].'" 
	AND wl.count_stock="0"
    OR wl.product_num_min = "0" AND "'.$_SESSION['stock_noti'].'" > "0"
	AND s.product_stock_num > "0"
	AND s.product_stock_num-"'.$_SESSION['stock_noti'].'" <= "0"
	AND s.branch_id="'.$_SESSION['branch_id'].'" 
	AND wl.count_stock="0"
    ORDER BY 
	CASE WHEN wl.product_num_min="0"  THEN numdiff2
	ELSE numdiff END
	ASC
	');
	
	
	
	$query_ss = $this->db->query('SELECT product_num_min FROM wh_product_list 
	WHERE product_num_min > "0"');
$num_rows_ss = $query_ss->num_rows();



if($num_rows_ss > '0' || $_SESSION['stock_noti'] > "0"){
	$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
}



}










    }
