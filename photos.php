<?

include("config.php");
include("fonctions.php");

include("include/hpage.txt");

// Creation de l'index des photos
$photo = array();
$dossier = opendir("photos/");
while ($fichier = readdir($dossier)) {
	if (is_file("photos/".$fichier)) {
		$photo[] = $fichier;}}
closedir($dossier);
sort($photo);

?>

<? htable($nom[2], "100%"); ?>

<?if (empty($id)) { ?>
<p align="center">S�lectionne un fichier dans la liste d�roulante ici-bas ou utilise les 2 fl�ches de navigation.</p>
<?
}
elseif (file_exists("photos/".$photo[($id - 1)]) && is_file("photos/".$photo[($id - 1)])) { ?>

<p align="center"><img src="photos/<? echo $photo[($id - 1)]; ?>" border="0" alt="<? echo $photo[($id - 1)]; ?>"></p>
<p align="center"><b><? echo $photo[($id - 1)]; ?></b><br>
(Fichier n�<? echo $id." - ".(round(filesize("photos/".$photo[($id - 1)]) / 120.4) / 10)." Ko"; ?>)</p>

<?
}
else {
?>
<p align="center">Le fichier demand� n'existe pas !</p>
<? } ?>

<? btable(); ?>

<p>&nbsp;</p>

<? htable("S�lectionne un fichier dans cette liste d�roulante", "100%"); ?>

<form name="liste" action="photos.php" method="GET">
<table cellspacing="0" cellpadding="5" border="0" align="center">
<tr>

<td><p><a href="photos.php?id=<? echo ($id - 1); ?>"><img src="graphics/gauche.gif" width="32" height="32" border="0" alt="Pr�c�dent"></a></p></td>
<td><select name="id" onChange="document.liste.submit();">
<option value="">Liste des fichiers</option>
<?

for ($i = 0; $i < count($photo); $i++) {
	echo "<option value=\"".($i + 1)."\">".$photo[$i]."</option>\n";}

?>
</select></td>
<td><p><a href="photos.php?id=<? echo ($id + 1); ?>"><img src="graphics/droite.gif" width="32" height="32" border="0" alt="Suivant"></a></p></td>

</tr>
</table>
</form>

<? btable(); ?>

<? include("include/bpage.txt"); ?>
