
<?php
	$formMethod = "post";
	$formInput  = ($formMethod=="post") ? INPUT_POST : INPUT_GET;

	//Programa que valida nom d'usuari i paraula de pas. Les dades estan en un fitxer.
    // Abrir el archivo en modo de sólo lectura:
	
	function checkLogin(string $username, string $password): bool {
		$archivo = fopen("ex1.txt","rb");
		while (!feof($archivo)) {
			fscanf($archivo, "%s\n", $line);
			$userPasswd = explode(":", $line);
			$arr[$userPasswd[0]] = $userPasswd[1];
			if (in_array($username, array_keys($arr)) && $password == $arr[$username]) {
				$userOk = true;
			} else {
				$userOk = false;
			};
		}
		fclose($archivo);
		return $userOk;
	}

	if (isset($_POST["submit"])) {
		$userLogin = checkLogin(htmlspecialchars($_POST["nombre"]), htmlspecialchars($_POST["contra"]));
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
				true => "<p>Si</p>",
				false => "<p>No</p>"
			};
			echo $response;
		}	
		?>
		</body>
	</html>
