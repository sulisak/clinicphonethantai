
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
<div ng-show="showpanelpurchase" class="panel panel-default">
	<div class="panel-body">

<table width="100%">
	<tbody>
		<tr>
			<td>
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" id="product_code" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="<?=$lang_barcode?>">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg"><?=$lang_enter?></button>
				</div>
				<div class="form-group" ng-show="cannotfindproduct" style="color: red;">
					<?=$lang_cannotfoundproduct?>
				</div>


<div class="form-group">
<button ng-click="Searchproduct()" class="btn btn-primary btn-lg" placeholder="" 
title=""><?php echo $lang_search;?></button>
</div>
<div class="form-group">
<button ng-click="Searchvendor()" class="btn btn-info btn-lg" placeholder="" title="">
	<?php echo $lang_lopc_2;?>
<span ng-if="vendor_id !='0'"> ({{vendor_name}})</span>
</button>
</div>


				</form>

			</td>
			<td align="right">

<!-- <button type="submit" ng-click="Openfull()" class="btn btn-default btn-lg">
<span class="glyphicon glyphicon-resize-full" aria-hidden="true">
<?=$lang_fullscreen?>
</button> -->

			</td>

		</tr>
	</tbody>
</table>


<hr />

<form class="form-inline">
	<div class="form-group">
	<input type="text" id="buydate" ng-model="buydate" class="form-control" 
	placeholder="<?php echo $lang_pcb_1;?>">
</div>
<div class="form-group">
<input type="text" ng-model="importproduct_header_refcode" placeholder="<?=$lang_refnumber?>
 <?php echo $lang_pcb_2;?>" class="form-control" style="width: 200px;">
</div>
<div class="form-group">
<input class="form-control" style="width: 500px;" ng-model="importproduct_header_remark" placeholder="<?=$lang_remark?>">
</div>

<br /><br />
<div class="form-group">
	<select class="form-control" ng-model="vat_type">
	<option value="0"><?php echo $lang_pcb_3;?></option>
	<option value="1"><?php echo $lang_pcb_4;?></option>
	</select>
</div>

</form>

<hr />



<table class="table table-hover table-bordered">
<thead>
	<tr class="trheader">
	<th style="text-align: center;width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_productname?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
		<!-- <th style="text-align: center;"><?=$lang_wherestore?></th> -->
		<!-- <th style="text-align: center;">ราคาสินค้า</th> -->
		<th style="text-align: center;"><?php echo $lang_qty;?></th>
		<th style="text-align: center;"><?php echo $lang_unit;?></th>
		<!-- <th style="text-align: center;"><?=$lang_allprice?></th> -->
		<th style="text-align: center;"><?php echo $lang_price;?></th>
		
		<th style="text-align: center;"><?php echo $lang_pcb_5;?></th>
		<th style="text-align: center;"><?=$lang_allprice?></th>
		<th style="text-align: center;"><?=$lang_delete?></th>
	</tr>
</thead>
	<tbody>
		<tr ng-repeat="x in productimportlist">
		<td align="center">{{$index+1}}</td>
			<td>
{{x.product_name_title}}

			<input type="hidden" ng-model="x.product_id">
			</td>

			<td align="center">
			{{x.product_code}}
			</td>


<!-- <td align="center">
			{{x.zone_name}}
			</td> -->


			<!-- <td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_pricebase" class="form-control" placeholder="<?=$lang_costperunit?>">
			</td> -->

			<td>
				<input onkeypress="validate(event)" style="text-align: center;" ng-change="Savedraffsess()" style="text-align: left;" type="text" ng-model="x.importproduct_detail_num" class="form-control" placeholder="<?=$lang_unit?>">
			</td>
			<td align="center">
			{{x.product_unit_name}}
			</td>
			<!-- <td>
				<input style="text-align: right;" type="text" value="{{x.importproduct_detail_pricebase * x.importproduct_detail_num | number:2 }}" class="form-control" readonly>
			</td> -->
			<td>
				<input onkeypress="validate(event)" style="text-align: center;" ng-change="Savedraffsess()" style="text-align: left;" type="text" ng-model="x.price_per_num" class="form-control" placeholder="">
			</td>
			
			
			<td style="text-align:right;">
			<span ng-if="vat_type=='0' && x.have_vat=='0'">
				{{(x.importproduct_detail_num*x.price_per_num)*(<?php echo $_SESSION['vat']?>/100) | number:2}}
			</span>
			
			<span ng-if="vat_type=='1' && x.have_vat=='0'">
				{{((x.importproduct_detail_num*x.price_per_num*100)/(<?php echo $_SESSION['vat'];?>+100))*(<?php echo $_SESSION['vat'];?>/100) | number:2}}
			</span>
			
			<span ng-if="x.have_vat=='1'">
			0.00
			</span>
			
			
			
			
			</td>
			
			
			<td style="text-align:right;">
			
			<span ng-if="vat_type=='0' && x.have_vat=='0'">
				{{(x.importproduct_detail_num*x.price_per_num)+((x.importproduct_detail_num*x.price_per_num)*(<?php echo $_SESSION['vat']?>/100)) | number:2}}
			</span>
			
			<span ng-if="vat_type=='1' && x.have_vat=='0'">
			{{x.importproduct_detail_num*x.price_per_num | number:2}}
			</span>
			
			<span ng-if="x.have_vat=='1'">
			{{x.importproduct_detail_num*x.price_per_num | number:2}}
			</span>
			
				
			</td>
			
			
			<td><button class="btn btn-sm btn-danger" ng-click="Deletepush($index)"><?=$lang_delete?></button></td>
		</tr>

		<tr>
			<td colspan="3" align="right"><?=$lang_all?></td>
			<td align="right" style="font-weight: bold;">{{Sumnum() | number:2}}</td>

			<!-- <td align="right" style="font-weight: bold;">{{Sumpricebasenum() | number:2}}</td>
			 -->
			<td></td>	
			<td></td>
			<td align="right" style="font-weight: bold;">{{Sumvat() | number:2}}</td>
			<td align="right" style="font-weight: bold;">{{Sumnumprice() | number:2}}</td>
			
		</tr>
		
		
	</tbody>
</table>





<button id="Saveimportproduct" class="btn btn-success btn-lg" style="float: right;" ng-click="Saveimportproduct()"><?=$lang_save?></button>




</div>
</div>


<div class="panel panel-default">
	<div class="panel-body">


 <div style="float: right;">
<!-- <input type="checkbox" ng-model="showinstockbut"> แสดงปุ่มนำเข้าสต็อก -->	
<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div> 



<form class="form-inline">
<div class="form-group">
	<button ng-hide="showpanelpurchase" class="btn btn-info" style="font-weight:bold;" 
	ng-click="Addnewpurchase()"><?php echo $lang_pcb_4_1;?></button>
</div>


<div class="form-group">
<input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1',perpage)" class="form-control" 
placeholder="<?=$lang_search?> <?php echo $lang_pcb_4_1_1;?>" style="width: 300px;">
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


<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>





<div class="form-group">
<button class="btn btn-danger" ng-click="Openproducttable()"><span class="glyphicon glyphicon-cog" aria-hidden="true">
</span> <?php echo $lang_pcb_4_2;?></button>
</div>




<!-- <div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>
<br />

<div id="openprint_table">


<table class="table table-hover table-bordered" id="headerTable">
	<thead>
		<tr class="trheader">
			<th style="text-align: center;width: 20px;"><?=$lang_rank?></th>
			<th style="text-align: center;">No. </th>
			<th style="text-align: center;"><?php echo $lang_lopc_2;?></th>
			<th style="text-align: center;"><?=$lang_refnumber?></th>

			<th style="text-align: center;"><?=$lang_productnum?></th>
			 <th style="text-align: center;"><?=$lang_allprice?></th>
			 <th style="text-align: center;"><?php echo $lang_pcb_5;?></th>
			<th style="text-align: center;"><?=$lang_remark?></th>
			<th style="text-align: center;"><?=$lang_day?> <?php echo $lang_pcb_6;?></th>
			<th style="text-align: center;"><?=$lang_day?> <?php echo $lang_pcb_7;?></th>
			 <th style="text-align: center;"><?php echo $lang_pcb_8;?></th> 
			<th style="text-align: center;width: 20px;" ng-if="showdeletcbut" >
			<?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td align="center"><button class="btn btn-default btn-sm" ng-click="Getimportone(x)">{{x.importproduct_header_code}}</button></td>
<td align="center">{{x.vendor_name}}</td>
			<td align="center">{{x.importproduct_header_refcode}}</td>

			<td align="right">{{x.importproduct_header_num | number}}</td>
			 <td align="right">{{x.allprice | number:2}}</td>
			 <td align="right">{{x.vatbuyall | number:2}}</td>
			<td align="center">{{x.importproduct_header_remark}}</td>
			<td align="center">{{x.importproduct_header_date2}}</td>
			<td align="center">{{x.importproduct_header_adddate2}}</td>
 <td align="center" ng-if="x.status =='0'">
 <span ng-if="showinstockbut">
 <a  href="<?php echo $base_url;?>/warehouse/importproduct?pn={{x.importproduct_header_code}}" class="btn btn-primary btn-sm">
<?php echo $lang_pcb_8;?>
</a>
</span>

<span ng-if="!showinstockbut"><?php echo $lang_pcb_9;?></span>
</td> 

			<td align="center" ng-if="x.status =='1'" style="color:#fff;background-color:green;font-size:12px;font-weight:bold;">
				Instock
			</td>


<td ng-if="showdeletcbut && x.status =='1'" align="center">

			</td>
			<td ng-if="showdeletcbut && x.status =='0'" align="center">
				<button class="btn btn-xs btn-danger" ng-click="Deleteimportlist(x)" id="delbut{{x.importproduct_header_id}}"><?=$lang_delete?></button>

			</td>
		</tr>
		
		<tr>
		<td align="right" style="font-weight:bold;" colspan="4"><?php echo $lang_all;?></td>
		<td align="right" style="font-weight:bold;">{{Sumnumall() | number}}</td>
		<td align="right" style="font-weight:bold;">{{Sumpricesaleall() | number:2}}</td>
		<td align="right" style="font-weight:bold;">{{Sumvatbuyall() | number:2}}</td>
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
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>









<div class="modal fade" id="Searchproduct">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_search;?></h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="product_name" ng-change="Searchproductfind()" class="form-control" 
placeholder="<?php echo $lang_stkc_8_a3;?>" style="height: 45px;font-size: 20px;">
</div>


</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th style="text-align:center;"><?=$lang_select?></th>
			<th style="text-align:center;"><?php echo $lang_productname;?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productlist">
			<td style="text-align:center;"><button class="btn btn-success" ng-click="Addpushproductcode(x.product_code)">
<?=$lang_select?>
			</button></td>
			<td style="text-align:center;">{{x.product_name}}</td>
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














<div class="modal fade" id="Openproducttable_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_pcb_10;?></h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtextsetting" ng-change="Searchsettingproductfind()" 
class="form-control" placeholder="<?php echo $lang_search;?>" style="height: 45px;font-size: 20px;">
</div>


</form>
<br />
<table class="table table-hover">
	<thead style="font-size:14px;">
		<tr class="trheader">
			<th style="text-align:center;"><?php echo $lang_barcode;?></th>
			<th style="text-align:center;"><?php echo $lang_productname;?></th>
			<th style="text-align:center;"><?php echo $lang_pcb_11;?></th>
			<th style="text-align:center;"><?php echo $lang_pcb_12;?></th>
			<th style="text-align:center;"><?php echo $lang_unit;?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in settingproductlist">
			
			
			<td style="text-align:center;">{{x.product_code}}</td>
			
			<td style="text-align:left;">{{x.product_name}}</td>
			
			<td style="text-align:center;">
				<input onkeypress="validate(event)" style="text-align: center;" type="text" ng-model="x.stock_min" ng-change="Savesettingproduct(x,'1')" class="form-control">
				<span ng-if="savesettingok_1=='1' && x.product_id==product_id_setting" style="color:green;">บันทึกสำเร็จ</span>
				</td>
			
			<td style="text-align:center;">
				<input onkeypress="validate(event)" style="text-align: center;" type="text" ng-model="x.num_buy" ng-change="Savesettingproduct(x,'2')" class="form-control">
				<span ng-if="savesettingok_2=='1' && x.product_id==product_id_setting" style="color:green;">บันทึกสำเร็จ</span>
				</td>
			
			<td style="text-align:left;">{{x.product_unit_name}}</td>
			
			
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








<div class="modal fade" id="Searchvendor">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_search;?></h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="vendor_name_search" ng-change="Searchvendorfind()" class="form-control" 
placeholder="<?php echo $lang_search;?>" style="height: 45px;font-size: 20px;">
</div>


</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th style="text-align:center;"><?=$lang_select?></th>
			<th style="text-align:center;"><?php echo $lang_lopc_2;?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in vendorlist">
			<td style="text-align:center;"><button class="btn btn-success" ng-click="Addvendor(x)">
<?=$lang_select?>
			</button></td>
			<td style="text-align:center;">{{x.vendor_name}}</td>
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






<div class="modal fade" id="Openfull" style="padding-right:0px;">
	<div class="modal-dialog modal-lg" style="width: 100%;margin: 0px;">
		<div class="modal-content">
			<div class="modal-body">






<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="importproduct_header_refcode" placeholder="<?=$lang_refnumber?>" class="form-control" style="width: 200px;">
</div>
<div class="form-group">
<input class="form-control" style="width: 500px;" ng-model="importproduct_header_remark" placeholder="<?=$lang_remark?>">
</div>
</form>

<br />

<table width="100%">
	<tbody>
		<tr>

			<td>
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="<?=$lang_barcode?>">
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

<div class="form-group">
<button ng-click="Searchproduct()" class="btn btn-primary btn-lg" placeholder="" title="ค้นหา"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

				</form>

			</td>
			<td align="right">

<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">x</button>

			</td>

		</tr>
	</tbody>
</table>


<hr />

<div style="height: 400px;overflow: auto;" id="Openfulltable">
<table class="table table-hover table-bordered">
<thead>
	<tr class="trheader">
	<th style="text-align: center;width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_productname?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
		<!-- <th style="text-align: center;"><?=$lang_costperunit?></th> -->
		<th style="text-align: center;"><?=$lang_unit?></th>
		<!-- <th style="text-align: center;"><?=$lang_allprice?></th> -->
		<th style="text-align: center;"><?=$lang_delete?></th>
	</tr>
</thead>
	<tbody>
		<tr ng-repeat="x in productimportlist">
		<td align="center">{{$index+1}}</td>
			<td>
{{x.product_name_title}}

			<input type="hidden" ng-model="x.product_id">
			</td>

			<td align="center">
			{{x.product_code}}
			</td>

			<!-- <td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_pricebase" class="form-control" placeholder="<?=$lang_costperunit?>">
			</td> -->
			<td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_num" class="form-control" placeholder="<?=$lang_unit?>">
			</td>
			<!-- <td>
				<input style="text-align: right;" type="text" value="{{x.importproduct_detail_pricebase * x.importproduct_detail_num | number:2 }}" class="form-control" readonly>
			</td> -->
			<td><button  class="btn btn-sm btn-danger" ng-click="Deletepush($index)"><?=$lang_delete?></button></td>
		</tr>


	</tbody>
</table>


</div>

<table width="100%">
	<tr>
			<td align="center" style="font-size: 16px;"><?=$lang_salenumall?> <span style="font-weight: bold;">{{Sumnum() | number}}</span>

			<!--  <?=$lang_allprice?> <span style="font-weight: bold;">{{Sumpricebasenum() | number:2}}</span> -->
			</td>

		</tr>
</table>


<table width="100%">
<tr><td align="right">
<button id="Saveimportproduct2" class="btn btn-success btn-lg" style="float: right;" ng-click="Saveimportproduct()"><?=$lang_save?></button>
</td></tr>
</table>




			</div>

		</div>
	</div>
</div>





<div class="modal fade" id="Getimportone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
<button class="btn btn-primary" onClick="Openprintdiv1()"><?=$lang_print?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
			<div class="modal-body" id="openprint1">

		<center style="font-size: 25px;font-weight: bold;">
	<b><?php echo $lang_pcb_13;?></b>

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
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>

</td>
</tr>

</table>


<table ng-if="getvendor_name !=''" class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
<?php echo $lang_lopc_2;?>: {{getvendor_name}}
</td>
</tr>

</table>



			<table class="table table-bordered" width="100%">
	<tr>
	<td align="right">No:</td><td>{{importproduct_header_code}}</td>
	<td align="right"><?=$lang_day?>:</td><td>{{importproduct_header_date2}}</td>
	</tr>
	<tr>
	<td align="right"><?=$lang_refnumber?>:</td><td>{{importproduct_header_refcode2}}</td>
	<td align="right"><?=$lang_remark?>:</td><td>{{importproduct_header_remark2}}</td></tr>
</table>

<table  class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<!-- <th style="text-align: center;"><?=$lang_costperunit?></th> -->

<!-- <th style="text-align: center;"><?=$lang_wherestore?></th> -->
			<th style="text-align: center;"><?php echo $lang_qty;?></th>
<th style="text-align: center;"><?php echo $lang_price;?></th>
			 <th style="text-align: center;"><?=$lang_allprice?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in importone">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<!-- <td align="right">{{ x.importproduct_detail_pricebase | number:2 }}</td> -->
			<!-- <td align="right">{{ x.zone_name}}</td> -->
			<td align="right">{{ x.importproduct_detail_num | number:2 }}</td>
			<td align="right">{{ x.price_per_num | number }}</td>

			 <td align="right">{{ x.price_per_num* x.importproduct_detail_num | number:2 }}</td>

		</tr>
		<tr>
			<td colspan="3" align="right"><?=$lang_all?></td>
			<td align="right" style="font-weight: bold;">{{ importone_sumnum | number:2 }}</td>
			<td>

			</td>
			<td align="right" style="font-weight: bold;">{{ allprice | number:2 }}</td>

		</tr>
	</tbody>
</table>


<table width="100%">
	<tr>
		<td width="50%" align="center">
			<?php echo $lang_pcb_14;?> <br />
			________________
			<br />
			( {{user_name}} )
		</td>
		<td width="50%" align="center">
			<?php echo $lang_pcb_15;?> <br />
			________________
			<br />
			(__________________)
		</td>
	</tr>
</table>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Select_vat_type">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_select;?></h4>
			</div>
			<div class="modal-body">



<center>
<div class="form-group">
	<select class="form-control" ng-model="vat_type" style="height: 70px;
    width: 420px;
    font-size: 35px;">
	<option value="0"><?php echo $lang_pcb_3;?></option>
	<option value="1"><?php echo $lang_pcb_4;?></option>
	</select>
</div>
	<br />
		<button type="button" class="btn btn-primary btn-lg" data-dismiss="modal"><?php echo $lang_confirm;?></button>
			
	</center>


<hr />
<span style="color:red;">
<?php echo $lang_pcb_16;?>
			<br />
			<?php echo $lang_pcb_17;?>
</span>
			
			</div>
			<div style="color:red;">
			
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="Modalproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_productliststock?></h4>
			</div>
			<div class="modal-body">
	<input type="text" ng-model="searchproduct" placeholder="<?=$lang_search?>" style="width:300px;" class="form-control">
<br />
<div style="overflow: auto;height: 400px;">
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_select?></th>
			<th><?=$lang_barcode?></th>
			<th><?=$lang_productname?></th>
			<th><?=$lang_price?></th>
			<th><?=$lang_costperunit?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="y in productlist | filter:searchproduct" >
			<td><button ng-click="Selectproduct(y,indexrow)" class="btn btn-success"><?=$lang_select?></button></td>
			<td align="center">{{y.product_code}}</td><td>{{y.product_name}}</td>
			<td align="right">{{y.product_price | number:2}}</td>
			<td align="right">{{y.product_pricebase | number:2}}</td>
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










<div class="modal fade" id="Product_orderprint_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">


<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="modal-title text-center" style="color:blue;"><b><?php echo $lang_db_30;?></b></h1>
			<center>	<a href="<?php echo $base_url;?>/purchase/buy/Remove_orderprint_modal2" class="btn btn-default">
			<?php echo $lang_db_31;?></a> </center>
			</div>
			
			
			<div class="modal-body">

	<center>
		
		<button class="btn btn-lg btn-info" ng-click="Getproductautofordraff()">
			<?php echo $lang_pcb_18;?></button>
		
		
		<button class="btn btn-lg btn-success" onClick="Openprintdiv2()">
			<?php echo $lang_pcb_19;?></button>
		
		<select ng-model="settingpaper" ng-init="settingpaper='1'" class="form-control" style="width:150px;">
			<option value="1"><?php echo $lang_db_33;?></option>
			<option value="2"><?php echo $lang_db_34;?></option>
			
			</select>
		</center>
	
	<div id="openprint2">
	
	<center><h3><b><?php echo $lang_db_35;?></b></h3></center>
<table class="table table-hover table-bordered">
	<thead  ng-if="settingpaper=='1'" style="font-size:14px;">
		<tr class="trheader">
		<th style="width: 50px;">Check</th>
		<th style="width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"><?php echo $lang_db_36;?></th>

			<th style="text-align: center;"><?php echo $lang_db_37;?></th>
			<th style="text-align: center;"><?=$lang_category?></th>
<th style="text-align: center;">Zone</th>




			<th style="text-align: center;"><?=$lang_total?></th>
			<th style="text-align: center;"><?=$lang_unit?></th>
			<th style="text-align: center;"><?php echo $lang_db_38;?></th>
			<th style="text-align: center;"><?php echo $lang_db_39;?></th>

		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in product_orderprint_list">
		
		<td align="center">
		<input type="checkbox" disabled>
		</td>
		
			<td ng-if="settingpaper=='1'" class="text-center">{{($index+1)}}</td>
			
			<td ng-if="settingpaper=='1'" align="center">
				{{x.product_code}}</td>
				
			<td>{{x.product_name}}</td>

<td align="right">{{x.num_buy | number}}</td>

<td ng-if="settingpaper=='1'">{{x.product_pricebase}}</td>

<td ng-if="settingpaper=='1'">{{x.product_category_name}}</td>
	<td ng-if="settingpaper=='1'">{{x.zone_name}}</td>
	
	
	
			
			
			
		<td align="right" ng-if="settingpaper=='1'">{{x.product_stock_num | number}}</td>
			
			
			<td align="right" ng-if="settingpaper=='1'">{{x.product_unit_name}}</td>
			
			
			
		<td ng-if="settingpaper=='1'" align="right">
		
		{{x.stock_min}}
		
		
		</td>

		

		<td ng-if="settingpaper=='1'" align="right">{{x.numdiff}}
		
		</td>

		</tr>
		
	
		
		
	

	</tbody>
</table>

<center><b><?php echo $lang_db_40;?> <?php echo date('d-m-Y H:i:s');?></b></center>
</div>


			</div>
			<div class="modal-footer">

				<center>
			<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" aria-hidden="true">ปิดหน้าต่าง</button>
</center>

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

<?php if(isset($_SESSION['purchase_buy_productimportlist'])){?>
	$scope.productimportlist = <?php echo json_encode($_SESSION['purchase_buy_productimportlist'],JSON_UNESCAPED_UNICODE);?>;
<?php }else{ ?>
$scope.productimportlist = [];
<?php } ?>

$scope.importproduct_header_refcode = '';
$scope.importproduct_header_remark = '';
$scope.product_code = '';
$scope.vendor_id = '0';
$scope.vendor_name = '';

$scope.getproductlist = function(){

$http.get('Productlist/get')
       .then(function(response){
          $scope.productlist = response.data.list;

        });
   };
$scope.getproductlist();




$scope.Addnewpurchase = function(){
	$scope.showpanelpurchase = true;
	$('#Select_vat_type').modal('show');

};

$scope.Searchproduct = function(){

$('#Searchproduct').modal('show');

};




$scope.Searchproductfind = function(){
$http.post("Buy/Findproduct2",{
	product_name: $scope.product_name
	}).success(function(data){
$scope.productlist = data;

        });
};



$scope.Searchvendor = function(){

$('#Searchvendor').modal('show');

};




$scope.Searchvendorfind = function(){
$http.post("Buy/Findvendor",{
	vendor_name: $scope.vendor_name_search
	}).success(function(data){
$scope.vendorlist = data;

        });
};





$scope.Savesettingproduct = function(x,y){
$scope.savesettingok_1 = '0';
$scope.savesettingok_2 = '0';
$http.post("Buy/Savesettingproduct",{
	product_id: x.product_id,
	product_code: x.product_code,
	product_name: x.product_name,
	stock_min: x.stock_min,
	num_buy: x.num_buy
	}).success(function(data){
	$scope.product_id_setting = x.product_id;
	if(y=='1'){
$scope.savesettingok_1 = '1';
	}else{
$scope.savesettingok_2 = '1';	
	}
setTimeout(function(){
$scope.savesettingok_1 = '0';
$scope.savesettingok_2 = '0';
 }, 1000);

        });
};






$scope.buydate = '';

$("#buydate").datetimepicker({
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



$scope.vat_type = '0';


$scope.Addvendor = function(x){
$scope.vendor_id = x.vendor_id;
$scope.vendor_name = x.vendor_name;

$('#Searchvendor').modal('hide');

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

   $http.post("Buy/get",{
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





$scope.Openmodalimport = function(){
	$scope.productimportlist = [];
	$('#Saveimportproduct').prop('disabled',false);
$('#Openmodalimport').modal({backdrop: "static", keyboard: false});
};


$scope.Addpushproduct = function(){
$scope.productimportlist.push({
	product_id: '',
	product_code: '',
	product_name_title: '<?=$lang_selectproduct?>',
	importproduct_detail_pricebase: '0',
	importproduct_detail_num: '1',
	zone_name: '',
	price_per_num: 0
});
};











$scope.Product_orderprint = function(){

   $http.post("<?php echo $base_url;?>/purchase/buy/Product_orderprint2",{
}).success(function(data){
	
	$scope.product_orderprint_list = data;
	if($scope.product_orderprint_list.length > 0){
		$('#Product_orderprint_modal').modal('show');
	}
	
        });

};


if($scope.productimportlist.length>1){
	$scope.showpanelpurchase = true;
	$scope.vat_type = '0';
}else{
$scope.Product_orderprint();
}




$scope.Refresh = function(){
$scope.productimportlist = [];
$scope.buydate = '';
$scope.vendor_id = '0';
$scope.vendor_name = '';
$scope.showpanelpurchase = false;
$('#product_code').prop('disabled',false);
};

$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};

$scope.Addpushproductcode = function(product_code){
$http.post("Buy/Findproduct",{
	product_code: product_code
	}).success(function(data){
		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{
$scope.productimportlist.push({
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	product_location: data[0].product_location,
	product_name_title: data[0].product_name,
	product_unit_name: data[0].product_unit_name,
	importproduct_detail_pricebase: data[0].product_pricebase,
	importproduct_detail_num: 1,
	zone_name: data[0].zone_name,
	have_vat: data[0].have_vat,
	price_per_num: parseFloat(data[0].product_pricebase)
});
$scope.cannotfindproduct = false;
toastr.success('ok');



$scope.Savedraffsess();



}

		$scope.product_code = '';
$('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight,1000000);
        });
};




$scope.Savedraffsess = function(){
$http.post("buy/Savedraffsess",{
	productimportlist: $scope.productimportlist
}).success(function(data){
        });
}





$scope.Getproductautofordraff = function(){
$http.post("buy/Getproductautofordraff",{ 
}).success(function(data){
	$scope.productimportlist = data;
	$scope.showpanelpurchase = true;
	$scope.vat_type = '1';
$('#Product_orderprint_modal').modal('hide');
$scope.Savedraffsess();
        });
}




$scope.Openproducttable = function(){
$('#Openproducttable_modal').modal({show:true});
};







$scope.searchtextsetting = '';
$scope.Searchsettingproductfind = function(){
$http.post("Buy/Findproductforsetting",{
	searchtextsetting: $scope.searchtextsetting
	}).success(function(data){
$scope.settingproductlist = data;

        });
};





$scope.Modalproduct = function(index){
$('#Modalproduct').modal({show:true});
$scope.indexrow = index;
};


$scope.Selectproduct = function(y,index){
$scope.productimportlist[index].product_id = y.product_id;
$scope.productimportlist[index].product_code = y.product_code;
$scope.productimportlist[index].importproduct_detail_pricebase = y.product_pricebase;
$scope.productimportlist[index].product_name_title = y.product_name;
$('#Modalproduct').modal('hide');

};


$scope.Deletepush = function(index){
  $scope.productimportlist.splice(index, 1);
  $scope.Savedraffsess();
};

$scope.Sumnum = function(){
var total = 0;

 angular.forEach($scope.productimportlist,function(item){
total += parseFloat(item.importproduct_detail_num);
 });
    return total;
};


$scope.Sumnumprice = function(){
var total = 0;

 angular.forEach($scope.productimportlist,function(item){
 
	 
	 if($scope.vat_type=='0'){
	 
	 if(item.have_vat=='0'){
	 all = (item.importproduct_detail_num*item.price_per_num)+(item.importproduct_detail_num*item.price_per_num)*(<?php echo $_SESSION['vat']?>/100);
	 }else{
	 all = parseFloat(item.importproduct_detail_num*item.price_per_num);	
	 }
		
		}else{
	all = parseFloat(item.importproduct_detail_num*item.price_per_num);	 
		 }
	 

	 
	 
total += parseFloat(all);
 });
    return total;
};


$scope.Sumpricebasenum = function(){
var total = 0;

 angular.forEach($scope.productimportlist,function(item){
total += ( item.importproduct_detail_pricebase * item.importproduct_detail_num );
 });
    return total;
};



$scope.Saveimportproduct = function(){
	if($scope.productimportlist!=''){

		if($scope.productimportlist[0].product_id!='' && $scope.productimportlist[0].importproduct_detail_num!='0'){

$('#Saveimportproduct').prop('disabled',true);
$('#Saveimportproduct2').prop('disabled',true);
$('#product_code').prop('disabled',true);
$http.post("Buy/add",{
	productimportlist: $scope.productimportlist,
	importproduct_header_refcode: $scope.importproduct_header_refcode,
	importproduct_header_remark: $scope.importproduct_header_remark,
	importproduct_header_num: $scope.Sumnum(),
	importproduct_header_amount: $scope.Sumpricebasenum(),
	allprice: $scope.Sumnumprice(),
	vendor_id: $scope.vendor_id,
	vendor_name: $scope.vendor_name,
	buydate: $scope.buydate,
	vat_type: $scope.vat_type,
	vatbuyall: $scope.Sumvat()
}).success(function(data){
toastr.success('<?=$lang_success?>');
$('#Saveimportproduct').prop('disabled',false);
$('#Saveimportproduct2').prop('disabled',false);
$('#product_code').prop('disabled',false);
$scope.productimportlist = [];
$scope.getlist();
$('#Openfull').modal('hide');
$scope.Refresh();
        });

}else{
	toastr.warning('<?=$lang_plz?>');
}

	}else{
		toastr.warning('<?=$lang_addproductlistplz?>');
	}

};



$scope.Getimportone = function(x){
$('#Getimportone').modal('show');
$http.post("Buy/Getimportone",{
	importproduct_header_code: x.importproduct_header_code
}).success(function(response){
$scope.importone = response;
$scope.importproduct_header_code = x.importproduct_header_code;
$scope.importproduct_header_refcode2 = x.importproduct_header_refcode;
$scope.importproduct_header_remark2 = x.importproduct_header_remark;
$scope.importproduct_header_date2 = x.importproduct_header_date2;
$scope.importone_sumnum = x.importproduct_header_num;
$scope.importone_sumprice = x.importproduct_header_amount;
$scope.allprice = x.allprice;
$scope.getvendor_name = x.vendor_name;
$scope.user_name = x.user_name;
        });

};


$scope.Deleteimportlist = function(x){
$('#delbut'+ x.importproduct_header_id).prop('disabled',true);
$http.post("Buy/Deleteimportlist",{
	importproduct_header_code: x.importproduct_header_code
}).success(function(response){
$scope.getlist();
//$('#delbut'+ x.importproduct_header_id).prop('disabled',false);
        });

};





 $scope.Sumnumall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.importproduct_header_num != null){
	 importproduct_header_num = item.importproduct_header_num;
	 }else{
     importproduct_header_num = 0;
	 }
total += parseFloat(importproduct_header_num);
 });
    return total;
};




 $scope.Sumpricesaleall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.allprice != null){
	 allprice = item.allprice;
	 }else{
     allprice = 0;
	 }
total += parseFloat(allprice);
 });
    return total;
};



 $scope.Sumvatbuyall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.vatbuyall != null){
	 vatbuyall = item.vatbuyall;
	 }else{
     vatbuyall = 0;
	 }
total += parseFloat(vatbuyall);
 });
    return total;
};






 $scope.Sumvat = function(){
var total = 0;

 angular.forEach($scope.productimportlist,function(item){
 
	 if(item.have_vat == '0'){
	 
	 if($scope.vat_type=='0'){
	 all = (item.importproduct_detail_num*item.price_per_num)*(<?php echo $_SESSION['vat']?>/100);
		 }else{
	all = ((item.importproduct_detail_num*item.price_per_num*100)/(<?php echo $_SESSION['vat'];?>+100))*(<?php echo $_SESSION['vat'];?>/100);	 
		 }
	 
	 }else{
     all = 0;
	 }
total += parseFloat(all);


 });
    return total;
};




$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
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
