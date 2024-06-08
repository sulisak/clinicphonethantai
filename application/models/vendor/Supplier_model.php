<?php

class Supplier_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {

$data2['supplier_image'] =  $data['supplier_image'];

$data2['supplier_code'] =  $data['supplier_code'];
$data2['supplier_name'] = $data['supplier_name'];
$data2['supplier_card_tax'] = $data['supplier_card_tax'];
$data2['supplier_bd'] = $data['supplier_bd'];
$data2['supplier_address'] = $data['supplier_address'];
$data2['supplier_tel'] = $data['supplier_tel'];

$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("supplier", $data2)){
		return true;
	}

  }


           public function Update($data)
        {

$data2['supplier_image'] =  $data['supplier_image'];
$data2['supplier_code'] =  $data['supplier_code'];
$data2['supplier_name'] = $data['supplier_name'];
$data2['supplier_card_tax'] = $data['supplier_card_tax'];
$data2['supplier_bd'] = $data['supplier_bd'];
$data2['supplier_address'] = $data['supplier_address'];
$data2['supplier_tel'] = $data['supplier_tel'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'supplier_id'  => $data['supplier_id']
);

$this->db->where($where);
if ($this->db->update("supplier", $data2)){
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

$querynum = $this->db->query('SELECT 
    supplier_id,
    supplier_code,
    supplier_name,
    supplier_image,
    supplier_card_tax,
    supplier_bd,
    supplier_address,
    supplier_tel
    
    FROM supplier
    WHERE owner_id="'.$_SESSION['owner_id'].'"  AND supplier_code LIKE "%'.$data['searchtext'].'%" OR owner_id="'.$_SESSION['owner_id'].'" AND supplier_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY supplier_id DESC');


$query = $this->db->query('SELECT 
   supplier_id,
    supplier_code,
    supplier_name,
    supplier_image,
    supplier_card_tax,
    supplier_bd,
    supplier_address,
    supplier_tel
     FROM supplier
    WHERE owner_id="'.$_SESSION['owner_id'].'"  AND supplier_code LIKE "%'.$data['searchtext'].'%" OR owner_id="'.$_SESSION['owner_id'].'" AND supplier_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY supplier_id DESC  LIMIT '.$start.' , '.$perpage.'  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }




        public function Getlist()
        {


$query = $this->db->query('SELECT 
   supplier_id,
    supplier_code,
    supplier_name,
    supplier_image,
    supplier_card_tax,
    supplier_bd,
    supplier_address,
    supplier_tel
     FROM supplier
    WHERE owner_id="'.$_SESSION['owner_id'].'" 
    ORDER BY supplier_id DESC ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );





$json = '{"list": '.$encode_data.'}';

return $json;

        }





        





    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM supplier  WHERE supplier_id="'.$data['supplier_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }