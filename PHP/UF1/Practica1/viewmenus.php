<?php
session_start();
if ($_SESSION["rol"] != 'admin' and $_SESSION["rol"] != 'staff' and $_SESSION["rol"] != 'registered') {
	header("location: error.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>DAWBI-M07-Pt11</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container-fluid">
        <?php include_once "topmenu.php";?>
        <div class="container">
        <h2>View menus</h2>
		
		<?php include_once 'fn-php/fn-print.php';?>
 
		</div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>