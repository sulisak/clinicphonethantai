<font style="font-family:Phetsarath OT!important">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" name="" placeholder="<?=$lang_search?> <?php echo $lang_branch;?>" ng-model="searchtext" ng-change="reportdaylist()" class="form-control">
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

</form>


<hr />
<center>
	<img ng-if="!daylist" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<div id="openprint_table">

<center><b><h1><?php echo $lang_rpsm_1;?></b></h1> 
	<b><h2>{{searchtext}}</h2></b>
	{{dayfrom}} <?php echo $lang_to;?> {{dayto}} </center>
 
 
<table ng-if="daylist" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">

			<th style="text-align: center;"><?=$lang_saletotal?></th>
			<th style="text-align: center;"><?php echo $lang_rpsm_2;?></th>
			<th style="text-align: center;"><?=$lang_discountlast?></th>
			<th style="text-align: center;"><?php echo $lang_rpsm_3;?></th>
			<th style="text-align: center;"><?php echo $lang_rpsm_4;?></th>
			<!-- <th style="text-align: center;"><?=$lang_cost?></th>
			<th style="text-align: center;"><?=$lang_profitlost?></th> -->


		</tr>
	</thead>
	<tbody>
		<tr>

			<td align="right">{{allnum | number}}</td>
			<td align="right">{{getmoneyall | number:2}}</td>
			<td align="right">-{{discount_last | number:2}}</td>
			<td align="right">-{{money_from_customer | number:2}}</td>
			<td align="right">{{getmoneyall-discount_last-money_from_customer | number:2}}</td>
			<!-- <td align="right">{{cost | number:2}}</td>
<td align="right">{{(getmoneyall-discount_item-discount_last)-cost | number:2}}</td> -->


		</tr>


	</tbody>
</table>







<table ng-if="daylist" class="table table-hover table-bordered" style="width: 100%;">
	<thead>
		<tr class="trheader">
		<th><?=$lang_waypayment?></th>
		<th><?=$lang_revenue?></th>
	</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in openbillclosedaylistc">
			<td style="font-weight: bold;">
			<span ng-repeat="y in pay_type_list" ng-if="x.pay_type==y.pay_type_id">{{y.pay_type_name}}</span>

		</td>

			<td align="right" ng-if="x.pay_type=='1'">
			{{x.sumsale_price2-money_changeto_customer | number:2}}</td>
			
			<td align="right" ng-if="x.pay_type!='1'">{{x.sumsale_price2 | number:2}}</td>
			
			
		</tr>
		
		
		<tr>
		<td align="right" style="font-weight:bold;"><?php echo $lang_all;?></td>
		<td align="right" style="font-weight:bold;">{{Summary_pay_type()-money_changeto_customer | number:2}}</td>
		</tr>
		
	
		
		
		<tr>
		<td align="right"><?php echo $lang_rpsm_3;?></td>
		<td align="right">-{{money_from_customer | number:2}}</td>
		</tr>

		<tr>
		<td align="right" style="font-weight:bold;"><?php echo $lang_rpsm_4;?></td>
		<td align="right" style="font-weight:bold;">{{Summary_pay_type()-money_from_customer-money_changeto_customer | number:2}}</td>
		</tr>
		
     </tbody>
</table>





<table ng-if="pawnadd_permoney!=null && pawnadd_cutmoney!=null" class="table table-hover" style="font-size: 18px;font-weight: bold;">
	<thead>
		<tr>
			<th>รายได้จากดอกเบี้ย(รับฝาก)</th>
			<th>รายได้จากตัดเงินต้น(รับฝาก)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{pawnadd_permoney | number:2}}</td>
			<td>{{pawnadd_cutmoney | number:2}}</td>
		</tr>
	</tbody>
</table>




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




$scope.getpaytype = function(){
   
$http.get('<?php echo $base_url;?>/salesetting/pay_type/get')
       .then(function(response){
          $scope.pay_type_list = response.data.list; 
                 
        });
   };
$scope.getpaytype();




$scope.searchtext = '';
$scope.reportdaylist = function(){

$scope.daylist = false;

$http.post("Reportsumary/Openbillclosedaylistc",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext
	}).success(function(data){

     $scope.openbillclosedaylistc = data;

        });









$http.post("Reportsumary/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.getmoneyall = JSON.parse(data.data[0].getmoneyall);
$scope.discount_last = JSON.parse(data.data[0].discount_last);
$scope.allnum = JSON.parse(data.data[0].num);
$scope.money_from_customer = JSON.parse(data.data[0].money_from_customer);
$scope.money_changeto_customer = JSON.parse(data.data[0].money_changeto_customer);
$scope.daylist = true;
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




 $scope.Summary_pay_type = function(){
var total = 0;

 angular.forEach($scope.openbillclosedaylistc,function(item){
	 if(item.sumsale_price2 != null){
	 sumsale_price2 = item.sumsale_price2;
	 }else{
     sumsale_price2 = 0;
	 }
total += parseFloat(sumsale_price2);
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


});

</script>
