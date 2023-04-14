<?

include("config.php");
include("fonctions.php");

include("include/hpage.txt");

// Création de l'index des downloads
$fichier = file("include/dl.txt");

$data = array();

for ($i = 0; $i < count($fichier); $i++) {
	$fichier[$i] = trim($fichier[$i]);
	$data[$i] = explode("|", $fichier[$i]);
	$data[$i][2] = $i;}

sort($data);
?>

<? htable($nom[1], "100%"); ?>

<p>Clique sur la petite icône de disque dur pour commencer le téléchargement.<br>
Si  le fichier proposé n'existe plus, contacte le webmaster.</p>

<table cellspacing="0" cellpadding="0" border="0" align="center">
<?

for ($i = 0; $i < count($data); $i++) {
	echo "<tr>\n";
	echo "<td><a href=\"".$data[$i][1]."\" target=\"blank\"><img src=\"graphics/dd.gif\" width=\"16\" height=\"16\" alt=\"Download ! (".$data[$i][1].")\" border=\"0\"></a></td>";
	echo "<td><p><b>".$data[$i][0]."</b></p></td>\n";
	echo "<td><p>(".$data[$i][1].")</p></td>\n";
	echo "</tr>\n";}

?>
</table>

<? btable(); ?>

<? include("include/bpage.txt"); ?>