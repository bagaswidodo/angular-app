<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="en">
<head>
    <meta charset="utf-8">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	ul>li, a{cursor: pointer;}
    </style>
    <title>Simple Datagrid with search, sort and paging using AngularJS, PHP, MySQL</title>
</head>
<div class="navbar navbar-default" id="navbar">
    <div class="container" id="navbar-container">
    <div class="navbar-header">
        <a href="http://angularcode.com" class="navbar-brand">
            <small>
                <i class="glyphicon glyphicon-log-out"></i>
                AngularCode / AngularJS Demos 
            </small>
        </a><!-- /.brand -->
        
    </div><!-- /.navbar-header -->
    </div>
</div>

<div ng-controller="customersCrtl">
	<div class="container">
		<br/>
		<blockquote><h4><a href="http://angularcode.com/angularjs-datagrid-paging-sorting-filter-using-php-and-mysql/">Simple Datagrid with search, sort and paging using AngularJS + PHP + MySQL</a></h4></blockquote>
		<br/>

		<!-- tools -->
		<div class="row">
	        <div class="col-md-2">PageSize:
	            <select ng-model="entryLimit" class="form-control">
	                <option>5</option>
	                <option>10</option>
	                <option>20</option>
	                <option>50</option>
	                <option>100</option>
	            </select>
	        </div>
	        <div class="col-md-3">Filter:
	            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
	        </div>
	        <div class="col-md-4">
	            <h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
	        </div>
	    </div>
		<!-- end tools -->

		<!-- data -->
		<div class="row">
	        <div class="col-md-12" ng-show="filteredItems > 0">
	            <table class="table table-striped table-bordered">
		            <thead>
			            <th>
			            	Customer Name&nbsp;
			            	<a ng-click="sort_by('customerName');"><i class="glyphicon glyphicon-sort"></i></a>
			            </th>
			            <th>
			            	Address&nbsp;
			            	<a ng-click="sort_by('addressLine1');"><i class="glyphicon glyphicon-sort"></i></a>
			            </th>
			            <th>
			            	City&nbsp;
			            	<a ng-click="sort_by('city');"><i class="glyphicon glyphicon-sort"></i></a>
			            </th>
			            <th>
			            	State&nbsp;
			            	<a ng-click="sort_by('state');"><i class="glyphicon glyphicon-sort"></i></a>
			            </th>
			            <th>
			            	Postal Code&nbsp;
			            	<a ng-click="sort_by('postalCode');"><i class="glyphicon glyphicon-sort"></i></a>
			            </th>
			            <th>
			            	Country&nbsp;
			            	<a ng-click="sort_by('country');"><i class="glyphicon glyphicon-sort"></i></a>
			            </th>
			            <th>
			            	Credit Limit&nbsp;
			            	<a ng-click="sort_by('creditLimit');"><i class="glyphicon glyphicon-sort"></i></a>
			            </th>
		            </thead>
		            <tbody>
		                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
		                    <td>{{data.customerName}}</td>
		                    <td>{{data.addressLine1}}</td>
		                    <td>{{data.city}}</td>
		                    <td>{{data.state}}</td>
		                    <td>{{data.postalCode}}</td>
		                    <td>{{data.country}}</td>
		                    <td>{{data.creditLimit}}</td>
		                </tr>
		            </tbody>
	            </table>

	            <!-- if empty -->
	            <div class="col-md-12" ng-show="filteredItems == 0">
		            <div class="col-md-12">
		                <div class="alert alert-warning"><strong>No Customers Found</strong></div>
		            </div>
		        </div>
	            <!-- pagination -->
	            <div class="col-md-12" ng-show="filteredItems > 0">    
	            	<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>   
	        	</div>
	        </div>
        </div>

		<!-- end data -->
	</div>
</div>
<script src="vendor/angular/angular.min.js"></script>
<script src="vendor/bootstrap/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="app/grid.js"></script>    

</html>