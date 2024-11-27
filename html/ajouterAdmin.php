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
    <title>Création d'un compte utilisateur : BabyStyle</title>
		<link rel="stylesheet" href="../css/footer.css">
    <style>
.container {
  background: skyblue;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 50%;
  height: 35cm;
	font: bold 16px sans-serif;
	text-align: left;
	padding: 25px 30px 20px;
	overflow: hidden;
	margin-top:3cm;
	border-radius: 30px 30px 30px 30px;
}

form {
    max-width: 400px;
    margin: 0 auto;
}

label {
    display: block;
    margin-top: 10px;
    color: white;
    margin-bottom: 20px;
    margin-top: 20px;
    font-size:20px;
}

.container input, .container textarea {
  display: block;
	border-radius: 20px;
	box-sizing: border-box;
	background-color:  white;
	box-shadow: 0 1px 0 0 rgba(255, 255, 255, 0.1);
	border: none;
	resize: none;
	font: inherit;
	font-size: 16px;
	font-weight: normal;
	color:  black;
  font-weight:bold;
	width: 400px;
	padding: 18px;
  border:1px solid black;
}

h2 {
    text-align: center;
    color: white;
    margin-top 1cm;
}

button {
  border-radius: 20px;
	background-color: white;
	color: black;
	padding: 15px 50px;
	font-weight: bold;
	float: right;
  margin-top:1cm;
  border:1px solid black;
}

button:hover {
    background-color: black;
	  color: white;
}
input{
	height: 55px;
	margin-bottom: 15px;
}
textarea{
	height: 100px;
	margin-bottom: 20px;
}
h1{
            margin-top:5cm;
            text-align:center;
            margin-bottom:2cm;
        }
    .header-list-nav ul ul {
      display: none;
      position: absolute;
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
    p{
      font-size: 16px;
      color: black;
      margin: 15px 0 20px 0;
    }

    </style>
    </style>
    </head>
	<header>
		<div id="header">
		  <div class="header-logo">
			<a href="#"><img src="../logo.png" alt="logo"></a>
		  </div>
		  <div class="header-list">
			<nav class="header-list-nav">
			<ul>
				<li><a href="http://localhost/tp_web/html/pageAdmin.php">Produits</a></li>
				<li><a href="http://localhost/tp_web/back/ajouter.php">Ajouter un produit</a></li>
				<li>
                  <a href="#">Gérer</a>
                  <ul>
                      <li><a href="ajouterAdmin.php">Administrateurs</a></li>
                      <li><a href="afficherUser.php">Utilisateurs</a></li>
                  </ul>
              </li>    
			</ul>
			</nav>			
		  </div>
		</div>
	</header>
    <body>
        <div class="insc">
          <center>
            <div class="container">
				    <h2>Creation d'un compte administrateur</h2>
				    <form action="http://localhost/tp_web/back/ajouterAdmin2.php" method="post" onsubmit="return ValidationEvent();">
					    <label>Nom :</label>
					    <input type="text" name="lastname" id="nom" placeholder="Entrer le nom de l'utilisateur">
					    <label>Prenom:</label>
					    <input type="text" name="firstname" id="prenom"  placeholder="Entrer le prenom de l'utilisateur">
					    <label>E-mail:</label>
					    <input type="email" name="email" id="mail" placeholder="Entrer votre Adresse E-mail de l'utilisateur">
					    <label>Login :</label>
					    <input type="text" name="login" id="login" placeholder="Entrer votre login de l'utilisateur">
					    <label>Mot de passe :</label>
					    <input type="text" name="pwd" id="pwd" placeholder="Entrer votre mot de passe de l'utilisateur">
					    <label>Confirmation :</label>
					    <input type="text" name="pwdConfirm" id="pwdConfirm" placeholder="Confirmation mot de passe de l'utilisateur">
					    <div class="valide">			
						  <button type="submit" name="insert">Enregistrer</button>
						  <button class="btn" onclick="window.history.go(-1)" style="margin-right:20px;">Précédent</button>
          	</form>
          </center>
			  </div>									
			</div>
	</div>
</body>
</html>
    