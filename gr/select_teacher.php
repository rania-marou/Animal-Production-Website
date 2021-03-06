<?php include('../config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<title>Ανακοινώσεις Εκπαιδευτικών</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="../fav.ico" type="image/x-icon"/> 
	<link rel="shortcut icon" href="../fav.ico" type="image/x-icon"/>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script type="text/javascript" src="../js/jquery.js"></script>
</head>

<body>
	<?php include('header.php'); ?>
	<div id="content">
		<div id="teachers" class="content_box">
			<h1>Ανακοινώσεις Εκπαιδευτικών</h1>
			<?php 
					$categories = array();
					$persons = array();
					$data = file_get_contents(PERSON_SUMMARY_XML_URL);
					try {
						$xml = new SimpleXMLElement($data);
					} catch (Exception $e) {
						echo "<p>Μη έγκυρο xml αρχείο</p>";
						echo $e;
						exit();
					}
					$counter = 1;
					
					foreach ($xml->person as $person_summary){ 
						$person = array();
						$datap = file_get_contents(PERSON_XML_URL.'pid='.$person_summary->email.'&type=p');
						try {
							$xmlp = new SimpleXMLElement($datap);
						} catch (Exception $e) {
							//~ echo "<p>Μη έγκυρο xml αρχείο</p>";
							//~ echo $e;
							continue;
						}
						$person['category'] = (string) $xmlp->person->category;
						$person['name'] = (string) $xmlp->person->name;
						$person['email'] = (string) $xml->person->email;
						$categories[] = (string) $xmlp->person->category;
						$persons[] = $person;
					}
					$categories = array_unique($categories);
					
					echo '<div class="extra_padding"><ul style="list-style:none; padding:0px; margin:0px;" >';
					foreach ($categories as $categorykey => $categoryname){
						echo '<li><p><strong>'.$categoryname.'</strong></p></li>';
						foreach ($persons as $person){
							if ($person['category'] == $categoryname)
								echo '<li><a class="teacher_head" style="padding: 5px 10px; display:block; margin-top:3px; " href="teacher_announce.php?pid='.$person['email'].'" >'.$person['name'].'</a></li>';
						}
					}
					echo '</ul></div>';
				?>		
		</div>	
	</div>		
	<?php include('footer.php'); ?>
</body>

</html>
