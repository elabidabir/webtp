<?php
include '../back/compter.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/register.css">
		<link rel="stylesheet" href="../style2.css">
		<link rel="stylesheet" href="../css/product.css">
		<script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/onsubmit_event.js"></script>	
        <title>Création d'un compte admin : BabyStyle</title>
		<link rel="stylesheet" href="../css/footer.css">
		<style>
    /* Ajoutez du style pour rendre la liste déroulante agréable à voir */
    .header-list-nav ul ul {
      display: none;
      position: absolute;
      background-color: #fff;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .header-list-nav ul li:hover > ul {
      display: inherit;
    }

    .header-list-nav ul ul li {
      width: 100%;
      float: none;
    }

    .header-list-nav ul ul a {
      padding: 8px;
      color: #333;
      text-decoration: none;
      display: block;
    }

    .header-list-nav ul ul a:hover {
      background-color: #f5f5f5;
    }
  </style>
    </head>
	<header>
		<div id="header">
		  <div class="header-logo">
			<a href="#"><img src="../logo.png" alt="logo"></a>
		  </div>
		  <div class="header-list">
		  	<div class="search-bar">
				<form action="../back/rechercherProduit.php">
					<input type="text" name="mot_cle" placeholder="Rechercher un produit" />
                	<button class="rechercher" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>
            </div>
			<nav class="header-list-nav">
			  <ul>
				<li><a href="http://localhost/tp_web/index.php">Acceuil</a></li>
				<li><a href="http://localhost/tp_web/html/product.php">Produits</a></li>
				<li>
                  		<a class="active" href="#">Mon compte</a>
                  	<ul>
                      <li><a href="../html/utilisateur.php">Client</a></li>
                      <li><a href="../html/administrateur.php">Administrateur</a></li>
                  	</ul>
              		</li>					
					<li><a href="http://localhost/tp_web/html/apropos.php">A propos</a></li>
				<li><a href="http://localhost/tp_web/html/contact.php">Contact</a></li>
			  </ul>
			</nav>
			<div class="header-list-icon">
				<a href="../back/afficherPanier.php" id="cart-icon">
					<i class="fa fa-bag-shopping"></i>
					<div class="cart-count-container">
						<span id="cart-count" class="cart-count-superscript"><?php echo $cartCount; ?></span>
					</div>
				</a>
			</div>			
		  </div>
		</div>
	</header>
    <body>
        <div class="insc">
			<div class="form">
				<h3 class="titre">Creation d'un compte</h3>
				<br><br>
				<form action="http://localhost/tp_web/back/registerAdmin2.php" method="post" onsubmit="return ValidationEvent();">
					<label>Nom :</label>
					<input type="text" name="lastname" id="nom" placeholder="Entrer votre nom"><br><br>
	
					<label>Prenom:</label>
					<input type="text" name="firstname" id="prenom"  placeholder="Entrer votre Prenom "><br><br>
	
					<label>E-mail:</label>
					<input type="email" name="email" id="mail" placeholder="Entrer votre Adresse E-mail "><br><br>
					
					<label>Login :</label>
					<input type="text" name="login" id="login" placeholder="Entrer votre login "><br><br>
					
					<label>Mot de passe :</label>
					<input type="text" name="pwd" id="pwd" placeholder="Entrer votre mot de passe "><br><br>
					
					<label>Confirmation :</label>
					<input type="text" name="pwdConfirm" id="pwdConfirm" placeholder="Confirmation mot de passe">
					
					<div class="valide">			
						<input class="button button1" type="submit" name="insert" value="Enregistrer"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						<a href="#" class="btn" onclick="window.history.go(-1)">Précédent</a>
						<br><br>
					</div>
					
				</form>
			</div>
	</div>
</body>
</html>
    