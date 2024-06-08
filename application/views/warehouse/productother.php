
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">



<div class="form-group" style="float: left;">
<button class="btn btn-primary" ng-click="Modaladd()"><?php echo $lang_pdo_1;?></button>
</div>


<form class="form-inline">

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" 
placeholder="<?=$lang_search?> <?php echo $lang_pdo_2;?>" style="width: 350px;" ng-change="getlist(searchtext,'1')">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>


<br />


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<table id="headerTable" class="table table-hover table-bordered" style="font-size: 14px;">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 1px;"><?=$lang_rank?></th>
			
			<th style="text-align: center;"><?php echo $lang_pdo_3;?></th>
			<th style="text-align: center;"><?php echo $lang_pdo_4;?></th>
			<th style="text-align: center;"><?php echo $lang_pdo_5;?></th>
			<th style="width: 80px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in list">
		<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>





			<td>{{x.product_ot_name}}

			</td>



			<td align="right">
				
				{{x.product_ot_price | number}}
				
				<span ng-if="x.type=='0'"><?php echo $lang_pdo_6;?></span>
				<span ng-if="x.type=='1'">%</span>
				<span ng-if="x.type=='2'"><?php echo $lang_pdo_7;?></span>
				
				</td>


			<td align="center">
				<span ng-if="x.show_all=='0'" style="color:green;"><?php echo $lang_pdo_8;?></span>
		<span ng-if="x.show_all=='1'"><?php echo $lang_pdo_9;?></span>
			</td>


			<td>

				<button class="btn btn-xs btn-warning" ng-click="Editinputproduct(x)"><?=$lang_edit?></button>
				<button ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deleteproduct(x.pot_ID)"><?=$lang_delete?></button>
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
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>








<div class="modal fade" id="Openadd">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_pdo_1;?></h4>
			</div>
			<div class="modal-body">
				<form id="uploadImg"  enctype="multipart/form-data" method="POST">

<input type="hidden" name="product_ot_image" accept="image/*" class="form-control" value="">

<?php echo $lang_pdo_3;?>
<input type="text" name="product_ot_name"  placeholder="<?php echo $lang_pdo_3;?>" class="form-control" required="required">
<p></p>



<center>
<select name="type">
	<option value="0">
	<?php echo $lang_pdo_6;?>
	</option>
	<option value="1">
	%
	</option>
<option value="2">
	<?php echo $lang_pdo_7;?>
	</option>
	</select>
	</center>
	
	<input type="text" name="product_ot_price"  placeholder="" class="form-control text-right">


	<p></p>
	<select class="form-control" name="show_all">
		<option value="0">
			<?php echo $lang_pdo_8;?>
		</option>
		<option value="1">
			<?php echo $lang_pdo_9;?>
		</option>
	</select>
	<p></p>


<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Openedit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_pdo_10;?></h4>
			</div>
			<div class="modal-body">
				<form id="Updatedata"  enctype="multipart/form-data" method="POST">

<input type="hidden" name="pot_ID" id="pot_ID">
<input type="hidden" name="product_ot_image2" id="product_ot_image2">
<center>
<img ng-if="product_ot_image!=''" ng-src="<?php echo $base_url;?>/{{product_ot_image}}" width="70px" height="70px;">
</center>

<input type="hidden" name="product_ot_image" accept="image/*" class="form-control" value="">


<?php echo $lang_pdo_3;?>
<input type="text" name="product_ot_name" id="product_ot_name" placeholder="<?php echo $lang_pdo_3;?>" class="form-control" required="required">


	<p></p>
<center>
<select name="type" id="type">
	<option value="0">
	<?php echo $lang_pdo_6;?>
	</option>
	<option value="1">
	%
	</option>
<option value="2">
	<?php echo $lang_pdo_7;?>
	</option>
	</select>
	</center>
	
	<input type="text" name="product_ot_price" id="product_ot_price" placeholder="" class="form-control text-right">

<p></p>

<select class="form-control" name="show_all" id="show_all">
	<option value="0">
		<?php echo $lang_pdo_8;?>
	</option>
	<option value="1">
		<?php echo $lang_pdo_9;?>
	</option>
</select>
<p></p>


<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>









	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.productlist = [];

$scope.Modaladd = function(){
$('#Openadd').modal('show');
};





$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){
    if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

 $http.post("Productother/get",{
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






$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Productother/Add',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#uploadImg" )[0].reset();
$('#Openadd').modal('hide');
$scope.getlist();


            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));


});



$scope.Editinputproduct = function(x){
	$('#Openedit').modal('show');
$("#pot_ID").val(x.pot_ID);
$("#product_ot_name").val(x.product_ot_name);
$("#product_ot_image2").val(x.product_ot_image);
$("#product_ot_price").val(x.product_ot_price);
$("#show_all").val(x.show_all);
$("#type").val(x.type);

$scope.product_ot_image = x.product_ot_image;

};

$scope.Cancelproduct = function(pot_ID){
$scope.pot_ID = '';
$scope.getlist();
};




$(document).ready(function (e) {
    $('#Updatedata').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Productother/Update',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#Updatedata" )[0].reset();
$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);
$('#Openedit').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

});





$scope.Deleteproduct = function(pot_ID){
$http.post("Productother/Delete",{
	pot_ID: pot_ID
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist();
        });
};









});
	</script>
