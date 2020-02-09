<?php
require 'connectToDB.php';
$db = returnDB();

    /* getMeal will extract meal data once an appropriate id has been provided*/
    // This is not working right now, I'm not sure why
    function getMeal($mealID)
    {
        $mealDB = returnDB();

        if($mealID == NULL)
        {
            return array("no meal selected");
        }
        $mealQuery = $mealDB->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$mealID');
        $mealQuery->execute();

        $mealData = $mealQuery->fetch(PDO::FETCH_ASSOC);

        $dataArray = array($mealData['name'], $mealData['recipe_url'], $mealData['servings'], $mealData['prep_time']);

        return $dataArray;
    } // end of getMeal


// Retrieve data from meal plan
$planID = $_GET['planID'];

$query = $db->prepare("SELECT name, monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM meal_plans WHERE id=$planID");
$query->execute();

$mealPlanData = $query->fetch(PDO::FETCH_ASSOC);

// get data for each meal
$mealPlanName = $mealPlanData['name'];
$monday       = $mealPlanData['monday'];
$tuesday      = $mealPlanData['tuesday'];
$wednesday    = $mealPlanData['wednesday'];
$thursday     = $mealPlanData['thursday'];
$friday       = $mealPlanData['friday'];
$saturday     = $mealPlanData['saturday'];
$sunday       = $mealPlanData['sunday'];

// I want to come back and write a more oop solution for this
$mondayQuery = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$monday');
$tuesdayQuery = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$tuesday');
$wednesdayQuery = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$wednesday');
$thursdayQuery = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$thursday');
$fridayQuery = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$friday');
$saturdayQuery = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$saturday');
$sundayQuery = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM meals WHERE id=$sunday');

$mondayQuery->execute();
$tuesdayQuery->execute();
$wednesdayQuery->execute();
$thursdayQuery->execute();
$fridayQuery->execute();
$saturdayQuery->execute();
$sundayQuery->execute();

$mondayData = $mondayQuery->fetchall(PDO::FETCH_ASSOC);
$tuesdayData = $tuesdayQuery->fetchall(PDO::FETCH_ASSOC);
$wednesdayData = $wednesdayQuery->fetchall(PDO::FETCH_ASSOC);
$thursdayData = $thursdayQuery->fetchall(PDO::FETCH_ASSOC);
$fridayData = $fridayQuery->fetchall(PDO::FETCH_ASSOC);
$saturdayData = $saturdayQuery->fetchall(PDO::FETCH_ASSOC);
$sundayData = $sundayQuery->fetchall(PDO::FETCH_ASSOC);

// send data to front end
$mealPlanArray = array($mealPlanName, $mondayData, $tuesdayData, $wednesdayData, $thursdayData, $fridayData, $saturdayData, $sundayData);

echo json_encode($mondayData);
?>