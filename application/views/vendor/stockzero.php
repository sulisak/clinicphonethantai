
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

</form>
<br />
<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"><?=$lang_category?></th>
<th style="text-align: center;">Zone</th>


			<th style="text-align: center;"><?=$lang_priceperunit?></th>
			<th style="text-align: center;"><?=$lang_wholepriceperunit?></th>
			<th style="text-align: center;"><?=$lang_discount?></th>
			<th style="text-align: center;"><?=$lang_total?></th>
			<th style="text-align: center;">หน่วยนับ</th>
			<th style="text-align: center;"><?=$lang_estimatedrevenue?></th>
		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td align="center"><a href="<?php echo $base_url; ?>/warehouse/barcode?product_code={{x.product_code}}&product_name={{x.product_name}}&product_price={{x.product_price | number:2}}" class="btn btn-xs btn-default" target="_blank"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> {{x.product_code}}</a></td>

			<td>{{x.product_name}}</td>
			<td>{{x.product_category_name}}</td>
	<td>{{x.zone_name}}</td>
			<td align="right">{{ x.product_price | number:2 }}</td>
			<td align="right">{{ x.product_wholesale_price | number:2 }}</td>
			<td align="right">{{ x.product_price_discount | number:2 }}</td>

			<td align="right">{{x.product_stock_num | number:0}}</td>
			<td align="right">{{x.product_unit_name}}</td>
			<td align="right">{{ (x.product_price - x.product_price_discount) * x.product_stock_num | number:2}}</td>




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

 $http.post("Stockzero/Getstock",{
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














});
	</script>
