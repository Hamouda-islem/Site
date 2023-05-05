<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'projetsang';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $connexion = new PDO($dsn, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // activer les erreurs PDO
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    exit(); // quitter le script en cas d'erreur de connexion à la base de données
}

// Vérifier si le formulaire a été soumis
if(isset($_POST['id'])) {
    // Récupérer l'ID du donneur de sang depuis le formulaire
    $id = $_POST['id'];
    
    // Requête pour récupérer les informations du donneur correspondant à l'ID
    $sql = "SELECT * FROM sang WHERE id = :id AND etat = 'Accepter'";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $donneur = $stmt->fetch(PDO::FETCH_ASSOC); // fetch en tant qu'array associatif pour éviter les doublons
    
    // Vérifier si le donneur a été trouvé
    if(!$donneur) {
        echo "Donneur introuvable";
    } else {
        // Afficher la carte du donneur
?>
<h2>Carte du donneur</h2>
<table>
    <tr>
        <td>ID :</td>
        <td><?php echo $donneur['id']; ?></td>
    </tr>
    <tr>
        <td>Nom :</td>
        <td><?php echo $donneur['nom']; ?></td>
    </tr>
    <tr>
        <td>Prénom :</td>
        <td><?php echo $donneur['prenom']; ?></td>
    </tr>
    <tr>
        <td>Groupe sanguin :</td>
        <td><?php echo $donneur['groupe']; ?></td>
    </tr>
    <tr>
        <td>Age :</td>
        <td><?php echo $donneur['age']; ?></td>
    </tr>
    <tr>
        <td>Téléphone :</td>
        <td><?php echo $donneur['Telephone']; ?></td>
    </tr>
</table>
<button onclick="window.print()">Imprimer la carte</button>
<?php
    }
}
?>
