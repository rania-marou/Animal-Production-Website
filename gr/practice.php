<?php include('../config.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<title>Πρακτική Άσκηση</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/global.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="../fav.ico" type="image/x-icon"> 
	<link rel="shortcut icon" href="../fav.ico" type="image/x-icon">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script type="text/javascript" src="../js/global.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="../js/slides.min.jquery.js"></script>
	<script src="../js/slider.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: '../images/jqueryslidesImages/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
</head>

<body>
	<?php include('header.php'); ?>
	<div id="content">
		<div id="practice" style="height:500px;" class="content_box">
			<h1>Πρακτική Άσκηση</h1>
			<p>&nbsp;&nbsp;&nbsp;Η πρακτική άσκηση που πραγματοποιείται στο 8ο εξάμηνο των σπουδών στοχεύει στο να εξοικειώσει το φοιτητή με το περιβάλλον εργασίας όπου θα αναζητήσει επαγγελματική αποκατάσταση. Κατά τη διάρκεια της πρακτικής άσκησης ο φοιτητής θα έχει την ευκαιρία να δει πώς χρησιμοποιούνται σε ένα πραγματικό εργασιακό περιβάλλον αυτά που διδάχτηκε, ώστε να προετοιμαστεί καλύτερα για την επαγγελματική του αποκατάσταση μετά τη λήψη του πτυχίου του.</p>		
		
			<div id="container">
			<div id="example">
				<div id="slides">
					<div class="slides_container">
						<div class="slide">
							<img src="../images/jqueryslidesImages/a.png" width="570" height="270" alt="Slide 1"></a>
							<div class="caption" style="bottom:0">
								<p style="color:#D9DEB6;">Αίθουσα Εργαστηρίου 1</p>
							</div>
						</div>
						<div class="slide">
							<img src="../images/jqueryslidesImages/b.png" width="570" height="270" alt="Slide 2"></a>
							<div class="caption">
								<p style="color:#D9DEB6;">Αίθουσα Εργαστηρίου 2</p>
							</div>
						</div>
						<div class="slide">
							<img src="../images/jqueryslidesImages/c.png" width="570" height="270" alt="Slide 3"></a>
							<div class="caption">
								<p style="color:#D9DEB6;">Αίθουσα Εργαστηρίου 3</p>
							</div>
						</div>
					</div>
					<a href="#" class="prev"><img src="../images/jqueryslidesImages/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
					<a href="#" class="next"><img src="../images/jqueryslidesImages/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
				</div>
				<img src="../images/jqueryslidesImages/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
			</div>
		    </div>	
		</div>	
	</div>		
	<?php include('footer.php'); ?>
</body>

</html>
