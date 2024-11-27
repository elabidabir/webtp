<?php
include '../back/compter.php';
?>
<!DOCTYPE html>
 <html>
	<head>
	<meta charset="utf-8">
		<title>A propos de nous : BabyStyle</title>
	<link rel="stylesheet" href="../style2.css"> 
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" href="../css/product.css">
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
			<a href="index.php"><img src="../logo.png" alt="" /></a>
		  </div>
		  <div class="header-list">
		  	<div class="search-bar">
				<form action="../back/rechercherPanier.php">
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
              </li>				<li><a class="active" href="http://localhost/tp_web/html/apropos.php">A propos</a></li>
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
		<table style="margin-top: 4.3cm;margin-bottom: 4.3;">
			<tr>
				<td style="width: 50%;">
					<img style="width: 100%;" src="https://img.freepik.com/photos-premium/heureuse-femme-enceinte-son-mari-choisissant-vetements-bebe-magasin-concept-magasinage_495423-37485.jpg?size=626&ext=jpg&ga=GA1.1.455479818.1695216685&semt=ais" alt="">
				</td>
				<td>
					<div style="margin-left: 20px;margin-right: 20px; font-size: 20px;text-align: justify;">
						<span style="margin-left: 30px;font-weight: bold;color: pink;font-size:30px;">BabyStyle</span>, 
						crée il y a un an, est devenue la référence pour les <br><br>parents
						attentifs au style et au confort de leurs tout-petits.<br><br><span style="margin-left: 30px;">
							Notre boutique</span> en ligne propose une collection minutieusement choisie <br><br>
							de vêtements pour bébés, alliant élégance et praticité. <br><br><span style="margin-left: 30px;">
								De la gigoteuse</span> aux ensembles assortis, chaque article offre confort et <br><br>style.
								<br><br><span style="margin-left: 30px;">Avec notre plateforme</span> conviviale, les parents peuvent facilement <br><br>parcourir 
								et acheter nos produits, bénéficiant de la garantie de qualité de <br><br>la marque BabyStyle. 
								<br><br><span style="margin-left: 30px;">Merci de nous accompagner dans cette première année d'aventure !</span><br><br>
					</div>
				</td>
			</tr>
		</table>
		<footer>
			<div id="footer">
			  <div class="contact">
				<a href="../index.html"><img src="../logo.png" alt="" /></a>
				<br> 
				<h3>Follow Us</h3>
				<br> 
				<div class="socials">
				  <a href="#"><i class="fa-brands fa-facebook-square"></i></a>
				  <a href="#"><i class="fa-brands fa-instagram"></i></a>
				</div>
			  </div>
			  <div class = "footer-distributed">
			  <div class="footer-left">
						  <h3>babyStyle</h3>
						  <p class="footer-company-name">Copyrights @2023</p>
					</div>
					<div class="footer-right">
						<p>Contact</p>
						  <form action="#" method="post">
							  <input type="text" name="email" placeholder="Email">
							  <textarea name="message" placeholder="Message"></textarea>
							  <button>envoyer</button>
						  </form>
					</div>
			</div>
		  </footer>
	<script>
		$.ajax({
        type: 'POST',
        url: '../back/ajouterPanier.php',
        data: {
            action: 'add_product',
            image_url: image_url,
            name: name,
            rating: rating,
            price: price
        },
        success: function (response) {
            // Mettez à jour le nombre dans la barre de navigation
            $('#cart-count').text(response);
        },
        error: function (error) {
            console.log('Erreur AJAX:', error);
        }
    });
// Fonction pour sauvegarder le contenu de l'input dans localStorage
function saveInput() {
    var motCleInput = document.getElementById('mot_cle_input').value;
    localStorage.setItem('mot_cle', motCleInput);
}
// Fonction pour récupérer la valeur depuis localStorage
function getSavedInput() {
    var savedMotCle = localStorage.getItem('mot_cle');
    return savedMotCle || "";
}
	</script>
</body>
</html>

