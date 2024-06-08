

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<center><font size="4"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> <?=$lang_statsummary?> </font></center>



<form class="form-inline" style="float: right;">

<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="Showchart(optionchart,idx,name)" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
</form>


			<select id="optionchart" class="form-control" ng-model="optionchart" style="max-width: 300px;" ng-change="Showchart(optionchart,'')">

			<option ng-show="optionchart=='9'" value="10">--<?=$lang_selectlist?>--</option>
				<option ng-show="province" value="11">--<?=$lang_selectlist?>--</option>

							<option ng-hide="province || optionchart=='9'" value="1">--<?=$lang_selectlist?>--</option>

				<option value="1"><?=$lang_stat?><?=$lang_cusproductservice?></option>
				<option value="2"><?=$lang_stat?><?=$lang_cusgroup?></option>
				<option value="3"><?=$lang_stat?><?=$lang_cusrank?></option>
				<option value="4"><?=$lang_stat?><?=$lang_cussex?></option>
				<option value="5"><?=$lang_stat?><?=$lang_cuscontactchanel?></option>
				<option value="6"><?=$lang_stat?><?=$lang_cusgrade?></option>
				<option value="7"><?=$lang_stat?><?=$lang_cusreasonbuy?></option>
				<option value="8"><?=$lang_stat?><?=$lang_cusreasonnotbuy?></option>
				<option value="9" ng-hide="true">สถิติรายการจากลูกค้าที่อยู่ในประเทศไทย</option>
				
			</select>
	


	<select   ng-show="optionchart=='9'" name="" id="" class="form-control" ng-model="province" ng-change="Showchart('10',province)" style="max-width: 300px;">
		<option value="">เลือกจังหวัด</option>
		<option ng-repeat="p in Datachartp" value="{{p.id}}">{{p.name}}</option>
	</select>
	


	<select  ng-show="province" name="" id="" class="form-control" ng-model="amphur" ng-change="Showchart('11',amphur)" style="max-width: 300px;">
		<option value="">เลือกอำเภอ</option>
		<option ng-repeat="a in Datacharta" value="{{a.id}}">{{a.name}}</option>
	</select>



		<input type="checkbox" ng-model="donut" ng-change="Showchart(optionchart,idx)"> <?=$lang_show?><?=$lang_donut?>




<center ng-hide="donut"><font size="3"><b><?=$lang_bar?></b></font></center>
<div ng-hide="donut" id="bar"></div>

<center ng-show="donut"><font size="3"><b><?=$lang_donut?></b></font></center>
<div ng-show="donut" id="donut"></div>

<hr />
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>#</th><th class="text-center" colspan="2"><?=$lang_downloadcus?></th><th class="text-center" ng-show="optionchart=='2' || optionchart=='3' || optionchart=='4' || optionchart=='5' || optionchart=='6' || optionchart=='7' || optionchart=='8' || optionchart=='9' || optionchart=='10' || optionchart=='11'" colspan="2"><?=$lang_downloadproductservice?></th>
			<th class="text-center" ng-show="optionchart=='7' || optionchart=='8'"><?=$lang_downloadcontact?></th>
		</tr>
	</thead>
	<tbody>
	<tr ng-repeat="dc in Datachart"  ng-if="dc.name==null">
			<td><u>ยังไม่ได้ระบุจังหวัด</u></td><td class="text-right">{{dc.count}}</td>
			<td class="text-left"><button class="btn btn-warning btn-xs" ng-click="DownloadExcel(optionchart,idx,'0')"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button></td>
		</tr>
		<tr ng-repeat="dc in Datachart"  ng-if="dc.name!=null">
			<td>{{dc.name}}</td>
			<td class="text-right">{{dc.count}}</td>
			<td class="text-left"><button class="btn btn-info btn-xs" ng-click="DownloadExcel(optionchart,idx,dc.id)"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button></td>


<td class="text-right" ng-show="optionchart=='2' || optionchart=='3' || optionchart=='4' || optionchart=='5' || optionchart=='6' || optionchart=='7' || optionchart=='8' || optionchart=='9' || optionchart=='10' || optionchart=='11'">{{dc.productcount}}</td>

			<td class="text-left" ng-show="optionchart=='2' || optionchart=='3' || optionchart=='4' || optionchart=='5' || optionchart=='6' || optionchart=='7' || optionchart=='8' || optionchart=='9' || optionchart=='10' || optionchart=='11'">
			<button class="btn btn-info btn-xs" ng-click="DownloadExcelProduct(optionchart,idx,dc.id)"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button></td>

			<td class="text-center" ng-show="optionchart=='7' || optionchart=='8'"><button class="btn btn-info btn-xs" ng-click="DownloadExcelContact(optionchart,idx,dc.id)"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button></td>

		</tr>
	</tbody>
</table>


<div id="exportable">{{exporttable}}</div>


	</div>
</div>






</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.color =[];
$scope.optionchart = '1';
$scope.donutdada = [];
$scope.dayfrom = '<?php echo date('01-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';

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




$scope.Chart = function(Datachart){

Morris.Bar({
  element: 'bar',
  data: Datachart,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['จำนวน'],
  barColors: function (row, series, type) {
    if (type === 'bar') {
     var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
    }
  }

});

if($scope.donut){
angular.forEach(Datachart,function(item){
$scope.donutdada.push({label:item.name,value:item.count});
});
}else{
	$scope.donutdada = [];
}

for(x=1;x<=Datachart.length;x++){
 
  var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    $scope.color.push(color);
   

  }
 

    Morris.Donut({
  element: 'donut',
  colors: $scope.color,
  data:  $scope.donutdada
});



};


$scope.Showchart = function(optionchart,id,name){
	if(!optionchart){
		var optionchart = '1';
	}
	$('#bar').empty();
	$('#donut').empty();
	$scope.donutdada = [];
	$scope.color = [];
$scope.Datachart = [];
$scope.Datachartp = [];
$scope.Datacharta = [];



$http.post("analyticall/get",{
	'optionchart': optionchart,
	'id': id,
	'dayfrom': $scope.dayfrom,
	'dayto': $scope.dayto
	}).success(function(data){
$('.lodingbefor').css('display','block');
$scope.Datachart = data.chart;

$scope.Chart($scope.Datachart);

$scope.name = name;
$scope.optionchart = optionchart;

if(optionchart=='9'){
$scope.Datachartp = data.chart;
$scope.idx = id;
}else if(optionchart=='10'){
$scope.Datacharta = data.chart;
$scope.amphur = '';
$scope.idx = id;
}else if(optionchart=='11'){
$scope.province = '';
$scope.idx = id;
}else{
	$scope.idx = '';
}


        });	
};
$scope.Showchart();


$scope.DownloadExcel = function(optionchart,id,excel_id){

$http.post("analyticall/excel",{
	'optionchart': optionchart,
	'id': id,
	'excel_id': excel_id,
	'dayfrom': $scope.dayfrom,
	'dayto': $scope.dayto
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};



$scope.DownloadExcelProduct = function(optionchart,id,excel_id){

$http.post("analyticall/excelproduct",{
	'optionchart': optionchart,
	'id': id,
	'excel_id': excel_id,
	'dayfrom': $scope.dayfrom,
	'dayto': $scope.dayto
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};



$scope.DownloadExcelContact = function(optionchart,id,excel_id){

$http.post("analyticall/excelcontact",{
	'optionchart': optionchart,
	'id': id,
	'excel_id': excel_id,
	'dayfrom': $scope.dayfrom,
	'dayto': $scope.dayto
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};



});
	</script>