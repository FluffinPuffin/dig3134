<?php
session_start();




	$query = "SELECT username, password, access_level, user_id, first_name, last_name FROM a5_users";
	$result = $mysqli->query($query);

	if ($mysqli->error) {
		print "Select query error!  Message: " . $mysqli->error;
	}
    if (isset($_POST['Login']) && (!isset($_SESSION['logged_in']))) {
	    while ($row = $result->fetch_object()) {
		    if ((($_POST['username']) == ($row->username)) && (MD5($_POST['password']) == ($row->password))) {
			    $_SESSION['logged_in'] = true;
                $_SESSION['first'] = $row->first_name;
                $_SESSION['last'] = $row->last_name;
			    $_SESSION['user'] = $row->username;
                $_SESSION['access_level'] = $row->access_level;
                $_SESSION['user_id'] = $row->user_id;
		    } else {
            }
	    }
    }
    if (isset($_SESSION['logged_in'])) {
        header("Location: admin.php");
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title> Assignment 5 - chloe_becker </title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <form action="login.php" method="POST" name="login" id="login" >
        <fieldset class="login">
            <ul>
                <li>
                    <label for="username"><strong>Username</strong></label>
                    <input type="text" id="username" name="username" value = ""class="value">
                </li>

                <li>
                    <label for="password"><strong>Password</strong></label>
                    <input type="text" id="password" name="password" value = "" class="value">
                </li>

                <li class="button">
                    <input type="submit" name="Login" value="Login">
                </li>
            <ul>
        </fieldset>
    </form>

    <table id="login_table">
        <tr>
            <th> Username</th>
            <th> Password </th>
        </tr>
        <tr>
            <td> admin </td>
            <td> admin </td>
        </tr>
        <tr>
            <td> review</td>
            <td> review</td>
        </tr>
        <tr>
            <td> review2</td>
            <td> review2</td>
        </tr>
        <tr>

            <td> review3</td>
            <td> review3</td>
        </tr>
    </table>
</body>

</html>
<?php $mysqli->close(); ?>
