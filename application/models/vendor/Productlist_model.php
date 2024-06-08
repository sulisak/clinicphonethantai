<?php

class Productlist_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       public function Add($data)
        {

$data2['product_image'] = $data['product_image'];
$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['product_date_end'] = $data['product_date_end'];
$data2['product_date_end2'] = $data['product_date_end2'];
$data2['product_des'] = $data['product_des'];
$data2['product_price'] = $data['product_price'];
$data2['product_wholesale_price'] = $data['product_wholesale_price'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_category_id'] = $data['product_category_id'];
$data2['product_unit_id'] = $data['product_unit_id'];
$data2['supplier_id'] = $_SESSION['supplier_id'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['product_score'] = $data['product_score'];
$data2['zone_id'] = $data['zone_id'];
$data2['product_num_min'] = $data['product_num_min'];

$query =  $this->db->get_where('wh_product_list' , array('product_code' => $data['product_code']));

$count_row = $query->num_rows();

if ($count_row > 0) {

echo '1';

}else{
if ($this->db->insert("wh_product_list", $data2)){
        return true;
    }
  }


  }


           public function Update($data)
        {

$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['product_date_end'] = $data['product_date_end'];
$data2['product_date_end2'] = $data['product_date_end2'];
$data2['product_des'] = $data['product_des'];
$data2['product_image'] = $data['product_image'];
$data2['product_price'] = $data['product_price'];
$data2['product_wholesale_price'] = $data['product_wholesale_price'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_category_id'] = $data['product_category_id'];
$data2['product_unit_id'] = $data['product_unit_id'];
$data2['supplier_id'] = $_SESSION['supplier_id'];
$data2['product_score'] = $data['product_score'];
$data2['zone_id'] = $data['zone_id'];
$data2['product_num_min'] = $data['product_num_min'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_id'  => $data['product_id']
);


$query =  $this->db->get_where('wh_product_list' , array('product_code' => $data['product_code']));

$count_row = $query->num_rows();

if ($count_row > 0) {

  $query2 =  $this->db->get_where('wh_product_list' , array('product_id' => $data['product_id'],'product_code' => $data['product_code']));
  $count_row2 = $query2->num_rows();

if ($count_row2 > 0) {

  $this->db->where($where);
  if ($this->db->update("wh_product_list", $data2)){
          return true;
      }

}else{
  echo '1';
}



}else{

$this->db->where($where);
if ($this->db->update("wh_product_list", $data2)){
        return true;
    }

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
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_date_end as product_date_end,
    wl.product_des as product_des,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_pricebase as product_pricebase,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wl.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    wl.supplier_id as supplier_id,
    sp.supplier_name as supplier_name,
    wl.zone_id as zone_id,
    z.zone_name as zone_name,
    wl.product_unit_id as product_unit_id,
    wu.product_unit_name as product_unit_name
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN supplier as sp on sp.supplier_id=wl.supplier_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE
    wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'"  AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'" AND wc.product_category_name="'.$data['searchtext'].'"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'" AND z.zone_name="'.$data['searchtext'].'"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'" AND sp.supplier_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_id DESC');


$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_date_end as product_date_end,
    wl.product_des as product_des,
    wl.product_image as product_image,
    wl.product_price as product_price,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_score as product_score,
    wl.product_pricebase as product_pricebase,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wl.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    wl.supplier_id as supplier_id,
    sp.supplier_name as supplier_name,
    wl.zone_id as zone_id,
    z.zone_name as zone_name,
    wl.product_unit_id as product_unit_id,
    wu.product_unit_name as product_unit_name,
    wl.product_num_min as product_num_min,
  (SELECT count(*) FROM wh_product_relation_list as sd WHERE sd.product_id=wl.product_id) as product_num_other
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN supplier as sp on sp.supplier_id=wl.supplier_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE
    wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'"  AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'" AND wc.product_category_name="'.$data['searchtext'].'"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'" AND z.zone_name="'.$data['searchtext'].'"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.supplier_id="'.$_SESSION['supplier_id'].'" AND sp.supplier_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_id DESC  LIMIT '.$start.' , '.$perpage.'  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }










    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM wh_product_list  WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }












        public function Searchpot($data)
     {

$query = $this->db->query('SELECT *
 FROM wh_product_list as wl
 LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
 WHERE wl.product_name LIKE "%'.$data['searchtext'].'%"
 ORDER BY wl.product_id DESC  LIMIT 3  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

     }





     public function Getpotlist($data)
   {

     $query = $this->db->query('SELECT
wrl.prl_ID,
wrl.product_name_relation,
wrl.product_num_relation,
wrl.product_unit_relation
     FROM wh_product_relation_list as wrl
     LEFT JOIN wh_product_list as wl on wl.product_id=wrl.product_id
     WHERE wrl.product_id="'.$data['product_id'].'"
     ORDER BY wrl.prl_ID DESC');

   $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

   return $encode_data;

   }




   public function Getpotlistshowall($data)
 {

   $query = $this->db->query('SELECT *
   FROM wh_product_other
   WHERE show_all="1"
   ORDER BY pot_ID DESC');

 $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

 return $encode_data;

 }






   public function Addpot($data)
  {

    $data1['product_id'] =  $data['product_id'];
    $data1['product_id_relation'] = $data['product_id_relation'];
    $data1['product_num_relation'] = $data['product_num_relation'];
    $data1['product_name_relation'] = $data['product_name_relation'];
    $data1['product_unit_relation'] = $data['product_unit_relation'];

$this->db->insert("wh_product_relation_list", $data1);

///////////////////////////


$data2['product_id'] =  $data['product_id_relation'];
$data2['product_id_relation'] = $data['product_id'];
$data2['product_num_relation'] = 1/$data['product_num_relation'];
$data2['product_name_relation'] = $data['product_name'];
$data2['product_unit_relation'] = $data['product_unit_name'];

$this->db->insert("wh_product_relation_list", $data2);



  }





  public function Delpot($data)
{
$query1 = $this->db->query('DELETE FROM wh_product_relation_list
  WHERE prl_ID="'.$data['prl_ID'].'"');


}






    }
