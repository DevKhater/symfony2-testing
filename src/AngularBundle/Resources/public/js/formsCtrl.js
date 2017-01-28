/*** Forms Controllers ***/

app.controller('bandFormCtrl', function ($scope, $rootScope, Bands) {
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
                function (response) {

                    $rootScope.showSuccess('Band Created');
                    $scope.clearForm();
                }, function (error) {
            console.log(error);
        });
    };
    $scope.clearForm = function () {
        $scope.band.name = "";
        $scope.band.genre = "";
        $scope.displayInput = false;
    };
});

app.controller('locationFormCtrl', function ($scope, $rootScope, Locations) {
    $scope.location = {
        name: "",
        address: ""
    };
    $scope.saveLocation = function () {
        var databundle_location = {
            name: $scope.location.name,
            address: $scope.location.address
        };
        Locations.addLocation(databundle_location).then(function (response) {
            $rootScope.showSuccess('Venue Created');
            $scope.clearForm();
        }, function (error) {
            console.log(error);
        }
        )
    };
    $scope.clearForm = function () {
        $scope.location.name = "";
        $scope.location.address = "";
    };
});

app.controller('concertFormCtrl', function ($scope, $rootScope, Bands, Locations, Concerts) {
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
        Concerts.addConcert(data).then(function (response) {
            $rootScope.showSuccess('Concert Created');
            $scope.clearForm();
        }, function (error) {
            console.log(error);
        }
        )};
    $scope.clearForm = function () {
        $scope.coYear = '';
        $scope.coMonth = '';
        $scope.coDay = '';
        $scope.fbands = '';
        $scope.flocations = '';
    }
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
                .then(function (response) {
                    $mdDialog.hide();
                    $rootScope.showSuccess('Preview Image Saved');
                }, function (response) {
                    $rootScope.showError(response.data.message);
                });
    };
    $scope.changePage = function (page) {
        getImageList(page, $scope.limit);
    }

});