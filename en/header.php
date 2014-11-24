	<script type="text/javascript">
		$(document).ready(function () {	
			$('#nav li').hover(
				function () {
					//show its submenu
					$('ul', this).slideDown(100);

				}, 
				function () {
					//hide its submenu
					$('ul', this).slideUp(100);			
				}
			);
			
			$("#changeLanguage").click(function() {
				/* Bres to trexon url tis address bar */
				var url = document.URL;

				/* kane replace sto url to "en/" se "gr/" */
				var newurl = url.replace("/en/", "/gr/");

				/* kane to redirect */
				window.location = newurl;
			});
		});
	</script>

<div id="header">
		<p class="beta">Beta version</p>
		<a href="#" id="changeLanguage"><img style="float:right; width:23px; height:30px; margin-top: 62px; margin-right: 5px;" src="../images/flags/grflag.png" title="Change Language" alt="flag"/></a>
		<a href="https://www.facebook.com/ap.teilar"><img style="float:right; width:25px; margin-top: 65px; margin-right: 10px;" src="../images/socialMedia/facebook.png" title="Facebook" alt="facebook"/></a>
		<a href="https://twitter.com/AP_TEILarissa"><img style="float:right; width:25px; margin-top: 65px; margin-right: 2px;" src="../images/socialMedia/twitter.png" title="Twitter" alt="twitter"/></a>
		<a href="../rss.php"><img style="float:right; width:30px; height:30px; margin-top: 63px; margin-right: 1px;" src="../images/rss.png" title="RSS" alt="rss"/></a>		
		<a href="../m/index.php" ><img style="float:right; width:30px; margin-top: 62px; margin-right: 5px;" src="../images/mobile.png" title="Mobile έκδοση" alt="mobile"/></a>
		<p id="banner"><a style="text-decoration:none; font-size: 20px;" href="index.php"><img class="logo" src="../images/logo.png" style="">TΕΙ Larissas<br>Department of Animal Production</a></p>
		<div style="clear:both"></div>
				
		<div id="menu">
			<ul id="nav">
				<li>
					<a style="font-size: 13px;line-height: 20px;" href="index.php">Home</a>
				</li>
				<li class="noBorderRadius">
					<a style="font-size: 13px;line-height: 20px;">Department</a>
					<ul>
						<li><a href="facilities.php" style="padding-top:10px; border-top:1px solid #EEF4D7; width:100px; margin:0 auto;">Facilities</a></li>
						<li style="border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"><a href="research.php">Research</a></li>
					</ul>
					<div class="clear"></div>
				</li>
				<li class="noBorderRadius">
					<a style="font-size: 13px;line-height: 20px;">Studies </a>
					<ul>
						<li><a href="courses.php" style="border-top:1px solid #EEF4D7;  padding-top:10px;   width:100px; margin:0 auto;">Courses</a></li>
						<li><a href="ptuxiaki.php">Final project </a></li>
						<li><a href="practice.php">Training</a></li>
						<li style="border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"><a href="master.php">Master Degree</a></li>
					</ul>
					<div class="clear"></div>
				</li>
				<li class="noBorderRadius">
					<a style="font-size: 13px;line-height: 20px;">Announcements</a>
					<ul>
						<li><a href="department_announce.php"  style="padding-top:10px; border-top:1px solid #EEF4D7; width:100px; margin:0 auto;">Department's</a></li>
						<li style="border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"><a href="select_teacher.php">Teachers'</a></li>
					</ul>			
					<div class="clear"></div>
				</li>
				<li>
					<a style="font-size: 13px;line-height: 20px;" href="teachers.php">Teachers</a>
				</li>
				<li><a style="font-size: 13px;line-height: 20px;" href="contact.php">Contact</a>
				</li>
			</ul>
		</div>
</div>
