var tablet = 750;
var desktop = 970;
var large = 1170;

$(document).ready( function(){

	$('.entry_btn_link').on('click', function (event) {
		event.preventDefault();

		var username = $('#username').val();
		var password = $('#password').val();

		console.log(username);
		console.log(password);
	});

});


// This sets the height of the element as a percentage of the element's width
function setImageHeight (heightPercentage, element) {

		var containerWidth = element.css('width');
		var containerHeight = parseInt(containerWidth) * heightPercentage;

		return containerHeight;
}