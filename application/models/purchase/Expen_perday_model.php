<?php

class Expen_perday_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$year = $data['year'];
$month = $data['month'];



$query = $this->db->query('SELECT

    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="01") as d1,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="02") as d2,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="03") as d3,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="04") as d4,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="05") as d5,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="06") as d6,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="07") as d7,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="08") as d8,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="09") as d9,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="10") as d10,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="11") as d11,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="12") as d12,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="13") as d13,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="14") as d14,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="15") as d15,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="16") as d16,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="17") as d17,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="18") as d18,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="19") as d19,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="20") as d20,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="21") as d21,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="22") as d22,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="23") as d23,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="24") as d24,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="25") as d25,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="26") as d26,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="27") as d27,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="28") as d28,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="29") as d29,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="30") as d30,
    (SELECT sum(allprice) FROM purchase_buy_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.importproduct_header_date, "%d")="31") as d31






    FROM purchase_buy_header as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.importproduct_header_date, "%Y")="'.$year.'" AND FROM_UNIXTIME(wpl.importproduct_header_date, "%m")="'.$month.'" GROUP BY FROM_UNIXTIME(wpl.importproduct_header_date, "%m")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo $encode_data;
        }






    }
