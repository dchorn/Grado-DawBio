<?php
//Programa que envia un nom d'usuari i una paraula de pas i les afegeix al fitxer d'usuaris.
include_once "lib.php";
use dech\register as register;

$formMethod = "post";
$formInput  = ($formMethod=="post") ? INPUT_POST : INPUT_GET;

if (isset($_POST['submit'])) {

}
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
	if(isset($userLogin)) {
		$response = match ($userLogin) {
			true => "<p>Se ha iniciado sesion correctamente!</p>",
			false => "<p>Error! Los datos introducidos son incorrectos.</p>"
		};
		echo $response;
	}	
	?>
	</body>
</html>
