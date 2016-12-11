var app = angular.module('mainApp', ['ngRoute']);
app.config([
    '$routeProvider',
    function ($routeProvider) {
        $routeProvider
                .when('/ng-home', {
                    templateUrl: "/bundles/angular/ng/home/welcome.html"
                })
    }]);



app.controller('loginCtrl', function ($scope, $http, $httpParamSerializerJQLike, $rootScope, $location) {
    console.log($scope.username);
    $rootScope.user = $scope.username;
    console.log($rootScope.user);
    $scope.submit = function () {
        $http.post(Routing.generate('login_check'), $httpParamSerializerJQLike({_username: $scope.username, _password: $scope.password}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $rootScope.user = $scope.username;
            $rootScope.loggedIn = true;
            
    console.log($rootScope.user);
            $location.path('/ng-home');
        }, function errorCallback(response) {
        console.log(response);    
        console.log('error');
            $rootScope.User = '';
        });

//$rootScope.loggedIn = true;
//$location.path('/dashboard');
    };
});
app.controller('welcomeCtrl', function ($scope, $rootScope, $http) {
    var userUrl = Routing.generate('ng_get_user');
    $http.get(userUrl).then(
            function successCallback(response){
                console.log(response.data);
                $rootScope.user = response.data;
                $scope.welcomeMessage = "Welcome Mr. " + $rootScope.user;
            },function errorCallback(response) {
                console.log(response);
        });
        
    
});