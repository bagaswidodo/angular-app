<head>
		<!--Angulare -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.js"></script>
		<!--Applicazione -->
		<script src="js/app.js"></script>
		<script src="js/controller/PoolController.js"></script>
		<script src="js/service/poolService.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	</head>
	<body ng-app="poolApp">
	<div class ="container" ng-controller="poolController">
		<div class="row">
			<div class="col-md-3" ng-repeat="pool in pools">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>{{pool.title}}</h3></div>
					<div class="panel-body"><table class="table table-striped">
						<tr ng-repeat='option in pool.pooloptions'>
							<td>{{ option.title }}</td>
							<td><button class="btn btn-primary" type="button" ng-click="addVote(option)">
								Vote <span class="badge">{{ option.vote }}</span>
							</button></td>
						</tr>
					</table></div>
				</div>
			</div>
		</div>
	</div>
</body>
 <script type="text/javascript">
<body ng-app="poolApp">
	<div class ="container" ng-controller="poolController">
		<div class="row">
			<div class="col-md-3" ng-repeat="pool in pools">
				<div class="panel panel-default">
					<div class="panel-heading"><h3>{{pool.title}}</h3></div>
					<div class="panel-body"><table class="table table-striped">
						<tr ng-repeat='option in pool.pooloptions'>
							<td>{{ option.title }}</td>
							<td><button class="btn btn-primary" type="button" ng-click="addVote(option)">
								Vote <span class="badge">{{ option.vote }}</span>
							</button></td>
						</tr>
					</table></div>
				</div>
			</div>
		</div>
	</div>
</body>
 
 </script>