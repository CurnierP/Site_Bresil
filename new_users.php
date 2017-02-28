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
		<div class="content">
    <form action="inscription.php" method="post">
        Veuillez remplir ce formulaire pour vous inscrire:<br />
        <div class="center">
            <label for="username">Nom d'utilisateur</label><input type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <label for="password">Mot de passe<span class="small"> (6 caract&egrave;res min.) </span></label><input type="password" name="password" /><br />
            <label for="passverif">Mot de passe<span class="small"> (v&eacute;rification) </span></label><input type="password" name="passverif" /><br />
            <label for="email">Email</label><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
			<br/>
	       <b align = center >	Le groupe 1 est pour les internautes, le groupe 2 est pour le fournisseur et le groupe 3 est pour le propriétaire.	</b><br />
		   <br/>
		   Choisissez votre groupe:<br/>
		   <br/>
		   <input align = center type="radio" name="groupe" value="1"  checked="checked" /> <label for="1"> 1 </label><br />
		   <br/>
           <input type="radio" name="groupe" value="2" /> <label for="2"> 2 </label><br/>
		   <br/>
		   <input type="radio" name="groupe" value="3" /> <label for="3"> 3 </label><br/>
		   <br/>
            <input type="submit" value="Envoyer" />
		</div>
    </form>
</div>
		<div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a> </div>
	</body>
</html>