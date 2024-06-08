
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">




<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			
			<th class="text-center"><?php echo $lang_lchp_1;?></th>
<th class="text-center"><?php echo $lang_lchp_2;?></th>

<th class="text-center"><?php echo $lang_lchp_3;?></th>
			

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
<td style="text-align:center;">
		
			<span ng-if="x.type=='1'"><?php echo $lang_lchp_4;?></span>
			<span ng-if="x.type=='2'"><?php echo $lang_lchp_5;?></span>
			<span ng-if="x.type=='3'"><?php echo $lang_lchp_6;?></span>
			<span ng-if="x.type=='4'"><?php echo $lang_lchp_7;?>
			<br />	<?php echo $lang_lchp_8;?> {{x.dayfrom}}    <?php echo $lang_lchp_9;?> {{x.dayto}}
				</span>
			</td>

		
<td style="text-align:center;">
			{{x.name}}
			</td>
			<td style="text-align:center;">
			{{x.deltime}}
			</td>

		</tr>
	</tbody>
</table>




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

$scope.getlist = function(searchtext,page,perpage){


   $http.post("log_c2mhelper/get",{
}).success(function(data){
$scope.list = data;


        });

   };
$scope.getlist();






});
	</script>
