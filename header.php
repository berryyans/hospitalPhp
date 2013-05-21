<!DOCTYPE html>
<html>
	<head>
		
		<!--meta-->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="format-detection" content="telephone=no" />
		<meta name="keywords" content="Medic, Medical Center" />
		<meta name="description" content="Responsive Medical Health Template" />
		<!--style-->
		<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Volkhov:400italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="style/reset.css" />
		<link rel="stylesheet" type="text/css" href="style/superfish.css" />
		<link rel="stylesheet" type="text/css" href="style/fancybox/jquery.fancybox.css" />
		<link rel="stylesheet" type="text/css" href="style/jquery.qtip.css" />
		<link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.custom.css" />
		<link rel="stylesheet" type="text/css" href="style/style.css" />
		<link rel="stylesheet" type="text/css" href="style/responsive.css" />
		<link rel="shortcut icon" href="images/favicon.ico" />
		<!--js-->
		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.carouFredSel-5.6.4-packed.js"></script>
		<script type="text/javascript" src="js/jquery.sliderControl.js"></script>
		<script type="text/javascript" src="js/jquery.linkify.js"></script>
		<script type="text/javascript" src="js/jquery.timeago.js"></script>
		<script type="text/javascript" src="js/jquery.hint.js"></script>
		<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
		<script type="text/javascript" src="js/jquery.isotope.masonry.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="js/jquery.blockUI.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</head>
	<body>
		<div class="site_container<?php echo ($_COOKIE['mc_layout']=="boxed" ? ' boxed' : ''); ?>">
			<div class="header_container">
				<div class="header clearfix">
					<div class="header_left">
						<a href="?page=home" title="HLC">
							<img src="images/logo.png" alt="logo" width="140px"/>
							<!--span class="logo">medicenter</span-->
						</a>
					</div>
					<?php
					require_once('menu.php');
					?>
				</div>
			</div>
