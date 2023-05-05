
<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faire un don de sang</title>
</head>
<body>
	<header>
		<h1>Faire un don de sang</h1>
	</header>

	<main>
		<form action="faitdon.php" method="POST">
		
			<input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
			<label for="daterdv">Date souhaitee pour le don :</label>
			<input type="date" id="daterdv" name="daterdv" min="2023-05-01" max="2023-05-31"
			       required pattern="^[0-9]{4}-(0[1-9]|1[0-2])-(0[7-9]|[12][0-9]|3[01])$"><br>

			<label for="dateheu">Heure souhaitee pour le don (Choisir entre 8h a 13h) :</label>
			<input type="time" id="dateheu" name="dateheu" min="08:00" max="13:00" 
			       required pattern="^[0-7]{2}:[0-9]{2}$"><br>
      
            <label>Le Centre que vous voulez faire le don :</label>
            <select id="centre" name="centre" required>
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
            </select>
            <br>
			<input type="submit" name="Faire">
		</form>
	</main>

	<footer>
		<p>&copy; 2023 Espace Donneur</p>
	</footer>
</body>
</html>
