from __future__ import print_function
from datetime import date, datetime, timedelta
import mysql.connector
from sql import *
import json

#Connect Database
cnx = mysql.connector.connect(user='lbrenna4', password='survival47', host='127.0.0.1', database='characterlimit')
cursor = cnx.cursor()



add_recipe = ("INSERT INTO recipes "
               "(name, prep_time, cook_time, tot_time, avg_rating) "
               "VALUES (%s, %s, %s, %s, %s)")

add_ingredients = ("INSERT INTO ingredients"
              "(name, recipe_id, quantity) "
              "VALUES (%(name)s, %(recipe_id)s, %(quantity)s)")

add_directions = ("INSERT INTO directions "
              "(step_num, recipe_id, instruction_text) "
              "VALUES (%(step_num)s, %(recipe_id)s, %(instruction_text)s)")


			  


# Insert new employee

count = 0;
with open('jsondata.txt') as json_data:
	#print(json_data)
	d= json.load(json_data)
	for i in d:
		count = count + 1
		print(count)
		
		# for recipes #
		print("RECIPES:")
		data_recipe = (i["title"], i["preptime"], i["cooktime"], i["totaltime"], int(float((i["rating"]))))
		
		print(data_recipe)
		#'tot_calories': int(i["calories"]),
		#'servings': int(i["servings"]),
		#Execute insert recipe
		cursor.execute(add_recipe, data_recipe)
		
		
		recipe_id = cursor.lastrowid
		print(recipe_id)
		

		print("FOR INGREDIENTS")
		
		for ing in i["ingredients"]:
			amount = 1 
			
			data_ingredients = {
			  'name': ing[0],
			  'recipe_id': recipe_id,
			  'quantity': amount  
			  
			}
			
			print(ing[0])
			
			cursor.execute(add_ingredients, data_ingredients)
		
		
		print("FOR DIRECTIONS")
		# print(i["directions"])
		step_num = 1
		for dir in i["directions"]:
			if len(dir) == 0:
				continue
			print(dir[0])
			
			data_directions= {
			  'step_num': step_num,
			  'recipe_id': recipe_id,
			  'instruction_text': dir[0]
			}
			
			cursor.execute(add_directions, data_directions)
			step_num= step_num+1
		
# Make sure data is committed to the database
cnx.commit()
cursor.close()
cnx.close()





