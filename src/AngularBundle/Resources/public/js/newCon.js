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

/* Login Controller ***/
app.controller('loginCtrl', function ($scope, $http, $httpParamSerializerJQLike, $rootScope, $location) {
    $scope.submit = function () {
        $http.post(Routing.generate('login_check'), $httpParamSerializerJQLike({_username: $scope.username, _password: $scope.password}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $rootScope.user = $scope.username;
            $rootScope.logedIn = true;
            //$scope.logedIn = true;
            $location.path('/home');
        }, function errorCallback(response) {
            console.log(response);
            $rootScope.User = '';
        });
    };
});

/* Home Controller ***/
app.controller('welcomeCtrl', function ($scope, $rootScope, $http) {
    if (angular.isUndefined($rootScope.user)) {
        var userUrl = Routing.generate('ng_get_user');
        $http.get(userUrl).then(
                function successCallback(response) {
                    $rootScope.user = response.data;
                    $scope.welcomeMessage = "Welcome Mr. " + $rootScope.user;
                }, function errorCallback(response) {
            console.log(response);
        });
    }
    $scope.welcomeMessage = "Welcome Mr. " + $rootScope.user;
});

/* Bands Controller ***/
app.controller('bandsCtrl', function ($scope, Bands, $rootScope, $mdDialog) {
    $scope.page, $scope.limit, $scope.total, $scope.Bands;
    updateBandsList($scope.page, $scope.limit);
    function updateBandsList(page, limit) {
        Bands.getBands(page, limit)
                .then(function (response) {
                    $scope.limit = response.data.limit;
                    $scope.total = response.data.total;
                    $scope.page = response.data.page;
                    $scope.pages = response.data.pages;
                    $scope.Bands = response.data._embedded.bands;
                }, function (error) {
                    console.log(error.message);
                });
    }

    $scope.changePage = function (page) {
        updateBandsList(page, $scope.limit);
    }
    $scope.deleteBand = function (slug) {
        Bands.deleteBand(slug)
                .then(function successCallback(response) {
                    updateBandsList($scope.page);
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
        }).then(function () {
        }, function () {
        });
    };
    $scope.addMedia = function (band, ev) {
        $mdDialog.show({
            controller: 'bandImageCtrl',
            templateUrl: 'dialog3.tmpl.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            locals: {
                band: band
            },
            clickOutsideToClose: true,
            fullscreen: true
        })
                .then(function () {
                    updateBandsList();
                }, function () {
                });
    };
});

app.controller('bandImageCtrl', function ($scope, $rootScope, $mdDialog, band, Bands, Images) {
    $scope.images;
    getImagesList($scope.page, $scope.limit);
    function getImagesList(page, limit) {
        Images.getAllImages().then(function (response) {
                    $scope.images = response.data._embedded.media;
                }, function (error) {
                    console.log(error.message);
                });
    }
    $scope.selected;
    $scope.select = function (item) {
        $scope.selected = item;
    };
    $scope.isActive = function (item) {
        return $scope.selected === item;
    };
    $scope.saveBand = function () {
        Bands.addImageToBand(band.slug, $scope.selected.id)
                .then(function successCallback(response) {
                    $mdDialog.hide();
                    $rootScope.showSuccess('Preview Image Saved');
                }, function errorCallback(response) {
                    $rootScope.showError(response.data.message);
                });
    };
    $scope.changePage = function (page) {
        getImageList(page, $scope.limit);
    }

});

app.controller('concertsCtrl', function ($scope, Concerts) {
    $scope.concerts, $scope.limit, $scope.total, $scope.page, $scope.pages;
    updateConcertsList = function (page) {
        Concerts.getConcerts(page).then(function (result) {
            $scope.limit = result.data.limit;
            $scope.total = result.data.total;
            $scope.page = result.data.page;
            $scope.pages = result.data.pages;
            $scope.concerts = result.data._embedded.concerts;
        });
    }
    updateConcertsList();
    $scope.sortType = 'date'; // set the default sort type
    $scope.sortReverse = true;  // set the default sort order
    $scope.searchBand = '';     // set the default search/filter term
    $scope.changePage = function (page) {
        updateConcertsList(page, $scope.limit);
    }
});

app.controller('mediaCtrl', function ($scope, $rootScope, $timeout, Images, Upload) {
    $scope.images, $scope.limit, $scope.total, $scope.page, $scope.pages;
    getImagesList($scope.page, $scope.limit);
    function getImagesList(page, limit) {
        Images.getImages(page, limit)
                .then(function (response) {
                    $scope.limit = response.data.limit;
                    $scope.total = response.data.total;
                    $scope.page = response.data.page;
                    $scope.pages = response.data.pages;
                    $scope.images = response.data._embedded.media;
                }, function (error) {
                    console.log(error.message);
                });
    }
    $scope.uploadPic = function (file) {
        var url = Routing.generate('api_media_create');
        file.upload = Upload.upload({
            url: url,
            data: {file: file}
        });

        file.upload.then(function (response) {
            $timeout(function () {
                file.result = response.data;
                getImagesList();
                $rootScope.showSuccess('Image Added');
            });
        }, function (response) {
            console.log('response');
            if (response.status > 0) {
                console.log('response.status > 0');
                $scope.errorMsg = response.status + ': ' + response.data;
            } else {
                console.log('response.status < 0');

            }
        }, function (evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    }

});




/*** Forms Controllers ***/
app.controller('bandFormCtrl', function ($scope, $rootScope, $mdDialog, Bands) {
    $scope.genres;
    $scope.band = {
        name: "",
        genre: ""
    };
    getBandsGenreList();
    function getBandsGenreList() {
        Bands.getGenres().then(function (response) {
            $scope.genres = response.data;
        }, function (error) {
            console.log(error.message);
        });
    }
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
        Bands.addBand(databundle_band).then(
                function successCallback(response) {
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
app.controller('concertFormCtrl', function ($scope, $rootScope, $mdDialog, Bands, Locations, Concerts) {
    $scope.ncband, $scope.nclocation;

    $scope.fbands;
    function getBands() {
        Bands.getAllBands().then(function (response) {
            $scope.fbands = response.data._embedded.bands;
        }, function (error) {
            console.log(error.message);
        });
    }
    getBands();

    $scope.flocations;
    function getLocations() {
        Locations.getAllLocations().then(function (response) {
            $scope.flocations = response.data;
        }, function (error) {
            console.log(error.message);
        });
    }
    getLocations();

    var y = [];
    var m= [];
    var d = [];
    for (var i = 2011; i < 2022; i++) {
        y.push(i);
    }
    for (var i = 1; i <= 12; i++) {
        m.push(i);
    }
    for (var i = 1; i <= 31; i++) {
        d.push(i);
    }

    $scope.years = y;
    $scope.months = m;
    $scope.days = d;
    $scope.coMonth, $scope.coYear, $scope.coDay;
    $scope.saveConcert = function () {
        var date = {
            year: parseInt($scope.coYear),
            month: parseInt($scope.coMonth),
            day: parseInt($scope.coDay)
        };
        var databundle_concert = {
            date: date,
            band: $scope.fbands[$scope.ncband].id,
            location: $scope.flocations[$scope.nclocation].id
        };
        saveConcert(databundle_concert);
    };
    function saveConcert(data) {
        Concerts.addConcert(data).then(function successCallback(response) {
            $scope.hide();
            $rootScope.showSuccess('Concert Created');
        }, function errorCallback(response) {
            console.log(response);
        });
    }
    $scope.clearForm = function () {
        
    };
    $scope.hide = function () {
        $mdDialog.hide();
    };
    $scope.cancel = function () {
        $mdDialog.cancel();
    };
});
