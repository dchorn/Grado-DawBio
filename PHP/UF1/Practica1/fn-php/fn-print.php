<?php
/**
 * Print View menus page
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
 * Print table from asociative array depending on witch category passed
 * @param string $category
 * @param array $csv
 * */
function printMenus($category, $csv) {
	echo "<div class='container'>";
	echo '<table class="table">';
	echo "<h4>".strtoupper($category)."<h4>";
	echo "<tr><td>ID</td><td>CATEGORY</td><td>NAME</td><td>PRICE</td></tr>";
	foreach($csv as $array=>$value) {
		if ($value['category'] == $category) {
			echo "<tr>";
			foreach($value as $key2=>$row2){
				echo "<td>" . $row2 . "</td>";
			}
			echo "</tr>";
		}	
	}
	echo '</table>';
	echo '</div>';
}

$categories = getCategory('./files/categories.txt');

$csv = getCsv();

foreach($categories as $cat=>$value) {
	if($value != '') {	
		printMenus($value,$csv);
	}
}
?>
