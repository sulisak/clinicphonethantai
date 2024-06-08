<font style="font-family:Phetsarath OT!important">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<?php echo $lang_month;?>:
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
	<option value="07">
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
<?php echo $lang_year;?>:
<input ng-model="year" class="form-control" style="width: 70px;">

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
	<h1 ng-if="s_type=='1'"><b><?php echo $lang_rpsmd_1;?></b></h1>
	<h1 ng-if="s_type=='2'"><b><?php echo $lang_rpsmd_2;?></b></h1>
	
	
	
	<?php echo $lang_month;?> {{month}} <?php echo $lang_year;?> {{year}} </center>
 
 
 
	<div id="bar"></div>

<hr />
<table ng-if="daylist" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="text-align: center;width: 50px;"><?php echo $lang_day;?></th>

			<th style="text-align: center;">
	<span ng-if="s_type=='1'"><?php echo $lang_allsaleprice;?></span>
	<span ng-if="s_type=='2'"><?php echo $lang_profit;?></span>
				</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">

		<tr ng-repeat="x in datac">
		<td>{{x.name}}</td>
		<td align="right">{{x.count | number:2}}</td>
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

$scope.month = '<?php echo date('m',time());?>';


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
$http.post("Reportsumaryday/daylist",{
	year: $scope.year,
	month: $scope.month,
	s_type: $scope.s_type
	}).success(function(data){
$scope.daylist = data.data;

if(x){
$('#Selectmode').modal('hide');
}

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: parseFloat(item.d1 ? item.d1 : 0) - item.dd1,name: '1'},
	{count: parseFloat(item.d2 ? item.d2 : 0)-item.dd2,name: '2'},
	{count: parseFloat(item.d3 ? item.d3 : 0)-item.dd3,name: '3'},
	{count: parseFloat(item.d4 ? item.d4 : 0)-item.dd4,name: '4'},
	{count: parseFloat(item.d5 ? item.d5 : 0)-item.dd5,name: '5'},
	{count: parseFloat(item.d6 ? item.d6 : 0)-item.dd6,name: '6'},
	{count: parseFloat(item.d7 ? item.d7 : 0)-item.dd7,name: '7'},
	{count: parseFloat(item.d8 ? item.d8 : 0)-item.dd8,name: '8'},
	{count: parseFloat(item.d9 ? item.d9 : 0)-item.dd9,name: '9'},
	{count: parseFloat(item.d10 ? item.d10 : 0)-item.dd10,name: '10'},
	{count: parseFloat(item.d11 ? item.d11 : 0)-item.dd11,name: '11'},
	{count: parseFloat(item.d12 ? item.d12 : 0)-item.dd12,name: '12'},
	{count: parseFloat(item.d13 ? item.d13 : 0)-item.dd13,name: '13'},
	{count: parseFloat(item.d14 ? item.d14 : 0)-item.dd14,name: '14'},
	{count: parseFloat(item.d15 ? item.d15 : 0)-parseFloat(item.dd15 ? item.dd15 : 0),name: '15'},
	{count: parseFloat(item.d16 ? item.d16 : 0)-item.dd16,name: '16'},
	{count: parseFloat(item.d17 ? item.d17 : 0)-item.dd17,name: '17'},
	{count: parseFloat(item.d18 ? item.d18 : 0)-item.dd18,name: '18'},
	{count: parseFloat(item.d19 ? item.d19 : 0)-item.dd19,name: '19'},
	{count: parseFloat(item.d20 ? item.d20 : 0)-item.dd20,name: '20'},
	{count: parseFloat(item.d21 ? item.d21 : 0)-item.dd21,name: '21'},
	{count: parseFloat(item.d22 ? item.d22 : 0)-item.dd22,name: '22'},
	{count: parseFloat(item.d23 ? item.d23 : 0)-item.dd23,name: '23'},
	{count: parseFloat(item.d24 ? item.d24 : 0)-item.dd24,name: '24'},
	{count: parseFloat(item.d25 ? item.d25 : 0)-item.dd25,name: '25'},
	{count: parseFloat(item.d26 ? item.d26 : 0)-item.dd26,name: '26'},
	{count: parseFloat(item.d27 ? item.d27 : 0)-item.dd27,name: '27'},
	{count: parseFloat(item.d28 ? item.d28 : 0)-item.dd28,name: '28'},
	{count: parseFloat(item.d29 ? item.d29 : 0)-item.dd29,name: '29'},
	{count: parseFloat(item.d30 ? item.d30 : 0)-item.dd30,name: '30'},
	{count: parseFloat(item.d31 ? item.d31 : 0)-item.dd31,name: '31'}
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
  labels: ['ກຳໄລ'],
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
