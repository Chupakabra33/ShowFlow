//Displaying events from database using AngularJS
let app = angular.module('eventsApp', []);
app.controller('eventsCtrl', function($scope, $http) {
	let x = window.matchMedia("(max-width: 450px)");
	function responsiveEventImages(x) {
		if (x.matches) {
			$http.get('./includes/events_res.inc.php').then(function(response) {
				$scope.events = response.data.events_data;
			});
		} else {
			$http.get('./includes/events.inc.php').then(function(response) {
				$scope.events = response.data.events_data;
			});
		}
	}

	responsiveEventImages(x); 
	x.addListener(responsiveEventImages);
});