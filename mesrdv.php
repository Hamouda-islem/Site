<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Connexion à la base de données
$host = 'localhost';
$dbname = 'projetsang';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $connexion = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Récupérer l'ID de l'utilisateur connecté
$id = $_SESSION['id'];

// Requête pour récupérer les rendez-vous de l'utilisateur
$sql = "SELECT * FROM sang3 WHERE id = :id";
$stmt = $connexion->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$rendezVous = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Afficher les rendez-vous de l'utilisateur
foreach($rendezVous as $rdv) {
    echo "Date : " . $rdv['daterdv'] . "<br>";
    echo "Heure : " . $rdv['dateheu'] . "<br>";
    echo "Centre : " . $rdv['centre'] . "<br><br>";
}
