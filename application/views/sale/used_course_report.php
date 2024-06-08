
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">



<!-- <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div> -->


<div style="float: left;">
<input type="text" ng-model="searchtext" class="form-control" placeholder="
<?=$lang_search?> <?php echo $lang_ucrp_1;?>" ng-change="getlist(searchtext,'1')">
</div>


<form class="form-inline">



<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>




</form>
<br />




<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th class="text-center"><?=$lang_rank?></th>

<th class="text-center"><?php echo $lang_cusname;?></th>
			<th class="text-center"><?php echo $lang_ucrp_2;?></th>
			<th class="text-center"><?php echo $lang_ucrp_3;?></th>
			<th class="text-center"><?php echo $lang_ucrp_4;?></th>
			<th class="text-center"><?php echo $lang_shift;?></th>
<th class="text-center"><?php echo $lang_ucrp_5;?></th>
			

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
	<td style="text-align:center;">
			{{x.cus_name}}
			</td>
	
			<td>
					{{x.product_name}}
					</td>

							<td class="text-center">
									{{x.used_course_num | number}}
									</td>

<td style="text-align:center;">
			{{x.name}}
			</td>
			<td style="text-align:center;">
			{{x.shift_id}}
			</td>
			<td style="text-align:center;">
			{{x.adddate}}
			</td>

		</tr>
		
		<tr>
		<td colspan="3" class="text-right">
		<b><?php echo $lang_all;?></b>
		</td>
		
		<td class="text-center">
		<b>{{Sumnumall() | number}}</b>
		</td>
		
		</tr>
	</tbody>
</table>




<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
	<option value="1000">1000</option>
	<option value="3000">3000</option>
	<option value="5000">5000</option>
	<option value="10000">10000</option>
	<option value="100000">100000</option>
	<option value="1000000">1000000</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>













	</div>


	</div>

	</div>


		<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};




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

$scope.perpage = '10';
$scope.page = '1';
$scope.getlist = function(searchtext,page,perpage){
   if(!searchtext){
   	searchtext = '';
   }


// if(searchtext!=''){
//    $scope.dayfrom = '';
//    $scope.dayto='';
//    }






    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

   $http.post("used_course_report/get",{
searchtext:$scope.searchtext,
page: $scope.page,
perpage: $scope.perpage,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.list = data.list;
$scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });

   };
$scope.getlist('','1');




 $scope.Sumnumall = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.used_course_num != null){
	 used_course_num = item.used_course_num;
	 }else{
     used_course_num = 0;
	 }
total += parseFloat(used_course_num);
 });
    return total;
};






});
	</script>
