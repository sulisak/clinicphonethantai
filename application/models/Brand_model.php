<?php

class Brand_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }


   public function Getbrand($data)
        {

    
$query = $this->db->query('SELECT *
    FROM owner  WHERE owner_id="'.$data['id'].'"  ');

return $query->result_array();

        }


       
 public function Getcat($data)
        {

$query = $this->db->query('SELECT product_category_id,product_category_name FROM wh_product_category WHERE owner_id="'.$data['id'].'" ORDER BY product_category_id DESC');

return $query->result_array();

        }  



           public function Getall($data)
        {

        

$query = $this->db->query('SELECT *
    FROM wh_product_list  as wl 
    WHERE owner_id="'.$data['id'].'"
    ORDER BY product_id DESC  LIMIT 50  ');

return $query->result_array();

        }




          public function Getfromcat($data)
        {

        

$query = $this->db->query('SELECT *
    FROM wh_product_list  as wl 
    WHERE owner_id="'.$data['id'].'" AND product_category_id="'.$data['catid'].'" AND product_image != ""
    ORDER BY product_id DESC  LIMIT 50  ');

return $query->result_array();

        }


          public function Getproduct($data)
        {

        

$query = $this->db->query('SELECT *
    FROM wh_product_list  as wl 
    WHERE owner_id="'.$data['id'].'" AND product_id="'.$data['productid'].'" AND product_image != ""
    ORDER BY product_id DESC  LIMIT 50  ');

return $query->result_array();

        }



  public function Searchbox($data)
        {

        

$query = $this->db->query('SELECT *
    FROM wh_product_list
    WHERE owner_id="'.$data['id'].'" AND product_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY product_id DESC  LIMIT 3  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }







    }