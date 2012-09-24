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
	<script type="text/javascript" src="../js/jquery.js"></script>
	<?php if (!isset($_GET['nomobile'])){ ?>
		<script type="text/javascript">
			$(document).ready(function () {	
				(function(a,b){if(/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|meego.+mobile|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))window.location=b})(navigator.userAgent||navigator.vendor||window.opera,'../m/index.php');
			});
		</script>
	<?php } ?>
</head>

<body>
	<?php include('header.php'); ?>
	<div id="content">
			<div id="link_box" class="link_box">
				<h4 style="padding-left:20px;">Χρήσιμοι Σύνδεμοι</h4>
				<ul style="list-style: none;padding-left: 0px;">
					<li><a href="http://www.teilar.gr/">ΤΕΙ Λάρισας</a></li>
					<li><a href="https://dionysos.teilar.gr/Menu/steg/zwikis%20paragwgis.html">e-Γραμματεία - Dionysos</a></li>
					<li><a href="http://eudoxus.gr/">Εύδοξος</a></li>
					<li><a href="http://openclass.teilar.gr/">Πλατφόρμα e-class</a></li>
				</ul>
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
				<p style="text-align:justify; font-size: 14px; padding: 0 10px; line-height: 1.7;"><br/>Το τμήμα Ζωικής Παραγωγής ιδρύθηκε το 1973 ξεκινώντας ως σχολή ΚΑΤΕΕ. Από το 1983 αποτελεί Τμήμα του Τεχνολογικού Εκπαιδευτικού Ιδρύματος Λάρισας. <br/><br/> Το περιεχόμενο σπουδών του Τμήματος Ζωικής Παραγωγής καλύπτει το γνωστικό αντικείμενο της Επιστήμης των Ζώων και συναφών κλάδων, με έμφαση στην εφαρμογή σύγχρονων τεχνολογικών μεθόδων στην εκτροφή, διατροφή, βελτίωση, αναπαραγωγή και υγεία των αγροτικών ζώων, ζώων συντροφιάς, εξωτικών ζώων και πειραματόζωων. <br /> <br />Η διάρκεια των σπουδών  είναι 8 (οκτώ) εξάμηνα, συμπεριλαμβανομένης και της πρακτικής άσκησης. Σε όλα τα εξάμηνα, εκτός του τελευταίου, οι σπουδές περιλαμβάνουν θεωρητική διδασκαλία, εργαστηριακές ασκήσεις και φροντιστήριο (ασκήσεις πράξης) καθώς και την  εκπόνηση  εργασιών. Το τελευταίο εξάμηνο είναι αφιερωμένο στην πρακτική άσκηση του φοιτητή και την εκπόνηση της πτυχιακής εργασίας.</p>
			</div>
			<div style="clear:both;"></div>			
	</div>
	<?php include('footer.php'); ?>
</body>

</html>
