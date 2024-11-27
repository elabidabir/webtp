<?php
session_start();
// Connexion à la base de données
$servername = "localhost";
$username = "tp_web";
$password = "tp_web";
$dbname = "tp_web";
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['action']) && $_POST['action'] === 'add_product') {
    $sql_insert = $conn->prepare("INSERT INTO product (image_url, name, rating, price) VALUES (?, ?, ?, ?)");
    // Liaison des paramètres
    $sql_insert->bind_param("ssdd", $image_url, $name, $rating, $price);
    // Récupérer les données du produit depuis la requête AJAX
    $image_url = $_POST['image_url'];
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    if ($sql_insert->execute()) {
        // Succès
    } else {
        // Erreur lors de l'insertion
        echo "Erreur lors de l'insertion.";
    }
} else {
    echo "Action non valide.";
}
?>
