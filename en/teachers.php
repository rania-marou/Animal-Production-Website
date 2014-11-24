<?php include('../config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<title>Teachers</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="../fav.ico" type="image/x-icon"> 
	<link rel="shortcut icon" href="../fav.ico" type="image/x-icon">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script type="text/javascript" src="../js/jquery.js"></script>
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
			<h1>Teachers</h1>				
				<?php 
					$categories = array();
					$persons = array();
					$data = file_get_contents(PERSON_SUMMARY_XML_URL);
					try {
						$xml = new SimpleXMLElement($data);
					} catch (Exception $e) {
						//~ echo "<p>Μη έγκυρο xml αρχείο</p>";
						//~ echo $e;
						//~ exit();
						$xml = null;
					}
					
					if (count($xml)==0 || $xml == null)
						echo '<p>Teachers can not be displayed in this language.</p>';
					else {
						$counter = 1;
						
						foreach ($xml->person as $person_summary){ 
							$person = array();
							$datap = file_get_contents(PERSON_XML_URL_EN.'pid='.$person_summary->email.'&type=p');
							$datao = file_get_contents(PERSON_XML_URL_EN.'pid='.$person_summary->email.'&type=o');
							try {
								$xmlp = new SimpleXMLElement($datap);
								$xmlo = new SimpleXMLElement($datao);
							} catch (Exception $e) {
								//~ echo "<p>Μη έγκυρο xml αρχείο</p>";
								//~ echo $e;
								continue;
							}
							$person['category'] = (string) $xmlp->person->category;
							$person['name'] = (string) $xmlp->person->name;
							$person['image'] = (string) $xmlp->person->image;
							$person['telephone'] = (string) $xmlp->person->telephone;
							$person['fax'] = (string) $xmlp->person->fax;
							$person['email'] = (string) $xmlp->person->email;
							$person['site'] = (string) $xmlp->person->site;
							
							$epik = "";
							for ($i=0; $i<5; $i++){
								$date="date_".$i;
								if(isset($xmlo->$date)){
									$epik .= $xmlo->$date->imera.', '.$xmlo->$date->ores.', '.$xmlo->$date->meros.' <br />';
								}
							}
							if ($epik == "") $epik = '-';
							
							$person['epik'] = $epik;
							$categories[] = (string) $xmlp->person->category;
							$persons[] = $person;
						}
					
						$categories = array_unique($categories);
						
						echo '<div class="extra_padding">';
						foreach ($categories as $categorykey => $categoryname){
							echo '<p><strong>'.$categoryname.'</strong></p>';
							foreach ($persons as $person){
								if ($person['category'] == $categoryname) {
									echo '<p class="teacher_head" style="padding: 5px 10px; text-align:left;">'.$person['name'].'</p>';
									echo '<div class="teacher_content">';
									echo '<img class="teacher_image" src="'.(!empty($person['image']) ? $person['image'] : '../images/profile.png').'" alt="image" />';
									echo '			<table>';
									echo '				<tr>';
									echo '					<td class="teacher_row1" ><strong>Telephone:</strong></td>';
									echo '					<td class="teacher_row2" >'.(!empty($person['telephone']) ? $person['telephone'] : ' - ').'</td>';
									echo '					<td class="teacher_row3"><strong>Fax: </strong></td>';
									echo '					<td class="teacher_row4">'.(!empty($person['fax'])  ? $person['fax']: ' - ').'</td>';
									echo '				</tr>';
									echo '				<tr>';
									echo '					<td class="teacher_row1" ><strong>E-mail:</strong></td>';
									echo '					<td class="teacher_row2" ><a href="mailto:'.$person['email'].'">'.$person['email'].'</a></td>';
									echo '					<td class="teacher_row3"><strong>Site: </strong></td>';
									echo '					<td class="teacher_row4" >'.(!empty($person['site']) ? '<a href="'.$person['site'].'">'.$person['site'].'</a>': ' - ' ).'</td>';
									echo '				</tr>';
									echo '				<tr>';
									echo '					<td class="teacher_row1" ><strong>Contact hours:</strong></td><td colspan="3" >';
									echo '						'.$epik;
									echo '					</td>';
									echo '				</tr>';
									echo '				<tr>';
									echo '					<td colspan="4"><a href="teacher_announce.php?pid='.$person['email'].'" >Teacher announcements</a>';
									echo '					</td>';
									echo '				</tr>';
									echo '			</table>';
									echo '<div style="clear:both;"></div>';
									echo '</div>';
								}
							}
						}
						echo '</div>';
					} //else
				?>
				
		</div>
	</div>			
	<?php include('footer.php'); ?>
</body>

</html>
