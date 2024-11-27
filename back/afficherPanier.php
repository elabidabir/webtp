<?php
include '../back/compter.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
	      <meta charset="UTF-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		    <link rel="stylesheet" href="http://localhost/tp_web//style2.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/product.css">
		    <script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
		    <script type="text/javascript" src="../js/onsubmit_loginEvent.js"></script>	
        <title>Panier:BabyStyle</title>
    <style>
        h1 {
            margin-top: 5cm;
            text-align: center;
            margin-bottom: 2cm;
        }
        td.product-name{
          font-size: 23px;
          padding-right:3cm;
          padding-left:2cm;
        }
        table{
          display:block;
        }
        td.image{
          width: 8cm;
          text-align:center;
          padding-top:10px;
          padding-bottom:10px;
          padding-right:100px;
          padding-left:90px;
          background:white;
        }
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
<header>
		<div id="header">
		  <div class="header-logo">
			<a href="index.php"><img src="../logo.png" alt="" /></a>
		  </div>
		  <div class="header-list">
          <div class="search-bar">
            <form action="rechercherProduit.php">
                <input type="text"name="mot_cle" id="mot_cle_input" placeholder="Rechercher un produit" />
                <button class="rechercher" type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>
			  <nav class="header-list-nav">
			  <ul>
				<li><a href="http://localhost/tp_web//index.php">Acceuil</a></li>
				<li><a href="http://localhost/tp_web/html/product.php">Produits</a></li>
        <li>
                  <a href="#">Mon compte</a>
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
				<a class="active" href="../back/afficherPanier.php" id="cart-icon">
					<i class="fa fa-bag-shopping"></i>
					<div class="cart-count-container">
            <span id="cart-count" class="cart-count-superscript"><?php echo $cartCount; ?></span>
					</div>
				</a>
			</div>
		  </div>
		</div>
</header>
<h1>Liste des Produits</h1>
<?php
// Connexion à la base de données (à adapter selon votre configuration)
$servername = "localhost";
$username = "tp_web";
$password = "tp_web";
$dbname = "tp_web";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
$sql = "SELECT SUM(price) as total_price FROM product";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); 
$totalPrice = $row['total_price'];
?><center><div style="margin-top:1cm;margin-bottom:1cm;font-size:25px;margin-bottom:1cm;background-color:#e3e6f3;border-radius:20px;width:600px;padding-top:1cm;padding-bottom:1cm;"><span style="font-weight:bold;color:purple;">Total à payer :</span> <?php echo $totalPrice; ?> MAD</div>      </center>
<?php
$sql = "SELECT image_url, name, MAX(price) as price, MAX(rating) as rating FROM product GROUP BY name";
$result = $conn->query($sql);

$colorIndex = 0; // Initialisation de la variable pour les couleurs alternées

if ($result->num_rows > 0) {
    $imageWidth = 150;
    ?>
    <center><button style="margin-bottom:1cm; font-size:30px;padding:10px;border-radius:20px" onclick="window.location='http://localhost/tp_web/html/facture.php'">Continuer la commande</button></center>
    <?php
    // Afficher le tableau
    while($row = $result->fetch_assoc()) {
        $bgColor = ($colorIndex % 2 == 0) ? 'pink' : 'skyblue'; // Changer la couleur à chaque itération
        $colorIndex++;

        echo "<table border=0 style='background-color: $bgColor;'>";
        echo "<tr>";
        // Colonne pour l'image
        echo "<td class='image'><img src='" . $row["image_url"] . "' alt='Image du produit' width='$imageWidth'></td>";
        // Colonnes pour les autres données
        echo "<td class='product-name'>" . $row["name"] ."<br><br>";
        for ($i = 0; $i < $row["rating"]; $i++) { 
          echo "<i style='color:#e6ae2c;' class='fa-solid fa-star'></i>";
        }
        echo "<br><br>Prix : ".$row["price"] . " MAD<br><br>";
        $productName=$row["name"];
        $sql = "SELECT COUNT(*) as nombre_produits FROM product WHERE name = ?";
        $requete = $conn->prepare($sql);

        if ($requete === false) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }
        else{
          $requete->bind_param("s", $productName);
          $requete->execute();
          $requete->bind_result($nombre_produits);
          $requete->fetch();
          // Débogage: Afficher le nombre de produits
          echo "Nombre : " . $nombre_produits . "<i style='text-align:right;margin-left:20cm;cursor:pointer;' class='fa-solid fa-trash' onclick='supprimerProduit(\"" . $productName . "\")'></i></td>";
          $requete->close();
          echo "</tr>";
          echo "</table>";
        }
      } 
      
} else {
      $totalPrice=0;
      ?><center><div style="margin-bottom:2cm"> <i class='fa-solid fa-triangle-exclamation'></i> Aucun produit dans le panier.</div></center>  
      <?php
}
// Fermer la connexion à la base de données
$conn->close();
?>
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
          function supprimerProduit(nomProduit) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
            // Envoyer une requête AJAX pour supprimer le produit
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                  // Actualiser la page après la suppression
                  location.reload();
                } else {
                  console.error("Erreur lors de la suppression du produit");
                }
              }
            };
      xhr.open("POST", "supprimerProduit.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("name=" + encodeURIComponent(nomProduit));
    }
  }
</script>
</body>
</html>
