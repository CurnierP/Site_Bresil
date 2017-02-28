<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include('config.php');
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link  rel="Stylesheet" type="text/css" href="style.css">
        <title>Inscription</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="logo.png" alt="Espace Membre" /></a> 
	    </div>
<?php
//Si lutilisateur est connecte, on le deconecte
if(isset($_SESSION['username']))
{
	//On le deconecte en supprimant simplement les sessions username et userid
	unset($_SESSION['username'], $_SESSION['userid']);
?>
<div class="message">Vous avez bien &eacute;t&eacute; d&eacute;connect&eacute;.<br />
<a href="<?php echo $url_home; ?>">Accueil</a></div>
<?php
}
?>
		<div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a></div>
	</body>
</html>