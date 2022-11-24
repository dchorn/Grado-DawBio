<?php
session_start();

const POTATOES= [
    ['product' => "CocaCola",   'is' => 1.0],
    ['product' => "Fanta",  'is' => 1.5],
    ['product' => "Agua",  'is' => 2.0],
    ['product' => "Cerveza", 'is' => 2.5],
];

/**
 * echoes html code for a select element with values given in array parameter
 * @param name the name for the selector element
 * @param array the array of values for the selector 
 */
function renderSelector(string $name, array $values, mixed $valueSel = "") {
    echo "<select name=\"$name\">\n";
    foreach ($values as $value) {
        $selected = ($value == $valueSel) ? "selected='selected'" : "";
        echo "<option value=\"$value\" $selected>$value</option>\n";
    }
    echo "</select>\n";
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Buy Products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
    <div>
		<?php include_once "topmenu.php";?>
        <div>
			<h2>Buy Products</h2>
        </div>

		<table>
		  <tr>
			<th>Cantidad</th>
			<th></th>
			<th>Precio por Unidad</th>
		  </tr>
			<?php
			$product_array = [];
			foreach(POTATOES as $element) {
				echo "<tr><th> ${element['product']}<th><th>${element['is']}<th><ht><tr>";
				array_push($product_array, $element['product']);
			}
		?>
		</table>
		<br>
		<?php
			renderSelector("productsel", $product_array);
?>
				
	<form name="nombre-form" method="<?php echo $formMethod?>" action="<?php echo htmlentities($_SERVER["PHP_SELF"]);?>">
		<input type="text" name="quantity_input" id="quantity"></input>
		<input type="submit" name="get_quantity" id="submit" value="Comprar"/><br>
	</form>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>
