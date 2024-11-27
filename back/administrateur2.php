<?php
include 'compter.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/register.css">
        <link rel="stylesheet" href="../style2.css">
        <link rel="stylesheet" href="../css/product.css">
        <title>Admin : BabyStyle</title>
        <style>
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
                <button type="submit" class="rechercher"><i class="fa-solid fa-magnifying-glass"></i></button>
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
        $stmt = $pdo->prepare("SELECT * FROM admin where login= :login and password= :pwd");
        $stmt->execute(['login' => $login, 'pwd' => $password]); 

        // Récupérer l'utilisateur
        $user = $stmt->fetch();

        // Vérifier si la requête a réussi
        if (!empty($user)) {
            ?>
				<div class="form">
					<h3 class="titre">Connexion réussie !</h3>
					<br><br>
					<a href="http://localhost/tp_web/html/pageAdmin.php" class="btn" style="margin-right:2cm;">Continuez sur la partie administrateur</a>
					<a href="#" class="btn" onclick="window.history.go(-1)">Précédent</a>
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



