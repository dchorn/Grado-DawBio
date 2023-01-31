<?php
if(!session_status() == PHP_SESSION_ACTIVE ? TRUE : FALSE) {
	session_start();
}

$started = isset($_SESSION['username']);
?>
   <form  method="post" action="index.php">
    <fieldset>
        <label for="username">Username: </label><input type="text" name="username" id="username" placeholder="enter username"/>
        <label for="password">Password: </label><input type="password" name="password" id="password" placeholder="enter password" />
   </fieldset>
	<fieldset>
<?php
		if(!$started) {
			echo '<button type="submit" name="action" value="user/login">Login</button>';
		} else {
			echo '<button type="submit" name="action" value="user/login" disabled>Login</button><br><br>';
			echo 'Ya tienes una session iniciada, cierra la session para poder loguearte.';
		}
		?>		
	</fieldset>
</form>
<?php
