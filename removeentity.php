<?php

require "connection.php";
require "header.php";
$method = $_GET["method"];
$id = $_GET["relationship_id"];
$heroId = $_GET["hero"];

if ($method == "removeFriend") {
    removeRelationship($id);
}

if ($method == "removeEnemy") {
	removeRelationship($id);
}

function removeRelationship($id) {
	$sql = "DELETE FROM relationships WHERE id = $id";
	$result = $GLOBALS["conn"]->query($sql);
	echo $result;
}

// function removeEnemy($id) {

// }


header("Location: /hero.php?id=" . $heroId);

?>


<!-- SELECT * FROM ability_hero
	INNER JOIN abilities on abilities.id=ability_hero.ability_id
	INNER JOIN heroes on heroes.id=ability_hero.hero_id
	WHERE ability_hero.hero_id= $id -->