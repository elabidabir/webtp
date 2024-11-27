<?php
include 'back/compter.php';
?>
<!DOCTYPE html>
 <html>
	<head>
		<title>Accueil : BabyStyle</title>
	<link rel="stylesheet" type="text/css" href="style2.css"> 
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
  <style>
    /* Ajoutez du style pour rendre la liste déroulante agréable à voir */
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
  <link rel="stylesheet" href="http://localhost/tp_web/css/product.css">
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
          <a href="index.php"><img src="logo.png" alt="" /></a>
        </div>
        <div class="header-list">
          <div class="search-bar">
            <form action="back/rechercherProduit.php">
              <input type="text" name="mot_cle" id="mot_cle_input" placeholder="Rechercher un produit" />
              <button class="rechercher" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>
          <nav class="header-list-nav">
            <ul>
              <li><a class="active" href="../index.php">Acceuil</a></li>
              <li><a href="http://localhost/tp_web/html/product.php">Produits</a></li>
              <li>
                  <a href="#">Mon compte</a>
                  <ul>
                      <li><a href="html/utilisateur.php">Client</a></li>
                      <li><a href="html/administrateur.php">Administrateur</a></li>
                  </ul>
              </li>
              <li><a href="http://localhost/tp_web/html/apropos.php">A propos</a></li>
              <li><a href="http://localhost/tp_web/html/contact.php">Contact</a></li>
            </ul>
          </nav>
          <div class="header-list-icon">
					  <a href="back/afficherPanier.php" id="cart-icon">
  						<i class="fa fa-bag-shopping"></i>
						  <div class="cart-count-container">
                  <span id="cart-count" class="cart-count-superscript"><?php echo $cartCount; ?></span>
						  </div>
					  </a>
				  </div>
        </div>
      </div>
    </header>

    <!--main section-->

    <main>
      <section id="hero">
        <h4><br><br><br>offre d'échange</h4>
        <h2>offres super<br> rapport <br>qualité-prix</h2>
        <h1>Sur tous <br>les produits</h1>
        <p>économisez plus de coupons et jusqu'à 70% de réduction!</p>
        <button onclick="window.location='html/product.php'">Acheter maintenant</button>
      </section>

      <section id="features" class="section-p1">
        <div class="f-box">
          <img src="f1.png" alt="free shipping" />
          <h6>Livraison gratuite</h6>
        </div>
        <div class="f-box">
          <img src="f2.png" alt="online order" />
          <h6>commande en ligne</h6>
        </div>
        <div class="f-box">
          <img src="f3.png" alt="save money" />
          <h6>économiser de l'argent</h6>
        </div>
        <div class="f-box">
          <img src="f4.png" alt="promotions" />
          <h6>promotions</h6>
        </div>
        <div class="f-box">
          <img src="f5.png" alt="happy sell" />
          <h6>bonne vente</h6>
        </div>
        <div class="f-box">
          <img src="f6.png" alt="24/7 support" />
          <h6>Assistance 24h/24 et 7j/7</h6>
        </div>
      </section>

      <section class="product-section" class="section-p1">
        <h1>Produits populaires</h1>
        <p>Collection d'hiver Nouveau design moderne</p>
        <div class="pro-collection">
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/61dFT2Y-LsL._AC_SX522_.jpg" alt="product image" />
            <span>Petalum</span>
            <h4 class="nom">Bébé Combinaison avec Capuche</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$34,99</h4>
            <a href="#" class="buy-icon" data-product-id="1" onclick="addToCart(1)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/61+99ktgE4L._AC_SX385_.jpg" alt="product image" />
            <span>DAY8 Vetement Bébé Garçon</span>
            <h4 class="nom">Chemise Blouse Haut Pull Sweat t-Shirt + Pantalons + Chapeau</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$11,23</h4>
            <a href="#" class="buy-icon" data-product-id="2" onclick="addToCart(2)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/71B3X3wYV1L._AC_SX385_.jpg" alt="product image" />
            <span>Homeriy</span>
            <h4 class="nom">Épais chauds à capuche</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$27,90</h4>
            <a href="#" class="buy-icon" data-product-id="3" onclick="addToCart(3)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/61wrwRny2aL._AC_SX385_.jpg" alt="product image" />
            <span>Carolilly</span>
            <h4 class="nom">T-Shirt + Pantalon ou Shorts Taille Elastique avec Poches</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$78</h4>
            <a href="#" class="buy-icon" data-product-id="4" onclick="addToCart(4)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/71bz+ArzkbL._AC_SX385_.jpg" alt="product image" />
            <span>Generic</span>
            <h4 class="nom">Dessin Animé Manteau+Sac </h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$17,89</h4>
            <a href="#" class="buy-icon" data-product-id="5" onclick="addToCart(5)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/61FwKwwnywL._AC_SX385_.jpg" alt="product image" />
            <span>IMJONO</span>
            <h4 class="nom">Veste en Cape à Capuchon Chaude</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$7,99</h4>
            <a href="#" class="buy-icon" data-product-id="6" onclick="addToCart(7)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/713-ADcd4SL._AC_SX385_.jpg" alt="product image" />
            <span>Sterntaler</span>
            <h4 class="nom">Chaussettes Mixte</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$6,99</h4>
            <a href="#" class="buy-icon" data-product-id="7" onclick="addToCart(7)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/61g76uZg6zL._AC_SX385_.jpg" alt="product image" />
            <span>Susenstone</span>
            <h4 class="nom">Manches Longues Grenouillères en Coton</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$6,99</h4>
            <a href="#" class="buy-icon" data-product-id="8" onclick="addToCart(8)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
        </div>
      </section>

      <section id="off-banner" class="section-m1">
        <h4>Services de réparation</h4>
        <h2>Jusqu'à 70 % de réduction - Tous les vétements et accessoires</h2>
        <button class="normal" onclick="window.location='html/product.php'">Explorer maintenant</button>
      </section>

      <section class="product-section" class="section-p1">
        <h1>Nouvelles Arrivées</h1>
        <p>Collection d'été Nouveau design moderne</p>
        <div class="pro-collection">
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/610ciNXWUTL._AC_SX385_.jpg" alt="product image" />
            <span>TWIFER</span>
            <h4 class="nom">Robe de Princesse à Pois sans Manches + Chapeau</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$5,50</h4>
            <a href="#" class="buy-icon" data-product-id="9" onclick="addToCart(9)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/610NKenncOL._AC_SX522_.jpg" alt="product image" />
            <span>Verve Jelly</span>
            <h4 class="nom">chemise à manches courtes + jarretelle jupe avec bandeau</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$21,59</h4>
            <a href="#" class="buy-icon" data-product-id="10" onclick="addToCart(10)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/71B8P0A9rEL._AC_SX569_.jpg" alt="product image" />
            <span> Levi's</span>
            <h4 class="nom">Lhn Body Chapeau et chaussons</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$18,00</h4>
            <a href="#" class="buy-icon" data-product-id="11" onclick="addToCart(11)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/71yfZszZfDL._AC_SX522_.jpg" alt="product image" />
            <span>Dazzerake</span>
            <h4 class="nom">Tenue pour Garçon 3-24 Mois Ensemble Été T-Shirt + Short</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$9,99</h4>
            <a href="#" class="buy-icon" data-product-id="12" onclick="addToCart(12)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/711jGJleq5L._AC_SX522_.jpg" alt="product image" />
            <span>Yavion</span>
            <h4 class="nom">Body Dessin Animé Jarretelles Jupe Bandeaux</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$12,49</h4>
            <a href="#" class="buy-icon" data-product-id="13" onclick="addToCart(13)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/71QyYIozCkL._AC_SX522_.jpg" alt="product image" />
            <span>Dazzerake</span>
            <h4 class="nom">Tenue 2 Pièces pour Bébé Garçon 0-3 Ans T-Shirt à Capuche + Short</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$10,99</h4>
            <a href="#" class="buy-icon" data-product-id="14" onclick="addToCart(14)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/71M7g-gZedL._AC_SX679_.jpg" alt="product image" />
            <span>Carter's</span>
            <h4 class="nom">Barboteuse à Boutons Pression Mixte </h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$21,24</h4>
            <a href="#" class="buy-icon" data-product-id="15" onclick="addToCart(15)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
          <div class="product-cart">
            <img src="https://m.media-amazon.com/images/I/61M9RwMopdL._AC_SX522_.jpg" alt="product image" />
            <span>DAY8</span>
            <h4 class="nom">Tee Shirt Manche Courte + Salopette Jeans Garcon</h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">$13,87</h4>
            <a href="#" class="buy-icon" data-product-id="16" onclick="addToCart(16)"><i class="fa-solid fa-cart-shopping"></i></a>
          </div>
        </div>
      </section>

      <section id="banners" class="section-p1">
        <div class="big-banners">
          <div class="big-banners-1">
            <h4>offres folles</h4>
            <h2>achetez-en 1, obtenez-en 1 gratuitement</h2>
            <span>La meilleure robe classique est en vente chez babyStyle</span>
            <button class="banner-btn" onclick="window.location='html/product.php'">en savoir plus</button>
          </div>
          <div class="big-banners-2">
            <h4>printemps/été</h4>
            <h2>saison à venir</h2>
            <span>La meilleure ensembles modernes est en vente chez babyStyle</span>
            <button class="banner-btn" onclick="window.location='html/product.php'">Collection</button>
          </div>
        </div>
        <div class="small-banners">
          <div class="small-banners-1">
            <h2>SOLDES SAISONNIERES</h2>
            <h5>Collection Hiver 50% de réduction</h5>
          </div>
          <div class="small-banners-2">
            <h2>NOUVELLE COLLECTION DE CHAUSSURES</h2>
            <h5>Printemps/Été 2023</h5>
          </div>
          <div class="small-banners-3">
            <h2>T-SHIRTS</h2>
            <h5>Nouveaux imprimés tendance</h4>
          </div>
        </div>
      </section>
    </main>

    <!--footer section-->

    <footer>
      <div id="footer">
        <div class="contact">
          <a href="index.html"><img src="logo.png" alt="" /></a>
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
  </body>
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
        url: 'back/ajouterPanier.php',
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
</html>


