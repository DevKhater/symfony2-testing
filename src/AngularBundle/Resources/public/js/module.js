/*
 * App Module and Conf.
 */

var app = angular.module('mainApp', ['ngRoute', 'ngMaterial', 'ngMessages', 'ngAria', 'ngAnimate', 'angular-growl']);

app.config([
    '$routeProvider',
    function ($routeProvider) {
        $routeProvider
                .when('/', {
                    templateUrl: "/bundles/angular/ng/login.html"
                })
        $routeProvider
                //must check if ligged in
                .when('/ng-home', {
                    templateUrl: "/bundles/angular/ng/welcome.html"
                })
        $routeProvider
                .when('/bands', {
                    templateUrl: "/bundles/angular/ng/bands.html"
                })
        $routeProvider
                .when('/concerts', {
                    templateUrl: "/bundles/angular/ng/concerts.html"
                })
    }]);

app.config(['$mdThemingProvider', function ($mdThemingProvider) {
        $mdThemingProvider.theme('form')
                .primaryPalette('deep-purple')
                .accentPalette('red')
                .dark();
    }]);


app.run(function ($rootScope, $window) {
    $rootScope.logOut = function () {
        $window.location.href = Routing.generate('logout');
    }
});

/* **********************************************************************************************
 * App Directives
 */

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

