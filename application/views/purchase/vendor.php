
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<?php echo $lang_pcvd_1;?>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th><?php echo $lang_lopc_2;?></th>
			<th><?php echo $lang_address;?></th>
			<th><?php echo $lang_obmt_8;?></th>
			<th style="width:50px;">vat%</th>

			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="<?php echo $lang_lopc_2;?>" ng-model="vendor_name"></td>
			<td><input type="text" class="form-control" placeholder="<?php echo $lang_address;?>" ng-model="vendor_address"></td>
			<td><input type="text" class="form-control" placeholder="<?php echo $lang_obmt_8;?>" ng-model="id_vat"></td>
			<td><input type="text" class="form-control" placeholder="%" ng-model="vat"></td>

			<td><button ng-if="vendor_name !=''" class="btn btn-success" ng-click="Savevendor(vendor_name)"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in vendorlist">

		<td align="center">{{$index+1}}</td>

			<td ng-show="vendor_id==x.vendor_id"><input type="text" ng-model="x.vendor_name" class="form-control"></td>
			<td ng-show="vendor_id==x.vendor_id"><input type="text" ng-model="x.vendor_address" class="form-control"></td>
			<td ng-show="vendor_id==x.vendor_id"><input type="text" ng-model="x.id_vat" class="form-control"></td>
			<td ng-show="vendor_id==x.vendor_id"><input type="text" ng-model="x.vat" class="form-control"></td>



			<td ng-show="vendor_id!=x.vendor_id">
				{{x.vendor_name}}
			</td>
			<td ng-show="vendor_id!=x.vendor_id">
				{{x.vendor_address}}
			</td>
			<td ng-show="vendor_id!=x.vendor_id">
				{{x.id_vat}}
			</td>
			<td ng-show="vendor_id!=x.vendor_id">
				{{x.vat}}
			</td>


			<td ng-show="vendor_id!=x.vendor_id">
				<button class="btn btn-xs btn-warning" ng-click="Editinputvendor(x.vendor_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletevendor(x.vendor_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="vendor_id==x.vendor_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavevendor(x.vendor_id,x.vendor_name,x.vendor_address,x.id_vat,x.vat)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelvendor(x.vendor_id)"><?=$lang_cancel?></button>
			</td>

		</tr>
	</tbody>
</table>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>

	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.get = function(){

$http.get('vendor/get')
       .then(function(response){
          $scope.vendorlist = response.data.list;

        });
   };
$scope.get();


$scope.vendor_name = '';
$scope.vendor_address = '';
$scope.id_vat = '';
$scope.vat = '';


$scope.Savevendor = function(vendor_name){
$http.post("vendor/Add",{
	vendor_name: vendor_name,
	vendor_address: $scope.vendor_address,
	id_vat: $scope.id_vat,
	vat: $scope.vat
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.vendor_name = '';
$scope.vendor_address = '';
$scope.id_vat = '';
$scope.vat = '';
$scope.get();
        });
};

$scope.Editinputvendor = function(vendor_id){
$scope.vendor_id = vendor_id;
};

$scope.Cancelvendor = function(vendor_id){
$scope.vendor_id = '';
$scope.get();
};

$scope.Editsavevendor = function(vendor_id,vendor_name,vendor_address,id_vat,vat){
$http.post("vendor/Update",{
	vendor_id: vendor_id,
	vendor_name: vendor_name,
	vendor_address: vendor_address,
	id_vat: id_vat,
	vat: vat
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.vendor_id = '';
$scope.get();

        });
};


$scope.Deletevendor = function(vendor_id){
$http.post("vendor/Delete",{
	vendor_id: vendor_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};




});
	</script>
