<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title> Assignment 2 - chloe_becker </title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $studentAddress = $_POST['studentAddress'];

    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];
?>

<?php
    setcookie( "firstName", $firstName, time() + 600 );
    setcookie( "lastName", $lastName, time() + 600 );
    setcookie( "email", $email, time() + 600 );
    setcookie( "phoneNumber", $phoneNumber, time() + 600 );
    setcookie( "studentAddress", $studentAddress, time() + 600 );

    setcookie( "question1", $question1, time() + 600 );
    setcookie( "question2", $question2, time() + 600 );
    setcookie( "question3", $question3, time() + 600 );
    setcookie( "question4", $question4, time() + 600 );
    setcookie( "question5", $question5, time() + 600 );
?>


<body>
    <div id="info_form2">
        <ul>
            <li>
                <strong>First name:</strong>
                <?php echo $firstName;?>
            </li>
            <li>
                <strong>Last name:</strong>
                <?php echo $lastName;?>
            </li>
            <li>
                <strong> Email:</strong>
                <?php echo $email;?>
            </li>
            <li>
                <strong>Phone Number:</strong>
                <?php echo $phoneNumber;?>
            </li>
            <li>
                <strong>Student Address:</strong>
                <?php echo $studentAddress;?>
            </li>
            <li>
                <strong>What is your favorite video game?</strong>
                <?php echo $question1;?>
            </li>
            <li>
                <strong>What is your favorite food?</strong>
                <?php echo $question2;?>
            </li>
            <li>
                <strong>What is your favorite animal?</strong>
                <?php echo $question3;?>
            </li>
            <li>
                <strong>What is you major?</strong>
                <?php echo $question4;?>
            </li>
            <li>
                <strong>What is your favorite color?</strong>
                <?php echo $question5;?>
            </li>
        </ul>

        <form action="form_entry.php" method="POST" name="form_temp">
            <ul>
                <li>
                    <input type="submit" value="Edit" name="Edit">
                </li>
            </ul>
        </form>

        <form action="form_confirmed.php" method="POST" name="form_temp">
            <ul>
                <li>
                    <input type="submit" value="Finish" name="submit">
                </li>
            </ul>
        </form>
    </div>
</body>

</html>
