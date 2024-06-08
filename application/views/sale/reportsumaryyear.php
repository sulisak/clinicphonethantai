<font style="font-family:Phetsarath OT!important">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">




<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>


</form>


<center>
<img ng-if="!daylist" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<div id="openprint_table">

<center>
	<h1><b><?php echo $lang_rpsmy_1;?></b></h1>
	
	</center>
 
 
	<div id="bar"></div>

<hr />
<table ng-if="daylist" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;width: 150px;"><?=$lang_year?></th>

			<th style="text-align: center;">
				
				<span><?php echo $lang_allsaleprice;?></span>
				
				</th>
				
				<th style="text-align: center;">
				
				<span><?php echo $lang_cost;?></span>
				
				</th>
				
				
				<th style="text-align: center;">
				
				<span><?php echo $lang_profit;?></span>
				
				</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">
		<tr ng-repeat="x in daylist">
		<td>{{x.year}}</td>
		<td align="right">{{x.profit | number:2}}</td>
		
		
		<td align="right" ng-repeat="y in daylist2" ng-if="y.sd_year==x.year">{{y.sd_pricebaseall | number:2}}</td>
		
		
		<td align="right" ng-repeat="z in daylist2" ng-if="z.sd_year==x.year">{{x.profit-z.sd_pricebaseall | number:2}}</td>
		
		
		
		</tr>

		


	</tbody>
</table>


</div>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>


	</div>

	</div>

	</div>


</font>

			<script>



var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.s_type = '1';

$scope.year = '<?php echo date('Y',time());?>';


$scope.parseFloat_func = function(x) {
	return parseFloat(x ? x : 0);
};



$scope.reportdaylist = function(){
	$scope.daylist = false;
$http.post("Reportsumaryyear/daylist",{
	year: $scope.year,
	s_type:$scope.s_type
	}).success(function(data){
$scope.daylist = data.data;


$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: item.profit,name: item.year});
});

$scope.Chart($scope.datac);


        });
};
$scope.reportdaylist();







$scope.reportdaylist2 = function(){

$http.post("Reportsumaryyear/daylist2",{
	year: $scope.year
	}).success(function(data){
$scope.daylist2 = data.data;


        });
};
$scope.reportdaylist2();






$scope.datac = [];


$scope.Chart = function(datac){
$('#bar').empty();
Morris.Bar({
  element: 'bar',
  data: datac,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['ຍອດຂາຍ'],
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
