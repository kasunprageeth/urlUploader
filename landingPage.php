<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  
<style>
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
body, html {
    height: 100%;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
.form-rounded {
        border-radius: 1rem;
}
    
html,
body,
header,
.view {
    height: 100%;
  }

  @media (max-width: 740px) {
    html,
    body,
    header,
    .view {
      height: 1000px;
    }
  }
  @media (min-width: 800px) and (max-width: 850px) {
    html,
    body,
    header,
    .view {
      height: 600px;
    }
  }

  .btn .fa {
    margin-left: 3px;
  }

  .top-nav-collapse {
    background-color: #424f95 !important;
  }

  .navbar:not(.top-nav-collapse) {
    background: transparent !important;
  }

  @media (max-width: 768px) {
    .navbar:not(.top-nav-collapse) {
      background: #424f95 !important;
    }
  }
  @media (min-width: 800px) and (max-width: 850px) {
    .navbar:not(.top-nav-collapse) {
      background: #424f95 !important;
    }
  }

  .btn-white {
    color: black !important;
  }

  h6 {
    line-height: 1.7;
  }

  .rgba-gradient {
    background: -moz-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
    background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
    background: -webkit-gradient(linear, 45deg, from(rgba(42, 27, 161, 0.7)), to(rgba(29, 210, 177, 0.7)));
    background: -o-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
    background: linear-gradient(to 45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
  }
  .card {
    background-color: rgba(229, 228, 255, 0.2);
}
</style>
    <link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-dialog/1.4.0/css/ngDialog.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-dialog/1.4.0/css/ngDialog-theme-default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="mdb.min.css"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>-->
    <script src="app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ng-dialog/1.4.0/js/ngDialog.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <!--<script src="mdb.min.js"></script>-->
    <script src="service/mainService.js"></script>
</head>
<body ng-app="myApp" ng-controller="mainCtrl">

<div class="jumbotron backGroundImg row">
  <div class="col-md-4">
  </div>
  
  <div class="col-md-4">
	  <h1 style="font-family: 'Galada', cursive;">My First Bootstrap Page</h1>
	  <p>Resize this responsive page to see the effect!</p>
	  <button type="button" class="btn btn-outline-primary" ng-click="openLoginModel()">Login</button>
	  <button type="button" class="btn btn-outline-success" ng-click="openSingUpModel()">SingUp</button>
      <a href="#!urlUpload">Login</a>
  </div>

  <div class="col-md-4">
  </div>
</div>
<div ng-view></div>
</body>

<script>
    new WOW().init();
</script>

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
    <p class="text-center"><a href="#">Create an Account</a></p>
</div>
</script>

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
</html>
