<font style="font-family:Phetsarath OT!important">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">



<!-- <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div> -->


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


<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>

</form>
<br />

<center>
<img ng-if="!list" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<div id="openprint_table">

<center><b><h1><?php echo $lang_rpsmh_1;?></b></h1> {{dayfrom}} <?php echo $lang_to;?> {{dayto}} </center>
 
 
 
	<div id="bar"></div>




  <hr />
  <table ng-if="list" id="headerTable" class="table table-hover table-bordered">
  	<thead>
  		<tr class="trheader">
  		<th style="text-align: center;width: 100px;"><?php echo $lang_rpsmh_2;?></th>

  			<th style="text-align: center;"><?php echo $lang_allsaleprice;?></th>

  		</tr>
  	</thead>
  	<tbody style="font-size: 16px;font-weight: bold;">

  		<tr ng-repeat="x in list">
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

	</div>

</font>
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


$scope.parseFloat_func = function(x) {
	return parseFloat(x ? x : 0);
};



$scope.reportdaylist = function(){

$scope.list = false;

   $http.post("Reportsumaryhours/daylist",{
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.list = data;
$scope.Chart($scope.list);
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





});
	</script>
