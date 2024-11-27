<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
    <title>Facture d'achat</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        
        @media print {
            body {
                margin: 0;
                padding: 20px;
            }
            table {
                page-break-inside: auto;
            }
            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            td {
                page-break-inside: avoid;
                page-break-after: auto;
            }
            thead {
                display: table-header-group;
            }
            tfoot {
                display: table-footer-group;
            }
            h2 {
                page-break-after: avoid;
            }
        }
    </style>
</head>
<body>

<?php
session_start();

// Vérifiez si la clé "utilisateur" existe dans la session
if(isset($_SESSION['utilisateur'])) {
    $user = $_SESSION['utilisateur'];
} else {
    // Gérez le cas où la clé "utilisateur" n'est pas définie
    $user = "Utilisateur non défini";
}
// Informations sur la facture
$dateFacture = date("Y-m-d");
$dsn = 'mysql:host=localhost;dbname=tp_web';
$username = 'tp_web';
$password = 'tp_web';
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Préparation et exécution de la requête SQL
$query = "SELECT name FROM product";
$statement = $pdo->prepare($query);
$statement->execute();
$produits = $statement->fetchAll(PDO::FETCH_COLUMN);
$query2 = "SELECT price FROM product";
$statement2 = $pdo->prepare($query2);
$statement2->execute();
$price = $statement2->fetchAll(PDO::FETCH_COLUMN);
// Calcul du total
$total = 0;
$query = "SELECT SUM(price) AS total FROM product";
$statement = $pdo->prepare($query);
$statement->execute();
$total = $statement->fetch(PDO::FETCH_COLUMN);
?>
<h2>Facture d'achat</h2>
<p><strong>Client:</strong> <?php echo $user; ?></p>
<p><strong>Date:</strong> <?php echo $dateFacture; ?></p>

<table>
    <tr>
        <th>Produit</th>
        <th>Prix unitaire</th>
        <th>Total</th>
    </tr>
    <?php for ($i = 0; $i < count($produits); $i++) { ?>
        <tr>
            <td><?php echo $produits[$i]; ?></td>
            <td><?php echo "$price[$i] MAD";?></td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
        <td><?php echo "$total MAD"; ?></td>
    </tr>
</table>

<button onclick="window.print()"><i class="fa-solid fa-print"></i> Imprimer</button>

</body>
</html>
