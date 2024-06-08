
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?> " style="width: 300px;" ng-change="getlist(searchtext,'1')">
</div>

<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>




</form>



<div id="openprint_table">

<center>
	<h1><b><?php echo $lang_psor_1;?></b></h1>
	<h3><b>{{searchtext}}</b></h3>
</center>
<hr />

<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?php echo $lang_psor_2;?></th>
			
		
			<th style="text-align: center;"><?=$lang_productname?></th>
			

	</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			
			
			<td>
				<button class="btn btn-default" ng-click="Openone2(x)">
				<?php echo $lang_psor_3;?>
				</button>
				
				</td>
				
				
			
				
			<td>
				{{x.product_name}}
				
				
				</td>
			
			


		</tr>
		

	</tbody>
</table>

</div>


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
	<option value="1000">1000</option>
	<option value="3000">3000</option>
	<option value="5000">5000</option>
	<option value="10000">10000</option>
	<option value="100000">100000</option>
	<option value="1000000">1000000</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>


	</div>


	</div>
	
	
	
	
	
	
	
	
	
	
	<div class="modal fade" id="Openone">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					
					<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv1()"><?=$lang_print?></button>
</div>

					</h4>
			</div>
			<div class="modal-body" id="openprint1">
<center>
	<h3>
	<?php echo $lang_psor_4;?>
	<br />
	<b>{{onedata.product_name}}</b>
	</h3>
	</center>

<table class="table table-bordered table-hover">
	<tr ng-repeat="x in onelist">
	<td>{{x.branch_name}}</td>
	<td>{{x.product_name}}</td>
	<td class="text-right">{{x.product_stock_num | number}}</td>
	</tr>
	</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="modal fade" id="Openone2">
	<div class="modal-dialog modal-lg" style="width:70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					
					<div class="form-group">
		
		
		<form class="form-inline">



<div class="form-group">
	<div class="form-group">
<input type="text" ng-model="searchtext2" class="form-control" placeholder="<?php echo $lang_search;?><?php echo $lang_branch;?>" style="width: 300px;" ng-change="Openonedata2()">
</div>
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="Openonedata2()" class="btn btn-success" placeholder="" title="<?=$lang_search?>">
<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
<?php echo $lang_search;?>
</button>
</div>


<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv2()"><?=$lang_print?></button>
</div>


</form>

</div>

					</h4>
			</div>
			<div class="modal-body" id="openprint2">
<center>
	<h3>
	<?php echo $lang_psor_5;?>
	<br />
	<b>{{one2data.product_name}}</b>
	</h3>
	
	
	</center>

<table class="table table-bordered table-hover">
	<tr class="trheader">
	<td><?php echo $lang_branch;?></td>
	<td><?php echo $lang_productname;?></td>
	<td><?php echo $lang_psor_6;?></td>
	<td><?php echo $lang_psor_7;?></td>
	<td><?php echo $lang_psor_8;?></td>
	<td><?php echo $lang_psor_9;?></td>
	</tr>
	
	<tr ng-repeat="x in one2list">
	<td>{{x.branch_name}}</td>
	<td>{{x.product_name}}</td>
<td>{{x.sale_runno}}</td>
	
	<td class="text-right">{{x.product_stock_num | number}}</td>
	<td class="text-right">{{x.adddate}}</td>
	<td class="text-right">{{x.product_name2}}</td>
	</tr>
	<tr>
	<td colspan="3" class="text-right"><b><?php echo $lang_all;?></b></td>
	<td class="text-right"><b>{{Sumnum() | number}}</b></td>
	<td class="text-right"></td>
	<td class="text-right"></td>
	</tr>
	</table>


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

$scope.searchtext = '';
$scope.product_category_id = '0';
$scope.day_return = '1';



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

 $http.post("product_stockout_relation/Getstock",{
searchtext:$scope.searchtext,
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





$scope.Openone = function(x){
	$('#Openone').modal('show');
	$scope.onedata = x;
	
	 $http.post("product_stockout_relation/Openone",{
searchtext:$scope.searchtext,
product_id: x.product_id
}).success(function(data){
          $scope.onelist = data;

        });
	
	
}


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

$scope.dayfrom = '<?php echo date('01-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';


$scope.searchtext2 = '';
$scope.Openonedata2 = function(){
	 $http.post("product_stockout_relation/Openone2",{
searchtext2:$scope.searchtext2,
product_id: $scope.one2data.product_id,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
          $scope.one2list = data;

        });
	
	
}


$scope.Openone2 = function(x){
	$('#Openone2').modal('show');
	$scope.one2data = x;
$scope.Openonedata2();
	
}


 $scope.Sum_importproduct_detail_num = function(){
var total = 0;

 angular.forEach($scope.one2list,function(item){
	 if(item.importproduct_detail_num != null){
	 importproduct_detail_num = item.importproduct_detail_num;
	 }else{
     importproduct_detail_num = 0;
	 }
total += parseFloat(importproduct_detail_num);
 });
    return total;
};




 $scope.Sum_product_sale_num = function(){
var total = 0;

 angular.forEach($scope.one2list,function(item){
	 if(item.product_sale_num != null){
	 product_sale_num = item.product_sale_num;
	 }else{
     product_sale_num = 0;
	 }
total += parseFloat(product_sale_num);
 });
    return total;
};







 $scope.Sumprice = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price != null){
	 product_price = item.product_price;
	 }else{
     product_price = 0;
	 }
total += parseFloat(product_price);
 });
    return total;
};




 $scope.Sumpricebase = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_pricebase != null){
	 product_pricebase = item.product_pricebase;
	 }else{
     product_pricebase = 0;
	 }
total += parseFloat(product_pricebase);
 });
    return total;
};



 $scope.Sumdiscount = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price_discount != null){
	 product_price_discount = item.product_price_discount;
	 }else{
     product_price_discount = 0;
	 }
total += parseFloat(product_price_discount);
 });
    return total;
};



 $scope.Sumnum = function(){
var total = 0;

 angular.forEach($scope.one2list,function(item){
	 if(item.product_stock_num != null){
	 product_stock_num = item.product_stock_num;
	 }else{
     product_stock_num = 0;
	 }
total += parseFloat(product_stock_num);
 });
    return total;
};




 $scope.Sumpriceget = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price != null){
	 product_price = item.product_price;
	 }else{
     product_price = 0;
	 }
total += parseFloat((item.product_price - item.product_price_discount) * item.product_stock_num);
 });
    return total;
};



 $scope.Sumproductvalue = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price != null){
	 product_price = item.product_price;
	 }else{
     product_price = 0;
	 }
total += parseFloat(item.product_stock_num*item.product_pricebase);
 });
    return total;
};



 $scope.Sumprofit = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price != null){
	 product_price = item.product_price;
	 }else{
     product_price = 0;
	 }
total += parseFloat(item.product_stock_num*(item.product_price - item.product_price_discount-item.product_pricebase));
 });
    return total;
};








});
	</script>
