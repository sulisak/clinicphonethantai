<?php

class Expen_permonth_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$year = $data['year'];






$query = $this->db->query('SELECT

    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="01") as m1,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="02") as m2,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="03") as m3,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="04") as m4,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="05") as m5,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="06") as m6,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="07") as m7,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="08") as m8,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="09") as m9,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="10") as m10,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="11") as m11,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="12") as m12



    FROM purchase_buy_header as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.importproduct_header_date, "%Y")="'.$year.'" GROUP BY FROM_UNIXTIME(wpl.importproduct_header_date, "%Y")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo  $encode_data;

        }






    }
