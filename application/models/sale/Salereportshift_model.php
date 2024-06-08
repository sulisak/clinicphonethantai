<?php

class Salereportshift_model extends CI_Model {



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


$querynum = $this->db->query('SELECT
  s.shift_id as shift_id,
  s.user_name as user_name,
  b.branch_name as branch_name,
  from_unixtime(shift_start_time,"%d-%m-%Y %H:%i:%s") as shift_start_time,
  from_unixtime(shift_end_time,"%d-%m-%Y %H:%i:%s") as shift_end_time,
  s.shift_money_start as shift_money_start,
  s.shift_money_end as shift_money_end,
  sum(sh.sumsale_price) as sumsale_price,
  sum(sh.discount_last) as discount_last,
  sum(sh.sumsale_num) as sumsale_num
    FROM shift as s
	LEFT JOIN branch as b on b.branch_id=s.branch_id
    LEFT JOIN sale_list_header as sh on sh.shift_id=s.shift_id
    WHERE s.user_name LIKE "%'.$data['searchtext'].'%"
	OR b.branch_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY s.shift_id,sh.shift_id');


$query = $this->db->query('SELECT
  s.shift_id as shift_id,
  s.user_name as user_name,
  b.branch_name as branch_name,
  from_unixtime(shift_start_time,"%d-%m-%Y %H:%i:%s") as shift_start_time,
  from_unixtime(shift_end_time,"%d-%m-%Y %H:%i:%s") as shift_end_time,
  s.shift_money_start as shift_money_start,
  s.shift_money_end as shift_money_end,
  sum(sh.sumsale_price) as sumsale_price,
  sum(sh.discount_last) as discount_last,
  sum(sh.sumsale_num) as sumsale_num,
  (SELECT SUM(pr.sumsale_price) FROM product_return_header2 as pr WHERE pr.shift_id=s.shift_id) as money_from_customer
  FROM shift as s
	LEFT JOIN branch as b on b.branch_id=s.branch_id
    LEFT JOIN sale_list_header as sh on sh.shift_id=s.shift_id
    WHERE s.user_name LIKE "%'.$data['searchtext'].'%"
	OR b.branch_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY s.shift_id,sh.shift_id
    ORDER BY s.shift_id DESC LIMIT '.$start.' , '.$perpage.' ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }







        public function Getproductinshift($data)
                {


        $query = $this->db->query('SELECT  *,
          sd.product_name as product_name_ok,
          SUM(sd.product_sale_num) as sale_num,
          SUM(sd.product_price*sd.product_sale_num) as price,
          SUM(sd.product_price_discount*sd.product_sale_num) as price_discount,
          SUM((sd.product_price*sd.product_sale_num)-(sd.product_price_discount*sd.product_sale_num)) as sumprice
            FROM sale_list_datail as sd
            LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id
            LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
            WHERE sd.shift_id="'.$data['shift_id'].'"
                 GROUP BY sd.product_name
              ORDER BY sd.ID DESC ');


        $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
        return $encode_data;


          }









                  public function Openbillclosedaylist_product($data)
                         {

                  $query = $this->db->query('SELECT
                    wl.product_name as product_name2,
                     wl.product_category_id as product_category_id2,
                     sum(sd.product_sale_num*(sd.product_price-sd.product_price_discount)) as product_price2,
                     sum(sd.product_sale_num) as product_sale_num2,
                     sum(sd.product_price_discount) as product_price_discount2
                     FROM sale_list_datail  as sd
                     LEFT JOIN wh_product_list as wl on sd.product_id=wl.product_id

                      WHERE sd.shift_id="'.$data['shift_id'].'"
                      GROUP BY sd.product_id DESC
                      ');


                  $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

                  return $encode_data;

                         }




           public function Openbillclosedaylista($data)
                  {

          //$dayfrom = strtotime($data['daynow']);
          //$dayto = strtotime($data['daynow'])+86400;

          $query = $this->db->query('SELECT
              wc.product_category_name as product_category_name2,
              wc.product_category_id as product_category_id2,
              sum(sd.product_sale_num*(sd.product_price-sd.product_price_discount)) as product_price2,
              sum(sd.product_sale_num) as product_sale_num2,
              sum(sd.product_price_discount) as product_price_discount2
              FROM wh_product_category  as wc
              LEFT JOIN wh_product_list as wl on wl.product_category_id=wc.product_category_id
              LEFT JOIN sale_list_datail as sd on sd.product_id=wl.product_id

               WHERE sd.shift_id="'.$data['shift_id'].'"
               GROUP BY wc.product_category_name
               ');


          $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

          return $encode_data;

                  }




                  public function Openbillclosedaylistb($data)
                  {
          //$dayfrom = strtotime($data['daynow']);
          //$dayto = strtotime($data['daynow'])+86400;

          $query2 = $this->db->query('SELECT
              sum(sumsale_price) as sumsale_price2,
              sum(sumsale_discount) as sumsale_discount2,
              sum(sumsale_num) as sumsale_num2,
              sum(discount_last) as discount_last2,
			  sum(money_changeto_customer) as money_changeto_customer,
			  (SELECT SUM(pr.sumsale_price) FROM product_return_header2 as pr WHERE pr.shift_id="'.$data['shift_id'].'") as money_from_customer
              FROM sale_list_header
          WHERE shift_id="'.$data['shift_id'].'"
               ');

$encode_data2 = json_encode($query2->result(),JSON_UNESCAPED_UNICODE );
          return $encode_data2;

                  }





                public function Openbillclosedaylistc($data)
                  {
          //$dayfrom = strtotime($data['daynow']);
          //$dayto = strtotime($data['daynow'])+86400;

          $query3 = $this->db->query('SELECT
            m.pay_type,
            sum(m.money) as sumsale_price2
            FROM morepay as m
            WHERE m.shift_id="'.$data['shift_id'].'"
             GROUP BY m.pay_type ORDER BY m.pay_type ASC
             ');

          $encode_data3 = json_encode($query3->result(),JSON_UNESCAPED_UNICODE );

          return $encode_data3;

                  }











  }
