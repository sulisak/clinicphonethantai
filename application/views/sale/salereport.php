
<font style="font-family: Phetsarath OT !important;">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" name="" placeholder="<?=$lang_search?>  <?php echo $lang_productname;?> <?php echo $lang_branch;?>" ng-model="searchtext" class="form-control">
</div>
<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>

<div class="form-group">
<select ng-model="showproductvat" class="form-control" ng-change="reportdaylist()">
<option value="0"><?php echo $lang_srp_1;?></option>
<option value="1"><?php echo $lang_srp_2;?></option>
<option value="2"><?php echo $lang_srp_3;?></option>
</select>
</div>


<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>
<hr />

<center>


<img ng-if="!daylist" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<div id="openprint_table">

<center>
	
	<b><h1><?php echo $lang_srp_4;?></b></h1>
	
	<b><h2>{{searchtext}}</b></h2>
	
	{{dayfrom}} <?php echo $lang_to;?> {{dayto}} 

</center>
 
	<div id="bar"></div>

<hr />

<table ng-if="daylist" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;" ng-if="saledataillistinlist ==''"><?=$lang_productname?></th>
			<th style="text-align: center;" ng-if="saledataillistinlist !=''"><?=$lang_productname?></th>
			
			<th style="text-align: center;"><?php echo $lang_srp_5;?></th>
			
			<th style="text-align: center;"><?=$lang_saletotal?>

<button ng-if="saledataillistinlist ==''" class="btn btn-default" 
title="<?php echo $lang_srp_6;?>" ng-click="Opensalelistdatailinlist()">+</button>


<button ng-if="saledataillistinlist !=''" class="btn btn-default" 
title="<?php echo $lang_srp_7;?>" ng-click="Opensalelistdatailinlist_close()">-</button>

			</th>
			<th style="text-align: center;"><?php echo $lang_srp_8;?></th>
			<th style="text-align: center;" ng-if="saledataillistinlist ==''"><?=$lang_cansale?></th>
			<th style="text-align: center;" ng-if="saledataillistinlist ==''"><?=$lang_discount?></th>
			<th style="text-align: center;"><?=$lang_revenue?></th>


<th style="text-align: center;"><?=$lang_cost?></th>
<th style="text-align: center;"><?php echo $lang_profit;?></th>

<th style="text-align: center;">ROI</th>

<th style="text-align: center;">befor VAT</th>
<th style="text-align: center;">VAT</th>


		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist">
		<td>{{x.product_code}}</td>


			<td ng-if="saledataillistinlist ==''">

			<button class="btn btn-default" ng-click="Opensalelistdatail(x)">
			{{x.product_name}}
		</button>

	</td>
	
<td ng-if="saledataillistinlist ==''"  align="right">

<span ng-if="x.importproduct_detail_date !=null && x.importproduct_detail_date < x.sale_adddate">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.importproduct_detail_num)+ParsefloatFunc(x.product_numreturn)-ParsefloatFunc(x.importproduct_detail_num_beforsale) | number}}
</span>

<span ng-if="x.importproduct_detail_date ==null">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.product_numreturn) | number}}
</span>

<span ng-if="x.importproduct_detail_date !=null && x.importproduct_detail_date > x.sale_adddate">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.importproduct_detail_num)+ParsefloatFunc(x.product_numreturn) | number}}
</span>

</td>
	
	
	<td  ng-if="saledataillistinlist ==''" align="right">{{x.product_numall | number}}</td>


			<td align="right" ng-if="saledataillistinlist !=''">
			






<table class="table table-hover"   style="font-size:12px;">
	<thead>
		<tr>
<th ><?=$lang_cusname?></th>
			<th ><?=$lang_productname?></th>
			<th><?=$lang_price?></th>
			<th><?=$lang_num?></th>
			<th><?=$lang_discount?></th>
			<th><?=$lang_sumall?></th>
			<th><?=$lang_day?></th>
			<th><?php echo $lang_branch;?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="y in saledataillistinlist" ng-if="x.product_id==y.product_id">
<td>{{y.cus_name}}</td>
			<td>{{y.product_name}}</td>
			<td>{{y.product_price | number:2}}</td>
			<td>{{y.product_sale_num | number}}</td>
			<td>-{{y.product_price_discount*y.product_sale_num | number:2}}</td>
			<td>{{(y.product_price*y.product_sale_num)-(y.product_price_discount*y.product_sale_num) |number:2}}</td>
			<td>{{y.adddate}}</td>
			<td class="text-center">
				<span ng-if="y.branch_name!=null">{{y.branch_name}}</span>
				<span ng-if="y.branch_name==null">-</span>
				</td>
		</tr>

	</tbody>
</table>








		</td>


<td ng-if="saledataillistinlist !=''"  align="right">


<span ng-if="x.importproduct_detail_date !=null && x.importproduct_detail_date < x.sale_adddate">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.importproduct_detail_num)+ParsefloatFunc(x.product_numreturn)-ParsefloatFunc(x.importproduct_detail_num_beforsale) | number}}
</span>

<span ng-if="x.importproduct_detail_date ==null">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.product_numreturn) | number}}
</span>

<span ng-if="x.importproduct_detail_date !=null && x.importproduct_detail_date > x.sale_adddate">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.importproduct_detail_num)+ParsefloatFunc(x.product_numreturn) | number}}
</span>


</td>





<td  ng-if="saledataillistinlist !=''" align="right">{{x.product_numall | number}}</td>

<td  align="right">


<span ng-if="x.importproduct_detail_date !=null && x.importproduct_detail_date < x.sale_adddate">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.importproduct_detail_num)+ParsefloatFunc(x.product_numreturn)-ParsefloatFunc(x.importproduct_detail_num_beforsale)-x.product_numall | number}}
</span>

<span ng-if="x.importproduct_detail_date ==null">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.product_numreturn)-x.product_numall | number}}
</span>

<span ng-if="x.importproduct_detail_date !=null && x.importproduct_detail_date > x.sale_adddate">
{{ParsefloatFunc(x.product_stock_num)+ParsefloatFunc(x.importproduct_detail_num)+ParsefloatFunc(x.product_numreturn)-x.product_numall | number}}
</span>



</td>





			<td align="right" ng-if="saledataillistinlist ==''">{{x.product_pricesaleall | number:2}}</td>
			<td align="right" style="color: red;" ng-if="saledataillistinlist ==''">-{{x.product_pricediscountall | number:2}}</td>
			<td align="right">{{x.product_priceall | number:2}}</td>



<td align="right">
<?php if($_SESSION['user_type']==4){?>
{{x.product_pricebaseall | number:2}}
<?php } ?>
</td>
<td align="right">
<?php if($_SESSION['user_type']==4){?>
{{x.product_priceall-x.product_pricebaseall | number:2}}
<?php } ?>
</td>
<td align="center">
<?php if($_SESSION['user_type']==4){?>
{{((x.product_priceall-x.product_pricebaseall)*100)/(x.product_pricebaseall) | number:2}} %
<?php } ?>
</td>

<td align="right">{{x.product_priceall-(x.sum_price_vat) | number:2}}</td>
<td align="right">{{x.sum_price_vat | number:2}}</td>

		</tr>

		<tr>
			<td colspan="3" align="right" ng-if="saledataillistinlist !=''"><?=$lang_all?></td>
<td colspan="3" align="right" ng-if="saledataillistinlist ==''"><?=$lang_all?></td>


			<td style="font-weight: bold;text-align: right;">
			{{ Sumnumall() | number }}</td>
			<td style="font-weight: bold;text-align: right;">
			
			</td>
			<td style="font-weight: bold;text-align: right;" ng-if="saledataillistinlist ==''">
			{{ Sumpricesaleall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;color: red;" ng-if="saledataillistinlist ==''">
			-{{ Sumpricediscountall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpriceall() | number:2 }}</td>



<td style="font-weight: bold;text-align: right;">
			<?php if($_SESSION['user_type']==4){?>
{{ Sumpricebaseall() | number:2 }}
<?php } ?>
</td>
<td style="font-weight: bold;text-align: right;">
	<?php if($_SESSION['user_type']==4){?>
			{{ Sumpriceall()-Sumpricebaseall() | number:2 }}
<?php } ?>
			</td>
<td style="font-weight: bold;text-align: right;">
			<?php if($_SESSION['user_type']==4){?>
	{{ ( ( Sumpriceall()-Sumpricebaseall() )*100 ) / Sumpricebaseall() | number:2 }} %
<?php } ?>
			</td>


<td style="font-weight: bold;text-align: right;">
				{{ Sumpriceall()-Sumvatall() | number:2 }}
			</td>
			
			<td style="font-weight: bold;text-align: right;">
				{{ Sumvatall() | number:2 }}
			</td>
			
			


		</tr>




<tr>
			<td colspan="3" ng-if="saledataillistinlist !=''">
			<button class="btn btn-default" ng-click="Opendiscountlastlist()">	<?=$lang_discountlast?>
			</button>
			</td>

			<td colspan="5" ng-if="saledataillistinlist ==''">
			<button class="btn btn-default" ng-click="Opendiscountlastlist()">	<?=$lang_discountlast?>
			</button>
			</td>
			
			


			<td></td>
			<td></td>
			<td style="text-align: right;color: red;">-{{discount_last | number:2}}</td>
<td colspan="3"></td>
<td style="text-align: right;color: red;"></td>
<td style="text-align: right;color: red;"></td>


		</tr>




<tr>
			<td colspan="5" style="text-align: right;color: green;font-weight: bold;" ng-if="saledataillistinlist !=''">
			<?=$lang_getmonetallsaleproduct?>
			</td>


			<td colspan="7" style="text-align: right;color: green;font-weight: bold;" ng-if="saledataillistinlist ==''">
			<?=$lang_getmonetallsaleproduct?>
			</td>





			<td style="text-align: right;color: green;font-weight: bold;">{{Sumpriceall()-discount_last | number:2}}</td>



<td style="font-weight: bold;text-align: right;">
		<?php if($_SESSION['user_type']==4){?>
	{{ Sumpricebaseall() | number:2 }}
<?php }?>
</td>

<td style="font-weight: bold;text-align: right;">
			<?php if($_SESSION['user_type']==4){?>
{{ Sumpriceall()-discount_last-Sumpricebaseall() | number:2 }}
<?php } ?>
</td>
<td style="font-weight: bold;text-align: right;">
			<?php if($_SESSION['user_type']==4){?>
	{{ ( ( Sumpriceall()-discount_last-Sumpricebaseall() )*100 ) / Sumpricebaseall() | number:2 }} %
<?php } ?>
			</td>


<td style="font-weight: bold;text-align: right;">
				{{ Sumpriceall()-Sumvatall() | number:2 }}
			</td>
			
			<td style="font-weight: bold;text-align: right;">
				{{ Sumvatall() | number:2 }}
			</td>

		</tr>










	</tbody>
</table>

</div>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>


	</div>

	</div>





<div class="modal fade" id="opensalelistdatail">
	<div class="modal-dialog modal-lg" style="width:70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_srp_9;?> {{data_product_name}}</h4>
			</div>
			<div class="modal-body">


<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?php echo $lang_list;?></th>
			<th><?php echo $lang_cusname;?></th>
			<th><?php echo $lang_productname;?></th>
			<th>Sale Runno</th>
			<th class="text-right"><?php echo $lang_price;?></th>
			<th class="text-right"><?php echo $lang_srp_10;?></th>
			<th class="text-right"><?php echo $lang_srp_11;?></th>
			<th class="text-right"><?php echo $lang_srp_12;?></th>
			<th class="text-right"><?php echo $lang_discount;?></th>
			<th class="text-right"><?php echo $lang_sumall;?></th>
			<th class="text-right"><?php echo $lang_saledate;?></th>
			<th class="text-right"><?php echo $lang_branch;?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in saledataillist">
			<td class="text-center">{{$index+1}}</td>
			<td>{{x.cus_name}}</td>
			<td>{{x.product_name}}</td>
			<td>{{x.sale_runno}}</td>
			<td class="text-right">{{x.product_price | number:2}}</td>
			<td class="text-right">{{x.product_stock_num | number}}</td>
			<td class="text-right">{{x.product_sale_num | number}}</td>
			
			<td class="text-right">{{x.product_stock_num-x.product_sale_num | number}}</td>
			<td class="text-right">{{x.product_price_discount*x.product_sale_num | number:2}}</td>
			<td class="text-right">{{(x.product_price-x.product_price_discount)*x.product_sale_num |number:2}}</td>
			<td class="text-right">{{x.adddate}}</td>
			<td class="text-center">
				<span ng-if="x.branch_name!=null">{{x.branch_name}}</span>
				<span ng-if="x.branch_name==null">-</span>
				</td>
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






<div class="modal fade" id="opendiscountlastlist">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_discountlast;?></h4>
			</div>
			<div class="modal-body">


<table class="table table-hover">
	<thead>
		<tr>
			<th><?php echo $lang_list;?></th>
			<th>Sale Runno</th>
			<th><?php echo $lang_discountlast;?></th>

			<th><?php echo $lang_day;?></th>
			<th><?php echo $lang_branch;?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in discountlastlist">
			<td>{{$index+1}}</td>
			<td><button class="btn btn-default btn-sm" ng-click="Getone(x)">{{x.sale_runno}}</button></td>
			<td>{{x.discount_last | number:2}}</td>
			<td>{{x.adddate}}</td>
			<td class="text-center">
				<span ng-if="x.branch_name!=null">{{x.branch_name}}</span>
				<span ng-if="x.branch_name==null">-</span>
				</td>
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






<div class="modal fade" id="openpawnlist">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ดอกรับฝากและตัดเงินต้น</h4>
			</div>
			<div class="modal-body">


<table class="table table-hover">
	<thead>
		<tr>
			<th>รายการ</th>
			<th>ชื่อสินค้า</th>
			<th>sn</th>
			<th>ดอก</th>
			<th>ตัดเงินต้น</th>
			<th>วันเวลา</th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in pawnlist">
			<td>{{$index+1}}</td>
			<td>{{x.product_name}}</td>
			<td>{{x.product_sn}}</td>
			<td>{{x.pawnadd_permoney | number:2}}</td>
			<td>{{x.pawnadd_cutmoney | number:2}}</td>
			<td>{{x.adddate}}</td>

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














<div class="modal fade" id="Openone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

			</div>
			<div class="modal-body">
<div class="modal-body" id="section-to-print2">
		<center>

<span  style="font-size: 20px;font-weight: bold;"><?php echo $lang_srp_13;?>:{{sale_runno}}</span>



<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?php echo $lang_list;?></th>
			<th><?=$lang_barcode?></th>
			<th><?=$lang_productname?></th>
			<th><?php echo $lang_detail;?></th>

			<th><?=$lang_pricesale?></th>
			<th><?=$lang_discountperunit?></th>
			<th><?=$lang_qty?></th>
			<th><?=$lang_all?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td>{{$index+1}}</td>
			<td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td style="width: 300px;">{{x.product_des}}</td>

			<td align="right">{{x.product_price | number:2}}</td>
			<td align="right">{{x.product_price_discount | number:2}}</td>
			<td align="right">{{x.product_sale_num | number}}</td>
			<td align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="6"  align="right" style="font-weight: bold;">
			<?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;">{{sumsale_price | number:2}}</td>



		</tr>

		<tr><td align="right" colspan="7"><?php echo $lang_discountlast;?></td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>

<tr><td align="right" colspan="7"><?php echo $lang_sumall;?></td>
		<td  style="font-weight: bold;" align="right">{{sumsale_price-discount_last2 | number:2}}</td></tr>


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


  </font>

			<script>



var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.saledataillistinlist = '';


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

$scope.dayfrom = '<?php echo date('d-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';



$scope.Opensalelistdatail = function(x){
$('#opensalelistdatail').modal('show');

$scope.data_product_name = x.product_name;

$http.post("Salereport/Salelistdatail",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext,
	product_id: x.product_id
	}).success(function(data){
$scope.saledataillist = data;

        });
};



$scope.Opensalelistdatailinlist = function(){
$http.post("Salereport/Salelistdatailinlist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.saledataillistinlist = data;

        });
};


$scope.Opensalelistdatailinlist_close = function(){

$scope.saledataillistinlist = '';


};



$scope.Opendiscountlastlist = function(){
$('#opendiscountlastlist').modal('show');

$http.post("Salereport/Discountlastlist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.discountlastlist = data;

        });
};





$scope.Openpawnlist = function(){
$('#openpawnlist').modal('show');

$http.post("Salereport/Pawnlist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.pawnlist = data;

        });
};




$scope.showproductvat = '0';
$scope.searchtext = '';
$scope.reportdaylist = function(){

$scope.daylist = false;

	$http.post("Reportsumary/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.discount_last = JSON.parse(data.data[0].discount_last);

        });

$http.post("Salereport/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext,
	showproductvat: $scope.showproductvat
	}).success(function(data){
	
$scope.daylist = data;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push({count: item.product_numall,name: item.product_name});
});

$scope.Chart($scope.datac);


        });
};
$scope.reportdaylist();



 $scope.Sumnumall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.product_numall != null){
	 product_numall = item.product_numall;
	 }else{
     product_numall = 0;
	 }
total += parseInt(product_numall);
 });
    return total;
};

 $scope.Sumpricesaleall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.product_pricesaleall != null){
	 product_pricesaleall = item.product_pricesaleall;
	 }else{
     product_pricesaleall = 0;
	 }
total += parseInt(product_pricesaleall);
 });
    return total;
};




 $scope.Sumvatall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.sum_price_vat != null){
	 price_vat = item.sum_price_vat;
	 }else{
     price_vat = 0;
	 }
total += parseFloat(price_vat);
 });
    return total;
};





 $scope.Sumpricediscountall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.product_pricediscountall != null){
	 product_pricediscountall = item.product_pricediscountall;
	 }else{
     product_pricediscountall = 0;
	 }
total += parseFloat(product_pricediscountall);
 });
    return total;
};

 $scope.Sumpriceall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.product_priceall != null){
	 product_priceall = item.product_priceall;
	 }else{
     product_priceall = 0;
	 }
total += parseFloat(product_priceall);
 });
    return total;
};

 $scope.Sumpricebaseall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){

if(item.product_priceall != null){

	 if(item.product_pricebaseall != null){
	 product_pricebaseall = item.product_pricebaseall;
	 }else{
     product_pricebaseall = 0;
	 }

	}else{
     product_pricebaseall = 0;
	 }

total += parseFloat(product_pricebaseall);
 });
    return total;
};






$scope.DownloadExcel = function(){

$http.post("Salereport/excel",{
	'excel': '1',
	'dayfrom': $scope.dayfrom || '',
	'dayto': $scope.dayto || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


$scope.datac = [];


$scope.Chart = function(datac){
$('#bar').empty();
Morris.Bar({
  element: 'bar',
  data: datac,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['ຈຳນວນ'],
  barColors: function (row, series, type) {
    if (type === 'bar') {
     var letters = '0123456789ABCDEF';
    var color = '<?php echo $_SESSION['color_theme'];?>';
    /*var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }*/
    return color;
    }
  }

});
};

$scope.Openchart = function(){
$scope.showchart = true;
};

$scope.Opentable = function(){
$scope.showchart = false;
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
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
        });

};




$scope.ParsefloatFunc = function(data){
	if(data != null){
return parseFloat(data);
	}else{
		return 0;
	}
};



});

</script>