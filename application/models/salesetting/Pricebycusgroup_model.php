<?php

class Pricebycusgroup_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }







                   public function Update($data)
        {



//$data2['cus_name'] = $data['cus_name'];
$data2['product_score_all'] = $data['product_score_all'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'cus_id'  => $data['cus_id']
);

$this->db->where($where);
if ($this->db->update("customer_owner", $data2)){
        return true;
    }

}





                   public function savediscountpercent($data)
        {



//$data2['cus_name'] = $data['cus_name'];
$data2['customer_group_discountpercent'] = $data['customer_group_discountpercent'];

$where = array(
        'customer_group_id'  => $data['customer_group_id']
);

$this->db->where($where);
if ($this->db->update("customer_group", $data2)){
        return true;
    }

}




           public function Mycustomergroup($data)
        {

            $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }



$start = ($page - 1) * $perpage;

$querynum = $this->db->query('SELECT *
  FROM customer_group WHERE owner_id="'.$_SESSION['owner_id'].'"
  and customer_group_name LIKE "%'.$data['searchtext'].'%"  ORDER BY 	customer_group_id DESC');

$query = $this->db->query('SELECT *
  FROM customer_group WHERE owner_id="'.$_SESSION['owner_id'].'"
  and customer_group_name LIKE "%'.$data['searchtext'].'%"  ORDER BY 	customer_group_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall;

return $json;

        }

           public function Allmycustomergroup()
        {

$query = $this->db->query('SELECT * FROM customer_group WHERE owner_id="'.$_SESSION['owner_id'].'"');
$encode_data = json_encode($query->num_rows(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





 public function Getproduct($data)
        {

$query = $this->db->query('SELECT *
    FROM wh_product_list
    WHERE owner_id="'.$_SESSION['owner_id'].'" 
	AND product_name LIKE "%'.$data['text'].'%"
	OR owner_id="'.$_SESSION['owner_id'].'" AND product_code LIKE "%'.$data['text'].'%"
    ORDER BY product_id DESC LIMIT 10');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

        }


 public function Getproductcusgroup($data)
        {

$query = $this->db->query('SELECT *
    FROM product_price_cus_group
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND customer_group_id="'.$data['customer_group_id'].'"
    ORDER BY product_id DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

        }




public function Saveprice($data)
        {
$data['owner_id'] = $_SESSION['owner_id'];
$data['user_id'] = $_SESSION['user_id'];
$data['store_id'] = $_SESSION['store_id'];

$query_delete = $this->db->query('DELETE FROM product_price_cus_group  WHERE product_id="'.$data['product_id'].'"
AND customer_group_id="'.$data['customer_group_id'].'" AND  owner_id="'.$_SESSION['owner_id'].'"');

if ($query_delete){
      $this->db->insert("product_price_cus_group", $data);
    }

        }



public function Deleteprice($data)
        {

$query_delete = $this->db->query('DELETE FROM product_price_cus_group  WHERE product_id="'.$data['product_id'].'"
AND customer_group_id="'.$data['customer_group_id'].'"
AND  owner_id="'.$_SESSION['owner_id'].'"');


        }












    }
