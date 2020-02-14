<?php
require "connectToDB.php";
$db = returnDB();

$dataArray = json_decode($_POST['dataArray']);

print_r($dataArray);
?>