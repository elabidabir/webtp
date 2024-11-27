<?php
include '../back/compter.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	      <meta charset="UTF-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		    <link rel="stylesheet" href="http://localhost/tp_web//style2.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/product.css">
		<script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../js/onsubmit_loginEvent.js"></script>	
        <title>Recherche:BabyStyle</title>
        </head>
<body>
<header style="margin-bottom:4cm">
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
				<li><a href="http://localhost/tp_web/html/utilisateur.php">Mon compte</a></li>
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
<?php
$servername = "localhost";
$username = "tp_web";
$password = "tp_web";
$dbname = "tp_web";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mot_cle = $_GET['mot_cle'];

// Éviter les attaques par injection SQL
$mot_cle = mysqli_real_escape_string($conn, $mot_cle);

// Construire la requête SQL
$requete = "SELECT * FROM products WHERE categorie LIKE '$mot_cle%'";

// Exécuter la requête
$resultat = $conn->query($requete);

// Traiter les résultats de la recherche
if ($resultat->num_rows > 0) {
    $imageWidth = 150;
    while ($row = $resultat->fetch_assoc()) {
        echo "<table border=0 style='margin-left:30px'>";
        echo "<tr>";
        // Colonne pour l'image
        echo "<td class='image' style = 'padding-right:10px;'><img src='" . $row["image_url"] . "' alt='Image du produit' width='$imageWidth'></td>";
        // Colonnes pour les autres données
        echo "<td class='product-name'>" . $row["name"] ."<br><br>";
        for ($i = 0; $i < $row["rating"]; $i++) { 
          echo "<i style='color:#e6ae2c;' class='fa-solid fa-star'></i>";
        }
        echo "<br><br>Prix : ".$row["price"] . "<br><br>";
        $productName = $row["name"];
        $sql = "SELECT COUNT(*) as nombre_produits FROM products WHERE name = ?";
        $requete = $conn->prepare($sql);

        if ($requete === false) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }

        $requete->bind_param("s", $productName);
        $requete->execute();
        $requete->bind_result($nombre_produits);
        $requete->fetch();

        // Débogage: Afficher le nombre de produits
        echo "Nombre : " . $nombre_produits . "</td>"; 
        $requete->close();
        echo "</tr>";
        echo "</table>";    
    }
} else {
    echo "<div>Aucun résultat trouvé.</div>";
}

// Fermer la connexion à la base de données
$conn->close();
?>
</body> 
</html>