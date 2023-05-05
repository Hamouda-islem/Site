<!DOCTYPE html>
<html>
<head>
	<title>Ma page de rendez-vous</title>
	<style>
    

table {
        border-collapse: collapse;
        width: 100%;
      }
      th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
      }
      th {
        background-color: #FF1493;
      }

	</style>
</head>
<body>
	<h1>Mes rendez-vous</h1>
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
if (isset($_POST['annuler_rdv'])) {
    $id = $_POST['id_rdv'];
    $sql = "DELETE FROM sang3 WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Le rendnulé avec succès.");</script>';
    } else {
        echo "Erreur: " . mysqli_error($conn);
    }
}
$id = $_POST['id'];
$sql = "SELECT * FROM sang3 WHERE id = '$id' ";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Erreur : " . mysqli_error($conn);
} else {
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo '<table style="border-collapse: collapse; width: 100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> ID de RDV : </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> La date de RDV : </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> L heure de RDV : </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> Le Centre de RDV :  </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> Passage de RDV (Oui) :  </th>';
        echo '<th style="border: 1px solid black; padding: 5px; border-bottom: 1px solid black;"> Action : </th>';
        echo '</tr>';
        echo '</thead>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tbody>';
            echo '<tr>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['id_rdv']. '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['daterdv']. '</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['dateheu'].'</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">' .$row['Centre'].'</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">'      .$row['etatrdv'].'</td>';
            echo '<td style="border: 1px solid black; padding: 8px;">';
            echo '<form method="GET" action="annuler_rdv.php">';
            echo '<input type="hidden" name="id_rdv" value="'.$row['id_rdv'].'">';
            echo '<button type="submit" name="annuler_rdv"> Annuler Ce rendez-vous </button>';
            echo '</form>';         
            echo '<form method="GET" action="imprimer_convocation.php">';
            echo '<input type="hidden" name="id_rdv" value="'.$row['id_rdv'].'">';
            echo '<button type="submit" name="imprimer_rdv">  imprimer Ce rendez-vous </button>';
            echo '</form>'; 
            echo '</td>';
            echo '</tr>';
            echo '</tbody>';
        }
        echo '</table>';
    } else {
        echo "<h1> Vous n'avez pas de rendez-vous à venir.</h1>";
    }
}
?>
</body>
</html>
