<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/mobilestyle.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Επικοινωνία</title>
		<link rel="stylesheet" href="css/ap_theme_2.min.css" />
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.1.1.min.css" />
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script> 
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery.mobile-1.1.1.min.js"></script>
		<script type="text/javascript" src="js/map.js"></script>
		<script type="text/javascript" src="js/jquery.ui.map.min.js"></script>

		<script type="text/javascript">
			
			$('#basic_map').live('pageinit', function() {
				map.add('basic_map', function() {
					$('#map_canvas').gmap({'center': '39.62502,22.379129', 'zoom': 14, 'disableDefaultUI':true, 'callback': function() {
						var self = this;
						self.addMarker({'position': this.get('map').getCenter() }).click(function() {
							self.openInfoWindow({ 'content': 'Τμήμα Ζωικής Παραγωγής<br />Λάρισα' }, this);
						});
					}}); 
				}).load('basic_map');
			});
			
			$('#basic_map').live('pageshow', function() {
				map.add('basic_map', function() { $('#map_canvas').gmap('refresh'); }).load('basic_map');
			});
		</script>
	</head>
	<body>
		<div data-role="page" data-theme="a" id="basic_map">
			<div data-role="header" data-position="inline" data-add-back-btn="true">
				<a href="index.php" data-role="button" data-icon="back">Πίσω</a>
				<h1>Επικοινωνία</h1>
				<a href="index.php" data-role="button" data-iconpos="notext" data-icon="home"></a>
			</div>
			<div data-role="content">	
				<?php include('header.php');?>
				<div class="ui-bar-c ui-corner-all ui-shadow" style="padding:1em;">
					<div id="map_canvas" style="height:350px;"></div>
				</div>
				<p style="text-align:center; margin-top: 25px;">
					<b><u>Στοιχεία Επικοινωνίας Τμήματος:</u></b> <br /><br />		
					Προϊσταμένη Τμήματος: <br /> Αναστασία Καμπαμανώλη - Δήμου <br /> Tηλ.: 2410 684384 <br /> <br/ >	
					Προϊστάμενος Γραμματείας: <br /> Γ. Χαλκιάς <br /> Tηλ.: 2410 684292 <br />	<br />
					Email: <a href="mailto:secry-animal@teilar.gr">secry-animal@teilar.gr</a> <br />	<br /> <br />
					<b><u>Στοιχεία Επικοινωνίας Μητρώου Σπουδαστών:</u></b> <br /> <br /> 
					Γραμματεία:2410 684600 <br />
					FAX: 2410 684320 <br />
					Email: <a href="mailto:mitroo@teilar.gr">mitroo@teilar.gr</a> <br /> <br />
				</p>
				<?php include('footer.php');?>
			</div>
		</div>
	</body>
</html>
