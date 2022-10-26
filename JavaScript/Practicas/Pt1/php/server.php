<?php
    // Recoger peticiones
    $entry = file_get_contents('php://input');

	define('FIELDS', ['password', 'role', 'name']);

	function csvToArr(): array {
	$rows = array_map('str_getcsv', file('./db/users.csv'));	
    $csv    = array();
    foreach($rows as $row) {
        $csv[$row[0]] = [FIELDS[0] => $row[1], FIELDS[1] => $row[2], FIELDS[2] => $row[3]];
	}
	return $csv;
	}

	function searchUser(string $username, string $password): string {
	$users = csvToArr();
	if (array_key_exists($username, $users)) {
		if ($users[$username]["password"] == $password) {
			$ret_value = json_encode([$username, $users[$username]["role"]]);
		} else {
			$ret_value = json_encode("Password does not match");
		}
	} else {
		$ret_value = json_encode("Username not found");
	};
	return $ret_value;
	}

	function createUser($file) {
		
		$fp = fopen($file,'a');
		var_dump($fp);
		fputcsv($fp, ["aaaa","aaaa","aaaa","aaaa"], ",");
		fclose($fp);
	}
	
    //paso de JSON, cadena de texto, a variable de PHP
    $entrada = json_decode($entry);

	//$name   = $entrada->{'nom'};
	//$username = $entrada->{'usuari'};
    //$password = $entrada->{'contra'};


	$file = './db/users.csv';
	createUser($file);

	//echo json_encode("working");

    //codigo de PHP hago lo que sea y al final necesito
    //enviar el siguiente array

    //envio del resultado imprimiendolo: variable PHP a JSON
	
	//echo searchUser($name, $password);
?>
