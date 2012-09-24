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

				/* Bres ton 2o fakelo meta to domain */
				/* Otan anebei sto server prepei na allaksei se [1]  */
				/* giati tha leipei o fakelos "ptixiaki" apo to url */
				var from = window.location.pathname.split('/')[2];
				var to = "";

				if (from == 'gr') to = 'en/';
				else to = 'gr/'

				/* kane replace sto url to "en/" se "gr/" */
				var newurl = url.replace(from+'/', to);

				/* kane to redirect */
				window.location = newurl;
			});
		});
	</script>

<div id="header">
		<a href="index.php"><img class="logo" src="../images/logo.png"></a>
		<a href="#" id="changeLanguage"><img style="float:right; width:25px; padding-top: 65px; padding-right: 5px;" src="../images/flags/enflag.png" title="Change Language" /></a>
		<a href="https://www.facebook.com/ap.teilar"><img style="float:right; width:25px; padding-top: 65px; padding-right: 10px;" src="../images/socialMedia/facebook.png" title="Facebook" /></a>
		<a href="https://twitter.com/AP_TEILarissa"><img style="float:right; width:25px; padding-top: 65px; padding-right: 2px;" src="../images/socialMedia/twitter.png" title="Twitter" /></a>
		<a href="../m/index.php" ><img style="float:right; width:30px; padding-top: 62px; padding-right: 5px;" src="../images/mobile.png" title="Mobile έκδοση" /></a>

		<a style="text-decoration:none;" href="index.php"><p id="banner">TΕΙ Λάρισας</br>Τμήμα Ζωικής Παραγωγής</p></a>
		
		<div id="menu">
			<ul id="nav">
				<li>
					<a href="index.php">Αρχική</a>
				</li>
				<li class="noBorderRadius">
					<a>Σπουδές </a>
					<ul>
						<li><a href="courses.php" style="border-top:1px solid #EEF4D7;  padding-top:10px;   width:100px; margin-left:20px; margin-top:0px;">Μαθήματα</a></li>
						<li><a href="http://www.teilar.gr/odigoi/odigoi_epaggelmaton/zp.pdf">Οδηγός σπουδών</a></li>
						<li><a href="ptuxiaki.php">Πτυχιακή εργασία</a></li>
						<li style="border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"><a href="practice.php">Πρακτική άσκηση</a></li>
					</ul>
					<div class="clear"></div>
				</li>
				<li class="noBorderRadius">
					<a>Ανακοινώσεις</a>
					<ul>
						<li><a href="department_announce.php"  style="padding-top:10px; border-top:1px solid #EEF4D7; width:100px; margin-left:20px; margin-top:0px;">Τμήματος</a></li>
						<li style="border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"><a href="select_teacher.php">Εκπαιδευτικών</a></li>
					</ul>			
					<div class="clear"></div>
				</li>
				<li>
					<a href="teachers.php">Εκπαιδευτικοί</a>
				</li>
				<li><a href="contact.php">Επικοινωνία</a>
				</li>
			</ul>
		</div>
</div>
