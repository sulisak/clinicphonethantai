
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">

<div class="form-group">
<input type="text" ng-model="searchtext" ng-change="reportdaylist()" class="form-control" placeholder="<?=$lang_search?>" style="width: 300px;">
</div>

<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>" ng-disabled="shift_id!=''"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>" ng-disabled="shift_id!=''">
</div>

<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>

</form>
<hr />


<div id="openprint_table">


<div ng-if="showloading">
	<center>
	
	<?php echo $lang_pceprp_1;?>
</center>
</div>

<center><?php echo $lang_pceprp_2;?> {{dayfrom}} <?php echo $lang_to;?> {{dayto}} 
<br />
<span ng-if="searchtext!=''"><?php echo $lang_lopc_2;?>:<b> {{searchtext}}</b></span>
</center>

	<div id="bar"></div>


<hr />
<table ng-hide="showloading" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">

			<th style="text-align: center;"><?php echo $lang_productname;?></th>
			<th style="text-align: center;"><?php echo $lang_category;?></th>
			<th style="text-align: center;"><?php echo $lang_qty;?></th>
			<th style="text-align: center;"><?php echo $lang_pceprp_3;?></th>

			<!-- <th style="text-align: center;">ROI</th> -->

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist | filter:searchproduct">

			<td><button class="btn btn-default" ng-click="Opensalelistdatail(x)">
			{{x.product_name}}
		</button></td>
		<td>
			{{x.product_category_name}}
		</td>
			<td align="right">{{x.product_numall | number}}</td>
			<td align="right">{{x.product_priceexpenall | number:2}}</td>


			<!-- <td align="center">{{((x.product_priceall-(x.product_pricebaseall*x.product_numall))*100)/(x.product_pricebaseall*x.product_numall) | number:2}} %</td> -->

		</tr>

		<tr>
			<td colspan="2"  align="right"><?=$lang_all?></td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumnumall() | number }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricesaleall() | number:2 }}</td>

			<!-- <td style="font-weight: bold;text-align: right;">
				{{ ( ( Sumpriceall()-Sumpricebaseall() )*100 ) / Sumpricebaseall() | number:2 }} %
			</td> -->
		</tr>








	</tbody>
</table>



</div>






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
				<h4 class="modal-title"><?php echo $lang_pceprp_4;?> {{data_product_name}}</h4>
			</div>
			<div class="modal-body">


<table class="table table-hover" id="headerTable2">
	<thead>
		<tr>
			<th><?php echo $lang_rank;?></th>
			<th>No</th>
			<th><?php echo $lang_lopc_2;?></th>
			<th><?php echo $lang_pceprp_5;?></th>
			<th><?php echo $lang_price;?></th>
			<th><?php echo $lang_all;?></th>
			<th><?php echo $lang_pceprp_6;?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in saledataillist">
			<td>{{$index+1}}</td>
			<td>{{x.importproduct_header_code}}</td>
			<td>{{x.vendor_name}}</td>
			<td>{{x.price_per_num | number:2}}</td>
			<td>{{x.importproduct_detail_num | number}}</td>
			<td>{{(x.price_per_num*x.importproduct_detail_num) |number:2}}</td>
			<td>{{x.adddate}}</td>
		</tr>







	</tbody>
</table>
<hr />
<button id="btnExport2" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>

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

<span  style="font-size: 20px;font-weight: bold;"><?php echo $lang_pceprp_7;?>:{{sale_runno}}</span>



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




			<script>



var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$("#dayfrom").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$("#dayto").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.dayfrom = '<?php echo date('01-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';

$scope.shift_id = '';


$scope.searchtext = '';

$scope.product_category_id = '';


$scope.Opensalelistdatail = function(x){
$('#opensalelistdatail').modal('show');

$scope.data_product_name = x.product_name;

$http.post("Expen_report/Expenlistdatail",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	product_id: x.product_id,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.saledataillist = data;

        });
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









$scope.reportdaylist = function(){

$scope.showloading = true;
$scope.daylist =[];
$scope.datac = [];



$http.post("Expen_report/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.daylist = data;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push({count: item.product_priceexpenall,name: item.product_name});
});

$scope.Chart($scope.datac);

$scope.showloading = false;
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
	 if(item.product_priceexpenall != null){
	 product_priceexpenall = item.product_priceexpenall;
	 }else{
     product_priceexpenall = 0;
	 }
total += parseFloat(product_priceexpenall);
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
  labels: ['รายจ่าย'],
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
