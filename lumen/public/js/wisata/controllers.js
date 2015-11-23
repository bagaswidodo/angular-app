'use strict';

/* Controllers */

var wisataControllers = angular.module('wisataControllers',[]);

wisataControllers.controller('AppCtrl',['$scope', 'Log','Logout','Wisata',

    function AppCtrl($scope, Log, Logout, Wisata){
        // Variables
        $scope.isLogged = false;
        $scope.data = {};
        $scope.page = 1;
        $scope.previous = false;
        $scope.next = false;

        /* Initial log */
        Log.get({},
            function success(response) {
                $scope.isLogged = response.auth;
            },
            function error(errorResponse) {
                console.log("Error:" + JSON.stringify(errorResponse));
            }
        );

          /* Pagination */
        $scope.paginate = function (direction) {
            if (direction === 'previous')
                --$scope.page;
            else if (direction === 'next')
                ++$scope.page;
            Wisata.get({page: $scope.page},
                function success(response) {
                    console.log(response.data);
                    $scope.data = response.data;
                    $scope.previous = response.prev_page_url;
                    $scope.next = response.next_page_url;
                },
                function error(errorResponse) {
                    console.log("Error:" + JSON.stringify(errorResponse));
                }
            );
        };

        /* Initial page */
        $scope.paginate();

         /* Logout */
        $scope.logout = function () {
            Logout.get({},
                function success() {
                    $scope.isLogged = false;
                    $.each($scope.data, function(key) {
                        $scope.data[key].is_owner = false;
                    });
                },
                function error(errorResponse) {
                    console.log("Error:" + JSON.stringify(errorResponse));
                }
            );
        };

    }]);

wisataControllers.controller('LoginCtrl', ['$scope', 'Login',
    function LoginCtrl($scope, Login) {
        $scope.isAlert = false;

        /* Login */
        $scope.submit = function () {
            $scope.errorEmail = null;
            $scope.errorPassword = null;
            $scope.isAlert = false;
            Login.save({}, $scope.formData,
                function success(response) {
                    if (response.result === 'success') {
                        $scope.$parent.isLogged = true;
                        $scope.$parent.paginate();
                        window.location = '#page-top';
                    } else {
                       
                        $scope.isAlert = true;
                    }
                },
                function error(errorResponse) {

                    if (errorResponse.data.password) {
                        $scope.errorPassword = errorResponse.data.password[0];
                    }
                    if (errorResponse.data.email) {
                        $scope.errorEmail = errorResponse.data.email[0];
                    }
                }
            );
        };

    }]);

wisataControllers.controller('WisataCtrl', ['$scope', 'Wisata', 
    function WisataCtrl($scope, Wisata) {
    /* Create Wisata */
    $scope.submitCreate = function () {
        $scope.errorCreateContent = null;
        Wisata.save({}, $scope.formData,
            function success(response) {
                $scope.formData.name = null;
                $scope.$parent.page = 1;
                $scope.$parent.data = response.data;
                $scope.$parent.previous = response.prev_page_url;
                $scope.$parent.next = response.next_page_url;
                window.location = '#dreams';
            },
            function error(errorResponse) {
                $scope.errorCreateContent = errorResponse.data.content[0];
            }
        );
    };

}]);