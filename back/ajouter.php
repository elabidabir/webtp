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
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $image_url = $_POST['image_url'];
    $category = $_POST['categorie'];
    $name = mysqli_real_escape_string($conn, $name);
    $image_url = mysqli_real_escape_string($conn, $image_url);
    $category = mysqli_real_escape_string($conn, $category);
$query = "INSERT INTO products (name, price, rating, image_url, categorie) VALUES ('$name', $price, $rating, '$image_url', '$category')";
    mysqli_query($conn, $query);

    // Rediriger vers la page principale
    header('Location: ../html/pageAdmin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit : BabyStyle</title>
    <link rel="stylesheet" href="../style2.css">
    <script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
    <style>
.container {
    background: pink;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 50%;
    height: 27cm;
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
	resize: none;
	font: inherit;
	font-size: 16px;
	font-weight: normal;
	color:  black;
    font-weight:bold;
	width: 400px;
	padding: 18px;
    border: 1px solid black;
}

h2 {
    text-align: center;
    color: white;
    margin-top:1cm;
    margin-bottom:1cm;
}

button {
    border-radius: 20px;
	background-color: white;
	color: black;
	border: 1px solid black;
	padding: 15px 50px;
	font-weight: bold;
	float: right;
    margin-top:1cm;
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
				<li><a class="active" href="http://localhost/tp_web/back/ajouter.php">Ajouter un produit</a></li>
                <li>
                  <a href="#">Gérer</a>
                  <ul>
                      <li><a href="../html/ajouterAdmin.php">Administrateurs</a></li>
                      <li><a href="../html/afficherUser.php">Utilisateurs</a></li>
                  </ul>
              </li>			  
            </ul>
			</nav>
		  </div>
		</div>
</header>
    
<center>
    <div class="container"> 
    <h2>Ajouter un produit</h2>
    <!-- Formulaire d'ajout de produit -->
    <form method="post" action="">
        <!-- Champs du formulaire (name, price, rating, image_url, category) -->
        <label for="nom">Nom : </label>
        <input id="nom" type="text" name="name" placeholder="Nom du produit" required><br>
        <label for="prix">Prix : </label>
        <input id="prix" type="number" name="price" placeholder="prix" required><br>
        <label for="rating">Nombre d'étoiles : </label>
        <input id="rating" type="number" name="rating" placeholder="nombre d'étoiles" required><br>
        <label for="image">L'URL de l'image : </label>
        <input id="image" type="text" name="image_url" placeholder="Image URL" required><br>
        <label for="categorie">Catégorie</label>
        <input id="categorie" type="text" name="categorie" placeholder="Categorie" required><br>
        <button type="submit">Ajouter</button>
    </form>
</div>
</center>
   </body>
</html>
