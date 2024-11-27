<?php
include '../back/compter.php';
?>
<!DOCTYPE html>
 <html>
	<head>
	<meta charset="UTF-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
  		  <link rel="stylesheet" href="http://localhost/tp_web//style2.css">
	    	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		    <script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
		    <script type="text/javascript" src="../js/onsubmit_loginEvent.js"></script>	
		    <link rel="stylesheet" href="http://localhost/tp_web//css/product.css">
        <title>Produits : BabyStyle</title>
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
				<form action="../back/rechercherProduit.php">
					<input type="text" name="mot_cle" placeholder="Rechercher un produit" />
                	<button class="rechercher" type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>
            </div>
			<nav class="header-list-nav">
			  <ul>
				<li><a href="http://localhost/tp_web//index.php">Acceuil</a></li>
				<li><a class="active" href="http://localhost/tp_web/html/product.php">Produits</a></li>
				<li>
                  <a href="#">Mon compte</a>
                  <ul>
                      <li><a href="../html/utilisateur.php">Client</a></li>
                      <li><a href="../html/administrateur.php">Administrateur</a></li>
                  </ul>
              </li>				<li><a href="http://localhost/tp_web/html/apropos.php">A propos</a></li>
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
	  <?php
// Connexion à la base de données (à adapter selon votre configuration)

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
function afficherProduit(String $categorie) {
  $servername = "localhost";
  $username = "tp_web";
  $password = "tp_web";
  $dbname = "tp_web";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT id,image_url, name, price, rating FROM products WHERE categorie = '$categorie'";
  $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<div class='product-cart' id='product1'>
			<img src='".$row["image_url"]."' alt='product image' />";
			echo "<span>Eurobuy</span>
			<h4 class='nom'>".$row["name"]."</h4>
			<div class='stars'>";
			for ($i = 0; $i < $row["rating"]; $i++) { 
				echo "<i class='fa-solid fa-star'></i>";
		 	}
			echo "</div>
			<h4 class='price'>".$row["price"]." MAD</h4>";
			?>
			<a href='#' class='buy-icon' data-product-id='<?php echo $row["id"]; ?>' onclick='addToCart(<?php echo $row["id"]; ?>)'><i class='fa-solid fa-cart-shopping'></i></a>
			<?php
			echo "</div>";
		}
	}
	$conn->close();
}
?>
<section class='product-section section-p1'>
			<h1>Nos produits</h1>
      <p style='color:black;margin-top:2cm;'>Combinaison</p>
      <p style='color:skyblue'>Garçon</p>
			<div class='pro-collection'>
        <?php afficherProduit("combinaison garçon");?>
      </div>
</section>
<section class='product-section section-p1'>
      <p style='color:pink'>Fille</p>
			<div class='pro-collection'>
        <?php afficherProduit("combinaison fille");?>
      </div>
</section>
<section class='product-section section-p1'>
      <p style="color:black">Survettes</p>
			<div class='pro-collection'>
        <?php afficherProduit("survette garçon");?>
      </div>
</section>
<section class='product-section section-p1'>
      <p style="color:black">Robes</p>
			<div class='pro-collection'>
        <?php afficherProduit("robe fille");?>
      </div>
</section>
<section class='product-section section-p1'>
      <p style="color:black">Pyjamas</p>
      <p style="color:skyblue">Garçon</p>
			<div class='pro-collection'>
        <?php afficherProduit("pyjama 2 pièces");?>
      </div>
</section>
<section class='product-section section-p1'>
      <p style='color:pink'>Fille</p>
			<div class='pro-collection'>
        <?php afficherProduit("pyjama 2 pièces fille");?>
      </div>
</section>
<section class='product-section section-p1'>
      <p style="color:black;">Bodies</p>
			<div class='pro-collection'>
        <?php afficherProduit("body garçon");
              afficherProduit("boutton fille");
        ?>
      </div>
</section>
<section class='product-section section-p1'>
      <p style="color:black;">Chaussettes & Bonnets</p>
			<div class='pro-collection'>
        <?php afficherProduit("chaussette");
              afficherProduit("bonnet");
        ?>
      </div>
</section>
<section class='product-section section-p1'>
      <p style="color:black;">Produits bébés</p>
			<div class='pro-collection'>
        <?php afficherProduit("produits bébé");?>
      </div>
</section>
	<script>
function addToCart(productId) {
	console.log('Adding product to cart:', productId);
    // Sélectionnez le lien du produit en fonction de l'ID
    var productLink = $('.buy-icon[data-product-id="' + productId + '"]');

    // Récupérez les informations du produit en naviguant dans le DOM
    var image_url = productLink.siblings('img').attr('src');
    var name = productLink.siblings('.nom').text();
    var ratingText = productLink.siblings('.stars').html(); // Ou vous pouvez ajuster selon la structure exacte de votre HTML
    var priceText = productLink.siblings('.price').text();

    // Extrait les chiffres et la virgule du prix
    var priceMatch = priceText.match(/[0-9,]+/);

    // Vérifiez si match a trouvé une correspondance avant de convertir en nombre
    var price = priceMatch ? parseFloat(priceMatch[0].replace(',', '.')) : null;

    // Extrait le rating comme nombre entier (par exemple, à partir d'une chaîne comme "<i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i>")
    var ratingMatch = ratingText.match(/fa-star/g);

    // Vérifiez si match a trouvé une correspondance avant de calculer le rating
    var rating = ratingMatch ? ratingMatch.length : 0;

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
	window.location.reload();
}
	</script>
</body>
</html>