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
if(isset($_POST['choixAB+'])) {
    $sql = "SELECT * FROM sang WHERE groupe = 'AB+'AND etat = 'Accepter'";
    $result = $connexion->query($sql);
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 5px;"> ID </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Telephone'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
}
if(isset($_POST['choixAB-'])) {
    $sql = "SELECT * FROM sang WHERE groupe = 'AB-'AND etat = 'Accepter'";
    $result = $connexion->query($sql);
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 5px;"> ID </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Telephone'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
}if(isset($_POST['choixA+'])) {
    $sql = "SELECT * FROM sang WHERE groupe = 'A+'AND etat = 'Accepter'";
    $result = $connexion->query($sql);
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 5px;"> ID </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Telephone'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
}if(isset($_POST['choixA-'])) {
    $sql = "SELECT * FROM sang WHERE groupe = 'A-'AND etat = 'Accepter'";
    $result = $connexion->query($sql);
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 5px;"> ID </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Telephone'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
}if(isset($_POST['choixB+'])) {
    $sql = "SELECT * FROM sang WHERE groupe = 'B+'AND etat = 'Accepter'";
    $result = $connexion->query($sql);
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 5px;"> ID </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Telephone'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
}if(isset($_POST['choixB-'])) {
    $sql = "SELECT * FROM sang WHERE groupe = 'AB+'AND etat = 'Accepter'";
    $result = $connexion->query($sql);
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 5px;"> ID </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Telephone'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
}if(isset($_POST['choixO+'])) {
    $sql = "SELECT * FROM sang WHERE groupe = 'AB+'AND etat = 'Accepter'";
    $result = $connexion->query($sql);
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 5px;"> ID </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Telephone'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
}if(isset($_POST['choixO-'])) {
    $sql = "SELECT * FROM sang WHERE groupe = 'AB+'AND etat = 'Accepter'";
    $result = $connexion->query($sql);
    echo '<table style="border-collapse: collapse; width: 100%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="border: 1px solid black; padding: 5px;"> ID </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Nom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Prenom </th>';
    echo '<th style="border: 1px solid black; padding: 5px;"> Telephone </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['id'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['nom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['prenom'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>" . $row['Telephone'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>
    </table>";
}
?>
