<?php
	$this->assign('title','Location Bot | Responses');
	$this->assign('nav','responses');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("assets/scripts/app/responses.js").wait(function(){
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
	<i class="icon-th-list"></i> Response
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="responseCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_From">From<% if (page.orderBy == 'From') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Responsetext">Response Text<% if (page.orderBy == 'Responsetext') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('from') || '') %></td>
				<td><%= _.escape(item.get('responsetext') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="responseModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fromInputContainer" class="control-group">
					<label class="control-label" for="from">From</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="from" placeholder="From" value="<%= _.escape(item.get('from') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="responsetextInputContainer" class="control-group">
					<label class="control-label" for="responsetext">Responsetext</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="responsetext" placeholder="Responsetext" value="<%= _.escape(item.get('responsetext') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteResponseButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteResponseButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Response</button>
						<span id="confirmDeleteResponseContainer" class="hide">
							<button id="cancelDeleteResponseButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteResponseButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="responseDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Response
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="responseModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveResponseButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="responseCollectionContainer" class="collectionContainer">
	</div>
</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
