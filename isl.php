<?php

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=projetsang;charset=utf8', 'root', '');

// Récupération de la liste des utilisateurs
$users = $pdo->query('SELECT * FROM sang')->fetchAll(PDO::FETCH_ASSOC);

// Encodage de la liste des utilisateurs en JSON
header('Content-Type: application/json');
echo json_encode($users);
?>