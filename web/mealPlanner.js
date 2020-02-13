// ---------- GETTING MEALS AND MEAL PLANS -----------
function mealPlanRequest()
{
    const mealPlanID = document.getElementById("mealPlanSelection").value;
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            let data = JSON.parse(request.response);

            const mealPlanName = document.getElementById("mealPlanNameInput").value = data[0];
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
                const dayData   = data[i + 1][0];

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

// get a single meal
function getAMeal(day)
{
    const selectedMeal = $("input[name=meal]:checked").val();
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            let mealData = JSON.parse(request.response)[0];

            const name = mealData['name'];
            const recipeURL = mealData['recipe_url'];
            const servings = mealData['servings'];
            const prepTime = mealData['prep_time'];
        
            day.innerHTML = "Name: " + name + "<br>recipe: " + recipeURL + "<br>servings: " + servings + "<br>prep time (min): " + prepTime;
            closeModal();
        }
    }

    request.open("GET", "returnMeal.php?mealID=" + selectedMeal, true);
    request.send();
}

// load getAllMeals function on startup
$(document).ready(getAllMeals())

function getAllMeals()
{
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            const data = JSON.parse(request.response);
            let radioIdModifier = 0;

            const display = document.getElementById("modalContent");
            
            for(const row of data)
            {
                const newID = "meal" + radioIdModifier;

                const newRadio = document.createElement("input");
                newRadio.setAttribute("type", "radio");
                newRadio.setAttribute("name", "meal");
                newRadio.setAttribute("id", newID);
                newRadio.setAttribute("value", row[0]);
                newRadio.i = row[1];

                const newLabel = document.createElement("label");
                newLabel.setAttribute("for", newID);
                newLabel.innerText = row[1];

                const newBreak = document.createElement("br");

                display.insertBefore(newBreak, display.childNodes[0]);
                display.insertBefore(newRadio, display.childNodes[0]);
                display.insertBefore(newLabel, display.childNodes[0]);
                radioIdModifier++;
            }
        }
    }

    request.open("GET", "getAllMeals.php", true);
    request.send();
}

function mealSelector(day)
{
    const dayBox = document.getElementById(day + 'Inner');
    const selectButton = document.getElementById("mealSelectButton");
    const modal = document.getElementById("mealModal");

    selectButton.innerText = "Select meal for " + day;
    selectButton.onclick = function() {getAMeal(dayBox);};

    modal.style.display="block";
}

function closeModal()
{
    document.getElementById("mealModal").style.display = "none";
}

// ------------ ADDING MEALS AND MEAL PLANS --------------
function addMeal()
{
    // not sure if I need to set these to null or not
    let name      = document.getElementById("name").value;
    let servings  = document.getElementById("servings").value;
    let prepTime  = document.getElementById("prepTime").value;
    let recipeURL = document.getElementById("url").value;

    clearAddMeal();
    
    $.ajax({
        type: "POST",
        url: "addMeal.php",
        data: { name: name, servings: servings, prepTime: prepTime, url: recipeURL }
    });
}

function clearAddMeal()
{
    document.getElementById("name").value = "";
    document.getElementById("servings").value = "";
    document.getElementById("prepTime").value = "";
    document.getElementById("url").value = "";
}

function clearMealPlan()
{
    document.getElementsByClassName("mealBoxText").innerText = "";
}