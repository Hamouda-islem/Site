
<!DOCTYPE html>
<html>
<head>
	<title>Ma page de rendez-vous</title>
	<style>
        :root {
    --bg-color: #1f242d;
    --second-bg-color: #323946;
    --text-color: #fff;
    --main-color: #0ef;
}

body {
    background-color: var(--bg-color);
    font-family: Arial, sans-serif;
}

h2 {
    color: var(--text-color);
}

table {
    border-collapse: collapse;
    width: 100%;
    margin: 20px 0;
}

th {
    background-color: var(--second-bg-color);
    color: var(--text-color);
    border: 1px solid black;
    padding: 10px;
    font-weight: bold;
    text-align: left;
}

td {
    border: 1px solid black;
    padding: 10px;
}

tr:nth-child(even) {
    background-color: var(--second-bg-color);
}

button {
    background-color: var(--main-color);
    color: var(--text-color);
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}

input[type=text], select {
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-bottom: 10px;
    width: 100%;
}

    </style>
</head>
<body>
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
        echo "<script> alert('Aucun donneur n\'a été trouvé avec cet ID.'); window.location.replace('admin.html');</script>";


    }
}

$id = $_POST['id'];
$sql = "SELECT * FROM sang WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
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
