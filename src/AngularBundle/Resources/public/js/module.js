/*
* App Module and Conf.
*/
//
//function onGoogleReady(){
//    angular.bootstrap(document.getElementsByTagName('body')[0], ['mainApp']);
//}

var app = angular.module('mainApp', ['ngRoute', 'ngMaterial', 'ngMessages', 'ngAria', 'ngAnimate', 'angular-growl', 'bw.paging', 'ngFileUpload']);

app.config([
  '$routeProvider',
  function ($routeProvider) {
    $routeProvider
    .when('/', {
      templateUrl: "/bundles/angular/ng/login.html",
      controller: 'loginCtrl',
    }).when('/home', {
      templateUrl: "/bundles/angular/ng/welcome.html",
      controller: 'welcomeCtrl',
    }).when('/bands', {
      templateUrl: "/bundles/angular/ng/bands.html",
      controller: 'bandsCtrl',
    }).when('/concerts', {
      templateUrl: "/bundles/angular/ng/concerts.html",
      controller: 'concertsCtrl',
    }).when('/venues', {
      templateUrl: "/bundles/angular/ng/locations.html",
      controller: 'locationsCtrl',
    }).when('/media', {
      templateUrl: "/bundles/angular/ng/media.html",
      controller: 'mediaCtrl'
    }).when('/gallery', {
      templateUrl: "/bundles/angular/ng/gallery.html",
      controller: 'galleryCtrl'
    })
  }
]);

app.config(['$mdIconProvider', function ($mdIconProvider) {
  $mdIconProvider
  .icon('close', '/bundles/angular/img/icons/xClose.svg', 24)
  .icon('crud:edit', '/bundles/angular/img/icons/crud/edit.svg', 24)
  .icon('crud:delete', '/bundles/angular/img/icons/crud/delete.svg', 24)
  .icon('crud:preview', '/bundles/angular/img/icons/crud/preview.svg', 24)
  .icon('crud:add:band', '/bundles/angular/img/icons/add/addBand.svg', 24)
  .icon('crud:add:venue', '/bundles/angular/img/icons/add/addLocation.svg', 24)
  .icon('crud:add:concert', '/bundles/angular/img/icons/add/addConcert.svg', 24)
  .icon('filter:up', '/bundles/angular/img/icons/arrowUp.svg', 24)
  .icon('filter:down', '/bundles/angular/img/icons/arrowDown.svg', 24)
  .icon('nav:home', '/bundles/angular/img/icons/Home.svg', 24)
  .icon('nav:add', '/bundles/angular/img/icons/add/add.svg', 24)
  .icon('nav:menu', '/bundles/angular/img/icons/menu.svg', 24)
  .icon('elem:band', '/bundles/angular/img/icons/band.svg', 24)
  .icon('elem:venue', '/bundles/angular/img/icons/add/addLocation.svg', 24)
  .icon('elem:concert', '/bundles/angular/img/icons/add/addConcert.svg', 24)
  .icon('elem:media', '/bundles/angular/img/icons/media.svg', 24)
  .icon('drums', '/bundles/angular/img/icons/drum-3.svg', 24)
}
]);

app.config(['$mdThemingProvider', function ($mdThemingProvider) {
  $mdThemingProvider.theme('default')
  .primaryPalette('red')
  .accentPalette('deep-purple')
  .warnPalette('grey')
  .backgroundPalette('blue-grey')
  .dark();
}
]);

app.config(['growlProvider', function (growlProvider) {
  growlProvider.globalTimeToLive(3000);
  growlProvider.onlyUniqueMessages(false);
}]);

app.run(function ($rootScope, $location, $window, $templateRequest, growl) {
  $rootScope.logedIn;
  $rootScope.user;


  $rootScope.logOut = function () {
    $window.location.href = Routing.generate('logout');
  };
  $rootScope.showSuccess = function (message) {
    growl.success(message, {title: 'Success!'});
  };
  $rootScope.showError = function (message) {
    growl.error(message, {title: 'Something Went Wrong!'});
  };
  $rootScope.go = function (path) {
    $location.path(path);
  };
  $rootScope.$on("$routeChangeStart", function (event, next, current) {
    if (!$rootScope.logedIn) {
      if (next.templateUrl == "/bundles/angular/ng/login.html") {
      } else {
        $rootScope.go('/');
      }
    }
  });


  var urls = [
    '/bundles/angular/img/icons/xClose.svg',
    '/bundles/angular/img/icons/crud/edit.svg',
    '/bundles/angular/img/icons/crud/delete.svg',
    '/bundles/angular/img/icons/crud/preview.svg',
    '/bundles/angular/img/icons/add/addBand.svg',
    '/bundles/angular/img/icons/add/addLocation.svg',
    '/bundles/angular/img/icons/add/addConcert.svg',
    '/bundles/angular/img/icons/add/add.svg',
    '/bundles/angular/img/icons/Home.svg',
    '/bundles/angular/img/icons/menu.svg',
    '/bundles/angular/img/icons/band.svg',
    '/bundles/angular/img/icons/drum-3.svg',
    '/bundles/angular/img/icons/media.svg',
    '/bundles/angular/img/icons/arrowUp.svg',
    '/bundles/angular/img/icons/arrowDown.svg'
  ];
  angular.forEach(urls, function(url) {
    $templateRequest(url);
  });
});
