<?php

class Reportsumaryhours_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

          $dayfrom = strtotime($data['dayfrom']);
          $dayto = strtotime($data['dayto'])+86400;

          $query = $this->db->query('SELECT SUM((sh.product_price-sh.product_price_discount)*sh.product_sale_num) as count,
           from_unixtime(sh.adddate,"%H") as name
              FROM sale_list_datail  as sh
LEFT JOIN wh_product_list as wl on wl.product_id=sh.product_id
              WHERE
            wl.supplier_id="'.$_SESSION['supplier_id'].'"  
          AND     sh.adddate
          BETWEEN "'.$dayfrom.'"
          AND "'.$dayto.'"
          GROUP BY name
          ORDER BY name ASC ');
          $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

          return $encode_data;

        }






    }
