<?php

class Pawnlist_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       public function Add($data)
        {

if ($this->db->insert("pawn", $data)){
        return true;
    }


  }


           public function Update($data)
        {


$where = array(
        'pawn_id'  => $data['pawn_id']
);

$this->db->where($where);
if ($this->db->update("pawn", $data)){
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
    *
    FROM pawn 
    WHERE cus_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY pawn_id DESC');


$query = $this->db->query('SELECT 
    *,end_date+86400 as end_date
    ,from_unixtime(end_date,"%d-%m-%Y") as end_date_date
    ,from_unixtime(add_time,"%d-%m-%Y") as add_time_date
    ,(SELECT count(*) FROM pawnadddate as pa WHERE pa.pawn_id=p.pawn_id ) as pawnnum
    FROM pawn as p 
    WHERE cus_name LIKE "%'.$data['searchtext'].'%" OR pawn_id="'.$data['searchtext'].'" OR product_name LIKE "%'.$data['searchtext'].'%" OR product_sn="'.$data['searchtext'].'" OR cus_code="'.$data['searchtext'].'"
    ORDER BY pawn_id DESC  LIMIT '.$start.' , '.$perpage.'  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }





    public function Getenddate($data)
        {

  
$timenow = time();

$query = $this->db->query('SELECT 
    *,end_date+86400 as end_date
    ,from_unixtime(end_date,"%d-%m-%Y") as end_date_date
    ,from_unixtime(add_time,"%d-%m-%Y") as add_time_date
    FROM pawn 
    WHERE (end_date+86400) < "'.$timenow.'" AND pawn_status!="2"
    ORDER BY end_date ASC  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );





$json = '{"list": '.$encode_data.'}';

return $json;

        }




        





    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM pawn  WHERE pawn_id="'.$data['pawn_id'].'" ');
return true;

        }



 public function Pawnadddateok($data)
        {
$data['add_time'] = time();



    $this->db->query('UPDATE pawn 
    SET end_date="'.strtotime($data['pawnadd_adddate']).'"
    ,pawn_money=pawn_money-'.$data['pawnadd_cutmoney'].'
    WHERE pawn_id="'.$data['pawn_id'].'" ');



if ($this->db->insert("pawnadddate", $data)){
        return true;
    }



        }






 public function Pawnadddatelist($data)
        {

            $query = $this->db->query('SELECT *, from_unixtime(add_time,"%d-%m-%Y %H:%i:%s") as add_time
FROM pawnadddate
   WHERE pawn_id="'.$data['pawn_id'].'" 
ORDER BY p_id DESC ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo $encode_data;


        }




 public function Pawnadddatedel($data)
        {

$this->db->query('DELETE FROM pawnadddate  WHERE p_id="'.$data['p_id'].'" ');

$this->db->query('UPDATE pawn 
    SET pawn_money=pawn_money+'.$data['pawn_money'].'
    WHERE pawn_id="'.$data['pawn_id'].'" ');

return true;

        }






 public function Pawnreturnconfirm($data)
        {
   $this->db->query('UPDATE pawn 
    SET pawn_status="2"
    WHERE pawn_id="'.$data['pawn_id'].'" ');


        }




 public function Pawnresetconfirm($data)
        {
   $this->db->query('UPDATE pawn 
    SET pawn_status="0"
    WHERE pawn_id="'.$data['pawn_id'].'" ');


        }




         public function Pawngosaleconfirm($data)
        {
   $this->db->query('UPDATE pawn 
    SET pawn_status="1"
    WHERE pawn_id="'.$data['pawn_id'].'" ');



$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['product_price'] = $data['product_price'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_stock_num'] = '1';
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("wh_product_list", $data2)){
        return true;
    }


        }













public function Pawnreportdaylist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT 
    sum(pawnadd_cutmoney) as pawnadd_cutmoney,
    sum(pawnadd_permoney) as pawnadd_permoney
    FROM pawnadddate WHERE add_time BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo $encode_data;

        }




public function Pawnreportall()
        {

$query = $this->db->query('SELECT 
    count(*) as pawn_num_all,
    sum(pawn_money) as pawn_money_all
    FROM pawn  WHERE pawn_status="0"');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo $encode_data;

        }








    }