
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3">


	<div class="panel panel-default">
		<div class="panel-body">

		<ul class="nav nav-pills">


<li style="width: 100%;" <?php if($tab === 'productlist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/productlist"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
<?=$lang_productliststock?> </a></li>

<li style="width: 100%;" <?php if($tab == 'stock'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/stock">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
สินค้าคงเหลือ </a></li>

<li style="width: 100%;" <?php if($tab == 'stockzero'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/stockzero">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
สินค้าหมดสต๊อก </a></li>

<!--
<li style="width: 100%;" <?php if($tab == 'dateend'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/dateend">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
สินค้าไกล้หมดอายุ </a></li> -->


<!--

<li style="width: 100%;" <?php if($tab === 'productother'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productother"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
สินค้าออฟชั่นเสริม </a></li> -->


<!-- <li style="width: 100%;" <?php if($tab === 'importproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/importproduct"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
<?=$lang_productintostock?> </a></li>



<li style="width: 100%;" <?php if($tab === 'productcategory'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productcategory"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?=$lang_productcategory?> </a></li>

 <li style="width: 100%;" <?php if($tab === 'productunit'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productunit"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
หน่วยนับ </a></li>

<li style="width: 100%;" <?php if($tab === 'supplier'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/supplier"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
Vendor/Brand </a></li>

<li style="width: 100%;" <?php if($tab === 'zone'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/zone"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
Zone สินค้า </a></li> -->

</ul>


		</div>
	</div>




	<div class="panel panel-default" style="font-size: 14px;">
		<div class="panel-body">


		<ul class="nav nav-pills nav-sidebar">



	<li style="width: 100%;" <?php if($tab === 'salereport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/salereport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	<?=$lang_salereport?>
	</a></li>




	<!-- <li style="width: 100%;" <?php if($tab === 'supplierreport'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/supplierreport"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	รายงานการขายสินค้าของ Vendor</a></li>
 -->




	<li style="width: 100%;" <?php if($tab === 'reportsumary'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/reportsumary"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	สรุปยอดขายทั้งหมด</a></li>


	<li style="width: 100%;" <?php if($tab === 'reportsumaryhours'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/reportsumaryhours"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	ยอดขาย<br/>รายชั่วโมง(ตามบิล) </a></li>


	<li style="width: 100%;" <?php if($tab === 'reportsumaryday'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/reportsumaryday"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	กำไร รายวัน </a></li>

	<li style="width: 100%;" <?php if($tab === 'reportsumarymonth'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/vendor/reportsumarymonth"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	กำไร รายเดือน </a></li>

	</ul>

	</div>

	</div>




	<!-- <div class="panel panel-default">
		<div class="panel-body">


<ul class="nav nav-pills">
<li style="width: 100%;" <?php if($tab == 'showproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/showproduct">
<span class="glyphicon glyphicon-link" aria-hidden="true"></span>
<?=$lang_productpagepic?> </a></li>


</ul>


</div>
	</div> -->


	</div>
