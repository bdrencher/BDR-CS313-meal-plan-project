<?php
require "connectToDB.php";
$db = returnDB();

if(isset($_POST['name'])){
    $name = $_POST['name'];
}

if(isset($_POST['servings']))
{
    $servings = $_POST['servings'];
}

if(isset($_POST['prepTime']))
{
    $time = $_POST['prepTime'];
}

if(isset($_POST['url']))
{
    $url = $_POST['url'];
}

$query = 'INSERT INTO meals (name, recipe_url, servings, prep_time) VALUES(:name, :url, :servings, :time)';
$statement = $db->prepare($query);

$statement->bindValue(':name', $name);
$statement->bindValue(':url', $url);
$statement->bindValue(':servings', $servings);
$statement->bindValue(':time', $time);

$statement->execute();

$id = $db->lastInsertId("meals_id_seq");
?>