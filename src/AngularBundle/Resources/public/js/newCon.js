/* Navigation Controller ***/
app.controller('navigationCtrl', function ($scope, $timeout, $mdSidenav) {
    this.toggleLeft = buildToggler('left');
    function buildToggler(componentId) {
      return function() {
        $mdSidenav(componentId).toggle();
      }
    }
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

/* Forms Contoller ***/

app.controller('formsCtrl', function ($scope, $rootScope){
    $scope.theform = 0;
    $scope.visibleForm = 0;
    $scope.forms = [
        { 'id': 1, 'name' : 'Band' },
        { 'id': 2, 'name' : 'Venue' },
        { 'id': 3, 'name' : 'Concert' },
    ]
    console.log($scope.forms);
    $scope.$watch('theform', function() {
        console.log('Form Changed');
        console.log($scope.theform);
        $scope.visibleForm = $scope.theform;
        $scope.cancel = function(){
            $scope.theform = 0;
        }
        
    });    
});




/* Home Controller ***/
app.controller('welcomeCtrl', function ($scope, $rootScope, Users) {
    getUser = function () {
        Users.getUser().then(function (response) {
            $rootScope.user = response.data;
            $scope.welcomeMessage = "Welcome Mr. " + $rootScope.user;
        }, function (response) {
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
        Bands.deleteBand(slug).then(function (response) {
            updateBandsList($scope.page);
            $rootScope.showSuccess('Band Deleted');
        }, function (response) {
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
    $scope.noFuturCon = true;
    $scope.galleries;
    var init = function () {
        Concerts.getFutureConcerts().then(function (result) {
            if (result.data.length) {
                $scope.noFuturCon = false;
                $scope.selectedIndex = 1;
                console.log(result.data);
            } else {
                $scope.selectedIndex = 0;
            }
        }, function (error) {
            console.log(error);
        });
        updateConcertsList();
        getGalleryList();
    }
    updateConcertsList = function (page) {
        Concerts.getOldConcerts(page).then(function (result) {
            if (result.data.length === 0) {
                $scope.noFound = true;
            } else {
                $scope.noFound = false;
                $scope.limit = result.data.limit;
                $scope.total = result.data.total;
                $scope.page = result.data.page;
                $scope.pages = result.data.pages;
                $scope.concerts = result.data._embedded.concerts;
            }
        }, function (error) {
            console.log(error);
        });
    }
    getGalleryList = function () {
        Galleries.getAllGalleries().then(function (result) {
            if (result.data.length !== 0) {
                $scope.galleries = result.data._embedded.gallery;
            }
        }, function (error) {
            console.log(error.message);
        });
    }

    $scope.refreshList = function () {
        updateConcertsList($scope.page, $scope.limit);
    }
    $scope.deleteConcert = function (gig) {
        Concerts.deleteConcert(gig.id).then(function (result) {
            $rootScope.showSuccess('Concert Deleted');
            updateConcertsList($scope.page);
        }, function (result) {
            $rootScope.showError(result.data.message);
        });
    }
    $scope.editing, $scope.newField;
    $scope.editConcertGallery = function (field) {
        $scope.editing = $scope.concerts.indexOf(field);
    }
    $scope.saveConcertGallery = function (concert, newGallery) {
        if ($scope.editing !== false) {
            Concerts.addGalleryToConcert(concert, newGallery).then(function (result) {
                $scope.refreshList();
                $rootScope.showSuccess('Gallery Added To Concert');
            }, function (result) {
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
    console.log('init');
    init();
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
        Locations.deleteLocation(loc.id).then(function (result) {
            $rootScope.showSuccess('Location Deleted');
            getLocationsList();
        }, function (result) {
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
        Images.deleteImage(image.id).then(function (result) {
            $rootScope.showSuccess('Image Deleted');
            getImagesList($scope.page, $scope.limit);
        }, function (result) {
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
app.controller('galleryCtrl', function ($scope, $rootScope, $timeout, $mdSidenav, Galleries, Images) {
    $scope.toggleRight = buildToggler('right');
    $scope.isOpenRight = function () {
        return $mdSidenav('right').isOpen();
    };
    function debounce(func, wait, context) {
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
                    .toggle().then(function () {
            });
        }, 200);
    }
    function buildToggler(navID) {
        return function () {
            // Component lookup should always be available since we are not using `ng-if`
            $mdSidenav(navID).toggle().then(function () {
            });
        }
    }
    $scope.close = function () {
        // Component lookup should always be available since we are not using `ng-if`
        $mdSidenav('right').close().then(function () {
        });
    };

    $scope.galleries, $scope.limit, $scope.total, $scope.page, $scope.pages;
    $scope.images, $scope.noImages;
    $scope.galleryNoFound = false;
    $scope.gallery = {name: ''};
    $scope.editGal = {id: '', name: '', images: ''};
    var init = function () {
        Images.getAllImages().then(function (result) {
            if (result.data.length == 0) {
                $scope.noImages = true;
            } else {
                $scope.noImages = false;
                $scope.images = result.data._embedded.media;
            }
        }, function (error) {
            console.log(error);
        });
        getGalleryList($scope.page, $scope.limit);
    }
    function getGalleryList(page, limit) {
        Galleries.getGalleries(page, limit).then(function (result) {
            console.log(result);
            if (result.data.length == 0) {
                $scope.galleryNoFound = true;
            } else {
                $scope.galleryNoFound = false;
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
        getGalleryList(page, $scope.limit);
    }
    $scope.createGallery = function () {
        Galleries.addGallery($scope.gallery).then(function (result) {
            $rootScope.showSuccess('Gallery Created');
            getGalleryList($scope.page, $scope.limit);
        }, function (result) {
            console.log(result);
        });
    }
    $scope.openGalleryForm = function (gallery) {
        $scope.editGal.id = gallery.id;
        $scope.editGal.name = gallery.name;
        $scope.editGal.images = gallery.images_in_gallery;
        $scope.toggleRight();
    }
    $scope.saveGalleryName = function () {
        if (angular.isNumber($scope.editGal.id)) {
            Galleries.editGalleryName($scope.editGal.id, $scope.editGal.name).then(function (result) {
                $rootScope.showSuccess('Name Updated');
            }, function (error) {
                console.log(error);
            });
            getGalleryList($scope.page, $scope.limit);
        }
    }
    $scope.deleteGallery = function (gallery) {
        if (angular.isNumber(gallery.id)) {
            Galleries.deleteGallery(gallery.id).then(function (result) {
                $rootScope.showSuccess('Gallery Deleted');
                getGalleryList($scope.page, $scope.limit);
            }, function (result) {
                $rootScope.showError(result.data.message);
            });
        }
    }

    $scope.selected = [];
    $scope.class = false;
    $scope.select = function (item) {
        item.isActive = !item.isActive;
        if ($scope.selected.indexOf(item) == -1) {
            $scope.class = true;
            $scope.selected.push(item);
        } else {
            $scope.class = false;
            $scope.selected.splice($scope.selected.indexOf(item), 1);
        }
    };

    $scope.addImageGalleryId;
    $scope.addImagesToGallery = function () {
        if (angular.isUndefined($scope.addImageGalleryId))
        {
            $rootScope.showError('Select A Gallery');
        } else {
            var medias = [];
            angular.forEach($scope.selected, function (value, key) {
                medias.push(value);
                value.isActive = !value.isActive;
            });
            Galleries.addImagesToGallery($scope.addImageGalleryId, medias).then(function (result) {
                $rootScope.showSuccess('Images Added');
                $scope.selected = [];
                getGalleryList($scope.page, $scope.limit);
            }, function (error) {
                $rootScope.showError(error);
            });
        }
    };

    $scope.deleteImageFromGallery = function (image, index) {
        console.log(image);
        console.log(index);
        if (angular.isNumber($scope.editGal.id)) {
            Galleries.removeImageFromGallery($scope.editGal.id, image.id).then(function (result) {
                $rootScope.showSuccess('Image emoved From Gallery');
                getGalleryList($scope.page, $scope.limit);
                $scope.editGal.images.splice(index, 1);

            }, function (result) {
                $rootScope.showError(result.data.message);
            });
        }
    }

    init();
});