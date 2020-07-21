<?php
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" ?>';

require_once 'includes/config.php';
require_once 'includes/sql.php';

//Titre de la page
$pagetitle = 'Flux RSS';

?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">

<?php
$nomsite = SITENAMELONG;
?>

      <channel>
      	  <title><?php echo SITEURL; ?></title>
		      <language>fr</language>
      	   <link><?php echo SITEURL; ?></link>
		       <lastBuildDate><?php print date("D, d M Y H:i:s O");?></lastBuildDate>
      	   <description><?php echo SITESLOGAN; ?></description>
		       <copyright><?php print "(copyleft)". date("Y",time())." " .$nomsite; ?></copyright>
		       <atom:link href="<?php echo SITEURL; ?>/rss.php" rel="self" type="application/rss+xml" />

      	    	<?php
		          $stmt = $db->query("SELECT * FROM projets ORDER BY projetDate DESC LIMIT 10");
      	    	while($data = $stmt->fetch()) {
			             $id=html($data['projetID']);
			             $filename = preg_replace(array('/</', '/>/', '/"/'), array('&lt;', '&gt;', '&quot;'), $data['projetTitre']);
					         $texte = nl2br($data['projetTexte']);
			             $titre= rawurlencode(html($data['projetTitre']));

			          // on affiche dans le navigateur
      	    		echo "<item>\n";
      	    		echo "<title><![CDATA[$filename]]></title>\n";
      	    		echo "<link>".SITEURL."/projet.php?id=" . $data['projetID'] . "</link>\n";
			          echo "<guid>".SITEURL."/projet.php?id=" . $data['projetID'] . "</guid>\n";
      	    		echo "<description><![CDATA[".$texte."]]></description>\n";
      	    		echo "<pubDate>".$data["projetDate"]."</pubDate>\n";
      	    		echo "</item>\n";
      	    	}
      	    	?>
      </channel>
</rss>
