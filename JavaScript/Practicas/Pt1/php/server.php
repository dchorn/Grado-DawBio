<?php
// Recoger peticiones
$entry = file_get_contents('php://input');

define('FIELDS', ['password', 'role', 'name']);
define('DB_FILE', './db/users.csv');

function csvToArr(): array
{
    $rows = array_map('str_getcsv', file(DB_FILE));
    $csv = array();
    foreach ($rows as $row) {
        $csv[$row[0]] = [FIELDS[0] => $row[1], FIELDS[1] => $row[2], FIELDS[2] => $row[3]];
    }
    return $csv;
}

function searchUser(string $username, string $password): string
{
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

function createUser($username, $password, $rol, $name)
{
    $fp = fopen(DB_FILE, 'a');
    fputcsv($fp, [$username, $password, $rol, $name], ",");
    fclose($fp);
}

//paso de JSON, cadena de texto, a variable de PHP

$entrada = json_decode($entry, true);

$operator = $entrada['operator'];

if ($operator === 'login') {
	echo searchUser($entrada['username'], $entrada['password']);
}
elseif($operator === 'register') {
	createUser($entrada['username'],$entrada['password'],'client',$entrada['name']);
	echo json_encode("User Created");
}
