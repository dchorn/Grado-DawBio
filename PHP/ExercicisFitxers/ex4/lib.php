<?php namespace dech\text {
define('DB_PATH', './db');

function scanDirectory(string $path): array {
	// Get rid of the dot directoryes, we can do this in two different ways:
	foreach(scandir($path) as $value) {
		if(!is_dir($value)) {
			$files[] = $value;
		}
	};
	return $files;
}

function createFullDir(string $files): string{

	$fullDir = "";
	$fullDir .= DB_PATH . '/' . $files;

	return $fullDir;
}

function printOptions(array $files): void {
	
	foreach($files as $file) {
		echo "<option value='".$file."'>$file</option>";
	}
}

function readFile(string $path): string {

	$text = fopen($path, "rb");

	return $text;
}

function countLetters(string $path): string {

	$text = file_get_contents($path);

	return $text;	
	}
}
?>
