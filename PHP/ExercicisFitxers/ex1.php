<?php
	//Programa que valida nom d'usuari i paraula de pas. Les dades estan en un fitxer.
    // Abrir el archivo en modo de sólo lectura:
    $archivo = fopen("ex1.txt","rb");
	
	$array = [];
	$dict = [];
	$counter = 0;
	
	if( $archivo == false ) {
		echo "Error al abrir el archivo";
	} else {
		while (feof($archivo) == false ){
			array_push($array, fgets($archivo));
			array_push($dict,preg_split("/\:/", $array[$counter]));
			$aa[$counter]= array('user' => $dict[$counter][0], 'passwd' => $dict[$counter][1]); 
			$counter++;
		}
	}

	print_r($aa);	
	fclose($archivo);

?>
