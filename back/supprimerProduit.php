<?php
// Connexion à la base de données
$servername = "localhost";
$username = "tp_web";
$password = "tp_web";
$dbname = "tp_web";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer le nom du produit à supprimer depuis la requête POST
$nomProduit = $_POST['name'];

// Requête SQL pour supprimer le produit de la table
$sql = "DELETE FROM product WHERE name = ?";
$requete = $conn->prepare($sql);

if ($requete === false) {
    die("Erreur de préparation de la requête : " . $conn->error);
}

$requete->bind_param("s", $nomProduit);
$requete->execute();

// Fermer la connexion à la base de données
$requete->close();
$conn->close();
?>
