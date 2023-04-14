<?

include("config.php");
include("fonctions.php");

include("include/hpage.txt");

if (!empty($pg)) {
	if (file_exists("include/articles/".$pg.".txt")) {
		include("include/articles/".$pg.".txt");}
	else {
		$titre_article = "Cette page n'existe pas !";
		$date_article = "inconnue";
		$contenu_article = "Cete page n'existe pas ! Cela vient soit d'une erreur de ta part, soit d'un problème dans le script.";
		$cat_article = "";
	}
}

if (empty($cat_article)) {
	$cat_article = "inconnue";}

?>

<? htable(stripSlashes($titre_article), "100%"); ?>



<p><? echo stripSlashes($contenu_article); ?></p>

<p><a href="imprimer.php?pg=<? echo stripSlashes($pg); ?>" target="_blank"><img src="graphics/imprimer.gif" border="0" width="16" height="15" alt="Imprimer la page" align="left"> Imprimer la page</a></p>
<p>Dernière modification le : <b><? echo stripSlashes($date_article); ?></b><br>
Catégorie : <b><? echo stripSlashes($cat_article); ?></b></p>

<? btable(); ?>

<? include("include/bpage.txt"); ?>
