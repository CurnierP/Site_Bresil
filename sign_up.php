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
//On verifie que le formulaire a ete envoye
if(isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'] and $_POST['username']!='')
{
	//On enleve lechappement si get_magic_quotes_gpc est active
	if(get_magic_quotes_gpc())
	{
		$_POST['username'] = stripslashes($_POST['username']);
		$_POST['password'] = stripslashes(md5($_POST['password']));
		$_POST['passverif'] = stripslashes(md5($_POST['passverif']));
		$_POST['email'] = stripslashes($_POST['email']);
	}
	//On verifie si le mot de passe et celui de la verification sont identiques
	if($_POST['password']==$_POST['passverif'])
	{
		//On verifie si le mot de passe a 6 caracteres ou plus
		if(strlen($_POST['password'])>=6)
		{
			//On verifie si lemail est valide
			if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
			{
				//On echape les variables pour pouvoir les mettre dans une requette SQL
				$username = htmlspecialchars(stripslashes($_POST['username']));
				$password = htmlspecialchars(stripslashes($_POST['password']));
				$email = htmlspecialchars(stripslashes($_POST['email']));
				//On verifie sil ny a pas deja un utilisateur inscrit avec le pseudo choisis
				$dn = htmlspecialchars(stripslashes('select id from users where username="'.$username.'"'));
				if($dn==0)
				{
					//On recupere le nombre dutilisateurs pour donner un identifiant a lutilisateur actuel
					$dn2 = mysql_num_rows(mysql_query('select id from membres'));
					$id = $dn2+1;
					//On enregistre les informations dans la base de donnee
					if(mysql_query('insert into membres(id, username, password, email) values ('.$id.', "'.$username.'", "'.$password.'", "'.$email.'")'))
					{
						//Si ca a fonctionne, on naffiche pas le formulaire
						$form = false;
?>
<div class="message">Vous avez bien &eacute;t&eacute; inscrit. Vous pouvez dor&eacute;navant vous connecter.<br />
<a href="connexion.php">Se connecter</a></div>
<?php
					}
					else
					{
						//Sinon on dit quil y a eu une erreur
						$form = true;
						$message = 'Une erreur est survenue lors de l\'inscription.';
					}
				}
				else
				{
					//Sinon, on dit que le pseudo voulu est deja pris
					$form = true;
					$message = 'Un autre utilisateur utilise d&eacute;j&agrave; le nom d\'utilisateur que vous d&eacute;sirez utiliser.';
				}
			}
			else
			{
				//Sinon, on dit que lemail nest pas valide
				$form = true;
				$message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
			}
		}
		else
		{
			//Sinon, on dit que le mot de passe nest pas assez long
			$form = true;
			$message = 'Le mot de passe que vous avez entr&eacute; contien moins de 6 caract&egrave;res.';
		}
	}
	else
	{
		//Sinon, on dit que les mots de passes ne sont pas identiques
		$form = true;
		$message = 'Les mots de passe que vous avez entr&eacute; ne sont pas identiques.';
	}
}
else
{
	$form = true;
}
if($form)
{
	//On affiche un message sil y a lieu
	if(isset($message))
	{
		echo '<div class="message">'.$message.'</div>';
	}
	//On affiche le formulaire
?>
<div class="content">
    <form action="sign_up.php" method="post">
        Veuillez remplir ce formulaire pour vous inscrire:<br />
        <div class="center">
            <label for="username">Nom d'utilisateur</label><input type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <label for="password">Mot de passe<span class="small"> (6 caract&egrave;res min.) </span></label><input type="password" name="password" /><br />
            <label for="passverif">Mot de passe<span class="small"> (v&eacute;rification) </span></label><input type="password" name="passverif" /><br />
            <label for="email">Email</label><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <input type="submit" value="Envoyer" />
		</div>
    </form>
</div>
<?php
}
?>
		<div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a> - <a href="http://www.supportduweb.com/">Support du Web</a></div>
	</body>
</html>