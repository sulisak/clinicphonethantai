
<center>
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">


<div class="col-md-3">

</div>
<div class="col-md-6">

	<div class="panel panel-default">
		<div class="panel-body">

<center style="font-size:30px;color:blue;font-weight:bold;">
	<?php echo $lang_cpf_1;?>
</center>

		</div>
	</div>

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" style="font-size:50px;width:300px;height:70px;" />
</div>
<div class="form-group">
<input type="submit" class="btn btn-lg btn-success" style="height:70px;" ng-click="getlist(searchtext)" value="ค้นหา" />
</div>

</form>
<br />
<div class="panel panel-default">
	<div class="panel-body">


<h1 ng-if="list!=''">

	<font color="green" style="font-size:70px;">{{list[0].product_price | number:2}}</font>
	<br />
	<img ng-if="list[0].product_image!=''" ng-src="<?php echo $base_url;?>/{{list[0].product_image}}">
	<br />
{{list[0].product_code}}
<br />
{{list[0].product_name}}

</h1>

<h1 ng-if="list==''" style="color:red;">
<?php echo $lang_cpf_2;?>
</h1>







	</div>

	<div class="col-md-3">

	</div>




	</div>

	</div>

	</center>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.getlist = function(searchtext){

 $http.post("Check_productlist_foranyone/get",{
searchtext:searchtext
}).success(function(data){
          $scope.list = data;
$scope.searchtext = '';
        });
   };





});
	</script>
