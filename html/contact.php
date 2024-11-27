<?php
include '../back/compter.php';
?>
<!DOCTYPE html>
 <html>
	<head>
	<meta charset="utf-8">
		<title>Contact : BabyStyle</title>
		<link rel="stylesheet" href="http://localhost/tp_web/css/contact.css">
		<link rel="stylesheet" href="http://localhost/tp_web/style2.css">
		<link rel="stylesheet" href="../css/product.css">
		<link rel="stylesheet" href="../css/contact.css">
	<script
      src="https://kit.fontawesome.com/0e53af926d.js"
      crossorigin="anonymous"
    ></script>
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
<body>

	<?php
            $servername = 'localhost';
            $username = 'tp_web';
            $password = 'tp_web';
            
            //On établit la connexion
            $conn = mysqli_connect($servername, $username, $password);
            
            //On vérifie la connexion
            if(!$conn){
                die('Erreur : ' .mysqli_connect_error());
            }
            //echo "Connexion réussie pour $username" ;
    ?>
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
                  <a href="#">Mon compte</a>
                  <ul>
                      <li><a href="../html/utilisateur.php">Client</a></li>
                      <li><a href="../html/administrateur.php">Administrateur</a></li>
                  </ul>
              </li>				
			  <li><a href="http://localhost/tp_web/html/apropos.php">A propos</a></li>
				<li><a class="active" href="http://localhost/tp_web/html/contact.php">Contact</a></li>
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
	</header>:
    <div class="container">
        <form id="contactForm" action="../back/contact2.php" method="post">
			<h2>Contactez-nous</h2>
			<label class="label" for="name">Nom :</label>
			<center><input class="input" type="text" id="name" name="name" placeholder="Votre nom" required></center>
		
			<label class="label" for="email">Email :</label>
			<center><input class="input" type="email" id="email" name="email" placeholder="exemple@gmail.com" required></center>

			<label class="label" for="message">Message :</label>
			<center><textarea class="textarea" id="message" name="message" placeholder="Votre message" required></textarea></center>
			<button class="button" type="submit" id="envoyerButton">Envoyer</button>
		</form>		
    </div>
	<script>
		document.getElementById("contactForm").addEventListener("submit", function (event) {
			event.preventDefault(); // Empêcher la soumission normale du formulaire
			
			var nom = document.getElementById("name").value;
			var email = document.getElementById("email").value;
			var message = document.getElementById("message").value;
	
			var formData = new FormData();
			formData.append("name", nom);
			formData.append("email", email);
			formData.append("message", message);
	
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "../back/contact2.php", true);
	
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4) {
					if (xhr.status === 200) {
						// Afficher une alerte en fonction de la réponse du serveur
						alert(xhr.responseText);
					} else {	
						// Afficher une alerte en cas d'erreur de la requête
						alert("Erreur lors de la soumission du formulaire.");
					}
				}
			};
			// Envoyer la requête avec les données du formulaire
			xhr.send(formData);
		});
	</script>
</body>
</html>
