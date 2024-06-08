<?php

class Log_delete_sale_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }


 public function Get($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto']);



 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_header_bak
    WHERE del_date
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND owner_id="'.$_SESSION['owner_id'].'"  AND cus_name LIKE "%'.$data['searchtext'].'%"
OR del_date
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"  AND owner_id="'.$_SESSION['owner_id'].'" AND sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY ID DESC ');


$query = $this->db->query('SELECT *,
    from_unixtime(sb.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
	from_unixtime(sb.savedate,"%d-%m-%Y %H:%i:%s") as savedate,
    from_unixtime(sb.del_date,"%d-%m-%Y %H:%i:%s") as del_date
    FROM sale_list_header_bak as sb
	LEFT JOIN branch as b on b.branch_id=sb.branch_id
    WHERE del_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND sb.cus_name LIKE "%'.$data['searchtext'].'%"
OR sb.del_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sb.sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY sb.ID_auto DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }



public function Getone($data)
        {


$query = $this->db->query('SELECT *, from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail_bak as sd
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.sale_runno="'.$data['sale_runno'].'"
    ORDER BY sd.ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getonecat($data)
        {

$query = $this->db->query('SELECT sum((sd.product_price*sd.product_sale_num)-sd.product_price_discount) as pricevalue,sum(sd.product_sale_num) as num, wc.product_category_name as catname, from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail_bak as sd
    LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.sale_runno="'.$data['sale_runno'].'"
    GROUP BY wc.product_category_id
    ORDER BY wc.product_category_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




        public function Getone2($data)
        {

$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail_bak
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND sale_runno="'.$data['sale_runno'].'"
    ORDER BY ID ASC');

return $query->result();

        }



  public function Deletelist($data)
        {

		if($data['product_score_all'] == null){
    $data['product_score_all'] = '0';
}




$query0 = $this->db->query('INSERT INTO sale_list_header_bak(ID,sale_runno,
cus_name,
cus_id,
cus_address_all,
sumsale_discount,
sumsale_num,
sumsale_price,
money_from_customer,
money_changeto_customer,
vat,
product_score_all,
sale_type,
pay_type,
reserv,
discount_last,
adddate,
owner_id,
user_id,
store_id,
table_id,
table_name,
s_ID,
shift_id,
user_id_del,
del_date)
SELECT ID,sale_runno,
cus_name,
cus_id,
cus_address_all,
sumsale_discount,
sumsale_num,
sumsale_price,
money_from_customer,
money_changeto_customer,
vat,
product_score_all,
sale_type,
pay_type,
reserv,
discount_last,
adddate,
owner_id,
user_id,
store_id,
table_id,
table_name,
s_ID,
shift_id,
'.$_SESSION['user_id'].',
'.time().'
FROM sale_list_header
WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');





$query0 = $this->db->query('INSERT INTO sale_list_datail_bak(ID,sale_runno,
product_id,
product_name,
product_code,
product_price,
product_sale_num,
product_price_discount,
product_score,
adddate,
owner_id,
user_id,
store_id,
table_id,
table_name,
s_ID,
so_order,
status,
note_order,
shift_id)
SELECT ID,sale_runno,
product_id,
product_name,
product_code,
product_price,
product_sale_num,
product_price_discount,
product_score,
adddate,
owner_id,
user_id,
store_id,
table_id,
table_name,
s_ID,
so_order,
status,
note_order,
shift_id
FROM sale_list_datail
WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');


$query = $this->db->query('DELETE FROM sale_list_datail  WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

if($query){
$query2 = $this->db->query('DELETE FROM sale_list_header  WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');


$this->db->query('UPDATE customer_owner
    SET product_score_all=product_score_all - '.$data['product_score_all'].' WHERE cus_id="'.$data['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
}


return true;

        }



 public function Updateproductaddstock($data)
        {

$price_value = $data['product_price'] * $data['product_sale_num'];
$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num + '.$data['product_sale_num'].'
    WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }







  }
