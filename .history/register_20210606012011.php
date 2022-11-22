<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="lr.css" />
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

<header>
        <section class="navLogo">
            <a href="aceuille.html"><img src="img/Group 5.png" class="logo"></a> 
            <div class="navAndIcon">
                <ul class="nav">
                    <li class=""> <a href="qui_somme_nous.html"> Qui sommes-nous ?</a></li>
                    <li class=""> <a href="nos_produit_js.html"> Nos services</a></li>
                    <li class=""> <a href="his.html"> Histoire</a></li>
                    <li class=""> <a href="evenements.html"> Évènements</a></li>
                    <li class=""> <a href="support.html"> Support</a></li>
                    <li class=""> <a href="contact.php"> Contact</a></li>

                </ul>

                <div class="iconHeader">
                  <a href="" class="iconHaut"><img src="img/Vector.png" alt=""></a>
                  <a href="" class="iconHaut"><img src="img/Vector(1).png" alt=""></a>
                  <a href="" class="iconHaut espace_ic"><img src="img/Vector(2).png" alt=""></a>

                  <a href="login.php" class="iconHaut espace_ico "><img src="img/conecter.png" class="ico_right" alt=""></a>
          <a href="register.php" class="iconHaut"><img src="img/inscrir.png" class="ico_right" alt=""></a>
         
          <div class="dropdown iconHaut">
            <a href="" class="weight-light" id="cart-link">
                <img src="img/panier.png" class="ico_right" alt="" >
                <span id="nb-cart-items"></span>
            </a>
            <div class="dropdown-content">
              <h2 class="title-medium center">Votre Panier</h2>
              <div id="panier">
                
              </div>
              <p id="total"></p>
            </div>
          </div>
        </div>
      </div>
    </section>
        <section class="grandImg">
            <h2>Serv’Drone</h2>
            <p class="inHeaderP">Petite phrase d’accroche lorem ipsum s simply dummy text 
                of the printing and typesetting industry.</p>
        </section>
    </header>

<form class="box" action="" method="post">
	<h1 class="box-title">Enregistrement des utilisateurs et système de connexion <br><br><br>S'inscrire <br></h1>
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