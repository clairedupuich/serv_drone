<?php
//Base de donnée
if(!empty($_POST["send"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$connexion = mysqli_connect("localhost", "claire", "claire", "servdrone",3308) or die("Erreur de connexion: " . mysqli_error($connexion));
	$result = mysqli_query($connexion, "INSERT INTO contact (name, email, subject, message) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $message. "')");
	if($result){
		$db_msg = "Vos informations de contact sont enregistrées avec succés.";
		$type_db_msg = "success";
	}else{
		$db_msg = "Erreur lors de la tentative d'enregistrement de contact.";
		$type_db_msg = "error";
	}
	
}
//l'envoie du mail
if(!empty($_POST["send"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$toEmail = "jps.co.ltd@gmail.com";
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $message, $mailHeaders)) {
	    $mail_msg = "Vos informations de contact ont été reçues avec succés.";
		$type_mail_msg = "success";
	}else{
		$mail_msg = "Erreur lors de l'envoi de l'e-mail.";
		$type_mail_msg = "error";
	}
}
?>


<html >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>	
	<script type="text/javascript" src="contact.js"></script>
</head>

<body>
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
    <section class="contenueContact">
        <section class="contact">
            <p class="contact_left">
                <span>
                Au plaisir de vous entendre</span><br>
                Adress: 80 Avenue Roland Moreno, 59410 Anzin<br>
                telephone:03 62 26 05 60<br><br>
                Horaire<br>
                matin: 9:00-- 12:00<br>
                aprè-midi: 13:30--5:00<br>
            </p>
            <img class="contact_img" src="img/istockphoto-1215773097-170667a.jpg">
        </section>
        <section>
           
        </section>
        <section id="cont" class="cont">
            <h2>contactez nous</h2>
            <div class="hform">
                <h3>Au plaisir de vous entendre</h1>
                    <p class="contat-p">Nous respectons votre vie privée, ne tolérons pas les spams, ne divulguerons pas
                        vos informations</p>
                    <form  class="contact-form "  id="form" enctype="multipart/form-data" onsubmit="return validate()" method="post">
                        <div class="nomemail">
                            <div class="form-nom">
                                <label for="name" class="fln nom"></label>
                                <input type="text" name="name" id="name" placeholder="Votre nom" class="name"
                                    required>
                            </div>

                            <div class="form-emil">
                                <label for="email" class="fln email"></label>
                                <input type="email" name="email" id="email" placeholder="Votre E-mail"
                                    class="name email" required>
                            </div>

                            <div class="form-emil">
                                <label for="subject" class="fln email"></label>
                                <input type="text" name="subject" id="subject" placeholder="Votre sujet"
                                    class="name email" required>
                            </div>
                        </div>

                        <div class="form-message">
                            <label for="message" class="fml"></label>
                            <textarea name="message" id="message" rows="8" class="textarea"
                                placeholder="Laissez votre message ici" required></textarea>
                        </div>
                        <div class="contact-submit">

                            <input type="submit" name="send" value="envoyer  message">

                        </div>
                        <div id="statusMessage"> 
                            <?php if (! empty($db_msg)) { ?>
                              <p class='<?php echo $type_db_msg; ?>Message'><?php echo $db_msg; ?></p>
                            <?php } ?>
                            <?php if (! empty($mail_msg)) { ?>
                              <p class='<?php echo $type_mail_msg; ?>Message'><?php echo $mail_msg; ?></p>
                            <?php } ?>
                            </div>
                    </form>
            </div>
        </section>
    </section>
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
</body>

</html>