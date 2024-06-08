<?php

class Product_point_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {


if ($this->db->insert("customer_point_gift_list", $data)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['point_use'] = $data['point_use'];

$where = array(
        'gift_id' => $data['gift_id']
);

$this->db->where($where);
if ($this->db->update("customer_point_gift_list", $data2)){
        return true;
    }

}







           public function Get()
        {

$query = $this->db->query('SELECT * FROM customer_point_gift_list ORDER BY gift_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



        public function Findproduct($data)
     {

     $query = $this->db->query('SELECT product_id,product_code,product_name FROM wh_product_list
WHERE product_name LIKE "%'.$data['search'].'%"
        ORDER BY product_id DESC LIMIT 10');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

     }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM customer_point_gift_list  WHERE gift_id="'.$data['gift_id'].'"');
return true;

        }




    }
