<?php
if($_SESSION['printer_type']=='1'){
	$pt_width = '380px';
}else{
	$pt_width = '550px';
}
?>



<?php
if($_SESSION['printer_type']=='1'){
	$slipwidth = '190px';
}else{
	$slipwidth = '250px';
}
?>


<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
<div ng-show="showpanel" class="panel panel-default">
	<div class="panel-body">

<table width="100%">
	<tbody>
		<tr>
			<td>
			<form class="form-inline">



<div class="form-group">
<button ng-click="Searchbill()" class="btn btn-primary btn-lg" placeholder="" title="ค้นหาบิลขาย">ค้นหาบิลขาย</button>
</div>
<div class="form-group">
<button ng-click="Searchcustomer()" class="btn btn-info btn-lg" placeholder="" title="ค้นหาลูกค้า">ลูกค้า
<span ng-if="customer_id !='0'"> ({{customer_name}})</span>
</button>
</div>
<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
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


<br />

<form class="form-inline">
<div class="form-group">
<input class="form-control" style="width: 500px;" ng-model="remark" placeholder="<?=$lang_remark?>">
</div>
</form>

<hr />

{{sale_runno}}
<table class="table table-hover table-bordered">
<thead>
	<tr class="trheader">
	<th style="text-align: center;width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_productname?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
		<!-- <th style="text-align: center;"><?=$lang_wherestore?></th> -->
		<!-- <th style="text-align: center;">ราคาสินค้า</th> -->
		<th style="text-align: center;"><?=$lang_unit?></th>
		<!-- <th style="text-align: center;"><?=$lang_allprice?></th> -->
		<th style="text-align: center;">ราคา/หน่วย</th>
		<th style="text-align: center;"><?=$lang_allprice?></th>
	</tr>
</thead>
	<tbody>
		<tr ng-repeat="x in salelist">
		<td align="center">{{$index+1}}</td>
			<td>
{{x.product_name}}

			<input type="hidden" ng-model="x.product_id">
			</td>

			<td align="center">
			{{x.product_code}}
			</td>


			<td align="right">
{{x.product_sale_num | number}}
				</td>

			<td align="right">
{{x.product_price | number:2}}
					</td>
			<td style="text-align:right;">
				{{x.product_sale_num*x.product_price | number:2}}
			</td>
	</tr>

		<tr>
			<td colspan="3" align="right"><?=$lang_all?></td>
			<td align="right" style="font-weight: bold;">{{Sumnum() | number}}</td>

			<!-- <td align="right" style="font-weight: bold;">{{Sumpricebasenum() | number:2}}</td>
			 -->
			<td></td>
			<td align="right" style="font-weight: bold;">{{Sumnumprice() | number:2}}</td>

		</tr>
		<tr>
			<td colspan="5" align="right">ส่วนลดท้ายบิล</td>

			<td align="right" style="font-weight: bold;">{{discount_last | number:2}}</td>

		</tr>
		<tr>
			<td colspan="5" align="right">ราคาหลังหักส่วนลด</td>

			<td align="right" style="font-weight: bold;">{{Sumnumprice()-discount_last | number:2}}</td>

		</tr>
		<tr>
			<td colspan="5" align="right">VAT {{vat}}%</td>

			<td align="right" style="font-weight: bold;">{{(Sumnumprice()-discount_last)*(vat/100) | number:2}}</td>

		</tr>
		<tr>
			<td colspan="5" align="right">สุทธิ</td>

			<td align="right" style="font-weight: bold;">{{((Sumnumprice()-discount_last)*(vat/100))+(Sumnumprice()-discount_last) | number:2}}</td>

		</tr>
	</tbody>
</table>





<button ng-if="customer_name !='' && sale_runno !=''" id="Save" class="btn btn-success btn-lg" style="float: right;" ng-click="Save()"><?=$lang_save?></button>




</div>
</div>


<div class="panel panel-default">
	<div class="panel-body">


<!-- <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div> -->



<form class="form-inline">
<div class="form-group">
	<button ng-hide="showpanel" class="btn btn-info" style="font-weight:bold;" ng-click="Addnew()">+สร้างใบกำกับภาษี</button>
</div>


<div class="form-group">
<input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1')" class="form-control" placeholder="<?=$lang_search?> No, ลูกค้า, หมายเหตุ" style="width: 300px;">
</div>

<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>


<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>
<!-- <div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>
<br />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="text-align: center;width: 20px;"><?=$lang_rank?></th>
			<th style="text-align: center;">พิมพ์</th>
			<th style="text-align: center;">Taxinvoice No.</th>
			<th style="text-align: center;">ลูกค้า</th>
			<th style="text-align: center;">Sale No.</th>

<th style="text-align: center;">ราคาซื้อ</th>
			<th style="text-align: center;">ภาษี</th>
		<th style="text-align: center;">ราคารวมภาษี</th>
			<th style="text-align: center;"><?=$lang_remark?></th>
			<th style="text-align: center;"><?=$lang_day?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td class="text-center">
<span ng-if="selectpage=='1'">{{($index+1)}}</span>
<span ng-if="selectpage!='1'">{{($index+1)+(perpage*(selectpage-1))}}</span>

				</td>

				<td align="center"><button class="btn btn-primary btn-sm" ng-click="Printslipshow(x)">พิมพ์</button></td>

			<td align="center">{{x.taxinvoice_runno}}</td>
<td align="center">{{x.cus_name}}</td>
			<td align="center">{{x.sale_runno}}</td>



			 <td align="right">{{x.buy_price | number:2}}</td>


 			 <td align="right">{{x.buy_price*(x.vat/100) | number:2}}</td>
			 <td align="right">{{Floatfunc(x.buy_price)+Floatfunc(x.buy_price*(x.vat/100)) | number:2}}</td>

			<td align="center">{{x.remark}}</td>
			<td align="center">{{x.at_adddate}}</td>


		</tr>
<tr style="background-color:#337ab7;color:#fff;font-weight:bold;">
	<td colspan="5" align="right">
		รวม
	</td>
	<td align="right">
		{{Sumpriceall() | number:2}}
	</td>
	<td align="right">
		{{Sumvatall() | number:2}}
	</td>
	<td align="right">
		{{Sumpricevatall() | number:2}}
	</td>
	<td colspan="2">

	</td>
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









 <div class="modal fade" id="Openoneminishow">
 	<div class="modal-dialog modal-sm">
 		<div class="modal-content">
 			<div class="modal-header">
				<button class="btn btn-primary" Onclick="window.print()"><?=$lang_print?></button>
				<button type="button" class="btn btn-default" ng-click="Showprint_close()">ปิดหน้าต่าง</button>

 			</div>
 			<div class="modal-body" id="section-to-print">

				<center>
				<b>	ใบกำกับภาษี</b>
				<br />
					<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="150px">

				</center>

						<b><span style="font-size: 20px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>

						<br />
				<?php echo $_SESSION['owner_address']; ?>
				<br />
				<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

				<br />

		เลขผู้เสียภาษี: <?php echo $_SESSION['owner_tax_number']; ?>
<br />
<center>
___________
</center>
<br />
ลูกค้า<br />
{{showprint.cus_name}}
<br />
{{showprint.cus_address}}
<br />
โทร: {{showprint.cus_tel}}
<br />
<center>
	___________
</center>
<br />
<center>
	<b>สินค้าและบริการ</b>
</center>
				<table class="table table-response" style="width:100%;">

					<tbody>
						<tr ng-repeat="x in printlist">

							<td>
			{{x.product_sale_num | number}}  	{{x.product_name}}

							</td>


							<td style="text-align:right;">
								{{x.product_sale_num*x.product_price | number:2}}
							</td>
					</tr>

						<tr>
							<td colspan="1" align="left"><?=$lang_all?> <span style="font-weight: bold;">{{Sumnum_showprint() | number}}</span></td>
							<td align="right" style="font-weight: bold;"> {{Sumnumprice_showprint() | number:2}}</td>



						</tr>
						<tr>
							<td colspan="1" align="left">ส่วนลดท้ายบิล</td>

							<td align="right" style="font-weight: bold;">{{showprint.discount_last | number:2}}</td>

						</tr>
						<tr>
							<td colspan="1" align="left">ราคาหลังหักส่วนลด</td>

							<td align="right" style="font-weight: bold;">{{Sumnumprice_showprint()-showprint.discount_last | number:2}}</td>

						</tr>
						<tr>
							<td colspan="1" align="left">VAT {{showprint.vat}}%</td>

							<td align="right" style="font-weight: bold;">{{(Sumnumprice_showprint()-showprint.discount_last)*(showprint.vat/100) | number:2}}</td>

						</tr>
						<tr>
							<td colspan="1" align="left">สุทธิ</td>

							<td align="right" style="font-weight: bold;">{{((Sumnumprice_showprint()-showprint.discount_last)*(showprint.vat/100))+(Sumnumprice_showprint()-showprint.discount_last) | number:2}}</td>

						</tr>
					</tbody>
				</table>
Tax No. {{showprint.taxinvoice_runno}}


 			</div>
 			<div class="modal-footer">



 			</div>
 		</div>
 	</div>
 </div>






  <div class="modal fade" id="Openoneminiip" style="position: absolute; opacity: 0.0;">
  	<div class="modal-dialog modal-lg" style="width:2000px;">
  		<div class="modal-content">
  			<div class="modal-header">

  			</div>
  			<div class="modal-body" id="section-to-print-billvat" style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

<b>ใบกำกับภาษี</b>
 				<center>
					<table>
					<td>
						<center>

					 					<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">

									</center>

					 				</td>
				</tr>
 				</table>
 				</center>

<b><span style="font-size: 30px;"><?php echo $_SESSION['owner_name']; ?></span> </b>

 						<br />
<?php echo $_SESSION['owner_address']; ?>
 				<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

 				<br />
เลขผู้เสียภาษี: <?php echo $_SESSION['owner_tax_number']; ?>
 <br />
 <center>
 __________________________
 </center>
 <br />
 ลูกค้า<br />
 {{showprint.cus_name}}
 <br />
 {{showprint.cus_address}} {{showprint.cus_address_postcode}}
 <br />
 {{showprint.cus_tel}}
 <br />
 เลขผู้เสียภาษี: {{showprint.id_vat}}
 <br />
 <center>
 	__________________________
 </center>
 <br />

 	<b>
สินค้าและบริการ</b>

 				<table class="table table-hover table-bordered ">

 					<tbody>
 						<tr ng-repeat="x in printlist">

							<td align="left">
							{{x.product_sale_num | number}}
								</td>
<td>
{{x.product_name}}

 							</td>


 							<td style="text-align:right;">
 								{{x.product_sale_num*x.product_price | number:2}}
 							</td>
 					</tr>

 						<tr>
 							<td colspan="2" align="left">
<?=$lang_all?> <b>{{Sumnum_showprint() | number}}</b>

</td>


 							<td align="right" style="font-weight: bold;">{{Sumnumprice_showprint() | number:2}}</td>

 						</tr>
 						<tr>
<td colspan="2">
ส่วนลดท้ายบิล</td>

 							<td align="right" style="font-weight: bold;">{{showprint.discount_last | number:2}}</td>

 						</tr>
 						<tr>
<td colspan="2">
ราคาหลังหักส่วนลด</td>

 							<td align="right" style="font-weight: bold;">{{Sumnumprice_showprint()-showprint.discount_last | number:2}}</td>

 						</tr>
 						<tr>
 							<td colspan="2" align="left">VAT {{showprint.vat}}%</td>

 							<td align="right" style="font-weight: bold;">{{(Sumnumprice_showprint()-showprint.discount_last)*(showprint.vat/100) | number:2}}</td>

 						</tr>
 						<tr>
<td colspan="2">
สุทธิ</td>

 							<td align="right" style="font-weight: bold;">{{((Sumnumprice_showprint()-showprint.discount_last)*(showprint.vat/100))+(Sumnumprice_showprint()-showprint.discount_last) | number:2}}</td>

 						</tr>
 					</tbody>
 				</table>
				<center>
				 __________________________
				 <br />
				</center>
 Tax No. {{showprint.taxinvoice_runno}}


  			</div>
  			<div class="modal-footer">
  				<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

  			</div>
  		</div>
  	</div>
  </div>







	<div class="modal fade" id="printingorder_wait">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">

				<div class="modal-body" style="background-color:green;">


	<center style="color:#fff;">
		กำลังพิมพ์
	<br />
		กรุณารอซักครู่...
	</center>




				</div>

			</div>
		</div>
	</div>








<div class="modal fade" id="Searchbill">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ค้นหาบิลขาย</h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="runno" ng-change="Searchbillfind()" class="form-control" placeholder="ค้นหา No" style="height: 45px;font-size: 20px;">
</div>


</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th style="text-align:center;"><?=$lang_select?></th>
			<th style="text-align:center;">No</th>
			<th style="text-align:center;">ยอดซื้อสุทธิ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in billlist">
			<td style="text-align:center;"><button class="btn btn-success" ng-click="Addbill(x)">
<?=$lang_select?>
			</button></td>
			<td style="text-align:center;">{{x.sale_runno}}</td>
			<td style="text-align:center;">{{x.sumall | number:2}}</td>
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





<div class="modal fade" id="Searchcustomer">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ค้นหาลูกค้า</h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="customer_name_search" ng-change="Searchcustomerfind()" class="form-control" placeholder="ค้นหาชื่อลูกค้า" style="height: 45px;font-size: 20px;">
</div>

<div class="form-group">
<a href="<?php echo $base_url;?>/mycustomer" class="btn btn-default btn-lg">เพิ่มลูกค้า</a>
</div>

</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th style="text-align:center;"><?=$lang_select?></th>
			<th style="text-align:center;">ชื่อลูกค้า</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in customerlist">
			<td style="text-align:center;"><button class="btn btn-success" ng-click="Addcustomer(x)">
<?=$lang_select?>
			</button></td>
			<td style="text-align:center;">{{x.cus_name}} </td>
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

			</div>
			<div class="modal-body" id="section-to-print2">

		<center style="font-size: 25px;font-weight: bold;">
	<b>ใบสั่งซื้อ</b>

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
คู่ค้า: {{getvendor_name}}
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
			<th style="text-align: center;"><?=$lang_unit?></th>
<th style="text-align: center;">ราคา/หน่วย</th>
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
			<td align="right">{{ x.importproduct_detail_num | number }}</td>
			<td align="right">{{ x.price_per_num | number:2 }}</td>

			 <td align="right">{{ x.price_per_num* x.importproduct_detail_num | number:2 }}</td>

		</tr>
		<tr>
			<td colspan="3" align="right"><?=$lang_all?></td>
			<td align="right" style="font-weight: bold;">{{ importone_sumnum | number }}</td>
			<td>

			</td>
			<td align="right" style="font-weight: bold;">{{ allprice | number:2 }}</td>

		</tr>
	</tbody>
</table>


<table width="100%">
	<tr>
		<td width="50%" align="center">
			ผู้จัดซื้อ <br />
			________________
			<br />
			( {{user_name}} )
		</td>
		<td width="50%" align="center">
			ผู้อนุมัติ <br />
			________________
			<br />
			(__________________)
		</td>
	</tr>
</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
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








	</div>


	</div>

	</div>


		<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.productimportlist = [];
$scope.vat = 7;
$scope.remark = '';
$scope.product_code = '';
$scope.customer_id = '0';
$scope.customer_name = '';

$scope.sale_runno = '';
$scope.discount_last = '';



$("#dayfrom").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y H:i',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$("#dayto").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y H:i',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.dayfrom = '<?php echo date('d-m-Y 00:01',time());?>';
$scope.dayto = '<?php echo date('d-m-Y 23:59',time());?>';





$scope.Addnew = function(){
	$scope.showpanel = true;
};

$scope.Searchbill = function(){

$('#Searchbill').modal('show');

};




$scope.Searchbillfind = function(){
$http.post("Addnew/Searchbillfind",{
	runno: $scope.runno
	}).success(function(data){
$scope.billlist = data;

        });
};




$scope.Addbill = function(x){

$('#Searchbill').modal('hide');

$scope.sumsale_num = x.sumsale_num;
$scope.sum = x.sum;
$scope.sumsale_price = x.sumsale_price;
$scope.discount_last = parseFloat(x.discount_last);
$scope.sumall = x.sumall;
$scope.sale_runno = x.sale_runno;


$http.post("Addnew/Addbill",{
	sale_runno: x.sale_runno
	}).success(function(data){
$scope.salelist = data;

        });


};





$scope.Searchcustomer = function(){

$('#Searchcustomer').modal('show');

};




$scope.Searchcustomerfind = function(){
$http.post("Addnew/Findcustomer",{
	customer_name: $scope.customer_name_search
	}).success(function(data){
$scope.customerlist = data;

        });
};



$scope.Addcustomer = function(x){
$scope.customer_id = x.cus_id;
$scope.customer_name = x.cus_name;

$('#Searchcustomer').modal('hide');

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

   $http.post("Addnew/get",{
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


$scope.Floatfunc = function(x){
	return parseFloat(x);
}



$scope.Refresh = function(){
$scope.billlist = [];
$scope.customer_id = '0';
$scope.customer_name = '';
$scope.sale_runno = '';
$scope.showpanel = false;

};


$scope.Sumnum = function(){
var total = 0;

 angular.forEach($scope.salelist,function(item){
total += parseFloat(item.product_sale_num);
 });
    return total;
};


$scope.Sumnumprice = function(){
var total = 0;

 angular.forEach($scope.salelist,function(item){
total += parseFloat(item.product_sale_num*item.product_price);
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



$scope.Save = function(){
	if($scope.salelist!=''){


$('#Save').prop('disabled',true);
$http.post("Addnew/add",{
	sale_runno: $scope.sale_runno,
	remark: $scope.remark,
	vat: $scope.vat,
	customer_id: $scope.customer_id,
	sumsale_price: $scope.sumsale_price,
	discount_last: $scope.discount_last
}).success(function(data){

if(data!='dup'){
toastr.success('<?=$lang_success?>');
$('#Save').prop('disabled',false);
$scope.salelist = [];
$scope.getlist();
$scope.Refresh();
}else{
	toastr.warning('มีบิลขายนี้แล้ว');
	$('#Save').prop('disabled',false);
}

        });


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






$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();


};



$scope.Printslipshow = function(x){
$scope.printlist = [];
$scope.showprint = '';

	$http.post("Addnew/Addbill",{
		sale_runno: x.sale_runno
		}).success(function(data){
$scope.printlist = data;
$scope.showprint = x;
	        });

					$('#Openoneminishow').modal({backdrop: "static", keyboard: false});


};

$scope.Showprint_close = function(){
location.reload();
}


$scope.Sumnum_showprint = function(){
var total = 0;

 angular.forEach($scope.printlist,function(item){
total += parseFloat(item.product_sale_num);
 });
    return total;
};


$scope.Sumnumprice_showprint = function(){
var total = 0;

 angular.forEach($scope.printlist,function(item){
total += parseFloat(item.product_sale_num*item.product_price);
 });
    return total;
};







$scope.Printslipip = function(){
	$('#printingorder_wait').modal({backdrop: "static", keyboard: false});

					$('#Openoneminiip').modal('show');
					setTimeout(function(){
					$scope.printDiv2ip();
					 }, 1000);

};



$scope.Sumpriceall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
total += parseFloat(item.buy_price);
 });
    return total;
};



$scope.Sumvatall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
total += parseFloat(parseFloat(item.buy_price)*(item.vat/100));
 });
    return total;
};


$scope.Sumpricevatall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
total += parseFloat(parseFloat(item.buy_price)+parseFloat(item.buy_price*(item.vat/100)));
 });
    return total;
};






$scope.getcashierprinterip = function(){

$http.get('<?php echo $base_url;?>/printer/Printercategory/getcashier')
       .then(function(response){
          $scope.cashier_printer_ip = response.data[0].cashier_printer_ip;
					$scope.printer_ul = response.data[0].printer_ul;
					$scope.printer_name = response.data[0].printer_name;
					$scope.printer_order_type = response.data[0].printer_order_type;
					$scope.printer_ul_order = response.data[0].printer_ul_order;
					$scope.printer_ul_order_serverprinter = response.data[0].printer_ul_order_serverprinter;

        });
   };
$scope.getcashierprinterip();





$scope.printDiv2ip = function(){
	window.scrollTo(0, 0);
	//window.print();
//$('#Openbillcloseday').modal('show');

toastr.info('กำลังปริ้น...');


	var element = $("#section-to-print-billvat"); // global variable



console.log(element);

var getCanvas; // global variable
         html2canvas(element, {
width: 1000,
height: 10000,
         onrendered: function (canvas) {
               // $("#previewImage").append(canvas);
                getCanvas = canvas;



 var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");



    $.ajax({
      url: '<?php echo $base_url;?>/printer/example/interface/lanvat.php',
      data: {
             imgdata:newData,
             cashier_printer_ip: $scope.cashier_printer_ip,
						 printer_ul: $scope.printer_ul,
						 printer_name: $scope.printer_name,
						 user_id: '<?php echo $_SESSION['user_id'];?>'
           },
      type: 'post',
      success: function (response) {
               console.log(response);

        $('#Openoneminiip').modal('hide');
				$('#printingorder_wait').modal('hide');

      }
    });

$('#Openoneminiip').modal('hide');


             }
         });





};











});
	</script>
