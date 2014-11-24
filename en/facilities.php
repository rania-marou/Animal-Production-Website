<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
	<title>Facilities</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/global.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="../fav.ico" type="image/x-icon"/> 
	<link rel="shortcut icon" href="../fav.ico" type="image/x-icon"/>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1"/>
	<script type="text/javascript" src="../js/jquery.js"></script>
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
		<div id="courses" class="content_box">
			<h1>Department</h1>
			<p style="line-height: 1.3;">The department of Animal Production was established in 1973 starting as a school per year. Since 1983, it’s a Department of the Technological Educational Institute of Larissa. <br/> <br/> The curriculum of the Department of Animal Production covers the subject of animal sciences and related disciplines, with emphasis on the application of modern technological methods in breeding, nutrition, improvement, reproduction and health of farm animals, pets , exotic animals and laboratory animals. <br /> <br /> The duration of studies is 8 (eight) semesters, including internships. In all semesters, except the final, the studies includes theoretical teaching, laboratory and tutorial exercises (exercises act) and the preparation work. The final semester is devoted to practical training of students and preparing the dissertation.</p>
			<br />
			<h1>Facilities</h1>
			<p style="line-height: 1.3;">Text for the department's facilities.</p>
			<br />
			<h1>Photographs</h1>
			<div id="container">
				<div id="example">
					<div id="slides">
						<div class="slides_container">
							<div class="slide">
								<img src="../images/jqueryslidesImages/a.png" width="570" height="270" alt="Slide 1"></a>
								<div class="caption" style="bottom:0">
									<p style="color:#D9DEB6;">Lab 1</p>
								</div>
							</div>
							<div class="slide">
								<img src="../images/jqueryslidesImages/b.png" width="570" height="270" alt="Slide 2"></a>
								<div class="caption">
									<p style="color:#D9DEB6;">Lab 2</p>
								</div>
							</div>
							<div class="slide">
								<img src="../images/jqueryslidesImages/c.png" width="570" height="270" alt="Slide 3"></a>
								<div class="caption">
									<p style="color:#D9DEB6;">Lab 3</p>
								</div>
							</div>
						</div>
						<a href="#" class="prev"><img src="../images/jqueryslidesImages/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
						<a href="#" class="next"><img src="../images/jqueryslidesImages/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
					</div>
					<img src="../images/jqueryslidesImages/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
				</div>
		    </div>
		    <br /><br /><br />
			<div style="clear:both"></div>
		</div>
	</div>			
	<?php include('footer.php'); ?>
</body>

</html>
