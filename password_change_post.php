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
        
  if(!empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['token'])){
      $password = htmlspecialchars($_POST['password']);
      $password_repeat = htmlspecialchars($_POST['password_repeat']);
      $token = htmlspecialchars($_POST['token']);

      $check = $pdo->prepare('SELECT * FROM sang WHERE token = ?');
      $check->execute(array($token));
      $row = $check->rowCount();

      if($row){
          if($password === $password_repeat){
            $password = $_POST['password'];


              $update = $pdo->prepare('UPDATE sang SET password = ? WHERE token = ?');
              $update->execute(array($password, $token));
                    
              $delete = $pdo->prepare('DELETE FROM password_recover WHERE token_user = ?');
              $delete->execute(array($token));

              echo "Le mot de passe a bien été modifié";
          }else{
              echo "Les mots de passe ne sont pas identiques";
          }
      }else{
          echo "Compte non existant";
      }
  }else{
      echo "Merci de renseigner un mot de passe";
  }
