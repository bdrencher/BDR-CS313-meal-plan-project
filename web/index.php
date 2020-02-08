<?php
session_start();
$_SESSION['selectedMealPlan'] = array();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="mealPlanner.js"></script>
        <link rel="stylesheet" href="mealPlanner.css" type="text/css">
        <title>Meal Planner - Ben Rencher</title>
    </head>

    <body>

    <!-- add a meal-->   
        <header>
            <div>
                <img src="logo.jpg" alt="logo for meal planner">
            </div>
            <div>
                <h1 id="headline">Meal Planner</h1>
            </div>
        </header>

        <div id="addAMeal">
            <h3>Add a meal</h3>
            <div id="addAMealFlex">
                <label for="name">Name:</label>
                <input type="text" id="name"><br>

                <label for="servings">Servings:</label>
                <input type="text" id="servings"><br>

                <label for="prepTime">Preparation time (min):</label>
                <input type="text" id="prepTime"><br>

                <label for="url">Link to recipe:</label>
                <input type="text" id="url"><br>
            </div>
            <button id="addMealButton" onclick="addMeal()">Add</button>
        </div>

        <div id="mealPlanBuilderHeader">
            <h3>Meal Plan Builder</h3>
            <label for="mealPlanName">Meal plan name:</label>
            <input type="text" id="mealPlanNameInput"><br>
        </div>

    <!-- meal plan builder -->
        <div id="gridOfDayBoxes">
            <div class="labelAndDay">
                <p>Monday</p>
                <div id="monday" class="mealBox">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Tuesday</p>
                <div id="tuesday" class="mealBox">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Wednesday</p>
                <div id="wednesday" class="mealBox">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Thursday</p>
                <div id="monday" class="mealBox">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Friday</p>
                <div id="friday" class="mealBox">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Saturday</p>
                <div id="saturday" class="mealBox">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Sunday</p>
                <div id="sunday" class="mealBox">
                </div>
            </div>
            <div id="mealPlanButtons">
                <button id="saveMealPlanButton" onclick="saveMealPlan()">Save meal plan</button>
                <button id="loadMealPlanButton" onclick="mealPlanRequest(1)">Load a meal plan</button>
                <button id="randomizeMealPlanButton" onclick="generateRandomPlan()">Generate random meal plan</button>
            </div>
        </div>

        <footer>

        </footer>
    </body>
</html>