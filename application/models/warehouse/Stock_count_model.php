<?php

class Stock_count_model extends CI_Model {



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
				
				
				
        public function Adddetail($data)
        {
$time = time();
$data2['product_id'] = $data['product_id'];
$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['remark'] = $data['remark'];
$data2['sc_code'] = 'SC'.$time;

$data2['product_num'] = $data['p_num'];
$data2['adddate'] = $time;
$data2['user_id'] = $_SESSION['user_id'];
$data2['name'] = $_SESSION['name'];
$data2['branch_id'] = $_SESSION['branch_id'];
$this->db->insert("stock_count_list", $data2);


$this->db->query('DELETE FROM stock_count_draft
WHERE user_id="'.$_SESSION['user_id'].'"');
		
		
		

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
sum(product_num) as product_num,
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM stock_count_list
    WHERE remark LIKE "%'.$data['searchtext'].'%" AND branch_id="'.$_SESSION['branch_id'].'"
    OR sc_code LIKE "%'.$data['searchtext'].'%" AND branch_id="'.$_SESSION['branch_id'].'"
	GROUP BY sc_code
    ORDER BY stock_count_list_id DESC ');


$query = $this->db->query('SELECT  *,
sum(st.product_num) as product_num,
st.status,
    from_unixtime(st.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
	b.branch_name
    FROM stock_count_list as st 
	LEFT JOIN branch as b on b.branch_id=st.branch_id
    WHERE st.remark LIKE "%'.$data['searchtext'].'%" AND st.branch_id="'.$_SESSION['branch_id'].'"
    OR st.sc_code LIKE "%'.$data['searchtext'].'%" AND st.branch_id="'.$_SESSION['branch_id'].'"
	GROUP BY st.sc_code
    ORDER BY st.stock_count_list_id DESC LIMIT '.$start.' , '.$perpage.' ');
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
sl.product_name as product_name,
sl.product_code as product_code,
sl.product_num as product_num,
u.product_unit_name as product_unit_name,
s.product_stock_num,
sl.product_stock_num_befor
    FROM stock_count_list as sl
    LEFT JOIN wh_product_list as wp on wp.product_id=sl.product_id
	LEFT JOIN wh_product_unit as u on u.product_unit_id=wp.product_unit_id
	LEFT JOIN stock as s on s.product_id=sl.product_id
    WHERE sl.sc_code="'.$data['sc_code'].'"
    ORDER BY sl.stock_count_list_id ASC');
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
    FROM wh_importproduct_detail as wi
    LEFT JOIN wh_product_list as wp on wp.product_id=wi.product_id
    WHERE wi.owner_id="'.$_SESSION['owner_id'].'" and wi.importproduct_header_code="'.$data['importproduct_header_code'].'"
    ORDER BY wi.importproduct_detail_id ASC');
$encode_data = $query->result();
return $encode_data;

        }





    public function Deleteimportlist($data)
        {
$this->db->query('DELETE FROM stock_count_list
WHERE sc_code="'.$data['sc_code'].'"');
		


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











      public function Adddraft($data)
        {

if(isset($data['product_id'])){
$data2['product_id'] = $data['product_id'];
$data2['product_num'] = '1';
$data2['user_id'] = $_SESSION['user_id'];
$data2['branch_id'] = $_SESSION['branch_id'];

$data2['adddate'] = time();



$query_ss = $this->db->query('SELECT * FROM stock_count_draft 
WHERE product_id="'.$data['product_id'].'" and  user_id="'.$_SESSION['user_id'].'"');
$num_rows_ss = $query_ss->num_rows();

if($num_rows_ss == 1){
$this->db->query('UPDATE stock_count_draft SET product_num=product_num+1
WHERE product_id="'.$data['product_id'].'" and  user_id="'.$_SESSION['user_id'].'"');
}else{

$this->db->insert("stock_count_draft", $data2);
}



}




		}






      public function Addexcel($data)
        {

$querypp = $this->db->query('SELECT product_id FROM wh_product_list 
WHERE product_code="'.$data['product_code'].'"');

$count_row = $querypp->num_rows();

if ($count_row == 0) {
die();
}

  foreach ($querypp->result() as $row)
{
	$product_id = $row->product_id;

}


$data2['product_id'] = $product_id;
$data2['product_num'] = $data['product_num'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['branch_id'] = $_SESSION['branch_id'];

$data2['adddate'] = time();



$query_ss = $this->db->query('SELECT * FROM stock_count_draft 
WHERE product_id="'.$data2['product_id'].'" and  user_id="'.$_SESSION['user_id'].'"');
$num_rows_ss = $query_ss->num_rows();

if($num_rows_ss == 1){
$this->db->query('UPDATE stock_count_draft SET product_num=product_num+'.$data['product_num'].'
WHERE product_id="'.$data2['product_id'].'" and  user_id="'.$_SESSION['user_id'].'"');
}else{

$this->db->insert("stock_count_draft", $data2);
}




  }
  
  
  
  
  
  
       public function Getdraft($data)
        {



 $query = $this->db->query('SELECT 
 wl.product_id,
 wl.product_code,
 wl.product_name,
 sum(sd.product_num) as p_num,
 wu.product_unit_name
               FROM stock_count_draft  as sd
               LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id
			   LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
			   WHERE sd.user_id="'.$_SESSION['user_id'].'"
               GROUP BY sd.product_id ORDER BY sd.stock_count_draft_id asc');
               $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
               return $encode_data;
			   
			   
	

  }
  
  
  
  
  
      public function Updatenum($data)
        {

$this->db->query('UPDATE stock_count_draft SET product_num='.$data['p_num'].'
WHERE product_id="'.$data['product_id'].'" and  user_id="'.$_SESSION['user_id'].'"');

		}
  
  
  
  
  
  
  
      public function Updatestockok($data)
        {


$querypp = $this->db->query('SELECT product_id,product_num,branch_id,product_stock_num_befor 
FROM stock_count_list 
WHERE sc_code="'.$data['sc_code'].'"');

  foreach ($querypp->result() as $row)
{
	$product_id = $row->product_id;
	$product_num = $row->product_num;
	$branch_id = $row->branch_id;




$query_getst = $this->db->query('SELECT * FROM stock WHERE product_id="'.$product_id.'" 
AND  branch_id="'.$_SESSION['branch_id'].'"');

  foreach ($query_getst->result() as $row_getst)
{
$this->db->query('UPDATE stock_count_list SET product_stock_num_befor="'.$row_getst->product_stock_num.'"
WHERE product_id="'.$product_id.'" AND sc_code="'.$data['sc_code'].'"');
}



$this->db->query('DELETE FROM stock  
WHERE product_id="'.$product_id.'" and  branch_id="'.$branch_id.'"');


$data2['product_id'] = $product_id;
$data2['branch_id'] = $branch_id;
$data2['product_stock_num'] = $product_num;
$this->db->insert("stock", $data2);





// log update
$data22['adddate'] = time();
$data22['user_id'] = $_SESSION['user_id'];
$data22['name'] = $_SESSION['name'];
$data22['branch_id'] = $_SESSION['branch_id'];
$this->db->insert("log_edit_product_stock", $data22);
	


$query_prl = $this->db->query('SELECT
        *
        FROM wh_product_relation_list
        WHERE product_id="'.$product_id.'"');
$prl = $query_prl->result_array();

foreach ($prl as $key => $value) {

$query_ss = $this->db->query('SELECT * FROM stock WHERE product_id="'.$value['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');
$num_rows_ss = $query_ss->num_rows();


if($value['product_type_relation'] == 0){
if($num_rows_ss > 0){
	
$this->db->query('UPDATE stock SET product_stock_num= '.$value['product_num_relation']*$product_num.'
WHERE product_id="'.$value['product_id_relation'].'" and  branch_id="'.$_SESSION['branch_id'].'"');
	
}else{ 
$data_ss['product_id'] = $value['product_id_relation'];
$data_ss['branch_id'] = $_SESSION['branch_id'];
$data_ss['product_stock_num'] = $value['product_num_relation']*$product_num;
$this->db->insert("stock", $data_ss);
}
}

}


//foreach
}
//foreach





$this->db->query('UPDATE stock_count_list SET status="1"
WHERE sc_code="'.$data['sc_code'].'"');

		}
		
		
		
	
	
	
	
  
  
   public function Deletedraft($data)
        {

$this->db->query('DELETE FROM stock_count_draft
WHERE product_id="'.$data['product_id'].'" and  user_id="'.$_SESSION['user_id'].'"');

		}
		
		
		
		
  
  



    }
