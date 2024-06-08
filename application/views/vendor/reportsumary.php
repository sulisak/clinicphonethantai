
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">

<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>


</form>


<hr />


<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">

			<th style="text-align: center;"><?=$lang_saletotal?>ทั้งหมด</th>
			<th style="text-align: center;"><?=$lang_cansale?></th>
			<th style="text-align: center;"><?=$lang_discount?>ในสินค้า</th>
			<!-- <th style="text-align: center;"><?=$lang_discount?>ท้ายบิล</th> -->
			<th style="text-align: center;"><?=$lang_revenue?></th>
			<!-- <th style="text-align: center;"><?=$lang_cost?></th>
			<th style="text-align: center;"><?=$lang_profitlost?></th> -->


		</tr>
	</thead>
	<tbody>
		<tr>

			<td align="right">{{allnum | number}}</td>
			<td align="right">{{getmoneyall | number:2}}</td>
			<td align="right">{{discount_item | number:2}}</td>
			<!-- <td align="right">{{discount_last | number:2}}</td> -->
			<td align="right">{{getmoneyall-discount_item-discount_last | number:2}}</td>
			<!-- <td align="right">{{cost | number:2}}</td>
<td align="right">{{(getmoneyall-discount_item-discount_last)-cost | number:2}}</td> -->


		</tr>


	</tbody>
</table>







<table class="table table-hover table-bordered" style="width: 100%;">
	<thead>
		<tr class="trheader">
		<th>ช่องทางการชำระเงิน</th>
		<th style="text-align: center;"><?=$lang_saletotal?></th>
		<th style="text-align: center;"><?=$lang_cansale?></th>
		<th style="text-align: center;"><?=$lang_discount?>ในสินค้า</th>
		<th>รายรับ</th>
	</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in openbillclosedaylistc">
			<td style="font-weight: bold;">
			<span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
			<span ng-if="x.pay_type=='2'"><?=$lang_transfer?></span>
			<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>

			<span ng-if="x.pay_type=='5'"><?=$lang_qrpayment?></span>

			<span ng-if="x.pay_type=='4'"><?=$lang_owe?></span>
		</td>
	<td align="right"><button class="btn btn-info" ng-click="Showproduct(x)" title="แสดงรายการสินค้า">{{x.all_num | number}}</button></td>
<td align="right">{{x.all_product_price | number:2}}</td>
<td align="right">{{x.all_discount_price | number:2}}</td>
			<td align="right">{{x.sumsale_price | number:2}}</td>
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







<div class="modal fade" id="showproduct">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการสินค้า</h4>
			</div>
			<div class="modal-body">


				<table class="table table-bordered">
					<thead>
						<tr style="background-color:#ddd;font-size:14px;">
							<th>ชื่อสินค้า</th>
							<th>ราคาขาย/หน่วย</th>
							<th>จำนวนที่ขาย</th>
							<th>ราคาขายรวม</th>
							<th>ส่วนลดในสินค้ารวม</th>
							<th>ยอดขายรวม</th>
							<th>รับเงินโดย</th>
							<th>เวลาขาย</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="x in productlist">
							<td>{{x.product_name}}</td>
							<td style="text-align:right;">{{x.product_price | number:2}}</td>
							<td style="text-align:right;">{{x.product_sale_num | number}}</td>
							<td style="text-align:right;">{{x.product_price*x.product_sale_num | number:2}}</td>
							<td style="text-align:right;">{{x.product_price_discount*x.product_sale_num | number:2}}</td>
							<td style="text-align:right;">{{(x.product_price*x.product_sale_num)-(x.product_price_discount*x.product_sale_num) | number:2}}</td>
							<td>
								<span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
								<span ng-if="x.pay_type=='2'"><?=$lang_transfer?></span>
								<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
								<span ng-if="x.pay_type=='5'"><?=$lang_qrpayment?></span>
								<span ng-if="x.pay_type=='4'"><?=$lang_owe?></span>
							</td>
							<td>{{x.dateadd}}</td>
						</tr>

						<tr>
							<td colspan="5" style="text-align:right;">
								รวมสุทธิ
							</td>
							<td style="text-align:right;color:green;">
								{{Sumsaleprice() | number:2}}
							</td>
							<td>

							</td>
							<td>

							</td>
						</tr>
					</tbody>
				</table>



			</div>
			<div class="modal-footer">

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



$scope.Showproduct = function(x){
$('#showproduct').modal('show');
	$http.post("Reportsumary/Showproduct",{
		pay_type: x.pay_type,
		dayfrom: $scope.dayfrom,
		dayto: $scope.dayto
		}).success(function(data){

	     $scope.productlist = data;

	        });
}


$scope.Sumsaleprice = function(){
var total = 0;

angular.forEach($scope.productlist,function(item){
total += parseFloat((item.product_price - item.product_price_discount) * item.product_sale_num);
});
	 return total;
};



$scope.reportdaylist = function(){


$http.post("Reportsumary/Openbillclosedaylistc",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){

     $scope.openbillclosedaylistc = data;

        });




$http.post("<?php echo $base_url;?>/pawn/pawnreport/Daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.pawnadd_cutmoney = data[0].pawnadd_cutmoney;
$scope.pawnadd_permoney = data[0].pawnadd_permoney;


        });




$http.post("Reportsumary/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.getmoneyall = JSON.parse(data.data[0].getmoneyall);
$scope.discount_item = JSON.parse(data.data[0].discount_item);
$scope.discount_last = JSON.parse(data.data[0].discount_last);
$scope.allnum = JSON.parse(data.data[0].num);
$scope.cost = JSON.parse(data.cost);

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


});

</script>
