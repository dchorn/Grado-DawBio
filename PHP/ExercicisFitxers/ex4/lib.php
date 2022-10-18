<?php namespace dech\text {
define('DB_PATH', './db');

function uploadFile($file) {
	$uploaddir = './db/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	if (move_uploaded_file($file, $uploadfile)) {
		echo "File is valid, and was successfully uploaded.\n";
	} else {
		echo "Possible file upload attack!\n";
	}
}

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

function strFile(string $path): string {
	return file_get_contents($path);
	}

function textArea(string $text) {
	$fullDir = createFullDir($text);
	$strFile = strFile($fullDir);
	echo "<br><textarea>$strFile</textarea>";
}
}
?>
