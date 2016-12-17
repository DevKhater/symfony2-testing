/*
 * App Module and Conf.
 */

var app = angular.module('mainApp', ['ngRoute', 'ngMaterial', 'ngMessages', 'ngAria', 'ngAnimate']);

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


/* **********************************************************************************************
 * App Controllers.
 */

/*** Index Material Controller ***/
app.controller('AppCtrl', function ($scope, $timeout, $mdSidenav, $log, $mdMedia) {
    $scope.$mdMedia = $mdMedia;
    //$scope.toggleLeft = buildDelayedToggler('left');
    $scope.toggleLeft = function() {
        return debounce(function () {
            // Component lookup should always be available since we are not using `ng-if`
            $mdSidenav('left')
                    .toggle()
                    .then(function () {
                        $log.debug("toggle " + 'left' + " is done");
                    });
        }, 200);
    }
    
    
    
    $scope.toggleRight = buildToggler('right');
    $scope.openLeftMenu = function () {
        $mdSidenav('left').toggle();
    };

    /**
     * Supplies a function that will continue to operate until the
     * time is up.
     */
     var debounce = function(func, wait, context) {
        var timer;

        return function debounced() {
            var context = $scope,
                    args = Array.prototype.slice.call(arguments);
            $timeout.cancel(timer);
            timer = $timeout(function () {
                timer = undefined;
                func.apply(context, args);
            }, wait || 10);
        };
    }

    /**
     * Build handler to open/close a SideNav; when animation finishes
     * report completion in console
     */
    function buildDelayedToggler(navID) {
        return debounce(function () {
            // Component lookup should always be available since we are not using `ng-if`
            $mdSidenav(navID)
                    .toggle()
                    .then(function () {
                        $log.debug("toggle " + navID + " is done");
                    });
        }, 200);
    }

    function buildToggler(navID) {
        return function () {
            // Component lookup should always be available since we are not using `ng-if`
            $mdSidenav(navID)
                    .toggle()
                    .then(function () {
                        $log.debug("toggle " + navID + " is done");
                    });
        }
    }
})
        .controller('LeftCtrl', function ($scope, $timeout, $mdSidenav, $log) {
            $scope.close = function () {
                // Component lookup should always be available since we are not using `ng-if`
                $mdSidenav('left').close()
                        .then(function () {
                            $log.debug("close LEFT is done");
                        });

            };
        });
//        .controller('RightCtrl', function ($scope, $timeout, $mdSidenav, $log) {
//            $scope.close = function () {
//                // Component lookup should always be available since we are not using `ng-if`
//                $mdSidenav('right').close()
//                        .then(function () {
//                            $log.debug("close RIGHT is done");
//                        });
//            };
//        });

/*** Login Controller ***/
app.controller('loginCtrl', function ($scope, $http, $httpParamSerializerJQLike, $rootScope, $location, $mdSidenav) {
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

/*** Home Controller ***/
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

app.factory('getGenres', function($http) {
    var genresUrl = Routing.generate('api_band_genres');
    var getData = function() {
        return $http({method:"GET", url:genresUrl}).then(function(result){
            return result.data;
        });
    };


    return { getData: getData };
});

app.controller('bandsCtrl', function ($scope, getGenres,  $rootScope, $mdBottomSheet, $mdToast, $mdDialog) {
    var myGenrePromise = getGenres.getData();
    myGenrePromise.then(function(result) {  
        $scope.Genres= result;
    });
    $scope.$watch('Genres', function (newValue, oldValue) {
        console.log(newValue);
        $rootScope.getGenres = $scope.Genres;
    });
    console.log($rootScope.getGenres);
    $scope.showGridBottomSheet = function () {
        console.log('Clicked');
        $scope.alert = '';
        $mdBottomSheet.show({
            templateUrl: 'bands-add-form.html',
            controller: 'bandFormCtrl',
            clickOutsideToClose: true
        });
    };
    $scope.showBandForm = function (ev) {
        $mdDialog.show({
            controller: 'bandFormCtrl',
            templateUrl: 'dialog1.tmpl.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            fullscreen: false // Only for -xs, -sm breakpoints.
        })
                .then(function (answer) {
                    $scope.status = 'You said the information was "' + answer + '".';
                }, function () {
                    $scope.status = 'You cancelled the dialog.';
                });
    };


});

app.controller('bandFormCtrl', function ($scope, $rootScope, $mdDialog, $http, $httpParamSerializerJQLike) {
    $scope.band = {
        name: "",
        genre: ""
    };
    $scope.allGenres = $rootScope.getGenres;
    $scope.displayInput = false;
    $scope.$watch('displayInput', function (newValue, oldValue) {
        console.log(newValue, oldValue);
        newValue == true ? $scope.displayInputLabel = "Select From List" : $scope.displayInputLabel = "Add New Genre";
    });
    $scope.saveBand = function () {
    $http.post(Routing.generate('api_band_create'), $httpParamSerializerJQLike({name: $scope.band.name, genre: $scope.band.genre}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            //headers: {'Content-Type': 'application/json'}
        }).then(function successCallback(response) {
            console.log(response);
        }, function errorCallback(response) {
            console.log(response);
            console.log('error');
        });
    };
    $scope.clearForm = function () {
        $scope.band.name = "";
        $scope.band.genre = "";
        $scope.displayInput = false; 
    };
    
    
    
    

    $scope.hide = function () {
        $mdDialog.hide();
    };

    $scope.cancel = function () {
        $mdDialog.cancel();
    };

    $scope.answer = function (answer) {
        $mdDialog.hide(answer);
    };

});

app.controller('rightMenuCtrl', function ($scope) {
    $scope.menu = [
        {
            href: "#!/bands",
            name: "bands",
            display: "Bands",
        },
        {
            href: "#!/concerts",
            name: "concerts",
            display: "Concerts",
        }
    ];
});

app.controller('concertsCtrl', function ($scope) {
    $scope.sortType = 'date'; // set the default sort type
    $scope.sortReverse = true;  // set the default sort order
    $scope.searchBand = '';     // set the default search/filter term
    $scope.concerts = [
        {date: '2016-12-12', band: 'Ddeath', location: 'Somehwerre'},
        {date: '2016-12-10', band: 'where the hell', location: 'Somehwerre'},
        {date: '2015-12-01', band: 'go and die', location: 'Somehwerre'},
        {date: '2015-12-02', band: 'deciple', location: 'Somehwerre'},
        {date: '2014-10-12', band: 'megadeth', location: 'Somehwerre'},
        {date: '2014-11-12', band: 'metallica', location: 'Somehwerre'}
    ];


});