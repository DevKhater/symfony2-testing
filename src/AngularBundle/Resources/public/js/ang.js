var app = angular.module('mainApp', ['ngRoute','ngMaterial', 'ngMessages', 'ngAria', 'ngAnimate']);

app.config([
    '$routeProvider',
    function ($routeProvider) {
        $routeProvider
                .when('/', {
                    templateUrl: "/bundles/angular/ng/security/login.html"
                })
        $routeProvider
        //must check if ligged in
                .when('/ng-home', {
                    templateUrl: "/bundles/angular/ng/home/welcome.html"
                })
    }]);


app.config(['$mdThemingProvider', function($mdThemingProvider) {
    $mdThemingProvider.theme('docs-dark', 'default')
      .primaryPalette('red')
      .dark();
  }]);
  
  
app.run(function ($rootScope, $window) {
    $rootScope.logOut = function () {
        $window.location.href = Routing.generate('logout');
    }
});

app.directive('loginLogout', function ($rootScope) {
    return {
        restrict: 'EA',
        template: '<div><p ng-if="status">You are Logged In!  || <span ng-click="logOut()">LogOut</span></p><p ng-if="!status">You are NOT Logged In!</p></div>',
        scope: {
            status: '='
        },
        link: function (scope, element, attrs) {
            scope.logOut = function () {
                $rootScope.logOut();
            }
        }
    }
});


app.controller('loginCtrl', function ($scope, $http, $httpParamSerializerJQLike, $rootScope, $location) {
    if ($scope.logedIn == 1) {
        $rootScope.logedIn = true;
        $location.path('/ng-home');
    }
    $scope.submit = function () {
        $http.post(Routing.generate('login_check'), $httpParamSerializerJQLike({_username: $scope.username, _password: $scope.password}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $rootScope.user = $scope.username;
            $rootScope.logedIn = true;
            $scope.logedIn = true;
            $location.path('/ng-home');
        }, function errorCallback(response) {
            console.log(response);
            console.log('error');
            $rootScope.User = '';
        });
    };
});

app.controller('welcomeCtrl', function ($scope, $rootScope, $http) {
    var userUrl = Routing.generate('ng_get_user');
    $http.get(userUrl).then(
            function successCallback(response) {
                $rootScope.user = response.data;
                $scope.welcomeMessage = "Welcome Mr. " + $rootScope.user;
            }, function errorCallback(response) {
                console.log(response);
    });
});


