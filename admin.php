<?

include("mdp.php");

$novisites = 1;

if ($pass == $mdp) {
	setcookie("phortailAdmin", $mdp, time() + (3600*24*30));}
	
elseif ($logout == 1) {
	setcookie("phortailAdmin", "");
	header("Location: admin.php");}

?>


<?

if (($HTTP_COOKIE_VARS["phortailAdmin"] == $mdp || $pass == $mdp) && empty($pg)) {

include("config.php");
include("fonctions.php");
include("include/hpage.txt");

htable("Admin - Sélectionne une option", "100%"); ?>

<p align="center"><b>Bienvenue dans ta zone d'administration !</b></p>
<p align="center">C'est là que tu peux modifier ton site : changer les couleurs, ajouter ou supprimer des articles, créer des liens ...<br>
Pour revenir sur cette page, clique sur "retour".</p>

<table cellspacing="0" cellpadding="0" border="0" align="center">

<tr>
<td nowrap><p align="center"><a href="admin.php?pg=stats"><img src="graphics/stats.gif" width="22" height="22" alt="Stats" border="0"><br>Stats</a></p></td>
<td nowrap><p align="center"><a href="admin.php?pg=downloads"><img src="graphics/download.gif" width="22" height="22" alt="Downloads" border="0"><br>Downloads</a></p></td>
<td nowrap><p align="center"><a href="admin.php?pg=liens"><img src="graphics/liens.gif" width="22" height="22" alt="Liens" border="0"><br>Liens</a></p></td>
</tr>
</table>

<p>&nbsp;</p>

<table cellspacing="0" cellpadding="0" border="0" align="center">

<tr>
<td nowrap><p align="center"><a href="admin.php?pg=homepage"><img src="graphics/homepage.gif" width="32" height="32" alt="Homepage" border="0"><br>Homepage</a></p></td>
<td nowrap><p align="center"><a href="admin.php?pg=spe"><img src="graphics/spe.gif" width="32" height="32" alt="Spécial !" border="0"><br>Spécial !</a></p></td>
<td nowrap><p align="center"><a href="admin.php?pg=nouvelles"><img src="graphics/nouvelle.gif" width="32" height="32" alt="Nouvelles" border="0"><br>Nouvelles</a></p></td>
</tr>

<tr>
<td nowrap><p align="center"><a href="admin.php?pg=articles"><img src="graphics/article.gif" width="32" height="32" alt="Articles" border="0"><br>Articles</a></p></td>
<td nowrap><p align="center"><a href="admin.php?pg=sondage"><img src="graphics/sondage.gif" width="32" height="32" alt="Sondage" border="0"><br>Sondage</a></p></td>
<td nowrap><p align="center"><a href="admin.php?pg=footer"><img src="graphics/foot.gif" width="32" height="32" alt="Pied de page" border="0"><br>Pied de page</a></p></td>
</tr>

<tr>
<td nowrap><p>&nbsp;</p></td>
<td nowrap><p align="center"><p align="center"><a href="admin.php?pg=config"><img src="graphics/config.gif" width="32" height="32" alt="Configuration" border="0"><br>Configuration</a></p></p></td>
<td nowrap><p>&nbsp;</p></td>
</tr>

</table>

<p align="center"><b><a href="admin.php?logout=1">DECONNECTION</a></b></p>

<?

btable();
include("include/bpage.txt");

}
elseif ($HTTP_COOKIE_VARS["phortailAdmin"] == $mdp && !empty($pg)) {

?>

<?

if (file_exists("include/admin/".$pg.".txt")) {
	include("include/admin/".$pg.".txt");}
else {
	echo "<p align=\"center\"><b>ERREUR !</b> Cette option n'existe pas !</p>";}


?>

<p align="center"><a href="admin.php">Retour</a></p>
<p align="center"><b><a href="admin.php?logout=1">DECONNECTION</a></b></p>

<?

}
else {

include("config.php");
include("fonctions.php");
include("include/hpage.txt");
htable("Admin - Entre ton mot de passe", "100%"); ?>

<form action="admin.php" method="POST">
<table cellspacing="0" cellpadding="0" border="0" align="center">

<tr><td align="center" nowrap><p align="center"><b>Mot de passe :</b></p></td></tr>
<tr><td align="center" nowrap><p align="center"><input type="password" name="pass" size="15"> <input type="submit" value="Connection"></p></td></tr>

</table>
</form>

<p align="center"><b>Attention !</b> La connection se fait pour un mois. Il est possible de se déconnecter dans la zone d'admin.</p>

<?
btable();
include("include/bpage.txt");
?>


<? } ?>
