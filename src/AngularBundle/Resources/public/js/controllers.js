/*****************************************************************************************/
/**********                 FACTORIES                                           **********/
/*****************************************************************************************/
app.factory('getGenres', function ($http) {
    var genresUrl = Routing.generate('api_band_genres');
    var getData = function () {
        return $http({method: "GET", url: genresUrl}).then(function (result) {
            return result.data;
        });
    };
    return {getData: getData};
});

app.factory('getBands', function ($http) {
    var bandsUrl = Routing.generate('api_bands_list');
    var getData = function (page) {
        if (page == 0 || page == null) {
            page = 1
        }
        return $http({method: "GET", url: bandsUrl,
            headers: {'Accept': 'application/json'},
            params: {offset: page}
        })
                .then(function (result) {
                    return result.data;
                });
    };
    return {getData: getData};
});

app.factory('getConcerts', function ($http) {
    var bandsUrl = Routing.generate('api_concerts_list');
    var getData = function (page) {
        if (page == 0 || page == null) {
            page = 1
        }
        return $http({method: "GET", url: bandsUrl,
            headers: {'Accept': 'application/json'},
            params: {offset: page}
        })
                .then(function (result) {
                    return result.data;
                });
    };
    return {getData: getData};
});



/*****************************************************************************************/
/**********                 CONTROLLERS                                         **********/
/*****************************************************************************************/

/*** Index Material Controller ***/
app.controller('AppCtrl', function ($scope, $timeout, $mdSidenav, $log, $mdMedia) {
    $scope.$mdMedia = $mdMedia;
    //$scope.toggleLeft = buildDelayedToggler('left');
    $scope.toggleLeft = function () {
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
    var debounce = function (func, wait, context) {
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

/*** Band Controller ***/
app.controller('bandsCtrl', function ($scope, getGenres, getBands, $rootScope, $http, $mdBottomSheet, $mdToast, $mdDialog) {
    $scope.page, $scope.limit, $scope.total;
    $rootScope.updateBandsGenreList = function () {
        var myGenrePromise = getGenres.getData();
        myGenrePromise.then(function (result) {
            $scope.Genres = result;
        });
    };
    $rootScope.updateBandsList = function (page) {
        var myBandsPromise = getBands.getData(page);
        myBandsPromise.then(function (result) {
            $scope.Bands = result._embedded.bands;
            //$scope._links = result._links;
            $scope.limit = result.limit;
            $scope.total = result.total;
            $scope.page = result.page;
            $scope.pages = result.pages;
            console.log(result);
        });
    };
    $rootScope.updateBandsGenreList();
    $scope.$watch('Genres', function (newValue, oldValue) {
        $rootScope.getGenres = $scope.Genres;
    });
    $rootScope.updateBandsList();
    $scope.deleteBand = function (slug) {
        $http.delete(Routing.generate('api_band_delete', {id: slug}))
                .then(function successCallback(response) {
                    $rootScope.updateBandsList($scope.page);
                    $rootScope.showSuccess('Band Deleted');
                }, function errorCallback(response) {
                    console.log(response);
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
    $scope.editForm = function (band, ev) {
        $mdDialog.show({
            controller: 'bandEditCtrl',
            templateUrl: 'dialog2.tmpl.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            locals : {
                    band : band
                },
            clickOutsideToClose: true,
            fullscreen: false // Only for -xs, -sm breakpoints.
        })
                .then(function (answer) {}, function () {});
    };


});

app.controller('bandEditCtrl', function ($scope, $rootScope, $mdDialog, $http, $httpParamSerializerJQLike, band) {
    $scope.band = band;
    $rootScope.updateBandsGenreList();
    $scope.allGenres = $rootScope.getGenres;
    $scope.displayInput = false;
    $scope.$watch('displayInput', function (newValue, oldValue) {
        newValue == true ? $scope.displayInputLabel = "Select From List" : $scope.displayInputLabel = "Add New Genre";
    });
    $scope.saveBand = function () {
        $http.put(Routing.generate('api_band_update'), $httpParamSerializerJQLike({name: $scope.band.name, genre: $scope.band.genre}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            params: {slug: $scope.band.slug}
        }).then(function successCallback(response) {
            $scope.hide();
            $rootScope.updateBandsList();
            $rootScope.showSuccess('Band Saved');
        }, function errorCallback(response) {
            console.log(response);
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

app.controller('bandFormCtrl', function ($scope, $rootScope, $mdDialog, $http, $httpParamSerializerJQLike) {
    $scope.band = {
        name: "",
        genre: ""
    };
    $rootScope.updateBandsGenreList();
    $scope.allGenres = $rootScope.getGenres;
    $scope.displayInput = false;
    $scope.$watch('displayInput', function (newValue, oldValue) {
        newValue == true ? $scope.displayInputLabel = "Select From List" : $scope.displayInputLabel = "Add New Genre";
    });
    $scope.saveBand = function () {
        $http.post(Routing.generate('api_band_create'), $httpParamSerializerJQLike({name: $scope.band.name, genre: $scope.band.genre}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $scope.hide();
            $rootScope.updateBandsList();
            $rootScope.showSuccess('Band Created');
        }, function errorCallback(response) {
            console.log(response);
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
app.controller('bandFormCtrl', function ($scope, $rootScope, $mdDialog, $http, $httpParamSerializerJQLike) {
    $scope.band = {
        name: "",
        genre: ""
    };
    $rootScope.updateBandsGenreList();
    $scope.allGenres = $rootScope.getGenres;
    $scope.displayInput = false;
    $scope.$watch('displayInput', function (newValue, oldValue) {
        newValue == true ? $scope.displayInputLabel = "Select From List" : $scope.displayInputLabel = "Add New Genre";
    });
    $scope.saveBand = function () {
        $http.post(Routing.generate('api_band_create'), $httpParamSerializerJQLike({name: $scope.band.name, genre: $scope.band.genre}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $scope.hide();
            $rootScope.updateBandsList();
            $rootScope.showSuccess('Band Created');
        }, function errorCallback(response) {
            console.log(response);
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

app.controller('concertsCtrl', function ($scope, getConcerts) {
    $scope.concerts;
    $scope.getConcertsList = function (page) {
        var myConPromise = getConcerts.getData(page);
        myConPromise.then(function (result) {
            console.log(result);
            $scope.concerts = result;
        });
    };
    $scope.newCon = {
        date : new Date(),
        band : {
            name: ""
        },
        location: {
            name: "",
            address: ""
        }
    }
    $scope.getConcertsList();
    $scope.sortType = 'date'; // set the default sort type
    $scope.sortReverse = true;  // set the default sort order
    $scope.searchBand = '';     // set the default search/filter term
    
});