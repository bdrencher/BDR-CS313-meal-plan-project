function mealPlanRequest()
{
    const mealPlanID = document.getElementById("mealPlanSelection").value;
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            let data = JSON.parse(request.response);
            console.log(data);

            const monday    = document.getElementById("mondayInner");
            const tuesday   = document.getElementById("tuesdayInner");
            const wednesday = document.getElementById("wednesdayInner");
            const thursday  = document.getElementById("thursdayInner");
            const friday    = document.getElementById("fridayInner");
            const saturday  = document.getElementById("saturdayInner");
            const sunday    = document.getElementById("sundayInner");

            const dayArray = [monday, tuesday, wednesday, thursday, friday, saturday, sunday];

            for (let i = 0; i < 7; i++)
            {
                // identify the day and data array that should be accessed
                const day       = dayArray[i];
                const dayData   = data[i + 1];

                // collect information for output to screen
                const name      = dayData['name'];
                const recipeURL = dayData['recipe_url'];
                const servings  = dayData['servings'];
                const prepTime  = dayData['prep_time'];
                
                // push data to screen
                day.innerHTML = "Name: " + name + "<br>recipe: " + recipeURL + "<br>servings: " + servings + "<br>prep time (min): " + prepTime;
            }
        }
    };

    request.open("GET", "getMealPlan.php?planID=" + mealPlanID, true);
    request.send();
}

$(document).ready(
function getAllMealPlans()
{
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            let data = JSON.parse(request.response);
            
            // modify drop down menu with values
            const dropDown = document.getElementById("mealPlanSelection");

            for (const plan of data) {
                let newOption = document.createElement("option");
                
                // set up new option before appending
                newOption.setAttribute("value", plan[0]);
                newOption.innerHTML = plan[1];
        
                dropDown.appendChild(newOption);
            }
        }
    };

    request.open("GET", "getAllMealPlans.php", true);
    request.send();
});