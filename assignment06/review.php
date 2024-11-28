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
if (!isset($_SESSION['logged_in'])) {
    print "Login to comment.  Click <a href=\"login.php\"> here </a> to login";
}

        // Database connection
        if ($mysqli->connect_errno) {
            echo "Failed to connect to mysqli: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

    $query = "SELECT * FROM a6_reviews" ;

    $result = $mysqli->query($query);
    $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    if (isset($_POST['Comment']) && $_POST['commentBox'] != ""){
        $insert_comment = "INSERT INTO a6_comments(comment_id, comment_creation_date, comment, review_id, user_id)
        VALUES (NULL, CURRENT_TIMESTAMP, '".$_POST['commentBox']."' , '".$_POST['reviewDeletion'] ."', '".$_SESSION['user_id']."')";
        $mysqli->query($insert_comment);

        header("Location: reviews.php");
    }

    if($_GET['review_id'] == NULL){
        header("Location: reviews.php");
    }


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
        <form action="logout.php" method="POST" name="logoutPage" id="logout_button">
            <input type="submit" name="logout" value="logout">
        </form>
        <p>
            <strong>Welcome </strong><?php echo $_SESSION['first'] ?><?php echo " " ?><?php echo $_SESSION['last'] ?>
        </p>
        <?php
    }

    ?>
    <table>
        <tr>
            <th> Game Name </th>
            <th> Game Review </th>
            <th> Game Rating </th>
            <th> Game Image </th>
            <th> Review Creation Date </th>
        </tr>

        <?php
        while ($row = $result->fetch_object()) {

            if ($_GET['review_id'] != $row->review_id){
                continue;
            }
            if ($row->review_creation_date != NULL){
                $exploded_timestamp = explode(" ", $row->review_creation_date);
                $exploded_date = explode("-", $exploded_timestamp[0]);
                if ($exploded_date[2] < 10){$exploded_date[2] = ltrim($exploded_date[2], '0');}
                $formatted_creation = $array[$exploded_date[1]-1] . " " . $exploded_date[2] . ", " . $exploded_date[0];
            }
            echo "<tr>";
            echo "<td>" . $row->game_name . "</td>";
            echo "<td>" . $row->game_review . "</td>";
            echo "<td>" . $row->game_rating . "</td>";
            echo "<td>";
            echo "<img src = \"". $row->game_image_url . "\" alt = \"" . $row->game_name . "\" >";
            echo "</td>";

            echo "<td>" . $formatted_creation . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <h2> Comments </h2>
    <table>
        <tr>
            <th> User ID </th>
            <th> Comment</th>
            <th> Date </th>
        </tr>

        <?php
        $query = "SELECT * FROM a6_comments ORDER BY comment_creation_date ASC";
        $result = $mysqli->query($query);
        while ($row = $result->fetch_object()) {

            if ($_GET['review_id'] != $row->review_id){
                continue;
            }
            if ($row->comment_creation_date != NULL){
                $exploded_timestamp = explode(" ", $row->comment_creation_date);
                $exploded_date = explode("-", $exploded_timestamp[0]);
                if ($exploded_date[2] < 10){$exploded_date[2] = ltrim($exploded_date[2], '0');}
                $formatted_creation = $array[$exploded_date[1]-1] . " " . $exploded_date[2] . ", " . $exploded_date[0];
            }
            echo "<tr>";
            echo "<td>" . $row->user_id . "</td>";
            echo "<td>" . $row->comment	 . "</td>";
            echo "<td>" . $formatted_creation	 . "</td>";

            echo "</tr>";
        }
        ?>
    </table>
    <?php
    if (isset($_SESSION['logged_in'])) {
    ?>
        <form action="review.php" method="POST" name="postComment">
            <ul>
                <li>
                    <label for="commentBox"><strong>Comment</strong></label>
                    <input type="text" id="commentBox" name="commentBox" value = "">
                </li>
            </ul>
            <input name="reviewDeletion" type="hidden" value="<?php echo $_GET['review_id']; ?>" >
            <input type="submit" name="Comment" value="Comment">

        </form>
        <?php
    }

    ?>

</body>

</html>
<?php $mysqli->close(); ?>
