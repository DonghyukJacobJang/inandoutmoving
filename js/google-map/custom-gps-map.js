var map;
var directionsDisplay;
var directionsService;
var stepDisplay;
var markerArray = [];
// Create a map and center it on centerpoint.
var centerpoint = new google.maps.LatLng(43.64515,-79.409545);
var target = new google.maps.LatLng(43.644905,-79.409569);

function initialize() {
  // Instantiate a directions service.
  directionsService = new google.maps.DirectionsService();
  
  var mapOptions = {
	zoom: 18,
	center: centerpoint
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  
  marker = new google.maps.Marker({
	map:map,
	draggable:true,
	animation: google.maps.Animation.DROP,
	position: target
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
  // Create a renderer for directions and bind it to the map.
  var rendererOptions = {
	map: map
  }
  directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions)

  // Instantiate an info window to hold step text.
  stepDisplay = new google.maps.InfoWindow();
}

function toggleBounce() {
  if (marker.getAnimation() != null) {
	marker.setAnimation(null);
  } else {
	marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

function calcRoute() {

  // First, remove any existing markers from the map.
  for (var i = 0; i < markerArray.length; i++) {
	markerArray[i].setMap(null);
  }

  // Now, clear the array itself.
  markerArray = [];

  // Retrieve the start and end locations and create
  // a DirectionsRequest using DRIVING directions.
  var start = document.getElementById('p_address').value + ',' + document.getElementById('p_city').value;
  var end = document.getElementById('d_address').value + ',' + document.getElementById('d_city').value;
  var request = {
	  origin: start,
	  destination: end,
	  travelMode: google.maps.TravelMode.DRIVING
  };

  // Route the directions and pass the response to a
  // function to create markers for each step.
  directionsService.route(request, function(response, status) {
	if (status == google.maps.DirectionsStatus.OK) {
	  var warnings = document.getElementById('warnings_panel');
	  warnings.innerHTML = '<b>' + response.routes[0].warnings + '</b>';
	  directionsDisplay.setDirections(response);
	  showSteps(response);
	}
  });
}

function showSteps(directionResult) {
  // For each step, place a marker, and add the text to the marker's
  // info window. Also attach the marker to an array so we
  // can keep track of it and remove it when calculating new
  // routes.
  var myRoute = directionResult.routes[0].legs[0];

  for (var i = 0; i < myRoute.steps.length; i++) {
	var marker = new google.maps.Marker({
	  position: myRoute.steps[i].start_location,
	  map: map
	});
	attachInstructionText(marker, myRoute.steps[i].instructions);
	markerArray[i] = marker;
  }
}

function attachInstructionText(marker, text) {
  google.maps.event.addListener(marker, 'click', function() {
	// Open an info window when the marker is clicked on,
	// containing the text of the step.
	stepDisplay.setContent(text);
	stepDisplay.open(map, marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);