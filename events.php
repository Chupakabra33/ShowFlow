<?php
	require "./header.php";
?>

<main id="mainEvents" ng-app="eventsApp" ng-controller="eventsCtrl">
	<span class="page-name">events.php</span>
	<div ng-repeat="x in events" class="event-box">
		<div class="events img-box">
			<img class="events" src="{{x.eventImgSrc}}" alt="{{x.eventImgName}}"/>
		</div>
		<div class="events event-info">
			<h2 class="events">{{x.eventName}}</h2>
			<p class="events event-time">{{x.eventTime}}</p>
			<p class="events event-place">{{x.eventPlace}}</p>
		</div>
	</div>

</main>

<?php
	require "./footer.php";
?>