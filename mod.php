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

// Vérification de la soumission du formulaire de modification
if(isset($_POST['modifier'])) {
    // Récupération des données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $telephone = $_POST['telephone'];
    $groupe = $_POST['groupe'];
    $date = $_POST['date'];
    $centre = $_POST['centre'];

    // Requête de mise à jour du donneur
    $sql = "UPDATE sang SET nom='$nom', prenom='$prenom', age='$age', telephone='$telephone', groupe='$groupe', date='$date', centre='$centre' WHERE id='$id'";

    // Exécution de la requête
    $resultat = $connexion->query($sql);

    // Vérification du succès de la mise à jour
    if ($resultat) {
        $message = "Le donneur a été modifié avec succès.";
    } else {
        $messsage = "Une erreur s'est produite lors de la modification du donneur : " . $connexion->errorInfo()[2];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifie de donneur</title>
</head>
<body>
    <h1>Modifie de donneur</h1>

    <?php if ($message !== "") : ?>
        <p><?php echo $message; ?></p>
        <?php if (strpos($message, "succès") !== false) : ?>
            <script>
                alert("<?php echo $message; ?>");
                window.location.href = "leo.html";
            </script>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>