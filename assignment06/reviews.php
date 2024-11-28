<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title> Assignment 6 - chloe_becker </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php

    $message = "";
    if ($mysqli->connect_errno) {
        echo "Failed to connect to mysqli: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $query = "SELECT * FROM a6_reviews ORDER BY game_name ASC";

    $result = $mysqli->query($query);
    $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

?>


<form action="reviews.php" method="POST" name="reviewPage" id="review_button" class="top_button">
    <input type="submit" name="Reviews" value="Reviews">
</form>
<form action="admin.php" method="POST" name="adminPage" id="admin_button" class="top_button">
    <input type="submit" name="Admin" value="Admin">
</form>


<?php
if (isset($_SESSION['logged_in'])) {
    ?>
    <form action="logout.php" method="POST" name="logoutPage" id="logout_button"class="top_button">
    <input type="submit" name="logout" value="logout">
</form>

    <p>
        <strong>Welcome </strong><?php echo $_SESSION['first'] ?><?php echo " " ?><?php echo $_SESSION['last'] ?>
    </p>
    <?php
}?>
    <table>
        <tr>
            <th> Game Name </th>
            <th> Game Review </th>
            <th> Game Rating </th>
            <th> Game Image </th>
            <th> Review Creation Date </th>
            <th> Comments </th>
        </tr>

    <?php
    while ($row = $result->fetch_object()) {
        echo "<tr>";
        if ($row->review_creation_date != NULL){
            $exploded_timestamp = explode(" ", $row->review_creation_date);
            $exploded_date = explode("-", $exploded_timestamp[0]);
            if ($exploded_date[2] < 10){$exploded_date[2] = ltrim($exploded_date[2], '0');}
            $formatted_creation = $array[$exploded_date[1]-1] . " " . $exploded_date[2] . ", " . $exploded_date[0];
        }
    echo "<td>" . $row->game_name . "</td>";
    echo "<td>" . $row->game_review . "</td>";
    echo "<td>" . $row->game_rating . "</td>";

    echo "<td>";
        echo "<img src = \"". $row->game_image_url . "\" alt = \"" . $row->game_name . "\" >";
    echo "</td>";

    echo "<td>" . $formatted_creation . "</td>";
?>
    <td>
        <a href="review.php?review_id=<?php echo $row->review_id ?>">View Comments</a>
    </td>
    <?php
    echo "</tr>";

    }


echo "</table>";

?>


</body>

</html>
<?php $mysqli->close(); ?>
<?php

?>
