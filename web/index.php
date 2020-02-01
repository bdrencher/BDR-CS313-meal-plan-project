<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="mealPlanner.js"></script>
        <link rel="stylesheet" href="mealPlanner.css" type="text/css">
        <title>Meal Planner - Ben Rencher</title>
    </head>
    
    <header>
        <div>
            <img src="logo.jpg" alt="logo for meal planner">
        </div>
        <div>
            <h1 id="headline">Meal Planner</h1>
        </div>
    </header>

    <body>
    <!-- flex box for adding meals -->
        <div id="addAMeal">
            <h3>Add a meal</h3>
            <div id="addAMealFlex">

            </div>
        </div>

    <!-- grid for meal plan -->
        <div id="gridOfDayBoxes">
            <h3>Meal Plan Builder</h3>
            <div class="labelAndDay">
                <p>Monday</p>
                <div id="monday">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Tuesday</p>
                <div id="tuesday">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Wednesday</p>
                <div id="wednesday">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Thursday</p>
                <div id="monday">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Friday</p>
                <div id="friday">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Saturday</p>
                <div id="saturday">
                </div>
            </div>
            <div class="labelAndDay">
            <p>Sunday</p>
                <div id="sunday">
                </div>
            </div>
        </div>
    </body>

    <footer>

    </footer>
</html>