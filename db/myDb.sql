CREATE TABLE meals (id SERIAL PRIMARY KEY, name varchar(100), recipe_url varchar(100),
servings int, prep_time int);

CREATE TABLE meal_plans (id SERIAL PRIMARY KEY, name varchar(100),  monday int REFERENCES meals(id),
tuesday int REFERENCES meals(id), wednesday int REFERENCES meals(id), thursday int REFERENCES meals(id),
friday int REFERENCES meals(id), saturday int REFERENCES meals(id), sunday int REFERENCES meals(id));

-- These tables are simple and should reduce data redundency
-- It is intended that meals will be entered into the meals table and the meal_plans
-- table can create meal plans by pulling data from the meals table


-- The following is how to get a meal from a meal plan
SELECT * FROM meals WHERE id = (SELECT monday FROM meal_plans);
SELECT * FROM meals WHERE id = (SELECT tuesday FROM meal_plans);
SELECT * FROM meals WHERE id = (SELECT wednesday FROM meal_plans);
SELECT * FROM meals WHERE id = (SELECT thursday FROM meal_plans);
SELECT * FROM meals WHERE id = (SELECT friday FROM meal_plans);
SELECT * FROM meals WHERE id = (SELECT saturday FROM meal_plans);
SELECT * FROM meals WHERE id = (SELECT sunday FROM meal_plans);

-- Updating information in a pre-existing table
UDPATE 'tablename' SET column = value, column2 = value2... WHERE 'condition';

-- for updating meals 
UPDATE meals SET name = ..., recipe_url = ..., servings = ..., prep_time = ..., WHERE 'condition';

-- updating meal plan
UPDATE meal_plans SET name = ..., monday = ..., tuesday = ..., wednesday = ..., thursday = ..., friday = ..., saturday = ..., sunday = ... WHERE 'condition';

-- inserting new data
-- meals
INSERT INTO meals (name, recipe_url, servings, prep_time) VALUES (variable1, variable2, variable3, variable4);

-- meal_plan
INSERT INTO meal_plan (name, monday, tuesday, wednesday, thursday, friday, saturday, sunday) VALUES = (nameVariable, var1, var2, var3, var4, var5, var6, var7);
