
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">



<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="
<?=$lang_search?>" ng-change="getlist(searchtext,'1')">
</div>



</form>
<br />




<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader" style="font-size: 11px;">
			<th><?=$lang_rank?></th>
			<th></th>
			<th><?=$lang_runno?></th>
			<th><?=$lang_cusname?></th>
			<th><?=$lang_productnum?></th>
			<th><?=$lang_pricesum?></th>
			
			<th><?=$lang_discount?></th>
			<th><?=$lang_sumall?></th>
			<th><?=$lang_getmoney?></th>
			<th><?=$lang_moneychange?></th>
			<th><?=$lang_payby?></th>
			<th><?=$lang_by?></th>
			<th><?=$lang_day?></th>
			<th  ng-show="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td>
				<button ng-click="printDivmini(x)" class="btn btn-primary btn-sm">
ได้รับสินค้าครบแล้ว
				</button>
			</td>
			<td><button class="btn btn-default btn-sm" ng-click="Getone(x)">{{x.sale_runno}}</button></td>
			<td>{{x.cus_name}}</td>

			
			<td  align="right">{{x.sumsale_num | number}}</td>
			<td  align="right">{{x.sumsale_price | number:2}}</td>

			
			
			<td  align="right">{{x.discount_last | number:2}}</td>
			<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}</td>
			<td  align="right">{{x.money_from_customer | number:2}}</td>
			<td  align="right">{{x.money_from_customer - ((ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price)) - x.discount_last) | number:2}}</td>

			<td>
<span ng-if="x.pay_type=='1'"><?=$lang_retail?></span>
<span ng-if="x.pay_type=='2'"><?=$lang_transfer?></span>
<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
<span ng-if="x.pay_type=='4'"><?=$lang_owe?></span>
			</td>

<td>{{x.name}}</td>
			<td>{{x.adddate}}</td>
			<td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" ng-click="Deletelist(x)" id="delbut{{x.ID}}">
			<?=$lang_delete?></button></td>
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
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> 
<?=$lang_downloadexcel?>
 </button>




<div class="modal fade" id="Openone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_saleproductlist?></h4>
			</div>
			<div class="modal-body">
	Runno:{{sale_runno}} , <?=$lang_cusname?>: {{cus_name}}	, <?=$lang_address?>: {{cus_address_all}}		
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_rank?></th>
			<th><?=$lang_productname?></th>
			<th><?=$lang_barcode?></th>
			<th><?=$lang_pricesale?></th>
			<th><?=$lang_discountperunit?></th>
			<th><?=$lang_qty?></th>
			<th><?=$lang_all?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td>{{$index+1}}</td>
			<td>{{x.product_name}}</td>
			<td align="center">{{x.product_code}}</td>
			<td align="right">{{x.product_price | number:2}}</td>
			<td align="right">{{x.product_price_discount | number:2}}</td>
			<td align="right">{{x.product_sale_num | number}}</td>
			<td align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="5"  align="right" style="font-weight: bold;">
			<?=$lang_all?></td>
			
			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;">{{sumsale_price | number:2}}</td>

			

		</tr>

<tr ng-if="vat3 > '0'">
<td align="right" colspan="6"><?=$lang_vat?> {{vat3}} %</td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price * (vat3/100) | number:2}}</td>
		</tr>

		<tr ng-if="vat3 > '0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{ParsefloatFunc(sumsale_price)  * (ParsefloatFunc(vat3)/100) + ParsefloatFunc(sumsale_price) | number:2}}</td>
		</tr>

		<tr><td align="right" colspan="6">ส่วนลด</td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr><td align="right" colspan="6">ยอดสุทธิ</td>
		<td  style="font-weight: bold;" align="right"><u>{{ParsefloatFunc(sumsale_price)  * (ParsefloatFunc(vat3)/100) + ParsefloatFunc(sumsale_price) -discount_last2 | number:2}}</u></td></tr>
		<tr><td align="right" colspan="6"><?=$lang_getmoney?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer | number:2}}</td></tr>
		<tr><td align="right" colspan="6"><?=$lang_moneychange?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer-(ParsefloatFunc(sumsale_price)  * (ParsefloatFunc(vat3)/100) + ParsefloatFunc(sumsale_price)-discount_last2) | number:2}}</td></tr>



	</tbody>
</table>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="Openonemini">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		
				
			</div> 
			<div class="modal-body">
			
		<center>

<button class="btn btn-success btn-lg" ng-click="printDiv()">ยืนยัน</button>
<center>



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


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};


$scope.Savereserv= function(x){

  $http.post("Salereserv/reservsalesave",{
ID:x.ID,
reserv: '0'
}).success(function(data){
toastr.success('สำเร็จ');
$scope.getlist('','1');
});


}


$scope.printDiv = function(){
	//window.scrollTo(0, 0);
	//window.print();
	$scope.Savereserv($scope.dataall);
	$('#Openonemini').modal('hide');
};

$scope.printDivfull = function(){
$('#Openone').modal('show');
$scope.Getone($scope.dataall);
};


$scope.printDivmini = function(x){
$('#Openonemini').modal('show');
$scope.Getonemini(x);
$scope.dataall = x;

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

   $http.post("Salereserv/get",{
searchtext:searchtext,
page: page,
perpage: perpage
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



$scope.Getone = function(x){
$('#Openone').modal('show');
$http.post("Salereserv/Getone",{
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





$scope.Getonemini = function(x){
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
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
        });	

};





$scope.Deletelist = function(x){
$('#delbut'+ x.ID).prop('disabled',true);	
$http.post("Salereserv/Deletelist",{
	ID: x.ID,
	sale_runno: x.sale_runno
}).success(function(response){
$scope.getlist();
        });	

};



});
	</script>
