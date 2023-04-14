<?

// Souriez, C transforme !
$souriez = array(
	array("|:-)", "lunettes.gif"),
	array(";-)", "clin.gif"),
	array(":-))", "dents.gif"),
	array(":-)", "content.gif"),
	array(":-o", "couteau.gif"),
	array(":o)", "debile.gif"),
	array(":-((", "enerve.gif"),
	array(":-(", "decu.gif"),
	array("8-)", "hallucine.gif"),
	array(":-p", "langue.gif"),
	array(";-(", "pleure.gif")
);

function souriez($chaine) {
	global $souriez;
	$traite = str_replace($souriez[0][0], "<img src=\\\"graphics/".$souriez[0][1]."\\\" border=\\\"0\\\">", $chaine);
	$traite = str_replace($souriez[1][0], "<img src=\\\"graphics/".$souriez[1][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[2][0], "<img src=\\\"graphics/".$souriez[2][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[3][0], "<img src=\\\"graphics/".$souriez[3][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[4][0], "<img src=\\\"graphics/".$souriez[4][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[5][0], "<img src=\\\"graphics/".$souriez[5][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[6][0], "<img src=\\\"graphics/".$souriez[6][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[7][0], "<img src=\\\"graphics/".$souriez[7][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[8][0], "<img src=\\\"graphics/".$souriez[8][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[9][0], "<img src=\\\"graphics/".$souriez[9][1]."\\\" border=\\\"0\\\">", $traite);
	$traite = str_replace($souriez[10][0], "<img src=\\\"graphics/".$souriez[10][1]."\\\" border=\\\"0\\\">", $traite);
	return $traite;}

// Couleurs barres du sondage
$couleurs = array("bleu", "jaune", "marron", "or", "orange", "outremer", "rose", "rouge", "vert", "violet");
sort($couleurs);

// Lire un fichier
function liref($fd) {
	if (file_exists($fd)) {
		$fichier = fopen($fd, "r");
		$contenu = fread($fichier, filesize($fd));
		fclose($fichier);}
	else {
		$contenu = "<b>Le fichier ".$fd." n'existe pas !</b>";}
	return $contenu;
}

// Haut d'un tableau
function htable($tblti, $largeur) {
	echo "<table cellspacing=\"0\" cellpadding=\"1\" border=\"0\" align=\"center\" width=\"".$largeur."\" class=\"bordure\"><tr><td>\n";
	echo "<table cellspacing=\"1\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\">\n";
	echo "<tr><td nowrap class=\"tbl1\"><p class=\"titre\"><b>".$tblti."</b></p></td></tr>\n";
	echo "<tr><td class=\"tbl2\">\n\n";}

// Haut d'un tableau de menu
function htable1($tblti) {
	echo "<table cellspacing=\"0\" cellpadding=\"1\" border=\"0\" align=\"center\" width=\"100%\" class=\"bordure\"><tr><td>\n";
	echo "<table cellspacing=\"1\" cellpadding=\"0\" border=\"0\" align=\"center\" width=\"100%\">\n";
	echo "<tr><td nowrap class=\"tbl1\"><p class=\"mtitre\" align=\"center\"><b>".$tblti."</b></p></td></tr>\n";
	echo "<tr><td class=\"tbl2\" onMouseOver=\"this.className = 'tbl2over';\" onMouseOut=\"this.className = 'tbl2';\">\n\n";}

// Bas d'un tableau
function btable() {
	echo "\n</td></tr>\n";
	echo "</table>";
	echo "\n</td></tr>\n";
	echo "</table>";}

// RELATIF AU SONDAGE

$commun = array(); // tableau des fichiers
$total = 0; // Total des votes
$enr = "include/sonde.txt"; // Fichier enregistrable

$contenu = file($enr);
$lignes = count($contenu);

// Extrait la question du sondage
$question = $contenu[0];
$question = trim($question);

// Extrait les reponses, la couleur de la bande, le nombre de votes
for ($i = 1; $i < $lignes; $i++) {
	$num = $i-1;
	$pos1 = strrpos($contenu[$i], "|");
	$pos2 = strrpos($contenu[$i], "#");
	$commun[$num][0] = substr($contenu[$i], 0, $pos1); // Reponse
	$commun[$num][1] = substr($contenu[$i], $pos1+1 , $pos2-$pos1-1); // Couleur
	$commun[$num][2] =  substr($contenu[$i], $pos2+1); // Nombre de votes
	$commun[$num][2] = trim($commun[$num][2]);
	$total = $total + $commun[$num][2]; // Total des votes
}

// Pourcentage de votants
for ($i = 0; $i < count($commun); $i++) {
	if ($commun[$i][2] != 0) { // Votes en pourcentage
		$commun[$i][3] = round($commun[$i][2]/$total*10000) /100;}
	else {
		$commun[$i][3] = 0;}
}

?>
