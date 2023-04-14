<?

include("config.php");
include("fonctions.php");

include("include/hpage.txt");

?>

<? htable("Bienvenue sur ".$site[0]." !", "100%"); ?>

<p><? include("include/homepage.txt"); ?></p>

<? btable(); ?>

<p>&nbsp;</p>

<? htable("Les ".$site[4]." dernières nouvelles", "100%"); ?>

<p><b><a href="poster.php">Poster une nouvelle</a></b></p>

<?

// Variables
$dbbase = "include/nouvelles/";
$database = "include/nouvelles/dbn.txt";
$count = "include/nouvelles/num.txt";

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

// Extraction des noms de fichier "actifs"
$data = array();
for ($i = 0; $i < count($nouvelle); $i++) {
	if ($nouvelle[$i][1] == "active") {
		$data[] = $nouvelle[$i][0];}}

// Definition du nombre de news dans la page
$maxnews = $site[4];
if ($maxnews > count($data)) {
	$maxnews = count($data);}

// Affichage des donnees
if (!empty($data)) {
for ($i = 0; $i < $maxnews; $i++) {
	include($dbbase.$data[$i]);
	echo "<p><b>".stripSlashes($ntitre)."</b> envoyé par <a href=\"mailto:".stripSlashes($nemail)."\">".stripSlashes($nauteur)."</a> le ".stripSlashes($ndate)."<br>\n".stripSlashes($ntexte)."</p>\n";}
}

?>

<? btable(); ?>

<? include("include/bpage.txt"); ?>
