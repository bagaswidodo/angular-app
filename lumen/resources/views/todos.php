<!DOCTYPE html>
<html ng-app>
<head>
	<title></title>
	<script type="text/javascript" src="vendor/angular/1.3.15/angular.min.js"></script>
	<script type="text/javascript" src="js/todos.js"></script>
</head>
<body ng-controller="TodosController">

<h1>Todos</h1>

<ul>
	<li ng-repeat="todo in todos">
		{{ todo.body}}

	</li>
</ul>




</body>
</html>