<?php 

$host = 'localhost';
$dbname = 'projetsang';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    // Activer les erreurs PDO pour mieux les traiter
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit();
}

if(!empty($_POST['email'])){
    // Éviter l'utilisation de htmlspecialchars pour les adresses email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Adresse email invalide";
        exit();
    }

    $check = $pdo->prepare('SELECT token FROM sang WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row > 0){
        // Utiliser la fonction random_bytes() à la place de openssl_random_pseudo_bytes() pour générer des jetons aléatoires plus sûrs
        $token = bin2hex(random_bytes(24));
        $token_user = $data['token'];

        $insert = $pdo->prepare('INSERT INTO password_recover(token_user, token) VALUES(?,?)');
        $to = $email ;
        
        // Encoder les paramètres dans l'URL pour éviter les attaques par injection de code et autres vulnérabilités
        $link = 'recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);
        $from = 'islemhamouda05@gmail.com';
        $reply_to = $email;
        $subject = 'Récupération de mot de passe';
        $message= "Bonjour,\n\nVous avez demandé à récupérer votre mot de passe. Cliquez sur le lien suivant pour réinitialiser votre mot de passe : 'https://www.mon-site.com/reinitialiser-mot-de-passe.php'>Réinitialiser mot de passe \n Si vous n'avez pas demandé à récupérer votre mot de passe, vous pouvez ignorer ce message.\n\nCordialement,\nL'équipe de support technique";

        
        $headers = array(
            'From' => $from,
            'Reply-To' => $reply_to,
            // Utiliser le codage utf-8 pour le contenu
            'Content-type' => 'text/plain; charset=utf-8',
        );
        
        $headers_str = '';
        foreach ($headers as $key => $value) {
            $headers_str .= "$key: $value\r\n";
        }
        
        if($insert->execute(array($token_user, $token))){
            // Utiliser la fonction mail() de manière sécurisée pour éviter les attaques par injection de code
            $success = mail($to, $subject, $message, $headers_str, "-f $from");
            if(!$success){
                echo "Impossible d'envoyer le courriel de récupération de mot de passe";
            }else{
                echo "Un courriel de récupération de mot de passe a été envoyé à l'adresse $to";
            }
        }else{
            echo "Une erreur est survenue lors de l'enregistrement du jeton";
        }
    }else{
        echo "Compte non existant";
    }
}
