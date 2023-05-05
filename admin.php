<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs des champs de formulaire
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Vérifie si les champs sont vides
    if (empty($username) || empty($password)) {
        // Affiche un message d'erreur si les champs sont vides
        echo "Veuillez saisir un nom d'utilisateur et un mot de passe.";
    } else {
        // Vérifie si les identifiants de connexion sont corrects
        if ($username == "admin" && $password == "admin") {
            // Redirige l'utilisateur vers la page de tableau de bord
            header("Location: tableau.html");
            exit;
        } else {
            // Affiche un message d'erreur si les identifiants de connexion sont incorrects
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
}
?>
