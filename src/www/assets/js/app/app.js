(function(window, angular, undefined) {'use strict';

    angular.module('tinyBlogApp', [])

        .directive('timestamp', function() {
            return function(scope, element, attrs) {
                var dateObj = new Date(attrs['timestamp']);
                scope.localTime = dateObj.toLocaleTimeString();
            };
        })

        .directive('captchaImg', function() {
            return {
                scope: {},
                restrict: 'A',
                template: '<img alt="" ng-src="{{ captchaUrlRandom }}" ng-click="change()" ng-style="cursorStyle" ng-mouseover="cursorStyle={cursor: \'pointer\'}">',
                replace: true,
                link: function(scope, element, attrs) {
                    scope.captchaUrlRandom = scope.captchaUrl = attrs['url'];
                    scope.change = function() {
                        scope.captchaUrlRandom = scope.captchaUrl + '?' + Math.random();
                    };
                }
            };
        })

        .directive('hoverDropdownMenu', function() {
            return function(scope, element, attrs) {
                element.dropdown({
                    on: 'hover'
                });
            };
        })

        .directive('uiTinymce', ['$window', function($window) {
            return function(scope, element, attrs) {
                element.tinymce({
                    menubar: false,
                    statusbar: false,
                    forced_root_block: 'div',
                    plugins: [
                        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                        "searchreplace wordcount visualblocks visualchars code fullscreen",
                        "insertdatetime media nonbreaking save table contextmenu directionality",
                        "emoticons template paste textcolor"
                    ],
                    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor",
                    height: 400,
                    file_browser_callback: function(field_name, url, type, win) {
                        var file = angular.element('<input type="file" />');
                        file.change(function() {
                            $window.html5SendFile(
                                file[0],
                                attrs['submitImageUrl'],
                                function(responseText) {
                                    $window.parseJSend(
                                        responseText,
                                        {
                                            success: function(data) {
                                                win.document.getElementById(field_name).value = data['url'];
                                            },
                                            error: function(message) {
                                                alert(message);
                                            }
                                        }
                                    );
                                },
                                false
                            );
                        });
                        file.click();
                    }
                });
            };
        }]);

})(window, window.angular);