<?php namespace dech\register {
define('DB_FILE', './db/ex2.txt');

function checkLogin(string $username, string $password): bool {
	$archivo = fopen(DB_FILE, "rb");
	while (!feof($archivo)) {
		fscanf($archivo, "%s\n", $line);
		$userPasswd = explode(":", $line);
		$arr[$userPasswd[0]] = $userPasswd[1];
		if (in_array($username, array_keys($arr)) && $password == $arr[$username]) {
			$userOk = true;
		} else {
			$userOk = false;
		};
	}
	fclose($archivo);
	return $userOk;
}

function writeFile(string $username, string $password): void {
	//open the file, cerate if not exist:
	$file = fopen(DB_FILE, "ab");

	if($file == false) {
		echo "Error creating the file";
	} else {
		// Write in the file:
		$writeInDB = $username . ":" . $password;
		fwrite($file, $writeInDB);
		// Forces to write the pendent data into the buffer: 
		fflush($file);
	}
	// Close the file:
		fclose($file);
}
}
?>
