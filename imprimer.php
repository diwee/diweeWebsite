<?

include("config.php");

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

<html>

<head>
<title><? echo stripSlashes($site[0]); ?> - <? echo stripSlashes($titre_article); ?> - Version imprimable</title>
<style type="text/css">

p {margin: 5px; font-size: 14px; font-family: Arial, sans-serif; color: #000000;}
h1 {margin: 5px; font-size: 28px; font-family: Arial, sans-serif; color: #000000;}
h3 {margin: 5px; font-size: 18px; font-family: Arial, sans-serif; color: #000000;}
a {color: #000000; text-decoration: underline;}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF">

<h1 align="center"><? echo stripSlashes($site[0]); ?></h1>
<p align="center"><? echo stripSlashes($site[3]); ?></p>
<h3 align="center"><? echo stripSlashes($titre_article); ?> (<? echo stripSlashes($cat_article); ?>)</h3>

<p><? echo stripSlashes($contenu_article); ?></p>

</body>
