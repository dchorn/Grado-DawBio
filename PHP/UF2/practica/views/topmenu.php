<?php
if(!session_status() == PHP_SESSION_ACTIVE ? TRUE : FALSE) {
	session_start();
}

$started = isset($_SESSION['username']);
?>
<nav>
    <ul>
		<?php
		if(!$started) {
			echo '<li><a href="index.php?action=home">Home</a></li>';
			echo '<li><a href="index.php?action=login/form">Login</a></li>';
			echo '<li><a href="index.php?action=product/listAll">List all products</a></li>';
		
		} else {
			echo '<li><a style="color: burlywood">Store application</a></li>';
			echo '<li><a href="index.php?action=product/form">Product form</a></li>';
			echo '<li><a href="index.php?action=user/listAll">List all users</a></li>';
			echo '<li><a href="index.php?action=user/form">User form</a></li>';
			echo '<li><a href="index.php?action=logout">Logout</a></li>';
		}
		?>
    </ul>
</nav>
