<?php
//Programar una aplicació amb un formulari per introduir el nom i el cognom,
// amb un botó d'enviament i un d'esborrat del formulari. Un cop enviat el formulari 
// (per get), a la mateixa pàgina es mostraran les dades enviades i un altre camp amb 
// el nom complet formatat amb cada paraula amb la inicial en majúscules. 

$formMethod = "get";
$formInput  = ($formMethod=="get") ? INPUT_POST : INPUT_GET;
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
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido"></input><br>
            <input type="submit" name="submit" id="submit"></input>
            <input type="reset" id="reset"></input>
        </form>
    </body>
</html>

<?php
if (isset($_REQUEST["nombre"])) {  //check if form has been sent.
    $req = $_REQUEST["nombre"];
    echo "<p>Tu nombre es: " . $req . "</p>";
}

if (isset($_REQUEST["apellido"])) {  //check if form has been sent.
    $req = $_REQUEST["apellido"];
    echo "<p>Tu apellido es: " . $req . "</p>";
}

if (isset($_REQUEST["apellido"]) && isset($_REQUEST["apellido"])) {
    $nombre = $_REQUEST["nombre"];
    $apellido = $_REQUEST["apellido"];    
    echo "<p>Tu nombre completo es: " . ucfirst($nombre) . " " .  ucfirst($apellido) . "</p>";
}
