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
// $data2['product_price3'] = $data['product_price3'];
// $data2['product_price4'] = $data['product_price4'];
// $data2['product_price5'] = $data['product_price5'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_category_id'] = $data['product_category_id'];
$data2['product_unit_id'] = $data['product_unit_id'];
$data2['supplier_id'] = $data['supplier_id'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
// $data2['product_score'] = $data['product_score'];
$data2['zone_id'] = $data['zone_id'];
// $data2['count_stock'] = $data['count_stock'];
$data2['product_num_min'] = $data['product_num_min'];
// $data2['is_course'] = $data['is_course'];
// $data2['product_weight'] = $data['product_weight'];

// ====== ori =====================
if(isset($data['product_stock_num'])){
	$data2['product_stock_num'] = $data['product_stock_num'];
}else{
	$data2['product_stock_num'] = 1000;
}
// ====== ori =====================

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
		
		
		


public function Addsizecolor($data)
        {

$data['product_code'] = rand(100000,999999);
$query =  $this->db->get_where('wh_product_list' , array('product_code' => $data['product_code']));

$count_row = $query->num_rows();

if ($count_row > 0) {
$data['product_code'] = rand(100000,999999);
}


$data2['product_image'] = '';
$data2['product_code'] = $data['product_code'];
$data2['product_name'] = $data['product_name'];
$data2['product_date_end'] = '';
$data2['product_date_end2'] = '';
$data2['product_des'] = '';
$data2['product_price'] = $data['product_price'];
$data2['product_wholesale_price'] = '';
$data2['product_pricebase'] = '';
$data2['product_category_id'] = $data['product_category_id'];
$data2['product_unit_id'] = '';
$data2['supplier_id'] = '';
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
$data2['product_score'] = '';
$data2['zone_id'] = '';
$data2['product_num_min'] = '';
$data2['is_course'] = '0';
$data2['product_weight'] = '0';



$this->db->insert("wh_product_list", $data2);




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
// $data2['product_price3'] = $data['product_price3'];
// $data2['product_price4'] = $data['product_price4'];
// $data2['product_price5'] = $data['product_price5'];
$data2['product_pricebase'] = $data['product_pricebase'];
$data2['product_category_id'] = $data['product_category_id'];
$data2['product_unit_id'] = $data['product_unit_id'];
$data2['supplier_id'] = $data['supplier_id'];
// $data2['product_score'] = $data['product_score'];
$data2['zone_id'] = $data['zone_id'];
// $data2['count_stock'] = $data['count_stock'];
$data2['product_num_min'] = $data['product_num_min'];
// $data2['is_course'] = $data['is_course'];
// $data2['product_weight'] = $data['product_weight'];

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



           public function Updatenopic($data)
        {

$data2['product_image'] = '';
$where = array(
        'product_id'  => $data['product_id']
);
$this->db->where($where);
$this->db->update("wh_product_list", $data2);

}


           public function Update_vat($data)
        {

$data2['have_vat'] = $data['have_vat'];
$where = array(
        'product_id'  => $data['product_id']
);
$this->db->where($where);
$this->db->update("wh_product_list", $data2);

}



           public function Update_popup_pricenum($data)
        {

$data2['popup_pricenum'] = $data['popup_pricenum'];
$where = array(
        'product_id'  => $data['product_id']
);
$this->db->where($where);
$this->db->update("wh_product_list", $data2);

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
	wl.product_price3 as product_price3,
	wl.product_price4 as product_price4,
	wl.product_price5 as product_price5,
    wl.product_pricebase as product_pricebase,

    -- wl.product_stock_num as product_stock_num,
    st.product_stock_num as product_stock_num,


    wl.product_price_value as product_price_value,
    wl.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    wl.supplier_id as supplier_id,
    sp.supplier_name as supplier_name,
    wl.zone_id as zone_id,
	wl.is_course as is_course,
    z.zone_name as zone_name,
    wu.product_unit_id as product_unit_id,
    wu.product_unit_name as product_unit_name
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN supplier as sp on sp.supplier_id=wl.supplier_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id

    LEFT JOIN stock as st on st.product_id=wl.product_id


LEFT JOIN serial_number as sn on sn.product_id=wl.product_id
    WHERE
    
    wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.product_des LIKE "%'.$data['searchtext'].'%"
    OR wc.product_category_name LIKE "%'.$data['searchtext'].'%"
    OR z.zone_name="'.$data['searchtext'].'"
    OR sp.supplier_name LIKE "%'.$data['searchtext'].'%"
OR sn.sn_code LIKE "%'.$data['searchtext'].'%"
GROUP BY wl.product_id
    ORDER BY wl.product_id DESC');


//     $query = $this->db->query('SELECT
//         wl.product_id as product_id,
//         wl.product_code as product_code,
//         wl.product_name as product_name,
//     		wl.have_vat as have_vat,
//     		wl.popup_pricenum as popup_pricenum,
//         wl.product_date_end as product_date_end,
//         wl.product_des as product_des,
//         wl.product_image as product_image,
//         wl.product_price as product_price,
//         wl.product_wholesale_price as product_wholesale_price,
//     	wl.product_price3 as product_price3,
//     	wl.product_price4 as product_price4,
//     	wl.product_price5 as product_price5,
//         wl.product_score as product_score,
//         wl.product_pricebase as product_pricebase,
//         IFNULL((SELECT s.product_stock_num FROM stock as s WHERE s.product_id=wl.product_id  LIMIT 1), "0") as product_stock_num,
//         IFNULL((SELECT COUNT(sn_id) FROM serial_number as s WHERE s.status="0" AND s.product_id=wl.product_id ), "0") as csn,
//     	wl.product_price_value as product_price_value,
//         wl.product_category_id as product_category_id,
//         wc.product_category_name as product_category_name,
//         wl.supplier_id as supplier_id,
//         sp.supplier_name as supplier_name,
//     	wl.count_stock,
//         wl.zone_id as zone_id,
//     	wl.is_course as is_course,
//     	wl.product_weight as product_weight,
//         z.zone_name as zone_name,
//         wl.product_unit_id as product_unit_id,
//         IFNULL(wu.product_unit_name,"") as product_unit_name,
//         wl.product_num_min as product_num_min,
//      (SELECT count(*) FROM wh_product_other_list as sd WHERE sd.product_id=wl.product_id) as product_num_other2,
//       (SELECT count(*) FROM wh_product_relation_list as sd WHERE sd.product_id=wl.product_id) as product_num_other
//         FROM wh_product_list  as wl
//         LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
//         LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
//         LEFT JOIN supplier as sp on sp.supplier_id=wl.supplier_id
//         LEFT JOIN zone as z on z.zone_id=wl.zone_id
// LEFT JOIN serial_number as sn on sn.product_id=wl.product_id
//     WHERE  wl.product_code LIKE "%'.$data['searchtext'].'%"
//     OR wl.product_name LIKE "%'.$data['searchtext'].'%"
//     OR wl.product_des LIKE "%'.$data['searchtext'].'%"
//     OR wc.product_category_name LIKE "%'.$data['searchtext'].'%"
//     OR z.zone_name="'.$data['searchtext'].'"
//     OR sp.supplier_name LIKE "%'.$data['searchtext'].'%"
// OR sn.sn_code LIKE "%'.$data['searchtext'].'%"
// GROUP BY wl.product_id
//     ORDER BY wl.product_id DESC  LIMIT '.$start.' , '.$perpage.'  ');

// =========== add new =========================================================

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
    wl.owner_id="'.$_SESSION['owner_id'].'"  AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wc.product_category_name="'.$data['searchtext'].'"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND z.zone_name="'.$data['searchtext'].'"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND sp.supplier_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_id DESC  LIMIT '.$start.' , '.$perpage.'  ');

// ========================

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }








public function Opensn($data)
        {

$query = $this->db->query('SELECT sn.sn_code as sn_code,
b.branch_name as branch_name
    FROM serial_number as sn
	LEFT JOIN branch as b on b.branch_id=sn.branch_id
    WHERE sn.branch_id="'.$_SESSION['branch_id'].'" and sn.product_id="'.$data['product_id'].'" AND sn.status="0"
    ORDER BY sn.sn_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		






    public function Delete($data)
        {

$data['user_id'] = $_SESSION['user_id'];
$data['name'] = $_SESSION['name'];
$data['adddate'] = time();

$this->db->query('DELETE FROM stock  
WHERE product_id="'.$data['product_id'].'"');



$this->db->insert("log_delete_product", $data);
$query = $this->db->query('DELETE FROM wh_product_list  WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }












        public function Searchpot($data)
     {

$query = $this->db->query('SELECT *,
IFNULL(wu.product_unit_name,"") AS product_unit_name
 FROM wh_product_list as wl
 LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
 WHERE wl.product_name LIKE "%'.$data['searchtext'].'%"
 ORDER BY wl.product_id DESC  LIMIT 10  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

     }





     public function Getpotlist($data)
   {

     $query = $this->db->query('SELECT
wrl.prl_ID,
wrl.product_name_relation,
wrl.product_num_relation,
wrl.product_unit_relation,
wrl.product_type_relation
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
	$data1['product_type_relation'] = $data['product_type_relation'];
	
$data2['product_id'] =  $data['product_id_relation'];
$data2['product_id_relation'] = $data['product_id'];
$data2['product_num_relation'] = 1/$data['product_num_relation'];
$data2['product_name_relation'] = $data['product_name'];
$data2['product_unit_relation'] = $data['product_unit_name'];

if($data['product_type_relation']=='0'){
$this->db->insert("wh_product_relation_list", $data1);

$data1['user_id'] = $_SESSION['user_id'];
$data1['name'] = $_SESSION['name'];
$data1['adddate'] = time();
$this->db->insert("log_wh_product_relation_list", $data1);

$this->db->insert("wh_product_relation_list", $data2);

$data2['user_id'] = $_SESSION['user_id'];
$data2['name'] = $_SESSION['name'];
$data2['adddate'] = time();
$this->db->insert("log_wh_product_relation_list", $data2);
}else{
$this->db->insert("wh_product_relation_list", $data1);

$data1['user_id'] = $_SESSION['user_id'];
$data1['name'] = $_SESSION['name'];
$data1['adddate'] = time();
$this->db->insert("log_wh_product_relation_list", $data1);
}



  }





  public function Delpot($data)
{
$query1 = $this->db->query('DELETE FROM wh_product_relation_list
  WHERE prl_ID="'.$data['prl_ID'].'"');


}





public function Check_productlist_foranyone($data)
{

$query = $this->db->query('SELECT *
FROM wh_product_list as wl
LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
WHERE wl.product_code LIKE "%'.$data['searchtext'].'%"
OR wl.product_name LIKE "%'.$data['searchtext'].'%"
');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

}














        public function Searchpot2($data)
     {

$query = $this->db->query('SELECT *
 FROM wh_product_other
 WHERE product_ot_name LIKE "%'.$data['searchtext'].'%" AND show_all="0"
 ORDER BY pot_ID DESC  LIMIT 3  ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

     }





     public function Getpotlist2($data)
   {

     $query = $this->db->query('SELECT
       wol.potl_ID,
       wol.product_id,
       wol.pot_ID,
       wo.product_ot_name,
       wo.product_ot_price,
       wo.product_ot_image,
	   wo.show_all,
	   wo.type

     FROM wh_product_other_list as wol
     LEFT JOIN wh_product_other as wo on wo.pot_ID=wol.pot_ID
     WHERE wol.product_id="'.$data['product_id'].'"
     ORDER BY wol.potl_ID DESC');

   $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

   return $encode_data;

   }



     public function Getpotall2()
   {

     $query = $this->db->query('SELECT
      product_id
     FROM wh_product_other_list
     GROUP BY product_id
     ORDER BY potl_ID DESC');

   $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

   return $encode_data;

   }
   
   



   public function Getpotlistshowall2($data)
 {

   $query = $this->db->query('SELECT *
   FROM wh_product_other
   WHERE show_all="1"
   ORDER BY pot_ID DESC');

 $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

 return $encode_data;

 }






   public function Addpot2($data)
  {

$this->db->insert("wh_product_other_list", $data);


  }





  public function Delpot2($data)
{
$query1 = $this->db->query('DELETE FROM wh_product_other_list
  WHERE product_id="'.$data['product_id'].'" and  pot_ID="'.$data['pot_ID'].'"');


}



  public function Downloadexcel()
        {


$query = $this->db->query('SELECT  wl.product_code as "ລະຫັດສິນຄ້າ", 
wl.product_name as "ຊື່ສິນຄ້າ", 
(SELECT s.product_stock_num FROM stock as s WHERE s.product_id=wl.product_id LIMIT 1) as "ຈຳນວນ",
wl.product_pricebase as "ຕົ້ນທຶນ",
wl.product_price as "ລາຄາປົກກະຕິ",
wl.product_wholesale_price as "ລາຄາ2",
wl.product_price3 as "ລາຄາ3",
wl.product_price4 as "ລາຄາ4",
wl.product_price5 as "ລາຄາ5",
wl.product_score as "ຄະແນນ",
wl.product_des as "ລາຍລະອຽດສິນຄ້າ"
    FROM wh_product_list as wl
    ORDER BY product_id DESC');

return $query;

        }




    }
