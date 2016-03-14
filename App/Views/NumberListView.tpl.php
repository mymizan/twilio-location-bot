<?php
	$this->assign('title','Location Bot | Numbers');
	$this->assign('nav','numbers');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("assets/scripts/app/numbers.js").wait(function(){
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
	<i class="icon-th-list"></i> Numbers
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="numberCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Number">Number<% if (page.orderBy == 'Number') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Enabled">Enabled<% if (page.orderBy == 'Enabled') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('number') || '') %></td>
				<td><%= _.escape(item.get('enabled') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="numberModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="numberInputContainer" class="control-group">
					<label class="control-label" for="number">Number</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="number" placeholder="Number" value="<%= _.escape(item.get('number') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="enabledInputContainer" class="control-group">
					<label class="control-label" for="enabled">Enabled</label>
					<div class="controls inline-inputs">
						<select id="enabled" name="enabled">
							<option value=""></option>
							<option value="Enabled"<% if (item.get('enabled')=='Enabled') { %> selected="selected"<% } %>>Enabled</option>
							<option value="Disabled"<% if (item.get('enabled')=='Disabled') { %> selected="selected"<% } %>>Disabled</option>
						</select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteNumberButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteNumberButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Number</button>
						<span id="confirmDeleteNumberContainer" class="hide">
							<button id="cancelDeleteNumberButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteNumberButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="numberDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Number
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="numberModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveNumberButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="numberCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newNumberButton" class="btn btn-primary">Add Number</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
