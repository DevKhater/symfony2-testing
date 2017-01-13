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
app.controller('loginCtrl', function ($scope, $http, $httpParamSerializerJQLike, $rootScope, checkAuth) {
    checkAuth.check();
    $scope.submit = function () {
        $http.post(Routing.generate('login_check'), $httpParamSerializerJQLike({_username: $scope.username, _password: $scope.password}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $rootScope.user = $scope.username;
            $rootScope.logedIn = true;
            $rootScope.go('/home');
        }, function errorCallback(response) {
            console.log(response);
            $rootScope.User = '';
        });
    };
    if ($rootScope.logedIn) {
        $rootScope.go('/home');
    }
});

/* Home Controller ***/
app.controller('welcomeCtrl', function ($scope, $rootScope, Users, Galleries) {
    getUser = function () {
        Users.getUser().then(
                function successCallback(response) {
                    $rootScope.user = response.data;
                    $scope.welcomeMessage = "Welcome Mr. " + $rootScope.user;
                }, function errorCallback(response) {
            console.log(response);
        });
    }
    if (angular.isUndefined($rootScope.user)) {
        getUser();
    }
    $scope.welcomeMessage = "Welcome Mr. " + $rootScope.user;
//    Galleries.addImageToGallery(1,1).then(
//        function successCallback(response) {
//          $rootScope.showSuccess('Image Added');
//        }, function errorCallback(response) {
//          console.log(response);
//        });
});

/* Bands Controller ***/
app.controller('bandsCtrl', function ($scope, Bands, $rootScope, $mdDialog) {
    $scope.page, $scope.limit, $scope.total, $scope.Bands;
    $scope.noFound = false;
    function updateBandsList(page, limit) {
        Bands.getBands(page, limit)
                .then(function (response) {
                    $scope.limit = response.data.limit;
                    $scope.total = response.data.total;
                    $scope.page = response.data.page;
                    $scope.pages = response.data.pages;
                    $scope.Bands = response.data._embedded.bands;
                }, function (error) {
                    if (error.status === 404) {
                        $scope.noFound = true;
                    }
                });
    }
    updateBandsList($scope.page, $scope.limit);
    $scope.refreshList = function () {
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
    $scope.noFound = false;
    getImagesList(1, $scope.limit);
    function getImagesList(page, limit) {
        Images.getAllImages().then(function (response) {
            if (response.data.total == 0) {
                $scope.noFound = true;
            } else {
                $scope.images = response.data._embedded.media;
            }
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

app.controller('concertsCtrl', function ($scope, $rootScope, Concerts) {
    $scope.concerts, $scope.limit, $scope.total, $scope.page, $scope.pages;
    $scope.noFound = false;
    updateConcertsList = function (page) {
        Concerts.getConcerts(page).then(function (result) {
                $scope.limit = result.data.limit;
                $scope.total = result.data.total;
                $scope.page = result.data.page;
                $scope.pages = result.data.pages;
                $scope.concerts = result.data._embedded.concerts;
            }, function (error) {
                if (error.status === 404) {
                    $scope.noFound = true;
                }
            });
    }
    console.log($scope.page, $scope.limit)
    updateConcertsList($scope.page, $scope.limit);
    $scope.refreshList = function () {
        console.log($scope.page, $scope.limit)
        updateConcertsList($scope.page, $scope.limit);
    }
    $scope.deleteConcert = function (gig) {
        console.log(gig);
        Concerts.deleteConcert(gig.id).then(function successCallback(response) {
            $rootScope.showSuccess('Concert Deleted');
            updateConcertsList($scope.page);
        }, function errorCallback(response) {
            $rootScope.showError(response.data.message);
        });
    }
    $scope.sortType = 'date'; // set the default sort type
    $scope.sortReverse = true;  // set the default sort order
    $scope.searchBand = '';     // set the default search/filter term
    $scope.changePage = function (page) {
        updateConcertsList(page, $scope.limit);
    }
});
app.controller('locationsCtrl', function ($scope, Locations, $rootScope) {
    $scope.mapOptions = {
        center: new google.maps.LatLng(35.784, -78.670),
        zoom: 15,
        // mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    $scope.myMarker = null;
    $scope.addMarker = function ($event, $params) {
        //$scope.myMarkers.push(new google.maps.Marker({
        if ($scope.myMarker)
            $scope.myMarker.setMap(null);
        $scope.myMarker = new google.maps.Marker({
            map: $scope.myMap,
            position: $params[0].latLng,
            draggable: true
        });
        console.log($params[0].latLng.toString());
    };


    $scope.locations;
    $scope.noFound = false;
    function getLocationsList(page) {
        Locations.getLocations(page).then(function (result) {
            result.data.length == 0 ? $scope.noFound = true : $scope.locations = result.data;
        });
    }
    getLocationsList();

    $scope.deleteLocation = function (loc) {
        Locations.deleteLocation(loc.id).then(function successCallback(response) {
            $rootScope.showSuccess('Location Deleted');
            getLocationsList();
        }, function errorCallback(response) {
            $rootScope.showError(response.data.message);
        });
    }
    $scope.sortType = 'name'; // set the default sort type
    $scope.sortReverse = true;  // set the default sort order
    $scope.searchVenue = '';     // set the default search/filter term

    $scope.SetSort = function (objName, isNumber) {
        $scope.predicate = objName;
        $scope.reverse = !$scope.reverse;
        angular.forEach($scope.names, function (obj) {
            for (var i in obj)
            {
                if (i == objName && obj[i] != '')
                    obj[i] = parseFloat(obj[i]);
            }
        });
    }

});

app.controller('mediaCtrl', function ($scope, $rootScope, $timeout, Images, Upload) {
    $scope.images, $scope.limit, $scope.total, $scope.page, $scope.pages;
    $scope.noFound = false;
    getImagesList($scope.page, $scope.limit);
    function getImagesList(page, limit) {
        Images.getImages(page, limit)
                .then(function (response) {
                    if (response.data.total == 0) {
                        $scope.noFound = true;
                    }
                    $scope.limit = response.data.limit;
                    $scope.total = response.data.total;
                    $scope.page = response.data.page;
                    $scope.pages = response.data.pages;
                    $scope.images = response.data._embedded.media;
                }, function (error) {
                    console.log(error.message);
                });
    }
    $scope.changePage = function (page) {
        getImagesList(page, $scope.limit);
    }
    $scope.deleteImage = function (image) {
        Images.deleteImage(image.id).then(function successCallback(response) {
            $rootScope.showSuccess('Image Deleted');
            getImagesList($scope.page, $scope.limit);
        }, function errorCallback(response) {
            $rootScope.showError(response.data.message);
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
                $scope.picFile = null;
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
app.controller('bandFormCtrl', function ($scope, $rootScope, $mdDialog, $location, $route, Bands) {
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
app.controller('locationFormCtrl', function ($scope, $rootScope, $location, $route, $mdDialog, $http, $httpParamSerializerJQLike) {
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
            if ($location.path() == '/venues')
                $route.reload();
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
app.controller('concertFormCtrl', function ($scope, $rootScope, $location, $route, $controller, $mdDialog, Bands, Locations, Concerts) {
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
    var m = [];
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
            if ($location.path() == '/concerts') {
                angular.extend(this, $controller('concertsCtrl', {$scope: $scope}));
                $scope.refreshList();
            }
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
