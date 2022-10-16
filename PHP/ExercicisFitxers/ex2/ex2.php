<?php
//Programa que envia un nom d'usuari i una paraula de pas i les afegeix al fitxer d'usuaris.
include_once "lib.php";
use dech\register as register;

$formMethod = "post";
$formInput  = ($formMethod=="post") ? INPUT_POST : INPUT_GET;

if (isset($_POST["submit"])) {
	$userInDB = register\checkLogin(htmlspecialchars($_POST["nombre"]), htmlspecialchars($_POST["contra"]));
	if($userInDB == true) {
		$userExists = true;
	} else {
		register\writeFile(htmlspecialchars($_POST["nombre"]), htmlspecialchars($_POST["contra"]));
		$userCreated = true;
	}
}
//if (isset($_POST["submit"])) {
//}
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
			<fieldset>Login:</fieldset>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre"></input><br>
			<label for="contra">Contra</label>
			<input type="text" name="contra" id="contra"></input><br>
			<input type="submit" name="submit" id="submit" value="Enviar"/>
	</form>
	<?php
	if(isset($userInDB)) {
		if (isset($userExists)) {
			echo "<p>The user is on the Database.</p>";
		} else if (isset($userCreated)) {
			echo "<p>User Created \"" . htmlentities($_POST["nombre"]) . "\"</p>";
		}
	}	
	?>
	</body>
</html>
