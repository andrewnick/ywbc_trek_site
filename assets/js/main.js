var map;

$(document).ready( function(){

	initialise();
	initialiseMap();	

	$.ajax({
		type: "GET",
		url: "assets/all_geom_data.json",
	//	data: 'query?geometryType=esriGeometryPoint&spatialRel=esriSpatialRelIntersects&where=1%3D1&returnCountOnly=false&returnIdsOnly=true&returnGeometry=false';
		success: function (feed) {

			$.each(feed.features, function(i, track){

				console.log(track);
				var myLatLng = convertToGoogleLatLng(track);
				addMarker(myLatLng, map, track);

			});

			// var track = feed.features[0];
			// var feature = feed.features[0].geometry.paths[0][1];//.geometry.paths.[0].[0];
			// var xPoint = feature[0];
			// var yPoint = feature[1];

			// console.log(feature, xPoint, yPoint);

			// console.log(spatialRef);




			console.log(feed);
		},
		error: function () {
			console.log('failed result');
		},
		dataType: 'json',
	});


	$('.entry_btn_link').on('click', function (event) {
		event.preventDefault();

		var username = $('#username').val();
		var password = $('#password').val();

		console.log(username);
		console.log(password);
	});



});

// Set up javascript 
function initialise() {
	proj4.defs("EPSG:2193","+proj=tmerc +lat_0=0 +lon_0=173 +k=0.9996 +x_0=1600000 +y_0=10000000 +ellps=GRS80 +towgs84=0,0,0,0,0,0,0 +units=m +no_defs");
}

function convertToGoogleLatLng(track) {

	console.log(track);
	var firstPoint = track.geometry.paths[0][0];
	console.log(firstPoint);

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
}

function addMarker (latLng, map, track) {

	var marker = new google.maps.Marker ({
		position: latLng,
		map:map,
		title: track.attributes.description,
		animation: google.maps.Animation.DROP
	});
}
