<?php

class Productnotsale_model extends CI_Model {



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

$query = $this->db->query('SELECT *,
IFNULL((SELECT SUM(sd.product_sale_num) FROM sale_list_datail as sd  WHERE sd.product_id=wl.product_id AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" LIMIT 1),"0") as salenum
    FROM wh_product_list as wl
	LEFT JOIN stock as s on s.product_id=wl.product_id
	LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
	WHERE wl.product_name LIKE "%'.$data['searchtext'].'%"
	OR wl.product_code LIKE "%'.$data['searchtext'].'%"
GROUP BY wl.product_id
ORDER BY salenum ASC,s.product_stock_num DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }

	
		
		
		
		
		
		
		
		
	


    }
