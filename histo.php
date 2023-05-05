<?php
session_start();

$host = 'localhost';
$dbname = 'projetsang';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $connexion = new PDO($dsn, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $connexion->prepare("SELECT * FROM sang3 WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $dons = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Historique de dons</title>
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
        background-color: #f2f2f2;
      }
    </style>
</head>
<body>
    <h1>Historique de dons</h1>
    <table>
        <thead>
            <tr>
                <th>Date de don</th>
                <th>l'heure de don</th>
                <th>Centre de collecte</th>
                <th>Avez-vous effectué la donation ?</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dons as $don) { ?>
            <tr>
                <td><?= $don['daterdv'] ?></td>
                <td><?= $don['dateheu'] ?></td>
                <td><?= $don['Centre'] ?></td>
                <td><?= $don['etatrdv'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

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
    background-color: #f2f2f2;
  }
</style>

<?php
}
?>
