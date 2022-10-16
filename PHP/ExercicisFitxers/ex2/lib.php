<?php namespace dech\register {
define('DB_FILE', './db/ex1.txt');

function writeFile(string $username, string $password): bool {
	//open the file, cerate if not exist:
	$file = fopen(DB_FILE, "w+b");

	if(!$file) {
		echo "Error creating the file";
	} else {
		// Write in the file:
		fwrite($file, $username.":".$password);

		// Forces to write the pendent data into the buffer: 
		fflush($file);
	}
	// Close the file:
		fclose($file);
		return true;
}
}
?>
