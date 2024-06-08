<?php

class Productother_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       public function Add($data)
        {

$data2['product_ot_image'] = $data['product_ot_image'];
$data2['product_ot_name'] = $data['product_ot_name'];
$data2['product_ot_price'] = $data['product_ot_price'];
$data2['show_all'] = $data['show_all'];
$data2['type'] = $data['type'];

if ($this->db->insert("wh_product_other", $data2)){
        return true;
    }

  }


           public function Update($data)
        {


$data2['product_ot_name'] = $data['product_ot_name'];
$data2['product_ot_image'] = $data['product_ot_image'];
$data2['product_ot_price'] = $data['product_ot_price'];
$data2['show_all'] = $data['show_all'];
$data2['type'] = $data['type'];

$where = array(
        'pot_ID'  => $data['pot_ID']
);

$this->db->where($where);
if ($this->db->update("wh_product_other", $data2)){
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

$querynum = $this->db->query('SELECT *
    FROM wh_product_other
    WHERE product_ot_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY pot_ID DESC');


$query = $this->db->query('SELECT *
    FROM wh_product_other
    WHERE product_ot_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY pot_ID DESC  LIMIT '.$start.' , '.$perpage.'  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }










    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM wh_product_other  WHERE pot_ID="'.$data['pot_ID'].'"');
return true;

        }




    }
