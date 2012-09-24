<?php include('../config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<title>Ανακοινώσεις Τμήματος</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="../fav.ico" type="image/x-icon"> 
	<link rel="shortcut icon" href="../fav.ico" type="image/x-icon">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {	
			$(".announcement_content").hide();
			
			<?php
				if(isset($_GET['id'])){
				echo '$(".announcement_content:eq('.($_GET['id']-1).')").slideToggle(500);';
				echo '$(".announcement_head:eq('.($_GET['id']-1).')").toggleClass("headingExpanded");';
				}
			?>
			
			$(".announcement_head").click(function() {
				$(this).next(".announcement_content").slideToggle(500);
				$(this).toggleClass("headingExpanded");
			});
		});
	</script>	
</head>

<body>
		<?php include('header.php'); ?>
	<div id="content">
		<div id="announce" class="content_box">
			<h1>Ανακοινώσεις Τμήματος</h1>
			<?php 
				/* elegxos an mas exei dwthei kapoio page sto url - an oxi eimaste stin prwti */
				if (isset($_GET['page']))
					$page=$_GET['page'];
				else
					$page=1;
					
				/* Orizoume tis metavletes arxi - telos tou pagination */
				$arxi=(($page-1)*ANNOUNCEMENT_PAGINATION)+1;
				$telos=(ANNOUNCEMENT_PAGINATION*$page);
				
				
				/* diavazoume to xml */
				$data = file_get_contents(DEPARTMENT_ANNOUNCEMENTS_XML_URL);
				try {
					$xml = new SimpleXMLElement($data);
				} catch (Exception $e) {
					echo "<p>Μη έγκυρο xml αρχείο</p>";
					echo $e;
					exit();
				}
				
				/* Orizoume tis sunolikes selides - ceil:stroggulopoiei pros ta panw */
				$total_pages=ceil(count($xml)/ANNOUNCEMENT_PAGINATION);
				
					$i=1;
					echo '<div class="extra_padding">';
					for ($i=$arxi; $i<=$telos; $i++){
							$new="news_".$i;
							if (isset($xml->$new)){
								echo '<p class="announcement_head" style="padding: 5px 10px; text-align:left;">'.$xml->$new->title.'<span><strong> - ('.$xml->$new->news_date.')</strong></span></p>';
								echo '<div class="announcement_content">';
								if ($xml->$new->descr == "")
									echo '<p>Δε βρέθηκε κείμενο ανακοίνωσης</p>';
								else 
									echo $xml->$new->descr;
								if (!empty($xml->$new->attachment)){
									echo '&nbsp; <p style="float: right;">Επισυναπτόμενο αρχείο:<a href="'.$xml->$new->attachment.'"><img style="width: 50px; height: 50px; z-index: 1; margin: 10px;vertical-align: middle;" src="../images/clip.png" alt="" /></a></p><div style="clear:both;"></div>';
								}
								echo '</div>';
							}
					}
				
				/* Selidopoihsh */
				echo '<table style="margin:20px auto;"><tr><td width="1%">';
				if ($page>1)
					echo '<a style="text-decoration:none; color:#222B00;" href="?page='.($page-1).'" >Νεότερες ανακοινώσεις</a>';
				echo '</td><td width="1%" style="text-align:center;">';
				
				/* Ektupwsi olwn twn selidwn  */
				for ($i=1; $i<=$total_pages; $i++){
					if ($i==$page)
						echo '<a style="color:#91A540;">'.$i.'</a>';
					else
						echo ' <a style="color:#222B00; text-decoration:none;" href="?page='.$i.'">'.$i.'</a> ';
				}
				echo '</td><td width="1%" style="text-align:right;">';
				if ($page<$total_pages)	
					echo '<a style="text-decoration:none; color:#222B00;" href="?page='.($page+1).'" >Παλαιότερες ανακοινώσεις</a>';
				echo '</td></tr></table></div>';
			?>
		</div>	
	</div>		
	<?php include('footer.php'); ?>
</body>

</html>
