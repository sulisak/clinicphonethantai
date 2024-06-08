
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">



<?=$lang_link?>
<input type="text" name="" class="form-control" style="font-size: 18px;font-weight: bold;" value="<?php echo $base_url;?>/brand?id=<?php echo $_SESSION['owner_id'];?>">

<hr />
<?=$lang_code?>

<textarea class="form-control" style="font-size: 18px;font-weight: bold;">
<iframe frameborder="0" style="width: 100%;height: 1200px;" src="<?php echo $base_url;?>/brand?id=<?php echo $_SESSION['owner_id'];?>"></iframe>
</textarea>

<br />
<?=$lang_exsample?>
<br />
<iframe frameborder="0" style="width: 100%;height: 1200px;" src="<?php echo $base_url;?>/brand?id=<?php echo $_SESSION['owner_id'];?>"></iframe>

</div>
</div>
</div>


	
