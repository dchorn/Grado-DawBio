<?php
//Programa que obre un fitxer amb text(seleccionat per l'usuari d'entre els disponibles) i indica en una taula el nombre de paraules que comencen per cada lletra.
include_once "lib.php";
use dech\text as tx;

use function dech\text\printArr;

$formMethod = "post";
$formInput  = ($formMethod=="post") ? INPUT_POST : INPUT_GET;

$files = (tx\scanDirectory(DB_PATH));

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Formulario Nombre</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			fieldset {background-color: lightgray;}
		</style>
	</head>
	<body>
	<form name="nombre-form" method="<?php echo $formMethod?>" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
			<fieldset>Text:</fieldset>
			<h1>The option element</h1>
			<label for="cars">Choose a car:</label>
			<select name="filesOption">
			<option value="" disabled selected>Choose option</option>
			<?php
				tx\printOptions($files);
			?>
			</select>
			<input type="submit" name="submit" id="submit" value="Enviar"/>
			<?php
			if(isset($_POST['submit'])) {
				if(!empty($_POST['filesOption'])) {
					$selected = $_POST['filesOption'];
					$fullDir = tx\createFullDir($selected);
					$strFile = tx\strFile($fullDir);
					$initials = tx\countInitials($strFile);
					printArr($initials);
				} 
				else {
					echo '<p>Please, select a value.</p>';
				}
			}
			?>
	</form>
	</body>
</html>
