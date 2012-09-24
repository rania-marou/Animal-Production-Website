<?php include('config.php');?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/mobilestyle.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ανακοίνωση</title>
		<link rel="stylesheet" href="css/ap_theme_2.min.css" />
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.1.1.min.css" />
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/jquery.mobile-1.1.1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline" data-add-back-btn="true">
				
				<a href="teacher_announces.php<?php echo '?pid='.$_GET['email'];?>" data-role="button" data-icon="back">Πίσω</a>
				<h1>Ανακοίνωση</h1>
				<a href="index.php" data-role="button" data-iconpos="notext" data-icon="home"></a>
			</div>
			<div data-role="content">	
				<?php include('header.php');?>
				<?php 
			
					if (!isset($_GET['email'])){
							echo 'Δεν έχετε επιλέξει εκπαιδευτικό';
							exit;
					}
					if (!isset($_GET['id'])){
							echo 'Δεν έχετε επιλέξει ανακοίνωση';
							exit;
					}
					$email=$_GET['email'];
					$id=$_GET['id'];
					
					$data = file_get_contents(PERSON_XML_URL.'pid='.$email.'&type=a');
					try {
						$xml = new SimpleXMLElement($data);
					} catch (Exception $e) {
						echo "<p>Μη έγκυρο xml αρχείο</p>";
						echo $e;
						exit();
					}
					
					
					$new="news_".$id;
					if (isset($xml->$new)){
						echo '<h5 data-role="header">'.$xml->$new->title.'<span><strong> - ('.$xml->$new->news_date.')</strong></span></h5>';
						if ($xml->$new->descr == "")
							echo '<p data-role="content" style="margin: 0px; padding: 0px;">Δε βρέθηκε κείμενο ανακοίνωσης</p>';
						else 
							echo '<p data-role="content">'.$xml->$new->descr.'</p>';
						if (!empty($xml->$new->attachment)){
							echo '<p style="float: right;margin: 0px; padding: 0px;">Επισυναπτόμενο αρχείο:<a href="'.$xml->$new->attachment.'"><img style="width: 50px; height: 50px; z-index: 1; margin: 10px;vertical-align: middle;" src="images/clip.png" alt="" /></a></p><div style="clear:both;"></div>';
						}
					}
					else {
						echo '<p>Δε βρέθηκε η ανακοίνωση που επιλέξατε.</p>';
					}
				?>
				<?php include('footer.php');?>
			</div>
		</div>
	</body>
</html>
