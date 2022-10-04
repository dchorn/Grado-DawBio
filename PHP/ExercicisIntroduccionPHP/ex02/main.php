<!DOCTYPE html>
<!--Programa que calcula l'índex de massa corporal (BMI) a partir del pes (kg.) i l'alçada (m). també mostra el diagnòstic d'acord amb la classificació del valor de BMI.-->
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BMI CALCULATOR</title>
</head>
<body>
<?php
use functions as func; 
include "function.php";

$weight = 70.0; //the weight in kg
$height = 1.74; //the height in m 

$value = func\bmiCalc($weight, $height);
$diagnose = func\bmiDiagnose($value);

printf("Your weight is: %.2f. Your height is %.2f. Your BMI is %.2f. The diagnose is: %s",
$weight, $height, $value, $diagnose);
?>

</body>
</html>
