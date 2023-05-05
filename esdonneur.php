<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetsang";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    if (empty($email) || empty($password)) {
        echo "Veuillez saisir un nom d'utilisateur et un mot de passe.";
    } else {
        $sql = "SELECT email FROM sang WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Erreur : " . mysqli_error($conn);
        } else {
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                $sql = "SELECT * FROM sang WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Erreur : " . mysqli_error($conn);
                } else {
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $id = $row["id"];
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
                        <link rel="stylesheet" href="esdonneur.css">
                    </head>
                    <body>
                        <header>
                            <h1>Bienvenue <?php echo $nom; ?> <?php echo $prenom; ?> </h1>
                        </header>
                        <nav>
                            <ul>
                            <li>
                            <form action="RDVmes.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit"  name="Mesrendez">Mes rendez-vous</button>
                                </form>
                                </li>
                                <form method="post" action="histo.php">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" value="Voir l'historique de dons">
                                </form>
<li>
<li>
    <form action="Faireundon.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit"  value="Faire">
    </form>
</li>


                           
                                </li>                                
                                <form action="Receveur.php" method="post">
                                <input type="hidden" name="groupe" value="<?php echo $groupe; ?>">
                                <input type="submit"  value="demander">
                                </form>
                                </li>                                <li>
                                <form action="Donneur1.html">
                                <button type="submit" class="btn" name="Deconnexion">Deconnexion</button>
                                </form>
                                </li>
                            </ul>
                        </nav>

                        <main>
    <h2>Mes informations</h2>
    <p>ID: <?php echo $id; ?></p>
        <p>Nom : <?php echo $nom; ?></p>
        <p>Prénom : <?php echo $prenom; ?></p>
        <p>Groupe sanguin : <?php echo $groupe; ?></p>
        <p>Email : <?php echo $email; ?></p>
        <p>Centre : <?php echo $centre; ?></p>
    </form>
</main>

                        <footer>
                            <p>&copy; 2023 Espace Utilisateur</p>
                        </footer>
                    </body>
                    </html>
                   <?php
                }
            } else {
                // Affiche un message d'erreur si les identifiants de connexion sont incorrects
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
    }
    // Ferme la connexion à la base de données
    mysqli_close($conn);
}

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Vérifier si l'identifiant et le mot de passe sont corrects
    if($_POST['email'] === 'admin@gmail.com' && $_POST['password'] === 'admin123'){
        
        // Démarrer une session pour stocker les informations de l'administrateur
        $_SESSION['admin'] = true;

        // Rediriger vers la page d'accueil de l'administrateur
        header('Location: leo.html');
        exit;
    } else {
        // Afficher un message d'erreur si l'identifiant ou le mot de passe est incorrect
        $erreur = "Identifiant ou mot de passe incorrect";
    }
}


?>