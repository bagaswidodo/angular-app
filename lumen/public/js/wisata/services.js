'use strict';

// //service
var wisataServices = angular.module('wisataServices',['ngResource']);

wisataServices.factory('Log', ['$resource',
    function ($resource) {
        return $resource("auth/log", {}, {
            get: {method: 'GET'}
        });
    }]);

wisataServices.factory('Login', ['$resource',
    function ($resource) {
        return $resource("auth/login", {}, {
            save: {method: 'POST'}
        });
    }]);

wisataServices.factory('Logout', ['$resource',
    function ($resource) {
        return $resource("auth/logout", {}, {
            get: {method: 'GET'}
        });
    }]);

wisataServices.factory('Wisata', ['$resource',
    function ($resource) {
        return $resource("wisata/:id", {page: '@page'}, {
            get: {method: 'GET'},
            save: {method: 'POST'},
            delete: {method: 'DELETE'},
            update: {method: 'PUT'}
        });
    }]);