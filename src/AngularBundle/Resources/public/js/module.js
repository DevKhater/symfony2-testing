/*
 * App Module and Conf.
 */

var app = angular.module('mainApp', ['ngRoute', 'ngMaterial', 'ngMessages', 'ngAria', 'ngAnimate', 'angular-growl', 'bw.paging', 'ngFileUpload']);

app.config([
    '$routeProvider',
    function ($routeProvider, $rootScope) {
        $routeProvider
                .when('/', {
                    templateUrl: "/bundles/angular/ng/login.html",
                    controller:'loginCtrl',
                    resolve: {
                        "check": function ($location, $rootScope) {
                            if ($rootScope.logedIn) {
                                $location.path('/ng-home');

                            }
                        }
                    }
                }),
        $routeProvider
                .when('/home', {
                    templateUrl: "/bundles/angular/ng/welcome.html",
                    controller:'welcomeCtrl',
                    resolve: {
                        "check": function ($location, $rootScope) {
                            if (!$rootScope.logedIn) {
                                $location.path('/');

                            }
                        }
                    }
                }),
        $routeProvider
                .when('/bands', {
                    templateUrl: "/bundles/angular/ng/bands.html",
                    controller: 'bandsCtrl',
                    resolve: {
                        "check": function ($location, $rootScope) {
                            if (!$rootScope.logedIn) {
                                $location.path('/');

                            }
                        }
                    }
                }),
        $routeProvider
                .when('/concerts', {
                    templateUrl: "/bundles/angular/ng/concerts.html",
                    resolve: {
                        "check": function ($location, $rootScope) {
                            if (!$rootScope.logedIn) {
                                $location.path('/');

                            }
                        }
                    }
                })
        $routeProvider
                .when('/media', {
                    templateUrl: "/bundles/angular/ng/media.html",
                    controller: 'mediaCtrl',
                    resolve: {
                        "check": function ($location, $rootScope) {
                            if (!$rootScope.logedIn) {
                                $location.path('/');

                            }
                        }
                    }
                })
    }]);

app.config(['$mdThemingProvider', function ($mdThemingProvider) {
        $mdThemingProvider.theme('form')
                .primaryPalette('deep-purple')
                .accentPalette('red')
                .dark();
    }]);


app.run(function ($rootScope, $location, $window, growl) {
    $rootScope.logedIn;$rootScope.user;
    $rootScope.logOut = function () {
        $window.location.href = Routing.generate('logout');
    };
    $rootScope.showSuccess = function (message) {
        growl.success(message, {title: 'Success!'});
    };
    $rootScope.showError = function (message) {
        growl.error(message, {title: 'Something Went Wrong!'});
    };
    $rootScope.go = function ( path ) {
        $location.path( path );
    };
});
