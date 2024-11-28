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
    print "You must login to view this page.  Click <a href=\"login.php\"> here </a> to login";
} else {

if (isset($_POST['no'])){
    header("Location: admin.php");
}

        // Database connection
        if ($mysqli->connect_errno) {
            echo "Failed to connect to mysqli: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

    $query = "SELECT * FROM a6_reviews";
    $result = $mysqli->query($query);
    $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    if (isset($_POST['sure'])){
        $delete_query = "DELETE FROM a6_reviews WHERE review_id='" . $_POST['reviewDeletion'] . "'";
        $mysqli->query($delete_query);

        header("Location: admin.php");
    }
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
    <form action="logout.php" method="POST" name="logoutPage" id="logout_button" class="top_button">
    <input type="submit" name="logout" value="logout">
</form>
    <table>
        <tr>
            <th> Game Name </th>
            <th> Game Review </th>
            <th> Game Rating </th>
            <th> Game Image </th>
            <th> Review Creation Date </th>
        </tr>
        <tr>

    <?php
if (isset($_SESSION['logged_in'])){
    while ($row = $result->fetch_object()) {

        if ( $_GET['review_id'] != $row->review_id){
            continue;
        }
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
        echo "<img src = \"". $row->game_image_url . "\"alt = \"" . $row->game_name . "\" />";
    echo "</td>";

    echo "<td>" . $formatted_creation . "</td>";
    echo "</tr>";
    // echo $_GET['review_id'];

}
}
    ?>
    </table>
<form action="delete.php" method="POST" name="deleteReview">
    <input name="reviewDeletion" type="hidden" value="<?php echo $_GET['review_id']; ?>" >
    <input type="submit" name="sure" value="sure">
</form>
<form action="delete.php" method="POST" name="deleteReviewFalse" id="deleteReviewFalse" >
    <input type="submit" name="no" value="no">
</form>

</body>

</html>
<?php $mysqli->close(); ?>
<?php
}
?>
