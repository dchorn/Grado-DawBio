<?php
session_start();
require_once './User.php';
if (isset($_SESSION['userList'])) {
	$userList = unserialize($_SESSION['userList']);
} else {
	$userList = array();
}
if(filter_has_var(INPUT_POST, 'submit')) { // el formulario se ha enviado
	$username = filter_input(INPUT_POST, 'username');
	$password= filter_input(INPUT_POST, 'password');
	$user = new User($username, $password);
	array_push($userList, $user);
	$_SESSION['userList'] = serialize($userList);
} else {
	$username = '';
	$password = '';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="URF-8">
	<title></title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"></form>
	<div>
		<label>Username: </label>
		<input type="text" name="username" value="<?php echo $username; ?>"/>
	</div>
	<div>
		<label>Password: </label>
		<input type="text" name="password" value="<?php echo $password; ?>"/>
	</div>
	<div>
		<button type="submit" name="submit" value="send">Send</button>
		<button type="clear" name="clear" value="send">Clear</button>
	</div>
	<h3>Current users</h3>
	<ul>
	<?php
		foreach($userList as $u) {
			printf("<li>%s</li>",$u);
		}
	?>
	</ul>
</body>
</html>
