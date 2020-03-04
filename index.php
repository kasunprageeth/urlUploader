<?php 
  session_start(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<style type="text/css">
div.jumbotron.backGroundImg{
    color:#fff;
    text-align:center;
    background:url('Kreaset-agencia-digital-barcelona-sant-cugat.jpg');
    background-size:cover;
    background-position:center;
    <!--padding-top:300px;
    padding-bottom:500px;-->
	height: 100%;
	background-repeat: no-repeat;
	opacity:0.8;
}
.header_text{
    font-family: 'Galada', cursive;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
    min-height: 38px;
    border-radius: 6px;
    margin-left: 10px;
}
.header_card{
    background-color: rgba(229, 228, 255, 0.53);
    height: 63px;
}
.cover-img{
		background-color: gray;
		/* padding: 0px; */
		overflow: hidden;
		bottom: 0px;
		width: 100%;
		height: 100%;
		position: absolute;
		background-image: url(sri-lanka-travel.jpg);
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
	}
	.card {
		background-color: rgba(229, 228, 255, 0.2);
	}
	.uploadBtn {        
		margin-top: 10px;
	}
	.cardWidth{
		padding-top: 100px;
	}
	.md-form .form-control{
		background-color: transparent;
	}
    .text-ellipsis
    {
        overflow: hidden;
        
         
        white-space: nowrap;
    }
</style>
    <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-dialog/1.4.0/css/ngDialog.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-dialog/1.4.0/css/ngDialog-theme-default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>-->
    <script src="app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ng-dialog/1.4.0/js/ngDialog.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
     
    <script src="service/mainService.js"></script>
     
</head>
<body ng-app="myApp" ng-controller="mainCtrl">
<!-- load all rowting page-->
<div ng-view></div>

<script>
    new WOW().init();
    // var myvar='<?php echo $_SESSION['email']; ?>';
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
     
</script>
<!-- login model-->
<script type="text/ng-template" id="logIn.html">
    <div class="login-form">
    <form>
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Email" required="required" ng-model="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="Password" required="required" ng-model="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" ng-click="loginDetails(email,password)">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <!--<a href="#" class="pull-right">Forgot Password?</a>-->
        </div>        
    </form>
</div>
</script>
<!-- singUp model-->
<script type="text/ng-template" id="singUp.html">
    <div>
      <form>
        <h2 class="text-center">Sing Up</h2>       
        <div class="form-group">
            <input type="text" class="form-control" id="firstName" placeholder="First Name" required="required" ng-model="firstName">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="lastName" placeholder="Last Name" required="required" ng-model="lastName">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Email" required="required" ng-model="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="Password" required="required" ng-model="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" ng-click="createUserDetails(firstName,lastName,email,password)">Sing Up</button>
        </div>       
      </form>
    </div>
</script>

</body>
</html>
