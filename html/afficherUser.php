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
	width: 45%;
  height: 14cm;
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
  <header style="margin-bottom:5cm;">
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
                  <a class="active" href="#">Gérer</a>
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
  <?php
    $serveur = "localhost";
    $utilisateur = "tp_web";
    $motdepasse = "tp_web";
    $base_de_donnees = "tp_web";
    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);
    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("La connexion a échoué : " . $connexion->connect_error);
    }
    $sql = "SELECT * FROM utilisateur";
    $result = $connexion->query($sql);
    $index=1;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<table style='margin:1cm;border:1px solid black;border-spacing: 0;margin-bottom:1cm;'>";
        echo "<tr><td style='padding-left:1cm;padding-right:1cm;background-color:skyblue;text-align:center' rowspan='5' style='padding-right:1cm;'>utilisateur ". $index.
            "</td><td style='padding-top:1cm; padding-right:1cm;padding-left:1cm;width:100%;padding-bottom:1cm '>Prénom :". $row["F_NAME"]."</td></tr>
            <tr><td style='padding-left:1cm;padding-right:1cm;width:100%;padding-bottom:1cm'>Nom : ".$row["L_NAME"]."</td></tr>
            <tr><td style='padding-left:1cm;padding-right:1cm;width:100%;padding-bottom:1cm'>Email : ".$row["EMAIL"]."</td></tr>
            <tr><td style='padding-left:1cm;padding-right:1cm;width:100%;padding-bottom:1cm'>Login : ".$row["LOGIN"]."</td></tr>
            <tr><td style='padding-left:1cm;padding-right:1cm;padding-bottom:1cm;width:100%'>Mot de passe :". $row["PASSWORD"]."</td></tr>
        </table>";
        $index++;
    }
    
    }
  ?>
  
</body>
</html>