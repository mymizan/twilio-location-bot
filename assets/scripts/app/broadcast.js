var page = {

	init: function() {
		$('#broadcast .get-location').click(function(e){
			e.preventDefault();
			$('.progress').show();
			$('#broadcast .get-location').hide();
			page.getCurrentLocation();
		});

		$('.send-location').click(function(){
			page.confirmSend();

		});
	},

	getCurrentLocation: function() {
		if (navigator.geolocation) {
        	navigator.geolocation.getCurrentPosition(page.showLocation);
	    } else {
	       alert("Geolocation is not supported by this browser.");
	    }
	},

	showLocation: function(position) {
		$('.progress').hide();
		var latlon = position.coords.latitude + "," + position.coords.longitude;
	    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=400x300&sensor=false";
	    $('#map').html("<img src='"+img_url+"'>");
	    $('#broadcast textarea').val('Map:' + window.location.href.replace('broadcast','maps') + '?l=' + latlon);
	    $('#broadcast .send-location').show();
	}, 

	confirmSend: function() {
		$.post('broadcast',{msg: $('#broadcast textarea').val()}).done(function(){
    		alert('Sent!');
    	}).error(function(){
    		alert('Error. Can not send message.');
    	});
		window.location.href = window.location.href;
	}
};

