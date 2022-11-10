<?php namespace dech\login {
define('DB_FILE', './db/ex1.txt');

function checkLogin(string $username, string $password): bool {
	$archivo = fopen(DB_FILE,"rb");
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
}
?>
