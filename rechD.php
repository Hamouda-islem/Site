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

// Vérifier si le formulaire a été soumis
if(isset($_POST['rechercherD'])) {
    // Récupérer les valeurs du formulaire
    $groupe = $_POST['groupe'];
    $centre = $_POST['centre'];
    
    // Requête pour récupérer les donneurs correspondants aux critères de recherche
    $sql = "SELECT * FROM sang WHERE groupe = :groupe AND centre = :centre AND etat = 'Accepter'";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':groupe', $groupe);
    $stmt->bindValue(':centre', $centre);
    $stmt->execute();
    $resultats = $stmt->fetchAll();
    
    // Vérifier s'il y a des résultats
    if(!$resultats) {
        echo "Aucun donneur trouvé";
    } else {
        // Afficher les résultats sous forme de tableau
        echo "<h2>Résultats de la Recherche</h2>";
        echo '<table style="border-collapse: collapse; width: 100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Age </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Groupe </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> id </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Centre </th>';
        foreach($resultats as $donneur) {
            echo "<tr>";
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $donneur['nom'] . '</td>';
            echo '<td>' . $donneur['prenom'] . '</td>';
            echo '<td>' . $donneur['age'] . '</td>';
            echo '<td>' . $donneur['Telephone'] . '</td>';
            echo '<td>' . $donneur['groupe'] . '</td>';
            echo '<td>' . $donneur['id'] . '</td>';
            echo '<td>' . $donneur['centre'] . '</td>';
            echo '</tbody>';
            echo "</tr>";
        echo "</table>";
        }
    }
}
if(isset($_POST['rechercherD2'])) 
{
 
 $groupe = $_POST['groupe'];
    
 // Requête pour récupérer les donneurs correspondants aux critères de recherche
 $sql = "SELECT * FROM sang WHERE groupe = :groupe  AND etat = 'Accepter'";
 $stmt = $connexion->prepare($sql);
 $stmt->bindValue(':groupe', $groupe);
 $stmt->execute();
 $resultats = $stmt->fetchAll();

 echo '<table style="border-collapse: collapse; width: 100%;">';
 echo '<thead>';
 echo '<tr>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Age </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Groupe </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> id </th>';
 echo '<th style="border: 1px solid black; padding: 5px;"> Centre </th>';

 
 
 echo '</tr>';
 echo '</thead>';
 echo '<tbody>';
 foreach ($resultats as $row) {
     echo '<tr>';
 
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['nom'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['prenom'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['age'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['Telephone'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['groupe'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['id'] . '</td>';
     echo '<td style="border: 1px solid black; padding: 5px;">' . $row['centre'] . '</td>';
     echo '</tr>';
 }
 echo '</tbody>';
 echo '</table>';
}

?>
  
  </body>
</html>

