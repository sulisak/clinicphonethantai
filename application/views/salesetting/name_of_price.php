
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">


<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th>ຊື່ລາຄາຂາຍ(ວ່າງໄວ້ຖ້າບໍ່ຕ້ອງການໃຊ້ງານ)</th>
			
		</tr>
	</thead>
	<tbody>
	

		<tr>

		<td align="center">1</td>
<td><input type="text" ng-model="categorylist[0].price1" class="form-control"></td>
		</tr>
		
		<td align="center">2</td>
<td><input type="text" ng-model="categorylist[0].price2" class="form-control"></td>
		</tr>
		
		<td align="center">3</td>
<td><input type="text" ng-model="categorylist[0].price3" class="form-control"></td>
		</tr>
		
		<td align="center">4</td>
<td><input type="text" ng-model="categorylist[0].price4" class="form-control"></td>
		</tr>
		
		<td align="center">5</td>
<td><input type="text" ng-model="categorylist[0].price5" class="form-control"></td>
		</tr>
		
		
		
	</tbody>
</table>
<button class="btn btn-lg btn-success" ng-click="Editsavecategory()">ບັນທຶກ </button>
		

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> 
<?=$lang_downloadexcel?> </button>

	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.get = function(){
   
$http.get('name_of_price/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get();



$scope.Editsavecategory = function(){
$http.post("name_of_price/Update",{
	price1: $scope.categorylist[0].price1,
	price2: $scope.categorylist[0].price2,
	price3: $scope.categorylist[0].price3,
	price4: $scope.categorylist[0].price4,
	price5: $scope.categorylist[0].price5
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();

        });	
};





});
	</script>
