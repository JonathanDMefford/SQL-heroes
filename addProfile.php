<?php

require "connection.php";
require "header.php";

$Name = $_POST["hero"];
$Bio = $_POST["bio"];
$Ability = $_POST["ability"];

$sql = "INSERT INTO heroes (name, about_me, biography) VALUES ('$Name', 'About me goes here', '$Bio')";
$result = $conn->query($sql);

if ($result == true) {
    $last_id = $conn->insert_id;
    foreach($Ability as $ability) {
        $addAbility = "INSERT INTO ability_hero (hero_id, ability_id) VALUES ('$last_id', '$ability')";
        $result = $conn->query($addAbility);
    }
}

$conn->close();
header("Location: /hero.php?id=" . $last_id);

?>