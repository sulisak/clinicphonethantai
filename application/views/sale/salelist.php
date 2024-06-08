
<?php 
foreach ($Getpermission_rule as $value) {
 $arr =  json_decode($value['permission_rule']);
}
?>
<font style="font-family: Phetsarath OT !important;">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<?php if(!isset($arr) || $arr[27]->status==true){?>	
 <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<?php } ?>	


<div style="float: left;">
<input type="text" ng-model="searchtext" style="width:500px;" class="form-control" placeholder="
<?=$lang_search?> <?php echo $lang_sl_1;?>" ng-change="getlist(searchtext,'1',perpage)">
</div>


<form class="form-inline">



<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1',perpage)" class="btn btn-success" placeholder="" title="<?=$lang_search?>">
<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
<?php echo $lang_search;?>
</button>
</div>


<div class="form-group">
<button ng-click="getlist_detail()" class="btn btn-defalut" placeholder="" title="">
<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
<?php echo $lang_sl_2;?>
</button>
</div>

<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>


</form>
<br />

<center>
<img ng-if="!list" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<div id="openprint_table">

<center><b><h1><?php echo $lang_sl_3;?></b></h1> {{dayfrom}} ເຖິງ {{dayto}} </center>
 

<table ng-if="list" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader" style="font-size:12px;">
			<th><?=$lang_rank?></th>
			<th><?=$lang_runno?></th>
			<th><?=$lang_cusname?></th>
<th><?php echo $lang_detail;?></th>
<th><?php echo $lang_score;?></th>

			<th><?=$lang_productnum?></th>
			<th><?=$lang_pricesum?></th>

<?php
if($_SESSION['owner_vat_status']=='2'){
?>
			<th><?=$lang_vat?> Exclude</th>
			<th><?=$lang_pricesumvat?></th>
<?php
}
?>

			<th><?=$lang_discountlast?></th>
			<th><?=$lang_sumall?></th>
			<th><?=$lang_getmoney?></th>
			<th><?=$lang_moneychange?></th>
			<th><?=$lang_payby?></th>
				<th><?=$lang_sales?></th>
			<th><?php echo $lang_saledate;?></th>		
				<th><?php echo $lang_savesaledate;?></th>
				<th>befor VAT</th>
				<th>VAT</th>
				<th><?php echo $lang_branch;?></th>
			<th  ng-if="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td>

			<button class="btn btn-primary btn-xs" ng-click="printDivmini2(x)">
			
			<?php echo $lang_print;?></button>

			<button class="btn btn-default btn-xs" ng-click="Getone(x)">{{x.sale_runno}}</button></td>
			<td>


			{{x.cus_name}}


<span ng-if="x.cus_name!=''">
	<br />
<button class="btn btn-default btn-xs" ng-click="printDivfullsend(x)"><?=$lang_printbox?></button>
</span>
			</td>

<td>
{{x.saleremark}}	
</td>
<td  align="right">
{{x.product_score_all | number:2}}	
</td>

			<td  align="right">{{x.sumsale_num | number}}
<table ng-if="list_detail" style="width:100%;font-size:12px">
<tr class="trheader"><td><?php echo $lang_productname;?></td>
	<td><?php echo $lang_price;?></td>
	<td><?php echo $lang_discount;?></td>
	<td><?php echo $lang_qty;?></td>
	<td><?php echo $lang_all;?></td></tr>
<tr ng-repeat="y in list_detail" ng-if="x.sale_runno==y.sale_runno"><td>{{y.product_name}}</td>
<td align="right">{{y.product_price | number}}</td><td align="right">{{y.product_price_discount | number}}</td>
<td align="right">{{y.product_sale_num | number}}</td>
<td align="right">{{(y.product_price-y.product_price_discount)*y.product_sale_num | number}}</td></tr>		
</table>
			
			</td>
			<td  align="right">{{x.sumsale_price | number:2}}</td>


<?php
if($_SESSION['owner_vat_status']=='2'){
?>
			 <td  align="right">{{x.sumsale_price * (x.vat/100) | number:2}}</td>
	<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) | number:2}}</td>

<?php
}
?>


			<td  align="right">-{{x.discount_last | number:2}}</td>

	<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}</td>

			<td  align="right">{{x.money_from_customer | number:2}}</td>
			<td  align="right">{{x.money_from_customer - ((ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price)) - x.discount_last) | number:2}}</td>

			<td>
<span ng-if="x.cmp=='1'">{{x.pay_type_name}}</span>
<span ng-if="x.cmp>'1'">
	<button class="btn btn-info btn-xs" ng-click="Seemorepay(x)">{{x.cmp}} <?php echo $lang_chanel;?></button>
	</span>
			</td>

<td>
	{{x.name}}
</td>

			<td>{{x.adddate}}</td>
			<td>{{x.savedate}}</td>
			<td class="text-right">{{ParsefloatFunc(x.sumsale_price) - x.discount_last - x.price_vat_all | number:2}}</td>
			<td class="text-right">{{x.price_vat_all | number:2}}</td>
			<td class="text-center">
				<span ng-if="x.branch_name!=null">{{x.branch_name}}</span>
				<span ng-if="x.branch_name==null">-</span>
				</td>
			<td ng-if="showdeletcbut" align="center">
			
			<?php if(!isset($arr) || $arr[27]->status==true){?>
			<button title="<?php echo $lang_sl_4;?> {{x.sale_runno}}" class="btn btn-sm btn-danger" ng-click="Deletelist_modal(x)" id="delbut{{x.ID}}">
			<?=$lang_delete?> {{x.sale_runno}}</button>
			<?php } ?>	
			
			</td>
		</tr>
		
		
		<tr>
		<td colspan="4" align="right"><b><?php echo $lang_all;?></b></td>
		<td align="right"><b>{{Sum_product_score_all() | number:2}}</b></td>
		<td align="right"><b>{{Sumnumall() | number}}</b></td>
		<td align="right"><b>{{Sumpricesaleall() | number:2}}</b></td>
		<td align="right"><b>-{{Sumdiscountlastall() | number:2}}</b></td>
		<td align="right"><b>{{Sumpricesaleall()-Sumdiscountlastall() | number:2}}</b></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
		<td><b>{{Sumpricesaleall()-Sumdiscountlastall()-Sumvatall() | number:2}}</b></td>
		<td><b>{{Sumvatall() | number:2}}</b></td>
		<td></td>
		
		</tr>
		
		
	</tbody>
</table>

</div>


<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
	<option value="1000">1000</option>
	<option value="3000">3000</option>
	<option value="5000">5000</option>
	<option value="10000">10000</option>
	<option value="100000">100000</option>
	<option value="1000000">1000000</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>








<div class="modal fade" id="Deletelist_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_sl_4;?> {{deletelist_x.sale_runno}}</h4>
			</div>
			<div class="modal-body">
<center style="color:red;">
<?php echo $lang_sl_5;?> {{deletelist_x.sale_runno}} <?php echo $lang_sl_6;?>
<br />
<textarea ng-model="whydel" placeholder="<?php echo $lang_sl_7;?>" class="form-control"></textarea>
<br />
<button ng-if="whydel" class="btn btn-success btn-lg" ng-click="Deletelist(deletelist_x)"><?php echo $lang_confirm;?></button>
</center>
</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="Openone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

<button class="btn btn-primary" onClick="Openprintdiv1()"><?=$lang_print?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


			</div>
			<div class="modal-body">
<div class="modal-body" id="openprint1">
		<center>

<span  style="font-size: 35px;font-weight: bold;"><?=$lang_billall?></span>

<br />

	<?php
if($_SESSION['logoonslip']=='0'){
?>

	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
	<br />
	<?php } ?>
	
	
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>


<?php if($_SESSION['owner_tax_number']!=''){ echo '<br />'.$lang_tax; ?>:<?php echo $_SESSION['owner_tax_number']; } ?>



		</center>
<table class="table table-bordered" style="table-layout: fixed;">


<tr>
			<td colspan="2">
	<?=$lang_runno?>:{{sale_runno}} <br />
	<?=$lang_cusname?>: {{cus_name}}	, <?=$lang_address?>: {{cus_address_all}}
</td>
</tr>
</table>


<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_productlist?></th>
		<!--	<th><?=$lang_barcode?></th> -->
			<th><?=$lang_productname?></th>
			<th><?=$lang_detail?></th>

			<th><?=$lang_pricesale?></th>
			<th><?=$lang_discountperunit?></th>
			<th><?=$lang_qty?></th>
			<th><?=$lang_all?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td align="center">{{$index+1}}</td>

			<td style="width: 500px;">{{x.product_name}}</td>
			<td style="width: 300px;">{{x.product_des}}</td>

			<td align="right">{{x.product_price | number:2}}</td>
			<td align="right">{{x.product_price_discount | number:2}}</td>
			<td align="right">{{x.product_sale_num | number}}</td>
			<td align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="5"  align="right" style="font-weight: bold;">
			<?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;">{{sumsale_price | number:2}}</td>



		</tr>

<!-- <tr ng-if="vat3 > '0'">
<td align="right" colspan="7"><?=$lang_vat?> {{vat3}} %</td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price * (vat3/100) | number:2}}</td>
		</tr>

		<tr ng-if="vat3 > '0'">
		<td align="right" colspan="7"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{ParsefloatFunc(sumsale_price)  * (ParsefloatFunc(vat3)/100) + ParsefloatFunc(sumsale_price) | number:2}}</td>
		</tr> -->



	<?php
if($_SESSION['owner_vat_status']=='1'){
?>
 <tr ng-if="vat3=='0'">
		<td align="right" colspan="6"><?=$lang_vat?> {{<?=$_SESSION['owner_vat']?>}}%</td>
		<td style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>




		<tr ng-if="vat3=='0'">
		<td align="right" colspan="6"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>

		<tr ng-if="vat3=='0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>


<tr ng-if="vat3!='0'">
		<td align="right" colspan="6"><?=$lang_vat?> {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>




		<tr ng-if="vat3!='0'">
		<td align="right" colspan="6"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
		</tr>

		<tr ng-if="vat3!='0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>



<?php
}
?>



<?php
if($_SESSION['owner_vat_status']=='2'){
?>
 <tr ng-if="vat3!='0'">
		<td align="right" colspan="6"><?=$lang_vat?> {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>




		<tr ng-if="vat3!='0'">
		<td align="right" colspan="6"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
		</tr>

		<tr ng-if="vat3!='0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>

<?php
}
?>



		<tr><td align="right" colspan="6"><?php echo $lang_discountlast;?></td>
		<td  style="font-weight: bold;" align="right">-{{discount_last2 | number:2}}</td></tr>
		<tr><td align="right" colspan="6"><?=$lang_sumall?></td>
		<td  style="font-weight: bold;" align="right"><u>{{ParsefloatFunc(sumsale_price)  * (ParsefloatFunc(vat3)/100) + ParsefloatFunc(sumsale_price) -discount_last2 | number:2}}</u></td></tr>
		<tr><td align="right" colspan="6"><?=$lang_getmoney?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer | number:2}}</td></tr>
		<tr><td align="right" colspan="6"><?=$lang_moneychange?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer-(ParsefloatFunc(sumsale_price)  * (ParsefloatFunc(vat3)/100) + ParsefloatFunc(sumsale_price)-discount_last2) | number:2}}</td></tr>


			<?php
if($_SESSION['open_vat_on_slip']=='1'){
?>
 <tr>
		<td align="right" colspan="6">VAT</td>
		<td style="font-weight: bold;" align="right">
		{{price_vat_all | number:2}}</td>
		</tr>


		<tr>
		<td align="right" colspan="6">befor VAT</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-price_vat_all | number:2}}</td>
		</tr>



<?php
}
?>


	</tbody>
</table>


<table style="width: 100%">

	<tbody>
		<tr>
			<td style="width: 50%;">
				<center> <b><?=$lang_payer?></b>
				<br /><br />

				<?=$lang_namezen?>............................................................
				<br />
				<?=$lang_day?> {{adddate}}</center>

			</td>
			<td style="width: 50%;">
				<center><b><?=$lang_geter?></b>
				<br /><br />

				<?=$lang_namezen?>............................................................
				<br />
				<?=$lang_day?> {{adddate}}	</center>

			</td>
		</tr>
	</tbody>
</table>



</div>

			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="Openonesend">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

	<select ng-model="lung" ng-change="Selectlung(lung)" class="form-control" style="font-size: 20px;text-align: center;height: 40px;">
		<option value="1">
		<?=$lang_selectbiga4?>
		</option>
		<option value="2">
		<?=$lang_selectmini?>
		</option>
	</select>
	<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<div class="modal-body" id="section-to-print2">




<table ng-if="lung=='2'" class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td>
	<span style="font-size: 30px;"> <?=$lang_sender?> </span>

<br />
	<span style="font-size: 20px;"><b>	<?php echo $_SESSION['owner_name']; ?> </b>
	<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
</span>

</td>
<td>
			<span style="font-size: 30px;">	<?=$lang_receiver?> </span>
			<br />
	<span style="font-size: 20px;">
<b>{{dataprintsend.cus_name}}</b>
	<br />
<?=$lang_address?>: {{dataprintsend.cus_address_all}}

	</span>
</td>
</tr>
</table>




<table ng-if="lung=='1'" class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td align="center" style="height: 500px;">
	<span style="font-size: 50px;"> <?=$lang_sender?> </span>

<br />
	<span style="font-size: 30px;"><b>	<?php echo $_SESSION['owner_name']; ?> </b>
	<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
</span>

</td>
</tr>
<tr>
			<td align="center" style="height: 500px;">
			<span style="font-size: 60px;">	<?=$lang_receiver?> </span>
			<br />
	<span style="font-size: 30px;">
<b>{{dataprintsend.cus_name}}</b>
	<br />
<?=$lang_address?>: {{dataprintsend.cus_address_all}}

	</span>
</td>
</tr>
</table>




			</div>


			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>










<div class="modal fade" id="Openonemini" style="visibility: hidden;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_billmini?></h4>

			</div> -->
			<div class="modal-body">
			<div  id="openprint2" style="font-size: 12px;">
		<center>

	<?php
if($_SESSION['logoonslip']=='0'){
?>
<center>
<table width="100%">
	<tr>
<td width="100px" align="center">
<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" style="width: 100px;">
</td>
</tr>
</table>
</center>
<?php
}
?>

		<b><span style="font-size: 14px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>
		<!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />

<?php
if($_SESSION['owner_tax_number'] !=''){
 echo $lang_tax.':'.$_SESSION['owner_tax_number'].'<br />';
}
 ?>



<?=$lang_runno?>:{{sale_runno}}
<br />
			---------------------------------
				<br />
<b><?php echo $_SESSION['header_slip'];?></b>

<!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->

<br />
<span ng-if="cus_name != ''">
---------------------------------
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </span>

<span ng-if="product_score_all != '0.00'">
	  <?php echo $lang_sl_8;?>: {{product_score_all | number}}<br />
	  </span>
 <span ng-if="cus_score != '0.00'"><?php echo $lang_sl_9;?>: {{cus_score | number}}</span>
  <br />
 </span>


		---------------------------------
		<br />
	<?=$lang_productservice?>

</center>

<table width="100%">

		<tr ng-repeat="x in listone">

			<td width="70%">{{x.product_sale_num | number}}&nbsp;&nbsp; {{x.product_name}}
				<?php if($_SESSION['show_price_per_one']=='1'){ echo '<br />
				&nbsp;&nbsp;&nbsp;&nbsp;{{x.product_sale_num | number}} {{x.product_unit_name}} X {{x.product_price | number:2}}฿';}?>
				</td>
			<td align="right"  width="30%">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>

			<td><?=$lang_summary?></td>


			<td align="right">{{sumsale_price | number:2}}</td>
		</tr>


<?php
if($_SESSION['owner_vat_status']!='0'){
?>
 <tr>
<td><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
		<td  style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?php echo $_SESSION['owner_vat'];?>/100) | number:2}}</td>
		</tr>


		<tr>
		<td><?=$lang_pricebeforvat?></td>
		<td align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>


<?php } ?>





		<tr ng-if="discount_last2 != '0.00'">

		<td><?php echo $lang_discountlast;?></td>
		<td align="right">-{{discount_last2 | number:2}}</td></tr>

		<tr>

		<td><?=$lang_sumall?></td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td></tr>


		<tr>

		<td><?=$lang_getmoney?></td>
		<td align="right">{{money_from_customer3 | number:2}}</td></tr>
		<tr>

		<td><?=$lang_moneychange?></td>
		<td align="right">{{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}</td></tr>

</table>


		<?php
if($_SESSION['open_vat_on_slip']=='1'){
?>
<center>
	---------------------------------
	</center>
	<table width="100%">

 <tr>
<td>VAT</td>
		<td  style="font-weight: bold;" align="right">
		{{price_vat_all | number:2}}</td>
		</tr>


		<tr>
		<td>befor VAT</td>
		<td align="right">
		{{sumsalevat-price_vat_all | number:2}}</td>
		</tr>

</table>
<?php } ?>


<center>

		---------------------------------
		<br />
<?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
<br />


<?=$lang_day?>: {{adddate}}
<!-- <br />
<img src="<?php echo $base_url;?>/warehouse/barcode/png?barcode={{sale_runno}}" style="height: 70px;width: 160px;"> -->


<br />
<br />
<?=$_SESSION['footer_slip']?>

<br />
___________________________<centter>
</div>

			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" onClick="Openprintdiv2()">
			<?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="Seemorepay">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			
			
			<div class="modal-body">
			
			<center><h2><b>{{sale_runno}}</b></h2> </center>
			
			<table class="table table-hover">
			<tr ng-repeat="x in morepaylist">
				<td>{{x.pay_type_name}}</td>
				<td align="right">{{x.money | number}}</td>
			</tr>
			</table>

			</div>
			<div class="modal-footer">
			
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>
















	</div>


	</div>

	</div>

  </font>
		<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};


$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};





$scope.Seemorepay = function(x){
$http.post("Salelist/Seemorepay",{
	sale_runno: x.sale_runno
}).success(function(response){
$('#Seemorepay').modal('show');
$scope.morepaylist = response;
$scope.sale_runno = x.sale_runno;
        });

};







$scope.Getonemini = function(x){
$http.post("Salelist/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.listone = response;
$scope.cus_name = x.cus_name;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.price_vat_all = x.price_vat_all;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
$scope.number_for_cus = x.number_for_cus;
$scope.product_score_all = x.product_score_all;
$scope.cus_score = x.cus_score;

setTimeout(function(){
Openprintdiv2();
 }, 1000);
 
 
        });

};



$scope.printDivmini2 = function(x){
$('#Openonemini').modal('show');
$('#Openonemini').css('visibility','');

$scope.Getonemini(x);


};





$scope.printDivfullsend = function(x){
$('#Openonesend').modal('show');

$scope.dataprintsend = x;

setTimeout(function(){
$scope.printDiv();
 }, 1000);

};

$scope.lung = '1';
$scope.Selectlung = function(x){
$scope.lung = x;
};





$("#dayfrom").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$("#dayto").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.dayfrom = '<?php echo date('01-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';




$scope.perpage = '100';
$scope.getlist = function(searchtext,page,perpage){
	
$scope.list = false;
	
   if(!searchtext){
   	searchtext = '';
   }


if(searchtext!=''){
   //$scope.dayfrom = '';
   //$scope.dayto='';
   }






    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '100';
   }

   $http.post("Salelist/get",{
searchtext:searchtext,
page: page,
perpage: perpage,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.list = data.list;
$scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });

   };
$scope.getlist('','1');









$scope.getlist_detail = function(){
	
$scope.list_detail = false;
	
   $http.post("Salelist/get_detail",{
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.list_detail = data.list;
        });

   };





$scope.Getone = function(x){
$('#Openone').modal('show');
$http.post("Salelist/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.listone = response;
$scope.cus_name = x.cus_name;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.price_vat_all = x.price_vat_all;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
        });

};



$scope.delname = "<?php echo $_SESSION['name'];?>";
$scope.Deletelist = function(x){
$('#delbut'+ x.ID).prop('disabled',true);
$http.post("Salelist/Deletelist",{
	ID: x.ID,
	sale_runno: x.sale_runno,
	product_score_all: x.product_score_all,
	cus_id: x.cus_id,
	whydel: $scope.whydel,
	delname: $scope.delname
}).success(function(response){
toastr.success('<?=$lang_success?>');
$scope.getlist();
$('#Deletelist_modal').modal('hide');
        });

};


 $scope.Sumnumall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.sumsale_num != null){
	 sumsale_num = item.sumsale_num;
	 }else{
     sumsale_num = 0;
	 }
total += parseFloat(sumsale_num);
 });
    return total;
};




 $scope.Sumpricesaleall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.sumsale_price != null){
	 sumsale_price = item.sumsale_price;
	 }else{
     sumsale_price = 0;
	 }
total += parseFloat(sumsale_price);
 });
    return total;
};



 $scope.Sum_product_score_all = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_score_all != null){
	 product_score_all = item.product_score_all;
	 }else{
     product_score_all = 0;
	 }
total += parseFloat(product_score_all);
 });
    return total;
};






 $scope.Sumvatall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.price_vat_all != null){
	 price_vat_all = item.price_vat_all;
	 }else{
     price_vat_all = 0;
	 }
total += parseFloat(price_vat_all);
 });
    return total;
};





 $scope.Sumdiscountlastall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.discount_last != null){
	 discount_last = item.discount_last;
	 }else{
     discount_last = 0;
	 }
total += parseFloat(discount_last);
 });
    return total;
};



$scope.Deletelist_modal = function(x){

$('#Deletelist_modal').modal('show');
$scope.deletelist_x = x;

};







});
	</script>
	
	
	
	
