<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>The Amazing PHP - AngularJS Single-page Application with Lumen CRUD Services</title>
	<!-- Load Bootstrap CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top:100px">
	<div ng-app="myApp" ng-controller="usersCtrl">

		<button class="btn btn-default" ng-click="toggle('add',0)">New Cafe</button><br /><br />

		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<td>No</td>
					<td>Nama</td>
					<td>Alamat</td>
					<td>Aksi</td>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="cafe in cafes">
					<td>{{ $index+1 }}</td>
					<td>{{ cafe.name }} </td>
					<td>{{ cafe.address }} </td>
					<td>
						<button class="btn btn-warning" ng-click="toggle('edit',cafe.id)">Ubah </button>
						<button class="btn btn-danger" ng-click="confirmDelete(cafe.id)">Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
		<!-- end serve data -->

		<!-- modal view -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">{{state}}</h4>
				  </div>
				  <div class="modal-body">
				  		<form class="form-horizontal">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
								  <input type="text" class="form-control" id="name" 
								  	placeholder="Cafe Naem . . " value="{{name}}" ng-model="formData.name">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Address</label>
								<div class="col-sm-9">
								  <textarea ng-model="formData.address" class="form-control">
								  	{{address}}
								  </textarea>
								</div>
							</div>
						</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate,user_id)">Save changes</button>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
<script src="vendor/angular/angular.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- AngularJS Application Script Part -->
<script type="text/javascript">
	function showModal(){
				console.log('modal');
	}

	var app = angular.module('myApp', []);
	app.controller('usersCtrl', function($scope, $http) {
		$http.get("/api/cafe")
		.success(function(response) {
			$scope.cafes = response;
		});

		// toggle
		$scope.toggle = function(modalstate,id) {
			$scope.modalstate = modalstate;
			switch(modalstate){
				case 'add':
								$scope.state = "New Cafe";
								$scope.user_id = 0; //auth::user 
								$scope.name = '';
								$scope.address = '';
								break;
				case 'edit':
								$scope.state = "User Detail";
								$scope.user_id = id;
								$http.get("/api/cafe/" + id)
								.success(function(response) {
									console.log(response);
									$scope.formData = response;
								});
								break;
				default: break;
			}
			
			//console.log(id);
			$('#myModal').modal('show');
		}

		/* The -C- and -U- part */
		$scope.save = function(modalstate,user_id){
			switch(modalstate){
				case 'add': var url = "/api/cafe"; break;
				case 'edit': var url = "/api/cafe/"+user_id; break; //belum di bikin :v
				default: break;
			}
			$http({
				method  : 'POST',
				url     : url,
				data    : $.param($scope.formData),  // pass in data as strings
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			}).
			success(function(response){
				location.reload();
			}).
			error(function(response){
				console.log(response);
				alert('Incomplete Form');
			});
		}
		/* End of the -C- and -U- part */

		/* The -D- Part */
		$scope.confirmDelete = function(id){
			var isOkDelete = confirm('Is it ok to delete this ' + id +'?');
			if(isOkDelete)
			{
				$http.delete('/api/cafe/' + id )
				.success(function(data){
						location.reload();
				})
				.error(function(data){
					console.log(data);
					alert('failed');
				});
			}
			else
			{
				return false;
			}
		}
		/* End of the -D- Part */


	});


	
</script>
<!-- end angular part -->

</body>
</html>