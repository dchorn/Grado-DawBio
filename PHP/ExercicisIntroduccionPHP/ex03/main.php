<!DOCTYPE html>
<!--Programa que calcula el canvi d'unitats entre graus celsius i graus Fahrenheit.-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Celcius to Fahrenheit Converter</title>
</head>
<body>
    <h1>Celcius to Fahrenheit Converter</h1>
<?php
    use converter as conv;
    $cel=5.7;
    $fahr=90.2;
    include "funct.php";
    $resultCel = conv\celConv($cel); 
    $resultFahr = conv\fahrConv($fahr); 
    printf("La conversion de %.2f celcius a fahrenheit es de: %.2f<br>", $cel, $resultCel);
    printf("La conversion de %.2f fahrenheit a celcius es de: %.2f", $fahr, $resultFahr);
?>  
</body>
</html>
