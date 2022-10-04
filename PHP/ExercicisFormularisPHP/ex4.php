<?php

$formMethod = "post";
$formInput  = ($formMethod=="post") ? INPUT_POST : INPUT_GET;
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
            <fieldset>Calculadora</fieldset>
            <p>Select the first operand:</p>
            <input type="radio" id="suma" name="operator" value="+">
            <label for="suma">+</label><br>
            <input type="radio" id="resta" name="operator" value="-">
            <label for="resta">-</label><br>
            <input type="radio" id="multiplicacion" name="operator" value="*">
            <label for="multiplicacion">*</label><br>
            <input type="radio" id="division" name="operator" value="/">
            <label for="division">/</label><br>

     <input type="text" name="num1" id="num1"></input>
            <input type="text" name="num2" id="num2"></input>
            <input type="submit" name="calculate" id="submit" value="Calculcate"/><br>
                </form>
    <?php
        if (isset($_POST['num1']) && isset($_POST['num2']))  {
            $num1 =  $_POST['num1'];
            $num2 =  $_POST['num2'];
        }

        function calculation($num1, $num2, $operator) {
            switch($operator) {
                case '+': return $num1 + $num2;
                case '-': return $num1 - $num2;
                case '*': return $num1 * $num2;
                case '/': return $num1 / $num2;
            }  
        } 
        if (isset($_POST['calculate'])) {
            if (isset($_POST['operator'])) {
                $operator = $_POST['operator'];
                $result = calculation($num1, $num2, $operator);
                echo 'Result : <input type="text" name="result" id="result" value="'.$result.'" disabled>';
            }
        }
    ?>
    </body>
</html>
