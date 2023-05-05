<?php
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

// Initialisation des variables à une valeur par défaut
$nom = ',';
$prenom = '';
$groupe = '';
$centre = '';
$email = '';

$sql = "SELECT * FROM sang WHERE email = '$email'";
$result = $pdo->query($sql);
if ($result->rowCount() > 0) {
    
    $row = $result->fetch();
    $nom = $row["nom"];
    $prenom = $row["prenom"];
    $groupe = $row["groupe"];
    $centre = $row["centre"];
    $email = $row["email"];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Espace Donneur</title>
</head>
<body>
	<header>
		<h1>Bienvenue dans votre Espace Donneur</h1>
	</header>
    <nav>
	<ul>
		<li><a href="#">Mes informations</a></li>
			<li><a href="#">Mes rendez-vous</a></li>
			<li><a href="#">Faire un don</a></li>
			<li><a href="#">Déconnexion</a></li>
	</ul>
</nav>

<main>
	<h2>Mes informations</h2>
	<p>Nom : <?php echo $nom; ?></p>
	<p>Prenom : <?php echo $prenom; ?></p>
	<p>Groupe sanguin : <?php echo $groupe; ?></p>
	<p>Centre : <?php echo $centre; ?></p>
</main>

<footer>
	<p>&copy; 2023 Espace Donneur</p>
</footer>
</body>
</html>
