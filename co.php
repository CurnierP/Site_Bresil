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
$erreur = false;
//Connection au serveur MYSQL
				try
				{
					$bdd = new PDO('mysql:host=mysql-suivi-production-projet-bresil.alwaysdata.net;dbname=suivi-production-projet-bresil_4;charset=utf8', '108116', 'olchampion69', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}
				//Afficher l'erreur
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
				
//On verifie les champs de la table
if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['groupe']))
				{
					//Requête pour voir si le pseudo est dans la base de donnée
					$reponse = $bdd->query('SELECT * FROM membres WHERE username ="'.$_POST['username'].'"');
					$donnees = $reponse->fetch();
					
					//On verifie que le pseudo existe
					if(!empty($donnees['username']))
					{
					//On verifie que le mot de passe existe
					if($_POST['password'] != $donnees['password'])
					{
?>
<div class="message">Le mot de passe est incorrecte.<br />
<a href="connex.php">Se connecter</a></div>
<?php
                    $erreur = true; 
					}
					//On verifie le groupe de l'utilisateur
					if($_POST['groupe'] != $donnees['groupe'])
					{
?>
<div class="message">Le groupe est incorrecte.<br />
<a href="connex.php">Se connecter</a></div>
<?php
                    $erreur = true;					
					}
					}
					else
					{
?>
<div class="message">Le pseudo n'existe pas.<br />
<a href="connex.php">Se connecter</a></div>
<?php
                    $erreur = true;
					}
					if($erreur == false)
					{
						$_SESSION['username'] = $_POST['username'];
						$_SESSION['groupe'] = $_POST['groupe'];
?>
<div class="message">Vous êtes connecté.<br />
<a href="accueil.php">Votre espace</a></div>
<?php						
					}
				}
else 
{
?>
<div class="message">Tout les champs sont obligatoires.<br />
<a href="connex.php">Se connecter</a></div>
<?php
}	
					
$bdd = null;
	
?>
</html>