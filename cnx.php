<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['username'] === 'admin' && $_POST['password'] === 'admin123'){

        session_start();
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $erreur = "Identifiant ou mot de passe incorrect";
    }
}
?>