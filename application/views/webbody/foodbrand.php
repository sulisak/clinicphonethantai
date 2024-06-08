
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="row">
<div class="col-md-12">

<center>
<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?>" style="min-width: 300px;height: 50px;font-size: 20px;">
</div>
<div class="form-group">
<button ng-click="Searchmodal(searchtext)" class="btn btn-success" style="height: 50px;font-size: 20px;"><?=$lang_search?></button>
</div>
</form>
</center>
<br />

<?php 
if(!isset($_GET['foodid'])){
foreach ($getdata as $row) {
echo '
<div class="col-md-3">
<div class="col-md-12 panel panel-body panel-default text-center">

<center>
<a title="'.$row['food_name'].'" href="'.$base_url.'/foodbrand?id='.$_GET['id'].'&catid='.$row['food_category_id'].'&foodid='.$row['food_id'].'" style="color:#000;">	<img src="'.$row['food_image'].'"  style="width:100%;height:250px;"> </a>
<br />
<a href="'.$base_url.'/foodbrand?id='.$_GET['id'].'&catid='.$row['food_category_id'].'&foodid='.$row['food_id'].'" style="color:#000;font-weight:bold;">	'.$row['food_name'].' </a>
	<br />
'.$lang_price.': <span style="color:red;font-weight:bold;">
'.number_format($row['food_price'],0).'
</span>


</center>

</div>
	</div>
';
}
}



if(isset($_GET['foodid'])){
foreach ($getdata as $row) {
echo '

<div class="col-md-7 panel panel-body panel-default text-center">


	<img src="'.$row['food_image'].'"  style="width:100%;height:500px;"> 

	</div>


	<div class="col-md-5 panel panel-body panel-default text-center" style="height:530px;">


<h1>

<span style="font-weight:bold;">'.$row['food_name'].'</span> 
	
<hr />
'.$lang_price.': <span style="color:red;font-weight:bold;">
'.number_format($row['food_price'],0).'
</span>


<hr />
</h1>

	</div>


';
}
}

?>





</div>
</div>




<div class="modal fade" id="search-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_searchlist?></h4>
			</div>
			<div class="modal-body" style="height: 400px;">
				
				<center>
<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?>" style="min-width: 300px;height: 50px;font-size: 20px;">
</div>
<div class="form-group">
<button ng-click="Searchmodal(searchtext)" class="btn btn-success" style="height: 50px;font-size: 20px;"><?=$lang_search?></button>
</div>
</form>

</center>
<br />
<?=$lang_searchresult?>
<br />

<div class="col-md-4" ng-repeat="x in searchlist">
<center>
<a href="<?php echo $base_url.'/foodbrand?id='.$_GET['id'].'&catid={{x.food_category_id}}&foodid={{x.food_id}}'; ?> " style="color:#000;">
<img src="<?php echo $base_url;?>/{{x.food_image}}" style="width: 100%;height: 200px;">
</a>
<br />
<span style="font-weight: bold;">{{x.food_name}}</span>
<br />
<?=$lang_price?>: 
<span style="color:red;font-weight:bold;">
{{x.food_price| number}}</span>


</center>
</div>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
				
			</div>
		</div>
	</div>
</div>






</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.Searchmodal = function(searchtext){ 
$('#search-modal').modal('show');

$http.post("Foodbrand/Searchbox",{
id: <?php echo $_GET['id'];?>,
searchtext: searchtext
}).success(function(data){
          $scope.searchlist = data; 
                 
});



   };


});
	</script>