<!DOCTYPE html>
<html>
<head>



<style>
    body {
        width: 8.5in;
        margin: 0in .1875in;
        }
    .labelx{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 2.025in; /* plus .6 inches from padding */
        /*height: .875in;  plus .125 inches from padding */
        padding: .125in .3in 0;
        margin-right: .125in; /* the gutter */

        float: left;

        text-align: center;
        overflow: hidden;

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }
    .page-break  {
        clear: left;
        display:block;
        page-break-after:always;
        }

        @media print {
    body * {
        visibility: hidden;
    }
    #section-to-print, #section-to-print * {
        visibility: visible;
   
    }
    #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
    }
    </style>





	<title>Barcode <?php if(isset($_GET['product_name'])){ echo $_GET['product_name']; } ?> </title>
</head>

<body>
<button class="btn btn-success"  onclick="window.print()">Print</button>

<hr/>

<div id="section-to-print">

<?php
for($i=1;$i<=27;$i++){
    
     echo '<div class="labelx">
 <font size="2">	';  if(isset($_GET['product_name'])){ echo $_GET['product_name']; }  echo '</font>
<br />
     <img style="width:200px;height:50px;" src="'.$base_url.'/warehouse/barcode/png?barcode=	';  if(isset($_GET['product_code'])){ echo $_GET['product_code']; } echo '"> ';
echo '<br />
<center>
<span style="font-weight:bold;font-size:25px;">
';
if(isset($_GET['product_price'])){ echo $_GET['product_price']; }
      echo '
     </span></center></div>';
 }
  ?>

</div>

</body>
</html>


