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
    var url = Routing.generate('api_bands_list');
    var getData = function (page, all) {
        if (page == 0 || page == null) {
            page = 1
        }
        return $http({method: "GET", url: url,
            headers: {'Accept': 'application/json'},
            params: {offset: page, all: all}
        })
                .then(function (result) {
                    return result.data;
                });
    };
    return {getData: getData};
});

app.factory('getConcerts', function ($http) {
    var url = Routing.generate('api_concerts_list');
    var getData = function (page) {
        if (page == 0 || page == null) {
            page = 1
        }
        return $http({method: "GET", url: url,
            headers: {'Accept': 'application/json'}
        })
                .then(function (result) {
                    return result.data;
                });
    };
    return {getData: getData};
});

app.factory('getLocations', function ($http) {
    var url = Routing.generate('api_locations_list');
    var getData = function (page) {
        if (page == 0 || page == null) {
            page = 1
        }
        return $http({method: "GET", url: url,
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

app.controller('navigationCtrl', function ($mdDialog, $scope) {
    var originatorEv;
    this.openMenu = function ($mdOpenMenu, ev) {
        originatorEv = ev;
        $mdOpenMenu(ev);
    };
    $scope.showBandForm = function (ev) {
        $mdDialog.show({
            controller: 'bandFormCtrl',
            templateUrl: 'newBandForm.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: false,
            fullscreen: false // Only for -xs, -sm breakpoints.
        });
    };
    $scope.showLocationForm = function (ev) {
        $mdDialog.show({
            controller: 'locationFormCtrl',
            templateUrl: 'newLocationForm.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: false,
            fullscreen: false // Only for -xs, -sm breakpoints.
        });
    };
    $scope.showConcertForm = function (ev) {
        $mdDialog.show({
            controller: 'concertFormCtrl',
            templateUrl: 'newConcertForm.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: false,
            fullscreen: false // Only for -xs, -sm breakpoints.
        });
    };
});

app.controller('bandFormCtrl', function ($scope, $rootScope, $mdDialog, $http, $httpParamSerializerJQLike, getGenres) {
    $scope.genres;
    $scope.band = {
        name: "",
        genre: ""
    };
    getBandsGenreList = function () {
        var myGenrePromise = getGenres.getData();
        myGenrePromise.then(function (result) {
            $scope.genres = result;
        });
    };
    getBandsGenreList();
    $scope.displayInput = false;
    $scope.$watch('displayInput', function (newValue, oldValue) {
        newValue == true ? $scope.displayInputLabel = "Select From List" : $scope.displayInputLabel = "Add New Genre";
    });
    $scope.saveBand = function () {
        $http.post(Routing.generate('api_band_create'), $httpParamSerializerJQLike({name: $scope.band.name, genre: $scope.band.genre}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $scope.hide();
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
});
app.controller('locationFormCtrl', function ($scope, $rootScope, $mdDialog, $http, $httpParamSerializerJQLike) {
    $scope.location = {
        name: "",
        address: ""
    };
    $scope.saveLocation = function () {
        $http.post(Routing.generate('api_location_create'), $httpParamSerializerJQLike({name: $scope.location.name, address: $scope.location.address}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $scope.hide();
            $rootScope.showSuccess('Venue Created');
        }, function errorCallback(response) {
            console.log(response);
        });
    };
    $scope.clearForm = function () {
        $scope.location.name = "";
        $scope.location.address = "";
    };
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
});
app.controller('concertFormCtrl', function ($scope, $rootScope, $http, $mdDialog, $http, $httpParamSerializerJQLike, getBands, getLocations) {
    $scope.ncband, $scope.nclocation;
    
    $scope.bands;
    var myBandsPromise = getBands.getData(1, 1);
    myBandsPromise.then(function (result) {
        console.log('bands');
        console.log(result);
        $scope.bands = result._embedded.bands;
    });
    $scope.locations;
    var myLocPromise = getLocations.getData();
    myLocPromise.then(function (result) {
        $scope.locations = result;
        console.log('locations');
        console.log(result);
    });
    $scope.date = new Date();
    $scope.saveConcert = function () {
        var date = {year: $scope.date.getFullYear(),
            month: $scope.date.getMonth(),
            day: $scope.date.getDay()
        };
        var databundle_concert = {
            date: date,
            band: $scope.bands[$scope.ncband].id,
            location: $scope.locations[$scope.nclocation].id
        };
        $http.post(Routing.generate('api_concert_create'), $httpParamSerializerJQLike({databundle_concert: databundle_concert}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $scope.hide();
            $rootScope.showSuccess('Concert Created');
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
});

/*** Login Controller ***/
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
            locals: {
                band: band
            },
            clickOutsideToClose: true,
            fullscreen: false // Only for -xs, -sm breakpoints.
        })
                .then(function (answer) {
                }, function () {
                });
    };


});
