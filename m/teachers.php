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
					$data = file_get_contents("person_summary.xml");
					try {
						$xml = new SimpleXMLElement($data);
					} catch (Exception $e) {
						echo "<p>Μη έγκυρο xml αρχείο</p>";
						echo $e;
						exit();
					}
					$counter = 1;
					echo '<div data-role="collapsible-set">';
					foreach ($xml->person as $person_summary){ 
						$datap = file_get_contents("http://www.teilar.gr/person_xml.php?".'pid='.$person_summary->email.'&type=p');
						$datao = file_get_contents("http://www.teilar.gr/person_xml.php?".'pid='.$person_summary->email.'&type=o');
						try {
							$xmlp = new SimpleXMLElement($datap);
							$xmlo = new SimpleXMLElement($datao);
						} catch (Exception $e) {
							//~ echo "<p>Μη έγκυρο xml αρχείο</p>";
							//~ echo $e;
							continue;
						}
						
						

						echo '<div data-role="collapsible" data-collapsed="true" data-collapsed-icon="arrow-r" data-expanded-icon="arrow-d">';
						echo '<h3>'.$xmlp->person->name.'</h3>';
						echo '			<table>';
						echo '				<tr>';
						echo '					<td>Τηλέφωνο:</td>';
						echo '					<td>'.(!empty($xmlp->person->telephone) ? $xmlp->person->telephone : '-').'</td>';
						echo '				</tr>';
						echo '				<tr>';
						echo '					<td>Fax:</td>';
						echo '					<td>'.(!empty($xmlp->person->fax)  ? $xmlp->person->fax: '-').'</td>';
						echo '				<tr>';
						echo '				<tr>';
						echo '					<td>E-mail:</td>';
						echo '					<td><a href="mailto:'.$xmlp->person->email.'">'.$xmlp->person->email.'</a></td>';	
						echo '				</tr>';
						echo '				<tr>';
						echo '					<td>Site:</td>';
						echo '					<td>'.(!empty($xmlp->person->site) ? '<a href="'.$xmlp->person->site.'">'.$xmlp->person->site.'</a>': '-' ).'</td>';
						echo '				</tr>';
						echo '				<tr>';
						echo '					<td>Ώρες Επικοινωνίας:</td><td colspan="3" >';
						
						$epik = "";
						for ($i=0; $i<5; $i++){
							$date="date_".$i;
							if(isset($xmlo->$date)){
								$epik .= $xmlo->$date->imera.', '.$xmlo->$date->ores.', '.$xmlo->$date->meros.' <br />';
							}
						}
						echo (($epik == "") ? '-' : $epik);
						
						echo '					</td>';
						echo '				</tr>';
						echo '				<tr>';
						echo '					<td colspan="4"><a href="teacher_announces.php?pid='.$xmlp->person->email.'" >Ανακοινώσεις εκπαιδευτικού</a>';
						echo '					</td>';
						echo '				</tr>';
						echo '			</table>';
						
						echo '</div>';
					}
					echo '</div>';
				?>
				<?php include('footer.php');?>
				</div>
		</div>
	</body>
</html>
