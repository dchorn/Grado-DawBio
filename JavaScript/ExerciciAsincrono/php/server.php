<?php

    // Recoger peticiones
    $entry = file_get_contents('php://input');

    //paso de JSON, cadena de texto, a variable de PHP
    $entrada = json_decode($entry);


    $name = $entrada->{'nom'}; 
    $course = $entrada->{'curs'};
    
    //codigo de PHP hago lo que sea y al final necesito
    //enviar el siguiente array
    $array=['dawbio2', 'daw2'];

    //envio del resultado imprimiendolo: variable PHP a JSON
    echo json_encode($array);

?>
