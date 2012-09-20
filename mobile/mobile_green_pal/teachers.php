<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="mobilestyle.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Εκπαιδευτικοί</title>
		<link rel="stylesheet" href="themes/ap_theme_2.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.1/jquery.mobile.structure-1.1.1.min.css" />
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.min.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline" data-add-back-btn="true">
				<a href="announces.php" data-role="button" data-icon="back">Πίσω</a>
				<h1>Εκπαιδευτικοί</h1>
			</div>
			<div data-role="content">	
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
					echo '<div class="extra_padding">';
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
						
						echo '<p class="teacher_head" style="padding: 5px 10px; text-align:left;">'.$xmlp->person->name.'</p>';
						echo '<div class="teacher_content">';
						echo '<img class="teacher_image" src="'.(!empty($xmlp->person->image) ? $xmlp->person->image : '../images/profile.png').'" alt="" />';
						echo '			<table>';
						echo '				<tr>';
						echo '					<td class="teacher_row1" ><strong>Τηλέφωνο:</strong></td>';
						echo '					<td class="teacher_row2" >'.(!empty($xmlp->person->telephone) ? $xmlp->person->telephone : '-').'</td>';
						echo '					<td class="teacher_row3"><strong>Fax:</strong></td>';
						echo '					<td class="teacher_row4">'.(!empty($xmlp->person->fax)  ? $xmlp->person->fax: '-').'</td>';
						echo '				</tr>';
						echo '				<tr>';
						echo '					<td class="teacher_row1" ><strong>E-mail:</strong></td>';
						echo '					<td class="teacher_row2" ><a href="mailto:'.$xmlp->person->email.'">'.$xmlp->person->email.'</a></td>';
						echo '					<td class="teacher_row3"><strong>Site:</strong></td>';
						echo '					<td class="teacher_row4" >'.(!empty($xmlp->person->site) ? '<a href="'.$xmlp->person->site.'">'.$xmlp->person->site.'</a>': '-' ).'</td>';
						echo '				</tr>';
						echo '				<tr>';
						echo '					<td class="teacher_row1" ><strong>Ώρες Επικοινωνίας:</strong></td><td colspan="3" >';
						
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
						echo '					<td colspan="4"><a href="teacher_announce.php?pid='.$xmlp->person->email.'" >Ανακοινώσεις εκπαιδευτικού</a>';
						echo '					</td>';
						echo '				</tr>';
						
						//~ echo '				<tr>';
						//~ echo '					<td>Αντικείμενο:</td><td>'.$xmlp->person->antikeimeno.'</td>';
						//~ echo '				</tr>';
						//~ echo '				<tr>';
						//~ echo '					<td>Σύντομο βιογραφικό:</td><td>'.$xmlp->person->short_cv.'</td>';
						//~ echo '				</tr>';
						echo '			</table>';
						echo '<div style="clear:both;"></div>';
						echo '</div>';
					}
					echo '</div>';
				?>
				<h5>Προγραμματισμος-Σχεδίαση: <a href="mailto:rania.marou@gmail.com">Ράνια Μάρου</a></h5>
				</div>
		</div>
	</body>
</html>
