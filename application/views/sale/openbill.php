
<div class="col-md-12 col-sm-12 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	


<form class="form-inline" style="float: left;">
 <div class="form-group">				
<input type="text" id="customer_name" ng-model="customer_name" class="form-control" placeholder="<?=$lang_cusname?>" style="height: 45px;width: 250px;font-size: 20px;" readonly="">
</div>
<div class="form-group">
<button type="submit" ng-click="Opencustomer()" class="btn btn-success btn-lg" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div> 

<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<input type="text" id="cus_address_all" ng-model="cus_address_all" class="form-control" placeholder="ที่อยู่" style="height: 45px;font-size: 16px;width: 600px;">
</div> -->

<div class="form-group">
<select class="form-control" ng-model="sale_type"  style="height: 45px;width: 150px;font-size: 20px;">
	<option value="1">
		<?=$lang_retail?>
	</option>
	<option value="2">
		<?=$lang_wholesale?>
	</option>
</select>
</div>

<div class="form-group">
<select class="form-control" ng-model="pay_type" style="height: 45px;width: 150px;font-size: 20px;">
	<option value="4">
		<?=$lang_owe?>
	</option>
</select>
</div>


</form>

<input type="hidden" name="" ng-model="customer_id">

	
			<form class="form-inline" style="float: right;">
			
<div class="form-group">
				<input type="text" class="form-control" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 350px;background-color:#dff0d8;" placeholder="<?=$lang_searchproductnameorscan?>">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg"><?=$lang_enter?></button>
				</div>
				<br />
				<span class="form-group" ng-show="cannotfindproduct" style="color: red;">
					<?=$lang_cannotfoundproduct?>
				</span>
				</form>


<br /><br /><br />

<div class="panel panel-default">
	<div class="panel-body ">



<div style="height: 350px;overflow: auto;">
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 50px;"><?=$lang_rank?></th>
			
			<th style="text-align: center;width: 250px;">
			<?=$lang_productname?></th>
			<th style="text-align: center;width: 100px;">
			<?=$lang_barcode?></th>
			<th style="text-align: center;width: 150px;">
			<?=$lang_saleprice?></th>
			
			<th width="100px;" style="text-align: center;width: 100px;">
			<?=$lang_discountperunit?></th>
			<th style="text-align: center;width: 80px;"><?=$lang_qty?></th>
			<th style="text-align: center;width: 80px;"><?=$lang_priceall?></th>
			<th style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listsale" style="font-size: 20px;">
			<td  style="width: 50px;" align="center">{{$index+1}}</td>
			
			<td style="width: 250px;">

{{x.product_name}}
 

<input type="hidden" ng-model="x.product_id">
			
			</td>
<td align="center" style="width: 100px;">{{ x.product_code }}</td>
			

			<td align="right" style="width: 150px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width: 100px;"><input type="" placeholder="<?=$lang_discount?>" class="form-control" ng-model="x.product_price_discount" style="text-align: right;"></td>
			<td align="right" style="width: 80px;"><input type="" placeholder="<?=$lang_qty?>" class="form-control" ng-model="x.product_sale_num" style="text-align: right;width: 80px;"></td>
			
			<td style="width: 50px;" align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}</td>
			<td><button class="btn btn-danger" ng-click="Deletepush($index)">ลบ</button></td>
		</tr>
		

		


		<tr style="font-size: 20px;">
		<td colspan="5" align="right"><?=$lang_summary?></td>
		
			<td align="right" style="font-weight: bold;">{{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;">{{Sumsaleprice() | number:2 }}</td>
<td></td>
		</tr>


<tr style="font-size: 20px;">
		<td colspan="8" align="right">
<input type="checkbox" ng-model="addvat" ng-change="Addvatcontrol()">
		<?=$lang_addvat?></td>
			
		</tr>


		<tr style="font-size: 20px;" ng-show="addvat">
		<td colspan="6" align="right">
		<?=$lang_vat?>
		 <input type="number" ng-model="vatnumber" style="width: 50px;text-align: right;"> 
		 %</td>
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * vatnumber/100) | number:2 }}
			</td>
<td></td>
		</tr>

		<tr style="font-size: 20px;" ng-show="addvat">
		<td colspan="6" align="right"><?=$lang_pricesumvat?></td>
			<td align="right" style="font-weight: bold;">
			{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
<td></td>
		</tr>




	</tbody>
</table>

</div>


<table  class="table" width="100%">
	<tbody>
	

		<tr  style="font-size: 30px;">
		<td   width="60%" align="right" style="font-size: 30px;font-weight: bold;">
		<form class="form-inline">
		<div class="form-group">
<?=$lang_discount?>:
</div>
<div class="form-group">
<input type="text" class="form-control" ng-model="discount_last" placeholder="<?=$lang_discount?>" style="font-size: 30px;text-align: right;height: 47px;background-color:#dff0d8;width: 200px;">
</div>
		</td>
			<td>
		<td width="10%" align="right" style="color: red;font-size: 30px;font-weight: bold;">
		{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}</td>
			<td>
<form>
			<input type="hidden" class="form-control" ng-model="money_from_customer" placeholder="<?=$lang_getmoney?>" style="font-size: 30px;text-align: right;height: 47px;background-color:#dff0d8;">
		</td>
		
		<td align="right" width="10%"><button type="submit" class="btn btn-success btn-lg" id="savesale" ng-click="Savesale(money_from_customer,Sumsalepricevat(),discount_last )">Save</button>

</form>

		</td>
		</tr>
	</tbody>
</table>








<div class="modal fade" id="Openfull">
	<div class="modal-dialog modal-lg" style="width: 100%;margin: 0px;">
		<div class="modal-content">
			<div class="modal-body">
				




<table width="100%">
	<tbody>
		<tr>
		
			<td align="left">
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="<?=$lang_searchproductnameorscan?>">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg"><?=$lang_enter?></button>
				</div>
				<div class="form-group" ng-show="cannotfindproduct" style="color: red;">
					<?=$lang_cannotfoundproduct?>
				</div>
				<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>
				</form>

			</td>
			<td style="font-size: 50px;font-weight: bold;">
				<span style="color: red">{{Sumsalepricevat() | number:2 }}</span> <?=$lang_currency?>
			</td>
			<td align="right"  width="10%">
			<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">x</button>
		</td>
			
		</tr>
	</tbody>
</table>


<hr />
<div style="height: 350px;overflow: auto;" id="Openfulltable">

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 50px;"><?=$lang_rank?></th>
			
			<th style="text-align: center;width: 250px;">
			<?=$lang_productname?></th>
			<th style="text-align: center;width: 100px;">
			<?=$lang_barcode?></th>
			<th style="text-align: center;width: 150px;">
			<?=$lang_saleprice?></th>
			
			<th width="100px;" style="text-align: center;width: 100px;">
			<?=$lang_discountperunit?></th>
			<th style="text-align: center;width: 80px;">
			<?=$lang_qty?></th>
			<th style="text-align: center;width: 80px;">
			<?=$lang_priceall?></th>
			<th style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listsale" style="font-size: 20px;">
			<td  style="width: 50px;" align="center">{{$index+1}}</td>
			
			<td style="width: 250px;">

  {{x.product_name}}
 

<input type="hidden" ng-model="x.product_id">
			
			</td>
<td align="center" style="width: 100px;">{{ x.product_code }}</td>
			

			<td align="right" style="width: 150px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width: 100px;"><input type="" placeholder="<?=$lang_discount?>" class="form-control" ng-model="x.product_price_discount" style="text-align: right;"></td>
			<td align="right" style="width: 80px;"><input type="" placeholder="<?=$lang_qty?>" class="form-control" ng-model="x.product_sale_num" style="text-align: right;width: 80px;"></td>
			
			<td style="width: 50px;" align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}</td>
			<td><button class="btn btn-danger" ng-click="Deletepush($index)">ลบ</button></td>
		</tr>

		
		<tr style="font-size: 20px;">
		<td colspan="5" align="right"><?=$lang_summary?></td>
		
			<td align="right" style="font-weight: bold;">{{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;">{{Sumsaleprice() | number:2 }}</td>
<td></td>
		</tr>

		<tr style="font-size: 20px;">
		<td colspan="8" align="right">
<input type="checkbox" ng-model="addvat" ng-change="Addvatcontrol()">
		<?=$lang_addvat?></td>
			
		</tr>


		<tr style="font-size: 20px;" ng-show="addvat">
		<td colspan="6" align="right">
		<?=$lang_vat?>
		 <input type="number" ng-model="vatnumber" style="width: 50px;text-align: right;"> 
		 %</td>
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * vatnumber/100) | number:2 }}
			</td>
<td></td>
		</tr>

		<tr style="font-size: 20px;" ng-show="addvat">
		<td colspan="6" align="right"><?=$lang_pricesumvat?></td>
			<td align="right" style="font-weight: bold;">
			{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
<td></td>
		</tr>

	</tbody>
</table>


</div>

<hr />
<table  class="table table-hover" width="100%">
	<tbody>
	<tr style="font-size: 20px;">
		<td align="right"><?=$lang_summary?></td>
		
			<td align="right" style="font-weight: bold;">
			<?=$lang_qty?> {{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;"><?=$lang_summary?> <span style="color: red">{{Sumsalepricevat() | number:2 }}</span> 
			<?=$lang_currency?></td>
<td></td>
		</tr>
		</tbody>
		</table>

<table  class="table table-hover" width="100%">
	<tbody>
	

		<tr  style="font-size: 20px;">
		<td   width="25%" align="right"><?=$lang_getmoney?>:</td>
			<td>
			<form>
			<input type="text" id="money_from_customer2" class="form-control" ng-model="money_from_customer" placeholder="<?=$lang_moneyfromcus?>" style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">

			

		</td>
		<td width="35%"> <?=$lang_moneychange?>: <b>{{money_from_customer - Sumsalepricevat() | number:2}} <?=$lang_currency?></b></td>
		<td align="right" width="10%"><button type="submit" class="btn btn-success btn-lg" id="savesale2" ng-click="Savesale(money_from_customer,Sumsalepricevat())"><?=$lang_getmoneyenter?></button></td>
</form>
		
		</tr>
	</tbody>
</table>





			</div>
			
		</div>
	</div>
</div>




<div class="modal fade" id="Openchangemoney">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title">Save Success</h4>
			</div>
			<div class="modal-body text-center">
<button type="button" class="btn btn-default btn-lg" ng-click="clickokafterpay()"><?=$lang_ok?></button>

<!-- <hr />
<button class="btn btn-default" ng-click="printDivmini()"><?=$lang_billmini?></button>

<button class="btn btn-default" ng-click="printDivfull()"><?=$lang_billfull?></button> -->
			</div>
		
		</div>
	</div>
</div>













<hr />



</div>
</div>



<!-- 
<div class="panel panel-default">
	<div class="panel-body">
	

<?=$lang_salelisttoday?>


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?>">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>
<br />




<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_rank?></th>
			<th><?=$lang_runno?></th>
			<th><?=$lang_cusname?></th>
			
			
			
			<th><?=$lang_productnum?></th>
			<th><?=$lang_pricesum?></th>
			<th><?=$lang_vat?></th>
			<th><?=$lang_pricesumvat?></th>
			<th>ส่วนลด</th>
			<th>ยอดสุทธิ</th>
			<th><?=$lang_getmoney?></th>
			<th><?=$lang_moneychange?></th>
			<th>ชำระโดย</th>
			<th><?=$lang_day?></th>
			<th  ng-show="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td><button class="btn btn-default btn-sm" ng-click="Getone(x)">{{x.sale_runno}}</button></td>
			<td>{{x.cus_name}}</td>

			
			<td  align="right">{{x.sumsale_num | number}}</td>
			<td  align="right">{{x.sumsale_price | number:2}}</td>

			<td  align="right">{{x.sumsale_price * (x.vat/100) | number:2}}</td>
	<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) | number:2}}</td>
			
			<td  align="right">{{x.discount_last | number:2}}</td>
			<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}</td>
			<td  align="right">{{x.money_from_customer | number:2}}</td>
			<td  align="right">{{x.money_from_customer - ((ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price)) - x.discount_last) | number:2}}</td>

			<td>
<span ng-if="x.pay_type=='1'">เงินสด</span>
<span ng-if="x.pay_type=='2'">โอน</span>
<span ng-if="x.pay_type=='3'">บัตรเครดิต</span>
<span ng-if="x.pay_type=='4'">ค้างชำระ</span>
			</td>


			<td>{{x.adddate}}</td>
			<td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" ng-click="Deletelist(x)" id="delbut{{x.ID}}">
			<?=$lang_delete?></button></td>
		</tr>
	</tbody>
</table>


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


</form> -->






<div class="modal fade" id="Opencustomer">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_searchcus?></h4>
			</div>
			<div class="modal-body">
				
<form class="form-inline">
<div class="form-group">				
<input type="text" ng-model="customer_name" class="form-control" placeholder="<?=$lang_cusname?>" style="height: 45px;width: 400px;font-size: 20px;">
</div>
<div class="form-group">
<button type="submit" ng-click="Searchcustomer()" class="btn btn-success btn-lg" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<a href="<?php echo $base_url; ?>/mycustomer" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_addcus?>" target="_blank"><?=$lang_addcus?></a>
</div>
</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th><?=$lang_select?></th><th><?=$lang_memberid?></th><th><?=$lang_cusname?></th><th><?=$lang_address?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in customerlist">
			<td><button class="btn btn-success" ng-click="Selectcustomer(x)"><?=$lang_select?></button></td>
			<td>{{x.cus_add_time}}</td>
			<td>{{x.cus_name}}</td>
			<td>{{x.cus_tel}} {{x.cus_address}}  {{x.district_name}} {{x.amphur_name}} {{x.province_name}} {{x.cus_address_postcode}} </td>
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



<div class="modal fade" id="Modalproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการสินค้า</h4>
			</div>
			<div class="modal-body">
	<input type="text" ng-model="searchproduct" placeholder="ค้นหารหัสหรือชื่อสินค้า" style="width:300px;" class="form-control">
<br />	
<div style="overflow: auto;height: 400px;">		
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th>เลือก</th><th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>ราคา</th><th>ส่วนลดต่อหน่วย</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="y in productlist | filter:searchproduct" >
			<td><button ng-click="Selectproduct(y,indexrow)" class="btn btn-success">เลือก</button></td>
			<td align="center">{{y.product_code}}</td><td>{{y.product_name}}</td>
			<td align="right">{{y.product_price | number:2}}</td>
			<td align="right">{{y.product_price_discount | number:2}}</td>
		</tr>
	</tbody>
</table>
</div>

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
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_saleproductlist?></h4>
				
			</div>
			<div class="modal-body" id="section-to-print">
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
			<br />
	<?=$lang_runno?>:{{sale_runno}} , <?=$lang_cusname?>: {{cus_name}}	, <?=$lang_address?>: {{cus_address_all}}		
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:10px;"><?=$lang_rank?></th>
			<th style="width:300px;"><?=$lang_productname?></th>
			<th style="width:100px;"><?=$lang_barcode?></th>
			<th style="width:100px;"><?=$lang_saleprice?></th>
			<th style="width:100px;"><?=$lang_discountperunit?></th>
			<th style="width:100px;"><?=$lang_qty?></th>
			<th style="width:100px;"><?=$lang_priceall?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td align="center" style="width:10px;">{{$index+1}}</td>
			<td style="width:300px;">{{x.product_name}}</td>
			<td align="center" style="width:50px;">{{x.product_code}}</td>
			<td align="right" style="width:50px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width:50px;">{{x.product_price_discount | number:2}}</td>
			<td align="right" style="width:5px;">{{x.product_sale_num | number}}</td>
			<td align="right" style="width:50px;">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="5"  align="right" style="font-weight: bold;"><?=$lang_all?></td>
			
			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;"><u>{{sumsale_price | number:2}}</u></td>
		</tr>

<tr ng-if="vat3 > '0'">
<td align="right" colspan="6"><?=$lang_vat?> {{vat3}} %</td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price * (vat3/100) | number:2}}</td>
		</tr>

		<tr ng-if="vat3 > '0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>

		<tr><td align="right" colspan="6">ส่วนลด</td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr><td align="right" colspan="6">ยอดสุทธิ</td>
		<td  style="font-weight: bold;" align="right"><u>{{sumsalevat-discount_last2 | number:2}}</u></td></tr>
		<tr><td align="right" colspan="6"><?=$lang_getmoney?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer3 | number:2}}</td></tr>
		<tr><td align="right" colspan="6"><?=$lang_moneychange?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer3-(sumsalevat-discount_last2) | number:2}}</td></tr>
	</tbody>
</table>
<center>
<img src="<?php echo $base_url;?>/warehouse/barcode/png?barcode={{sale_runno}}" style="height: 100px;width: 200px;">
</center>



			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
				
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="Openonemini">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_billmini?></h4>
				
			</div>
			<div class="modal-body">
			<div  id="section-to-print" style="font-size: 12px;">
		<center>
		<b><span style="font-size: 14px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>
		<br />
		<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
		
<br />
			---------------------------------
				<br />	
<?=$lang_billmini?>

<br />

(VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)


<br />
<span ng-if="cus_name != ''">
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

<table width="100%">

		<tr ng-repeat="x in listone">
			
			<td width="70%">{{x.product_sale_num | number}} {{x.product_name}}</td>			
			<td align="right"  width="30%">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
		
			<td><?=$lang_priceall?></td>
			
			
			<td align="right">{{sumsale_price | number:2}}</td>
		</tr>

<tr ng-if="vat3 > '0'">
<td><?=$lang_vat?> {{vat3}} %</td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price*(vat3/100) | number:2}}</td>
		</tr>


		<tr  ng-if="vat3 > '0'">
		<td><?=$lang_pricesumvat?></td>
		<td align="right">
		{{sumsalevat | number:2}}</td>
		</tr>

		<tr>
		
		<td>ส่วนลด</td>
		<td align="right">{{discount_last2 | number:2}}</td></tr>
		
		<tr>
		
		<td>ยอดสุทธิ</td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td></tr>
		

		<tr>
		
		<td><?=$lang_getmoney?></td>
		<td align="right">{{money_from_customer3 | number:2}}</td></tr>
		<tr>
		
		<td><?=$lang_moneychange?></td>
		<td align="right">{{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}</td></tr>

</table>
<br />

<center>
<br />
		---------------------------------	
		<br />	
<?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
<br />
		 

<?=$lang_day?>: <?php echo date('d/m/Y H:i:s',time()); ?>	
<br />
<img src="<?php echo $base_url;?>/warehouse/barcode/png?barcode={{sale_runno}}" style="height: 70px;width: 160px;">
</center>
<br />	
<br />	
<center>___________________________<centter>
</div>

			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
				
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
$scope.customer_name = '';
$scope.cus_address_all = '';
$scope.listsale = [];
$scope.money_from_customer = '';
$scope.customer_id = '0';
$scope.product_code = '';
$scope.listone = [];

$scope.addvat = false;
$scope.vatnumber = 0;

$scope.sale_type = '1';
$scope.pay_type = '4';
$scope.discount_last = 0;
$scope.reserv = '0';

$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};

$scope.Addvatcontrol = function(){
if($scope.addvat==true){
	$scope.vatnumber = 7;
}else{
	$scope.vatnumber = 0;
}

};



$scope.Searchcustomer = function(){
$http.post("Salepage/Customer",{
	cus_name: $scope.customer_name
	}).success(function(data){
$scope.customerlist = data;

        });
};








$scope.clickokafterpay = function(){
$('#Openchangemoney').modal('hide');
};


$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};

$scope.printDivfull = function(){
$('#Openone').modal('show');
$scope.Getone($scope.list[0]);
};

$scope.printDivmini = function(){
$('#Openonemini').modal('show');
$scope.Getonemini($scope.list[0]);
setTimeout(function(){ 
$scope.printDiv();
 }, 1000);

};

$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};

$scope.Opencustomer = function(){
$('#Opencustomer').modal('show');
	$scope.Searchcustomer();
};

$scope.Selectcustomer = function(x){
$scope.customer_id = x.cus_id;
$scope.customer_name = x.cus_name;
$scope.cus_address_all = x.cus_address + ' ' +  ' <?=$lang_tel?>: ' + x.cus_tel;
$('#Opencustomer').modal('hide');
$('#customer_name').prop('disabled',true);
$('#cus_address_all').prop('disabled',true);
};

$scope.Refresh = function(){
$scope.customer_id = '0';
$scope.customer_name = '';
$scope.cus_address_all = '';
$scope.listsale = [];
$scope.money_from_customer = '';
$('#customer_name').prop('disabled',false);
$('#cus_address_all').prop('disabled',false);
$('#savesale').prop('disabled',false);
$('#savesale2').prop('disabled',false);
$('#money_from_customer').prop('disabled',false);
$('#money_from_customer2').prop('disabled',false);
$scope.sale_type = '1';
$scope.pay_type = '4';
$scope.discount_last = 0;
$scope.reserv = '0';
};

$scope.getproductlist = function(){
   
$http.get('Salepage/Getproductlist')
       .then(function(response){
          $scope.productlist = response.data; 
            
        });
   };
//$scope.getproductlist();



$scope.Addpushproduct = function(){
$scope.listsale.push({
	product_id: '0',
	product_name: '<?=$lang_selectproduct?>',
	product_price: '0',
	product_score: '0',
	product_sale_num: '1',
	product_price_discount: '0'
});
};

$scope.Addpushproductcode = function(product_code){
$http.post("Salepage/Findproduct",{
	cus_id: $scope.customer_id,
	product_code: product_code
	}).success(function(data){
var product_price = '';
		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{

	if($scope.sale_type=='1'){
		product_price = data[0].product_price;
	}else if($scope.sale_type=='2'){
		product_price = data[0].product_wholesale_price;
	}

if(data[0].product_stock_num < 1){
toastr.warning('<?=$lang_outofstock?>');
}else{

if(data[0].product_stock_num <= 10){
toastr.info(data[0].product_name + ' <?=$lang_balance?> '+ data[0].product_stock_num +' <?=$lang_piece?>');
}
$scope.listsale.push({
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	product_name: data[0].product_name,
	product_score: data[0].product_score,
	product_price: product_price,
	product_sale_num: '1',
	product_price_discount: data[0].product_price_discount
});

}

$scope.cannotfindproduct = false;
}
$scope.product_code = '';
$('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight,1000000);
        });	
};


$scope.Deletepush = function(index){
  $scope.listsale.splice(index, 1);

};


$scope.Modalproduct = function(index){
$('#Modalproduct').modal({show:true});
$scope.indexrow = index;
};

$scope.Selectproduct = function(y,index){
$scope.listsale[index].product_id = y.product_id;
$scope.listsale[index].product_code = y.product_code;
$scope.listsale[index].product_name = y.product_name;
$scope.listsale[index].product_price = y.product_price;
$scope.listsale[index].product_price_discount = y.product_price_discount;
$('#Modalproduct').modal('hide');

};



 $scope.Sumsalenum = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseInt(item.product_sale_num);
 });
    return total;
};


 $scope.Sumsalediscount = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseInt(item.product_price_discount);
 });
    return total;
};


$scope.Sumproduct_score = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseInt(item.product_score);
 });
    return total;
};



 $scope.Sumsaleprice = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseInt((item.product_price - item.product_price_discount) * item.product_sale_num);
 });
    return total;
};


$scope.Sumsalepricevat = function(){
var total = 0;
 angular.forEach($scope.listsale,function(item){
total += parseInt((item.product_price - item.product_price_discount) * item.product_sale_num);
 });
total2 = total+(total*($scope.vatnumber/100));

    return total2;
};




$scope.Savesale = function(changemoney,sumsalepricevat,discount_last){
	if($scope.listsale == '' || $scope.listsale[0].product_id=='0' ){
		toastr.warning('<?=$lang_addproductlistplz?>');
	}else{
$('#savesale').prop('disabled',true);
$('#savesale2').prop('disabled',true);
$('#money_from_customer').prop('disabled',true);
$('#money_from_customer2').prop('disabled',true);
$http.post("Salepage/Savesale",{
	listsale: $scope.listsale,
	cus_name: $scope.customer_name,
	cus_id: $scope.customer_id,
	cus_address_all: $scope.cus_address_all,
	sumsale_discount: $scope.Sumsalediscount(),
	sumsale_num: $scope.Sumsalenum(),
	vat: $scope.vatnumber,
	product_score_all: $scope.Sumproduct_score(),
	sumsale_price: $scope.Sumsaleprice(),
	money_from_customer: $scope.money_from_customer,
	money_changeto_customer: $scope.money_from_customer - $scope.Sumsalepricevat() ,
	sale_type: $scope.sale_type,
	pay_type: $scope.pay_type,
	reserv: $scope.reserv,
	discount_last: $scope.discount_last
	}).success(function(data){
toastr.success('<?=$lang_success?>');


$('#Openchangemoney').modal({backdrop: "static", keyboard: false});
$scope.changemoney = changemoney- (sumsalepricevat - discount_last);
$('#savesale').prop('disabled',false);
$('#savesale2').prop('disabled',false);
$('#money_from_customer').prop('disabled',false);
$('#money_from_customer2').prop('disabled',false);
$scope.Refresh();
$scope.getlist();
        });	
}

};




$scope.perpage = '10';
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

   $http.post("Salepage/gettoday",{
searchtext:searchtext,
page: page,
perpage: perpage
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
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
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
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
        });	

};


$scope.Deletelist = function(x){
$('#delbut'+ x.ID).prop('disabled',true);	
$http.post("Salelist/Deletelist",{
	ID: x.ID,
	sale_runno: x.sale_runno,
	product_score_all: x.product_score_all,
	cus_id: x.cus_id
}).success(function(response){
$scope.getlist();
        });	

};


$('.lodingbefor').css('display','block');

});


</script>