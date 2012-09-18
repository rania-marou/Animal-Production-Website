<?php include('../config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<title>Εκπαιδευτικοί Τμήματος</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="../fav.ico" type="image/x-icon"> 
	<link rel="shortcut icon" href="../fav.ico" type="image/x-icon">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/global.js"></script>
		<script type="text/javascript">
		$(document).ready(function () {	
			$(".teacher_content").hide();
			
			<?php
				if(isset($_GET['id'])){
				echo '$(".teacher_content:eq('.($_GET['id']-1).')").slideToggle(500);';
				echo '$(".teacher_head:eq('.($_GET['id']-1).')").toggleClass("headingExpanded");';
				}
			?>
			
			$(".teacher_head").click(function() {
				$(this).next(".teacher_content").slideToggle(500);
				$(this).toggleClass("headingExpanded");
			});
		});
	</script>
</head>
<body>
	<?php include('header.php'); ?>
	<div id="content">
		<div id="teachers" class="content_box">
			<h1>Εκπαιδευτικοί Τμήματος</h1>				
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
					echo '<div class="extra_padding">';
					foreach ($xml->person as $person_summary){ 
						$datap = file_get_contents(PERSON_XML_URL.'pid='.$person_summary->email.'&type=p');
						$datao = file_get_contents(PERSON_XML_URL.'pid='.$person_summary->email.'&type=o');
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
				
		</div>
	</div>			
	<?php include('footer.php'); ?>
</body>

</html>
