<?php
require "connectToDB.php";
$db = returnDB();

$name = $_POST['name'];
$servings = $_POST['servings'];
$time = $_POST['prepTime'];
$url = $_POST['url'];

$query = 'INSERT INTO meals (name, recipe_url, servings, prep_time) VALUES(:name, :url, :servings, :time)';
$statement = $db->prepare($query);

$statement->bindValue(':name', $name);
$statement->bindValue(':url', $url);
$statement->bindValue(':servings', $servings);
$statement->bindValue(':time', $time);

$statement->execute();

return $db->lastInsertId('mealsIdSequence');
?>