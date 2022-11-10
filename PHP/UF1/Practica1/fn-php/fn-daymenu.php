<?php
/**
 * Print View daymenus page
 * no me ha dado tiempo a acabarlo
 * Denys Chorny, 8/11/2022
 * **/

define('FIELDS', ['id', 'category', 'name', 'price']);
define('DB_PATH', './files/menu.txt');

/**
 * get categories from categories file and transform it to array
 * @return $array with categories
 * */
function getCategory(): array
{
	$handle = fopen('./files/categories.txt', "r");
	$array = [];

	// Add each line to an array
	if ($handle) {
	   $array = explode("\n", fread($handle, filesize('./files/categories.txt')));
	}
	return $array;
}

/**
 * Transform a .txt file into an asociative array
 * @return csv asociative array
 * */
function getCsv(): array
{
    $rows = array_map(function ($v) {return str_getcsv($v, ";");}, file('./files/menu.txt',));
    $csv = array();
	
	foreach ($rows as $row) {
        $csv[] = [FIELDS[0] => $row[0], FIELDS[1] => $row[1], FIELDS[2] => $row[2], FIELDS[3] => $row[3]];
	}
	return $csv;
}

/**
 * Asociative array to list
 * @return string with the list
 * */
function array2ul($array) {
    $out = "<ul>";
    foreach($array as $key => $elem){
        if(!is_array($elem)){
                $out .= "<li><span>$key:[$elem]</span></li>";
        }
        else $out .= "<li><span>$key</span>".array2ul($elem)."</li>";
    }
    $out .= "</ul>";
    return $out; 
}

$csv = getCsv();

echo array2ul($csv);	

?>
