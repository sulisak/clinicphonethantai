
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<table class="table table-hover" style="font-size: 20px;font-weight: bold;">
	<thead>
		<tr>
			<th>จำนวนสินค้ารับฝาก</th>
			<th>ต้นทุนในสินค้า</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{pawn_num_all | number}}</td>
			<td>{{pawn_money_all | number:2}}</td>
		</tr>
	</tbody>
</table>

	</div>
</div>



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

<table class="table table-hover" style="font-size: 20px;font-weight: bold;">
	<thead>
		<tr>
			<th>รายได้จากดอกเบี้ย</th>
			<th>รายได้จากตัดเงินต้น</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{pawnadd_permoney | number:2}}</td>
			<td>{{pawnadd_cutmoney | number:2}}</td>
		</tr>
	</tbody>
</table>


<hr />



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

$scope.dayfrom = '<?php echo date('01-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';








$scope.reportdaylist = function(){
$http.post("Pawnreport/Daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.pawnadd_cutmoney = data[0].pawnadd_cutmoney;
$scope.pawnadd_permoney = data[0].pawnadd_permoney;


        });
};
$scope.reportdaylist();




$scope.Pawnreportall = function(){
$http.post("Pawnreport/Pawnreportall",{
	}).success(function(data){
$scope.pawn_num_all = data[0].pawn_num_all;
$scope.pawn_money_all = data[0].pawn_money_all;
        });	
};
$scope.Pawnreportall();




});

</script>