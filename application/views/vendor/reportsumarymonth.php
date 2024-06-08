
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">

<div class="form-group">
ปี:<input ng-model="year" class="form-control" style="width: 70px;">

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
		<th style="text-align: center;width: 150px;">เดือน</th>

			<th style="text-align: center;">กำไร</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">
		<tr>
		<td>มกราคม</td>
		<td align="right">{{daylist[0].m1-c1 | number:2}}</td>
		</tr>

		<tr>
		<td>กุมภาพันธ์</td>
		<td align="right">{{daylist[0].m2-c2 | number:2}}</td>
		</tr>

		<tr>
		<td>มีนาคม</td>
		<td align="right">{{daylist[0].m3-c3 | number:2}}</td>
		</tr>

		<tr>
		<td>เมษายน</td>
		<td align="right">{{daylist[0].m4-c4 | number:2}}</td>
		</tr>

		<tr>
		<td>พฤษภาคม</td>
		<td align="right">{{daylist[0].m5-c5 | number:2}}</td>
		</tr>

		<tr>
		<td>มิถุนายน</td>
		<td align="right">{{daylist[0].m6-c6 | number:2}}</td>
		</tr>

		<tr>
		<td>กรกฎาคม</td>
		<td align="right">{{daylist[0].m7-c7 | number:2}}</td>
		</tr>

		<tr>
		<td>สิงหาคม</td>
		<td align="right">{{daylist[0].m8-c8 | number:2}}</td>
		</tr>

		<tr>
		<td>กันยายน</td>
		<td align="right">{{daylist[0].m9-c9 | number:2}}</td>
		</tr>

		<tr>
		<td>ตุลาคม</td>
		<td align="right">{{daylist[0].m10-c10 | number:2}}</td>
		</tr>

		<tr>
		<td>พฤษจิกายน</td>
		<td align="right">{{daylist[0].m11-c11 | number:2}}</td>
		</tr>

		<tr>
		<td>ธันวาคม</td>
		<td align="right">{{daylist[0].m12-c12 | number:2}}</td>
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


$scope.parseFloat_func = function(x) {
	return parseFloat(x ? x : 0);
};



$scope.reportdaylist = function(){
$http.post("Reportsumarymonth/daylist",{
	year: $scope.year
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

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: item.m1-$scope.c1,name: 'มกรา'},
	{count: item.m2-$scope.c2,name: 'กุมภา'},
	{count: item.m3-$scope.c3,name: 'มีนา'},
	{count: item.m4-$scope.c4,name: 'เมษา'},
	{count: item.m5-$scope.c5,name: 'พฤษภา'},
	{count: item.m6-$scope.c6,name: 'มิถุนา'},
	{count: item.m7-$scope.c7,name: 'กรกฎา'},
	{count: item.m8-$scope.c8,name: 'สิงหา'},
	{count: item.m9-$scope.c9,name: 'กันยา'},
	{count: item.m10-$scope.c10,name: 'ตุลา'},
	{count: item.m11-$scope.c11,name: 'พฤษจิกา'},
	{count: item.m12-$scope.c12,name: 'ธันวา'},
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
