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
            <fieldset>Formulario Nombre</fieldset>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre"></input><br>
            <input type="checkbox" id="sport" name="sport[]" value="futbol">
            <label for="sport">Futbol</label>
            <input type="checkbox" id="sport" name="sport[]" value="basquet">
            <label for="sport">Basquet</label>
            <input type="checkbox" id="sport" name="sport[]" value="snow">
            <label for="sport">Snow</label>
            <input type="checkbox" id="sport" name="sport[]" value="ski">
            <label for="sport">Ski</label>
            <input type="submit" name="sendForm" id="submit" value="Enviar"/>
    </form>

<?php
    if (isset($_POST["sendForm"])) {
        if (isset($_POST['sport']) == false) {
            echo "<p>No has elegido nungun deporte</p>";
        } else {
            echo "<p>Los deportes que eligio " . $_POST["nombre"] . " son:</p>";   
            foreach($_POST['sport'] as $sp) {
                echo "<p> $sp </p>";
            }
        }
    }
    ?>

    </body>
</html>
