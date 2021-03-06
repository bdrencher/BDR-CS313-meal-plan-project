<?php
require "connectToDB.php";
$db = returnDB();

$dataArray = json_decode($_POST['dataArray']);

// data comes in as name, monday -> sunday with indexes 0 to 7 respectively.
// 1 - 7 are arrays of two data points, the first is the day name,
// the second is the meal id

$mealPlanName   = $dataArray[0];
$mondayID       = json_decode($dataArray[1])->id;
$tuesdayID      = json_decode($dataArray[2])->id;
$wednesdayID    = json_decode($dataArray[3])->id;
$thursdayID     = json_decode($dataArray[4])->id;
$fridayID       = json_decode($dataArray[5])->id;
$saturdayID     = json_decode($dataArray[6])->id;
$sundayID       = json_decode($dataArray[7])->id;

print_r(json_decode($dataArray[1]));
print_r($mondayID);

$query = 'INSERT INTO meal_plans (name, monday, tuesday, wednesday, thursday, friday, saturday, sunday) 
VALUES (:planName, :mondayID, :tuesdayID, :wednesdayID, :thursdayID, :fridayID, :saturdayID, :sundayID)';

$statement = $db->prepare($query);

$statement->bindValue(':planName', $mealPlanName);
$statement->bindParam(':mondayID', $mondayID, PDO::PARAM_INT);
$statement->bindParam(':tuesdayID', $tuesdayID, PDO::PARAM_INT);
$statement->bindParam(':wednesdayID', $wednesdayID, PDO::PARAM_INT);
$statement->bindParam(':thursdayID', $thursdayID, PDO::PARAM_INT);
$statement->bindParam(':fridayID', $fridayID, PDO::PARAM_INT);
$statement->bindParam(':saturdayID', $saturdayID, PDO::PARAM_INT);
$statement->bindParam(':sundayID', $sundayID, PDO::PARAM_INT);

$statement->execute();

$lastID = $db->lastInsertId("meal_plans_id_seq");
?>