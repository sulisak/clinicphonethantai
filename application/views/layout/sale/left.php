<font style="font-family:Phetsarath OT!important">
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3 col-xs-4">


	<div class="panel panel-default" style="font-size: 14px;">
		<div class="panel-body">


		<ul class="nav nav-pills nav-sidebar">

<li style="width: 100%;" <?php if($tab === 'salelist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salelist"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?=$lang_salereportall?> </a></li>

<li style="width: 100%;" <?php if($tab === 'salereportshift'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salereportshift"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereportshif?>
 </a></li>


<li style="width: 100%;" <?php if($tab === 'salereport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salereport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereport?> <?php echo $lang_los_1;?>
 </a></li>



<li style="width: 100%;" <?php if($tab === 'salelist_sn'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salelist_sn"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?php echo $lang_los_2;?> </a></li>





 <li style="width: 100%;" <?php if($tab === 'salereportcat'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salereportcat"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereportcategory?>
 </a></li>





<li style="width: 100%;" <?php if($tab === 'returnreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/returnreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	<?=$lang_reportreturnproduct?></a></li>



<li style="width: 100%;" <?php if($tab === 'supplierreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/supplierreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereportsupplier?></a></li>



<!-- <li style="width: 100%;" <?php if($tab === 'salesumaryreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salesumaryreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_salereportsummary?></a></li> -->




<li style="width: 100%;" <?php if($tab === 'reportsumary'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/reportsumary"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?=$lang_summaryall?>
<br />
<?php echo $lang_los_3;?>
</a></li>




</ul>

</div>

</div>




<div class="panel panel-default">
	 <div class="panel-body">
	
<ul class="nav nav-pills nav-sidebar">	


<li style="width: 100%;" <?php if($tab === 'salecustomerreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salecustomerreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 
	<?php echo $lang_los_4;?></a></li>
	
<?php if($_SESSION['have_product_course']=='1'){?>	
	<li style="width: 100%;" <?php if($tab === 'used_course_report'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/used_course_report"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 
	<?php echo $lang_los_5;?></a></li>
<?php } ?>	
	
	
<li style="width: 100%;" <?php if($tab === 'salebranchreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salebranchreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 
	<?php echo $lang_los_6;?></a></li>
	
<li style="width: 100%;" <?php if($tab === 'salerreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salerreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> 
	<?php echo $lang_los_7;?></a></li>
	
		
	<li style="width: 100%;" <?php if($tab === 'salereportbill'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/salereportbill"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
	<?php echo $lang_los_8;?></a></li>


</ul>

</div>

</div>






<!-- <div class="panel panel-default">
	 <div class="panel-body">
	
<ul class="nav nav-pills nav-sidebar">	



	
<li style="width: 100%;" <?php if($tab === 'log_round'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/log_round"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> 
	<?php echo $lang_los_9;?></a></li>
		
	


</ul>

</div>

</div> -->







<div class="panel panel-default">
	 <div class="panel-body">
	
<ul class="nav nav-pills nav-sidebar">	

<li style="width: 100%;" <?php if($tab === 'reportsumaryhours'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/reportsumaryhours"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
 <?php echo $lang_los_10;?></a></li>


<li style="width: 100%;" <?php if($tab === 'reportsumaryday'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/reportsumaryday"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
 <?php echo $lang_los_11;?></a></li>

<li style="width: 100%;" <?php if($tab === 'reportsumarymonth'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/reportsumarymonth"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
<?php echo $lang_los_12;?> </a></li>

<li style="width: 100%;" <?php if($tab === 'reportsumaryyear'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/reportsumaryyear"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
 <?php echo $lang_los_13;?></a></li>

</ul>

</div>

</div>




<div class="panel panel-default">
	 <div class="panel-body">


	 <ul class="nav nav-pills nav-sidebar">

<li style="width: 100%;" <?php if($tab === 'product_value'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/product_value"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?php echo $lang_los_14;?></a></li>


<!-- <li style="width: 100%;" <?php if($tab === 'product_stockout_relation'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/product_stockout_relation"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?php echo $lang_los_15;?></a></li> -->



<li style="width: 100%;" <?php if($tab === 'productnotsale'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/productnotsale"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?php echo $lang_los_16;?></a></li>




</ul>

</div>
</div>







<div class="panel panel-default">
		<div class="panel-body">


		<ul class="nav nav-pills nav-sidebar">

<li style="width: 100%;" <?php if($tab === 'customerscore'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/customerscore"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?=$lang_cuspoint?></a></li>


<li style="width: 100%;" <?php if($tab === 'customerscoreproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/customerscoreproduct"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?php echo $lang_los_17;?></a></li>



</ul>

</div>
</div>






<div class="panel panel-default">
	 <div class="panel-body">


	 <ul class="nav nav-pills nav-sidebar">


<li style="width: 100%;" <?php if($tab === 'log_delete_order'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/log_delete_order"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?php echo $lang_los_18;?></a></li>

<li style="width: 100%;" <?php if($tab === 'log_delete_sale'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/log_delete_sale"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?php echo $lang_los_19;?></a></li>


<li style="width: 100%;" <?php if($tab === 'log_c2mhelper'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/sale/log_c2mhelper"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
<?php echo $lang_los_20;?></a></li>


</ul>

</div>
</div>





</div>
</font>