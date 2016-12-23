
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
        template:   '<div layout-sm="row" layout-xs="row">' +
                        '<div flex-sm="50" flex-xs="50" class="bandImageHolder img-responsive">' + 
                            '<img ng-src="{{aband.image.image_url}}">' + 
                        '</div>' + 
                        '<div flex flex-sm="50" flex-xs="50"  layout="column" layout-align="center center">' + 
                            '<span class="md-headline">{{aband.name}}</span><br/>' + 
                            '<span class="md-subhead">{{aband.genre}}</span>' + 
                            '<p layout="row" layout-align="space-around center">' + 
                                '<md-icon md-svg-src="/bundles/angular/img/icons/drum-3.svg" class="bandsGigsNumber"></md-icon>' + 
                                '<span class="md-subhead">{{aband.concerts.length}}</span>' + 
                            '</p>' + 
                            '<ng-transclude/>'+
                        '</div>'+
                    '</div>'
            ,
        scope: {
            aband: '=',
            
        }
    }
});
