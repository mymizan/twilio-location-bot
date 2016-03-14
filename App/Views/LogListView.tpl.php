<?php
	$this->assign('title','Location Bot | Logs');
	$this->assign('nav','logs');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("assets/scripts/app/logs.js").wait(function(){
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

<h1>
	<i class="icon-th-list"></i> Logs
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="logCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EventName">Event Name<% if (page.orderBy == 'EventName') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EventDescription">Event Description<% if (page.orderBy == 'EventDescription') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_EventDate">Event Date<% if (page.orderBy == 'EventDate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('eventName') || '') %></td>
				<td><%= _.escape(item.get('eventDescription') || '') %></td>
				<td><%if (item.get('eventDate')) { %><%= _date(app.parseDate(item.get('eventDate'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="logModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="eventNameInputContainer" class="control-group">
					<label class="control-label" for="eventName">Event Name</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="eventName" placeholder="Event Name" value="<%= _.escape(item.get('eventName') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="eventDescriptionInputContainer" class="control-group">
					<label class="control-label" for="eventDescription">Event Description</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="eventDescription" placeholder="Event Description" value="<%= _.escape(item.get('eventDescription') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="eventDateInputContainer" class="control-group">
					<label class="control-label" for="eventDate">Event Date</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="eventDate" type="text" value="<%= _date(app.parseDate(item.get('eventDate'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="eventDate-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('eventDate'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteLogButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteLogButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Log</button>
						<span id="confirmDeleteLogContainer" class="hide">
							<button id="cancelDeleteLogButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteLogButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="logDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Log
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="logModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveLogButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="logCollectionContainer" class="collectionContainer">
	</div>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
