

<div class="col-md-10 col-sm-9 " ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">
		


<input type="text" ng-model="subject" placeholder="<?=$lang_subject?>" class="form-control">
<br/>
	<textarea class="form-control" ng-model="text" style="height: 200px;" placeholder="<?=$lang_message?>"></textarea>
	<br />
<input type="radio" name="sendall" checked>  <?=$lang_messagetoallemail?>
	<br /><br />
	<button ng-click="Sendemailok()"  ng-disabled="clickedsend" class="btn btn-success"> <?=$lang_sendemail?></button>





	</div>
</div>









</div>



<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.clickedsend = false;
$scope.subject = '';
$scope.text = '';

$scope.Sendemailok = function(){


if($scope.subject != '' && $scope.text != ''){	
	toastr.warning(' <?=$lang_waitsendemail?>');
$scope.clickedsend = true;
$('sending1').modal('show');

$http.post("Email/send",{
	'subject': $scope.subject,
	'text': $scope.text
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.subject = '';
$scope.text = '';
$scope.clickedsend = false;

        });	
}else{
	toastr.warning('<?=$lang_plz?>');
}

};

<?php if(isset($_GET['s'])){ ?>
$('sended2').modal('show');
<?php } ?>


});
	</script>