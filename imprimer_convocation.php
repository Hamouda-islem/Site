<!DOCTYPE html>
<html>
<head>
	<title>Convocation de RDV de Don de Sang</title>
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
    $id_rdv = $_GET['id_rdv'];
    
    // Récupération des informations du rendez-vous et du donneur de sang correspondant
    $sql = "SELECT sang.nom, sang.prenom,sang.telephone,sang.email,sang3.id_rdv, sang3.daterdv, sang3.dateheu, sang3.Centre 
    FROM sang3 
    JOIN sang ON sang.id=sang3.id 
    WHERE sang3.id_rdv = '$id_rdv'";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Affichage de la convocation de RDV
        while($row = mysqli_fetch_assoc($result)) {
            echo '<h1>Convocation de RDV de Don de Sang</h1>';
            echo '<p>Nom et prénom : '.$row['nom'].' '.$row['prenom'].'</p>';
            echo '<p>Téléphone : '.$row['telephone'].'</p>';
            echo '<p>Email : '.$row['email'].'</p>';
            echo '<p>ID de RDV : '.$row['id_rdv'].'</p>';
            echo '<p>Date et heure de rendez-vous : '.$row['dateheu'].' '.$row['daterdv'].'</p>';
            echo '<p>Centre de collecte : '.$row['Centre'].'</p>';
            echo '<button class="print-button" onclick="printConvocation()">Imprimer la convocation</button>';
        }
    } else {
        echo "Aucun rendez-vous correspondant à cet identifiant n'a été trouvé.";
    }
} else {
    echo "L'identifiant du rendez-vous n'a pas été spécifié.";
}

// Fermeture de la connexion
mysqli_close($conn);
?>
<script>
function printConvocation() {
    window.print();
}
</script>
</body>
</html>
