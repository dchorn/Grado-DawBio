<?php session_start();
/*
 * Login form, after inserting the values, it checks if they are in the database,
 * if they exist, you enter in your session and be redirect to the home.
 * Denys Chorny, 25/10/2022
 * */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div>
    <?php include_once "topmenu.php";?>
  <h2>Login form</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<div class="form-group">
      <label for="username">User:</label>
      <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" name="loginsubmit" class="btn btn-default">Submit</button>
  </form>
	<?php
require_once './functions.php';
if ((filter_has_var(INPUT_POST, 'username')) && (filter_has_var(INPUT_POST, 'password'))) { //variables received
    $username = htmlentities(trim($_POST['username']));
    $password = htmlentities(trim($_POST['password']));

    $result = searchUser($username, $password); //checks user if it exists

    if ((strlen($username) == 0) || (strlen($password) == 0)) { //values not provided.
        echo "<p>User and password required.</p>";
    } else {
        if (($username === $result[0]) && ($password === $result[1])) { //check values $result[0] = password, $result[1] = password in the db
            $_SESSION["user_valid"] = true;
            $_SESSION["user"] = $username;
            header("Location: index.php"); //redirect to application page
            exit;
        } else { //bad login: redirect to login page again.
            echo "<p>Access denied.</p>";
        }
    }
}
?>
</div>

</div>
<?php include_once "footer.php";?>
</div>
</body>
</html>
