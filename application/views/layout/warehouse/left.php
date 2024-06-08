<font style="font-family: Phetsarath OT!important;">
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #f0ad4e;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3 col-xs-4">


	 <div class="panel panel-default">
		<div class="panel-body">


<ul class="nav nav-pills">
    <li style="width: 100%;" <?php if($tab === 'productlist'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productlist"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
<?=$lang_productliststock?> </a></li>
	<li style="width: 100%;" <?php if($tab === 'importproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/importproduct"><span class="glyphicon glyphicon-import" aria-hidden="true"></span>
	<?=$lang_productintostock?> <?php echo $lang_low_1;?> </a></li>



<!-- <li style="width: 100%;" <?php if($tab === 'importproduct_sn'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/importproduct_sn"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
	<?php echo $lang_low_2;?></b></a></li> -->





	<li style="width: 100%;" <?php if($tab === 'exportproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/exportproduct"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
	<?=$lang_productgooutstock?> <?php echo $lang_low_3;?>
	</a></li>

	<li style="width: 100%;" <?php if($tab === 'stock_count'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/stock_count"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	 <?php echo $lang_low_4;?></a></li>


<li style="width: 100%;" <?php if($tab == 'dateend'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/dateend">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
<?php echo $lang_low_5;?></a></li>


<li style="width: 100%;" <?php if($tab === 'packing_list'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/packing_list"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	Packing Check List </a></li>
	
	

<!-- <li style="width: 100%;" <?php if($tab == 'showproduct'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/showproduct">
<span class="glyphicon glyphicon-link" aria-hidden="true"></span>
<?=$lang_productpagepic?> </a></li> -->



</ul>


</div>
	</div>


	
	
	<div class="panel panel-default">
		<div class="panel-body">

		<ul class="nav nav-pills">





 <li style="width: 100%;" <?php if($tab === 'productunit'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productunit"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?=$lang_unit?> </a></li>





<li style="width: 100%;" <?php if($tab === 'productcategory'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productcategory"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?=$lang_productcategory?> </a></li>


<!--
<li style="width: 100%;" <?php if($tab === 'productother'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productother"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
<?php echo $lang_low_6;?> </a></li> 


<li style="width: 100%;" <?php if($tab === 'productsize'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productsize"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
Size </a></li> 

<li style="width: 100%;" <?php if($tab === 'productcolor'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/productcolor"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?php echo $lang_low_7;?> </a></li> -->



<li style="width: 100%;" <?php if($tab === 'supplier'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/supplier"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
<?=$lang_supplierstock?> </a></li>

<li style="width: 100%;" <?php if($tab === 'zone'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/zone"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
<?=$lang_productzone?> </a></li>

</ul>


		</div>
	</div>






<div class="panel panel-default">
	 <div class="panel-body">


	<ul class="nav nav-pills">

<li style="width: 100%;" <?php if($tab == 'stock'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/stock">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
<?=$lang_producthavestock?> </a></li>

<li style="width: 100%;" <?php if($tab == 'stockzero'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/stockzero">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
<?=$lang_productoutstock?> </a></li>



		<li style="width: 100%;" <?php if($tab === 'reportinstock'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/reportinstock"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
		<?php echo $lang_low_8;?>
		 </a></li>

		 <li style="width: 100%;" <?php if($tab === 'reportoutstock'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/reportoutstock"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
 		<?php echo $lang_low_9;?>
 		 </a></li>
		 
		 
		  <li style="width: 100%;" <?php if($tab === 'log_edit_product_stock'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/log_edit_product_stock"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
 		<?php echo $lang_low_10;?>
 		 </a></li>
		 
		 <li style="width: 100%;" <?php if($tab === 'log_delete_product'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/log_delete_product"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
 		<?php echo $lang_low_11;?>
 		 </a></li>
	

	</ul>


	</div>
	</div>
	
	
	
	

<div class="panel panel-default">
	 <div class="panel-body">


	<ul class="nav nav-pills">


<li style="width: 100%;" <?php if($tab === 'sticker_by_weight'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/sticker_by_weight"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	 <?php echo $lang_low_12;?> </a></li>

<li style="width: 100%;" <?php if($tab === 'product_dws'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/warehouse/product_dws"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	 <?php echo $lang_low_13;?> </a></li>

	

	</ul>


	</div>
	</div>
	
	
	













	</div>
</font>