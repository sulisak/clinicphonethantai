
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<!-- <div class="form-group">

<select class="form-control" ng-model="supplier_id" ng-change="Selectsup(supplier_id)">
	<option value="0"><?=$lang_selectsupplier?></option>
	<option ng-repeat="x in supplierlist" value="{{x.supplier_id}}">
						{{x.supplier_name}}
					</option>
</select>

</div> -->
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

<!-- <center ng-if="supplier_id=='0'">
<h1><?=$lang_selectsupplierplz?></h1>
</center> -->

<div  id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">


			<th style="text-align: center;">Vendor/Brand</th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"><?=$lang_saletotal?></th>
			<th style="text-align: center;"><?=$lang_cansale?></th>
			<th style="text-align: center;"><?=$lang_discount?></th>
			<th style="text-align: center;"><?=$lang_revenue?></th>
			<th style="text-align: center;"><?=$lang_cost?></th>
			<th style="text-align: center;"><?=$lang_profitlost?></th>
			<th style="text-align: center;">ROI</th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist">

			<td>{{x.supplier_name}}</td>
		<td>{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td align="right">{{x.product_numall | number}}</td>
			<td align="right">{{x.product_pricesaleall | number:2}}</td>
			<td align="right">{{x.product_pricediscountall | number:2}}</td>
			<td align="right">{{x.product_priceall | number:2}}</td>
			<td align="right">{{x.product_pricebaseall*x.product_numall | number:2}}</td>
<td align="right">{{x.product_priceall-(x.product_pricebaseall*x.product_numall) | number:2}}</td>
			<td align="center">{{((x.product_priceall-(x.product_pricebaseall*x.product_numall))*100)/(x.product_pricebaseall*x.product_numall) | number:2}} %</td>

		</tr>

		<tr>
			<td colspan="3" align="right"><?=$lang_all?></td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumnumall() | number }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricesaleall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricediscountall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpriceall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricebaseall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
				{{ Sumpriceall()-Sumpricebaseall() | number:2 }}
			</td>
			<td style="font-weight: bold;text-align: right;">
				{{ ( ( Sumpriceall()-Sumpricebaseall() )*100 ) / Sumpricebaseall() | number:2 }} %
			</td>
		</tr>
	</tbody>
</table>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>


	</div>

	</div>

	</div>




			<script>

var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.supplier_id = '0';

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



$scope.getsupplier = function(){

$http.get('<?php echo $base_url;?>/warehouse/Supplier/getlist')
       .then(function(response){
          $scope.supplierlist = response.data.list;

        });
   };
$scope.getsupplier();




$scope.reportdaylist = function(){
$http.post("Supplierreport/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	supplier_id: $scope.supplier_id
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


$scope.Selectsup = function(){
$scope.reportdaylist();
};



$scope.DownloadExcel = function(){

$http.post("Supplierreport/excel",{
	'excel': '1',
	'dayfrom': $scope.dayfrom || '',
	'dayto': $scope.dayto || '',
	'supplier_id': $scope.supplier_id
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


});

</script>
