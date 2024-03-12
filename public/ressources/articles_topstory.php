
<!-- Page Top Story créée par Arkalium, merci de respecter mon travail. -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head> 
<meta http-equiv="content-type" content="text/html; charset=ISO 5589-1" /> 
<title><?PHP echo $sitename; ?>: <?PHP echo $pagename; ?></title>

<script src="<?PHP echo $imagepath; ?>static/js/libs2.js" type="text/javascript"></script>
<script src="<?PHP echo $imagepath; ?>static/js/visual.js" type="text/javascript"></script>
<script src="<?PHP echo $imagepath; ?>static/js/libs.js" type="text/javascript"></script>
<script src="<?PHP echo $imagepath; ?>static/js/common.js" type="text/javascript"></script>
<script src="<?PHP echo $imagepath; ?>static/js/fullcontent.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?PHP echo $imagepath; ?>v2/styles/style.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo $imagepath; ?>v2/styles/buttons.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo $imagepath; ?>v2/styles/boxes.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo $imagepath; ?>v2/styles/tooltips.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo $imagepath; ?>v2/styles/changepassword.css" type="text/css" />
<link rel="stylesheet" href="<?PHP echo $imagepath; ?>v2/styles/process.css" type="text/css" />
<link rel="shortcut icon" href="<?PHP echo $imagepath; ?>favicon.ico" type="image/vnd.microsoft.icon" /> 

<style>
body {
color:black;
background-color:white;
background-image:url(/web-gallery/v2/images/bg.png);
}
</style>

<div id="container"> 
<div class="cbb process-template-box clearfix"> 

<br \>

<center><img src="/image_data/topstory.gif"></center>

<br \>

<center>
&raquo; Bienvenue sur la page sp&eacute;cialement con&ccedil;u pour les news d'Habby. :) 
<br \>Pour copier l'adresse d'une des images ci-dessous, faite un clique droit et cliquer sur "Copier l'adresse de l'image" ou un truc du m&ecirc;me type. 
<br \>(Cela d&eacute;pend du navigateur que tu utilises) <img align="middle" src="/image_data/frank_com.gif">
<br \>Derni&egrave;re mise &agrave; jour des images top story: <?PHP include("./template/updatenews.php"); ?>
<br \>Lien utile: <a href="/articles_images.php">Gallery d'images
</center>

<br \>

<!-- DEBUT PHP IMAGES -->
<?php
$dir = './img/news/';
$image_largeur = 790;
$valide_extensions = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

$Ressource = opendir($dir);
while($fichier = readdir($Ressource))
{
    $berk = array('.', '..');

    $test_Fichier = $dir.$fichier;

    if(!in_array($fichier, $berk) && !is_dir($test_Fichier))
    {
$ext = strtolower(pathinfo($fichier, PATHINFO_EXTENSION));

        if(in_array($ext, $valide_extensions))
        {
            echo '
                <div style="float:right; width:'.$image_largeur.'px; margin-right:10px">
                   <br \> <a href="/'.$test_Fichier.'" target="_blank"><img src="'.$test_Fichier.'" style="'.$image_largeur.'px" /><img src="/image_data/save.png" align="middle" /></a><small> Clique sur l\'image pour enregistrer le lien !</small>
                </div>';
        }
    }
}
?>
<!-- FIN PHP IMAGES -->

<script type="text/javascript"> 
HabboView.run();

</script>

</div>
</div>
</div>
</div>