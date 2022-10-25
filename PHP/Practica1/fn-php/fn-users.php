<?php
/**
 * Login and Register functions, search login users in the data base.
 * Search register user in database, if the user does not exist, cerates one.
 * Denys Chorny, 20/10/2022
 * **/

define('FIELDS', ['password','role','name','surname']);
define('DB_PATH','./files/users.txt');

/**
 * Transform a (.csv, .txt, .json, ...) to asociative array, taking the first row to be the username and the values the rest.
 * @return asociative array with the data given in the file.
 **/
function csvToArr(): array {
	$rows = array_map(function($v){return str_getcsv($v, ";");}, file(DB_PATH));	
    $csv    = array();
    foreach($rows as $row) {
	$csv[$row[0]] = [FIELDS[0] => $row[1], FIELDS[1] => $row[2], FIELDS[2] => $row[3], FIELDS[3] => $row[4]];
	}
	return $csv;
}

/**
 * search a username in the data base
 * @param string $username
 * @param string $password
 * @return array with all data of that user or ... if not found
 * */
function searchUser(string $username, string $password): string | array {
	$users = csvToArr();
	if (array_key_exists($username, $users)) {
		if ($users[$username]["password"] == $password) {
			$ret_value = [$username,$users[$username]["password"],$users[$username]["role"],$users[$username]["name"],$users[$username]["surname"]];
		} else {
			$ret_value = "Password does not match";
		}
	} else {
		$ret_value = "Username not found";
	};
	return $ret_value;
}

/**
 * insert a new user in file, preventing duplicates
 * @param string $username
 * @param string $password
 * @param string $role
 * @param string $name
 * @param string $surname
 * @return bool true if successfully inserted, false otherwise
 * */
function insertUser(
	string $username,
	string $password,
	string $role,
	string $name,
	string $surname): bool {
	if (!$fp = fopen(DB_PATH, 'a')) {
		echo "Cannot open file (DB_PATH)";
		return false;
		exit;
	}
	
	if(array_key_exists($username, csvToArr())) {
		echo "The user alredy exists ";
		return false;
	} else {
		$writeList = array(array($username, $password, $role, $name, $surname)); 

		// Write $somecontent to our opened file.
		foreach ($writeList as $fields) {
			fputcsv($fp, $fields, separator: ';');
		}
		return true;
	}
    fclose($fp);
}
?>
