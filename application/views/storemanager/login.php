<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">

    	<?php if(isset($_GET['regis'])){ ?>
    	<div><p class="text-center" style="color: green;border-style: dotted;border-width: 1px;">สมัครสมาชิกสำเร็จ!</p></div>
    	<?php } ?>

    	<?php if(isset($_GET['login'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;"><?=$lang_cannotlogin?></p></div>
    	<?php } ?>

    	<?php if(isset($_GET['email'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;"><?=$lang_loginemailplz?></p></div>
    	<?php } ?>

		
		<center>

			<?php 
foreach ($getlogo as $key => $value) {

$logo = $value['owner_logo'];
$bgimg = $value['owner_bgimg'];

}
 ?>
<img src="<?php echo $base_url;?>/<?php echo $logo;?>" style="max-width: 300px;">

<br />
		<h1 style="background-color: #fff;color: orange;"><?=$lang_managelogin?></h1></center>
		
    		<div class="panel panel-default">
			  	<div class="panel-heading" style="background-color: #fff;">
			    	<center><h1 class="panel-title"><?=$lang_pagelogin?></h1></center>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="utf-8" action="login_submit" method="POST">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="<?=$lang_loginemail?>" name="email" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="<?=$lang_loginpassword?>" name="password" type="password" value="" style="height: 50px;font-size: 20px;" required>
			    		</div>
			    		
			    		<input id="submit"  class="btn btn-lg btn-warning btn-block" type="submit" value="<?=$lang_pagelogin?>" >
			    	</fieldset>
			      	</form>



			    </div>
			</div>
		</div>
	</div>
</div>


<style type="text/css">
	body{
		font-family: Tahoma;
		background-image: url("<?php echo $base_url;?>/<?php echo $bgimg;?>");
		background-color: #f5f5f5;

	}
</style>



<script>

function Submit(){
$('#submit').prop('disabled',true);
}; 

var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.Submit = function(){
$('#submit').prop('disabled',true);
};

});


	</script>