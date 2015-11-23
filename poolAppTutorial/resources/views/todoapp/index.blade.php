<head>
		<!--Angulare -->
		<script src="vendor/angular/angular.min.js"></script>
		<!--Applicazione -->
		<script src="js/todoapp.js"></script>
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container" ng-app="todoApp" ng-controller="todoController">
		<h1>Todo app view</h1>
		<div class="row">
			<div class="col-md-4">
				<input type="text" ng-model="todo.title">
				<button class="btn btn-primary btn-md" ng-click="addTodo()">Add</button>
				<i ng-show="loading" class="fa fa-spinner">Loading</i>
			</div>
		</div>

		<hr />

		<div class="row">
			<div class="col-md-4">
				<table class="table table-striped">
					<tr ng-repeat="todo in todos">
						<td>
							<input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="todo.isDone" ng-change="updateTodo(todo)">
						</td>
						<td>
							<% todo.title %>
						</td>
						<td>
							<button class="btn btn-danger btn-xs" ng-click="deleteTodo($index)"><span class="glyphicon glyphicon-trash"></span> </button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

</body>