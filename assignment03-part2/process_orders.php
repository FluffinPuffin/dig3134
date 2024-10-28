<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title> Assignment 03 - Part 2 - chloe_becker </title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<?php
    $flag = true;
    $arrayFord = array();
    $arrayToyota = array();
    $arrayLand = array();
    $arrayAkg = array();
    $arrayErrors= array();

    $regFord = "/[AEIOU][AEIOU](?:RE4)[234567][234567][234567]$/";
    $regToyota = "/[T][1][\d]{3}[-][a-zA-Z0-9]{4}$|[T][2][0]{3}[-][a-zA-Z0-9]{4}$|[T][89][\d]{2}[-][a-zA-Z0-9]{4}$/";
    $regLand = "/[L][R][234][\d]{2}[v][123]$|[L][R][5][0]{2}[v][123]$/";
    $regAkg = "/^[\d][\d]*[*][aeiou]{3}$/";

    // The file does open if the correct file location is set. This is what was in the instructions, but no file was found online
    // if set to /home/ad/ch011941/public_html/dig3134/assignment03-part2/orders.txt or any location with txt, it works

    // This file location does not exist.
    $filename = "/home/ad/novatnak/public_html/dig3134/assignments/assignment03/orders.txt";
    if ($flag == true){
    $fh = fopen($filename, 'r');
    if($fh) {
        $contents = fread($fh, filesize($filename));
    } else {
        $flag = false;
    }

    fclose($fh);
    $content = explode(',',$contents);


    for ($i = 0; $i < count($content); $i++){
        if (preg_match($regFord, $content[$i])){
            array_push($arrayFord, $content[$i]);
        }
        else if (preg_match($regToyota, $content[$i])){
            array_push($arrayToyota, $content[$i]);
        }
        else if (preg_match($regLand, $content[$i])){
            array_push($arrayLand, $content[$i]);
        }
        else if (preg_match($regAkg, $content[$i])){
            array_push($arrayAkg, $content[$i]);
        } else {
            array_push($arrayErrors, $content[$i]);
        }
    }
/*
    print_r($arrayFord);
    print_r($arrayToyota);
    print_r($arrayLand);
    print_r($arrayAkg);
    print_r($arrayErrors);
*/

    $array = fopen("/home/ad/ch011941/public_html/dig3134/assignment03-part2/ford.txt", "w");
    for ($i = 0; $i < count($arrayFord); $i++){
        fwrite($array, $arrayFord[$i]);
        fwrite($array, "\n");
    }
    fclose($array);
    $array = fopen("/home/ad/ch011941/public_html/dig3134/assignment03-part2/toyota.txt", "w");
    for ($i = 0; $i < count($arrayToyota); $i++){
        fwrite($array, $arrayToyota[$i]);
        fwrite($array, "\n");
    }
    fclose($array);
    $array = fopen("/home/ad/ch011941/public_html/dig3134/assignment03-part2/landrover.txt", "w");
    for ($i = 0; $i < count($arrayLand); $i++){
        fwrite($array, $arrayLand[$i]);
        fwrite($array, "\n");
    }
    fclose($array);
    $array = fopen("/home/ad/ch011941/public_html/dig3134/assignment03-part2/algonquin.txt", "w");
    for ($i = 0; $i < count($arrayAkg); $i++){
        fwrite($array, $arrayAkg[$i]);
        fwrite($array, "\n");
    }
    fclose($array);
    $array = fopen("/home/ad/ch011941/public_html/dig3134/assignment03-part2/errors.txt", "w");
    for ($i = 0; $i < count($arrayErrors); $i++){
        fwrite($array, $arrayErrors[$i]);
        fwrite($array, "\n");
    }
    fclose($array);
    }
?>

<body>
    <div class = "box">
        <p>
            <?php

            if ($flag == true){
                echo "Success!";
            }
            else{
                echo "Something went wrong";
            }
            ?>
            <br>

            <strong><a href="view_sorted_ids.php" class="link">
            <?php
            if ($flag == true){
                echo "Click here to access files!";
            }else{
                echo "Please check the input file path!";
            }
            ?>
            </a></strong>
        </p>
    </div>
</body>

</html>
