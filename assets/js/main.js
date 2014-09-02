var map;
//var infowindow;

var markerArr = new Array();


$(document).ready( function(){

	initialise();
	initialiseMap();	

	$.ajax({
		type: "GET",
		url: 'http://geoportal.doc.govt.nz/ArcGIS/rest/services/GeoportalServices/DOC_Tracks/MapServer/0/query?geometryType=esriGeometryPoint&spatialRel=esriSpatialRelIntersects&where=1%3D1&returnCountOnly=false&returnIdsOnly=true&returnGeometry=false&f=pjson',
		success: function (feed) {

			$.each(feed.objectIds, function(i, feature_id) {
				console.log(i, feature_id);
				$.ajax({
					type: "GET",

					url: 'http://geoportal.doc.govt.nz/ArcGIS/rest/services/GeoportalServices/DOC_Tracks/MapServer/0/' + feature_id + "?f=json",

					success: function(track) {
						console.log(track);
						var myLatLng = convertToGoogleLatLng(track.feature);
						addMarker(myLatLng, map, track.feature);
					},

					error: function() {
						console.log('Feature find fail');
					},

					dataType: 'jsonp',
				});

				if(i >= 2) {
					return false;
				}
			});

			// console.log(feed);
		},
		error: function () {
			console.log('failed result');
		},
		dataType: 'jsonp',
	});

	// $('.entry_btn_link').on('click', function (event) {
	// 	event.preventDefault();

	// 	var username = $('#username').val();
	// 	var password = $('#password').val();

	// 	console.log(username);
	// 	console.log(password);
	// });
});

// Set up javascript 
function initialise() {
	proj4.defs("EPSG:2193","+proj=tmerc +lat_0=0 +lon_0=173 +k=0.9996 +x_0=1600000 +y_0=10000000 +ellps=GRS80 +towgs84=0,0,0,0,0,0,0 +units=m +no_defs");
}

function convertToGoogleLatLng(track) {

	console.log('Geom'+ track);
	var firstPoint = track.geometry.paths[0][0];
	// console.log(firstPoint);

	var latLng = proj4('EPSG:2193' ,'WGS84', firstPoint);	
	var myLatLng = new google.maps.LatLng(latLng[1], latLng[0]);

	return myLatLng;
}

function initialiseMap () {

	var mapOptions  = {
		center: new google.maps.LatLng(-36.2, 175.38),
		zoom: 5
	};

	map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);

	// google.maps.event.addListener(marker, 'click', function() {
 //    	infowindow.open(map, this);
 //  	});
}

function addMarker (latLng, map, track) {

	// console.log(track.attributes.DESCRIPTION);

	var marker = new google.maps.Marker ({
		position: latLng,
		map:map,
		animation: google.maps.Animation.DROP
	});

	// var markerDetails = { "marker": marker,
	// 				      "name" : track.attributes.DESCRIPTION,
	// 					  "type": track.attributes.OBJECT_TYPE_DESCRIPTION };

	// markerArr += markerDetails; 

	console.log(markerArr);

	var name = track.attributes.DESCRIPTION;

	// console.log(name);

	var contentString = '<h3>'+name+'<h3>';

	infowindow = new google.maps.InfoWindow({
	      content: contentString
	});

	google.maps.event.addListener(marker, 'click', function() {
		console.log(marker);
    	infowindow.open(map, marker);
  	});
}
