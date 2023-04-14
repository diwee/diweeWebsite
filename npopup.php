<?

include("config.php");

/**************************************************** VARIABLES *****************************************************/

$dbbase = "include/nouvelles/";
$database = "include/nouvelles/dbn.txt";
$count = "include/nouvelles/num.txt";

/******************************* EXTRACTION DES VALEURS DE LA DB ****************************************/

// Retire les anciennes variables.
unset($fichier, $fichier2, $i, $nouvelle);

// Ouverture de la base de donnees
$fichier = file($database);

// Nettoyage des textes
for ($i = 0; $i < count($fichier); $i++) {
	$fichier[$i] = trim($fichier[$i]);}

// Detection du statut
for ($i = 0; $i < count($fichier); $i++) {
$nouvelle[$i] = explode("|", $fichier[$i]);
	if (count($nouvelle[$i]) < 2) {
		$nouvelle[$i][1] = "active";}}


?>

<html>

<head>
<title>Lire un message</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

p {margin: 5px; font-size: <? echo $page[2]; ?>; font-family: <? echo $page[1]; ?>; color: <? echo $texte[0]; ?>;}

a {color: <? echo $lien[0]; ?>; text-decoration: none;}
a:hover {color: <? echo $lien[1]; ?>; text-decoration: underline;}

</style>
</head>

<body bgcolor="<? echo $texte[1]; ?>">

<p><a href="javascript:window.close()">Fermer la fenêtre</a></p>

<?

$reel = ($id - 1);

if (!empty($id) && file_exists($dbbase.$nouvelle[$reel][0])) {
	@include($dbbase.$nouvelle[$reel][0]);
	echo "<p><b>".stripSlashes($ntitre)."</b><br>\n".stripSlashes($ntexte)."</p>\n";
	echo "<p align=\"right\">Envoyé par <b><a href=\"mailto:".stripSlashes($nemail)."\">".stripSlashes($nauteur)."</a></b> le ".stripSlashes($ndate)."";}

?>



</body>

</html>
