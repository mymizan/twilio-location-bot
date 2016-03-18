<?php
	$this->assign('title','Location Bot | Broadcast');
	$this->assign('nav','logs');

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
<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('googleMaps'), {
          //center: {lat: 22.3475365, lng: 91.8123324},
          center: {lat: <?php echo $_POST['lat']; ?>, lng: <?php echo $_POST['lng']; ?>},
          zoom: 16
        });

        var marker = new google.maps.Marker({
		    position: {lat: <?php echo $_POST['lat']; ?>, lng: <?php echo $_POST['lng']; ?>},
		    animation: google.maps.Animation.DROP,
		    draggable: false,
		    map: map,
		    title: "User's Current Locatin"
		});
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgWjrdDzTDaEtmqS_3QjECTARAFKv3zSY&callback=initMap"
    async defer></script>
<?php
	$this->display('_Footer.tpl.php');
?>
