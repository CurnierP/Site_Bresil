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
		<form action="option.php" method="post">
		<div class="center">
		  Les internautes peuvent ils consulter la production: <br/>
		   <br/>
		   <input align = center type="radio" name="production" value="oui"  checked="checked" /> <label for="oui"> Oui </label><br />
		   <br/>
           <input type="radio" name="production" value="non" /> <label for="non"> Non </label><br/>
		   <br/>
		   <br/>
		Les internautes peuvent ils voir le gain (crédit d'énergie) que vous avez réalisé:<br />
		 <br/>
		   <input align = center type="radio" name="gain" value="oui"  checked="checked" /> <label for="oui"> Oui </label><br />
		   <br/>
           <input type="radio" name="gain" value="non" /> <label for="non"> Non </label><br/>
		   <br/>
		   <input type="submit" value="Envoyer" />
		<div/>
		<form />
		<div />
		<div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a> </div>
	</body>
</html>