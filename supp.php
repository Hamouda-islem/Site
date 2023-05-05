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
$message = "";

// Traitement de la requête de suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Vérifier si l'ID existe
    $stmt = $pdo->prepare('SELECT * FROM sang WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $donneur = $stmt->fetch();

    if (!$donneur) {
        // Message d'erreur si l'ID n'existe pas
        $message = "  Le donneur avec l'ID $id n'existe pas.";
    } else {
        // Requête SQL pour supprimer un donneur par ID
        $sql = 'DELETE FROM sang WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);

        // Message de succès après la suppression des données
        $message = "Le donneur avec l'ID $id a été supprimé avec succès.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Suppression de donneur</title>
</head>
<body>
    <h1>Suppression de donneur</h1>
<style>
body {
  background-color: #1f242d;
  color: #fff;
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  padding: 0;
  margin: 0;
}

h1 {
  color: #0ef;
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 20px;
}

p {
  margin: 0;
  font-size: 16px;
  line-height: 1.5;
  color: #ffffff;
}


table {
  border-collapse: collapse;
  width: 100%;
}

th,
td {
  border: 1px solid #fff;
  padding: 10px;
  text-align: center;
}

th {
  background-color: #323946;
}

tr:nth-child(even) {
  background-color: #323946;
}

tr:hover {
  background-color: #0ef;
}
    </style>
    <?php if ($message !== "") : ?>
        <h3><?php echo $message; ?></h3>
        <?php if (strpos($message, "succès") !== false) : ?>
            <script>
                alert("<?php echo $message; ?>");
                window.location.href = "leo.html";
            </script>
        <?php endif; ?>
    <?php endif; ?>

</body>
</html>
