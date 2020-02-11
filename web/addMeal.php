<?php
require "connectToDB.php";
$db = returnDB();

$name = $_POST['name'];
$servings = $_POST['servings'];
$time = $_POST['prepTime'];
$url = $_POST['url'];

$query = $db->prepare("INSERT INTO meals (name, recipe_url, servings, prep_time) VALUES = ('$name', '$url', $servings, $time)");
$query->execute();
?>