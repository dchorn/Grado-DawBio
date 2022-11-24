<?php
?>
<nav class="navbar navbar-default">
<div>
<ul>
<li><a href='index.php'>Home</a></li>
<!--<li><a href='login.php'>Login</a></li>-->

<?php
if (!isset($_SESSION['user_valid'])) {
    echo "<li><a href='login.php'>Login</a></li>";
}


if (isset($_SESSION['user_valid'])) {
    echo "<li><a href='buy.php'>Buy</a></li>";
    echo "<li><a href='shoppingCart.php'>Shopping Cart</a></li>";
    echo "<li><a href='logout.php'>Logout</a></li>";
}
?>
</ul>
</div>
</nav>
