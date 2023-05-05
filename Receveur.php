<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetsang";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	$groupe = $_POST['groupe'];
?>
<html>
<head>
	<title>Receveur de sang</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Bienvenue  dans l'espace Receveur </h1>

	<h2>Rechercher des donneurs de sang</h2>
	<form method="POST" action="rechD.php">
	<input type="hidden" name="groupe" value="<?php echo $_POST['groupe']; ?>">

		<br><br>
		<p>Groupe sanguin : <?php echo $groupe; ?></p>

		<label for="centre">Centre de don :</label>
		<select  name="centre" id="centre"required><br><br>
			<option value="">Choisir Le Centre</option>
			<option value="Centre 1014">DSP SETIF 1014</option>
			<option value="Centre lhchama">CHU SETIF lhchama</option>
			<option value="Centre Bizzare">CHU SETIF Bizzare</option>
			<option value="Centre kaaboub">CHU SETIF kaaboub</option>
			<option value="Centre saadna abdenour">CHU SETIF Saadna Abdenour</option>
			<option value="AIN_KBIRA">EPH AIN EL KEBIRA</option>
			<option value="EL_EULMA">EPH EL EULMA</option>
			<option value="BENI_OURTHILANE">EPH BENI OURTILANE</option>
			<option value="AIN_OULMENE">EPH AIN OULMENE</option>
			<option value="RAS_EL_MA">EHS RAS EL MA</option>
			<option value="AIN_ABESSA">EPSP AIN ABESSA</option>
			<option value="AIN_AZEL">EPSP AIN AZEL</option>
			<option value="BENI_AZIZ">EPSP BENI AZIZ</option>
		</select><br>
		<br><br>
		<button type="submit" name="rechercherD">Rechercher des donneurs de sang</button>
	</form>

	<h2>Consulter les donneurs de sang</h2>
	<form method="POST" action="rechD.php">
	<label for="groupe_sanguin">Sélectionnez le groupe sanguin :</label>
<select name="groupe" id="groupe">
  <?php 
    $groupe = $_POST['groupe'];

    if ($groupe == "O+") {
      echo '<option value="O+">O+</option>
            <option value="O-">O-</option>';
    } else if ($groupe == "O-") {
      echo '<option value="O-">O-</option>';
    } else if ($groupe == "A+") {
      echo '<option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>';
    } else if ($groupe == "A-") {
      echo '<option value="O-">O-</option>
            <option value="A-">A-</option>';
    } else if ($groupe == "B+") {
      echo '<option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>';
    } else if ($groupe == "B-") {
      echo '<option value="O-">O-</option>
            <option value="B-">B-</option>';
    } else if ($groupe == "AB+") {
      echo '<option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>';
    } else if ($groupe == "AB-") {
      echo '<option value="O-">O-</option>
            <option value="A-">A-</option>
            <option value="B-">B-</option>
            <option value="AB-">AB-</option>';
    }
  ?>
</select>

		<br><br>
		<button type="submit" name="rechercherD2">Consulter les donneurs de sang</button>
	</form>
	<h2>Dernières actualités</h2>
	<p>Voici les dernières actualités relatives au don de sang :</p>
	<ul>
		<li>Organisation d'une collecte de sang le 1er mai dans le centre-ville</li>
		<li>Les critères pour devenir donneur de sang ont été assouplis</li>
		<li>Les stocks de sang sont actuellement suffisants, mais n'hésitez pas à donner si vous le pouvez</li>
	</ul>

	<h2>Contact</h2>
	<p>N'hésitez pas à nous contacter si vous avez des questions :</p>
	<ul>
		<li>Téléphone : 01 23 45 67 89</li>
		<li>Email : contact@sang.org</li>
	</ul>
</body>
</html>