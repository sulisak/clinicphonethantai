
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">

<div class="form-group">
ปี
	<input type="text"  ng-model="year" name="" class="form-control" style="width: 70px;">

</div>

<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>
<hr />

<div ng-if="showloading">
	<center>
	<img src="<?php echo $base_url;?>/pic/loading.gif" />
	<br />
	ระบบกำลังโหลดข้อมูลกรุณารอซักครู่...
</center>
</div>

	<div id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;width: 150px;">Month</th>

			<th style="text-align: center;">ภาษี</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">
		<tr>
		<td>มกราคม</td>
		<td align="right">{{daylist[0].m1 | number:2}}</td>
		</tr>

		<tr>
		<td>กุมภาพันธ์</td>
		<td align="right">{{daylist[0].m2 | number:2}}</td>
		</tr>

		<tr>
		<td>มีนาคม</td>
		<td align="right">{{daylist[0].m3 | number:2}}</td>
		</tr>

		<tr>
		<td>เมษายน</td>
		<td align="right">{{daylist[0].m4 | number:2}}</td>
		</tr>

		<tr>
		<td>พฤษภาคม</td>
		<td align="right">{{daylist[0].m5 | number:2}}</td>
		</tr>

		<tr>
		<td>มิถุนายน</td>
		<td align="right">{{daylist[0].m6 | number:2}}</td>
		</tr>

		<tr>
		<td>กรกฎาคม</td>
		<td align="right">{{daylist[0].m7 | number:2}}</td>
		</tr>

		<tr>
		<td>สิงหาคม</td>
		<td align="right">{{daylist[0].m8 | number:2}}</td>
		</tr>

		<tr>
		<td>กันยายน</td>
		<td align="right">{{daylist[0].m9 | number:2}}</td>
		</tr>

		<tr>
		<td>ตุลาคม</td>
		<td align="right">{{daylist[0].m10 | number:2}}</td>
		</tr>

		<tr>
		<td>พฤษจิกายน</td>
		<td align="right">{{daylist[0].m11 | number:2}}</td>
		</tr>

		<tr>
		<td>ธันวาคม</td>
		<td align="right">{{daylist[0].m12 | number:2}}</td>
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


$scope.reportdaylist = function(){

$scope.showloading = true;

$http.post("Accounting_permonth/daylist",{
	year: $scope.year
	}).success(function(data){
$scope.daylist = data;


$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: item.m1,name: 'มกรา'},
	{count: item.m2,name: 'กุมภา'},
	{count: item.m3,name: 'มีนา'},
	{count: item.m4,name: 'เมษา'},
	{count: item.m5,name: 'พฤษภา'},
	{count: item.m6,name: 'มิถุนา'},
	{count: item.m7,name: 'กรกฎา'},
	{count: item.m8,name: 'สิงหา'},
	{count: item.m9,name: 'กันยา'},
	{count: item.m10,name: 'ตุลา'},
	{count: item.m11,name: 'พฤษจิกา'},
	{count: item.m12,name: 'ธันวา'},
	);

	$scope.showloading = false;
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
  labels: ['ภาษี'],
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
