<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/mobilestyle.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Αρχική σελίδα</title>
		<link rel="stylesheet" href="css/ap_theme_2.min.css" />
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.1.1.min.css" />
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery.mobile-1.1.1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline">
				<h1>Αρχική σελίδα</h1>
			</div>
			<div data-role="content">	
				<?php include('header.php');?>
				<ul data-role="listview" data-inset="true" data-filter="false">
					<li><a href="announces.php">Ανακοινώσεις</a></li>
					<li><a href="teachers.php">Εκπαιδευτικοί</a></li>
					<li><a href="telephones.php">Τηλέφωνα</a></li>
					<li><a href="contact.php">Επικοινωνία</a></li>
					<li><a href="links.php">Σύνδεσμοι</a></li>
				</ul>
				<a target="_blank" href="../gr/index.php?nomobile=1" style="text-decoration:none; font-size:12px;">Επισκευθείτε την κανονική έκδοση της σελίδας</a>
				<?php include('footer.php');?>
			</div>
		</div>
	</body>
</html>
