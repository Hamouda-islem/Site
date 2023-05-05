<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'projetsang';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
try {
    $pdo = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Requête SQL pour récupérer les données de la table "sang"
$sql = 'SELECT * FROM sang';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des données dans un tableau HTML
echo '<table style="border-collapse: collapse; width: 100%;">';
echo '<thead>';
echo '<tr>';
echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Age </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Groupe </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> id </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Date </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Centre </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> RDV </th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($resultat as $row) {
    echo '<tr>';

    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['nom'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['prenom'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['age'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['Telephone'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['groupe'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['id'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['date'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['centre'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['RDV'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
