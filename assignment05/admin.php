<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    print "You must login to view this page.  Click <a href=\"login.php\"> here </a> to login";
} else {


    $message = "";
    if ($mysqli->connect_errno) {
        echo "Failed to connect to mysqli: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $query = "SELECT * FROM a5_reviews";
    $query2 = "SELECT * FROM a5_users";

    $result = $mysqli->query($query);
    $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    if (isset($_POST['posts']) && ($_POST['name'] != NULL ||$_POST['review'] != NULL ||$_POST['rating'] != NULL ||$_POST['url'] != NULL)) {

        $insert_review = "INSERT INTO a5_reviews(review_id, review_creation_date, game_name, game_review, game_rating, game_image_url, user_id)
        VALUES (NULL, CURRENT_TIMESTAMP, '".$_POST['name']."' , '".$_POST['review']."', '".$_POST['rating']."', '".$_POST['url']."', '".$_SESSION['user_id']."')";

        $mysqli->query($insert_review);
        header("Location: admin.php");
    } else if (isset($_POST['posts']) && ($_POST['name'] == NULL ||$_POST['review'] == NULL ||$_POST['rating'] == NULL ||$_POST['url'] == NULL)){
        $message="Fill in all of the data";
    }
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

<form action="logout.php" method="POST" name="logoutPage" id="logout_button">
    <input type="submit" name="logout" value="logout">
</form>

<?php
if (isset($_SESSION['logged_in'])) {
    ?>
    <p>
        <strong>Welcome </strong><?php echo $_SESSION['first'] ?><?php echo " " ?><?php echo $_SESSION['last'] ?>
    </p>
    <table>
        <tr>
            <th> Game Name </th>
            <th> Game Review </th>
            <th> Game Rating </th>
            <th> Game Image </th>
            <th> Review Creation Date </th>
<?php

 if ($_SESSION['access_level'] == "administrator") {
    ?>
    <th> Delete Row </th>
    </tr>
    <tr>
    <?php
    while ($row = $result->fetch_object()) {
        if ($row->review_creation_date != NULL){
            $exploded_timestamp = explode(" ", $row->review_creation_date);
            $exploded_date = explode("-", $exploded_timestamp[0]);
            if ($exploded_date[2] < 10){$exploded_date[2] = ltrim($exploded_date[2], '0');}
            $formatted_creation = $array[$exploded_date[1]] . " " . $exploded_date[2] . ", " . $exploded_date[0];
        }
    echo "<td>" . $row->game_name . "</td>";
    echo "<td>" . $row->game_review . "</td>";
    echo "<td>" . $row->game_rating . "</td>";

    echo "<td>";
        echo "<img src = \"". $row->game_image_url . "\"alt = \"" . $row->game_name . "\" />";
    echo "</td>";

    echo "<td>" . $formatted_creation . "</td>";

?>
    <td>
        <a href="delete.php?review_id= <?php echo $row->review_id ?>">Delete</a>
    </td>
    </tr>
    <?php
    }
} else if ($_SESSION['access_level'] == "reviewer"){
    ?>
    </tr>
    <tr>
    <?php
    while ($row = $result->fetch_object()) {

        if ($_SESSION['user_id'] != $row->user_id){
            continue;
        }

        if ($row->review_creation_date != NULL){
            $exploded_timestamp = explode(" ", $row->review_creation_date);
            $exploded_date = explode("-", $exploded_timestamp[0]);
            if ($exploded_date[2] < 10){$exploded_date[2] = ltrim($exploded_date[2], '0');}
            $formatted_creation = $array[$exploded_date[1]] . " " . $exploded_date[2] . ", " . $exploded_date[0];
        }
    echo "<td>" . $row->game_name . "</td>";
    echo "<td>" . $row->game_review . "</td>";
    echo "<td>" . $row->game_rating . "</td>";

    echo "<td>";
        echo "<img src = \"". $row->game_image_url . "\"alt = \"" . $row->game_name . "\" />";
    echo "</td>";

    echo "<td>" . $formatted_creation . "</td>";

    echo "</tr>";

    }
}
echo "</table>";
if ($_SESSION['access_level'] == "reviewer"){
?>

<form action="admin.php" method="POST" name="posts" id="posts">
<fieldset class="review">

    <ul>
        <li>
            <?php echo $message; ?>
        </li>
        <li>
            <label for="name"><strong>Game Name</strong></label>
            <input type="text" id="name" name="name" value = "">
        </li>

        <li>
            <label for="review"><strong>Game Review</strong></label>
            <input type="text" id="review" name="review" value = "">
        </li>

        <li>
            <label for="rating"><strong>Game Rating</strong></label>
            <input type="text" id="rating" name="rating" value = "">
        </li>

        <li>
            <label for="url"><strong>Image URL</strong></label>
            <input type="text" id="url" name="url" value = "">
        </li>

        <li class="button">
            <input type="submit" name="posts" value="posts">
        </li>
    </ul>
</fieldset>
</form>

<?php

}

?>


</body>

</html>
<?php $mysqli->close(); ?>
<?php
}
?>
