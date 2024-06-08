
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">



<form>
  <div class="form-row">
  <div class="form-group col-md-12">
  <h2><b><?php echo $lang_pdws_1;?></b></h2>
  </div>
    <div class="form-group col-md-1">
      <label><?php echo $lang_pdws_2;?></label>
      <input ng-model="barcode_start" type="text" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-1">
      <label><?php echo $lang_pdws_3;?></label>
      <input ng-model="barcode_end" type="text" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group col-md-12">
  <hr />
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-12">
  <h2><b><?php echo $lang_pdws_4;?></b></h2>
  </div>
    <div class="form-group col-md-1">
      <label><?php echo $lang_pdws_2;?></label>
      <input ng-model="w_start" type="text" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-1">
      <label><?php echo $lang_pdws_3;?></label>
      <input ng-model="w_end" type="text" class="form-control" placeholder="">
    </div>
	<div class="form-group col-md-2">
      <label><?php echo $lang_pdws_5;?></label>
      <input ng-model="w_dc" type="text" class="form-control" placeholder="">
    </div>
  </div>
  
  
  <div class="form-group col-md-12">
  <hr />
  </div>
  
  <div class="form-row">
  <div class="form-group col-md-12">
  <h2><b><?php echo $lang_pdws_6;?></b></h2>
  </div>
    <div class="form-group col-md-1">
      <label><?php echo $lang_pdws_2;?></label>
      <input ng-model="price_start" type="text" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-1">
      <label><?php echo $lang_pdws_3;?></label>
      <input ng-model="price_end" type="text" class="form-control" placeholder="">
    </div>
	<div class="form-group col-md-2">
      <label><?php echo $lang_pdws_5;?></label>
      <input ng-model="price_dc" type="text" class="form-control" placeholder="">
    </div>
  </div>
  
  <div class="form-group col-md-12">
  <hr />
  </div>
  
  
  <div class="form-group col-md-12">

<select class="form-control" ng-model="dws_type" style="width:300px;">
  <option value="0"><?php echo $lang_pdws_7;?></option>
  <option value="1"><?php echo $lang_pdws_8;?></option>
  </select>
  <br />

  <button ng-click="Update()" class="btn btn-success btn-lg"><?php echo $lang_save;?></button>
  <br />
  <font color="red"><?php echo $lang_pdws_9;?></font>
  </div>

  
  
</form>




	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.get = function(){
   
$http.get('Product_dws/get')
       .then(function(response){
          var d = response.data.list[0];
$scope.barcode_start = d.barcode_start
$scope.barcode_end = d.barcode_end
$scope.w_start = d.w_start
$scope.w_end = d.w_end
$scope.w_dc = d.w_dc
$scope.price_start = d.price_start
$scope.price_end = d.price_end
$scope.price_dc	= d.price_dc
$scope.dws_type	= d.dws_type	  
                 
        });
   };
$scope.get();


$scope.Update = function(){
$http.post("Product_dws/Update",{
	barcode_start: $scope.barcode_start,
	barcode_end: $scope.barcode_end,
	w_start: $scope.w_start,
	w_end: $scope.w_end,
	w_dc: $scope.w_dc,
	price_start: $scope.price_start,
	price_end: $scope.price_end,
	price_dc: $scope.price_dc,
        dws_type: $scope.dws_type
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();

        });	
};





});
	</script>
