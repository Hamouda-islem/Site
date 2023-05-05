<!DOCTYPE html>
<html>
<head>
	<title>Ma page de rendez-vous</title>
	<style>


    </style>
</head>
<body>
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

// Requête pour compter le nombre de donneurs A+
$sql_a_plus = "SELECT COUNT(*) as nb FROM sang WHERE groupe='A+'AND etat = 'Accepter'";
$sql_a_moins = "SELECT COUNT(*) as nb FROM sang WHERE groupe='A-'AND etat = 'Accepter'";
$sql_b_plus = "SELECT COUNT(*) as nb FROM sang WHERE groupe='B+'AND etat = 'Accepter'";
$sql_b_moins = "SELECT COUNT(*) as nb FROM sang WHERE groupe='B-'AND etat = 'Accepter'";
$sql_ab_plus = "SELECT COUNT(*) as nb FROM sang WHERE groupe='AB+'AND etat = 'Accepter'";
$sql_ab_moins = "SELECT COUNT(*) as nb FROM sang WHERE groupe='AB-'AND etat = 'Accepter'";
$sql_o_plus = "SELECT COUNT(*) as nb FROM sang WHERE groupe='O+'AND etat = 'Accepter'";
$sql_o_moins = "SELECT COUNT(*) as nb FROM sang WHERE groupe='O-'AND etat = 'Accepter'";

// Exécution des requêtes
$resultat_a_plus = $connexion->query($sql_a_plus);
$resultat_a_moins = $connexion->query($sql_a_moins);
$resultat_b_plus = $connexion->query($sql_b_plus);
$resultat_b_moins = $connexion->query($sql_b_moins);
$resultat_ab_plus = $connexion->query($sql_ab_plus);
$resultat_ab_moins = $connexion->query($sql_ab_moins);
$resultat_o_plus = $connexion->query($sql_o_plus);
$resultat_o_moins = $connexion->query($sql_o_moins);

// Récupération des nombres de donneurs
$nb_donateurs_a_plus = $resultat_a_plus->fetch(PDO::FETCH_ASSOC)['nb'];
$nb_donateurs_a_moins = $resultat_a_moins->fetch(PDO::FETCH_ASSOC)['nb'];
$nb_donateurs_b_plus = $resultat_b_plus->fetch(PDO::FETCH_ASSOC)['nb'];
$nb_donateurs_b_moins = $resultat_b_moins->fetch(PDO::FETCH_ASSOC)['nb'];
$nb_donateurs_ab_plus = $resultat_ab_plus->fetch(PDO::FETCH_ASSOC)['nb'];
$nb_donateurs_ab_moins = $resultat_ab_moins->fetch(PDO::FETCH_ASSOC)['nb'];
$nb_donateurs_o_plus = $resultat_o_plus->fetch(PDO::FETCH_ASSOC)['nb'];
$nb_donateurs_o_moins = $resultat_o_moins->fetch(PDO::FETCH_ASSOC)['nb'];

// Affichage du tableau
echo "<form method='post' action='affichq.php'>
<table>
    <thead>
        <tr>
            <th>Type de sang</th>
            <th>Quantité disponible</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>A+</td>
            <td>$nb_donateurs_a_plus</td>
            <td><button type='submit' name='choixA+'>Afficher les donneurs</button></td>
        </tr>
        <tr>
            <td>A-</td>
            <td>$nb_donateurs_a_moins</td>
            <td><button type='submit' name='choixA-'>Afficher les donneurs</button></td>
        </tr>
        <tr>
            <td>B+</td>
            <td>$nb_donateurs_b_plus</td>
            <td><button type='submit' name='choixB+'>Afficher les donneurs</button></td>
        </tr>
        <tr>
            <td>B-</td>
            <td>$nb_donateurs_b_moins</td>
            <td><button type='submit' name='choixB-'>Afficher les donneurs</button></td>
        </tr>
        <tr>
            <td>AB+</td>
            <td>$nb_donateurs_ab_plus</td>
            <td><button type='submit' name='choixAB+'>Afficher les donneurs</button></td>
        </tr>
        <tr>
            <td>AB-</td>
            <td>$nb_donateurs_ab_moins</td>
            <td><button type='submit' name='choixAB-'>Afficher les donneurs</button></td>
        </tr>
        <tr>
            <td>O+</td>
            <td>$nb_donateurs_o_plus</td>
            <td><button type='submit' name='choixO+'>Afficher les donneurs</button></td>
        </tr>
        <tr>
            <td>O-</td>
            <td>$nb_donateurs_o_moins</td>
            <td><button type='submit' name='choixO-'>Afficher les donneurs</button></td>
        </tr>
    </tbody>
</table>
</form>";
?>
</body>
</html>
