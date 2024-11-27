<?php
session_start();
$servername = 'localhost';
$username = 'tp_web';
$password = 'tp_web';
$database = 'tp_web'; // Remplacez par le nom de votre base de données

// On établit la connexion
$conn = mysqli_connect($servername, $username, $password, $database);

// On vérifie la connexion
if (!$conn) {
    die('Erreur : ' . mysqli_connect_error());
}

// Requête SQL pour obtenir le nombre d'enregistrements dans la table 'product'
$sql = "SELECT COUNT(*) AS total FROM product";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $cartCount = $row['total'];

    // Mettre à jour la variable de session
    $_SESSION['cart_count'] = $cartCount;
} else {
    // En cas d'erreur lors de la requête SQL
    $_SESSION['cart_count'] = 0;
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
