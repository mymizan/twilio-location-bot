<?php
	$this->assign('title','Location Bot | Broadcast');
	$this->assign('nav','logs');

	$this->display('_Header.tpl.php');
?>

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

<div class="container">
<div class='row'>
	<div class='span6'>
		<form id='broadcast'>
		  <fieldset>
		    <legend>Send Broadcast</legend>
		    <label>Add a Text Message with Location Information</label>
		    <textarea rows="10" style='width:96%;'></textarea>
		    <br />
		    <button type="button" class="btn btn-primary get-location">Get Location</button>
		    <button type="button" class="btn btn-warning send-location" style='display: none;'>Send</button>
		  </fieldset>
		</form>
		<div class="progress progress-striped active" style='display: none;width:200px;'>
			  <div class="bar" style="width: 50%;"></div> 
		</div> 
	</div>
	<div class='span6'>
		 <legend>Map</legend>
		 <div id='map'>
		 </div>
	</div>
</div>
</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
