<?php
/*
 * Programa que et deixa pujar imatges i visualitzarles.
 **/
include_once "lib.php";
use dech\text as tx;

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
		div {
			text-align: center;
		}

		img {
			width: 60%;
			margin: auto;
			display: block;
		}
	</style>

	</head>
	<body>

	<form name="file-form" method="<?php echo $formMethod?>" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
		Select image to upload:
		  <input type="file" name="userfile" id="userfile">
		  <input type="submit" value="Upload Image" name="submitUpload">
	</form>
	<form name="nombre-form" method="<?php echo $formMethod?>" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
		<h1>Images in DB</h1>

		<div>
			<?php
			if(isset($_POST['submitUpload'])) {
				tx\uploadFile($_FILES['userfile']['tmp_name']);
			}
			tx\printOptions($files);
			?>
		</div>
	</form>
	</body>
</html>
