
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" name="" placeholder="<?=$lang_search?> <?php echo $lang_productname;?> <?php echo $lang_barcode;?>" ng-model="searchtext" ng-change="reportdaylist()" class="form-control">
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
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>
<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>

<center>
<img ng-if="!daylist" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<div id="openprint_table">
<center>
	<b><h1><?php echo $lang_pdns_1;?></b></h1>
	<b><h2>{{searchtext}}</b></h2>
	{{dayfrom}} <?php echo $lang_to;?> {{dayto}} 
	
	</center>
 


<hr />
<table ng-if="daylist" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;text-align: center;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?php echo $lang_barcode;?></th>
		<th style="text-align: center;"><?php echo $lang_productname;?></th>
			<th style="text-align: center;width: 150px;"><?php echo $lang_pdns_2;?></th>
			<th style="text-align: center;width: 150px;"><?php echo $lang_pdns_3;?></th>
			<th style="text-align: center;width: 150px;"><?php echo $lang_unit;?></th>
			

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist">
		<td>{{$index+1}}</td>
		<td>{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td align="right">{{x.product_stock_num}}</td>
			<td align="right">{{x.salenum}}</td>
			<td align="center">{{x.product_unit_name}}</td>

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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	</div>




			<script>


var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


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






$scope.searchtext = '';
$scope.reportdaylist = function(){
	$scope.daylist = false;
$http.post("productnotsale/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.daylist = data;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push({count: item.saleprice,name: item.cus_name});
});

$scope.Chart($scope.datac);


        });
};
$scope.reportdaylist();


$scope.Sumprice = function(){
var total = 0;

 angular.forEach($scope.saledataillist,function(item){
total +=  parseFloat(item.product_price);
 });
    return total;
};


$scope.Sumnum = function(){
var total = 0;

 angular.forEach($scope.saledataillist,function(item){
total += parseFloat(item.product_sale_num);
 });
    return total;
};


$scope.Sumdiscount = function(){
var total = 0;

 angular.forEach($scope.saledataillist,function(item){
total +=  parseFloat(item.product_price_discount);
 });
    return total;
};




$scope.Sumpriceall = function(){
var total = 0;

 angular.forEach($scope.saledataillist,function(item){
total +=  ((item.product_price-item.product_price_discount)*item.product_sale_num) ;
 });
    return total;
};




$scope.DownloadExcel = function(){

$http.post("Salecustomerreport/excel",{
	'excel': '1',
	'dayfrom': $scope.dayfrom || '',
	'dayto': $scope.dayto || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


$scope.DownloadExcelcus = function(cus_id){

$http.post("Salecustomerreport/excelcus",{
	'excel': '1',
	'cus_id': cus_id,
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
  labels: ['<?=$lang_salepriceall?>'],
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


});

</script>
