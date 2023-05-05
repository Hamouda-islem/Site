<!DOCTYPE html>
<html>
<head>
	<title>Ma page de rendez-vous</title>
	<style>
        
    </style>
</head>
<body>

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetsang";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Vérification de la soumission du formulaire
if (isset($_GET['id_rdv'])) {
    // Récupération de l'identifiant du rendez-vous à annuler
    $id_rdv = $_GET['id_rdv'];
    
    // Suppression du rendez-vous
    $sql = "DELETE FROM sang3 WHERE id_rdv = '$id_rdv'";
    if (mysqli_query($conn, $sql)) {
        echo '<h1>Le rendez-vous a été annulé avec succès.</h1>';
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
} else {
    echo "L'identifiant du rendez-vous n'a pas été spécifié.";
}


// Vérification de la soumission du formulaire
if (isset($_GET['im_rdv'])) {
    // Récupération de l'identifiant du rendez-vous
    $id_rdv = $_GET['id_rdv'];
    // Récupération des informations sur le rendez-vous
    $sql = "SELECT * FROM sang3 WHERE id_rdv = '$id_rdv'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Génération de la convocation
    $convocation = "Convocation de RDV de don de sang\n\n";
    $convocation .= "ID de RDV : " . $row['id_rdv'] . "\n";
    $convocation .= "Date de RDV : " . $row['daterdv'] . "\n";
    $convocation .= "Heure de RDV : " . $row['dateheu'] . "\n";
    $convocation .= "Centre de RDV : " . $row['Centre'] . "\n";

    // Impression de la convocation
    echo "<pre>" . $convocation . "</pre>";
} 


// Fermeture de la connexion
mysqli_close($conn);
?>
</body>
</html>
