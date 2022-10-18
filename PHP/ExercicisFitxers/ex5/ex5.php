<?php
// Es desa en fitxer informació sobre paísos (nom, capital, extensió, població, etc). Amb un selector se selecciona un país 
// i  es mostra la seva informació en un formulari. El formulari permetrà enviar canvis en les dades i desar-les al fitxer.
include_once "lib.php";
use dech\country as co;

// read the csv
$csv = co\csvToArray("db/country.csv");
 
//render the array with print_r
echo '<pre>';
print_r($csv);
echo '</pre>';

?>
