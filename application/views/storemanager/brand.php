
<div class="col-md-12" ng-app="firstapp" ng-controller="Index">


	

<div class="panel panel-default col-md-12">
	<div class="panel-body">


<!--
<button class="btn btn-primary" ng-click="Openmodal()"><?=$lang_addbrand?> +</button>
<hr />
<input type="text" ng-model="search" name="" placeholder="ค้นหา" class="form-control" style="width: 200px;">
<br />-->
<table id="headerTable" class="table table-hover"  ng-repeat="x in list">
	<thead  style="background-color: #eee;">
		<tr>
			<th>Logo</th>
			<th><?=$lang_brandname?></th>
			<th><?=$lang_address?></th>
			<th><?=$lang_tax?></th>
			

			<th style="width: 10px;"><?=$lang_edit?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>

<form class="form-inline">
<img ng-if="x.owner_logo != ''" ng-src="<?php echo $base_url;?>/{{x.owner_logo}}" style="height: 50px;">


<button class="btn btn-info" ng-click="Updatelogomodal(x)"><?php echo $lang_smb_1;?></button>

<select class="form-control" ng-change="Logoonslip(x)" ng-model="x.logoonslip">
	<option value="0"><?php echo $lang_smb_2;?></option>
	<option value="1"><?php echo $lang_smb_3;?></option>
</select>

</form>

			</td>
			<td>{{x.owner_name}}</td>
			<td>
			{{x.owner_address}}



 Tel: {{x.tel}}
			</td>
			<td>{{x.owner_tax_number}}</td>
	

			<td>
				<button class="btn btn-warning btn-xs" ng-click="Openmodaledit(x)"><?=$lang_edit?></button>
			</td>
		</tr>



		<tr>

				<td colspan="5" style="text-align: center;">

<?php echo $lang_smb_4;?>
<input ng-model="x.youtube_url_forcus" class="form-control" 
placeholder="https://www.youtube.com/watch?v=YBPdxZLersk <?php echo $lang_smb_5;?>">
				</td>
</tr>

				<tr>
				<td>
		<button class="btn btn-success btn-lg" ng-click="Updatefooter_slip(x)"><?php echo $lang_save;?></button>


				</td>
			</tr>



		<tr>

			<td colspan="6" style="text-align: center;">
			
			<div>
			<form action="<?php echo $base_url; ?>/storemanager/brand/savecolortheme" method="post">
    <input type="color" id="color_theme" name="color_theme"
           value="<?php echo $_SESSION['color_theme'];?>">
    <label for="color_theme">Theme</label>
	<input type="submit" value="<?php echo $lang_save;?> Theme" class="btn btn-success">
	</form>
</div>


<br />
			<br />

<button class="btn btn-warning" ng-click="Updatefontc2mmodal()">
	<?php echo $lang_smb_6;?> (<?php echo $_SESSION['fontc2m'];?>)</button>

<button class="btn btn-warning" ng-click="Updatefontslipmodal()">
	<?php echo $lang_smb_7;?>(<?php echo $_SESSION['fontslip'];?>)</button>




			<br />
			<br />
<button class="btn btn-info" ng-click="Updatebgimgmodal(x)">
	<?php echo $lang_smb_8;?></button>
<hr />
<img class="img" ng-if="x.owner_bgimg != ''" ng-src="<?php echo $base_url;?>/{{x.owner_bgimg}}" style="max-width: 300px;">



			</td>
		</tr>
	</tbody>
</table>

<!-- <hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button> -->

</div>
</div>









<div class="panel panel-default col-md-12">
	<div class="panel-body">




<button class="btn btn-primary btn-lg" ng-click="Addbranch()">
	<?php echo $lang_smb_9;?></button>
<br/><br/>
<table id="headerTable" class="table table-hover">

	<tbody>

		<tr ng-repeat="x in datalist">

	<td>{{x.branch_name}}</td>
	<td>{{x.branch_address}}</td>
	<td>{{x.branch_tel}}</td>
	<td><button ng-if="x.branch_id!='1'" class="btn btn-xs btn-warning" ng-click="Editebranch(x)">ແກ້ໄຂ</button></td>


		</tr>
	</tbody>
</table>


	</div>


	</div>
	
	
	




<div class="modal fade" id="modalstore">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addbrand?></h4>
			</div>
			<div class="modal-body">







<fieldset>
                    <div class="form-group">
                    	<?=$lang_brandname?>
			    		    <input class="form-control" placeholder="<?=$lang_brandname?>" ng-model="owner_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

<div class="form-group">
	<?=$lang_tax?>
			    		    <input class="form-control" placeholder="<?=$lang_tax?>" ng-model="owner_tax_number" type="text" style="height: 50px;font-size: 20px;">
			    		</div>





<div class="form-group">
	<?=$lang_address?>
	<textarea name="owner_address" class="form-control" placeholder="<?=$lang_address?>" ng-model="owner_address" style="height: 70px;font-size: 20px;">
</textarea>
</div>





 <div class="col-md-12">
			    		<br />
			    		</div>


 <div class="form-group">
			    		    <input class="form-control" placeholder="<?=$lang_tel?>" ng-model="tel" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Addbrand()" value="<?=$lang_addbrand?>" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Editbrand()" value="<?=$lang_confirm?>" ng-show="foredit">

			    	</fieldset>








			</div>
			<div class="modal-footer">


			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="updatelogomodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Logo Upload</h4>
			</div>
			<div class="modal-body">


<form id="uploadImg"  enctype="multipart/form-data" method="POST">
	<div class="form-group">

<input type="hidden" name="owner_id" value="{{owner_id_logo}}">
<input type="file" name="owner_logo" accept="image/*" class="form-control" value="">
</div>
<div class="form-group">
<button class="btn btn-success" type="submit"><?=$lang_save?> logo</button>
</div>
</form>


			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="updatefontc2mmodal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_smb_10;?></h4>
			</div>
			<div class="modal-body" style="font-size:20px;">

<table class="table table-hover table-bodered">
<tr ng-repeat="x in fontfamily_json">
<td>
<button class="btn btn-success" ng-click="Selectfontc2m(x)"><?php echo $lang_select;?></button>	
</td>
<td style="font-family: '{{x.fontname}}'">{{x.fontname}}</td>
<td style="font-family: '{{x.fontname}}'"><?php echo $lang_smb_11;?></td>
</tr>	
</table>


			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="updatefontslipmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_smb_12;?></h4>
			</div>
			<div class="modal-body" style="font-size:20px;">

<table class="table table-hover table-bodered">
<tr ng-repeat="x in fontfamily_json">
<td>
<button class="btn btn-success" ng-click="Selectfontslip(x)"><?php echo $lang_select;?></button>	
</td>
<td>{{x.fontname}}</td>
<td style="font-family: '{{x.fontname}}'"><?php echo $lang_smb_11;?></td>
</tr>	
</table>


			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>












<div class="modal fade" id="addbranchmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_smb_13;?></h4>
			</div>
			<div class="modal-body">

<input type="text" class="form-control" ng-model="branch_name" placeholder="<?php echo $lang_brandname;?>">
<br />
<textarea class="form-control" ng-model="branch_address" placeholder="<?php echo $lang_address;?>"></textarea>
<br />
<input type="text" class="form-control" ng-model="branch_tel" placeholder="<?php echo $lang_tel;?>">
<br />

<select class="form-control" ng-model="branch_type" style="width:200px;">
	<option value="0"><?php echo $lang_smb_14;?></option>
	<option value="1"><?php echo $lang_smb_15;?></option>
	</select>
<br />	
<button class="btn btn-success" ng-click="Saveaddbranch()"><?php echo $lang_save;?></button>

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="editebranchmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_smb_16;?></h4>
			</div>
			<div class="modal-body">

<input type="text" class="form-control" ng-model="branch_name" placeholder="<?php echo $lang_brandname;?>">
<br />
<textarea class="form-control" ng-model="branch_address" placeholder="<?php echo $lang_address;?>"></textarea>
<br />
<input type="text" class="form-control" ng-model="branch_tel" placeholder="<?php echo $lang_tel;?>">
<br />
<select class="form-control" ng-model="branch_type" style="width:200px;">
	<option value="0"><?php echo $lang_smb_14;?></option>
	<option value="1"><?php echo $lang_smb_15;?></option>
	</select>
<br />	

<button class="btn btn-success" ng-click="Saveeditebranch()"><?php echo $lang_save;?></button>

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>










<div class="modal fade" id="updatebgimgmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Image Background</h4>
			</div>
			<div class="modal-body">


<form id="uploadbgImg"  enctype="multipart/form-data" method="POST">
	<div class="form-group">

<input type="hidden" name="owner_id" value="{{owner_id_bgimg}}">
<input type="file" name="owner_bgimg" accept="image/*" class="form-control" value="">
</div>
<div class="form-group">
<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</div>
</form>


			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>






</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
$scope.bankaccount = '';
$scope.cfwd = false;
$scope.foredit = false;

$scope.owner_name = '';
$scope.owner_tax_number  = '';
$scope.owner_address = '';
$scope.tel  = '';
$scope.owner_vat  = '0';
$scope.owner_vat_status  = '0';



$scope.Openmodal = function(){
$('#modalstore').modal('show');
$scope.foredit = false;
};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.owner_id = x.owner_id;
$scope.owner_name = x.owner_name;
$scope.owner_tax_number = x.owner_tax_number;
$scope.owner_address = x.owner_address;
$scope.owner_vat= x.owner_vat;
$scope.owner_vat_status= x.owner_vat_status;
$scope.tel = x.tel;

};


$scope.get = function(){

$http.get('Brand/get')
       .then(function(response){
          $scope.list = response.data;

        });
   };
$scope.get();



$scope.getbranch = function(){

$http.get('Brand/getbranch')
       .then(function(response){
          $scope.datalist = response.data;

        });
   };
$scope.getbranch();



$scope.Addbrand = function(){

if($scope.owner_name != '' && $scope.owner_address != '' && $scope.tel != ''){
$http.post("Brand/Add",{
	owner_name: $scope.owner_name,
	owner_tax_number: $scope.owner_tax_number,
	owner_address: $scope.owner_address,
	owner_vat: $scope.owner_vat,
	owner_vat_status: $scope.owner_vat_status,
	tel: $scope.tel
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$('#modalstore').modal('hide');
$scope.foredit = false;
        });
}else{
	toastr.warning('<?=$lang_plz?>');
}


};




$scope.Addbranch = function(){
$scope.branch_name = '';
$scope.branch_address = '';
$scope.branch_tel = '';
$scope.branch_type = '0';
$('#addbranchmodal').modal('show');
};



$scope.Saveaddbranch = function(){
	if($scope.branch_name != '' && $scope.branch_address != '' && $scope.branch_tel!= ''){
$http.post("Brand/addbranch",{
	branch_name: $scope.branch_name,
	branch_address: $scope.branch_address,
	branch_tel: $scope.branch_tel,
	branch_type: $scope.branch_type
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getbranch();
$('#addbranchmodal').modal('hide');
        });

        }else{
	toastr.warning('<?=$lang_plz?>');
}


};




$scope.Editebranch = function(x){
$scope.branch_name = x.branch_name;
$scope.branch_address = x.branch_address;
$scope.branch_tel = x.branch_tel;
$scope.branch_id = x.branch_id;
$scope.branch_type = x.branch_type;
$('#editebranchmodal').modal('show');
};


$scope.Saveeditebranch = function(){
	if($scope.branch_name != '' && $scope.branch_address != '' && $scope.branch_tel!= ''){
$http.post("Brand/editebranch",{
	branch_id: $scope.branch_id,
	branch_name: $scope.branch_name,
	branch_address: $scope.branch_address,
	branch_tel: $scope.branch_tel,
	branch_type: $scope.branch_type
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getbranch();
$('#editebranchmodal').modal('hide');
        });

        }else{
	toastr.warning('<?=$lang_plz?>');
}


};



$scope.Updatelogomodal = function(x){

$scope.owner_id_logo = x.owner_id;
$('#updatelogomodal').modal('show');

};


$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Brand/Addimg',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#uploadImg" )[0].reset();
$scope.get();
$('#updatelogomodal').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));


});



$scope.fontfamily_json = <?php echo $fontfamily_json;?>;


$scope.Updatefontc2mmodal = function(){
$('#updatefontc2mmodal').modal('show');

};




$scope.Updatefontslipmodal = function(){

$('#updatefontslipmodal').modal('show');

};




$scope.Updatebgimgmodal = function(x){

$scope.owner_id_bgimg = x.owner_id;
$('#updatebgimgmodal').modal('show');

};


$(document).ready(function (e) {
    $('#uploadbgImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Brand/Addbgimg',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#uploadbgImg" )[0].reset();
$scope.get();
$('#updatebgimgmodal').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));


});





$scope.Logoonslip = function(x){

$http.post("Brand/logoonslip",{
   logoonslip: x.logoonslip
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();

});

}







$scope.Selectfontc2m = function(x){

$http.post("Brand/fontc2m",{
fontc2m: x.fontname
	}).success(function(data){

location.reload();
});

}






$scope.Selectfontslip = function(x){

$http.post("Brand/fontslip",{
fontslip: x.fontname
	}).success(function(data){

location.reload();
});

}








$scope.Editbrand = function(){
	if($scope.owner_name != '' && $scope.owner_address != '' && $scope.tel != ''){
$http.post("Brand/Edit",{
	owner_id: $scope.owner_id,
	owner_name: $scope.owner_name,
	owner_tax_number: $scope.owner_tax_number,
	owner_address: $scope.owner_address,
	owner_vat: $scope.owner_vat,
	owner_vat_status: $scope.owner_vat_status,
	tel: $scope.tel
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$scope.getbranch();
$('#modalstore').modal('hide');
        });

        }else{
	toastr.warning('<?=$lang_plz?>');
}


};





$scope.Updatefooter_slip = function(x){
$http.post("Brand/Updatefooter_slip",{
	owner_id: x.owner_id,
	footer_slip: x.footer_slip,
	youtube_url_forcus: x.youtube_url_forcus
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });


};







});
	</script>
