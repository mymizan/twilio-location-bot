var page = {

	isInitialized: false,
	isInitializing: false,

	init: function() {

		// ensure initialization only occurs once
		if (page.isInitialized || page.isInitializing) return;
		page.isInitializing = true;

		if (!$.isReady && console) console.warn('page was initialized before dom is ready.  views may not render properly.');

		$('#broadcast .get-location').click(function(e){
			e.preventDefault();
			$('.progress').show();
			$('.progress .bar').animate({width: "+=75%"}, 1000, 'swing');
			$('#broadcast .get-location').hide();
			page.getCurrentLocation();
		});

		$('.send-location').click(function(e){
			e.preventDefault();
			e.stopPropagation();
			page.confirmSend();

		});

		page.isInitialized = true;
		page.isInitializing = false;
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
		initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
		map.setZoom(16);
      	map.setCenter(initialLocation);
      	var marker = new google.maps.Marker({
		    position: {lat:position.coords.latitude, lng:position.coords.longitude},
		    animation: google.maps.Animation.DROP,
		    draggable: true,
		    map: map,
		    title: 'Your Location. Drag to set new location.'
		});
		marker.addListener('drag', page.userChangeLocation);
	    $('#broadcast textarea').val('Map:' + window.location.href.replace('broadcast','maps') + '?l=' + latlon);
	    $('#broadcast .send-location').show();

	}, 

	userChangeLocation: function(position){
		var latlon = position.getPosition().lat() + "," + position.getPosition().lng();
		$('#broadcast textarea').val('Map:' + window.location.href.replace('broadcast','maps') + '?l=' + latlon);
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

