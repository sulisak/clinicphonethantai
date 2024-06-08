<font style="font-family:Phetsarath OT!important">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" name="" placeholder="<?=$lang_search?> <?php echo $lang_cusname;?>" ng-model="searchtext" ng-change="reportdaylist()" class="form-control">
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
	<b><h1><?php echo $lang_scrp_1;?></b></h1>
	<b><h2>{{searchtext}}</b></h2>
	{{dayfrom}} ถึง {{dayto}} 
	
	</center>
 


<div id="bar"></div>


<hr />
<table ng-if="daylist" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;text-align: center;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_cusname?></th>
			<th style="text-align: center;width: 150px;"><?=$lang_salenumall?></th>
			<th style="text-align: center;width: 150px;"><?=$lang_salepriceall?></th>
			<th style="text-align: center;width: 150px;"><?php echo $lang_discount;?></th>
			<th style="text-align: center;width: 150px;"><?php echo $lang_sumall;?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist">
		<td>{{$index+1}}</td>
		<td><button class="btn btn-warning" ng-click="Opensalelistdatail(x)">{{x.cus_name}}</button></td>
			<td align="right">{{x.salenum | number}}</td>
			<td align="right">{{x.saleprice | number:2}}</td>
			<td align="right">{{x.discount_last | number:2}}</td>
			<td align="right">{{x.saleprice-x.discount_last | number:2}}</td>

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
			<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv2()"><?=$lang_print?></button>
</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body" id="openprint2">

<center><h2 class="modal-title"><?php echo $lang_scrp_2;?> {{data_cus_name}}</h2>
	{{dayfrom}} <?php echo $lang_to;?> {{dayto}}
	</center>
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?php echo $lang_list;?></th>
			<th><?php echo $lang_cusname;?></th>
			<th><?php echo $lang_productname;?></th>
			<th class="text-right"><?php echo $lang_price;?></th>
			<th class="text-right"><?php echo $lang_qty;?></th>
			<th class="text-right"><?php echo $lang_discount;?></th>
			<th class="text-right"><?php echo $lang_sumall;?></th>
			<th class="text-right"><?php echo $lang_scrp_3;?></th>
			<th class="text-right">No.Bill</th>
			<th class="text-right"><?php echo $lang_branch;?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in saledataillist">
			<td class="text-center">{{$index+1}}</td>
			<td>{{x.cus_name}}</td>
			<td>{{x.product_name}}</td>
			<td class="text-right">{{x.product_price | number:2}}</td>
			<td class="text-right">{{x.product_sale_num | number}}</td>
			<td class="text-right">{{x.product_price_discount*x.product_sale_num | number:2}}</td>
			<td class="text-right">{{(x.product_price-x.product_price_discount)*x.product_sale_num |number:2}}</td>
			<td class="text-right">{{x.adddate}}</td>
			<td class="text-right">{{x.sale_runno}}</td>
			<td class="text-center">
				<span ng-if="x.branch_name!=null">{{x.branch_name}}</span>
				<span ng-if="x.branch_name==null">-</span>
				</td>
		</tr>

<tr>
<td colspan="4" class="text-right"><b><?php echo $lang_all;?></b></td>
<td class="text-right"><b>{{Sumnum() | number}}</b></td>
<td class="text-right"></td>
			<td class="text-right"><b>{{Sumpriceall() | number:2}}</b></td>
			<td class="text-right"></td>
			<td class="text-right"></td>
			<td class="text-right"></td>
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


	
	
	</div>

</font>


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




$scope.Opensalelistdatail = function(x){
$('#opensalelistdatail').modal('show');

$scope.data_cus_name = x.cus_name;

$http.post("Salecustomerreport/Salelistdatail",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext,
	cus_id: x.cus_id
	}).success(function(data){
$scope.saledataillist = data;

        });
};


$scope.searchtext = '';
$scope.reportdaylist = function(){
	$scope.daylist = false;
$http.post("Salecustomerreport/daylist",{
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
