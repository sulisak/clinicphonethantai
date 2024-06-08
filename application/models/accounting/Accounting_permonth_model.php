<?php

class Accounting_permonth_model extends CI_Model {



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

    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="01") as m1,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="02") as m2,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="03") as m3,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="04") as m4,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="05") as m5,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="06") as m6,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="07") as m7,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="08") as m8,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="09") as m9,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="10") as m10,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="11") as m11,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="12") as m12



    FROM accounting_taxinvoice_list as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.adddate, "%Y")="'.$year.'" GROUP BY FROM_UNIXTIME(wpl.adddate, "%Y")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo  $encode_data;

        }






    }
