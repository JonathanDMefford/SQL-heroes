<?php

require "connection.php";
require "header.php";
$method = $_GET["method"];
$id = $_GET["id"];
$heroId = $_GET["heroId"];

if ($method == "removeFriend") {
	removeRelationship($id);
}

if ($method == "removeEnemy") {
	removeRelationship($id);
}

if ($method == "makeEnemy") {
	makeEnemy($id);
}

if ($method == "makeFriend") {
	makeFriend($id);
}

function makeFriend($id) {
	$sql = "UPDATE relationships SET type_id = 1 WHERE relationship_id = $id";
	$result = $GLOBALS["conn"]->query($sql);
	echo $result;
}

function makeEnemy($id) {
	$sql = "UPDATE relationships SET type_id = 2 WHERE relationship_id = $id";
	$result = $GLOBALS["conn"]->query($sql);
	echo $result;
}

function removeRelationship($id) {
	$sql = "DELETE FROM relationships WHERE relationship_id = $id";
	$result = $GLOBALS["conn"]->query($sql);
	echo $result;
}

header("Location: /hero.php?id=" . $heroId);

?>