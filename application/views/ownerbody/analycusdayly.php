

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<center><font size="4"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> <?=$lang_statcus?>  </font></center>

<hr />

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#day" aria-controls="day" role="tab" data-toggle="tab" ng-click="Getdata()"><?=$lang_date?></a></li>
    <li role="presentation"><a href="#month" aria-controls="month" role="tab" data-toggle="tab" ng-click="Getdatam()"><?=$lang_month?></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="day">
    	
<br />

<form class="form-inline">
<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="Getdata()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลดรายชื่อลูกค้า" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button> 
</div> -->
</form>

<div id="line"></div>


<table class="table table-hover table-responsive">
	<thead>
		<tr style="background-color: #eee;">
			<th><?=$lang_day?></th>
			
			<th class="text-center" colspan="2"><?=$lang_downloadcus?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in datalist">
			<td>{{x.name}}</td>
			<td class="text-right">{{x.count}}</td>
			<td class="text-left">
			<button class="btn btn-info btn-xs" ng-click="DownloadExcelThisday(x.name)"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button></td>
		</tr>
	</tbody>
</table>

    </div>
    <div role="tabpanel" class="tab-pane" id="month">
    	

   	
<br />

<form class="form-inline">
<div class="form-group">
<input type="text" id="yearselect" name="yearselect" ng-model="yearselect" class="form-control" placeholder="<?=$lang_year?>"> 
</div>

<div class="form-group">
<button type="submit" ng-click="Getdatam()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcelm()" title="<?=$lang_downloadcus?>" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button> 
</div>
</form>

<div id="line2"></div>


<table class="table table-hover table-responsive">
	<thead>
		<tr style="background-color: #eee;">
			<th><?=$lang_months?></th>
			
			<th class="text-center" colspan="2"><?=$lang_downloadcus?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in datalistm">
			<td>{{x.name}}</td>
			<td class="text-right">{{x.count}}</td>
			<td class="text-left">
			<button class="btn btn-info btn-xs" ng-click="DownloadExcelThism(x.name)"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button></td>
		</tr>
	</tbody>
</table>

    </div>
  </div>




</div>



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
$scope.yearselect = '<?php echo date('Y',time());?>';

$scope.Chart = function(Datachart){
$scope.color = [];
$('#line').empty();
for(x=1;x<=Datachart.length;x++){
 
  var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    $scope.color.push(color);
   

  }

Morris.Line({
  element: 'line',
  data: Datachart,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['<?=$lang_qty?>'],
  parseTime: false,
  lineColors: $scope.color,
  pointFillColors: $scope.color

});
};

$scope.Chart2 = function(Datachart){
$scope.color2 = [];
$('#line2').empty();
for(x=1;x<=Datachart.length;x++){
 
  var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    $scope.color2.push(color);
   

  }

Morris.Line({
  element: 'line2',
  data: Datachart,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['<?=$lang_qty?>'],
  parseTime: false,
  lineColors: $scope.color2,
  pointFillColors: $scope.color2

});
};







$scope.Getdata = function(){
$http.post("analycusdayly/get",{
	'dayfrom': $scope.dayfrom,
	'dayto': $scope.dayto
	}).success(function(data){
		$('.lodingbefor').css('display','block');
$scope.datalist = data.list;
$scope.Chart(data.list);

        });

};
$scope.Getdata();


$scope.Getdatam = function(){
	$http.post("analycusdayly/getm",{
	'yearselect': $scope.yearselect
	}).success(function(data){
$scope.datalistm = data.list;
$scope.Chart2(data.list);

        });

};




$scope.DownloadExcel = function(){

$http.post("analycusdayly/excel",{
	'excel': '1',
	'dayfrom': $scope.dayfrom || '',
	'dayto': $scope.dayto || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};

$scope.DownloadExcelm = function(){

$http.post("analycusdayly/excelm",{
	'excel': '1',
	'yearselect': $scope.yearselect || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


$scope.DownloadExcelThisday = function(day){

$http.post("analycusdayly/excelthisday",{
	'excel': '1',
	'thisday': day || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};

$scope.DownloadExcelThism = function(m){

$http.post("analycusdayly/excelthism",{
	'excel': '1',
	'thism': m || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};








});
	</script>