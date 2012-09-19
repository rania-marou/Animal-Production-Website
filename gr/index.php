<?php include('../config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<title>Τμήμα Ζωικής Παραγωγής</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="../fav.ico" type="image/x-icon"> 
	<link rel="shortcut icon" href="../fav.ico" type="image/x-icon">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script type="text/javascript" src="../js/global.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
</head>

<body>
	<?php include('header.php'); ?>
	<div id="content">
			<div id="link_box" class="link_box">
				<h4 style="padding-left:20px;">Χρήσιμοι Σύνδεμοι</h4>
				<a href="http://openclass.teilar.gr/">Πλατφόρμα e-class</a> <br />
				<a href="http://eudoxus.gr/">Εύδοξος</a> <br />
				<a href="https://dionysos.teilar.gr/Menu/steg/zwikis%20paragwgis.html">e-Γραμματεία - Dionysos</a> <br />
				<a href="http://www.teilar.gr/">ΤΕΙ Λάρισας</a>
			</div>
			<div id="announce" class="announce_box">
				<h4 style="text-align:center;">Τελευταίες ανακοινώσεις</h4>
				<p>
					<?php 
						$data = file_get_contents(DEPARTMENT_ANNOUNCEMENTS_XML_URL);
						try {
							$xml = new SimpleXMLElement($data);
						} catch (Exception $e) {
							echo "<p>Μη έγκυρο xml αρχείο</p>";
							echo $e;
							exit();
						}
						$i=1;
						echo '<ul class="announces">';
						for ($j=1; $j<=4; $j++){
							$new="news_".$j;
							if (isset($xml->$new)) {
								echo '<li style=""><a href="department_announce.php?id='.$i.'">'.$xml->$new->title.'</a> <span><strong>('.$xml->$new->news_date.')</strong></span></li>';
								$i++;
								if ($i==FRONT_PAGE_ANNOUNCEMENTS_NUMBER+1)
									break;
							}
						}	
						echo '</ul>';
					?>
				</p>
			</div>
			<div id="welcome" class="welcome_box">
				<h1>Καλώς ήλθατε<br/>στην ιστοσελίδα του τμήματος</h1>
				<p style="text-align:justify; font-size: 14px; padding: 0 10px;"><br/>Το τμήμα Ζωικής Παραγωγής ιδρύθηκε το 1973 ξεκινώντας ως σχολή ΚΑΤΕΕ. Από το 1983 αποτελεί Τμήμα του Τεχνολογικού Εκπαιδευτικού Ιδρύματος Λάρισας. <br/><br/> Το περιεχόμενο σπουδών του Τμήματος Ζωικής Παραγωγής καλύπτει το γνωστικό αντικείμενο της Επιστήμης των Ζώων και συναφών κλάδων, με έμφαση στην εφαρμογή σύγχρονων τεχνολογικών μεθόδων στην εκτροφή, διατροφή, βελτίωση, αναπαραγωγή και υγεία των αγροτικών ζώων, ζώων συντροφιάς, εξωτικών ζώων και πειραματόζωων. <br /> <br />Η διάρκεια των σπουδών  είναι 8 (οκτώ) εξάμηνα, συμπεριλαμβανομένης και της πρακτικής άσκησης. Σε όλα τα εξάμηνα, εκτός του τελευταίου, οι σπουδές περιλαμβάνουν θεωρητική διδασκαλία, εργαστηριακές ασκήσεις και φροντιστήριο (ασκήσεις πράξης) καθώς και την  εκπόνηση  εργασιών. Το τελευταίο εξάμηνο είναι αφιερωμένο στην πρακτική άσκηση του φοιτητή και την εκπόνηση της πτυχιακής εργασίας.</p>
			</div>
			<div style="clear:both;"></div>			
	</div>
	<?php include('footer.php'); ?>
</body>

</html>
