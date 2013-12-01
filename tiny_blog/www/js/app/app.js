(function(window, angular, undefined) {'use strict';

    angular.module('tinyBlogApp', [])

        .directive('captchaImg', function() {
            return {
                scope: {},
                controller: ['$scope', '$attrs', '$window', function($scope, $attrs, $window) {
                    $scope.change = function() {
                        $scope.captchaUrlRandom = $scope.captchaUrl + '?' + Math.random();
                    };
                    $scope.init = function() {
                        $scope.captchaUrl = $attrs['url'];
                        $scope.change();
                    };
                }],
                restrict: 'A',
                template: '<img alt="" ng-init="init()" ng-src="{{ captchaUrlRandom }}" ng-click="change()" ng-style="cursorStyle" ng-mouseover="cursorStyle={cursor: \'pointer\'}">',
                replace: true
            };
        })

        .directive('hoverDropdownMenu', function() {
            return function(scope, element, attrs) {
                element.dropdown({
                    on: 'hover'
                });
            };
        })

        .directive('uiTinymce', function() {
            return function(scope, element, attrs) {
                element.tinymce({
                    menubar: false,
                    statusbar: false,
                    forced_root_block: 'div',
                    height: 400
                });
            };
        });

})(window, window.angular);