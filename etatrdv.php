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

$message = "";

if(isset($_POST['choixrdv'])) {
    if(isset($_POST['id_rdv']) && isset($_POST['etatrdv'])) {
        $id_rdv = $_POST['id_rdv'];
        $etatrdv = $_POST['etatrdv'];
        $sql = "UPDATE sang3 SET etatrdv=:etatrdv WHERE id_rdv=:id_rdv";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':etatrdv', $etatrdv);
        $stmt->bindParam(':id_rdv', $id_rdv);
        $resultat = $stmt->execute();

        if ($resultat) {
            $message ="Le passage de RDV est passé avec succès.";
        } else {
            $message = "Une erreur s'est produite lors du passage du donneur : " . $stmt->errorInfo()[2];
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Passage de RDV</title>
</head>
<body>
    <h1>Passage de RDV</h1>

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
