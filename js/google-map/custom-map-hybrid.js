// The following example creates a marker in centerpoint, Sweden
// using a DROP animation. Clicking on the marker will toggle
// the animation between a BOUNCE animation and no animation.

var centerpoint = new google.maps.LatLng(43.644814,-79.410232);
var target = new google.maps.LatLng(43.644905,-79.409569);
var marker;
var map;

function initialize() {
  var mapOptions = {
	zoom: 18,
	mapTypeId: google.maps.MapTypeId.HYBRID,
	center: centerpoint
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),
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
