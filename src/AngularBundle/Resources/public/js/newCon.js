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
app.controller('loginCtrl', function ($scope, $rootScope, Users, checkAuth) {
    checkAuth.check();
    $scope.submit = function () {
        Users.loginUser($scope.username, $scope.password).then(function (response) {
            $rootScope.user = $scope.username;
            $rootScope.logedIn = true;
            $rootScope.go('/home');
        }, function (error) {
            console.log(error);
            $rootScope.User = '';
        });
    };
    if ($rootScope.logedIn) {
        $rootScope.go('/home');
    }
});
/* Home Controller ***/
app.controller('welcomeCtrl', function ($scope, $rootScope, Users) {
    getUser = function () {
        Users.getUser().then(function successCallback(response) {
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
});
/* Bands Controller ***/
app.controller('bandsCtrl', function ($scope, $rootScope, Bands, $mdDialog) {
    $scope.page, $scope.limit, $scope.total, $scope.Bands;
    $scope.noFound = false;
    function updateBandsList(page, limit) {
        Bands.getBands(page, limit).then(function (response) {
            console.log(response);
            if (response.data.length == 0) {
                $scope.noFound = true;
            } else {
                $scope.noFound = false;
                $scope.limit = response.data.limit;
                $scope.total = response.data.total;
                $scope.page = response.data.page;
                $scope.pages = response.data.pages;
                $scope.Bands = response.data._embedded.bands;
            }
        }, function (error) {
            console.log(error);
        });
    }
    updateBandsList($scope.page, $scope.limit);
    $scope.changePage = function (page) {
        updateBandsList(page, $scope.limit);
    }
    $scope.deleteBand = function (slug) {
        Bands.deleteBand(slug).then(function successCallback(response) {
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
app.controller('concertsCtrl', function ($scope, $rootScope, Concerts, Galleries) {
    $scope.concerts, $scope.limit, $scope.total, $scope.page, $scope.pages;
    $scope.noFound = false;
    updateConcertsList = function (page) {
        Concerts.getConcerts(page).then(function (result) {
            if (result.data.length === 0) {
                $scope.noFound = true;
            } else {
                $scope.noFound = false;
                $scope.limit = result.data.limit;
                $scope.total = result.data.total;
                $scope.page = result.data.page;
                $scope.pages = result.data.pages;
                $scope.concerts = result.data._embedded.concerts;
                $scope.getGalleryList();
            }
        }, function (error) {
            console.log(error);
        });
    }
    updateConcertsList($scope.page, $scope.limit);
    $scope.refreshList = function () {
        updateConcertsList($scope.page, $scope.limit);
    }
    $scope.deleteConcert = function (gig) {
        Concerts.deleteConcert(gig.id).then(function successCallback(result) {
            $rootScope.showSuccess('Concert Deleted');
            updateConcertsList($scope.page);
        }, function errorCallback(result) {
            $rootScope.showError(result.data.message);
        });
    }
    $scope.galleries;
    $scope.getGalleryList = function () {
        Galleries.getAllGalleries().then(function (result) {
            if (result.data.length !== 0) {
                $scope.galleries = result.data._embedded.gallery;
            }
        }, function (error) {
            console.log(error.message);
        });
    }
    $scope.editing, $scope.newField;
    $scope.editConcertGallery = function (field) {
        $scope.editing = $scope.concerts.indexOf(field);
    }
    $scope.saveConcertGallery = function (concert, newGallery) {
        if ($scope.editing !== false) {
            Concerts.addGalleryToConcert(concert, newGallery).then(function successCallback(result) {
                $scope.refreshList();
                $rootScope.showSuccess('Gallery Added To Concert');
            }, function errorCallback(result) {
                $rootScope.showError(result.data.message);
            });
            $scope.editing = false;
        }
    };
    $scope.cancel = function (index) {
        if ($scope.editing !== false) {
            $scope.editing = false;
            $scope.refreshList();
        }
    };
    $scope.sortType = 'date'; // set the default sort type
    $scope.sortReverse = true;  // set the default sort order
    $scope.searchBand = '';     // set the default search/filter term
    $scope.changePage = function (page) {
        updateConcertsList(page, $scope.limit);
    }
});
/* Location Controller ***/
app.controller('locationsCtrl', function ($scope, $rootScope, Locations) {
    $scope.locations;
    $scope.noFound = false;
    function getLocationsList(page) {
        Locations.getLocations(page).then(function (result) {
            result.data.length == 0 ? $scope.noFound = true : $scope.locations = result.data;
        });
    }
    getLocationsList();

    $scope.deleteLocation = function (loc) {
        Locations.deleteLocation(loc.id).then(function successCallback(result) {
            $rootScope.showSuccess('Location Deleted');
            getLocationsList();
        }, function errorCallback(result) {
            $rootScope.showError(result.data.message);
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
        Images.getImages(page, limit).then(function (result) {
            if (result.data.total == 0) {
                $scope.noFound = true;
            }
            $scope.limit = result.data.limit;
            $scope.total = result.data.total;
            $scope.page = result.data.page;
            $scope.pages = result.data.pages;
            $scope.images = result.data._embedded.media;
        }, function (error) {
            console.log(error.message);
        });
    }
    $scope.changePage = function (page) {
        getImagesList(page, $scope.limit);
    }
    $scope.deleteImage = function (image) {
        Images.deleteImage(image.id).then(function successCallback(result) {
            $rootScope.showSuccess('Image Deleted');
            getImagesList($scope.page, $scope.limit);
        }, function errorCallback(result) {
            $rootScope.showError(result.data.message);
        });
    }

    $scope.uploadPic = function (files, errFiles) {
        $scope.files = files;
        $scope.errFiles = errFiles;
        var url = Routing.generate('api_media_create');
        angular.forEach(files, function (file) {
            file.upload = Upload.upload({
                url: url,
                data: {file: file}
            });

            file.upload.then(function (result) {
                $timeout(function () {
                    file.result = result.data;
                    getImagesList();
                    $scope.picFile = null;
                    $rootScope.showSuccess('Image Added');
                });
            }, function (response) {
                if (response.status > 0)
                    $scope.errorMsg = response.status + ': ' + response.data;
            }, function (evt) {
                file.progress = Math.min(100, parseInt(100.0 *
                        evt.loaded / evt.total));
            });
        });
    }
});
/* Gallery Controller ***/
app.controller('galleryCtrl', function ($scope, $rootScope, Galleries, Images) {
    $scope.images;
    $scope.noFound = false;
//    getImagesList();
//    function getImagesList() {
//        Images.getAllImages().then(function (result) {
//            if (result.data.length == 0) {
//                $scope.noFound = true;
//            } else {
//                $scope.images = result.data._embedded.media;
//            }
//        }, function (error) {
//            console.log(error);
//        });
//    }

    $scope.galleries, $scope.limit, $scope.total, $scope.page, $scope.pages;
    $scope.galleryNoFound = false;
    getGalleryList($scope.page, $scope.limit);
    function getGalleryList(page, limit) {
        Galleries.getAllGalleries().then(function (result) {
            console.log(result);
            if (result.data.length == 0) {
                $scope.galleryNoFound = true;
            } else {
                $scope.limit = result.data.limit;
                $scope.total = result.data.total;
                $scope.page = result.data.page;
                $scope.pages = result.data.pages;
                $scope.galleries = result.data._embedded.gallery;
            }
        }, function (error) {
            console.log(error.message);
        });
    }
    $scope.changePage = function (page) {
        getImagesList(page, $scope.limit);
    }

    $scope.selected = [];
    $scope.class = false;
    $scope.select = function (item) {
        item.isActive = !item.isActive;
        console.log(item);
        console.log($scope.selected);
        console.log($scope.selected.indexOf(item));
        if ($scope.selected.indexOf(item) == -1) {
            $scope.class = true;
            $scope.selected.push(item);
            console.log($scope.selected);
        } else {
            $scope.class = false;
            $scope.selected.splice($scope.selected.indexOf(item), 1);
            console.log($scope.selected);
        }
    };
    $scope.gallery = {
        name: ''
    }
    $scope.createGallery = function () {
        datatbundle_gallery = {
            name: $scope.gallery.name
        }
        Galleries.addGallery(datatbundle_gallery).then(function successCallback(result) {
            $rootScope.showSuccess('Gallery Created');
        }, function errorCallback(result) {
            console.log(result);
        });
    }
    $scope.addImageGalleryId;
    $scope.addImagesToGallery = function () {
        if (angular.isUndefined($scope.addImageGalleryId))
        {
            $rootScope.showError('Select A Gallery');
        } else {
            $scope.medias = [];
            angular.forEach($scope.selected, function (value, key) {
                console.log(value);
                $scope.medias.push(value);
            });
            Galleries.addImagesToGallery($scope.addImageGalleryId, $scope.medias).then(function successCallback(result) {
                $rootScope.showSuccess('Images Added');
                getGalleryList($scope.page, $scope.limit);
            }, function errorCallback(error) {
                $rootScope.showError(error);
            });
        }
    };
});