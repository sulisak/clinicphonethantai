<?php

class Reportsumaryday_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist1($data)
        {

$year = $data['year'];
$month = $data['month'];

$query = $this->db->query('SELECT

    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="01") as d1,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="02") as d2,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="03") as d3,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="04") as d4,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="05") as d5,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="06") as d6,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="07") as d7,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="08") as d8,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="09") as d9,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="10") as d10,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="11") as d11,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="12") as d12,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="13") as d13,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="14") as d14,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="15") as d15,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="16") as d16,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="17") as d17,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="18") as d18,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="19") as d19,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="20") as d20,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="21") as d21,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="22") as d22,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="23") as d23,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="24") as d24,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="25") as d25,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="26") as d26,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="27") as d27,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="28") as d28,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="29") as d29,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="30") as d30,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="31") as d31,





    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="01") as dd1,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="02") as dd2,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="03") as dd3,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="04") as dd4,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="05") as dd5,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="06") as dd6,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="07") as dd7,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="08") as dd8,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="09") as dd9,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="10") as dd10,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="11") as dd11,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="12") as dd12,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="13") as dd13,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="14") as dd14,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="15") as dd15,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="16") as dd16,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="17") as dd17,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="18") as dd18,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="19") as dd19,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="20") as dd20,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="21") as dd21,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="22") as dd22,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="23") as dd23,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="24") as dd24,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="25") as dd25,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="26") as dd26,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="27") as dd27,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="28") as dd28,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="29") as dd29,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="30") as dd30,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="31") as dd31






    FROM sale_list_header as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(wpl.adddate, "%m")="'.$month.'" GROUP BY FROM_UNIXTIME(wpl.adddate, "%m")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{
"data":'.$encode_data.'

}';

        }










public function Daylist2($data)
        {

$year = $data['year'];
$month = $data['month'];

$query = $this->db->query('SELECT

    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="01") as d1,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="02") as d2,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="03") as d3,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="04") as d4,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="05") as d5,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="06") as d6,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="07") as d7,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="08") as d8,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="09") as d9,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="10") as d10,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="11") as d11,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="12") as d12,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="13") as d13,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="14") as d14,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="15") as d15,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="16") as d16,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="17") as d17,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="18") as d18,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="19") as d19,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="20") as d20,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="21") as d21,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="22") as d22,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="23") as d23,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="24") as d24,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="25") as d25,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="26") as d26,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="27") as d27,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="28") as d28,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="29") as d29,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="30") as d30,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)-(sd.product_sale_num*wl.product_pricebase)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="31") as d31,





    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="01") as dd1,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="02") as dd2,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="03") as dd3,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="04") as dd4,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="05") as dd5,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="06") as dd6,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="07") as dd7,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="08") as dd8,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="09") as dd9,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="10") as dd10,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="11") as dd11,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="12") as dd12,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="13") as dd13,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="14") as dd14,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="15") as dd15,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="16") as dd16,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="17") as dd17,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="18") as dd18,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="19") as dd19,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="20") as dd20,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="21") as dd21,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="22") as dd22,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="23") as dd23,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="24") as dd24,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="25") as dd25,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="26") as dd26,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="27") as dd27,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="28") as dd28,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="29") as dd29,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="30") as dd30,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="31") as dd31






    FROM sale_list_header as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(wpl.adddate, "%m")="'.$month.'" GROUP BY FROM_UNIXTIME(wpl.adddate, "%m")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{
"data":'.$encode_data.'

}';

        }





    }
