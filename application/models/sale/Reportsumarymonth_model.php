<?php

class Reportsumarymonth_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist1($data)
        {

$year = $data['year'];





$query = $this->db->query('SELECT

    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="01") as m1,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="02") as m2,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="03") as m3,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="04") as m4,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="05") as m5,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="06") as m6,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="07") as m7,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="08") as m8,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="09") as m9,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="10") as m10,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="11") as m11,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="12") as m12,


    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="01") as mm1,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="02") as mm2,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="03") as mm3,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="04") as mm4,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="05") as mm5,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="06") as mm6,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="07") as mm7,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="08") as mm8,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="09") as mm9,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="10") as mm10,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="11") as mm11,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="12") as mm12





    FROM sale_list_header as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.adddate, "%Y")="'.$year.'" GROUP BY FROM_UNIXTIME(wpl.adddate, "%Y")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{
"data":'.$encode_data.'
}';

        }








 public function Daylist2($data)
        {

$year = $data['year'];





$query = $this->db->query('SELECT

    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="01") as m1,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="02") as m2,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="03") as m3,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="04") as m4,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="05") as m5,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="06") as m6,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="07") as m7,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="08") as m8,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="09") as m9,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="10") as m10,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="11") as m11,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="12") as m12,


    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="01") as mm1,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="02") as mm2,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="03") as mm3,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="04") as mm4,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="05") as mm5,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="06") as mm6,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="07") as mm7,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="08") as mm8,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="09") as mm9,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="10") as mm10,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="11") as mm11,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="12") as mm12





    FROM sale_list_header as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.adddate, "%Y")="'.$year.'" GROUP BY FROM_UNIXTIME(wpl.adddate, "%Y")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{
"data":'.$encode_data.'
}';

        }





    }
