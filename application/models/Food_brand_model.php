<?php

class Food_brand_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }


   public function Getbrand($data)
        {

    
$query = $this->db->query('SELECT *
    FROM food_brand  WHERE food_brand_id="'.$data['id'].'"  ');

return $query->result_array();

        }


       
 public function Getcat($data)
        {

$query = $this->db->query('SELECT food_category_id,food_category_name FROM food_category WHERE food_brand_id="'.$data['id'].'" ORDER BY food_category_id DESC');

return $query->result_array();

        }  



           public function Getall($data)
        {

        

$query = $this->db->query('SELECT *
    FROM food_list
    WHERE food_brand_id="'.$data['id'].'" AND food_image != "" AND food_status="0"
    ORDER BY food_id DESC  LIMIT 50  ');

return $query->result_array();

        }




          public function Getfromcat($data)
        {

        

$query = $this->db->query('SELECT *
    FROM food_list  as fl 
    WHERE food_brand_id="'.$data['id'].'" AND food_category_id="'.$data['catid'].'" AND food_image != "" AND food_status="0"
    ORDER BY food_id DESC  LIMIT 50  ');

return $query->result_array();

        }


          public function Getproduct($data)
        {

        

$query = $this->db->query('SELECT *
    FROM food_list
    WHERE food_brand_id="'.$data['id'].'" AND food_id="'.$data['foodid'].'" AND food_image != "" AND food_status="0"
    ORDER BY food_id DESC  LIMIT 1  ');

return $query->result_array();

        }



  public function Searchbox($data)
        {

        

$query = $this->db->query('SELECT *
    FROM food_list
    WHERE food_brand_id="'.$data['id'].'" AND food_name LIKE "%'.$data['searchtext'].'%" AND food_status="0"
    ORDER BY food_id DESC  LIMIT 3  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }







    }