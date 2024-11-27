<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/register.css">
		<link rel="stylesheet" type="text/css" href="../css/button.css">
        <title>création du compte : BabyStyle</title>
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
		<div class="logo"><img src="../images/Logo_berbere.png" alt="Logo"> </div>
		
		<?php

		$host = 'localhost';
		$dbname = 'tp_web';
		$username = 'root';
		
		if(isset($_POST['insert'])){
			try {
				// se connecter à mysql
				$pdo = new PDO("mysql:host=$host;dbname=$dbname","$username");//,"$password");
			} catch (PDOException $exc) {
				echo $exc->getMessage();
				exit();
			}
			// récupérer les valeurs 
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$login = $_POST['login'];
			$password = $_POST['pwd'];
			
			// Requête mysql pour insérer des données
			$sql = "INSERT INTO utilisateur(`f_name`, `l_name`, `email`, `login`, `password`) VALUES (:firstname,:lastname,:email,:login,:password)";
			$res = $pdo->prepare($sql);
			$exec = $res->execute(array(":firstname"=>$firstname,":lastname"=>$lastname,":email"=>$email,":login"=>$login,":password"=>$password));
			
			// vérifier si la requête d'insertion a réussi
			if($exec){
				$row = $res->fetch(PDO::FETCH_ASSOC);			
				$_SESSION['utilisateur'] = $row['F_NAME'];
				?>
				<div class="form">
					<h1 class="titre">Votre compte a été créé avec succès !</h1>
					<br><br>
					<a href="http://localhost/tp_web/index.php" class="btn" >Accueil</a>
					<a href="#" class="btn btnMenu" onclick="window.location='http://localhost/tp_web/html/utilisateur.php'">Se connecter sur le site</a>
					
					</form>
				</div>
			<?php
			}else{
				//echo "Échec de l'opération d'insertion";
			?>
				<div class="form">
					<h3 class="titre">Creation de compte échouée !</h3>
					<br><br>
					<a href="#" class="btn" onclick="window.history.go(-1)">Précédent</a>
					</form>
				</div>
			<?php
			}
		}
		?>
</body>
</html>



