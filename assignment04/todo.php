<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <title> Assignment 04 - chloe_becker </title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<?php
// Connect to data base
    $mysqli = new mysqli("127.0.0.1", "69A3eVRfEJ", "Eisw5mbPG7", "db69A3eVRfEJ", 3306);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to mysqli: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $query = "SELECT * FROM a4_todo";
    $result = $mysqli->query($query);

?>

<body>
    <table>
    <tr>
        <th> Item Id </th>
        <th> Creation Date </th>
        <th> Author </th>
        <th> Person Accountable </th>
        <th> Task </th>
        <th> Start Date </th>
        <th> Due Date </th>
        <th> Completed </th>
    </tr>

<?php
// fetching object
    while ($row = $result->fetch_object()) {
        if ($row->todo_item_creation_date != NULL){
            $exploded_timestamp = explode(" ", $row->todo_item_creation_date);
            $exploded_date = explode("-", $exploded_timestamp[0]);
            $formatted_creation = $exploded_date[1] . "/" . $exploded_date[2] . "/" . $exploded_date[0];
        }
        if ($row->todo_item_start_date != NULL){
            $exploded_timestamp = explode(" ", $row->todo_item_start_date);
            $exploded_date = explode("-", $exploded_timestamp[0]);
            $formatted_start = $exploded_date[1] . "/" . $exploded_date[2] . "/" . $exploded_date[0];
        }
        if ($row->todo_item_due_date != NULL){
            $exploded_timestamp = explode(" ", $row->todo_item_due_date);
            $exploded_date = explode("-", $exploded_timestamp[0]);
            $formatted_due = $exploded_date[1] . "/" . $exploded_date[2] . "/" . $exploded_date[0];
        }
        if ($row->todo_item_completed_date != NULL){
            $exploded_timestamp = explode(" ", $row->todo_item_completed_date);
            $exploded_date = explode("-", $exploded_timestamp[0]);
            $formatted_completed = $exploded_date[1] . "/" . $exploded_date[2] . "/" . $exploded_date[0];
        }


        echo "<tr>";
        echo "<td>" . $row->todo_item_id . "</td>";
        echo "<td>" . $formatted_creation . "</td>";
        echo "<td>" . $row->todo_item_author . "</td>";

        echo "<td>";
            if($row->todo_item_person_accountable == Null){echo "N/A";} else {echo $row->todo_item_person_accountable;}
        echo "</td>";

        echo "<td>" . $row->todo_item . "</td>";

        echo "<td>";
            if($row->todo_item_start_date == Null){echo "N/A";} else {echo $formatted_start;}
        echo "</td>";

        echo "<td>";
            if($row->todo_item_due_date == Null){echo "N/A";} else {echo $formatted_due;}
        echo "</td>";

        echo "<td>";
            if($row->todo_item_completed_date == Null){echo "N/A";} else {echo $formatted_completed;}
        echo "</td>";

        echo "</tr>";
    }
?>
    </table>
</body>

</html>
