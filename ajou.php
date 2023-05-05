<?php
// Connexion à la base de données
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

// Traitement des données du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $telephone = $_POST['telephone'];
    $groupe = $_POST['groupe'];
    $date = $_POST['date'];
    $id = $id = uniqid();
    $centre = $_POST['centre'];

// Requête SQL pour insérer les données dans la base de données
$sql = 'INSERT INTO sang (nom, prenom, age, telephone, groupe, date, id, centre) VALUES (:nom, :prenom, :age, :telephone, :groupe, :date, :id, :centre)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nom' => $nom,
    'prenom' => $prenom,
    'age' => $age,
    'telephone' => $telephone,
    'groupe' => $groupe,
    'date' => $date,
    'id' => $id,
    'centre' => $centre
]);

}
?>
