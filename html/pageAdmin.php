<?php
$host = 'localhost';
$user = 'tp_web';
$password = 'tp_web';
$database = 'tp_web';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Supprimer le produit de la base de données
    $product_id = $_POST['id'];
    $query = "DELETE FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // La suppression a réussi, rediriger vers la page admin
        header('Location: pageAdmin.php');
        exit();
    } else {
        // La suppression a échoué, gérer l'erreur selon les besoins
        echo "La suppression du produit a échoué.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page admin : BabyStyle</title>
    <link rel="stylesheet" href="../style2.css">
    <script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
    <style>
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
</head>
<body>
<header>
		<div id="header">
		  <div class="header-logo">
			<a href="index.php"><img src="../logo.png" alt="" /></a>
		  </div>
		  <div class="header-list">
			<nav class="header-list-nav">
			  <ul>
				<li><a class="active" href="http://localhost/tp_web/html/pageAdmin.php">Produits</a></li>
				<li><a href="http://localhost/tp_web/back/ajouter.php">Ajouter un produit</a></li>
                <li>
                  <a href="#">Gérer</a>
                  <ul>
                      <li><a href="ajouterAdmin.php">Administrateurs</a></li>
                      <li><a href="afficherUser.php">Utilisateurs</a></li>
                  </ul>
              </li>                
              <li><a href="../index.php">Revenir vers l'accueil</a></li>
			  </ul>
			</nav>
		  </div>
		</div>
</header>
<h1>Liste des produits</h1>
<?php
    $sql = "SELECT id,image_url, name, price, rating FROM products";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<section class='product-section' class='section-p1'>
			    <div class='pro-collection'>";
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
                <a class="buy-icon" href="../back/modifier.php?id=<?php echo $row['id']; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                <a href='#' onclick="confirmDelete(<?php echo $row['id']; ?>)"style="right: 60px;" class='buy-icon'><i class="fa-solid fa-trash"></i></a>
                <?php
                echo "</div>";
                }
    }
?>
<script>
    function confirmDelete(productId) {
        var confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer ce produit ?");
        if (confirmDelete) {
            // Utiliser AJAX pour envoyer une requête POST au serveur pour supprimer le produit
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Rediriger ou mettre à jour la page après la suppression
                    window.location.href = 'pageAdmin.php';
                }
            };
            xhttp.open("POST", 'pageAdmin.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('id=' + productId);
        }
    }
</script>
</body>
</html>
