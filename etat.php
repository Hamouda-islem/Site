<?php

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
if(isset($_POST['choix'])) {
    if(isset($_POST['id']) && isset($_POST['etat'])) {
        $id = $_POST['id'];
        $etat = $_POST['etat'];
        $sql = "UPDATE sang SET Etat='$etat' WHERE id='$id'";
        $resultat = $connexion->query($sql);

        if ($resultat) {
            $message = "Le donneur a été modifié avec succès.";
        } else {
            $message = "Une erreur s'est produite lors de la modification du donneur : " . $connexion->errorInfo()[2];
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Activation de l'inscription</title>
</head>
<body>
    <h1>Activation de l'inscription</h1>

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
