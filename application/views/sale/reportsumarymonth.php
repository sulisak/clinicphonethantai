<font style="font-family:Phetsarath OT!important">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">

<div class="form-group">
<?=$lang_year?>:<input ng-model="year" class="form-control" style="width: 70px;">

</div>

<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>


<div class="form-group">
<select class="form-control" ng-model="s_type" ng-change="reportdaylist()">
<option value="1"><?php echo $lang_allsaleprice;?></option>
<option value="2"><?php echo $lang_profit;?></option>
</select>
</div>

<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>
<hr />

<center>
<img ng-if="!daylist" src="<?php echo $base_url;?>/pic/loading.gif">
</center>


<div id="openprint_table">

<center>
	<h1 ng-if="s_type=='1'"><b><?php echo $lang_rpsmm_1;?></b></h1>
	<h1 ng-if="s_type=='2'"><b><?php echo $lang_rpsmm_2;?></b></h1>
	
	<?php echo $lang_year;?> {{year}} </center>
 
 
 
	<div id="bar"></div>

<hr />
<table ng-if="daylist" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;width: 150px;"><?=$lang_month?></th>

			<th style="text-align: center;">
				<span ng-if="s_type=='1'"><?php echo $lang_allsaleprice;?></span>
	<span ng-if="s_type=='2'"><?php echo $lang_profit;?></span>
				</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">
		<tr>
		<td><?=$lang_jan?></td>
		<td align="right">{{daylist[0].m1-daylist[0].mm1 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_feb?></td>
		<td align="right">{{daylist[0].m2-daylist[0].mm2 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_mar?></td>
		<td align="right">{{daylist[0].m3-daylist[0].mm3 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_april?></td>
		<td align="right">{{daylist[0].m4-daylist[0].mm4 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_may?></td>
		<td align="right">{{daylist[0].m5-daylist[0].mm5 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_jun?></td>
		<td align="right">{{daylist[0].m6-daylist[0].mm6 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_july?></td>
		<td align="right">{{daylist[0].m7-daylist[0].mm7 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_orgus?></td>
		<td align="right">{{daylist[0].m8-daylist[0].mm8 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_sep?></td>
		<td align="right">{{daylist[0].m9-daylist[0].mm9 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_org?></td>
		<td align="right">{{daylist[0].m10-daylist[0].mm10 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_novem?></td>
		<td align="right">{{daylist[0].m11-daylist[0].mm11 | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_desam?></td>
		<td align="right">{{daylist[0].m12-daylist[0].mm12 | number:2}}</td>
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
	
	
	
	
	
	
	
	
	<div class="modal fade" id="Selectmode">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			
			
			<div class="modal-body">
			
			<center>
			<h2><b><?php echo $lang_select;?></b></h2> 
			
	
	<button ng-click="reportdaylist('1')" class="btn btn-info btn-lg" style="width:100px;">
	<?php echo $lang_allsaleprice;?>	</button>

<button ng-click="reportdaylist('2')" class="btn btn-info btn-lg" style="width:100px;">
	<?php echo $lang_profit;?></button>

			
			</center>

			</div>
			<div class="modal-footer">
			
			
			</div>
		</div>
	</div>
</div>






	</div>

</font>


			<script>



var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.s_type = '1';
$scope.year = '<?php echo date('Y',time());?>';

$('#Selectmode').modal('show');

$scope.parseFloat_func = function(x) {
	return parseFloat(x ? x : 0);
};



$scope.reportdaylist = function(x){
	
	if(x=='1'){
		$scope.s_type = '1';
		}else if(x=='2'){
		$scope.s_type = '2';
		}
		
	$scope.daylist = false;
$http.post("Reportsumarymonth/daylist",{
	year: $scope.year,
	s_type:$scope.s_type
	}).success(function(data){
$scope.daylist = data.data;

if(x){
$('#Selectmode').modal('hide');
}

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: item.m1-item.mm1,name: '<?=$lang_jan2?>'},
	{count: item.m2-item.mm2,name: '<?=$lang_feb2?>'},
	{count: item.m3-item.mm3,name: '<?=$lang_mar2?>'},
	{count: item.m4-item.mm4,name: '<?=$lang_april2?>'},
	{count: item.m5-item.mm5,name: '<?=$lang_may2?>'},
	{count: item.m6-item.mm6,name: '<?=$lang_jun2?>'},
	{count: item.m7-item.mm7,name: '<?=$lang_july2?>'},
	{count: item.m8-item.mm8,name: '<?=$lang_orgus2?>'},
	{count: item.m9-item.mm9,name: '<?=$lang_sep2?>'},
	{count: item.m10-item.mm10,name: '<?=$lang_org2?>'},
	{count: item.m11-item.mm11,name: '<?=$lang_novem2?>'},
	{count: item.m12-item.mm12,name: '<?=$lang_desam2?>'}
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
  labels: ['<?=$lang_profit?>'],
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
