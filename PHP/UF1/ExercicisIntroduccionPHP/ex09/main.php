<?php
// Programa que, donat un array amb una llista de nombres, calcula els següents paràmetres estadístics: mitjana, mediana, mínim, màxim.

// array de numeros
$arr = [15,20,3,8,65,42,9,50];

// calcula la mitjana: suma de todos los numeros y dividido entre el numero de datos.
$mitjana = ((array_sum($arr))/(count($arr)));

// si la suma de datos da par entra en el if
if (((count($arr))%2) == 0) {
    // se encuentra los dos numeros del centro, se suman y se divide entre dos
    $mediana = array_sum(array_slice($arr,(count($arr)/2)-1,2))/2;
} else {
    // se encuentra el numero del centro
    $mediana = array_slice($arr,count($arr)/2,1)[0];
};

// imprime el array
echo "El array es: ";
foreach($arr as $value) {
    echo $value . " ";
}

echo "<br>";

echo "la mitjana es: " . $mitjana . "<br>";
echo "la mediana es: " . $mediana . "<br>";
echo "el minimo es: " . min($arr) . "<br>";
echo "el maximo es: " . max($arr);

?>
