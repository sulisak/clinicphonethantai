<font style="font-family: Phetsarath OT !important;">
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


<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>


<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>
<hr />

<div id="openprint_table">


<center>
<img ng-if="!daylist" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

	<div id="bar"></div>

<hr />
<table ng-if="daylist" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">

			<th style="text-align: center;"><?=$lang_category?></th>
			<th style="text-align: center;"><?=$lang_saletotal?></th>
			<th style="text-align: center;"><?=$lang_cansale?></th>
			<th style="text-align: center;"><?=$lang_discount?></th>
			<th style="text-align: center;"><?=$lang_revenue?></th>


		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist | filter:searchproduct">

			<td>
			<span ng-if="x.product_category_id=='0'">{{x.product_category_name}}</span>
			<button ng-if="x.product_category_id>'0'" class="btn btn-warning" ng-click="Opensalelistdatail(x)">
				{{x.product_category_name}}</button>
				
				</td>
			<td align="right">{{x.product_numall | number}}</td>
			<td align="right">{{x.product_pricesaleall | number:2}}</td>
			<td align="right">{{x.product_pricediscountall | number:2}}</td>

			<td align="right">{{x.product_pricesaleall-x.product_pricediscountall | number:2}}</td>
		</tr>

		<tr>
			<td align="right"><?=$lang_all?></td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumnumall() | number }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricesaleall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricediscountall() | number:2 }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpriceall() | number:2 }}</td>

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

<center><h2 class="modal-title"><?php echo $lang_srpc_1;?> {{data_cus_name}}</h2>
	{{dayfrom}} <?php echo $lang_to;?> {{dayto}}
	</center>
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?php echo $lang_list;?></th>
			<th><?php echo $lang_barcode;?></th>
			<th><?php echo $lang_productname;?></th>
			<th class="text-right"><?php echo $lang_qty;?></th>
			<th class="text-right"><?php echo $lang_allsaleprice;?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in saledataillist">
			<td class="text-center">{{$index+1}}</td>
			<td>{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td class="text-right">{{x.product_sale_num | number}}</td>
			<td class="text-right">{{x.priceall |number:2}}</td>
		
		</tr>

<tr>
<td colspan="3" class="text-right"><b><?php echo $lang_all;?></b></td>
<td class="text-right"><b>{{Sumnum() | number}}</b></td>
			<td class="text-right"><b>{{Sumpriceallcat() | number:2}}</b></td>
			
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








$scope.reportdaylist = function(){
	$scope.daylist = false;
$http.post("Salereportcat/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.daylist = data;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push({count: item.product_priceall,name: item.product_category_name});
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




$scope.Sumnum = function(){
var total = 0;

 angular.forEach($scope.saledataillist,function(item){
total += parseFloat(item.product_sale_num);
 });
    return total;
};

$scope.Sumpriceallcat = function(){
var total = 0;

 angular.forEach($scope.saledataillist,function(item){
total +=  item.priceall;
 });
    return total;
};



$scope.Opensalelistdatail = function(x){
$('#opensalelistdatail').modal('show');

$scope.data_cus_name = x.product_category_name;

$http.post("Salereportcat/Salelistdatail",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext,
	cat_id: x.product_category_id
	}).success(function(data){
$scope.saledataillist = data;

        });
};





$scope.DownloadExcel = function(){

$http.post("Salereportcat/excel",{
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
