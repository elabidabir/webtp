<?php
$host = 'localhost';
$user = 'tp_web';
$password = 'tp_web';
$database = 'tp_web';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier produit : BabyStyle</title>
    <link rel="stylesheet" href="../style2.css">
    <script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
    <style>
.container {
    background: pink;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 50%;
    height: 25cm;
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
	background-color:  #e3e6f3;
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
}

h2 {
    text-align: center;
    color: white;
    margin-top 1cm;
}

button {
    border-radius: 20px;
	background-color:  white;
	color: black;
	border: 1px solid white;
	padding: 15px 50px;
	font-weight: bold;
	float: right;
    margin-top:1cm;
}

button:hover {
    background-color: #e3e6f3;
	color: black;
}
input{
	height: 55px;
	margin-bottom: 15px;
}
textarea{
	height: 100px;
	margin-bottom: 20px;
}
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
				<li><a href="http://localhost/tp_web/html/pageAdmin.php">Produits</a></li>
				<li><a href="http://localhost/tp_web/back/ajouter.php">Ajouter un produit</a></li>
                <li>
                  <a href="#">Gérer</a>
                  <ul>
                      <li><a href="../html/ajouterAdmin.php">Administrateurs</a></li>
                      <li><a href="../html/afficherUser.php">Utilisateurs</a></li>
                  </ul>
              </li>				
              <li><a  class="active" href="#">Modifier un produit</a></li>
			  </ul>
			</nav>
		  </div>
		</div>
</header>
<?php
$product_id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $image_url = $_POST['image_url'];
    $category = $_POST['categorie'];

    // Mettre à jour les données du produit dans la base de données
    $query = "UPDATE products SET name='$name', price=$price, rating=$rating, image_url='$image_url', categorie='$category' WHERE id=$product_id";
    mysqli_query($conn, $query);

    // Rediriger vers la page principale
    header('Location: ../html/pageAdmin.php');
    exit();
}
?>


<!-- Formulaire de modification de produit -->
 <center>
    <div class="container">
    <form method="post">
            <h2>Modifier un produit</h2>
            <label for="nom">Nom :</label>
            <input id="nom"type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
            <label for="prix">Prix :</label>
            <input id="prix" type="number" name="price" value="<?php echo $product['price']; ?>" required><br>
            <label for="rating">Nombre d'étoiles :</label>
            <input type="number" name="rating" value="<?php echo $product['rating']; ?>" required><br>
            <label for="image">L'URL de l'image :</label>
            <input id="image" type="text" name="image_url" value="<?php echo $product['image_url']; ?>" required><br>
            <label for="categorie">Catégorie</label>
            <input id="categorie" type="text" name="categorie" value="<?php echo $product['categorie']; ?>" required><br>
            <button type="submit">Modifier</button>
    </form>
</div>
</center>
        </body>
        </html>