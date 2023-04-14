<?

include("config.php");
include("fonctions.php");

include("include/hpage.txt");

// Création de l'index des liens
$fichier = file("include/liens.txt");

$data = array();

for ($i = 0; $i < count($fichier); $i++) {
	$fichier[$i] = trim($fichier[$i]);
	$data[$i] = explode("|", $fichier[$i]);
	$data[$i][2] = $i;}

sort($data);

?>

<? htable($nom[3], "100%"); ?>

<p>Si le site contacté n'existe plus, contacte le webmaster pour signaler le lien incorrect.</p>

<?

for ($i = 0; $i < count($data); $i++) {
	echo "<p><b><a href=\"".$data[$i][1]."\" target=\"_blank\">".$data[$i][0]."</a></b> (".$data[$i][1].")</p>\n";}

?>

<? btable(); ?>

<? include("include/bpage.txt"); ?>
