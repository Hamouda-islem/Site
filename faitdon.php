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


if(isset($_POST['Faire']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $daterdv = $_POST['daterdv'];
    $dateheu = $_POST['dateheu'];
    $centre = $_POST['centre'];
    $id_rdv = uniqid();
    $sql = "SELECT * FROM sang WHERE id = :id AND etat = 'Accepter'";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $donneur = $stmt->fetch();
    if(!$donneur) {
        echo "Donneur introuvable";
    } else {
        $sql = 'INSERT INTO sang3 (id,id_rdv,daterdv, dateheu, centre) VALUES (:id,:id_rdv,:daterdv, :dateheu, :centre)';
        $stmt = $connexion->prepare($sql);
        $result = $stmt->execute([
            'id' => $id,
            'id_rdv' => $id_rdv,
            'daterdv' => $daterdv,
            'dateheu' => $dateheu,
            'centre' => $centre,
        ]);
        if ($result) {
            echo "<script>alert('RDV de don ajouté avec succès')window.location.replace('.thtml')</script>";
        } else {
            echo "Erreur lors de l'ajout du don";
        }
    }
}
?>
