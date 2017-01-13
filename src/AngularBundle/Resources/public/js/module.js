/*
* App Module and Conf.
*/
//
//function onGoogleReady(){
//    angular.bootstrap(document.getElementsByTagName('body')[0], ['mainApp']);
//}

var app = angular.module('mainApp', ['ngRoute', 'ngMaterial', 'ngMessages', 'ngAria', 'ngAnimate', 'angular-growl', 'bw.paging', 'ngFileUpload', 'ui.map']);

app.config([
  '$routeProvider',
  function ($routeProvider) {
    $routeProvider
    .when('/', {
<<<<<<< HEAD
      templateUrl: "http://be.michelkhater.com/bundles/angular/ng/login.html",
      controller: 'loginCtrl',
    }).when('/home', {
      templateUrl: "http://be.michelkhater.com/bundles/angular/ng/welcome.html",
      controller: 'welcomeCtrl',
    }).when('/bands', {
      templateUrl: "http://be.michelkhater.com/bundles/angular/ng/bands.html",
      controller: 'bandsCtrl',
    }).when('/concerts', {
      templateUrl: "http://be.michelkhater.com/bundles/angular/ng/concerts.html",
      controller: 'concertsCtrl',
    }).when('/venues', {
      templateUrl: "http://be.michelkhater.com/bundles/angular/ng/locations.html",
      controller: 'locationsCtrl',
    }).when('/media', {
      templateUrl: "http://be.michelkhater.com/bundles/angular/ng/media.html",
=======
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
>>>>>>> ba093632385595688f4a8086394e5b24bb7f2cde
      controller: 'mediaCtrl'
    })
  }
]);

app.config(['$mdIconProvider', function ($mdIconProvider) {
  $mdIconProvider
<<<<<<< HEAD
  .icon('close', 'http://be.michelkhater.com/bundles/angular/img/icons/xClose.svg', 24)
  .icon('crud:edit', 'http://be.michelkhater.com/bundles/angular/img/icons/crud/edit.svg', 24)
  .icon('crud:delete', 'http://be.michelkhater.com/bundles/angular/img/icons/crud/delete.svg', 24)
  .icon('crud:preview', 'http://be.michelkhater.com/bundles/angular/img/icons/crud/preview.svg', 24)
  .icon('crud:add:band', 'http://be.michelkhater.com/bundles/angular/img/icons/add/addBand.svg', 24)
  .icon('crud:add:venue', 'http://be.michelkhater.com/bundles/angular/img/icons/add/addLocation.svg', 24)
  .icon('crud:add:concert', 'http://be.michelkhater.com/bundles/angular/img/icons/add/addConcert.svg', 24)
  .icon('filter:up', 'http://be.michelkhater.com/bundles/angular/img/icons/arrowUp.svg', 24)
  .icon('filter:down', 'http://be.michelkhater.com/bundles/angular/img/icons/arrowDown.svg', 24)
  .icon('nav:home', 'http://be.michelkhater.com/bundles/angular/img/icons/Home.svg', 24)
  .icon('nav:add', 'http://be.michelkhater.com/bundles/angular/img/icons/add/add.svg', 24)
  .icon('nav:menu', 'http://be.michelkhater.com/bundles/angular/img/icons/menu.svg', 24)
  .icon('elem:band', 'http://be.michelkhater.com/bundles/angular/img/icons/band.svg', 24)
  .icon('elem:venue', 'http://be.michelkhater.com/bundles/angular/img/icons/add/addLocation.svg', 24)
  .icon('elem:concert', 'http://be.michelkhater.com/bundles/angular/img/icons/add/addConcert.svg', 24)
  .icon('elem:media', 'http://be.michelkhater.com/bundles/angular/img/icons/media.svg', 24)
  .icon('drums', 'http://be.michelkhater.com/bundles/angular/img/icons/drum-3.svg', 24)
=======
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
>>>>>>> ba093632385595688f4a8086394e5b24bb7f2cde
}
]);

app.config(['$mdThemingProvider', function ($mdThemingProvider) {
  $mdThemingProvider.theme('default')
  .primaryPalette('red')
  .accentPalette('deep-purple')
  .warnPalette('grey')
  //.backgroundPalette('blue-grey')
  .dark();
}
]);

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
<<<<<<< HEAD
      if (next.templateUrl == "http://be.michelkhater.com/bundles/angular/ng/login.html") {
=======
      if (next.templateUrl == "/bundles/angular/ng/login.html") {
>>>>>>> ba093632385595688f4a8086394e5b24bb7f2cde
      } else {
        $rootScope.go('/');
      }
    }
  });


  var urls = [
<<<<<<< HEAD
    'http://be.michelkhater.com/bundles/angular/img/icons/xClose.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/crud/edit.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/crud/delete.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/crud/preview.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/add/addBand.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/add/addLocation.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/add/addConcert.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/add/add.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/Home.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/menu.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/band.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/drum-3.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/media.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/arrowUp.svg',
    'http://be.michelkhater.com/bundles/angular/img/icons/arrowDown.svg'
=======
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
>>>>>>> ba093632385595688f4a8086394e5b24bb7f2cde
  ];
  angular.forEach(urls, function(url) {
    $templateRequest(url);
  });
});
