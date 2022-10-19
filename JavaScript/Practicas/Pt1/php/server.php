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

	function createUser(string $username, string $password, string $name, string $role="user") {
	$fp = fopen('file.csv', 'a');
	fputcsv($fp, [$username,$password,$role,$name]);
	fclose($fp);
}
	
    //paso de JSON, cadena de texto, a variable de PHP
    $entrada = json_decode($entry);

    $name   = $entrada->{'nom'}; 
    $passwd = $entrada->{'contra'};

    //codigo de PHP hago lo que sea y al final necesito
    //enviar el siguiente array

    //envio del resultado imprimiendolo: variable PHP a JSON
	echo searchUser($name, $passwd);
?>
