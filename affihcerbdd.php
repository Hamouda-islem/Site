<?php

$host = 'localhost';
$dbname = 'projetsang';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    // Requête SQL pour récupérer les données du donneur correspondant à l'ID
    $sql = "SELECT * FROM sang WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultat) {

    } else {
        echo "Aucun donneur n'a ete trouve avec cet ID.";
    }
}

// Requête SQL pour récupérer tous les donneurs
$sql = "SELECT * FROM sang";
$stmt = $pdo->query($sql);
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des donneurs</title>
</head>
<body>
    <h1>Liste des donneurs</h1>

    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 5px;">Nom</th>
                <th style="border: 1px solid black; padding: 5px;">Prénom</th>
                <th style="border: 1px solid black; padding: 5px;">Âge</th>
                <th style="border: 1px solid black; padding: 5px;">Téléphone</th>
                <th style="border: 1px solid black; padding: 5px;">Groupe</th>
                <th style="border: 1px solid black; padding: 5px;">ID</th>
                <th style="border: 1px solid black; padding: 5px;">Date</th>
                <th style="border: 1px solid black; padding: 5px;">Centre</th>
                <th style="border: 1px solid black; padding: 5px;">RDV</th>
                <th style="border: 1px solid black; padding: 5px;">Etat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultats as $resultat) : ?>
                <tr>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['nom']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['prenom']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['age']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['Telephone']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['groupe']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['id']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['date']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['centre']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['RDV']; ?></td>
                    <td style="border: 1px solid black; padding: 5px;"><?php echo $resultat['Etat']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>



