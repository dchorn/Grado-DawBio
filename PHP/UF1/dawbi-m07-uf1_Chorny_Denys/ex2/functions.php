<?php
/**
 * Login function, get data from text file and validate it with the user input
 * Denys Chorny, 22/11/2022 
 * **/

define('FIELDS', ['password']);
define('DB_PATH', './files/users.txt');

const PRICE = [
    ['from' => 0,  'to' => 10,  'is' => 1.0],
    ['from' => 11, 'to' => 65,  'is' => 0.9],
    ['from' => 66, 'to' => 100, 'is' => 0.8],
    ['from' => 101, 'to' => 300, 'is' => 0.7],
    ['from' => 301, 'to' => 5000, 'is' => 0.25]
];

/**
 * Transform a (.csv, .txt, .json, ...) to asociative array, taking the first row to be the username and the values the rest.
 * @var csv, creates a null array
 * @return csv asociative array with the data given in the file.
 **/
function csvToArr(): array
{
    $rows = array_map(function ($v) {return str_getcsv($v, ";");}, file(DB_PATH));
    $csv = array();
    foreach ($rows as $row) {
        $csv[$row[0]] = [FIELDS[0] => $row[1]];
    }
    return $csv;
}

/**
 * search a username in the data base
 * @param string $username
 * @param string $password
 * @return ret_value array with all data of that user or ... if not found
 * */
function searchUser(string $username, string $password): string | array
{
    $users = csvToArr();
    if (array_key_exists($username, $users)) {
        if ($users[$username]["password"] == $password) {
            $ret_value = [$username, $users[$username]["password"]];
        } else {
            $ret_value = "Password does not match";
        }
    } else {
        $ret_value = "Username not found";
    };
    return $ret_value;
}
