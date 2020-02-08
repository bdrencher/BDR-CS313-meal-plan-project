<?php
function getMeal($mealID, $db)
{
    if($mealID == NULL)
    {
        return $dataArray = array();
    }
    $query = $db->prepare('SELECT name, recipe_url, servings, prep_time FROM $mealID');
    $query->execute();

    $mealData = $query->fetch(PDO::FETCH_ASSOC);

    $dataArray = array($mealData['name'], $mealData['recipe_url'], $mealData['servings'], $mealData['prep_time']);

    return json_encode("a string");
}
?>