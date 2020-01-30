CREATE TABLE meals (id SERIAL PRIMARY KEY, name varchar(100), recipe_url varchar(100),
servings int, prep_time int);

CREATE TABLE meal_plans (id SERIAL PRIMARY KEY, monday int REFERENCES meals(id),
tuesday int REFERENCES meals(id), wednesday int REFERENCES meals(id), thursday int REFERENCES meals(id),
friday int REFERENCES meals(id), saturday int REFERNCES meals(id), sunday int REFERENCES meals(id));

-- These tables are simple and should reduce data redundency
-- It is intended that meals will be entered into the meals table and the meal_plans
-- table can create meal plans by pulling data from the meals table
