
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">

<div class="form-group">
<?php echo $lang_year;?>
	<input type="text"  ng-model="year" name="" class="form-control" style="width: 70px;">

</div>

<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>

</form>
<hr />

<div ng-if="showloading">
	<center>
	
	<?php echo $lang_pceprp_1;?>
</center>
</div>


<div id="openprint_table">


<center>
	<?php echo $lang_pceppm_1;?> {{year}} 
</center>

	<div id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;width: 150px;"><?php echo $lang_month;?></th>

			<th style="text-align: center;"><?php echo $lang_pceprp_3;?></th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">
		<tr>
		<td><?php echo $lang_jan;?></td>
		<td align="right">{{daylist[0].m1 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_feb;?></td>
		<td align="right">{{daylist[0].m2 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_mar;?></td>
		<td align="right">{{daylist[0].m3 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_april;?></td>
		<td align="right">{{daylist[0].m4 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_may;?></td>
		<td align="right">{{daylist[0].m5 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_jun;?></td>
		<td align="right">{{daylist[0].m6 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_july;?></td>
		<td align="right">{{daylist[0].m7 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_orgus;?></td>
		<td align="right">{{daylist[0].m8 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_sep;?></td>
		<td align="right">{{daylist[0].m9 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_org;?></td>
		<td align="right">{{daylist[0].m10 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_novem;?></td>
		<td align="right">{{daylist[0].m11 | number:2}}</td>
		</tr>

		<tr>
		<td><?php echo $lang_desam;?></td>
		<td align="right">{{daylist[0].m12 | number:2}}</td>
		</tr>


	</tbody>
</table>

</div>

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

$http.post("Expen_permonth/daylist",{
	year: $scope.year
	}).success(function(data){
$scope.daylist = data;


$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: item.m1,name: '<?php echo $lang_jan;?>'},
	{count: item.m2,name: '<?php echo $lang_feb;?>'},
	{count: item.m3,name: '<?php echo $lang_mar;?>'},
	{count: item.m4,name: '<?php echo $lang_april;?>'},
	{count: item.m5,name: '<?php echo $lang_may;?>'},
	{count: item.m6,name: '<?php echo $lang_jun;?>'},
	{count: item.m7,name: '<?php echo $lang_july;?>'},
	{count: item.m8,name: '<?php echo $lang_orgus;?>'},
	{count: item.m9,name: '<?php echo $lang_sep;?>'},
	{count: item.m10,name: '<?php echo $lang_org;?>'},
	{count: item.m11,name: '<?php echo $lang_novem;?>'},
	{count: item.m12,name: '<?php echo $lang_desam;?>'},
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
  labels: ['<?php echo $lang_pceprp_3;?>'],
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
