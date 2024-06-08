<?php

class Product_return_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




           public function Getproductlist()
        {

$query = $this->db->query('SELECT 
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_score as product_score,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name
    FROM wh_product_list  as wl 
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_image != ""
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


          public function Getproductlistcat($data)
        {

$query = $this->db->query('SELECT 
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name
    FROM wh_product_list  as wl 
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_image != "" AND wc.product_category_id="'.$data['product_category_id'].'" 
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




        public function Findproduct($data)
        {

$query = $this->db->query('SELECT 
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_score as product_score,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name
    FROM wh_product_list  as wl 
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_code="'.$data['product_code'].'"
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





  public function Customer($data)
        {

$query = $this->db->query('SELECT  *
    FROM customer_owner as co
    WHERE co.cus_name LIKE "%'.$data['cus_name'].'%" ORDER BY co.cus_id DESC LIMIT 5');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        
public function Adddetail($data)
     {

$price = ($data['product_price']-$data['product_price_discount'])*$data['product_sale_num'];


if($data['price_vat']!='0.00'){
$price_vat = ($price*100)/($_SESSION['vat']+100)*($_SESSION['vat']/100);
}else{
$price_vat = 0;
}



/*$query = $this->db->query('UPDATE sale_list_datail 
    SET product_sale_num=product_sale_num - '.$data['product_sale_num'].',
	price_vat=price_vat-'.$price_vat.'
    WHERE ID="'.$data['ID'].'" AND sale_runno="'.$data['sale_runno'].'"');
	


$query2 = $this->db->query('UPDATE sale_list_header 
    SET price_vat_all=price_vat_all - '.$price_vat.' ,
	sumsale_num=sumsale_num - '.$data['product_sale_num'].' ,
	sumsale_price=sumsale_price-'.$price.'
    WHERE sale_runno="'.$data['sale_runno'].'"');
	
*/	
	
	
	


$data2['return_runno'] = $data['return_runno'];
$data2['sale_runno'] = $data['sale_runno'];
$data2['product_id'] = $data['product_id'];
$data2['product_name'] = $data['product_name'];
$data2['product_code'] = $data['product_code'];
$data2['product_price'] = $data['product_price'];
$data2['product_sale_num'] = $data['product_sale_num'];
$data2['product_price_discount'] = $data['product_price_discount'];
$data2['product_score'] = $data['product_score'];
$data2['adddate'] = $data['adddate'];

$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['shift_id'] = $_SESSION['shift_id'];
$data2['branch_id'] = $_SESSION['branch_id'];

if ($this->db->insert("product_return_datail2", $data2)){
        return true;
    }

  }


      public function Addheader($data)
        {
$data2['cus_name'] = $data['cus_name'];
    $data2['cus_id'] = $data['cus_id'];
    $data2['cus_address_all'] = $data['cus_address_all'];
    $data2['sumsale_discount'] = $data['sumsale_discount'];
    $data2['sumsale_num '] = $data['sumsale_num'];
    $data2['sumsale_price'] = $data['sumsale_price'];
    $data2['money_from_customer'] =  $data['money_from_customer']; 
    $data2['money_changeto_customer'] = $data['money_changeto_customer'];
    $data2['vat'] = $data['vat'];
    $data2['product_score_all'] = $data['product_score_all'];
    $data2['return_runno'] = $data['return_runno'];
	$data2['sale_runno'] = $data['sale_runno'];
    $data2['adddate'] = $data['adddate'];
    
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['shift_id'] = $_SESSION['shift_id'];
$data2['branch_id'] = $_SESSION['branch_id'];

if ($this->db->insert("product_return_header2", $data2)){
       

       $this->db->query('UPDATE customer_owner 
    SET product_score_all=product_score_all - '.$data2['product_score_all'].' WHERE cus_id="'.$data2['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');


    }
}


         public function Updateproductdeletestock($data2)
        {
$price_value = $data2['product_sale_num'] * $data2['product_price'];
$query = $this->db->query('UPDATE wh_product_list 
    SET product_stock_num=product_stock_num - '.$data2['product_sale_num'].'   
    WHERE product_id="'.$data2['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
	
	
	$this->db->query('UPDATE stock 
    SET product_stock_num=product_stock_num - '.$data2['product_sale_num'].'   
    WHERE product_id="'.$data2['product_id'].'" AND branch_id="'.$_SESSION['branch_id'].'" ');
	
	
return true;

        }




public function Gettoday($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';      
            }


            $start = ($page - 1) * $perpage;

$today = date('d-m-Y',time());

$querynum = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM product_return_header2  
    WHERE owner_id="'.$_SESSION['owner_id'].'"  AND cus_name LIKE "%'.$data['searchtext'].'%"
    OR owner_id="'.$_SESSION['owner_id'].'" AND return_runno LIKE "%'.$data['searchtext'].'%"
	OR owner_id="'.$_SESSION['owner_id'].'" AND sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY ID DESC');


$query = $this->db->query('SELECT *, 
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM product_return_header2 as pr
    WHERE owner_id="'.$_SESSION['owner_id'].'"  AND cus_name LIKE "%'.$data['searchtext'].'%"
    OR owner_id="'.$_SESSION['owner_id'].'" AND return_runno LIKE "%'.$data['searchtext'].'%"
	OR owner_id="'.$_SESSION['owner_id'].'" AND sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY ID DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }




        public function Getone($data)
        {

$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM product_return_datail2
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND return_runno="'.$data['return_runno'].'"
    ORDER BY ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getone2($data)
        {

$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM product_return_datail2
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND return_runno="'.$data['return_runno'].'"
    ORDER BY ID ASC');

return $query->result();

        }




        public function Findrunno($data)
        {

$query = $this->db->query('SELECT sd.*,
sd.product_sale_num as product_sale_num,
IFNULL((SELECT sum(pr.product_sale_num) FROM product_return_datail2 as pr WHERE pr.sale_runno=sd.sale_runno AND pr.product_name=sd.product_name ),"0") as product_sale_num_pr,
from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail as sd
    WHERE sd.sale_runno LIKE "%'.$data['sale_runno'].'%"
    ORDER BY sd.ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





  public function Deletelist($data)
        {



$query2 = $this->db->query('DELETE FROM product_return_datail2  WHERE return_runno="'.$data['return_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');


$query2 = $this->db->query('DELETE FROM product_return_header2  WHERE return_runno="'.$data['return_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');



$this->db->query('UPDATE customer_owner 
    SET product_score_all=product_score_all + '.$data['product_score_all'].' WHERE cus_id="'.$data['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');



return true;

        }




 public function Updateproductaddstock($data)
        {

$price_value = $data['product_price'] * $data['product_sale_num'];
$query = $this->db->query('UPDATE wh_product_list 
    SET product_stock_num=product_stock_num + '.$data['product_sale_num'].'   
    WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
	
	$this->db->query('UPDATE stock 
    SET product_stock_num=product_stock_num + '.$data['product_sale_num'].'   
    WHERE product_id="'.$data['product_id'].'" AND branch_id="'.$_SESSION['branch_id'].'" ');
	
	
return true;

        }




    }