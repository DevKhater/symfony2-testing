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
/* Concerts Controller ***/
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
/* Location Controller ***/
app.controller('locationsCtrl', function ($scope, Locations, $rootScope) {
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
/* Media Controller ***/
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
/* Gallery Controller ***/
app.controller('galleryCtrl', function ($scope, Images, Galleries, $rootScope, $mdDialog) {
    $scope.images, $scope.limit, $scope.total, $scope.page, $scope.pages;
    $scope.noFound = false;
    getImagesList();
    function getImagesList() {
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
    $scope.selected = [];
    $scope.class = false;
    $scope.select = function (item) {
        item.isActive = !item.isActive;
        console.log(item);
        console.log($scope.selected);
        console.log($scope.selected.indexOf(item));
        if ($scope.selected.indexOf(item) == -1) {
                $scope.class= true;
                $scope.selected.push(item);
            console.log($scope.selected);
        } else {
            $scope.class = false;
            $scope.selected.splice($scope.selected.indexOf(item), 1);
            console.log($scope.selected);
        }
    };
     $scope.addImagesToGallery = function () {
         $scope.medias = [];
         angular.forEach($scope.selected, function(value, key) {
                console.log(value);
                $scope.medias.push(value);
        });
        Galleries.addImagesToGallery(1, $scope.medias)
                .then(function successCallback(response) {
                    $rootScope.showSuccess('Images Added');
                }, function errorCallback(response) {
                    $rootScope.showError(response);
                });
    };
});