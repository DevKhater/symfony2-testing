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



