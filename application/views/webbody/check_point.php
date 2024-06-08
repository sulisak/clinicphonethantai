
<center>
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">


<div class="col-md-3 col-sm-12">

</div>
<div class="col-md-6 col-sm-12">

	<div class="panel panel-default">
		<div class="panel-body">

<center style="font-size:30px;color:blue;font-weight:bold;">
	ตรวจสอบ คะแนนลูกค้า
</center>

		</div>
	</div>

<div class="panel panel-default">
		<div class="panel-body">
		
		
<form class="form-inline">
<div class="form-group">
<input id="searchtext" type="text" autocomplete="off" placeholder="ค้นหา ชื่อลูกค้า, เบอร์โทร, รหัส" ng-model="searchtext" class="form-control" style="font-size:40px;width:600px;height:70px;" />
</div>
<div class="form-group">
<input type="submit" class="btn btn-lg btn-success" style="height:70px;" ng-click="getlist(searchtext)" value="ค้นหา" />
</div>

<div class="form-group">
<button class="btn btn-lg btn-warning" style="height:70px;" ng-click="delall()" >
ลบผลการค้นหา
</button>
</div>



</form>

	</div>
	</div>

<div class="panel panel-default">
	<div class="panel-body">


<h1 ng-if="list!=''">

	<font color="green" style="font-size:200px;">{{list[0].product_score_all | number:2}}</font>
	<br />

{{list[0].cus_name}}
<br />
เบอร์โทร: {{list[0].cus_tel}}
<br />
รหัสสมาชิก: {{list[0].cus_add_time}}


</h1>

<h1 ng-if="list==''" style="color:red;">
ไม่พบรายการ
</h1>



</div>
</div>



	</div>

	<div class="col-md-3 col-sm-12">

	</div>




	</div>



	</center>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.list = [];

$scope.getlist = function(searchtext){

if(searchtext!=''){
 $http.post("Checkpoint/get",{
searchtext:searchtext
}).success(function(data){
          $scope.list = data;
$scope.searchtext = '';

setTimeout(function(){ 
	$scope.list = [];
	}, 5000);
	

        });
		
		
}

		
   };



$scope.delall = function(){
	$scope.list = [];
	$scope.searchtext = '';
	 $("#searchtext").focus();
   };
   
   


 $("#searchtext").focus();


});
	</script>
