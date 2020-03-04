app.factory('mainService', ['$http', function($http, $scope) { 
 	return{
         logInDatilsList: (function(email,password,callback) {
 		    $http.post(
                "dbModels/logInModel.php",
                {'email': email,'password': password}
            ).then(function(data,response){
                callback("success",data);
            });
        }),

        userCreate : (function(firstName,lastName,email,password,callback) {
 		    $http.post(
                "dbModels/createUserModel.php",
                {'firstName': firstName,'lastName': lastName,'email': email,'password': password}
            ).then(function(data){
                debugger;
                if(data.data == "User create success."){
                    callback("success",data);
                }else{
                    callback("error",data);
                }
                
            });
        }),

        uploadUrl: (function(urlList,email,callback) {
 		    $http.post(
                "dbModels/uploadUrlModel.php",
                {'url': urlList,'email':email}
            ).then(function(data){
                callback("success",data);
            });
        }),
        showUrl: (function(callback) {
            $http({
                method: 'GET',
                url: 'dbModels/getUrlModel.php'
            }).then(function (response){
                callback("success",response.data);
            },function (error){
                callback("error", null);
            });
        }),

        updateDeleted:(function(id,callback){
            $http.post(
                "dbModels/isDeletedUpdateModel.php",
                {'id': id}
            ).then(function(data){
                callback("success",data.data);
            });
        }),

        updateisVisited:(function(id,callback){
            $http.post(
                "dbModels/visitedUpdateModel.php",
                {'id': id}
            ).then(function(data){
                callback("success",data);
            });
        })
    };
}]);