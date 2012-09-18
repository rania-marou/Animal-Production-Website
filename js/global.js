/* Otan kanoume click sto eikonidio tis glwssas tha kaleitai auti i 
 * sinartisi pou tha analambanei na kanei to redirect sto swsto url */
function changeLanguage(from, to) {
	/* Bres to trexon url tis address bar */
	var url = document.URL;
	
	/* kane replace sto url to "en/" se "gr/" */
	var newurl = url.replace(from, to);
	
	/* kane to redirect */
	window.location = newurl;
}

