<?php
session_start();

	if(isset($_SESSION['logged_in'])) {
		unset($_SESSION['logged_in']);
	}

	header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title> Assignment 5 - chloe_becker </title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
<p>Logging Out</p>
</body>

</html>
<?php $mysqli->close(); ?>
