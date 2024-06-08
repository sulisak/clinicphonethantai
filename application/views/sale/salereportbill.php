<font style="font-family:Phetsarath OT!important">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" name="" placeholder="<?=$lang_search?> <?php echo $lang_srpb_1;?>" ng-model="searchtext" ng-change="reportdaylist()" class="form-control" style="width:350px;">
</div>
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

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->

</form>
<hr />

<div id="openprint_table">


<center>
<img ng-if="!daylist" src="<?php echo $base_url;?>/pic/loading.gif">
</center>



<table ng-if="daylist" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">

<th style="text-align: center;"><?php echo $lang_rank;?></th>
			<th style="text-align: center;"><?php echo $lang_cusname;?></th>
			<th style="text-align: center;"><?php echo $lang_srpb_2;?></th>
			<th style="text-align: center;"><?php echo $lang_srpb_3;?></th>
			<th style="text-align: center;"><?php echo $lang_srpb_4;?></th>
			<th style="text-align: center;"><?php echo $lang_srpb_5;?></th>
			<th style="text-align: center;"><?php echo $lang_srpb_6;?></th>
			<th style="text-align: center;"><?php echo $lang_srpb_7;?></th>


		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist | filter:searchproduct">

<td align="center">{{$index+1}}</td>

			<td>{{x.cus_name}}</td>
			<td align="right">{{x.pay_money| number}}</td>
			<td align="right">{{x.sale_runno}}</td>
			<td align="right">{{x.pay_date}}</td>

			<td align="right">{{x.adddate}}</td>
			<td align="right">{{x.name}}</td>
			<td align="right">{{x.des}}</td>
		</tr>

		<tr>
			<td align="right" colspan="2"><?=$lang_all?></td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpayall() | number }}</td>

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

$scope.dayfrom = '<?php echo date('d-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';
$scope.searchtext = '';







$scope.reportdaylist = function(){
	$scope.daylist = false;
$http.post("Salereportbill/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.daylist = data;


        });
};
$scope.reportdaylist();



 $scope.Sumpayall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.pay_money != null){
	 pay_money = item.pay_money;
	 }else{
     pay_money = 0;
	 }
total += parseFloat(pay_money);
 });
    return total;
};











});

</script>
