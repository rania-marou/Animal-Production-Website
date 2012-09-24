<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/mobilestyle.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Σύνδεσμοι</title>
		<link rel="stylesheet" href="css/ap_theme_2.min.css" />
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.1.1.min.css" />
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery.mobile-1.1.1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline" data-add-back-btn="true">
				<a href="index.php" data-role="button" data-icon="back">Πίσω</a>
				<h1>Σύνδεσμοι</h1>
				<a href="index.php" data-role="button" data-iconpos="notext" data-icon="home"></a>
			</div>
			<div data-role="content">	
				<?php include('header.php');?>
				<ul data-role="listview" data-inset="true" data-filter="false">
					
					<li><a style="text-decoration:none;" href="http://www.teilar.gr/">ΤΕΙ Λάρισας</a></li>
					<li><a style="text-decoration:none;" href="https://dionysos.teilar.gr/Menu/steg/zwikis%20paragwgis.html">e-Γραμματεία - Dionysos</a></li>
					<li><a style="text-decoration:none;" href="http://eudoxus.gr/">Εύδοξος</a></li>
					<li><a style="text-decoration:none;" href="http://openclass.teilar.gr/">Πλατφόρμα e-class</a></li>
				</ul>
				<?php include('footer.php');?>
				</div>
		</div>
	</body>
</html>
