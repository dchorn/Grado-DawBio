<?php
?>
<nav class="navbar navbar-default">
<div class="container col-md-10">
<div class="navbar-header">
<a class="navbar-brand" href="https://www.proven.cat">ProvenSoft</a>
</div>
<ul class="nav navbar-nav">

<li><a href='index.php'>Home</a></li>
<li><a href='daymenu.php'>Day Menu</a></li>

<?php
if (!isset($_SESSION['user_valid'])) {
    echo "<li><a href='register.php'>Register</a></li>";
    echo "<li><a href='login.php'>Login</a></li>";
}

?>

<?php
if (isset($_SESSION['user_valid'])) {
    if ($_SESSION["rol"] == 'registered' || $_SESSION["rol"] == 'staff' || $_SESSION["rol"] == 'admin') {
        echo "<li><a href='viewmenus.php'>View Menus</a></li>";
        if ($_SESSION["rol"] == 'staff' || $_SESSION["rol"] == 'admin') {
            echo "<li><a href='adminmenus.php'>Admin menus</a></li>";
            if ($_SESSION["rol"] == 'admin') {
                echo "<li><a href='adminusers.php'>Admin users</a></li>";
            }

        }

    }

}

?>

<?php
if (isset($_SESSION['user_valid'])) {
    if ($_SESSION["rol"] == 'registered' || $_SESSION["rol"] == 'admin' || $_SESSION["rol"] == 'staff') {
        echo "<li><a href='logout.php'>Logout</a></li>";
    }

}

?>

</ul>
</div>
<div>
<?php
if (isset($_SESSION['user_valid'])) {
    $name = $_SESSION['name'];
    $rol = $_SESSION['rol'];
    echo "Name: $name, Rol: $rol";
}
?>
</div>
</nav>
