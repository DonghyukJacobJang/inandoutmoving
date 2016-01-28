// The following example creates a marker in centerpoint, Sweden
// using a DROP animation. Clicking on the marker will toggle
// the animation between a BOUNCE animation and no animation.

var centerpoint = new google.maps.LatLng(43.64515,-79.409545);
var target = new google.maps.LatLng(43.644905,-79.409569);
var marker;
var map;

function initialize() {
  var mapOptions = {
	zoom: 17,
	center: centerpoint
  };

  map = new google.maps.Map(document.getElementById('map-canvas-end'),
		  mapOptions);
  marker = new google.maps.Marker({
	map:map,
	draggable:true,
	animation: google.maps.Animation.DROP,
	position: target
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() != null) {
	marker.setAnimation(null);
  } else {
	marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

google.maps.event.addDomListener(window, 'load', initialize);
