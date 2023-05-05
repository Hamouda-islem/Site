<?php 
    $host = 'localhost';
    $dbname = 'projetsang';
    $username = 'root';
    $password = '';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try {
        $bdd = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        exit();
    }

    if(!empty($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);

        $check = $bdd->prepare('SELECT token FROM sang WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row){
            $token = bin2hex(openssl_random_pseudo_bytes(24));
            $token_user = $data['token'];

            $insert = $bdd->prepare('INSERT INTO password_recover(token_user, token) VALUES(?,?)');
            $insert->execute(array($token_user, $token));

            $link = 'recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);

            echo "<a href='$link'>Lien</a>";
        }else{
            echo "Compte non existant";
            #header('Location: ../index.php');
            #die();
        }
    }
?>
