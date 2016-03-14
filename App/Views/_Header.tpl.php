<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-Frame-Options" content="deny">
		<base href="<?php $this->eprint($this->ROOT_URL); ?>" />
		<title><?php $this->eprint($this->title); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Location Bot" />
		<meta name="author" content="phreeze builder | phreeze.com" />

		<!-- Le styles -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/styles/style.css" rel="stylesheet" />
		<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="bootstrap/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="assets/bootstrap/css/datepicker.css" rel="stylesheet" />
		<link href="assets/bootstrap/css/timepicker.css" rel="stylesheet" />
		<link href="assets/bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72-precomposed.png" />
		<link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-57-precomposed.png" />

		<script type="text/javascript" src="assets/scripts/libs/LAB.min.js"></script>
		<script type="text/javascript">
			$LAB.script("//code.jquery.com/jquery-1.8.2.min.js").wait()
				.script("assets/bootstrap/js/bootstrap.min.js")
				.script("assets/bootstrap/js/bootstrap-datepicker.js")
				.script("assets/bootstrap/js/bootstrap-timepicker.js")
				.script("assets/bootstrap/js/bootstrap-combobox.js")
				.script("assets/scripts/libs/underscore-min.js").wait()
				.script("assets/scripts/libs/underscore.date.min.js")
				.script("assets/scripts/libs/backbone-min.js")
				.script("assets/scripts/app.js")
				.script("assets/scripts/model.js").wait()
				.script("assets/scripts/view.js").wait()
		</script>

	</head>

	<body>

			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="./">Location Bot</a>
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li <?php if ($this->nav=='numbers') { echo 'class="active"'; } ?>><a href="./numbers">Numbers</a></li>
								<li <?php if ($this->nav=='responses') { echo 'class="active"'; } ?>><a href="./responses">Response</a></li>
								<li <?php if ($this->nav=='logs') { echo 'class="active"'; } ?>><a href="./logs">Logs</a></li>
								</ul>
								</li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>