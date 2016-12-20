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

app.factory('getImages', function ($http) {
    var url = Routing.generate('api_media_list');
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
        if (page === 0 || page === null) {
            page = 1;
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


/* Navigation Controller ***/
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
/*** Forms in Navigation Controllers ***/
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
        var databundle_band = {
            name: $scope.band.name,
            genre: $scope.band.genre
        };
        $http.post(Routing.generate('api_band_create'), $httpParamSerializerJQLike({databundle_band: databundle_band}), {
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
        var databundle_location = {
            name: $scope.location.name, 
            address: $scope.location.address
        };
        $http.post(Routing.generate('api_location_create'), $httpParamSerializerJQLike({databundle_location: databundle_location}), {
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
        $scope.bands = result._embedded.bands;
    });
    $scope.locations;
    var myLocPromise = getLocations.getData();
    myLocPromise.then(function (result) {
        $scope.locations = result;
    });
    var y = [];
    var m = [];
    var d = [];
    for(var i=2011;i<2022;i++) { y.push(i); }
    for(var i=1;i<=12;i++) { m.push(i); }
    for(var i=1;i<=31;i++) { d.push(i); }
    
    $scope.years = y;
    $scope.months = m;
    $scope.days = d;
    $scope.coMonth,$scope.coYear,$scope.coDay;
    $scope.saveConcert = function () {
        var date = {
            year: parseInt($scope.coYear),
            month: parseInt($scope.coMonth),
            day: parseInt($scope.coDay)
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

/* Login Controller ***/
app.controller('loginCtrl', function ($scope, $http, $httpParamSerializerJQLike, $rootScope, $location) {
    if ($scope.logedIn == 1) {
        $rootScope.logedIn = true;
        $location.path('/home');
    }
    $scope.submit = function () {
        $http.post(Routing.generate('login_check'), $httpParamSerializerJQLike({_username: $scope.username, _password: $scope.password}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $rootScope.user = $scope.username;
            $rootScope.logedIn = true;
            $scope.logedIn = true;
            $location.path('/home');
        }, function errorCallback(response) {
            console.log(response);
            $rootScope.User = '';
        });
    };
});

/* Home Controller ***/
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

/* Bands Controller ***/
app.controller('bandsCtrl', function ($scope, getGenres, getBands, $rootScope, $http, $mdBottomSheet, $mdToast, $mdDialog) {
    $scope.page, $scope.limit, $scope.total;
    $rootScope.updateBandsList = function (page) {
        var myBandsPromise = getBands.getData(page);
        myBandsPromise.then(function (result) {
            $scope.Bands = result._embedded.bands;
            $scope.limit = result.limit;
            $scope.total = result.total;
            $scope.page = result.page;
            $scope.pages = result.pages;
        });
    };
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

app.controller('concertsCtrl', function ($scope, $http, getConcerts, getBands, getLocations) {
    $scope.concerts, $scope.limit, $scope.total, $scope.page, $scope.pages;
    $scope.updateConcertsList = function (page) {
        var myConPromise = getConcerts.getData(page);
        myConPromise.then(function (result) {$scope.limit = result.limit;
            $scope.total = result.total;
            $scope.page = result.page;
            $scope.pages = result.pages;
            $scope.concerts = result._embedded.concerts;
        });
    };
    $scope.bands;
    var myBandsPromise = getBands.getData(1, 1);
    myBandsPromise.then(function (result) {
        $scope.bands = result._embedded.bands;
    });
    $scope.locations;
    var myLocPromise = getLocations.getData();
    myLocPromise.then(function (result) {
        $scope.locations = result;
    });
    $scope.date = new Date();

    $scope.saveConcert = function () {
        console.log($scope.date);
        var date = {year: $scope.date.getFullYear(),
            month: $scope.date.getMonth(),
            day: $scope.date.getDay()
        };
        console.log(date);
        var databundle_concert = {
            date: date,
            band: $scope.bands[$scope.ncband].id,
            location: $scope.locations[$scope.nclocation].id
        };
        $http.post(Routing.generate('api_concert_create'), $httpParamSerializerJQLike({databundle_concert: databundle_concert}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $rootScope.showSuccess('Concert Saved');
        }, function errorCallback(response) {
            console.log(response);
        });
    }
    $scope.ncband, $scope.nclocation;
    $scope.updateConcertsList();
    $scope.sortType = 'date'; // set the default sort type
    $scope.sortReverse = true;  // set the default sort order
    $scope.searchBand = '';     // set the default search/filter term

});





app.controller('mediaCtrl', function ($scope, $http, getImages) {
    $scope.images, $scope.limit, $scope.total, $scope.page, $scope.pages;
    $scope.getImagesList = function (page) {
        var myImgPromise = getImages.getData(page);
        myImgPromise.then(function (result) {
            $scope.limit = result.limit;
            $scope.total = result.total;
            $scope.page = result.page;
            $scope.pages = result.pages;
            $scope.images= result._embedded.media;
            console.log(result);
        });
    };
    $scope.getImagesList();
});