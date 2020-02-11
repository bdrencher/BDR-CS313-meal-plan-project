<?php
require "connectToDB.php";
$db = returnDB();

$name = $_POST['name'];
$url = $_POST['url'];
$servings = $_POST['servings'];
$time = $_POST['prepTime'];

$query = $db->prepare("INSERT INTO meals (name, recipe_url, servings, prep_time) VALUES ($name, $url, $servings, $time)");
$query->execute();
?>