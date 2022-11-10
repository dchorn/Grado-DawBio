<?php namespace dech\country{

function csvToArray($csvFile){
	$rows = array_map('str_getcsv', file($csvFile));	
	$header = array_shift($rows);
    $csv    = array();
    foreach($rows as $row) {
        $csv[] = array_combine($header, $row);
    }

    return $csv;
}
 

function rewrite() {
	$fname = "db/country.csv";
	$fhandle = fopen($fname,"r");
	$content = fread($fhandle,filesize($fname));
	$content = str_replace("pipo", "spain", $content);

	$fhandle = fopen($fname,"w");
	fwrite($fhandle,$content);
	fclose($fhandle);
}
}
?>
