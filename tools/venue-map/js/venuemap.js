// GLOBAL VARIABLES
var map = null;
var circle = null;
var geocoder = new google.maps.Geocoder();
var gmarkers = [];
var list = "";


// DEFINES PIN IMAGES AND COLORS FOR MARKERS
var pinColor = "00aeff";
var pinImage = new google.maps.MarkerImage("https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
new google.maps.Size(21, 34),
new google.maps.Point(0,0),
new google.maps.Point(10, 34));
var pinColorVenue = "FE7569";
var pinImageVenue = new google.maps.MarkerImage("https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColorVenue,
new google.maps.Size(21, 34),
new google.maps.Point(0,0),
new google.maps.Point(10, 34));


// CREATE MARKERS AND SET UP THE EVENT WINDOW FUNCTION 
function createMarker(latlng, name, html) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        title: name,
		icon: pinImageVenue,
        zIndex: Math.round(latlng.lat()*-100000)<<5
	});
    google.maps.event.addListener(marker, 'click', function() {
		infowindow.setContent(contentString);
		infowindow.open(map,marker);
	});
    gmarkers.push(marker);
}


// PICKS UP THE CLICK AND OPENS THE CORRESPONDING DETAILS WINDOW
function myclick(i) {google.maps.event.trigger(gmarkers[i], "click");}


// CREATE THE MAP
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {
			lat: 51.7513857,
			lng: -0.9365835
		},
		zoom: 8,
		mapTypeControl: true,
		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		navigationControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	google.maps.event.addListener(map, 'click', function() {
		infowindow.close();
	});
}


// READ THE DATA FROM MARKERS.XML
function initMarkers() {
	var request = new XMLHttpRequest();
	request.open("GET", "https://www.simplywed.co.uk/tools/venue-map/markers.xml", false);
	request.send();
	var xml = request.responseXML;
	var markers = xml.getElementsByTagName("marker");
	for(var i = 0; i < markers.length; i++) {
		
		
		// OBTAIN THE XML ATTRIBUTES OF EACH MARKER
		var lat = parseFloat(markers[i].getAttribute("lat"));
		var lng = parseFloat(markers[i].getAttribute("lng"));
		var point = new google.maps.LatLng(lat,lng);
		var county = markers[i].getAttribute("county");
		var venue = markers[i].getAttribute("venue");
		var url = markers[i].getAttribute("url");
		var html="<p><b>"+venue+" &#8211; "+county+"</b></p><p><a href='"+url+"' target='_blank'>"+url+"</a></p><a href=\"javascript:void(0)\" onclick=\"calcDistance("+lat+", "+lng+");\">Get Distance / Drive Time</a><div id=\"outputDiv\"></div>";
		
		
		// CREATE A MARKER PER A VENUE
		var marker = createMarker(point,county+" &#8211; "+venue,html);
		
		
	}
}


// USE MAP SEARCH FUNCTION
function codeAddress() {
	
	
	// CONVERT RADIUS FROM MILES TO KILOMETRES
	var radiusmiles = document.getElementById('radiusmiles').value;
	var radiuskm = radiusmiles * 1.609;
	document.getElementById('radius').value = radiuskm;
	
	
	// USE ADDRESS AND DISTANCE TO CREATE A SEARCH RADIUS
	var address = document.getElementById('address').value;
	var radius = parseInt(document.getElementById('radius').value, 10)*1000;
	geocoder.geocode({'address': address}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			var searchCenter = results[0].geometry.location;
			
			
			// ADD A MARKER AT CENTER OF THE RADIUS
			var marker = new google.maps.Marker({
				map: map,
				position: results[0].geometry.location,
				title: "Current Location",
				icon: pinImage
			});
			
			
			// DRAW RADIUS CIRCLE OVERLAY ON THE MAP
			if (circle) circle.setMap(null);
			circle = new google.maps.Circle({
				center: searchCenter,
				radius: radius,
				fillOpacity: 0.10,
				fillColor: "#FF0000",
				map: map
			});
			
			
			// CALCULATE AND DISPLAY VENUES ONLY WITHIN RADIUS
			var bounds = new google.maps.LatLngBounds();
			var foundMarkers = 0;
			for (var i = 0; i < gmarkers.length;i++) {
				if (google.maps.geometry.spherical.computeDistanceBetween(gmarkers[i].getPosition(),searchCenter) < radius) {
					bounds.extend(gmarkers[i].getPosition())
					gmarkers[i].setMap(map);
					foundMarkers++;
				} else {
					gmarkers[i].setMap(null);
				}
            }
			
			
			// COMPILE LIST OF VALID VENUES
			if (foundMarkers > 0) {
				map.fitBounds(bounds);
			} else {
				map.fitBounds(circle.getBounds());
			}
			makeSidebar();
			
			
		} else {
            
			
			// DISPLAY ERROR MESSAGE
			alert('Geocode was not successful for the following reason: ' + status);
			
			
		}
	});
}


// ASSEMBLES A LIST OF VALID VENUES
function makeSidebar() {
	for (var i=0; i < gmarkers.length; i++){
		if (map.getBounds().contains(gmarkers[i].getPosition())) {
			
			
			// ADD A LINE TO THE LISTED VENUES
			list += '<p><a href="javascript:myclick(' + i + ')">' + gmarkers[i].title + '<\/a></p>';
			
			
		}
	}
	
	
	// PUT THE LISTED VENUES INTO THE LIST SIDE BAR
	document.getElementById("list").innerHTML = list;
	
	
}


// DEFINE VENUE DETAILS WINDOW SIZE
var infowindow = new google.maps.InfoWindow({
	size: new google.maps.Size(150,50)
});


// CALCULATE POINT-TO-POINT DISTANCE IN MILES
function calcDistance(lat, lng) {
	var address = document.getElementById('address').value;
	var bounds = new google.maps.LatLngBounds();
	var markersArray = [];
	var origin1 = address+', UK';
	var destination1 = new google.maps.LatLng(lat, lng);
	var destinationIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=D|FF0000|000000';
	var originIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=O|FFFF00|000000';
	var service = new google.maps.DistanceMatrixService();
	service.getDistanceMatrix( {
		origins: [origin1],
		destinations: [destination1],
		travelMode: google.maps.TravelMode.DRIVING,
		unitSystem: google.maps.UnitSystem.IMPERIAL,
		avoidHighways: false,
		avoidTolls: false
	}, 
	callback);
	function callback(response, status) {
		if (status != google.maps.DistanceMatrixStatus.OK) {
			alert('Error was: ' + status);
		} else {
			var origins = response.originAddresses;
			var destinations = response.destinationAddresses;
			var outputDiv = document.getElementById('outputDiv');
			outputDiv.innerHTML = '';
			for (var i = 0; i < origins.length; i++) {
				var results = response.rows[i].elements;
				for (var j = 0; j < results.length; j++) {
					outputDiv.innerHTML += '<br><b>Distance to Venue = ' + results[j].distance.text + 'les<br><br>Estimated Drive Time = ' + results[j].duration.text + '</b><br>';
				}
			}
		}
	}
}