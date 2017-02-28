<?php
include('config.php');
?> 
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link  rel="Stylesheet" type="text/css" href="style.css">
        <title>Connection</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="logo.png" alt="Espace Membre" /></a> 
	    </div>
		<div class="content">
    <form action="co.php" method="post">
        Veuillez entrer vos identifiants pour vous connecter:<br />
        <div class="center">
            <label for="username">Nom d'utilisateur </label><input type="text" name="username" id="username" /><br />
            <label for="password">Mot de passe </label><input type="password" name="password" id="password" /><br />
			<label for="groupe">Groupe </label><input type="text" name="groupe" id="groupe" /><br />
            <input type="submit" value="Connection" />
		</div>
    </form>
</div>
	<div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a></div>
	</body>
</html>