<?

include("config.php");
include("fonctions.php");

include("include/hpage.txt");

$dbbase = "include/nouvelles/";
$database = "include/nouvelles/dbn.txt";
$count = "include/nouvelles/num.txt";
$ok = "";

// Ecrire un message
if ($ajn == 1) {

	// Dectection de l'ID de la prochaine news
	$fichier = fopen($count, "r");
	$id = fread($fichier, filesize($count));
	$id = $id + 1;
	fclose($fichier);

	// Variables
	$nommes = "mes".$id.".txt";
	$date = date("d/m/Y");
	$heure = date("H:i");

	// Traitement
	$txt = nl2br($txt);
	$txt = souriez($txt);
	$ti = souriez($ti);

	// Texte a inclure dans le fichier
	$src = "<?

\$ntitre = \"$ti\";
\$ndate = \"$date @ $heure\";
\$nauteur = \"$pseudo\";
\$nemail = \"$email\";
\$ntexte = \"$txt\";

?>";

	// Augmenter le nombre d'index.
	$fichier = fopen($count, "w+");
	fputs($fichier, $id);
	fclose($fichier);

	// Enregistrer la newz.
	$fichier = fopen($dbbase.$nommes, "w+");
	fputs($fichier, $src);
	fclose($fichier);

	// Ouvre la base de donnees
	$db = file($database);

	// Actualise la base de donnees
	$fichier = fopen($database, "w+");
	if (empty($site[5])) {
		fputs($fichier, $nommes."|active\n");}
	else {
		fputs($fichier, $nommes."|inactive\n");}
	fputs($fichier, implode("", $db));
	fclose($fichier);

	$ok = "<p align=\"center\"><b>Merci de ta contribution !</b></p>";

}

?>

<script language="JavaScript">

function verifieForm() {
	var sto = new Array("", "", "", "");
	var erreur = false;

	if (document.rapporter.pseudo.value.search(/\w/) == -1) {
		sto[0] = "Tu n'as pas mis de pseudo.";
		erreur = true;}

	if (document.rapporter.email.value.search(/\w{1,}@(\w{1,}\.)+\w{2,3}/) == -1) {
		sto[1] = "Tu n'as pas mis ton e-mail.";
		erreur = true;}

	if (document.rapporter.ti.value.search(/\w/) == -1) {
		sto[2] = "Il n'y a pas de titre";
		erreur = true;}

	if (document.rapporter.txt.value.search(/\w/) == -1) {
		sto[3] = "Le message est trop court ou inexistant.";
		erreur = true;}

	if (erreur == true) {
		
		var message = "Le message n'a pas ete envoye car :\n"
			for (i = 0; i < sto.length; i ++) {
				if (sto[i].length != 0) {
					message += "- " + sto[i] + "\n";}}
		alert(message);}

		else  {
			document.rapporter.submit();}
}

</script>

<? htable("Poster une nouvelle !", "100%"); ?>

<p align="center">Contribue au site en postant une nouvelle.</p>
<? echo $ok; ?>

<form name="rapporter" action="poster.php" method="POST" onSubmit="verifieForm(); return false;">
<input type="hidden" name="ajn" value="1">
<table cellspacing="0" cellpadding="0" align="center" border="0" width="400">
<tr><td align="center" width="50%"><p align="center">Pseudo :</p></td><td align="center" width="50%"><p align="center">Email :</p></td></tr>
<tr><td align="center" width="50%"><input type="text" name="pseudo" size="20"></td><td align="center" width="50%"><input type="text" name="email" size="20"></td></tr>
<tr><td align="center" colspan="2"><p align="center">Titre du message :</p></td></tr>
<tr><td align="center" colspan="2"><input type="text" name="ti" size="30"></td></tr>
<tr><td align="center" colspan="2"><p align="center">La nouvelle :</p></td></tr>
<tr><td align="center" colspan="2"><textarea cols="35" rows="8" name="txt"></textarea></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="OK"></td></tr>
</table>
</form>

<? btable(); ?>

<p>&nbsp;</p>

<? include("include/bpage.txt"); ?>
