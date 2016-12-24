/*
 * App Module and Conf.
 */

var app = angular.module('mainApp', ['ngRoute', 'ngMaterial', 'ngMessages', 'ngAria', 'ngAnimate', 'angular-growl', 'bw.paging', 'ngFileUpload']);

app.config([
    '$routeProvider',
    function ($routeProvider) {
        $routeProvider
                .when('/', {
                    templateUrl: "/bundles/angular/ng/login.html",
                    controller: 'loginCtrl',
                }).when('/home', {
                    templateUrl: "/bundles/angular/ng/welcome.html",
                    controller: 'welcomeCtrl',
                }).when('/bands', {
                    templateUrl: "/bundles/angular/ng/bands.html",
                    controller: 'bandsCtrl',
                }).when('/concerts', {
                    templateUrl: "/bundles/angular/ng/concerts.html",
                }).when('/venues', {
                    templateUrl: "/bundles/angular/ng/locations.html",
                }).when('/media', {
                    templateUrl: "/bundles/angular/ng/media.html",
                    controller: 'mediaCtrl'
                })
            }
        ]);

app.config(['$mdThemingProvider', function ($mdThemingProvider) {
        $mdThemingProvider.theme('default')
                .primaryPalette('red')
                .accentPalette('deep-purple')
                .warnPalette('grey')
                .backgroundPalette('blue-grey')
                .dark();
    }
]);

app.run(function ($rootScope, $location, $window, growl) {
    $rootScope.logedIn;
    $rootScope.user;
    $rootScope.logOut = function () {
        $window.location.href = Routing.generate('logout');
    };
    $rootScope.showSuccess = function (message) {
        growl.success(message, {title: 'Success!'});
    };
    $rootScope.showError = function (message) {
        growl.error(message, {title: 'Something Went Wrong!'});
    };
    $rootScope.go = function (path) {
        $location.path(path);
    };
    $rootScope.$on("$routeChangeStart", function (event, next, current) {
        if (!$rootScope.logedIn) {
            if (next.templateUrl == "/bundles/angular/ng/login.html") {
            } else {
                $rootScope.go('/');
            }
        }
    });
});
