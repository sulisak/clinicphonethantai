<?php

class Reportsumaryyear_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist1($data)
        {

$year = $data['year'];

////////// 1
$query = $this->db->query('SELECT 
sum(sh.sumsale_price-sh.discount_last) as profit,
from_unixtime(sh.adddate,"%Y") as year
FROM sale_list_header as sh
  GROUP BY year ORDER BY year ASC ');


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{
"data":'.$encode_data.'
}';

        }




public function Daylist2()
        {


$query = $this->db->query('SELECT
FROM_UNIXTIME(sd.adddate, "%Y") as sd_year,
sum(sd.product_sale_num*wl.product_pricebase) as sd_pricebaseall 
FROM sale_list_datail as sd 
LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id 
GROUP BY sd_year ORDER BY sd_year ASC

    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{
"data":'.$encode_data.'
}';

        }

		
		




    }
