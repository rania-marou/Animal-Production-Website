<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/mobilestyle.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ανακοινώσεις</title>
		<link rel="stylesheet" href="css/ap_theme_2.min.css" />
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.1.1.min.css" />
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery.mobile-1.1.1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline" data-add-back-btn="true">
				<a href="index.php" data-role="button" data-icon="back">Πίσω</a>
				<h1>Ανακοινώσεις</h1>
				<a href="index.php" data-role="button" data-iconpos="notext" data-icon="home"></a>
			</div>
			<div data-role="content">	
				<?php include('header.php');?>
				<ul data-role="listview" data-inset="true" data-filter="false">
					<li><a href="dep_announces.php">Τμήματος</a></li>
					<li><a href="select_teacher.php">Εκπαιδευτικών</a></li>
				</ul>
				<?php include('footer.php');?>
			</div>
		</div>
	</body>
</html>
