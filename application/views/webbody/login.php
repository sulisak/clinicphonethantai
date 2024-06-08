<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">


    	<?php if(isset($_GET['regis'])){ ?>
    	<div><p class="text-center" style="color: green;border-style: dotted;border-width: 1px;">สมัครสมาชิกสำเร็จ!</p></div>
    	<?php } ?>

    	<?php if(isset($_GET['login'])){ ?>
    	<div><p class="text-center" style="background-color: #fff;color: red;border-style: dotted;border-width: 1px;"><?=$lang_cannotlogin?></p></div>
    	<?php } ?>

    	<?php if(isset($_GET['email'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;"><?=$lang_loginemailplz?></p></div>
    	<?php } ?>


<center>
<br /><br /><br />
	<?php
foreach ($getlogo as $key => $value) {

$logo = $value['owner_logo'];
$bgimg = $value['owner_bgimg'];
$color_theme = $value['color_theme'];
$storename = $value['owner_name'];
$fontc2m = $value['fontc2m'];
}
?>
 
 
 <?php if($base_url !=''){?>
<img src="<?php echo $base_url;?>/<?php echo $logo;?>" style="max-width: 300px;box-shadow: 5px 5px rgba(0,0,0,.3);">

 <?php } ?>
 <?php  
  if($base_url ==''){
 echo '<h1><b>'.$storename.'</b></h1>';
  }
  ?>
 <br /> <br />
</center>


    		<div class="panel panel-default" style="border-radius: 20px;box-shadow: 5px 5px rgba(0,0,0,.3);background-color:#fcf8e3;">
			  	<div class="panel-heading" style="background-color: #fff;border-radius: 20px;box-shadow: 5px 5px rgba(0,0,0,.3);">
			    	<center><h1 class="panel-title" style="font-size: 35px;font-weigth:bold;text-shadow: 2px 2px 4px #000000;">
					<?php echo $lang_omgname;?></h1></center>
			 	</div>
			  	<div class="panel-body">
			    	<form action="login_submit" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input autocomplete="off" class="form-control" placeholder="<?=$lang_loginemail?>" name="email" type="text" style="height: 50px;font-size: 20px;border-radius: 20px;">
			    		</div>
			    		<div class="form-group">
			    			<input autocomplete="off" class="form-control" placeholder="<?=$lang_loginpassword?>" name="password" type="password" value="" style="height: 50px;font-size: 20px;border-radius: 20px;">
			    		</div>

			    		<input id="submit"  class="btn btn-lg btn-success btn-block" type="submit" value="<?=$lang_pagelogin?>" style="border-radius: 20px;font-size:30px;font-weigth:bold;">
			    	</fieldset>
			      	</form>



			    </div>
			</div>
		</div>
	</div>
</div>


<center>   
	

	</center>

<style type="text/css">
	body{
		font-family: Tahoma;
		background-image: url("<?php echo $bgimg;?>");
		background-color: <?php echo $color_theme;?>;
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
	
	
	
	

<?php echo $fontfamily; ?>
<?php $fontfamily_ui = 'font-family: "'.$fontc2m.'", sans-serif;';?>





	
		<style>
	body{
	<?php echo $fontfamily_ui;?>
	}
	
</style>
