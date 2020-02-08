function mealPlanRequest(mealPlanID)
{
    let request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200)
        {
            let data = JSON.parse(request.response);
            console.log(data);
        }
        else
        {
            console.log("something went wrong, status: " + request.status);
        }
    };

    request.open("POST", "getMealPlan.php?planID=" + mealPlanID, true);
    request.send();
    console.log("sent request");
}