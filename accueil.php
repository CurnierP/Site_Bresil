<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include('config.php');
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta charset="utf-8" />
        <title>Espace membre</title>
		<link  rel="Stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="logo.png" alt="Espace Membre" /></a> 
		</div>
        <div class="content">
<?php
//On affiche un message de bienvenue, si lutilisateur est connecte, on affiche son pseudo
try
				{
					$bdd = new PDO('mysql:host=mysql-suivi-production-projet-bresil.alwaysdata.net;dbname=suivi-production-projet-bresil_4;charset=utf8', '108116', 'olchampion69', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}
				//Afficher l'erreur
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
?>
Bonjour<?php if(isset($_SESSION['username'])){echo ' '.htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8');} ?>,<br />
Bienvenue sur notre site qui permet de suivre la production électrique du projet Brésil.<br />
Vous pouvez <a href="users.php"> voir la liste des utilisateurs</a>.<br /><br />
<?php
//Si lutilisateur est connecte, on lui donne un lien pour modifier ses informations, pour se deconnecter, et une ihm spécifique selon le groupe il fait parti.
if(isset($_SESSION['username']))
{
?>
<br/>
<a href="deco.php">Se déconnecter</a><br />
<br/>
<?php
if($_SESSION['groupe'] == 2)
{
?>
<a href="bdd.php">Production</a><br /> 
<?php
}
else
{
	echo '<br/>';
}
if($_SESSION['groupe'] == 3)
{
?>
<br />
Vous pouvez choisir les <a href="proprio.php"> options </a> que vous vous voulez diffuser aux internautes. <br /> 
<a href="bddproprio.php">Production</a><br /> 
<?php
}
else
{
}
if($_SESSION['groupe'] == 1 )
{
?>
Voici des informations pour les internautes <a href="internaute.php"> identifiers.</a></br>
<?php
}
else 
{
}
}
else
{

//Sinon, on lui donne un lien pour sinscrire et un autre pour se connecter
?>
<a href="new_users.php">Inscription</a><br />
<a href="connex.php">Se connecter</a><br />
Voici des informations pour les internautes <a href="internaute.php"> non identifier.</a></br>
<?php
}
?>
		</div>
	</body>
</html>