<?php
namespace converter{
//Programa que calcula el canvi d'unitats entre graus celsius i graus Fahrenheit.

// Celcius to fahrenheit
function celConv(float $cel): float {
$result=($cel*1.8)+32;
return $result;
};

// Fahrenheit to Celcius
function fahrConv(float $fahr): float {
$result=($fahr-32)*0.5556;
return $result;
};
}
?>
