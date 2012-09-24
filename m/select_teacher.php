<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/mobilestyle.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Εκπαιδευτικοί</title>
		<link rel="stylesheet" href="css/ap_theme_2.min.css" />
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.1.1.min.css" />
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery.mobile-1.1.1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline" data-add-back-btn="true">
				<a href="index.php" data-role="button" data-icon="back">Πίσω</a>
				<h1>Εκπαιδευτικοί</h1>
				<a href="index.php" data-role="button" data-iconpos="notext" data-icon="home"></a>
			</div>
			<div data-role="content">	
				<?php include('header.php');?>
				<?php 
					$data = file_get_contents(PERSON_SUMMARY_XML_URL);
					try {
						$xml = new SimpleXMLElement($data);
					} catch (Exception $e) {
						echo "<p>Μη έγκυρο xml αρχείο</p>";
						echo $e;
						exit();
					}
					$counter = 1;
					echo '<ul data-role="listview" data-inset="true" data-filter="false">';
					foreach ($xml->person as $person_summary){ 
						$datap = file_get_contents(PERSON_XML_URL.'pid='.$person_summary->email.'&type=p');
						try {
							$xmlp = new SimpleXMLElement($datap);
						} catch (Exception $e) {
							//~ echo "<p>Μη έγκυρο xml αρχείο</p>";
							//~ echo $e;
							continue;
						}
						
						echo '<li><a href="teacher_announces.php?pid='.$xml->person->email.'" >'.$xmlp->person->name.'</a></li>';
					}
					echo '</ul>';
				?>
				<?php include('footer.php');?>
			</div>
		</div>
	</body>
</html>
