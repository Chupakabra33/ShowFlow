//Displaying events from database using AngularJS
let app = angular.module('eventsApp', []);
app.controller('eventsCtrl', function($scope, $http) {
	$http.get('./includes/events.inc.php').then(function(response) {
		$scope.events = response.data.events_data;
	});
});