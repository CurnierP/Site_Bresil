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

//On se connecte a la base de données
             $erreur = false; 
			 
				try
				{
					$bdd = new PDO('mysql:host=mysql-suivi-production-projet-bresil.alwaysdata.net;dbname=suivi-production-projet-bresil_4;charset=utf8', '108116', 'olchampion69', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}
				//Afficher l'erreur
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
				//Test pour voir si les champs sont valides
				if(
				!empty($_POST['production']) && !empty($_POST['gain']))
				{
		
				//Requête
					$reponse = $bdd->query('SELECT * FROM ihm_proprietaire');
					
					if($erreur == false)
					{
						$req = $bdd->prepare('INSERT INTO ihm_proprietaire (production,gain) VALUES(?,?)');
						$req->execute(array($_POST['production'], $_POST['gain']));
						
?>
<div class="message">Tout est en ordre vous avez bien valider vos choix de publications pour les internautes.<br />
<a href="accueil.php">Accueil</a></div>
<?php
					}		
				}
				else
				{
?>
<div class="message">Une erreur est survenue.<br />
<a href="proprio.php">Votre espace</a></div>
<?php					
				}
?>
		<div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a> </div>
	</body>
</html>