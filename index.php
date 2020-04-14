<?php

require "connection.php";
require "header.php";

$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = "";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output .= "<div>id: " . $row["name"]. " - Name: " . $row["about_me"]. " " . $row["biography"]. "</div><br>";
    }
    echo $output;
} else {
    echo "0 results";
}
$conn->close();

?>