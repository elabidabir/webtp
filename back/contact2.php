<?php
function afficherMessage($message) {
    // Utilisez cette fonction pour afficher un message
    echo $message;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
        $nom = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $serveur = "localhost";
        $utilisateur = "tp_web";
        $motDePasse = "tp_web";
        $baseDeDonnees = "tp_web";

        $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

        if ($connexion->connect_error) {
            die("Échec de la connexion à la base de données : " . $connexion->connect_error);
        }

        $requete = $connexion->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");

        if ($requete) {
            $requete->bind_param("sss", $nom, $email, $message);

            if ($requete->execute()) {
                $message = "Données insérées avec succès dans la base de données.";
                // Utilisez cette fonction pour afficher un message
                afficherMessage($message);
            } else {
                $message = "Erreur lors de l'insertion des données : " . $requete->error;
                // Utilisez cette fonction pour afficher un message
                afficherMessage($message);
            }

            $requete->close();
        } else {
            $message = "Erreur de préparation de la requête : " . $connexion->error;
            // Utilisez cette fonction pour afficher un message
            afficherMessage($message);
        }

        $connexion->close();
    } else {
        $message = "Données du formulaire non définies.";
        // Utilisez cette fonction pour afficher un message
        afficherMessage($message);
    }
} else {
    // Assurez-vous de déclarer la variable $message avant de l'utiliser dans l'en-tête
    $message = "Données du formulaire non définies.";
    header("Location: http://localhost/tp_web/html/contact.php?message=" . urlencode($message));
}
?>
