<?php
$formMethod = "post";
$formInput  = ($formMethod=="post") ? INPUT_POST : INPUT_GET;

const POTATOES= [
    ['from' => 0,  'to' => 10,  'is' => 1.0],
    ['from' => 11, 'to' => 65,  'is' => 0.9],
    ['from' => 66, 'to' => 100, 'is' => 0.8],
    ['from' => 101, 'to' => 300, 'is' => 0.7],
    ['from' => 301, 'to' => 5000, 'is' => 0.25]
];

$price = 10;

function select_price(int $price): string {
    $result = "";
    foreach (POTATOES as $element) {
        if (($price>= $element['from']) && ($price<= $element['to'])) {
            $result = ($price * $element['is']);
		}
    }
    return $result;
};
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


	<table>
	  <tr>
		<th>Cantidad</th>
		<th>Precio por Unidad</th>
	  </tr>
	<?php
		foreach(POTATOES as $element) {
			echo "<tr><th> ${element['from']} -> ${element['to']}<th>${element['is']}<th><ht><tr>";
		}
	?>
	</table>
	<form name="nombre-form" method="<?php echo $formMethod?>" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
		<input type="text" name="quantity_input" id="quantity"></input>
		<input type="submit" name="get_quantity" id="submit" value="Calculcate Price"/><br>
	</form>

<?php

		if (isset($_POST['quantity_input']))  {
			$num1 =  $_POST['quantity_input'];
		}
        if (isset($_POST['get_quantity'])) {
			
			if ($num1 > 5000) {
				echo "<p>Error! No se pueden comprar mas de 5000 patatas!</p>";
			} else {
			$result = select_price((int)$num1);
			echo 'result : <input type="text" name="result" id="result" value="'.$result.'" disabled>';
			}
		}
    ?>
    </body>
</html>

