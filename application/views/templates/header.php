<html>
	<head>
		<title>kegoblokan</title>
		<link href="<?= base_url($res); ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?= base_url($res); ?>js/jquery.min.js"></script>
		<!-- Custom Theme files -->
		<!--menu-->
		<script src="<?= base_url($res); ?>js/scripts.js"></script>
		<link href="<?= base_url($res); ?>css/styles.css" rel="stylesheet">
		<!--//menu-->
		<!--theme-style-->
		<link href="<?= base_url($res); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	
		<script src="http://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
		</head>
	<body>
		<nav class ="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">Heyah</a>
				</div>
				<div id="navbar">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url(); ?>posts">Post</a></li>
						<li><a href="<?php echo base_url(); ?>posts/create">Create</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
