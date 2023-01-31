<?php

if(!session_status() == PHP_SESSION_ACTIVE ? TRUE : FALSE) {
	session_start();
}
if (isset($_SESSION['username'])) {
	session_destroy();
	header('Location: index.php');
} else {
	echo '<p>You are not logged in.</p>';
	echo '<p>[<a href="index.php">Login</a>]</p>';
}


?>
