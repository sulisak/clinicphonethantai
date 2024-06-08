
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" name="" placeholder="<?=$lang_search?>" ng-model="searchproduct" class="form-control">
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

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>
<hr />



	<div id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;" ng-if="saledataillistinlist ==''"><?=$lang_productname?></th>
			<th style="text-align: center;"><?=$lang_saletotal?>

<button ng-if="saledataillistinlist ==''" class="btn btn-default" title="เปิดแสดงราคาขายสินค้า" ng-click="Opensalelistdatailinlist()">+</button>


<button ng-if="saledataillistinlist !=''" class="btn btn-default" title="ปิดการแสดงราคาขายสินค้า" ng-click="Opensalelistdatailinlist_close()">-</button>

			</th>
			<th style="text-align: center;" ng-if="saledataillistinlist ==''"><?=$lang_cansale?></th>
			<th style="text-align: center;" ng-if="saledataillistinlist ==''"><?=$lang_discount?></th>
			<th style="text-align: center;"><?=$lang_revenue?></th>
			 <th style="text-align: center;"><?=$lang_cost?></th>
			<th style="text-align: center;"><?=$lang_profitlost?></th>
			<th style="text-align: center;" ng-if="saledataillistinlist ==''">ROI</th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist | filter:searchproduct">
		<td>{{x.product_code}}</td>


			<td ng-if="saledataillistinlist ==''">

			<button class="btn btn-default" ng-click="Opensalelistdatail(x)">
			{{x.product_name}}
		</button>

	</td>
			<td align="right">
			{{x.product_numall | number}}






<table class="table table-hover" ng-show="saledataillistinlist !=''"  style="font-size:12px;">
	<thead>
		<tr>
<th >ลูกค้า</th>
			<th >ชื่อสินค้า</th>
			<th>ราคาขาย</th>
			<th>จำนวน</th>
			<th>ส่วนลดสินค้า</th>
			<th>สุทธิ</th>
			<th>วันเวลาที่ขาย</th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="y in saledataillistinlist" ng-if="x.product_id==y.product_id">
<td>{{y.cus_name}}</td>
			<td>{{y.product_name}}</td>
			<td>{{y.product_price | number:2}}</td>
			<td>{{y.product_sale_num | number}}</td>
			<td>{{y.product_price_discount*y.product_sale_num | number:2}}</td>
			<td>{{(y.product_price*y.product_sale_num)-(y.product_price_discount*y.product_sale_num) |number:2}}</td>
			<td>{{y.adddate}}</td>
		</tr>

	</tbody>
</table>








		</td>




			<td align="right" ng-if="saledataillistinlist ==''">{{x.product_pricesaleall | number:2}}</td>
			<td align="right" style="color: red;" ng-if="saledataillistinlist ==''">{{x.product_pricediscountall | number:2}}</td>
			<td align="right">{{x.product_priceall | number:2}}</td>
			 <td align="right">{{x.product_pricebaseall*x.product_numall | number:2}}</td>
<td align="right">{{x.product_priceall-(x.product_pricebaseall*x.product_numall) | number:2}}</td>
			<td align="center" ng-if="saledataillistinlist ==''">{{((x.product_priceall-(x.product_pricebaseall*x.product_numall))*100)/(x.product_pricebaseall*x.product_numall) | number:2}} %</td>

		</tr>

		<tr>
			<td  align="right" ng-if="saledataillistinlist !=''"><?=$lang_all?></td>
<td colspan="2" align="right" ng-if="saledataillistinlist ==''"><?=$lang_all?></td>


			<td style="font-weight: bold;text-align: right;">
			{{ Sumnumall() | number }}</td>
			<td style="font-weight: bold;text-align: right;" ng-if="saledataillistinlist ==''">
			{{ Sumpricesaleall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;color: red;" ng-if="saledataillistinlist ==''">
			{{ Sumpricediscountall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpriceall() | number:2 }}</td>
			 <td style="font-weight: bold;text-align: right;">
			{{ Sumpricebaseall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
				{{ Sumpriceall()-Sumpricebaseall() | number:2 }}
			</td>
			<td style="font-weight: bold;text-align: right;" ng-if="saledataillistinlist ==''">
				{{ ( ( Sumpriceall()-Sumpricebaseall() )*100 ) / Sumpricebaseall() | number:2 }} %
			</td>
		</tr>




<!-- <tr>
			<td colspan="2" ng-if="saledataillistinlist !=''">
			<button class="btn btn-default" ng-click="Opendiscountlastlist()">	ส่วนลดท้ายบิล จากการขายสินค้า
			</button>
			</td>

			<td colspan="5" ng-if="saledataillistinlist ==''">
			<button class="btn btn-default" ng-click="Opendiscountlastlist()">	ส่วนลดท้ายบิล จากการขายสินค้า
			</button>
			</td>


			<td style="text-align: right;color: red;">{{discount_last | number:2}}</td>


		</tr> -->




<tr>
			<td colspan="2" style="text-align: right;color: green;font-weight: bold;" ng-if="saledataillistinlist !=''">
				รายรับรวม จากการขายสินค้า
			</td>


			<td colspan="5" style="text-align: right;color: green;font-weight: bold;" ng-if="saledataillistinlist ==''">
				รายรับรวม จากการขายสินค้า
			</td>





			<td style="text-align: right;color: green;font-weight: bold;">{{Sumpriceall() | number:2}}</td>

			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricebaseall() | number:2 }}</td>

			<td style="font-weight: bold;text-align: right;">
			{{ Sumpriceall()-Sumpricebaseall() | number:2 }}</td>


<td style="font-weight: bold;text-align: right;" ng-if="saledataillistinlist ==''">
				{{ ( ( Sumpriceall()-Sumpricebaseall() )*100 ) / Sumpricebaseall() | number:2 }} %
			</td>


		</tr>




<tr ng-if="pawnadd_permoney !=null">
	<td colspan="3" ng-if="saledataillistinlist !=''"></td>
	<td colspan="6" ng-if="saledataillistinlist ==''"></td>
</tr>


		<tr ng-if="pawnadd_permoney !=null">
	<td colspan="2" ng-if="saledataillistinlist !=''">
		<button class="btn btn-default" ng-click="Openpawnlist()">
	รายได้จากดอกเบี้ย(รับฝาก)
	</button>
</td>

<td colspan="5" ng-if="saledataillistinlist ==''">
		<button class="btn btn-default" ng-click="Openpawnlist()">
	รายได้จากดอกเบี้ย(รับฝาก)
	</button>
</td>


			<td style="text-align: right;">{{pawnadd_permoney | number:2}}</td>

		</tr>

		<tr ng-if="pawnadd_cutmoney !=null">
			<td colspan="2" ng-if="saledataillistinlist !=''">
				รายรับจากลูกค้ามาตัดเงินต้น(รับฝาก)
			</td>

			<td colspan="5" ng-if="saledataillistinlist ==''">
				รายรับจากลูกค้ามาตัดเงินต้น(รับฝาก)
			</td>


			<td style="text-align: right;">{{pawnadd_cutmoney | number:2}}</td>
		</tr>



<tr ng-if="pawnadd_cutmoney !=null">
			<td colspan="2" style="text-align: right;" ng-if="saledataillistinlist !=''">
				รายรับจากการรับฝาก
			</td>

			<td colspan="5" style="text-align: right;" ng-if="saledataillistinlist ==''">
				รายรับจากการรับฝาก
			</td>


			<td style="text-align: right;font-weight: bold;">
			{{pawnadd_permoney+pawnadd_cutmoney | number:2}}</td>
		</tr>


<tr ng-if="pawnadd_permoney !=null">
	<td colspan="3" ng-if="saledataillistinlist !=''"></td>
	<td colspan="6" ng-if="saledataillistinlist ==''"></td>
</tr>


<tr ng-if="pawnadd_cutmoney !=null">
			<td colspan="2" style="text-align: right;color: green;font-weight: bold;" ng-if="saledataillistinlist !=''">
				รายรับรวม
			</td>
			<td colspan="5" style="text-align: right;color: green;font-weight: bold;" ng-if="saledataillistinlist ==''">
				รายรับรวม(ไม่รวมลูกค้ามาตัดเงินต้นรับฝาก)
			</td>

			<td style="text-align: right;color: green;font-weight: bold;">
			{{Sumpriceall()-discount_last+pawnadd_permoney | number:2}}</td>

			<td style="font-weight: bold;text-align: right;color: green;">
			{{ Sumpricebaseall() | number:2 }}</td>

			<td style="font-weight: bold;text-align: right;color: green;">
			{{ (Sumpriceall()-discount_last+pawnadd_permoney) - Sumpricebaseall() | number:2 }}</td>



			<td style="font-weight: bold;text-align: right;" ng-if="saledataillistinlist ==''">
							{{ ( ( (Sumpriceall()-discount_last+pawnadd_permoney) - Sumpricebaseall() )*100 ) / Sumpricebaseall() | number:2 }} %
						</td>



		</tr>









	</tbody>
</table>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>


	</div>

	</div>





<div class="modal fade" id="opensalelistdatail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ราคาขายสินค้า {{data_product_name}}</h4>
			</div>
			<div class="modal-body">


<table class="table table-hover">
	<thead>
		<tr>
			<th>รายการ</th>
			<th>ชื่อสินค้า</th>
			<th>ราคาขาย</th>
			<th>จำนวน</th>
			<th>ส่วนลดสินค้า</th>
			<th>สุทธิ</th>
			<th>วันเวลาที่ขาย</th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in saledataillist">
			<td>{{$index+1}}</td>
			<td>{{x.product_name}}</td>
			<td>{{x.product_price | number:2}}</td>
			<td>{{x.product_sale_num | number}}</td>
			<td>{{x.product_price_discount | number:2}}</td>
			<td>{{(x.product_price*x.product_sale_num)-x.product_price_discount |number:2}}</td>
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






<div class="modal fade" id="opendiscountlastlist">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ส่วนลดท้ายบิล</h4>
			</div>
			<div class="modal-body">


<table class="table table-hover">
	<thead>
		<tr>
			<th>รายการ</th>
			<th>Sale Runno</th>
			<th>ส่วนลดท้ายบิล</th>

			<th>วันที่</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in discountlastlist">
			<td>{{$index+1}}</td>
			<td><button class="btn btn-default btn-sm" ng-click="Getone(x)">{{x.sale_runno}}</button></td>
			<td>{{x.discount_last | number:2}}</td>
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

<span  style="font-size: 20px;font-weight: bold;">รายการขายสินค้า Runno:{{sale_runno}}</span>



<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th>รายการ</th>
			<th><?=$lang_barcode?></th>
			<th><?=$lang_productname?></th>
			<th>รายละเอียด</th>

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

		<tr><td align="right" colspan="7">ส่วนลด</td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>

<tr><td align="right" colspan="7">สุทธิ</td>
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
	product_id: x.product_id
	}).success(function(data){
$scope.saledataillist = data;

        });
};



$scope.Opensalelistdatailinlist = function(){
$http.post("Salereport/Salelistdatailinlist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
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
	dayto: $scope.dayto
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






$scope.reportdaylist = function(){



$http.post("<?php echo $base_url;?>/pawn/pawnreport/Daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.pawnadd_cutmoney = JSON.parse(data[0].pawnadd_cutmoney);
$scope.pawnadd_permoney = JSON.parse(data[0].pawnadd_permoney);


        });




	$http.post("Reportsumary/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.discount_last = JSON.parse(data.data[0].discount_last);

        });




$http.post("Salereport/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.daylist = data;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push({count: item.product_priceall,name: item.product_name});
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

 $scope.Sumpricediscountall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.product_pricediscountall != null){
	 product_pricediscountall = item.product_pricediscountall;
	 }else{
     product_pricediscountall = 0;
	 }
total += parseInt(product_pricediscountall);
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
total += parseInt(product_priceall);
 });
    return total;
};

 $scope.Sumpricebaseall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){

if(item.product_priceall != null){

	 if(item.product_pricebaseall != null){
	 product_pricebaseall = item.product_numall*item.product_pricebaseall;
	 }else{
     product_pricebaseall = 0;
	 }

	}else{
     product_pricebaseall = 0;
	 }

total += parseInt(product_pricebaseall);
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
  labels: ['<?=$lang_revenue?>'],
  barColors: function (row, series, type) {
    if (type === 'bar') {
     var letters = '0123456789ABCDEF';
    var color = '#f0ad4e';
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








});

</script>
