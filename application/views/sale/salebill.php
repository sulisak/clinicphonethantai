
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<!--
<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div> -->

<div class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="
<?=$lang_search?> <?php echo $lang_sb_1;?>" ng-change="getlist(searchtext,'1',perpage)" style="width:300px;">
</div>


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

<button class="btn btn-primary" onClick="Openprintdiv1()"><?=$lang_print?></button>
				

<div class="form-group">
<button ng-click="getlist_detail()" class="btn btn-defalut" placeholder="" title="">
<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
<?php echo $lang_sb_2;?>
</button>
</div>


<div class="form-group">
<select ng-model="showall" ng-change="getlist(searchtext,'1',perpage)" class="form-control" style="color:green;">
<option value="0" style="color:red;"><?php echo $lang_sb_3;?></option>
<option value="1" style="color:blue;"><?php echo $lang_sb_4;?></option>
</select>
</div>


<button class="btn btn-warning" ng-click="Opencusmodal()"><?php echo $lang_sb_5;?></button>
				




</div>
<br />


<center ng-if="!list">
	<img src="<?php echo $base_url;?>/pic/loading.gif">
	</center>
	
<div id="openprint1">

<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader" style="font-size: 11px;">
			<th><?=$lang_rank?></th>
			<th><?=$lang_pay?></th>
			<th><?php echo $lang_sb_6;?></th>
			<th><?php echo $lang_sb_7;?></th>
			<th><?=$lang_cusname?></th>



			<th><?=$lang_productnum?></th>
			<th><?=$lang_pricesum?></th>

			<th><?=$lang_discount?></th>
			<th><?=$lang_sumall?></th>


<th><?php echo $lang_sb_8;?></th>
<th><?php echo $lang_sb_9;?></th>


			<th><?=$lang_by?></th>
			<th><?php echo $lang_sb_10;?></th>
			<th><?php echo $lang_sb_11;?></th>
			<th><?php echo $lang_sb_12;?></th>
<th><?php echo $lang_branch;?></th>

			<th  ng-if="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>

			<td>
			<button ng-if="x.money_changeto_customer !='0.00'" class="btn btn-primary btn-sm" ng-click="Paypopup(x)"><?=$lang_pay?></button>
			<span style="color:green;" ng-if="x.money_changeto_customer =='0.00'">
				<?php echo $lang_sb_13;?></span>
			
			
			</td>
			<td>
			<button ng-if="x.money_from_customer !='0.00'" class="btn btn-info btn-sm" ng-click="Listpayed(x)">
			<span class="glyphicon glyphicon-list"></span>
			</button>
			
			</td>
			<td>



				<button class="btn btn-default btn-sm" ng-click="Getone(x,'0')">{{x.sale_runno}}</button>



<button class="btn btn-default btn-sm" ng-click="Getone(x,'a4')"><?php echo $lang_sb_14;?></button>
<button class="btn btn-default btn-sm" ng-click="Getone(x,'slip')"><?php echo $lang_sb_15;?></button>

</td>



			<td>{{x.cus_name}}</td>


			<td  align="right">{{x.sumsale_num | number}}
			
			<table ng-if="list_detail" style="width:100%;font-size:12px">
<tr class="trheader"><td><?php echo $lang_productname;?></td>
	<td><?php echo $lang_price;?></td><td><?php echo $lang_discount;?></td>
	<td><?php echo $lang_qty;?></td><td><?php echo $lang_all;?></td></tr>
<tr ng-repeat="y in list_detail" ng-if="x.sale_runno==y.sale_runno"><td>{{y.product_name}}</td>
<td align="right">{{y.product_price | number}}</td><td align="right">{{y.product_price_discount | number}}</td>
<td align="right">{{y.product_sale_num | number}}</td>
<td align="right">{{(y.product_price-y.product_price_discount)*y.product_sale_num | number}}</td></tr>		
</table>
			
			</td>
			<td  align="right">{{x.sumsale_price | number:2}}</td>



			<td  align="right">{{x.discount_last | number:2}}</td>
			<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}</td>



<td style="color: red;"  align="right">
<span style="color:green;" ng-if="x.money_changeto_customer =='0.00'">{{x.money_from_customer | number:2}}</span>
			<span ng-if="x.money_changeto_customer !='0.00'">{{x.money_from_customer | number:2}}</span>

			</td>


			<td style="color: red;font-weight:bold; "  align="right">
			<span style="color:green;" ng-if="x.money_changeto_customer =='0.00'">{{x.money_changeto_customer | number:2}}</span>
			<span ng-if="x.money_changeto_customer !='0.00'">{{x.money_changeto_customer | number:2}}</span>

			</td>

<td>{{x.name}}</td>
			<td>{{x.adddate}}</td>
			<td>{{x.credit_day | number}}</td>
			<td>{{x.date_for_pay}}<br />
				
						
			<div ng-if="x.money_changeto_customer !='0.00'">  
		<span style="color:orange;font-weight:bold;" ng-if="(x.date_for_pay_timestamp-timenow)/86400 > '1'">
	<?php echo $lang_sb_16;?>	{{(x.date_for_pay_timestamp-timenow)/86400 | number:0}}  <?php echo $lang_date;?>
		</span>
		<span style="color:blue;font-weight:bold;" ng-if="x.date_for_pay== datenow && (x.date_for_pay_timestamp-timenow)/86400 > '-0'">	
<?php echo $lang_sb_17;?>
</span>
<span style="color:red;font-weight:bold;" ng-if="(x.date_for_pay_timestamp-timenow)/86400 < '-0'">	
<?php echo $lang_sb_18;?> {{(x.date_for_pay_timestamp-timenow)/86400 | number:0}} <?php echo $lang_date;?>
</span>
					
		  </div>
		
			</td>
			
			
			<td>{{x.branch_name}}<br />
			
			
			
			
			<td ng-if="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" ng-click="Deletelist(x)" id="delbut{{x.ID}}">
			<?=$lang_delete?></button></td>
		</tr>
		
		
		<tr>
		<td colspan="5" align="right"><b><?php echo $lang_all;?></b></td>
		<td align="right"><b>{{Sumnumall() | number}}</b></td>
		<td align="right"><b>{{Sumpricesaleall() | number:2}}</b></td>
		<td align="right"><b>{{Sumdiscountlastall() | number:2}}</b></td>
		<td align="right"><b>{{Sumpricesaleall()-Sumdiscountlastall() | number:2}}</b></td>
		<td align="right" style="color: red;"><b>{{Summoney_from_customerall() | number:2}}</b></td>
		<td align="right" style="color: red;font-weight:bold; "><b>{{Summoney_changeto_customerall() | number:2}}</b></td>
		
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




<div class="modal fade" id="Openone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">


<div class="modal-header">

<button class="btn btn-primary" onClick="Openprintdiv2()"><?=$lang_print?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


			</div>
			
			
			<div class="modal-body" id="openprint2">
	<center>
			<span style="font-size: 35px;font-weight: bold;">
				<?php echo $lang_sb_19;?></span>
		</center>
<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
		<td>
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?php if($_SESSION['owner_tax_number']!=''){
	echo $lang_tax?>:<?php echo $_SESSION['owner_tax_number']; 
}
	?>

</td>
</tr>
<tr>
			<td colspan="2">
	<?=$lang_runno?>:{{sale_runno}} , <?=$lang_cusname?>: {{cus_name}}	, <?=$lang_address?>: {{cus_address_all}}
</td>
</tr>
</table>

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:10px;"></th>
			<th style="width:300px;"><?=$lang_productname?></th>
			<th style="width:100px;"><?php echo $lang_detail;?></th>
			<th style="width:100px;"><?=$lang_saleprice?></th>
			<th style="width:100px;"><?=$lang_discountperunit?></th>
			<th style="width:100px;"><?=$lang_qty?></th>
			<th style="width:100px;"><?=$lang_priceall?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td align="center" style="width:10px;">{{$index+1}}</td>
			<td style="width:300px;">{{x.product_name}} ({{x.product_code}})</td>
			<td style="width:300px;">{{x.product_des}}</td>
			<td align="right" style="width:50px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width:50px;">{{x.product_price_discount | number:2}}</td>
			<td align="right" style="width:5px;">{{x.product_sale_num | number}}</td>
			<td align="right" style="width:50px;">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="5"  align="right" style="font-weight: bold;">
			<?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;"><u>{{sumsale_price | number:2}}</u></td>
		</tr>


<!-- <tr ng-if="vat3 > '0'">
		<td align="right" colspan="6">VAT {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>


<tr ng-if="vat3 > '0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->



<?php
if($_SESSION['owner_vat']!='0'){
?>
 <tr>
		<td align="right" colspan="6"><?=$lang_vat?> <?=$_SESSION['owner_vat']?>%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>) | number:2}}</td>
		</tr>

		<tr>
		<td align="right" colspan="6"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>
<?php } ?>




		<tr><td align="right" colspan="6"><?=$lang_discount?></td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr><td align="right" colspan="6"><?php echo $lang_all;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{sumsalevat-discount_last2 | number:2}}</u></td></tr>

		<tr><td align="right" colspan="6"><?php echo $lang_sb_20;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{money_changeto_customer | number:2}}</u></td></tr>


	</tbody>
</table>





			</div>


			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="Openone_a4">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">


<div class="modal-header">

<button class="btn btn-primary" onClick="Printmodal1()"><?=$lang_print?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


			</div>
			
			
			<div class="modal-body" id="printmodal1">
	<center>
			<span style="font-size: 35px;font-weight: bold;"><?php echo $lang_sb_21;?></span>
		</center>
<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
		<td>
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?php if($_SESSION['owner_tax_number']!=''){
	echo $lang_tax?>:<?php echo $_SESSION['owner_tax_number']; 
}
	?>

</td>
</tr>
<tr>
			<td colspan="2">
	<?=$lang_runno?>:{{sale_runno}} , <?=$lang_cusname?>: {{cus_name}}	, <?=$lang_address?>: {{cus_address_all}}
</td>
</tr>
</table>

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:10px;"></th>
			<th style="width:300px;"><?=$lang_productname?></th>
			<th style="width:100px;"><?php echo $lang_detail;?></th>
			<th style="width:100px;"><?=$lang_saleprice?></th>
			<th style="width:100px;"><?=$lang_discountperunit?></th>
			<th style="width:100px;"><?=$lang_qty?></th>
			<th style="width:100px;"><?=$lang_priceall?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td align="center" style="width:10px;">{{$index+1}}</td>
			<td style="width:300px;">{{x.product_name}} ({{x.product_code}})</td>
			<td style="width:300px;">{{x.product_des}}</td>
			<td align="right" style="width:50px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width:50px;">{{x.product_price_discount | number:2}}</td>
			<td align="right" style="width:5px;">{{x.product_sale_num | number}}</td>
			<td align="right" style="width:50px;">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="5"  align="right" style="font-weight: bold;">
			<?php echo $lang_sb_22;?></td>

			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;"><u>{{sumsale_price | number:2}}</u></td>
		</tr>


<!-- <tr ng-if="vat3 > '0'">
		<td align="right" colspan="6">VAT {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>


<tr ng-if="vat3 > '0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->



<?php
if($_SESSION['owner_vat']!='0'){
?>
 <tr>
		<td align="right" colspan="6"><?=$lang_vat?> <?=$_SESSION['owner_vat']?>%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>) | number:2}}</td>
		</tr>

		<tr>
		<td align="right" colspan="6"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>
<?php } ?>




		<tr ng-if="discount_last2 !='0.00'"><td align="right" colspan="6"><?=$lang_discount?></td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr ng-if="discount_last2 !='0.00'" style="font-weight: bold;"><td align="right" colspan="6">
		<?php echo $lang_sb_23;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{sumsalevat-discount_last2 | number:2}}</u></td></tr>

<tr><td align="right" colspan="6"><?php echo $lang_sb_24;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{money_from_customer3 | number:2}}</u></td></tr>


		<tr><td align="right" colspan="6"><?php echo $lang_sb_25;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{money_changeto_customer | number:2}}</u></td></tr>


	</tbody>
</table>

<center>

<?php echo $lang_sb_26;?> <?php echo date('d-m-Y H:i:s');?>


</center>

			</div>


			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>












<div class="modal fade" id="Openone_slip">
	<div class="modal-dialog">
		<div class="modal-content">


<div class="modal-header">

<button class="btn btn-primary" onClick="Printmodal2()"><?=$lang_print?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


			</div>
			
			
			<div class="modal-body" id="printmodal2">
	<center>

<?php
if($_SESSION['owner_logo']!=''){
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
<?php if($_SESSION['owner_tax_number']!=''){
	echo $lang_tax?>:<?php echo $_SESSION['owner_tax_number']; 
	echo '<br />';
}
	?>


			---------------------------------
		
<h4><b><?php echo $lang_sb_27;?> {{sale_runno}}</b></h4>
<h3>	<?php echo $lang_sb_28;?> <br /><b> {{money_changeto_customer | number:2}}</b> </h3>

<span ng-if="cus_name != null">
---------------------------------
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </span>
		---------------------------------
		<br />
	<?=$lang_productservice?>

</center>

<table  width="100%">

		<tr ng-repeat="x in listone">
			<td style="width:70%;">
				
				<?php if($_SESSION['show_price_per_one']!='1'){ ?>
			{{x.product_sale_num | number}}&nbsp;&nbsp;
			<?php } ?>
			
			{{x.product_name}}
			
			<?php if($_SESSION['show_price_per_one']=='1'){ ?>
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;
				{{x.product_sale_num | number}} {{x.product_unit_name}} X {{x.product_price | number:<?php echo $_SESSION['decimal_print']; ?>}}
				
				<?php } ?>
				
			</td>
			<td align="right" style="width:50px;">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td  align="right" style="font-weight: bold;">
			<?php echo $lang_sb_22;?></td>

			
			<td align="right" style="font-weight: bold;"><u>{{sumsale_price | number:2}}</u></td>
		</tr>



		<tr ng-if="discount_last2 !='0.00'"><td align="right"><?=$lang_discount?></td>
		<td style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr ng-if="discount_last2 !='0.00'" style="font-weight: bold;"><td align="right">
			<?php echo $lang_sb_23;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{sumsalevat-discount_last2 | number:2}}</u></td></tr>

<tr><td align="right"><?php echo $lang_sb_24;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{money_from_customer3 | number:2}}</u></td></tr>


	

	</tbody>
</table>

<center>
---------------------------------
<br />
<?php echo $lang_sb_26;?> <?php echo date('d-m-Y H:i:s');?>


</center>

			</div>


			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>





















<div class="modal fade" id="Opencus">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">


<div class="modal-header">
			<button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">Close</button>

<center><h2><b><?php echo $lang_sb_29;?></b></h2></center>
			</div>
			
			
			<div class="modal-body">

<input class="form-control" ng-change="Opencusfind()" placeholder="<?php echo $lang_search;?>" 
ng-model="searchcusname" style="width:200px;">

<center ng-if="!listcusname">
	<img src="<?php echo $base_url;?>/pic/loading.gif">
	</center>
	
	<br />
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?php echo $lang_sb_30;?></th>
			<th><?php echo $lang_sb_31;?></th>
			<th><?php echo $lang_sb_32;?></th>
			<th><?php echo $lang_sb_33;?></th>
			<th><?php echo $lang_sb_34;?></th>
			
		</tr>
	</thead>
	<tbody>
	<tr ng-repeat="x in listcusname" style="font-size:20px;">
<td width="50px" align="center">
<button class="btn btn-primary btn-lg" ng-click="Openprintbycus(x)"><?php echo $lang_sb_35;?></button>
</td>

<td style="color:red;font-weight:bold;">
{{x.money_changeto_customer}}
</td>


<td>
{{x.cus_name}}
</td>

<td>
{{x.cus_address_all}}
</td>

<td width="50px" align="center">
<button class="btn btn-warning btn-lg" ng-click="Openprintbycus(x,'1')">
<?php echo $lang_sb_36;?></button>
</td>

</tr>
	</tbody>
</table>




			</div>


			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>















<div class="modal fade" id="Openone_slip_bycus">
	<div class="modal-dialog">
		<div class="modal-content">


<div class="modal-header">

<button class="btn btn-primary" onClick="Printmodal3()"><?=$lang_print?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


<span ng-show="paymore=='1'">
<center><h3><b><?php echo $lang_sb_37;?></b></h3>
<input type="text" onkeypress="validate(event)" id="paymoneymore" name="" value="" ng-model="paymoneymore" placeholder="จำนวนเงินที่ชำระ" 
  class="form-control"
style="text-align: center;width: 250px;font-size: 26px;height: 50px;background-color: #ffa50069;">
<br />
<button 
ng-if="paymoneymore!='' && Funcfloat(money_changeto_customer)+Funcfloat(paymoneymore)>money_changeto_customer 
&& Funcfloat(money_changeto_customer)+Funcfloat(paymoneymore)<='0'" 
class="btn btn-success btn-lg" ng-click="Payallbill()" ng-disabled="payallbillconfirm=='1'">
	<?php echo $lang_sb_38;?></button>


</center>
</span>

			</div>
			
			
			<div class="modal-body" id="printmodal3">
	<center>

<?php
if($_SESSION['owner_logo']!=''){
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

<?php if($_SESSION['owner_tax_number']!=''){
	echo $lang_tax?>:<?php echo $_SESSION['owner_tax_number']; 
	echo '<br />';
}
	?>


			---------------------------------
		
<h4 ng-if="paymore=='0'"><b><?php echo $lang_sb_39;?>
	<br /><?php echo $lang_sb_40;?></b></h4>
	
	<h3 ng-if="paymore=='1'"><b><?php echo $lang_sb_41;?></b>
	</h3>
	
	
<h3>	<?php echo $lang_sb_42;?> <br /><b style="color:red;"> {{money_changeto_customer | number:2}}</b> </h3>

<span ng-if="paymore=='1'">
<center><h3><b><?php echo $lang_sb_43;?>
	<br />
{{paymoneymore}}

</b></h3></center>
</span>


	

<span ng-if="paymore=='1'">
<center><h3><b><?php echo $lang_sb_44;?>
<br />{{Funcfloat(money_changeto_customer)+Funcfloat(paymoneymore) | number:2}}
</b></h3></center>


</span>

<span ng-if="cus_name != null">
---------------------------------
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </span>
		---------------------------------
		<br />
	<input type="checkbox" ng-model="showproduct" ng-init="showproduct=true"><?=$lang_productservice?>

</center>


<center ng-if="!listone_bycus">
	<img src="<?php echo $base_url;?>/pic/loading.gif">
	</center>
	
	
<table  width="100%" ng-if="showproduct">

		<tr ng-repeat="x in listone_bycus">
			<td style="width:70%;">
				
				<?php if($_SESSION['show_price_per_one']!='1'){ ?>
			{{x.sum_product_sale_num | number}}&nbsp;&nbsp;
			<?php } ?>
			
			{{x.product_name}}
			
			<?php if($_SESSION['show_price_per_one']=='1'){ ?>
				<br />
				&nbsp;&nbsp;&nbsp;&nbsp;
				{{x.product_sale_num | number}} {{x.product_unit_name}} X {{x.product_price | number:<?php echo $_SESSION['decimal_print']; ?>}}
				
				<?php } ?>
				
			</td>
			<td align="right" style="width:50px;">{{x.sum_product_price | number:2}}</td>
		</tr>
		



	

	

	</tbody>
</table>


<table class="table table-hover">
	<tr>
			<td  align="right" style="font-weight: bold;">
			<?php echo $lang_sb_22;?></td>

			
			<td align="right" style="font-weight: bold;"><u>{{sumsale_price | number:2}}</u></td>
		</tr>
		<tr ng-if="discount_last2 !='0.00'"><td align="right"><?=$lang_discount?></td>
		<td style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr ng-if="discount_last2 !='0.00'"  style="font-weight: bold;"><td align="right">
		<?php echo $lang_sb_23;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{sumsalevat-discount_last2 | number:2}}</u></td></tr>

<tr><td align="right"><?php echo $lang_sb_24;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{money_from_customer3 | number:2}}</u></td></tr>

	</table>


<center>
---------------------------------
<br />
<?php echo $lang_sb_45;?> <?php echo date('d-m-Y H:i:s');?>


</center>

			</div>


			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="Openone2">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-body" id="section-to-print2">
	<center>
			<span style="font-size: 35px;font-weight: bold;"><?php echo $lang_sb_46;?></span>
		</center>
<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
		<td>
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?php if($_SESSION['owner_tax_number']!=''){
	echo $lang_tax?>:<?php echo $_SESSION['owner_tax_number']; 
}
	?>

</td>
</tr>
<tr>
			<td colspan="2">
	<?=$lang_runno?>:{{sale_runno}} , <?=$lang_cusname?>: {{cus_name}}	, <?=$lang_address?>: {{cus_address_all}}
</td>
</tr>
</table>

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:10px;"></th>
			<th style="width:300px;"><?=$lang_productname?></th>
			<th style="width:100px;"><?php echo $lang_detail;?></th>
			<th style="width:100px;"><?=$lang_saleprice?></th>
			<th style="width:100px;"><?=$lang_discountperunit?></th>
			<th style="width:100px;"><?=$lang_qty?></th>
			<th style="width:100px;"><?=$lang_priceall?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td align="center" style="width:10px;">{{$index+1}}</td>
			<td style="width:300px;">{{x.product_name}} ({{x.product_code}})</td>
			<td style="width:300px;">{{x.product_des}}</td>
			<td align="right" style="width:50px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width:50px;">{{x.product_price_discount | number:2}}</td>
			<td align="right" style="width:5px;">{{x.product_sale_num | number}}</td>
			<td align="right" style="width:50px;">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="5"  align="right" style="font-weight: bold;">
			<?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;"><u>{{sumsale_price | number:2}}</u></td>
		</tr>


<!-- <tr ng-if="vat3 > '0'">
		<td align="right" colspan="6">VAT {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>


<tr ng-if="vat3 > '0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->



<?php
if($_SESSION['owner_vat']!='0'){
?>
 <tr>
		<td align="right" colspan="6"><?=$lang_vat?> <?=$_SESSION['owner_vat']?>%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>) | number:2}}</td>
		</tr>

		<tr>
		<td align="right" colspan="6"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>
<?php } ?>




		<tr><td align="right" colspan="6"><?=$lang_discount?></td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr><td align="right" colspan="6"><?php echo $lang_all;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{sumsalevat-discount_last2 | number:2}}</u></td></tr>

		<tr><td align="right" colspan="6"><?php echo $lang_sb_47;?></td>
		<td  style="font-weight: bold;" align="right"><u>{{money_changeto_customer*-1 | number:2}}</u></td></tr>


	</tbody>
</table>

<table style="width: 100%">

	<tbody>
		<tr>
			<td style="width: 50%;">
				<center> <b><?php echo $lang_sb_48;?></b>
				<br /><br />

				<?php echo $lang_sb_49;?>
				<br />
				<?php echo $lang_sb_50;?> <?php echo date('d/m/Y',time()); ?></center>

			</td>
			<td style="width: 50%;">
				<center><b><?php echo $lang_sb_51;?></b>
				<br /><br />

				<?php echo $lang_sb_49;?>
				<br />
				<?php echo $lang_sb_50;?> <?php echo date('d/m/Y',time()); ?>	</center>

			</td>
		</tr>
	</tbody>
</table>



			</div>


			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="paypopup">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_pay?> </h4>
			</div>
			<div class="modal-body">
				<center>
				
			<h2><?php echo $lang_sb_52;?>:<b>	{{dataall.cus_name}} </b>
			<br />
			<?php echo $lang_sb_53;?>:  {{dataall.sale_runno}}
			</h2>
				<br />
				<?=$lang_oksumall?>
				<br /> <span style="color: red;font-weight: bold;font-size: 40px;">{{dataall.money_changeto_customer | number:2}}
				</span>
<br />

<select class="form-control" ng-model="pay_type" style="font-size:30px;font-weight:bold;width:200px;height: 60px;">
<option value="1"><?php echo $lang_sb_54;?></option>
<option value="2"><?php echo $lang_sb_55;?></option>
</select>
<br />

				<input type="hidden" id="money_from_customer_id" ng-model="money_from_customer_x" class="form-control" style="text-align: right;width: 150px;font-size: 26px;height: 50px;background-color: #dff0d8;">

		<input placeholder="<?php echo $lang_sb_56;?>" type="number" ng-model="pay_money" class="form-control" style="text-align: right;width: 250px;font-size: 26px;height: 50px;background-color: #ffa50069;">
<br />
		<input placeholder="<?php echo $lang_sb_57;?>" id="pay_date" type="text" ng-model="pay_date" class="form-control" style="text-align: right;width: 350px;font-size: 26px;height: 50px;background-color: #dff0d8;">

<br />

<textarea class="form-control" ng-model="des" placeholder="<?php echo $lang_sb_58;?>"></textarea>
<br />

				<button ng-if="pay_money !='' && pay_date !='' && showbb" type="button" class="btn btn-success btn-lg" ng-click="Savebill(dataall)"><?=$lang_getmoney?></button>
				</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="listpayed">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
				
				<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
				
				</h4>
			</div>
			<div class="modal-body" id="openprint_table">
				<center>
			<h2><b><?php echo $_SESSION['owner_name']; ?></b></h2>	
			<h2><?php echo $lang_sb_52;?>:<b>	{{listpp.cus_name}} </b>
			<br />
			<?php echo $lang_sb_53;?>:  {{listpp.sale_runno}}
			</h2>
			
				--------------
				<br />
			<?php echo $lang_sb_59;?>
			<br />
			<span style="color: blue;font-weight: bold;font-size: 20px;">{{listpp.sumsale_price | number:2}}
				</span>
				<br />
				--------------
				<br />
				<?=$lang_oksumall?>
				<br /> <span style="color: red;font-weight: bold;font-size: 20px;">{{listpp.money_changeto_customer | number:2}}
				</span>
				<br />
				--------------
<br />
<?php echo $lang_sb_60;?>		</center>


<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:10px;"><?php echo $lang_sb_61;?></th>
			<th style="width:100px;"><?php echo $lang_sb_62;?></th>
			<th style="width:100px;font-size:12px;"><?php echo $lang_sb_63;?></th>
			<th style="width:100px;"><?php echo $lang_sb_64;?></th>
			<th style="width:100px;"><?php echo $lang_sb_65;?></th>
			<th style="width:100px;"><?php echo $lang_sb_66;?></th>
			<th style="width:100px;"><?php echo $lang_sb_67;?></th>
		</tr>
	</thead>
	<tbody>
<tr ng-repeat="x in listppdata">
<td align="center">{{$index+1}}</td>
<td align="right" style="font-weight:bold;">{{x.pay_money | number}}</td>
<td>{{x.pay_date}}</td>
<td>
<span ng-if="x.pay_type=='1'"><?php echo $lang_sb_54;?></span>
<span ng-if="x.pay_type=='2'"><?php echo $lang_sb_55;?></span>
</td>
<td>{{x.des}}</td>
<td>{{x.name}}</td>
<td>{{x.adddate}}</td>


</tr>

<tr>
<td align="right" style="font-weight:bold;"><?php echo $lang_all;?></td>
<td align="right" style="font-weight:bold;">{{Sum_pay_money() | number}}</td>
</tr>
</tbody>

</table>




			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="Openonemini">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_billmini?></h4>

			</div> -->
			<button class="btn btn-primary" onClick="Openprintdiv_mini()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			<div class="modal-body">
			<div  id="section-to-print-mini" style="font-size: 12px;">
		<center>

<?php
if($_SESSION['owner_logo']!=''){
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
<?php if($_SESSION['owner_tax_number']!=''){
	echo $lang_tax?>:<?php echo $_SESSION['owner_tax_number']; 
	echo '<br />';
}
	?>

<?=$lang_runno?>:{{sale_runno}}
<br />
			---------------------------------
				<br />
<?php echo $lang_sb_68;?>
<br />
<h3><b><?php echo $lang_sb_61;?> {{numnum | number}}</b></h3>
<!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->

<br />
<span ng-if="cus_name != null">
---------------------------------
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </span>
		---------------------------------
		<br />
	<?=$lang_productservice?>

</center>

<table width="95%">

		<tr ng-repeat="x in listone">

			<td width="70%">{{x.product_sale_num | number}} {{x.product_name}}</td>
			<td align="right"  width="30%">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>

			<td><?=$lang_summary?></td>


			<td align="right">{{sumsale_price | number:2}}</td>
		</tr>


<?php
if($_SESSION['owner_vat']!='0'){
?>
 <tr>
<td><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>


		<tr>
		<td><?=$lang_pricebeforvat?></td>
		<td align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>
<?php } ?>





		<tr>

		<td><?=$lang_discount?></td>
		<td align="right">{{discount_last2 | number:2}}</td></tr>

		<tr>

		<td><?=$lang_sumall?></td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td></tr>


<tr>

			<td colspan="2">
			<center>---------------------------------</center>
			</td>
			</tr>

<tr>

		<tr>

			<td><?php echo $lang_sb_69;?></td>
			<td align="right"><b>{{dataall.money_changeto_customer | number:2 }}</b></td></tr>

<tr>
		<td><?php echo $lang_sb_70;?></td>
		<td align="right"><b>{{pay_money | number:2 }}</b></td></tr>

<tr>
		<td><?php echo $lang_sb_71;?></td>
		<td align="right"><b>{{ParsefloatFunc(pay_money)+ParsefloatFunc(dataall.money_changeto_customer) | number:2 }}</b></td></tr>

<tr>
		<td><?php echo $lang_sb_72;?></td>
		<td align="right"><b>{{ParsefloatFunc(dataall.money_from_customer)+ParsefloatFunc(pay_money) | number:2 }}</b></td></tr>


</table>
<br />

<center>
<br />
		---------------------------------
		<br />
<?php echo $lang_sb_73;?>: <?php echo $_SESSION['name']; ?>
<br />


<?=$lang_day?>: <?php echo date('d/m/Y H:i:s',time()); ?>
<!-- <br />
<img src="<?php echo $base_url;?>/warehouse/barcode/png?barcode={{sale_runno}}" style="height: 70px;width: 160px;"> -->


</center>
<br />
<br />
<center>___________________________<centter>
</div>

			</div>
			<div class="modal-footer">
			
			</div>
		</div>
	</div>
</div>















	</div>


	</div>

	</div>


		<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.money_from_customer_x = '1';
$scope.pay_type = '1';

	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};


$scope.timenow = '<?php echo time();?>';
$scope.datenow = '<?php echo date("d-m-Y",time());?>';

$("#pay_date").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y H:i',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});




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

$scope.showall = '0';



$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};

$scope.printDivfull = function(){
$('#Openone').modal('show');
$scope.Getone($scope.dataall);
};


$scope.printDivmini = function(){
$('#Openone2').modal('show');
$scope.Getonemini($scope.dataall);
setTimeout(function(){
$scope.printDiv();
 }, 1000);

};



$scope.printDivmini2 = function(){
$('#Openonemini').modal('show');

$scope.Getonemini($scope.dataall);
setTimeout(function(){
Openprintdiv_mini();
 }, 1000);

};





$scope.Listpayed = function(x){
	$('#listpayed').modal('show');
$scope.listpp = x;

  $http.post("Salebill/listpayed",{
sale_runno: x.sale_runno
}).success(function(data){
$scope.listppdata = data;
});

}



$scope.searchcusname = '';
$scope.Opencusfind = function(){
	$scope.listcusname = false;
  $http.post("Salebill/Opencusfind",{
searchcusname: $scope.searchcusname
}).success(function(data){
$scope.listcusname = data;
});

}



$scope.Opencusmodal = function(){
	$('#Opencus').modal('show');
$scope.Opencusfind();
}













$scope.Paypopup = function(x){
	$('#paypopup').modal('show');
$scope.dataall = x;
$scope.pay_money = '';
$scope.pay_date = '';
$scope.des = '';
$scope.pay_type = '1';
}


$scope.showbb = true;
$scope.Savebill = function(dataall){
	var mcc = $scope.ParsefloatFunc($scope.dataall.money_changeto_customer);
	var pm = $scope.ParsefloatFunc($scope.pay_money);
	var checkc2mbill = pm+mcc;
	console.log(checkc2mbill);
	if(checkc2mbill > 0 || pm < 0){
toastr.warning('<?php echo $lang_sb_74;?>');
	}else{
$scope.showbb = false;
  $http.post("Salebill/billsalesave",{
money_from_customer: dataall.money_from_customer,
ID:dataall.ID,
money_changeto_customer: dataall.money_changeto_customer,
pay_type: $scope.pay_type,
pay_money: $scope.pay_money,
pay_date: $scope.pay_date,
des: $scope.des,
cus_id: dataall.cus_id,
cus_name: dataall.cus_name,
sale_runno: dataall.sale_runno

}).success(function(data){
$scope.numnum = data[0].num;
$scope.printDivmini2();
toastr.success('success');
$scope.getlist('','1');
$('#paypopup').modal('hide');
$scope.showbb = true;
});



	}

}

$scope.searchtext= '';

$scope.perpage = '10';
$scope.page = '1';
$scope.getlist = function(searchtext,page,perpage){
   if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }
$scope.list = false;
   $http.post("Salebill/get",{
searchtext:$scope.searchtext,
page: $scope.page,
perpage: $scope.perpage,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto,
showall: $scope.showall
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





$scope.Getone = function(x,y){
	if(y=='0'){
$('#Openone').modal('show');
	}
	
	if(y=='a4'){
$('#Openone_a4').modal('show');
	}
	
	if(y=='slip'){
$('#Openone_slip').modal('show');
	}
	
	
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
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
        });

};















$scope.Openprintbycus = function(x,y){
	$scope.paymoneymore = '';
	if(y=='1'){
		$scope.paymore = '1';
		}else{
		$scope.paymore = '0';
		}
	$scope.listone_bycus = false;
$('#Openone_slip_bycus').modal('show');
$http.post("Salebill/Getallbycus",{
	cus_id: x.cus_id
}).success(function(response){
$scope.listone_bycus = response;
$scope.cus_name = x.cus_name;
$scope.cus_id = x.cus_id;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;

        });

};



$scope.payallbillconfirm = '0';
$scope.paymoneymore = '';

$scope.Payallbill = function(){
$scope.payallbillconfirm = '1';	

$http.post("Salebill/Payallbill",{
	cus_id: $scope.cus_id,
	paymoneymore: $scope.paymoneymore
}).success(function(response){
$('#Openone_slip_bycus').modal('hide');
toastr.success('<?php echo $lang_success;?>');
$scope.getlist();
$scope.Opencusfind();
$scope.paymoneymore = '';
$scope.payallbillconfirm = '0';
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
$scope.money_from_customer3 = $scope.money_from_customer_x;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer*-1;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
        });

};

$scope.Deletelist = function(x){
$('#delbut'+ x.ID).prop('disabled',true);
$http.post("Salebill/Deletelist",{
	ID: x.ID,
	sale_runno: x.sale_runno
}).success(function(response){
$scope.getlist();
        });

};



$scope.getlist_detail = function(){
	
$scope.list_detail = false;
	
   $http.post("Salebill/get_detail_salebill",{
searchtext: $scope.searchtext,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.list_detail = data.list;
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


 $scope.Summoney_from_customerall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.money_from_customer != null){
	 money_from_customer = item.money_from_customer;
	 }else{
     money_from_customer = 0;
	 }
total += parseFloat(money_from_customer);
 });
    return total;
};



 $scope.Summoney_changeto_customerall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.money_changeto_customer != null){
	 money_changeto_customer = item.money_changeto_customer;
	 }else{
     money_changeto_customer = 0;
	 }
total += parseFloat(money_changeto_customer);
 });
    return total;
};



 $scope.Sum_pay_money = function(){
var total = 0;

 angular.forEach($scope.listppdata,function(item){
	 if(item.pay_money != null){
	 pay_money = item.pay_money;
	 }else{
	 pay_money = 0;
	 }
	 
	 if(pay_money == ''){
     pay_money = 0;
	 }
	 
total += parseFloat(pay_money);
 });
    return total;
};




 $scope.Funcfloat = function(x){
    return parseFloat(x);
};










});



function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


	</script>
