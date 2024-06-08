
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


<div class="form-group">
<select class="form-control" ng-model="showproductnoti" ng-change="getlist()">
	<option value="0">
	<?php echo $lang_stk_1;?>
	</option>
	<option value="1">
	<?php echo $lang_stk_2;?>
	</option>
	</select>
</div>





</form>
<br />



<div id="openprint_table">


<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;width:500px;"><?=$lang_productname?></th>
			
			<th style="text-align: center;"><?=$lang_category?></th>
<th style="text-align: center;">Zone</th>

			<th style="text-align: center;"><?=$lang_total?></th>
			<th style="text-align: center;"><?=$lang_unit?></th>
			<th style="text-align: center;"><?php echo $lang_stk_3;?></th>
			
			<?php if($_SESSION['user_id']=='1'){?>
			<th style="text-align: center;"><?php echo $lang_cost;?></th>
			<th style="text-align: center;"><?php echo $lang_saleprice;?></th>
			<?php } ?>
			
			

		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			
			<td align="center">
				{{x.product_code}}</td>
				
				
				
				
			<td>{{x.product_name}}</td>
			
			

<td>{{x.product_category_name}}</td>
	<td>{{x.zone_name}}</td>
	
			<td align="right" ng-if="Floatfunc(x.product_stock_num) < x.product_num_min && x.product_num_min!='0'" style="background-color:red;color:#fff;">{{x.product_stock_num | number}}</td>
			<td align="right" ng-if="Floatfunc(x.product_stock_num) >= x.product_num_min && x.product_num_min!='0'">{{x.product_stock_num | number}}</td>
			<td align="right" ng-if="x.product_num_min=='0'">{{x.product_stock_num | number}}</td>
			
			
			<td align="right">{{x.product_unit_name}}</td>
			
			
			<td align="right" ng-if="Floatfunc(x.product_stock_num) < x.product_num_min && x.product_num_min!='0'" style="background-color:red;color:#fff;">
				
	{{x.product_num_min}}</td>
			
			<td align="right" ng-if="Floatfunc(x.product_stock_num) >= x.product_num_min && x.product_num_min!='0'">
		{{x.product_num_min}}</td>
		
		<td align="right" ng-if="x.product_num_min=='0'">
		{{x.product_num_min}}</td>


<?php if($_SESSION['user_type']=='4'){?>
				<td align="right">{{x.product_pricebase}}</td>
				<td align="right">{{x.product_price}}</td>
				<?php } ?>
				
				
		</tr>
		
		

		
		
		<tr>
		
		<td colspan="5" align="right" style="font-weight:bold;">รวม</td>
		<td align="right" style="font-weight:bold;">{{Sumnum() | number}}</td>
		<td align="right"></td>
		
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
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>


	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.searchtext = '';
$scope.product_category_id = '0';
$scope.day_return = '1';
$scope.showproductnoti = '0';

$scope.getcategory = function(){

$http.get('Productcategory/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });
   };
$scope.getcategory();


$scope.perpage = '10';
$scope.page = '1';
$scope.searchtext = '';
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

 $http.post("Stock/Getstock",{
searchtext:$scope.searchtext,
page: $scope.page,
perpage: $scope.perpage,
day_return: $scope.day_return,
showproductnoti: $scope.showproductnoti
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

 angular.forEach($scope.list,function(item){
	 if(item.product_stock_num != 0){
	 product_stock_num = item.product_stock_num;
	 }else{
     product_stock_num = '0';
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



 $scope.Floatfunc = function(x){
 return parseFloat(x);
};




});
	</script>
