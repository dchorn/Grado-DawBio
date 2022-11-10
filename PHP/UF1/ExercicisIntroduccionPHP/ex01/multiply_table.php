<!DOCTYPE html>
<!--Programa que mostra totes les taules de multiplicar (de l'1 al 9).-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiply Table</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
        include "php/functions.php";
        //main programm
        for($tab=1;$tab<=9;$tab++) {
            drawTable($tab);
        }?>
</body>
</html>
