var app = angular.module('myApp', ['ngRoute', 'ngDialog']);

//all template rowting function
app.config( function($routeProvider) {
    $routeProvider
    .when(
		"/",
		{
			template: '<div class="jumbotron backGroundImg row">'+
                        '<div class="col-md-4">'+
                        '</div>'+
                        
                        '<div class="col-md-4">'+
                            '<h1 class="header_text">Url Uploader</h1>'+
                            '<p>Any url upload your own database!</p>'+
                            '<button type="button" class="btn btn-outline-primary" ng-click="openLoginModel()">Login</button>'+
                            '<button type="button" class="btn btn-outline-success" ng-click="openSingUpModel()">SingUp</button>'+
                        '</div>'+

                        '<div class="col-md-4">'+
                        '</div>'+
                        '</div>',
		    controller: "mainCtrl"
		}
	)
	.when(
		"/urlUpload",
		{
			template:   '<div class="container-fluid cover-img">'+
                        '	<div class="row header_card wow fadeInRight" data-wow-delay="0.3s">'+
						'      <button class="btn btn-outline-primary btn-sm" ng-click="go()" style="height: 38px;margin-top: 10px;">View Url</button>'+
						'      <button class="btn btn-outline-primary btn-sm" ng-click="goDeleteUrl()" style="height: 38px;margin-top: 10px;">Delete Url</button>'+
                        '		<div class="dropdown" style="margin-top: -44px;margin-left: 75%;">'+
                        '			<button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"><span>{{email}}</span>'+
                        '			<span class="caret"></span></button>'+
                        '			<ul class="dropdown-menu">'+
                        '			  <li><button ng-click="logOutBtn()">Log Out</button></li>'+
                        '			</ul>'+
                        '		</div>'+
                        '	</div>'+
                        '	 '+
                        '	<div class="cardWidth">'+
                        '		<div class="row">'+
                        '			<div class="col-md-4">'+
                        '			</div>'+
                        '			<div class="col-md-4 col-xl-5 mt-xl-5 wow fadeInLeft" data-wow-delay="0.3s">'+
                        '				<div class="card wow fadeInRight" data-wow-delay="0.3s">'+
                        '					<div class="card-body">'+
                        '						<div class="md-form form-rounded">'+
                        '							<textarea class="form-control " rows="5" style="border: 3px solid #939aa2;color: #f5e9e9;" ng-model="urlList"></textarea>'+
						'</div>'+
						'<div>'+
					        '<button type="button" class="btn btn-success btn-block uploadBtn" ng-click="getUrlList(urlList)">Upload Url</button>'+
						 '</div>'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="col-md-4">'+
			'</div>'+
		'</div>'+
	'</div> '+
'</div>',
            controller: "urlUploadCtrl"
		}
	)
	.when(
		"/viewUrl",
		{
			template:	'<div class="container" style="margin-top: 80px;" ng-init="showUrl()">'+
			'		<button class="btn btn-outline-primary btn-sm" ng-click="backHome()">Back to Home</button>'+
			'			<div class="row">'+
			'				<div class="col-md-2"></div>'+
			'				<div class="col-md-8">'+
			'					<div class="list-group" ng-repeat="data in dataList" ng-if="data.deleted == 1">'+
			'					  <div class="list-group-item">'+
			'						<div class="row" >'+
			'							<div class="col-md-10">'+
			'								<a ng-href="{{data.url}}" target="_blank"  ng-click="updateisVisited(data.id)" data-toggle="tooltip" data-placement="top" title="{{data.url}}">{{data.id}} {{data.title}} </a>'+
			'								<p><small>Upload on {{data.dataAndTime | date}}</small></p>'+
			'							</div>'+
			'							<div class="col-md-2">'+
			'								<div class="row">'+
			'									<div class="col-sm-6">'+
			'										<span class="badge badge-success" ng-if="data.visit == 0">Visited</span>'+
			'									</div>'+
			'									<div class="col-sm-6">'+
			'										<i class="fas fa-trash-alt" ng-click="updateDeleted(data.id)" style="cursor: pointer;"></i>'+
			'									</div>'+
			'								</div>'+
			'							</div>'+
			'						</div>'+
			'					  </div>'+
			'					</div>'+
			'				</div>'+
			'				<div class="col-md-2"></div>'+
			'			</div>'+
			'	</div>',
			controller: "viewUrlCtrl"
		}
	)
	.when(
		"/deleteUrl",
		{
			template:	'<div class="container" style="margin-top: 80px;" ng-init="showUrl()">'+
			'		<button class="btn btn-outline-primary btn-sm" ng-click="backHome()">Back to Home</button>'+
			'			<div class="row">'+
			'				<div class="col-md-2"></div>'+
			'				<div class="col-md-8">'+
			'					<div class="list-group" ng-repeat="data in dataList" ng-if="data.deleted == 0">'+
			'					  <div class="list-group-item">'+
			'						<div class="row">'+
			'							<div class="col-md-10">'+
			'								<a ng-href="{{data.url}}" target="_blank"  ng-click="updateisVisited(data.id)" data-toggle="tooltip" data-placement="top" title="{{data.url}}">{{data.id}} {{data.title}} </a>'+
			'								<p><small>Upload on {{data.dataAndTime | date}}</small></p>'+
			'								<p ng-if="data.deleted == 0"><small><span class="badge badge-danger">This is deleted url</span></small></p>'+
			'							</div>'+
			'							<div class="col-md-2">'+
			 
			'							</div>'+
			'						</div>'+
			'					  </div>'+
			'					</div>'+
			'				</div>'+
			'				<div class="col-md-2"></div>'+
			'			</div>'+
			'	</div>',
			controller: "viewUrlCtrl"
		}
	)
	.otherwise(
		{
			redirectTo: "/"
		}
	);
});
//This is main controller.
app.controller('mainCtrl', ['$scope','$rootScope','ngDialog','mainService','$location','$http', function($scope,$rootScope,ngDialog,mainService,$location,$http){
    //Open login model function.
	$scope.openLoginModel = function(){
		var Dialog = ngDialog.open({ template: 'logIn.html',
			className: 'ngdialog-theme-default',
			controller: ['$scope', function($scope) {
            //Get login deatils in input feeld.
            $scope.loginDetails = function(email,password){
                mainService.logInDatilsList(email,password, function(status,data) {
                    if(data.data.status =='logedIn'){
						localStorage.setItem("email", data.data.email);
				        $location.path('/urlUpload');
                        Dialog.close();
                    }else{
                        alert("Email or password is incorrect!");
                    }
	  	        });
            };
        }],
        showClose: true
     });
	}

	//get localStorage value
	$scope.email = localStorage.getItem("email");

//Open singUp model function
	$scope.openSingUpModel = function(){
		ngDialog.open({ 
            template: 'singUp.html',
            controller: ['$scope', function($scope) {

                //Get deatils in sing up feeld
                $scope.createUserDetails = function(firstName,lastName,email,password){
                    mainService.userCreate(firstName,lastName,email,password, function(status,data) {
						debugger;
                        if (status == "success") {
                            alert("User created success please logIn.!");
                            location.reload();
                        }else{
							alert("Email already exit,Pleace Enter a New email!");
						}
	  	            });
                };

            }]
        });
        
	}
}])

//Url upload Conntroller
.controller('urlUploadCtrl', ['$scope','mainService','$location', function($scope, mainService,$location){
	//header viewUrl button path
	$scope.go = function () {
  		$location.path('/viewUrl');
	};
	//header delete url button path
	$scope.goDeleteUrl = function () {
  		$location.path('/deleteUrl');
	};
	//header logOut button path
	$scope.logOutBtn = function(){
		localStorage.removeItem("email");
		$location.path('/');
	}
	//get url for text earea
	$scope.getUrlList = function(urlList){
		var urlName = urlList;
	    //Add date and time for object array; 
	    var date = new Date();
		var now_utc =  Date.UTC(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(),
 		date.getUTCHours(), date.getUTCMinutes(), date.getUTCSeconds());

		//Cut url name in url list
	    var urlList = urlName.match(/(http)(s)*(:\/\/)[\w\d\/.:?=+&-]+/g);
	    //Cut url title in url list
	    var titleList = urlName.match(/(\| )+[^\n]+/g);
		var email = localStorage.getItem("email");
	    const urlObjList = [];

	    for(var x = 0; x < urlList.length; x++){
	    	dataObj = {
	    		url:urlList[x],
	    		title:titleList[x],
	    		isVisited:true,
	    		isDelited:true,
				createdDate:now_utc
	    	};
	    	urlObjList.push(dataObj);
	    }
		mainService.uploadUrl(urlObjList,email, function(status,data) {
			  if (status == status) {
			 	alert("Url upload success.!");
				location.reload();
			  }
	  	});
	};
}])

//thi is show url controller
.controller('viewUrlCtrl', ['$scope','mainService','$location', function($scope, mainService,$location){
	$scope.showUrl = function(){
		mainService.showUrl(function(status,data) {
			$scope.dataList = data;
	  	});
	};
	//url deleted update function
	$scope.updateDeleted = function(urlId){
		var a = parseInt(urlId);
		mainService.updateDeleted(a,function(status,data) {
			if (status == "success") {
				alert("Your record is deleted successfully!");
				location.reload();
			}else{
				alert("Sorry ! Your record is not deleted!");
			}
	  	});
	};
	//url visited update function
	$scope.updateisVisited = function(urlId){
		var a = parseInt(urlId);
		mainService.updateisVisited(a,function(status,data) {
			if(status == "success"){
				$scope.showUrl();
			}
	  	});
	};
	//back to home button path
	$scope.backHome = function () {
  		$location.path('/urlUpload');
	};
}]);


run.$inject = ['$rootScope', '$location', '$cookies', '$http'];
    function run($rootScope, $location, $cookies, $http) {
        // keep user logged in after page refresh
        $rootScope.globals = $cookies.getObject('globals') || {};
        if ($rootScope.globals.currentUser) {
            $http.defaults.headers.common['Authorization'] = 'Basic ' + $rootScope.globals.currentUser.authdata;
        }
 
        $rootScope.$on('$locationChangeStart', function (event, next, current) {
            // redirect to login page if not logged in and trying to access a restricted page
            var restrictedPage = $.inArray($location.path(), ['/login', '/singUp']) === -1;
            var loggedIn = $rootScope.globals.currentUser;
            if (restrictedPage && !loggedIn) {
                $location.path('/login');
            }
        });
   }