<html>
<?php
include_once('fonction.php');
include ('config.php');
//Connexion à la base de donnée différants paramétre pour la connexion
$PARAM_hote='mysql-suivi-production-projet-bresil.alwaysdata.net'; // le chemin vers le serveur
$PARAM_nom_bd='suivi-production-projet-bresil_4'; // le nom de votre base de données
$PARAM_utilisateur='108116'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='olchampion69'; // mot de passe de l'utilisateur pour se connecter
$connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
?> 
<meta charset="utf-8" />
<head>
<link  rel="Stylesheet" type="text/css" href="style.css">
<title>Gain réaliser la propriétaire</title>
</head>
<body>
<h1 align = center> Tableau de suivi du gain réaliser par le propriétaire grâce à l'installation: </h1><br />
<?php 
//Création du tableau qui doit contenir les données de productions
?>
<table align = center border="10px" width=80% height=100 >
<tr>
<th>Reseau/Consommation en Watt</th>
<?php
//Sélection de la table à utiliser
$sql = $connexion->prepare("SELECT * FROM production");
$sql->execute(array($demande = 2)) or die(print_r($sql->errorInfo())); 
?>
<?php
//Affichage des données dans les différantes cellules du tableau
while ($donnees = $sql->fetch(PDO::FETCH_BOTH))
{
?>
<tr>
<td align = center style='color:orange'><?php echo $donnees['reseau'] ?></td> 
</tr>
<?php
}
?>
</table>
<br />
<p align = "center" style='color:white';> Si la valeur de réseau est négative cela signifie que le propriétaire n'a pas droit à son crédit d'énergie, car la consommation est plus grande que la production.
</p>
<div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a> </div>
</body>
</html>
