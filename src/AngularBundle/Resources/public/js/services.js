/*****************************************************************************************/
/**********                 FACTORIES                                           **********/
/*****************************************************************************************/
app.factory('checkAuth', ['$rootScope', 'Users', function ($rootScope, Users) {
        var dataFactory = {};
         dataFactory.check  = function () {
             Users.getUser().then(function (response) {
                $rootScope.logedIn = 1;
                return true;
            }, function (error) {
                console.log(error.data.title);
                $rootScope.logedIn = 0;
                return false;
            });
        };
       return dataFactory;
    }]);

app.factory('Users', ['$http', '$httpParamSerializerJQLike', function ($http, $httpParamSerializerJQLike) {
        var url = Routing.generate('ng_get_user');
        var url2 = Routing.generate('new_token');
        var dataFactory = {};
        dataFactory.getUser = function () {
            return $http({method: "GET", url: url, headers: {'Accept': 'application/json'}});
        };
        
        dataFactory.loginUser = function (username, password) {
            return $http.post(Routing.generate('login_check'), $httpParamSerializerJQLike({_username: username, _password: password}), {
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}});
        };
        
        dataFactory.getToken = function (user, pass) {
            return $http.post( url2, {headers: {'Authorization': 'Basic'}, params: {'username': user, 'password':pass}})
                    ;
        };
        return dataFactory;
    }]);
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




/************************************************************************************************************************************************************************************/
/************************************************************************************************************************************************************************************/
/************************************************************************************************************************************************************************************/

app.filter('num', function() {
    return function(input) {
      return parseInt(input, 10);
    };
});