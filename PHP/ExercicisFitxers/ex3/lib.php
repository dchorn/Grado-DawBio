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

function strFile(string $path): string {
	return file_get_contents($path);
	}

function removeSpecialChar(string $char): string {
	return preg_replace('/[^A-Za-z0-9\-]/', '', $char); // Removes special chars.
}

function countInitials(string $text): array {
	$result = [];
	$array= [];

	foreach(explode(' ', $text) as $word) {
		if (!empty($word)) {
			$result[] .= strtoupper(removeSpecialChar($word[0]));
		}
	}

	sort($result);
	
	foreach($result as $letter) {
		if(!array_key_exists($letter, $array)) {
			$array[$letter] = 1;
		} else {
			$array[$letter] += 1;
		}
	}

	return $array;
}

function printArr(array $array) {
	foreach($array as $key => $value) {
		echo "<p>Hay " . $value. " palabras que comienzan con una " . $key . "</p>";
	}
}

function textLetterCount(string $text) {
	$fullDir = createFullDir($text);
	$strFile = strFile($fullDir);
	$initials = countInitials($strFile);
	printArr($initials);
}
}
?>
