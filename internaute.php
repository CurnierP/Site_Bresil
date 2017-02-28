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
<?php
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


					//Requête pour selectionner les dernieres choses que veux diffuser le proprietaire de l'instalation
					$reponse = $bdd->query('SELECT * FROM `ihm_proprietaire` WHERE id = (select max(id) from ihm_proprietaire)');
					$donnees = $reponse->fetch();
?>					
<div class="center">
<?php					
					if($donnees['production'] == "oui")
					{
?>
<a href="bddinternaute.php">Production</a><br /> 
<?php
					}
					else
					{
						echo "Vous n avez pas le droit de consulter la production <br />";
					}
					if($donnees['gain'] == "oui")
					{
?>
<a href="gain.php">Gain</a><br /> 
<?php
					}
					else
					{
						echo "Vous n avez pas le droit de voir le gain du proprietaire <br />";
					}
?>
<br />
<br />
Vous pouvez aussi voir de quoi est composée l'
<a href="instalation.php">installation</a><br />
</div>	
		<div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a> </div>
	</body>
</html>