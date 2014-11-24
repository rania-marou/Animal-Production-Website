<?php
include('config.php');
$data = file_get_contents(DEPARTMENT_ANNOUNCEMENTS_XML_URL);
try {
$xml = new SimpleXMLElement($data);
} catch (Exception $e) {
echo $e;
exit();
}

echo '<?xml version="1.0" encoding="UTF-8" ?>'."\n";
echo '<rss version="2.0">'."\n";
echo '<channel>'."\n";
echo '        <title>Τμήμα Ζωικής Παραγωγής</title>'."\n";
echo '        <description>RSS του Τμήματος Ζωικής Παραγωγής</description>'."\n";
echo '        <link>http://marou-rania.dnsd.info</link>'."\n";

for ($i=1; $i<=count($xml); $i++){
	$new="news_".$i;
	if (isset($xml->$new)){
	 echo '   <item>'."\n";
	 echo '               <title><![CDATA['.$xml->$new->title.']]></title>'."\n";
	 echo '               <description><![CDATA['.$xml->$new->descr.']]></description>'."\n";
	 if (!empty($xml->$new->attachment))
	    echo '               <link>'.$xml->$new->attachment.'</link>'."\n";
		// echo '            <pubDate>'.DateTime::createFromFormat('d/m/Y',$xml->$new->news_date)->format("r").'</pubDate>'."\n";
		echo '               <pubDate>'.$xml->$new->news_date.'</pubDate>'."\n";
		echo '   </item>'."\n";
	}
}

echo '</channel>'."\n";
echo '</rss>'."\n";

?>
