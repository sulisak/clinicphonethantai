<?php

class Salereserv_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


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


$querynum = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_header  
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND reserv="1" AND cus_name LIKE "%'.$data['searchtext'].'%" OR owner_id="'.$_SESSION['owner_id'].'" AND reserv="1" AND sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY ID DESC ');


$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_header 
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND reserv="1" AND cus_name LIKE "%'.$data['searchtext'].'%" OR owner_id="'.$_SESSION['owner_id'].'" AND reserv="1" AND sale_runno LIKE "%'.$data['searchtext'].'%"
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

$query = $this->db->query('SELECT *, from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail as sd
    LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.sale_runno="'.$data['sale_runno'].'"
    ORDER BY sd.ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getone2($data)
        {

$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND sale_runno="'.$data['sale_runno'].'"
    ORDER BY ID ASC');

return $query->result();

        }



  public function Deletelist($data)
        {

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


 public function Reservsalesave($data)
        {

$query = $this->db->query('UPDATE sale_list_header 
    SET reserv='.$data['reserv'].'
    WHERE ID="'.$data['ID'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




  }