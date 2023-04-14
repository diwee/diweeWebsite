<?

$barre = 1.6;

// ENREGISTRE LA REPONSE
if (!empty($choix)) {
	$fichier = file("include/sonde.txt");
	$travailler = stripSlashes($fichier[$choix]);
	$pos1 = strrpos($travailler, "|");
	$pos2 = strrpos($travailler, "#");
	$ter[0] = substr($travailler, 0, $pos1); // Reponse
	$ter[1] = substr($travailler, $pos1+1 , $pos2-$pos1-1); // Couleur
	$ter[2] =  substr($travailler, $pos2+1); // Nombre de votes
	$ter[2] = ($ter[2] + 1);
	$fichier[$choix] = $ter[0]."|".$ter[1]."#".$ter[2]."\n";

	$f = fopen("include/sonde.txt", "w+");
	for ($i = 0; $i < count($fichier); $i++) {
				fputs($f, $fichier[$i]);}
	fclose($f);}



include("config.php");
include("fonctions.php");

include("include/hpage.txt");

?>

<? htable($nom[6]." - ".$question, "100%"); ?>

<table cellspacing="0" cellpadding="0" border="0" align="center">
<?

for ($i = 0; $i < count($commun); $i++) {
	echo "<tr>\n";
	echo "<td><p><b>".$commun[$i][0]." </b></p></td>\n";
	echo "<td><img src=\"graphics/".$commun[$i][1].".gif\" width=\"".round($commun[$i][3]*$barre)."\" height=\"10\"></td>\n";
	echo "<td><p>".$commun[$i][3]."%</p></td>\n";
	echo "<td><p>(".$commun[$i][2]." votes)</p></td>\n";
	echo "</tr>\n";
}

?>
</table>

<p align="center">Total des votes : <b><? echo $total; ?></b> votes.</p>

<? btable(); ?>

<? include("include/bpage.txt"); ?>
