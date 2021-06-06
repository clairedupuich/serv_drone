<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style1.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	//requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title">Enregistrement des utilisateurs et système de connexion</h1>
    <h1 class="box-title">S'inscrire</h1>
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>

<footer>
        <div class="textFooterC">
            <div class="texFooter">
                <a href="" class="textFooterEle">Rubriques</a>
                <a href="" class="textFooterEle">Qui sommes-nous ? </a>
                <a href="" class="textFooterEle">Nos services</a>
                <a href="" class="textFooterEle">Évènements</a>
                <a href="" class="textFooterEle">Histoire</a>
                
                
            </div>
            <div class="texFooter">
                <a href="" class="textFooterEle">Support</a>
                <a href="" class="textFooterEle">Contact</a>
            </div>
            <div class="texFooter">
                <a href="" class="textFooterEle">Mentions légales</a>
                <a href="" class="textFooterEle">Conditions générales d’utilisation</a>
                <a href="" class="textFooterEle">Conditions générales de vente</a>
            </div>
        </div>
        <div class="iconsFooter">
               <img src="img/Vector 1.png" alt="" class="iconFooter">
               <img src="img/Vector2.png" alt="" class="iconFooter">
               <img src="img/Vector 3.png" alt="" class="iconFooter">
        </div>
    </footer>    
    <script src="cart.js"></script>
</body>
</html>