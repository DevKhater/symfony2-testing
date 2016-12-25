
/* **********************************************************************************************
* App Directives
*/

app.directive('loginLogout', function ($rootScope) {
  return {
    restrict: 'EA',
    template: '<p><span ng-if="status">You are Logged In!  || <span ng-click="logOut()">LogOut</span></span><span ng-if="!status">You are NOT Logged In!</span></p>',
    scope: {
      status: '='
    },
    link: function (scope, element, attrs) {
      scope.logOut = function () {
        $rootScope.logOut();
      }
    }
  }
});

app.directive('loginStatus', function ($rootScope) {
  return {
    restrict: 'EA',
    template: '',
    scope: {
      status: '='
    },
    link: function (scope, element, attrs) {
      if (attrs['status'] == 1) {
        $rootScope.logedIn = true;
      } else {
        $rootScope.logedIn = false;
      }
      ;
    }
  }
});


app.directive('band', function () {
  return {
    restrict: 'EA',
    transclude: true,
    replace: true,
    templateUrl: "/bundles/angular/ng/partials/band_D.html",
    scope: {
      aband: '=',

    }
  }
});
