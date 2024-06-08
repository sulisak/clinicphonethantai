
<?php $fontfamily_bill = 'font-family: "'.$_SESSION['fontslip'].'", sans-serif;';?>
<?php $fontfamily_ui = 'font-family: "'.$_SESSION['fontc2m'].'", sans-serif;';?>






<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: <?php if(isset($_SESSION['color_theme'])){ echo $_SESSION['color_theme'];}?>;
border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
a{
	color: #000000;
}
.panel{
  border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.btn{
 border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.form-control{
 border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.img-responsive{
border-radius: 20px;
}
</style>




<div class="col-md-12 col-sm-12 col-xs-12">
<center>
<span style="color: #fff;">

<br />


<!-- <a href="https://www.facebook.com/SabaiPOSLaosoftware" target="_blank" style="color:#f5eeee;">
<img src="<?php echo $base_url;?>/pic/c2mposlogo.jpg" 
style="width:30px;box-shadow: 3px 3px rgba(0,0,0,.3);" 
class="img-circle">

<span style="text-shadow: 2px 2px 4px #000000;font-size:12px;">
Support By SABAI-POS</span>
</a> -->

</span>
<br />
<br />
</center>
</div>



<script src="<?php echo $base_url; ?>/js/jspdf.min.js"></script>

<script type="text/javascript" src="<?php echo $base_url; ?>/js/jquery.table2excel.js"></script>


<script>

function fnExcelReport(){
				$("#headerTable").c2mpos({
					exclude: ".noExl",
    				name: "Excel Document Name"
				}); 
				 
}




function fnExcelReport2()
{
    var tab_text="<meta http-equiv='Content-type' content='text/html;charset=utf-8' /><table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('headerTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}

	
</script>


</body>
</html>

<?php
if(!isset($_SERVER["HTTP_REFERER"])){
		echo '<script>
window.location = "'.$base_url.'";
	</script>';
	}
	?>




	<style type="text/css">
	body{
		font-family: Tahoma;
		background-image: url("<?php echo $base_url;?>/<?php if(isset($_SESSION['owner_bgimg'])){ echo $_SESSION['owner_bgimg'];}?>");
		background-color: <?php if(isset($_SESSION['color_theme'])){ echo $_SESSION['color_theme'];}?>;
	}
</style>


<style>

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	    padding: 3px;
}
</style>

<script>
	$("form :input").attr("autocomplete", "off");
</script>




<script>
	
function Openprintdiv1() {
        var divToPrint = document.getElementById('openprint1'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+

'<?php echo $fontfamily;?>'+
				
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'<style> body{<?php echo $fontfamily_bill;?>}</style>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}



function Openprintdiv2() {
	
        var divToPrint = document.getElementById('openprint2'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
			'<?php echo $fontfamily;?>'+	
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'<style> body{<?php echo $fontfamily_bill;?>}</style>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();
	
}



function Openprintdiv_table() {
	$('.c2mforhide').hide();
        var divToPrint = document.getElementById('openprint_table'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
				'<?php echo $fontfamily;?>'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'<style> body{<?php echo $fontfamily_bill;?>}</style>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();
	$('.c2mforhide').show();
}


function Openprintdiv_mini() {
        var divToPrint = document.getElementById('section-to-print-mini'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
				'<?php echo $fontfamily;?>'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
					'<style> body{font-family: "Sarabun", sans-serif;}</style>'+
				'<style> body{<?php echo $fontfamily_bill;?>}</style>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}



function Openprintdiv_mini_order() {
        var divToPrint = document.getElementById('section-to-print-mini-order'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
				'<?php echo $fontfamily;?>'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'<style> body{<?php echo $fontfamily_bill;?>}</style>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}




<?php $ii=3; for($i=1;$i<=$ii;$i++){?>
	function Printmodal<?php echo $i;?>() {
        var divToPrint = document.getElementById('printmodal<?php echo $i;?>'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
				'<?php echo $fontfamily;?>'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
					'<style> body{font-family: "Sarabun", sans-serif;}</style>'+
				'<style> body{<?php echo $fontfamily_bill;?>}</style>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}
<?php } ?>


function playbeep () {
    document.getElementById('play').play();
}


	</script>
	
	
	
	
<?php echo $fontfamily;?>


	
	<style>
	body{
	<?php echo $fontfamily_ui;?>
	}
	
.product_box_button {
  text-align: center;
  cursor: pointer;
}

.product_box_button:hover {
	background-color: #ccc;
	color:#000;
	}

.product_box_button:active {
  background-color: #ccc;
  transform: translateY(4px);
}


</style>
	
