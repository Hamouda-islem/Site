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

function generateToken($length = 32) {
    return bin2hex(openssl_random_pseudo_bytes($length));
}

if(!empty($_GET['u']) && !empty($_GET['token']) ){
       
    $u = htmlspecialchars(base64_decode($_GET['u']));
    $token = htmlspecialchars(base64_decode($_GET['token']));
       
    $check = $pdo->prepare('SELECT * FROM password_recover WHERE token_user = ? AND token = ?');
    $check->execute(array($u, $token));
    $row = $check->rowCount();
    $data = $check->fetch();
       
    if($row){
        
        $get = $pdo->prepare('SELECT token FROM sang WHERE token = ?');
        $get->execute(array($u));
        $data_u = $get->fetch();
        
        if(hash_equals($data_u['token'], $u)){
            header('Location: password_change.php?u='.base64_encode($u));
            die();
        }else{
            echo "Erreur : token non valide";
        }
    }else{
        echo "Erreur : compte inexistant";
    }
}else {
    echo "Lien non valide";
}
