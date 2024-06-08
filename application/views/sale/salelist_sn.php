<font style="font-family: Phetsarath OT !important;">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">




<div style="float: left;">
<input type="text" ng-model="searchtext" style="width:500px;" class="form-control" placeholder="
<?=$lang_search?> <?php echo $lang_slsn_1;?>" ng-change="getlist(searchtext,'1',perpage)">
</div>


<form class="form-inline">


<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1',perpage)" class="btn btn-success" placeholder="" title="<?=$lang_search?>">
<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
<?php echo $lang_search;?>
</button>
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

<center><b><h1><?php echo $lang_slsn_2;?></b></h1> </center>
 

<table ng-if="list" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_rank?></th>
			<th>SN</th>
			<th><?php echo $lang_productname;?></th>
			<th><?php echo $lang_barcode;?></th>
			<th><?=$lang_runno?></th>
			<th><?=$lang_cusname?></th>

				<th><?=$lang_sales?></th>
			<th><?php echo $lang_saledate;?></th>		

				<th><?php echo $lang_branch;?></th>
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			
			<td>
			{{x.sn_code}}
			</td>
			
			<td>
			{{x.product_name}}
			</td>
			
			<td>
			{{x.product_code}}
			</td>
			
			<td>
			{{x.sale_runno}}
			</td>
			<td>


			{{x.cus_name}}


			</td>



<td>
	{{x.name}}
</td>

			<td>{{x.adddate}}</td>
			
			
			<td class="text-center">
				{{x.branch_name}}
				
				</td>

		</tr>
		

		
		
	</tbody>
</table>

</div>


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
</font>

		<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};


$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};










$scope.perpage = '100';
$scope.getlist = function(searchtext,page,perpage){
	
$scope.list = false;
	
   if(!searchtext){
   	searchtext = '';
   }


if(searchtext!=''){
   //$scope.dayfrom = '';
   //$scope.dayto='';
   }






    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '100';
   }

   $http.post("Salelist_sn/get",{
searchtext:searchtext,
page: page,
perpage: perpage
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
















});
	</script>
	
	
	
	
