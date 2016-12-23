/*****************************************************************************************/
/**********                 FACTORIES                                           **********/
/*****************************************************************************************/
app.factory('Bands', ['$http', '$httpParamSerializerJQLike', function ($http, $httpParamSerializerJQLike) {
        var url = Routing.generate('api_bands_list');
        var dataFactory = {};
        dataFactory.getAllBands = function () {
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}, params: {offset: 1, all: 1}});
        };
        dataFactory.getBands = function (page, limit) {
            if (page == 0 || page == null) {
                page = 1
            }
            if (limit == 0 || limit == null) {
                limit = 10
            }
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}, params: {offset: page, limit: limit}});
        };
        dataFactory.addBand = function (databundle_band) {
            return $http.post(Routing.generate('api_band_create'), $httpParamSerializerJQLike({databundle_band: databundle_band}), {headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
        };
        dataFactory.deleteBand = function (slug) {
            return $http.delete(Routing.generate('api_band_delete', {id: slug}));
        };
        dataFactory.getGenres = function () {
            return $http.get(Routing.generate('api_band_genres'), {headers: {'Accept': 'application/json'}});
        };
        dataFactory.addImageToBand = function (slug, id) {
            return $http.patch(Routing.generate('api_band_add_image', {slug: slug + '/' + id}), {headers: {'Accept': 'application/json'}})
        }

        return dataFactory;
    }]);

app.factory('Images', ['$http', function ($http) {
        var dataFactory = {};
        var url = Routing.generate('api_media_list');
        dataFactory.getAllImages = function () {
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}, params: {offset: 1, all: 1}});
        };
        dataFactory.getImages = function (page, limit) {
            if (page == 0 || page == null) {
                page = 1
            }
            if (limit == 0 || limit == null) {
                limit = 10
            }
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}, params: {offset: page, limit: limit}});
        };

        return dataFactory;
    }]);

app.factory('Concerts', ['$http', '$httpParamSerializerJQLike', function ($http, $httpParamSerializerJQLike) {
        var url = Routing.generate('api_concerts_list');
        var dataFactory = {};
        dataFactory.getAllConcerts = function () {
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}, params: {offset: 1, all: 1}});
        };
        dataFactory.getConcerts = function (page, limit) {
            if (page == 0 || page == null) {
                page = 1
            }
            if (limit == 0 || limit == null) {
                limit = 10
            }
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}, params: {offset: page, limit: limit}});
        };
        dataFactory.addConcert = function (databundle_concert) {
            return $http.post(Routing.generate('api_concert_create'), $httpParamSerializerJQLike({databundle_concert: databundle_concert}), {headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
        };
        dataFactory.deleteConcert = function (id) {
            return $http.delete(Routing.generate('api_concert_delete', {id: id}));
        };
        return dataFactory;
    }]);

app.factory('Locations', ['$http', '$httpParamSerializerJQLike', function ($http, $httpParamSerializerJQLike) {
        var url = Routing.generate('api_locations_list');
        var dataFactory = {};
        dataFactory.getAllLocations = function () {
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}, params: {offset: 1, all: 1}});
        };
        dataFactory.getLocations = function (page, limit) {
            if (page == 0 || page == null) {
                page = 1
            }
            if (limit == 0 || limit == null) {
                limit = 10
            }
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}, params: {offset: page, limit: limit}});
        };
        return dataFactory;
    }]);
