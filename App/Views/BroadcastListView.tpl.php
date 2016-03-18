<?php
	$this->assign('title','Location Bot | Broadcast');
	$this->assign('nav','broadcast');

	$this->display('_Header.tpl.php');
?>
<style>
html, body {
        height: 100%;
        margin: 0;
        padding: 0;
}
</style>
<script type="text/javascript">
	$LAB.script("assets/scripts/app/broadcast.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>
<div id='googleMaps'>
</div>
<div class="container">
<div class='row'>
	<div class='span6'>
		<form id='broadcast'>
		  <fieldset>
		    <legend>Send Broadcast</legend>
		    <label>Add a Text Message with Location Information</label>
		    <textarea rows="5" style='width:96%;'></textarea>
		    <br />
		    <button type="button" class="btn btn-primary get-location">Get Location</button>
		    <button type="button" class="btn btn-warning send-location" style='display: none;'>Send</button>
		  </fieldset>
		  <div class="progress progress-striped active" style='display: none;width:200px;'>
			  <div class="bar" style="width: 10%;"></div> 
		</div>
		</form> 
	</div>
</div>
</div> <!-- /container -->

<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('googleMaps'), {
          //center: {lat: 22.3475365, lng: 91.8123324},
          center: {lat: 60, lng: 105},
          zoom: 3
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgWjrdDzTDaEtmqS_3QjECTARAFKv3zSY&callback=initMap"
    async defer></script>
<?php
	$this->display('_Footer.tpl.php');
?>
