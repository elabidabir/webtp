<?php
include 'compter.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/register.css">
		<link rel="stylesheet" type="text/css" href="../css/button.css">
        <link rel="stylesheet" href="../style2.css">
        <link rel="stylesheet" href="../css/product.css">
		<script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
        <title>Utilisateur : BabyStyle</title>
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
    .btn{
            text-decoration:none;
            background-color:skyblue;
            color:white;
            padding-top:0.3cm;
            padding-bottom:0.3cm;
            padding-left:10px;
            padding-right:10px;
            border-radius: 10px;
          }
          .btn:hover{
            background-color:rgb(218, 33, 64);
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
                <input type="text" placeholder="Rechercher un produit" />
                <button class="rechercher" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
			<nav class="header-list-nav">
			  <ul>
				<li><a href="http://localhost/tp_web//index.php">Acceuil</a></li>
				<li><a href="http://localhost/tp_web/html/product.php">Produits</a></li>
        <li>
                  		<a class="active" href="#">Mon compte</a>
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
		
		<?php
    session_start(); // Démarrer la session
    $host = 'localhost';
    $dbname = 'tp_web';
    $username = 'root';

    if(isset($_POST['select'])) {
        try {
            // Se connecter à MySQL
            $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username");
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            exit();
        }

        // Récupération des champs saisis
        $login = $_POST['login'];
        $password = $_POST['pwd'];

        // Préparation de la requête
        $stmt = $pdo->prepare("SELECT * FROM utilisateur where login= :login and password= :pwd");
        $stmt->execute(['login' => $login, 'pwd' => $password]); 

        // Récupérer l'utilisateur
        $user = $stmt->fetch();

        // Vérifier si la requête a réussi
        if (!empty($user)) {
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          session_start();
          $_SESSION['utilisateur'] = $user['F_NAME'];
            ?>
				<div class="form">
					<h3 class="titre">Connexion réussie !</h3>
					<br><br>
					<a href="http://localhost/tp_web/index.php" class="btn" style="margin-left:2cm;">Continuez sur notre site </a>
					<a href="#" class="btn btnMenu" onclick="window.history.go(-1)">Précédent</a>
				</div>
				<?php
		} else {
            ?>
            <div class="form">
                <h3 class="titre">Connexion échouée !</h3>
                <br><br>
                <a href="#" class="btn" onclick="window.history.go(-1)">Précédent</a>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>



