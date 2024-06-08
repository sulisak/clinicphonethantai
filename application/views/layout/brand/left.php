
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-12 col-sm-12">
	

	

<center>
	
<h2><?php echo $brand_name; ?></h2>
<h4><?=$lang_address?>: <?php echo $address; ?> <?=$lang_tel?>: <?php echo $tel; ?></h4>
<hr />
<span <?php if(!isset($_GET['catid'])){ echo 'style="color:#fff;background-color:orange;margin-right: 5px;padding-left: 5px;padding-right: 5px;"';} ?> ><a href="<?php echo $base_url; ?>/brand?id=<?php echo $_GET['id'];?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <?=$lang_allall?> </a></span> 



<?php 

foreach ($getcat as $row) {

echo '

<span ';

if(isset($_GET['catid']) && $row['product_category_id'] === $_GET['catid']){ echo 'style="color:#fff;background-color:orange;margin-right: 5px;padding-left: 5px;padding-right: 5px;"';}

echo '>
<a href="'.$base_url.'/brand?id='.$_GET['id'].'&catid='.$row['product_category_id'].'" ><span class="glyphicon glyphicon-tag" aria-hidden="true"></span>	'.$row['product_category_name'].' </a>
	</span> 
	
';
}

?>
	

</center>


<p></p>
	</div>



