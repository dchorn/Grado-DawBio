<?php
// Es desa en fitxer informació sobre paísos (nom, capital, extensió, població, etc). Amb un selector se selecciona un país 
// i  es mostra la seva informació en un formulari. El formulari permetrà enviar canvis en les dades i desar-les al fitxer.

$fname = "db/country.csv";
$fhandle = fopen($fname,"r");
$content = fread($fhandle,filesize($fname));
$content = str_replace("spain", "spain", $content);

$fhandle = fopen($fname,"w");
fwrite($fhandle,$content);
fclose($fhandle);

?>
