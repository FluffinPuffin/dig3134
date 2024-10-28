
<?php
/*
    $firstNameReg = "/^[A-Z][a-z]+/";
    $lastNameReg = "/^[A-Z][a-z]+/";
    $emailReg = "/[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+\.[a-z][a-z][a-z]/";
    $phoneNumberReg = "/^[0-9]{3}[0-9]{3}[0-9]{4}/";
    $studentAddressReg = "/\d{5}\s[a-zA-Z]+\s\w{1,4}/";
    */

    $firstNameReg = "/.+/";
    $lastNameReg = "/.+/";
    $emailReg = "/.+/";
    $phoneNumberReg = "/.+/";
    $studentAddressReg = "/.+/";

    $questionReg = "/.+/";
    /*
    $question2Reg = "/.+/";
    $question3Reg = "/.+/";
    $question4Reg = "/.+/";
    $question5Reg = "/.+/";
    */
    $firstNameError = "";
    $lastNameError = "";
    $emailError = "";
    $phoneNumberError = "";
    $studentAddressError = "";

    $question1Error = "";
    $question2Error = "";
    $question3Error = "";
    $question4Error = "";
    $question5Error = "";

    $firstEcho = "";
    $lastEcho = "";
    $emailEcho = "";
    $phoneEcho = "";
    $addressEcho = "";

    $q1Echo = "";
    $q2Echo = "";
    $q3Echo = "";
    $q4Echo = "";
    $q5Echo = "";

    $questions = true;
    $preview = false;
    $confirmed = false;

    if (isset($_POST["previewAnswers"])) {
        $flag = true;

        $firstEcho = "";
        $lastEcho = "";
        $emailEcho = "";
        $phoneEcho = "";
        $addressEcho = "";

        $q1Echo = "";
        $q2Echo = "";
        $q3Echo = "";
        $q4Echo = "";
        $q5Echo = "";

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

        if (!preg_match($questionReg, $firstName)) {
            $firstNameError = "*required (ex: Jane)";
            $firstEcho = "";
            $flag = false;
        } else {
            $firstEcho = $_POST["firstName"];
        }

        if (!preg_match($questionReg, $lastName)) {
            $lastNameError = "*required (ex: Doe)";
            $lastEcho = "";
            $flag = false;
        } else {
            $lastEcho = $_POST["lastName"];
        }

        if (!preg_match($questionReg, $email)) {
            $emailError = "*required (ex: test@aol.com)";
            $emailEcho = "";
            $flag = false;
        } else {
            $emailEcho = $_POST["email"];
        }

        if (!preg_match($questionReg, $phoneNumber)) {
            $phoneNumberError = "*required (ex: 1112223333)";
            $phoneEcho = "";
            $flag = false;
        } else {
            $phoneEcho = $_POST["phoneNumber"];
        }

        if (!preg_match($questionReg, $studentAddress)) {
            $studentAddressError = "*required (ex: 10101 Address Str)";
            $addressEcho = "";
            $flag = false;
        } else {
            $addressEcho = $_POST["studentAddress"];
        }

        if (!preg_match($questionReg, $question1)) {
            $question1Error = "*required";
            $q1Echo = "";
            $flag = false;
        } else {
            $q1Echo = $_POST["question1"];
        }

        if (!preg_match($questionReg, $question2)) {
            $question2Error = "*required";
            $q2Echo = "";
            $flag = false;
        }
        else {
            $q2Echo = $_POST["question2"];
        }

        if (!preg_match($questionReg, $question3)) {
            $question3Error = "*required";
            $q3Echo = "";
            $flag = false;
        } else {
            $q3Echo = $_POST["question3"];
        }

        if (!preg_match($questionReg, $question4)) {
            $question4Error = "*required";
            $q4Echo = "";
            $flag = false;
        }  else {
            $q4Echo = $_POST["question4"];
        }

        if (!preg_match($questionReg, $question5)) {
            $question5Error = "*required";
            $q5Echo = "";
            $flag = false;
        } else {
            $q5Echo = $_POST["question5"];
        }


        if($flag == true){
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
            $questions = false;
            $preview = true;
            $confirmed = false;
        }
    }

    if (isset($_POST["Edit"])) {
        $questions = true;
        $preview = false;
        $confirmed = false;
    }

    if (isset($_POST["finish"])) {
        $questions = false;
        $preview = false;
        $confirmed = true;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title> Assignment 03 - Part 1 - chloe_becker </title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

    <form action="form_all.php" method="POST" name="info_form" class="info_form" <?php if($questions == false){echo "id='hide'";}?>>
        <fieldset class="form_set">
            <ul>
                <li>
                    <label for="firstName"><strong>First name:</strong></label>
                    <input type="text" id="firstName" name="firstName" value = "<?php if(isset($_COOKIE['firstName'])){echo $_COOKIE['firstName'];} else {echo $firstEcho;}?>"> <?php echo $firstNameError?>
                </li>

                <li>
                    <label for="lastName"><strong>Last name:</strong></label>
                    <input type="text" id="lastName" name="lastName" value = "<?php if(isset($_COOKIE['lastName'])){echo $_COOKIE['lastName'];} else {echo $lastEcho;}?>"> <?php echo $lastNameError?>
                </li>

                <li>
                    <label for="email"><strong>Email:</strong></label>
                    <input type="text" id="email" name="email" value = "<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} else {echo $emailEcho;}?>"> <?php echo $emailError?>
                <li>
                    <label for="phoneNumber"><strong>Phone Number:</strong></label>
                    <input type="text" id="phoneNumber" name="phoneNumber" value = "<?php if(isset($_COOKIE['phoneNumber'])){echo $_COOKIE['phoneNumber'];} else {echo $phoneEcho;}?>"> <?php echo $phoneNumberError?>
                </li>

                <li>
                    <label for="studentAddress"><strong>Student Address:</strong></label>
                    <input type="text" id="studentAddress" name="studentAddress" value = "<?php if(isset($_COOKIE['studentAddress'])){echo $_COOKIE['studentAddress'];} else {echo $addressEcho;}?>"> <?php echo $studentAddressError?>
                </li>
            </ul>
        </fieldset>
        <fieldset class="form_set2">
            <ul>
                <li>
                    <label for="question1"><strong>What is your favorite video game?</strong></label>
                    <input type="text" id="question1" name="question1" value = "<?php if(isset($_COOKIE['question1'])){echo $_COOKIE['question1'];} else {echo $q1Echo;}?>"> <?php echo $question1Error?>
                </li>

                <li>
                    <label for="question2"><strong>What is your favorite food?</strong></label>
                    <input type="text" id="question2" name="question2" value = "<?php if(isset($_COOKIE['question2'])){echo $_COOKIE['question2'];} else {echo $q2Echo;}?>"> <?php echo $question2Error?>
                </li>

                <li>
                    <label for="question3"><strong>What is your favorite animal?</strong></label>
                    <input type="text" id="question3" name="question3" value = "<?php if(isset($_COOKIE['question3'])){echo $_COOKIE['question3'];} else {echo $q3Echo;}?>"> <?php echo $question3Error?>
                </li>

                <li>
                    <label for="question4"><strong>What is you major?</strong></label>
                    <input type="text" id="question4" name="question4" value = "<?php if(isset($_COOKIE['question4'])){echo $_COOKIE['question4'];} else {echo $q4Echo;}?>"> <?php echo $question4Error?>
                </li>

                <li>
                    <label for="question5"><strong>What is your favorite color?</strong></label>
                    <input type="text" id="question5" name="question5" value = "<?php if(isset($_COOKIE['question5'])){echo $_COOKIE['question5'];} else {echo $q5Echo;}?>"> <?php echo $question5Error?>
                </li>

                <li>
                    <input type="submit" name="previewAnswers" value="Preview Answers">
                </li>
            </ul>
        </fieldset>
    </form>

    <div class="info_form2" <?php if($preview == false){echo "id='hide'";}?>>
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

        <form action="form_all.php" method="POST" name="form_temp">
            <ul>
                <li>
                    <input type="submit" value="Edit" name="Edit">
                </li>
            </ul>
        </form>

        <form action="form_all.php" method="POST" name="form_temp">
            <ul>
                <li>
                    <input type="submit" value="Finish" name="finish">
                </li>
            </ul>
        </form>

    </div>

    <div class="info_form3" <?php if($confirmed == false){echo "id='hide'";}?>>
        <ul>
            <li>
                Thank you, your data has been submitted
            </li>
        </ul>
    </div>

</body>



</html>
