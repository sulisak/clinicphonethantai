
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
เดือน:
<select ng-model="month" class="form-control">
	<option value="01">
		1
	</option>
	<option value="02">
		2
	</option>
	<option value="03">
		3
	</option>
	<option value="04">
		4
	</option>
	<option value="05">
		5
	</option>
	<option value="06">
		6
	</option>
	<option value="7">
		7
	</option>
	<option value="08">
		8
	</option>
	<option value="09">
		9
	</option>
	<option value="10">
		10
	</option>
	<option value="11">
		11
	</option>
	<option value="12">
		12
	</option>

</select>
</div>
<div class="form-group">
ปี:
<input ng-model="year" class="form-control" style="width: 70px;">

</div>

<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>
<hr />



	<div id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;width: 50px;">วันที่</th>

			<th style="text-align: center;">กำไร</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">

		<tr ng-repeat="x in datac">
		<td>{{x.name}}</td>
		<td align="right">{{x.count | number:2}}</td>
		</tr>



	</tbody>
</table>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>


	</div>

	</div>

	</div>




			<script>



var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {



$scope.year = '<?php echo date('Y',time());?>';

$scope.month = '<?php echo date('m',time());?>';


$scope.parseFloat_func = function(x) {
	return parseFloat(x ? x : 0);
};

$scope.reportdaylist = function(){
$http.post("Reportsumaryday/daylist",{
	year: $scope.year,
	month: $scope.month
	}).success(function(data){
$scope.daylist = data.data;
$scope.c1 = data.c1;
$scope.c2 = data.c2;
$scope.c3 = data.c3;
$scope.c4 = data.c4;
$scope.c5 = data.c5;
$scope.c6 = data.c6;
$scope.c7 = data.c7;
$scope.c8 = data.c8;
$scope.c9 = data.c9;
$scope.c10 = data.c10;
$scope.c11 = data.c11;
$scope.c12 = data.c12;
$scope.c13 = data.c13;
$scope.c14 = data.c14;
$scope.c15 = data.c15;
$scope.c16 = data.c16;
$scope.c17 = data.c17;
$scope.c18 = data.c18;
$scope.c19 = data.c19;
$scope.c20 = data.c20;
$scope.c21 = data.c21;
$scope.c22 = data.c22;
$scope.c23 = data.c23;
$scope.c24 = data.c24;
$scope.c25 = data.c25;
$scope.c26 = data.c26;
$scope.c27 = data.c27;
$scope.c28 = data.c28;
$scope.c29 = data.c29;
$scope.c30 = data.c30;
$scope.c31 = data.c31;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: parseFloat(item.d1 ? item.d1 : 0)-$scope.c1+parseFloat(item.pm1 ? item.pm1 : 0),name: '1'},
	{count: parseFloat(item.d2 ? item.d2 : 0)-$scope.c2+parseFloat(item.pm2 ? item.pm2 : 0),name: '2'},
	{count: parseFloat(item.d3 ? item.d3 : 0)-$scope.c3+parseFloat(item.pm3 ? item.pm3 : 0),name: '3'},
	{count: parseFloat(item.d4 ? item.d4 : 0)-$scope.c4+parseFloat(item.pm4 ? item.pm4 : 0),name: '4'},
	{count: parseFloat(item.d5 ? item.d5 : 0)-$scope.c5+parseFloat(item.pm5 ? item.pm5 : 0),name: '5'},
	{count: parseFloat(item.d6 ? item.d6 : 0)-$scope.c6+parseFloat(item.pm6 ? item.pm6 : 0),name: '6'},
	{count: parseFloat(item.d7 ? item.d7 : 0)-$scope.c7+parseFloat(item.pm7 ? item.pm7 : 0),name: '7'},
	{count: parseFloat(item.d8 ? item.d8 : 0)-$scope.c8+parseFloat(item.pm8 ? item.pm8 : 0),name: '8'},
	{count: parseFloat(item.d9 ? item.d9 : 0)-$scope.c9+parseFloat(item.pm9 ? item.pm9 : 0),name: '9'},
	{count: parseFloat(item.d10 ? item.d10 : 0)-$scope.c10+parseFloat(item.pm10 ? item.pm10 : 0),name: '10'},
	{count: parseFloat(item.d11 ? item.d11 : 0)-$scope.c11+parseFloat(item.pm11 ? item.pm11 : 0),name: '11'},
	{count: parseFloat(item.d12 ? item.d12 : 0)-$scope.c12+parseFloat(item.pm12 ? item.pm12 : 0),name: '12'},
	{count: parseFloat(item.d13 ? item.d13 : 0)-$scope.c13+parseFloat(item.pm13 ? item.pm13 : 0),name: '13'},
	{count: parseFloat(item.d14 ? item.d14 : 0)-$scope.c14+parseFloat(item.pm14 ? item.pm14 : 0),name: '14'},
	{count: parseFloat(item.d15 ? item.d15 : 0)-$scope.c15+parseFloat(item.pm15 ? item.pm15 : 0),name: '15'},
	{count: parseFloat(item.d16 ? item.d16 : 0)-$scope.c16+parseFloat(item.pm16 ? item.pm16 : 0),name: '16'},
	{count: parseFloat(item.d17 ? item.d17 : 0)-$scope.c17+parseFloat(item.pm17 ? item.pm17 : 0),name: '17'},
	{count: parseFloat(item.d18 ? item.d18 : 0)-$scope.c18+parseFloat(item.pm18 ? item.pm18 : 0),name: '18'},
	{count: parseFloat(item.d19 ? item.d19 : 0)-$scope.c19+parseFloat(item.pm19 ? item.pm19 : 0),name: '19'},
	{count: parseFloat(item.d20 ? item.d20 : 0)-$scope.c20+parseFloat(item.pm20 ? item.pm20 : 0),name: '20'},
	{count: parseFloat(item.d21 ? item.d21 : 0)-$scope.c21+parseFloat(item.pm21 ? item.pm21 : 0),name: '21'},
	{count: parseFloat(item.d22 ? item.d22 : 0)-$scope.c22+parseFloat(item.pm22 ? item.pm22 : 0),name: '22'},
	{count: parseFloat(item.d23 ? item.d23 : 0)-$scope.c23+parseFloat(item.pm23 ? item.pm23 : 0),name: '23'},
	{count: parseFloat(item.d24 ? item.d24 : 0)-$scope.c24+parseFloat(item.pm24 ? item.pm24 : 0),name: '24'},
	{count: parseFloat(item.d25 ? item.d25 : 0)-$scope.c25+parseFloat(item.pm25 ? item.pm25 : 0),name: '25'},
	{count: parseFloat(item.d26 ? item.d26 : 0)-$scope.c26+parseFloat(item.pm26 ? item.pm26 : 0),name: '26'},
	{count: parseFloat(item.d27 ? item.d27 : 0)-$scope.c27+parseFloat(item.pm27 ? item.pm27 : 0),name: '27'},
	{count: parseFloat(item.d28 ? item.d28 : 0)-$scope.c28+parseFloat(item.pm28 ? item.pm28 : 0),name: '28'},
	{count: parseFloat(item.d29 ? item.d29 : 0)-$scope.c29+parseFloat(item.pm29 ? item.pm29 : 0),name: '29'},
	{count: parseFloat(item.d30 ? item.d30 : 0)-$scope.c30+parseFloat(item.pm30 ? item.pm30 : 0),name: '30'},
	{count: parseFloat(item.d31 ? item.d31 : 0)-$scope.c31+parseFloat(item.pm31 ? item.pm31 : 0),name: '31'}
	);
});

$scope.Chart($scope.datac);


        });
};
$scope.reportdaylist();





$scope.datac = [];


$scope.Chart = function(datac){
$('#bar').empty();
Morris.Bar({
  element: 'bar',
  data: datac,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['กำไร'],
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
