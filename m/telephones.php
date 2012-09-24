<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/mobilestyle.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Τηλέφωνα</title>
		<link rel="stylesheet" href="css/ap_theme_2.min.css" />
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.1.1.min.css" />
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery.mobile-1.1.1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline" data-add-back-btn="true">
				<a href="index.php" data-role="button" data-icon="back">Πίσω</a>
				<h1>Τηλέφωνα</h1>
				<a href="index.php" data-role="button" data-iconpos="notext" data-icon="home"></a>
			</div>
			<div data-role="content" >
				<?php include('header.php');?>
				<table>
					<tbody>
						<tr class="ui-content ui-body-a"><td>Τηλεφωνικό κέντρο του ΤΕΙ</td><td><a href="tel:+302410611061" class="ui-link">(2410) 611061-72</a></td></tr>
						<tr class="ui-content ui-body-a"><td>Προϊσταμένη Γραμματείας Τμήματος</td><td><a href="tel:+302410684292" class="ui-link">(2410) 684292</a></td></tr>
						<tr class="ui-content ui-body-a"><td>Σπουδαστική Εστία</td><td><a href="tel:+302410613312" class="ui-link">(2410) 613312</a></td></tr>
						<tr class="ui-content ui-body-a"><td>Βιβλιοθήκη και Υπηρεσία Πληροφόρησης</td><td>Εσωτερικό : 380-2</td></tr>
						<tr class="ui-content ui-body-a"><td>Γραφείο Διασύνδεσης Εσωτερικό</td><td>218, FAX: (2410) 611995</td></tr>
						<tr class="ui-content ui-body-a"><td>Σπουδαστικό Εστιατόριο</td><td>Εσωτερικό: 207</td></tr>
						<tr class="ui-content ui-body-a"><td>Αθλητικές Δραστηριότητες</td><td>Εσωτερικό: 347</td></tr>
						<tr class="ui-content ui-body-a"><td>Υγειονομική Περίθαλψη</td><td><a href="tel:+302410610981" class="ui-link">(2410) 610981</a></td></tr>
					</tbody>
				</table>
				<?php include('footer.php');?>
			</div>
		</div>
	</body>
</html>
