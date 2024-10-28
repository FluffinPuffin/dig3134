<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title> Assignment 03 - Part 2 - chloe_becker </title>
    <link rel="stylesheet" href="./css/styles.css">
</head>


<body>
    <div class = "box">
        <form action="view_sorted_ids.php" method="POST" name="form">
            <label>Choose a file:</label>

            <select name="menu" id="drop">
                <option value="ford">Ford Motor Company</option>
                <option value="toyota">Toyota Motor Sales</option>
                <option value="rover">Land Rover</option>
                <option value="alq">Algonquin Automotive Enterprises</option>
                <option value="error">Errors</option>
            </select>
            <br>
            <input type="submit" value="View File" name="view" id="button">
        </form>

        <p id="names">

        <?php
            if(isset($_POST["view"])){
                $value = $_POST["menu"];

                if($value == "ford"){
                    echo nl2br(file_get_contents('./ford.txt'));
                }
                else if ($value == "toyota"){
                    echo nl2br(file_get_contents('./toyota.txt'));
                }else if ($value == "rover"){
                    echo nl2br(file_get_contents('./landrover.txt'));
                }
                else if ($value == "alq"){
                    echo nl2br(file_get_contents('./algonquin.txt'));
                }
                else if ($value == "error"){
                    echo nl2br(file_get_contents('./errors.txt'));
                }
            }
        ?>
        </p>

    </div>
</body>



</html>
