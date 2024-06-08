<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-6 col-md-offset-3">

    	<?php if(isset($_GET['regis'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;">สมัครสมาชิกไม่สำเร็จ! มีอีเมล์นี้ในระบบแล้ว</p></div>
    	<?php } ?>


    		<div class="panel panel-default">
			  	<div class="panel-heading"  style="background-color: #fff;">
			    <center>	<h3 class="panel-title">สมัครสมาชิก</h3> </center>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="signup" method="post">
                    <fieldset>
                    <div class="form-group">
			    		    <input class="form-control" minlength="4" placeholder="ชื่อ, ชื่อร้าน, บริษัท, ห้างหุ้นส่วน" name="name" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>


<div class="form-group">
	<textarea name="owner_address" class="form-control" placeholder="ที่อยู่" ng-model="owner_address" style="height: 50px;font-size: 20px;" required>
</textarea> 
</div>

	

<div class="col-md-6">
	<select name="province" id="" class="form-control" ng-model="province" ng-change="Getamphur(province)" style="height: 50px;font-size: 20px;" required>
		<option value="">เลือกจังหวัด</option>
		<option ng-repeat="p in provincelist" value="{{p.province_id}}">{{p.province_name}}</option>
	</select>
</div>	


<div class="col-md-6">
	<select name="amphur" id="" class="form-control" ng-model="amphur" ng-change="Getdistrict(amphur)" style="height: 50px;font-size: 20px;" required>
		<option value="">เลือกอำเภอ</option>
		<option ng-repeat="a in amphurlist" value="{{a.amphur_id}}">{{a.amphur_name}}</option>
	</select>
</div>


 <div class="col-md-12">
<br />
</div>

<div class="col-md-6">
	<select name="district" id="" class="form-control"  ng-model="district" style="height: 50px;font-size: 20px;" required>
		<option value="">เลือกตำบล</option>
		<option ng-repeat="d in districtlist" value="{{d.district_id}}">{{d.district_name}}</option>
	</select>
</div>




 <div class="col-md-6">
			    		    <input class="form-control" length="5" placeholder="รหัสไปรษณีย์" name="postcode" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>

 <div class="col-md-12">
			    		<br />
			    		</div>


 <div class="form-group">
			    		    <input class="form-control" minlength="10" placeholder="เบอร์โทร" name="tel" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>


                    	<div class="form-group">
			    		    <input class="form-control" placeholder="อีเมล์" name="email" type="email" style="height: 50px;font-size: 20px;" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" minlength="6" placeholder="รหัสผ่าน" name="password" style="height: 50px;font-size: 20px;" type="password" value="" required>
			    		</div>
			    		
			    		
			    		
			    		<input id="submit" class="btn btn-lg btn-default btn-block" type="submit" value="สมัครสมาชิก">
			    	</fieldset>
			      	</form>

			      	<br />
			      	
			    </div>
			</div>
		</div>
	</div>
</div>

<center>
			      
			      <?php
if(isset($_SESSION['aff_i'])){

	echo 'aff: '.$_SESSION['aff_i'];

if(isset($_SESSION['aff_tag'])){
    echo '.'.$_SESSION['aff_tag'];
}	

}
			      ?>		

			      	</center>

<script>

function Submit(){
$('#submit').prop('disabled',true);
};


var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {



$http.get('Thailand/province')
       .then(function(response){
          $scope.provincelist = response.data.list; 
                 
        });


$scope.Getamphur = function(province){
$scope.amphur = '';
$scope.district = '';
$scope.districtlist = [];
$http.post("Thailand/amphur",{
	'province_id': province
	}).success(function(data){
$scope.amphurlist = data.list;


        });	
};


$scope.Getdistrict = function(amphur){
$scope.district = '';
$http.post("Thailand/district",{
	'amphur_id': amphur
	}).success(function(data){

$scope.districtlist = data.list;


        });	
};



});

	</script>