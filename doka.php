




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
$resultat = "valeur par défaut"; // Initialisation de la variabl
// Traitement de la requête de suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer'])) {
    $id = $_POST['id'];

    // Requête SQL pour supprimer un donneur par ID
    $sql = 'DELETE FROM sang WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);

    // Message de succès après la suppression des données
    echo 'Le donneur a été supprimé avec succès.';

    // Redirection vers une autre page après la suppression des données
    header('Location: supp.php');
    exit();
}

// Traitement des données du formulaire d'ajout de donneurs
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    // Récupération des données du formulaire
    $nom = strtoupper($_POST['nom']);
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $groupe = $_POST['groupe'];
    $date = $_POST['date'];
    $centre = $_POST['centre'];
    $email = $_POST['email'];
    $sql = 'SELECT email, telephone FROM sang WHERE email = :email OR telephone = :telephone';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'telephone' => $telephone]);
    $result = $stmt->fetch();

    

    if ($result) {
        if ($result['email'] == $email && $result['telephone'] == $telephone) {
            echo 'Cet email et ce téléphone sont déjà utilisés.';
        } elseif ($result['email'] == $email) {
            echo 'Cet email est déjà utilisé.';
        } elseif ($result['telephone'] == $telephone) {
            echo 'Ce téléphone est déjà utilisé.';
        }
    } else {
        // Génération d'un ID unique
        $id = uniqid();
        function generateToken($length = 32) {
            // Génère $length bytes d'entropie aléatoire
            $bytes = random_bytes($length);
        
            // Convertit les bytes en une chaîne hexadécimale
            $token = bin2hex($bytes);
        
            return $token;
        }
        
        $token = generateToken();

    
        // Génération d'une date de RDV aléatoire
// définir l'heure de début et de fin de la plage horaire
$heureDebut = strtotime("08:00:00");
$heureFin = strtotime("13:00:00");

$dateDebut = strtotime("now");
$dateFin = strtotime("+1 month");
$RDV = null;

// générer une date aléatoire jusqu'à ce qu'elle soit dans la plage horaire
while ($RDV === null) {
    $dateAleatoire = rand($dateDebut, $dateFin);
    $heureAleatoire = strtotime(date('H:i:s', $dateAleatoire));
    if ($heureAleatoire >= $heureDebut && $heureAleatoire <= $heureFin) {
        $RDV = date('Y-m-d H:i:s', $dateAleatoire);
    }
}

    
        // Insertion des données dans la base de données
        $sql = 'INSERT INTO sang (nom, prenom, age, telephone, password, groupe, date, id, centre, email, RDV,token) VALUES (:nom, :prenom, :age, :telephone, :password, :groupe, :date, :id, :centre, :email, :RDV,:token)';
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'age' => $age,
            'telephone' => $telephone,
            'password' => $password,
            'groupe' => $groupe,
            'date' => $date,
            'id' => $id,
            'centre' => $centre,
            'email' => $email,
            'RDV' => $RDV,
            'token' =>$token
        ]);
    
        if ($result) {
            // Affichage d'un message de confirmation
            echo "<h2>Données enregistrées</h2>";
            echo "<p>Nom : " . $nom . "</p>";
            echo "<p>Prénom : " . $prenom . "</p>";
            echo "<p>Age : " . $age . "</p>";
            echo "<p>Téléphone : " . $telephone . "</p>";
            echo "<p>Groupe sanguin : " . $groupe . "</p>";
            echo "<p>ID : " . $id . "</p>";
            echo "<p>Centre de collecte : " . $centre . "</p>";
            echo "<p> Date de rendez-vous  si vous etes Donneur : " . $RDV . "</p>";
        } else {
            // Affichage d'un message d'erreur en cas d'échec de l'insertion
            echo 'Une erreur est survenue lors de l\'ajout du donneur.';
        }
    }
}
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    // Requête SQL pour récupérer les données du donneur correspondant à l'ID
    $sql = "SELECT * FROM sang WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultat) {
        // Affichage des données dans un tableau HTML
        echo '<table style="border-collapse: collapse; width: 100%;">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Age </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Groupe </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> id </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Date </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Centre </th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> RDV</th>';
        echo '<th style="border: 1px solid black; padding: 5px;"> Etat</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>' . $resultat['nom'] . '</td>';
        echo '<td>' . $resultat['prenom'] . '</td>';
        echo '<td>' . $resultat['age'] . '</td>';
        echo '<td>' . $resultat['Telephone'] . '</td>';
        echo '<td>' . $resultat['groupe'] . '</td>';
        echo '<td>' . $resultat['id'] . '</td>';
        echo '<td>' . $resultat['date'] . '</td>';
        echo '<td>' . $resultat['centre'] . '</td>';
        echo '<td>' . $resultat['RDV'] . '</td>';
        echo '<td>' . $resultat['Etat'] . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "Aucun donneur n'a ete trouve avec cet ID.";
    }
}
if (isset($_POST['afficher'])) {
    $sql = 'SELECT * FROM sang';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<table style="border-collapse: collapse; width: 100%;">';
echo '<thead>';
echo '<tr>';
echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Age </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Groupe </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> id </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Date </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Centre </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> RDV </th>';
echo '<th style="border: 1px solid black; padding: 5px;"> Etat </th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($resultat as $row) {
    echo '<tr>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['nom'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['prenom'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['age'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['Telephone'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['groupe'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['id'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['date'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['centre'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['RDV'] . '</td>';
    echo '<td style="border: 1px solid black; padding: 5px;">' . $row['Etat'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
}
if(isset($_POST['choixA+'])) 
{
    $sql = "SELECT COUNT(*) as nb FROM sang WHERE groupe='A+'";
    $resultat = $connexion->query($sql);
    $nb_donateurs_a_plus = $resultat->fetch(PDO::FETCH_ASSOC)['nb'];
    echo "<tr><td>A+</td><td>$nb_donateurs_a_plus</td><td><button type='submit' name='choixA+'>Valider</button></td></tr>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouterR'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $telephone = $_POST['telephone'];
    $groupe = $_POST['groupe'];
    $date = $_POST['date'];
    $id = uniqid();
    $centre = $_POST['centre'];
    $dateDebut = strtotime("now");
    $dateFin = strtotime("+2 month");
    $dateAleatoire = rand($dateDebut, $dateFin);
    $RDV = date('Y-m-d H:i:s', $dateAleatoire);
    $sql = 'INSERT INTO sang2 (nom, prenom, age, telephone, groupe, date, id, centre) VALUES (:nom, :prenom, :age, :telephone, :groupe, :date, :id, :centre)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'age' => $age,
        'telephone' => $telephone,
        'groupe' => $groupe,
        'date' => $date,
        'id' => $id,
        'centre' => $centre,
        
    ]);

}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modR'])) 
{
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $telephone = $_POST['telephone'];
    $groupe = $_POST['groupe'];
    $date = $_POST['date'];
    $centre = $_POST['centre'];
    $sql = "UPDATE sang2 SET nom='$nom', prenom='$prenom', age='$age', telephone='$telephone', groupe='$groupe', date='$date', centre='$centre' WHERE id='$id'";
    $resultat = $connexion->query($sql);
    if ($resultat) {
        echo "Le donneur a été modifié avec succès.";
    } else {
        echo "Une erreur s'est produite lors de la modification du donneur : " . $connexion->errorInfo()[2];
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rechercherD']))  {
    $groupe = $_POST['groupe'];
    $centre = $_POST['centre'];
    $sql = "SELECT * FROM sang WHERE groupe = :groupe AND centre = :centre AND etat = 'Accepter'";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':groupe', $groupe);
    $stmt->bindValue(':centre', $centre);
    $stmt->execute();
    $resultats = $stmt->fetchAll();
    if(!$resultats) {
        echo "Aucun donneur trouvé";
    } else {
        echo "<h2>Résultats de la recherche</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Groupe sanguin</th><th>Centre</th></tr>";
        foreach($resultats as $donneur) {
            echo "<tr>";
            echo "<td>".$donneur['id']."</td>";
            echo "<td>".$donneur['nom']."</td>";
            echo "<td>".$donneur['prenom']."</td>";
            echo "<td>".$donneur['groupe']."</td>";
            echo "<td>".$donneur['centre']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
