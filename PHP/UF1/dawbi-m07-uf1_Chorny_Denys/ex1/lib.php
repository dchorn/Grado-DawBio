<?php namespace dech\text {
define('DB_PATH', './db');

/*
 * Upload an image to the db folder, change its name to the actual date.
 * @param $file string
 * @return void
 * */
function uploadFile(string $file): void {
	$date = date("Y-m-d-H-i-s");

	$file_array = explode('.', $_FILES['userfile']['name']);
	$extension = end($file_array);

	$uploaddir = './db/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name'] = $date .'.'. $extension);

	if (move_uploaded_file($file, $uploadfile)) {
		#echo "File is valid, and was successfully uploaded.\n";
	} else {
		echo "Possible file upload attack!\n";
	}
}

/*
 * Scans the db dir and creates an array with all the file dirs.
 * @patam $path string
 * @return $file array 
 * */
function scanDirectory(string $path): array {
	// Get rid of the dot directoryes, we can do this in two different ways:
	foreach(scandir($path) as $value) {
		if(!is_dir($value)) {
			$files[] = $value;
		}
	};
	return $files;
}

/*
 * Create a string with full dir from each image
 * @patam $files string
 * @return $fullDir string
 * */
function createFullDir(string $files): string{
	$fullDir = "";
	$fullDir .= DB_PATH . '/' . $files;
	return $fullDir;
}


/*
 * Print images and their name in the page
 * @param $files array
 * @return voidi
 * */
function printOptions(array $files): void {
	foreach($files as $file) {
		echo "<p>".$file."</p><br>";
		echo "<img src='"."./db/".$file."' alt='imagen'>";
	}
}
}
?>
