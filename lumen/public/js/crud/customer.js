var app = angular.module('myApp', ['ngRoute','ui.bootstrap']);
app.factory("services",['$http',function($http){
	var serviceBase = 'api/rest/'
	var obj = {};

	obj.getCustomers = function(){
		return $http.get(serviceBase + 'customers');
	}

	obj.getCustomer = function(customerID){
		return $http.get(serviceBase + 'customer?id=' + customerID);
	}

	obj.insertCustomer = function (customer) {
      return $http.post(serviceBase + 'insertCustomer', customer).then(function (results) {
          return results;
      });
	};

	obj.updateCustomer = function (id,customer) {
	    return $http.post(serviceBase + 'updateCustomer', {id:id, customer:customer}).then(function (status) {
	        return status.data;
	    });
	};

	obj.deleteCustomer = function (id) {
	    return $http.delete(serviceBase + 'deleteCustomer?id=' + id).then(function (status) {
	        return status.data;
	    });
	};

	return obj;
}]);

app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});


app.controller('listCtrl', function ($scope, $timeout, services) {
    services.getCustomers().then(function(data){
        $scope.customers = data.data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.customers.length; //Initially for no filter  
        $scope.totalItems = $scope.customers.length;
    });

    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
});
