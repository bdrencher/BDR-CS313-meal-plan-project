<?php
require "connectToDB.php";
session_start();
$db = returnDB();

$planID = $_POST['planID'];

$query = $db->prepare("SELECT name, monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM meal_plans WHERE id=$planID");
$query->execute();

$mealPlanData = $statement->fetch(PDO::FETCH_ASSOC);

$mealPlanName = mealPlanData['name'];
$mondayID     = mealPlanData['monday'];
$tuesdayID    = mealPlanData['tuesday'];
$wednesdayID  = mealPlanData['wednesday'];
$thursdayID   = mealPlanData['thursday'];
$fridayID     = mealPlanData['friday'];
$saturdayID   = mealPlanData['saturday'];
$sundayID     = mealPlanData['sunday'];
?>